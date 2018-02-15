<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
class TestCommend extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    // write you commend
    protected $signature = 'project:refresh';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This commend castomer to refresh';

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
     * @return mixed
     */

    // write code is run
    public function handle()
    {
        Artisan::call('optimize');
        Artisan::call('migrate:refresh');
        Artisan::call('view:clear');
        Artisan::call('config:clear');
    }
}
