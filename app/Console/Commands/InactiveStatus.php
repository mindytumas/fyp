<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Member;
use Carbon\Carbon;

class InactiveStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:InactiveStatus';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
    public function handle()
    {
        //$memberstatus = Member::whereDate('expiredDate', '<', Carbon::now())->update(['memberstatus' => 'expired']);
        
    }
}
