<?php 

namespace Laratweaky\Commands;

use Illuminate\Console\Command;

class ServeCommand extends Command
{
    
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'serve:this';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Serve the application on the PHP development server with a concrete port';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }


    

    /**
     * Execute the console command.
     *
     * 
     * @return mixed
     */
    public function handle()
    {


        $this->line("<info>Tweaky development server started:</info> http://127.0.0.1:{$this->port()}");


        $this->callSilent('serve', [

            '--port' => $this->port()

        ]);


    }

    

    /**
     * Get the host for the command.
     *
     * @return string
     */
    protected function port()
    {
        return $this->input->getOption('port');
    }


    

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [

            ['port', null, InputOption::VALUE_OPTIONAL, 'The port to serve the application on', tweaky()->port()],

        ];
    }



}