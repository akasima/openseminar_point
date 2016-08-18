<?php
namespace OpenSeminar\Point;

use OpenSeminar\Point\Models\PointLog;
use Illuminate\Console\Command;

class RemoveLog extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'remove:pointLog';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remove point log';

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command
     *
     * @return mixed
     */
    public function handle()
    {
        PointLog::where('createdAt', '<', date('Y-m-d') . ' 00:00:00')->delete();
    }
}
