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
        $template_data = [
            "channel" => $channel,
            "day" => $day,
            "programmings" => $channel->getProgrammingsByDay( $day ,1)
        ];
        return view('channels.programming-detail', $template_data);
    }

    public function programmingDaysList()
    {
        return view('channels.programming-days');
    }

    public function programmingTable($day)
    {
        $template_data = [
            "day" => $day,
            "channels" => Channel::all()
        ];
        return view('channels.programming-table',$template_data);
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
