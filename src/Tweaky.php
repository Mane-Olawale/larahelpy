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
    private $root;


    /**
     * The server Port
     * 
     * @since 1.0
     * 
     * @var string
     */
    private $port;





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

        return app(static::class);

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

        $this->port( config('tweaky.port', '8000') );

    }





    /**
     * Get and Retrieve Tweaky port
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
                
                $this->port = $port;

            }else{

                throw new \Exception("Invalid port: port must be numeric.");

            }

        }

    }





}