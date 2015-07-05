<?php
/**
 * Created by PhpStorm.
 * User: nhamhv
 * Email: hoangnham01@gmail.com
 * Date: 04/07/2015
 * Time: 6:56 CH
 */

namespace Nham\Verify\Facades;

use Illuminate\Support\Facades\Facade;

class Verify extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'verifyToken'; }

}