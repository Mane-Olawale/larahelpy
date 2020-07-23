<?php

return [

    /**
     * Development server configuration.
     * 
     *  @since 1.0
     * 
     * @var array
     */
    'server' => [
        
        /**
         * The port for serve:this 
         * 
         * @since 1.0
         * 
         * @var string
         */

        'port' => '8100',


        /**
         * The port for serve:this 
         * 
         * @since 1.0
         * 
         * @var string
         */
    
        'host' => '127.0.0.1',


        /**
         * The port for serve:this 
         * 
         * @since 1.0
         * 
         * @var int
         */
    
        'tries' => 10,

    ],




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