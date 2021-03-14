<?php

namespace Database\Seeders;



use App\Models\Channel;
use App\Models\Programming;
use Illuminate\Database\Seeder;


class ChannelSeeder extends Seeder
{

    private function generate_time_units()
    {
        $time_unit = 0; // 1 time unit is equivalent to 0.5 hours
        //the maximum step is 5 or the remaining time until 366 delta times ( end of week )
        $time_units = [0];
        while ($time_unit < 336) {
            $step = rand(1, min(5, 336 - $time_unit));
            $time_unit += $step;
            array_push($time_units, $time_unit);
        }
        return $time_units;
    }

    public function run()
    {
        for ($i = 0; $i < 15; $i++) {
            $time_units = $this->generate_time_units();
            $time_unit_idx = 0;
            Channel::factory()
                ->has(
                    Programming::factory()
                        ->count(count($time_units) - 1)
                        ->state(function () use ($time_units, &$time_unit_idx) {
                            $h1 =  floor($time_units[$time_unit_idx] / 2);
                            $m1 = $time_units[$time_unit_idx] % 2 == 1 ? '30' : '00';
                            $h2 =  floor($time_units[$time_unit_idx + 1] / 2);
                            $m2 = $time_units[$time_unit_idx + 1] % 2 == 1 ? '30' : '00';
                            $time_unit_idx++;
                            return [
                                'start' => "$h1:$m1:00",
                                'end' => "$h2:$m2:00",
                            ];
                        })
                )
                ->create();
        }
    }
}
