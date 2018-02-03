<?php

/*
 * This file is part of Laravel Vimeo.
 *
 * (c) Vincent Klaiber <hello@vinkla.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

return [

    /*
    |--------------------------------------------------------------------------
    | Default Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the connections below you wish to use as
    | your default connection for all work. Of course, you may use many
    | connections at once using the manager class.
    |
    */

    'default' => 'main',

    /*
    |--------------------------------------------------------------------------
    | Vimeo Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the connections setup for your application. Example
    | configuration has been included, but you may add as many connections as
    | you would like.
    |
    */

    'connections' => [

        'main' => [
            'client_id' => '3463e9e19ff11b69aaa8350c7ac27154fe079c77',
            'client_secret' => '1DVCELWmsWihRphnzHOkVgS/dDMJVhZqh8RlXBwmY7f+2rkvHB4HRiJZhUL2vLu4GNOLWbm6UDGc7enJ6AFze500hnvetknGb64HwlJwmxdmee3HcUM1AHsEk2chwClU',
            'access_token' => '94ef8df3bc24135ca3b994b7e995038f',
        ],

        'alternative' => [
            'client_id' => '3463e9e19ff11b69aaa8350c7ac27154fe079c77',
            'client_secret' => '1DVCELWmsWihRphnzHOkVgS/dDMJVhZqh8RlXBwmY7f+2rkvHB4HRiJZhUL2vLu4GNOLWbm6UDGc7enJ6AFze500hnvetknGb64HwlJwmxdmee3HcUM1AHsEk2chwClU',
            'access_token' => '94ef8df3bc24135ca3b994b7e995038f',
        ],

    ],

];
