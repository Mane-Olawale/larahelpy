<?php

return [


    /**
     * The port for serve:this 
     * 
     * @since 1.0
     * 
     * @var string
     */

    'port' => '8000',




    /**
     * Configure custom route file
     * 
     * @since 1.0
     * 
     * @var array
     */
    'routes' => [


        /**
         * Route files share properties
         * 
         * @since 1.0
         * 
         * @var array
         */
        'providers' => [


            'web' => [

                'middleware' => 'web',
                'prefix' => '',
                'namespace' => '',
                'domain' => '',
                'name' => '',

            ],


            'api' => [

                'middleware' => 'api',
                'prefix' => 'api',
                'namespace' => '$ROOT',
                'domain' => '',
                'name' => '',

            ]

        ],


        /**
         * Route files
         * 
         * @since 1.0
         * 
         * @var array
         */
        'files' => [


            [
                
                'name' => 'web',
                'path' => 'routes/test.php',
                'provider' => 'web'

            ]

            
        ]
        


    ]


];