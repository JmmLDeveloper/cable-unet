<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ProgrammingTableFillerTd extends Component
{
    public $direction;

    public $programming;

    public function __construct( $direction,$programming )
    {
        $time = $direction === 'left' ? $programming->start : $programming->end;

        $valuesArray =  explode(':', $time);
        $h = intval($valuesArray[0]) * 2;
        $m = $valuesArray[1] == '00' ? 0 : 1;
        $time_units = $h + $m;
        
        $this->filler_tds =  $direction === 'left' ? $time_units : 48 - $time_units  ;
    }


    public function render()
    {
        return view('components.programming-table-filler-td',["fillers_tds" => $this->filler_tds]);
    }
}
