<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ShowProgrammingTd extends Component
{

    public $start;
    public $end;
    public $day_number;

    private $programming;

    public function __construct($programming)
    {
        $start = $programming->start;
        $end = $programming->end;


        $array1 =  explode(':', $start);
        $h1 = intval($array1[0]) * 2;
        $m1 = $array1[1] == '00' ? 0 : 1;

        $array2 =  explode(':', $end);
        $h2 = intval($array2[0]) * 2;
        $m2 = $array2[1]  == '00' ? 0 : 1;

        $start_time_unit = $h1 + $m1;
        $end_time_unit = $h2 + $m2;


        $this->colspan = $end_time_unit - $start_time_unit;
        $this->programming = $programming;
    }

    public function render()
    {
        return view('components.show-programming-td',[  "colspan" => $this->colspan , "show_name" => $this->programming->show_name]);
    }
}
