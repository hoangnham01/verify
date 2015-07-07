## Verify Access Token Facebook & ID Token Google

Require this package with composer using the following command:

    composer require nham/verify

After updating composer, add the ServiceProvider to the providers array in `app/config/app.php`

    'Nham\Verify\VerifyServiceProvider',

You can also publish the config-file to change implementations.

    php artisan config:publish nham/verify

Verify Google ID Token

    VerifyToken::google("eyJhbGciOiJSUzI1NiIsImtpZCI6ImU1MzEzOTk4NGJkMzZkMmMyMzA1NTI0NDE2MDhjYzBiNTE3OTQ4N2EifQ.eyJpc3MiOiJhY2NvdW50cy5nb29nbGUuY29tIiwic3ViIjoiMTE0OTk5OTI4Mjc1MzQ4MzIwNzkyIiwiYXpwIjoiNzExNjgwNjM1ODUtaWExdTZmZTJ2OWptZTZ1ZjdmNmozaGtmYzZwdHFxbjYuYXBwcy5nb29nbGV1c2VyY29udGVudC5jb20iLCJlbWFpbCI6ImhvYW5nbmhhbTAxQGdtYWlsLmNvbSIsImF0X2hhc2giOiJjQUptNjFfbVBLbzlsRVBDN0FuZ3JBIiwiZW1haWxfdmVyaWZpZWQiOnRydWUsImF1ZCI6IjcxMTY4MDYzNTg1LWlhMXU2ZmUydjlqbWU2dWY3ZjZqM2hrZmM2cHRxcW42LmFwcHMuZ29vZ2xldXNlcmNvbnRlbnQuY29tIiwiY19oYXNoIjoiMDB2TDU5UnhhemdsbGl4TUZmcV9PUSIsImlhdCI6MTQzNjI1OTU5MSwiZXhwIjoxNDM2MjYzMTkxfQ.kdD1wayTJZPf5rpqaMJ1JuKwtTS3SsHlSc9Lb8VYFfuTFJ5Tx3THdbqB1Vcu2a6jrpBJ7Y9OQ5SRgsVmwcZWAN6MfdgJhgUevTlmjCi4NC4QBqLHbkb96XD-IWmIe6aSji3zfSx3P3v9ospUavodtzi7lqhrDz0wHVYBCLg4_RWQLxf9zsav9_DO7k91sWp8XgxqxmY4hS5bzzKHz6W49-v_DKo_9SUNeltL4EFku9DOAcdxldw4xB6T8TThlxpJ1aD4TEM0RVN46PrS_AusFZGbBIE0XQJ2d_Fcm2CCeSpnRV7q_lZHZkhY0EN8jfbKqAxnfyJA1dyxM316ko7Fxw");
return
    TRUE
    
    array(
        'valid'    => true,
        'gplus_id' => GOOGLE_PLUS_ID,
        'email'    => GOOGLE_PLUS_EMAIL,
        'message'  => 'ID Token is valid.'
        )
    
FALSE

    array(
            'valid'    => false,
            'gplus_id' => null,
            'message'  => 'Invalid ID Token.'
        )
        
Verify Facebook Access Token
        
    VerifyToken::facebook('CAAWoi9ObEV4BAD1iEDXzSZAMfXClnY6jiH7GcVI188PgL2ZBFnqlxoZBEm7TZCfCb7hOqYEhCfI4ZAl7iyDy80shrYC2EcNOrDOgEdneQFbTjQbPZBscelnIyrYH1TafmOJiQEndM9znB4auJUWTE4glOXVv63ZB0mKZCgJ9qJJwyC1YqzV5lAyyHHyzqs12OZAyhefN3SVMSDn7K5S2e4yIclVT5ADTqsZCIZD');
return
    TRUE
    
         array(
             'valid'    => true,
             'user_id' => FACEBOOK_ID,
             'app_id'    => APP_FACEBOOK_ID,
             'message'  => 
         )
 FALSE
 
         array(
             'valid'    => false,
             'message'  => 
         )
         
### License

The Verify is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)