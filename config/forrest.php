<?php

/**
 * Configuration options for Salesforce Oath settings and REST API defaults.
 */
// https://packagist.org/packages/omniphx/forrest
return [

    /*
     * Options include WebServer or UserPassword
     */
    'authentication' => 'WebServer',

    /*
     * Enter your credentials
     * Username and Password are only necessary for UserPassword flow.
     * Likewise, callbackURI is only necessary for WebServer flow.
     */
    // Reference: https://developer.salesforce.com/docs/atlas.en-us.api_rest.meta/api_rest/intro_understanding_username_password_oauth_flow.htm
    'credentials'    => [
        //Required:
        'consumerKey'    => env('FORREST_CONSUMER_KEY'),
        'consumerSecret' => env('FORREST_CONSUMER_SECRET'),
        'callbackURI'    => env('FORREST_CALLBACK_URI'),
        'loginURL'       => env('FORREST_LOGIN_URL'),

        // Only required for UserPassword authentication:
        'username'       => env('FORREST_USERNAME'),
        // Security token might need to be ammended to password unless IP Address is whitelisted
        'password'       => env('FORREST_PASSWORD'),
    ],

    /*
     * These are optional authentication parameters that can be specified for the WebServer flow.
     * https://help.salesforce.com/apex/HTViewHelpDoc?id=remoteaccess_oauth_web_server_flow.htm&language=en_US
     */
    'parameters'     => [
        'display'   => '',
        'immediate' => false,
        'state'     => '',
        'scope'     => '',
        'prompt'    => '',
    ],

    /*
     * Default settings for resource requests.
     * Format can be 'json', 'xml' or 'none'
     * Compression can be set to 'gzip' or 'deflate'
     */
    'defaults'       => [
        'method'          => 'get',
        'format'          => 'json',
        'compression'     => false,
        'compressionType' => 'gzip',
    ],

    /*
     * Where do you want to store access tokens fetched from Salesforce
     */
    'storage'        => [
        'type'          => 'session', // 'session' or 'cache' are the two options
        'path'          => 'forrest_', // unique storage path to avoid collisions
        'expire_in'     => 60, // number of minutes to expire cache/session
        'store_forever' => false, // never expire cache/session
    ],

    /*
     * If you'd like to specify an API version manually it can be done here.
     * Format looks like '32.0'
     */
    'version'        => '',

    /*
     * Optional (and not recommended) if you need to override the instance_url returned from Saleforce
     */
    'instanceURL'    => '',

    /*
     * Language
     */
    'language'       => 'en_US',
];
