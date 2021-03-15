<?php

namespace App\View\Components;

use Illuminate\View\Component;

class HourTimeTh extends Component
{

    public $timeUnit;

    private $time_display;

    public function __construct($timeUnit)
    {

        $h1 =  str_pad(strval(floor($timeUnit / 2)), 2, '0', STR_PAD_LEFT);
        $m1 = $timeUnit % 2 == 1 ? '30' : '00';
        $h2 =  str_pad(strval(floor( ( $timeUnit + 1 ) / 2)), 2, '0', STR_PAD_LEFT);
        $m2 = ( $timeUnit + 1  ) % 2 == 1 ? '30' : '00';

        $this->time_display_start = "$h1:$m1:00";
        $this->time_display_end = "$h2:$m2:00";
    }


    public function render()
    {
        return view('components.hour-time-th',[
            "time_display_start"=>$this->time_display_start,
            "time_display_end"=>$this->time_display_end,
        ]);
    }
}
