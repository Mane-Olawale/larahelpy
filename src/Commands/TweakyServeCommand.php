<?php 

namespace Laratweaky\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Laratweaky\Traits\Commands\ServeTrait;

class TweakyServeCommand extends Command
{
    use ServeTrait;
    
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tweaky:serve';

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





}