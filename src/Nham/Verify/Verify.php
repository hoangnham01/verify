<?php
/**
 * Created by PhpStorm.
 * User: nhamhv
 * Email: hoangnham01@gmail.com
 * Date: 04/07/2015
 * Time: 6:56 CH
 */

namespace Nham\Verify;

use Config;
use Facebook\FacebookRequestException;
use Google_Client;
use Google_Auth_Exception;
use Facebook\FacebookSession;
use Exception;

/**
 * Verify access token Google | Facebook
 * Class Verify
 * @package Nham\Verify
 */
class Verify
{
    public function __construct()
    {

    }

    /**
     * @param string $idToken
     * @return bool
     */
    public function google($idToken = null)
    {


        $id_status = array(
            'valid' => false,
            'gplus_id' => null,
            'message' => 'Invalid ID Token'
        );
        if (!empty($idToken)) {
            // Check that the ID Token is valid.
            $clientId = Config::get('verify::google.clientId');
            $clientSecret = Config::get('verify::google.clientSecret');
            $client = new Google_Client();
            $client->setClientId($clientId);
            $client->setClientSecret($clientSecret);
            try {
                // Client library can verify the ID token.
                $jwt = $client->verifyIdToken($idToken, $clientId)->getAttributes();
                $gplus_id = $jwt['payload']['sub'];
                $id_status['valid'] = true;
                $id_status['gplus_id'] = $gplus_id;
                $id_status['message'] = 'ID Token is valid.';
                $id_status['email'] = $jwt['payload']['email'];
            } catch (Google_Auth_Exception $e) {
                $id_status['valid'] = false;
                $id_status['gplus_id'] = NULL;
                $id_status['message'] = 'Invalid ID Token.';
            }
        }
        return $id_status;
    }

    /**
     * @param string $accessToken
     * @return bool
     */
    public function facebook($accessToken = null)
    {
        if (empty($accessToken)) {
            return false;
        }
        FacebookSession::setDefaultApplication(Config::get('verify::facebook.appId'), Config::get('verify::facebook.appSecret'));

        $session = new FacebookSession($accessToken);
        try {
           $session->validate(Config::get('verify::facebook.appId'), Config::get('verify::facebook.appSecret'));
            $data =  $session->getSessionInfo()->asArray();
            return array(
                'valid' => true,
                'user_id' => $data['user_id'],
                'app_id' => $data['app_id'],
                'message' => 'Access Token is valid.'
            );
        } catch (FacebookRequestException $ex) {
            return array(
                'valid' => false,
                'messages' => $ex->getMessage()
            );
        } catch (Exception $ex) {
            return array(
                'valid' => false,
                'messages' => $ex->getMessage()
            );
        }

    }
}