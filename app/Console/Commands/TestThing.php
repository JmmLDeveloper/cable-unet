<?php

namespace App\Console\Commands;

use App\Models\Programming;
use GrahamCampbell\ResultType\Result;
use Illuminate\Console\Command;

use Illuminate\Support\Facades\Log;

class TestThing extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:thing';

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
     * @return int
     */
    public function handle()
    {
        $result = Programming::limit(400)->get()->mapToGroups(function ($programming) {

            $array1 =  explode(':', $programming->start);
            $h1 = intval($array1[0]) * 2;
            $m1 = $array1[1] === "30" ? 1 : 0;
            $array2 =  explode(':', $programming->end);
            $h2 = intval($array2[0]) * 2;
            $m2 = $array2[1] === "30" ? 1 : 0;

            $start_time_unit = $h1 + $m1;
            $end_time_unit = $h2 + $m2;

            $day = floor($start_time_unit / 48);

            $days = [
                0 => "sunday",
                1 => 'monday',
                2 => 'tuesday',
                3 => 'wednesday',
                4 => 'thrusday',
                5 => 'friday',
                6 => 'saturday',
            ];
            return [ $days[$day] => $programming ];
        });
        Log::channel('stderr')->info($result);
        return 0;
    }
}
