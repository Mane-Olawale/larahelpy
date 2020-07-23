<?php 

namespace Laratweaky\Commands;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tweaky:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Installs Laratweaky';

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
        $this->line("<info>Installing Laravel Tweaky...</info>");
        $this->line("");
        sleep(2);

        $this->call('vendor:publish', [

            '--tag' => 'tweaky.config'

        ]);

        $this->line("");
        sleep(2);

        if (tweaky()->installed()){

            $this->line("<info>Laravel Tweaky installed sucessfully!!</info>");

        }else{
            
            $this->line("<error>Laravel Tweaky installation failed</error>");

            /*
            
            $runDebug = $this->choice(

                'What is your name?',
                ['Taylor', 'Dayle'],
                $defaultIndex,
                $maxAttempts = null,
                $allowMultipleSelections = false

            );

            */

        }
        

    }

}