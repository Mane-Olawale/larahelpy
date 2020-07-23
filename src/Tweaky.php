<?php

namespace Laratweaky;



final class Tweaky 
{

    /**
     * This is the instance of Tweaky
     * 
     * @since 1.0
     * 
     * @var string
     */
    protected static $instance;


    /**
     * Root path of the package
     * 
     * @since 1.0
     * 
     * @var string
     */
    public $root;


    /**
     * The server Port
     * 
     * @since 1.0
     * 
     * @var string
     */
    public $port;


    /**
     * The server Port
     * 
     * @since 1.0
     * 
     * @var string
     */
    public $host;


    /**
     * The server Port
     * 
     * @since 1.0
     * 
     * @var string
     */
    private $tries;





    public function __construct()
    {

        $this->root = __DIR__.'/../';

    }





    

    /**
     * Gets the active instance of Tweaky
     * 
     * @since 1.0
     * 
     * @return self
     */
    public static function instance() : self
    {

        return app('tweaky');

    }








    /**
     * Retrieves a path in tweaky base path
     * 
     * @since 1.0
     * 
     * @return string
     */
    public function root( string $path = '') : string
    {

        if ($path) return self::cleanPath( $this->root . '/' . $path );

        return $this->root;

    }





    
    
    /**
     * Check if tweaky is installed
     * 
     * @since 1.0
     * 
     * @return void
     */
    public function installed()
    {
        return is_file( config_path('tweaky.php') );
    }





    /**
     * Clean a given path to be compatible with the system
     * 
     * @since 1.0
     * 
     * @return string
     */
    public static function cleanPath(string $path ) : string
    {

        $path = str_replace('\\', '/', $path);

        $path = preg_replace('~//+~', '/', $path );

        $path = str_replace('/', DIRECTORY_SEPARATOR, $path);

        return $path;

    }






    /**
     * Boot tweaky
     * 
     * @since 1.0
     * 
     * @return void
     */
    public function boot() : void
    {
        if (!$this->installed()) return;

        if ( !empty(config('tweaky.server.port', '') )) {

            $this->port( config('tweaky.server.port', '8000') );

        }else{

            throw new \Exception('Invalid port: port not properly configured.');

        }


        if ( !empty(config('tweaky.server.host', '') )) {

            $this->host( config('tweaky.server.host', '127.0.0.1') );

        }else{

            throw new \Exception('Invalid host: host not properly configured.');

        }


        if ( !empty(config('tweaky.server.tries', '') )) {

            $this->tries( config('tweaky.server.tries', '10') );

        }else{

            throw new \Exception('Invalid tries: tries not properly configured.');

        }
        

    }





    /**
     * Set and Retrieve Tweaky port
     * 
     * @since 1.0
     * 
     * @param string $port
     * 
     * @return void|string
     */
    public function port( string $port = '' )
    {

        if ( empty($port) ){

            return $this->port;

        }else{

            if ( is_numeric( $port ) ){
                
                return $this->port = $port;

            }else{

                throw new \Exception('Invalid port: port must be numeric.');

            }

        }

    }


    /**
     * Set and Retrieve Tweaky server ip
     * 
     * @since 1.0
     * 
     * @param string $host
     * 
     * @return void|string
     */
    public function host( string $host = '' )
    {

        if ( empty($host) ){

            return $this->host;

        }else{

            if ( is_string( $host ) ){
                
                return $this->host = $host;

            }else{

                throw new \Exception("Invalid host: host must be string.");

            }

        }

    }




    /**
     * Set and Retrieve the number of time Tweaky adjust Port
     * 
     * @since 1.0
     * 
     * @param string $tries
     * 
     * @return void|string
     */
    public function tries( string $tries = '' )
    {

        if ( empty($tries) ){

            return $this->tries;

        }else{

            if ( is_numeric( $tries ) ){
                
                return $this->tries = $tries;

            }else{

                throw new \Exception("Invalid tries: tries must be string.");

            }

        }

    }





}