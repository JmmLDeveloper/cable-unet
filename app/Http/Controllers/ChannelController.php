<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ChannelController extends Controller
{
    public function index()
    {
        $channels = Channel::all();

        return view('channels.index', ["channels" => $channels]);
    }
    public function create()
    {
    }
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Channel  $channel4
     * @return \Illuminate\Http\Response
     */
    public function show(Channel $channel)
    {
        return view('channels.detail', ["channel" => $channel]);
    }

    public function programming(Channel $channel, $day)
    {
        $day_names = [
            "sunday" => 0,
            'monday' => 1,
            'tuesday' => 2,
            'wednesday' => 3,
            'thrusday' => 4,
            'friday' => 5,
            'saturday' => 6,
        ];

        $day_number = $day_names[strtolower($day)];

        $start_of_day = strval( $day_number * 24  ) . ':00:00';
        $end_of_day = strval( 24 + ( $day_number * 24  ) ) . ':00:00';


        $programmings = $channel
            ->programmings()
            ->where('start','>=',$start_of_day)
            ->where('end','<=',$end_of_day)
            ->get()
            ->map( function($programming) use ($day_number) {
                $array1 =  explode(':',$programming->start );
                $h1 = intval($array1[0]) - 24 * $day_number;
                $m1 = $array1[1];
                $s1 = $array1[2];

                $array2 =  explode(':',$programming->end );
                $h2 = intval($array2[0]) - 24 * $day_number;
                $m2 = $array2[1];
                $s2 = $array2[2];

                $programming->start = "$h1:$m1:$s1";
                $programming->end = "$h2:$m2:$s2";

                return $programming;
            });

        Log::channel('stderr')->info(gettype($programmings[0]->end) );

        $template_data = [
            "channel" => $channel,
            "day" => $day,
            "programmings" => $programmings
        ];
        return view('channels.programming-detail', $template_data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Channel  $channel
     * @return \Illuminate\Http\Response
     */
    public function edit(Channel $channel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Channel  $channel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Channel $channel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Channel  $channel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Channel $channel)
    {
        //
    }
}
