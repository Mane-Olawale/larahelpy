<?php 

namespace Laratweaky\Traits\Commands;

/**
 * This is the serve comment trait
 */
trait ServeTrait
{

    /**
     * Execute the console command.
     *
     * 
     * @return mixed
     */
    public function handle()
    {


        $this->line("<info>Tweaky development server started:</info> ".tweaky()->host().":".tweaky()->port());


        $this->callSilent('serve', [

            '--port' => tweaky()->port(),

            '--host' => tweaky()->host(),

            '--tries' => tweaky()->tries(),

        ]);


    }



}
