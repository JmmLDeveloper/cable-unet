<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use App\Models\TelevisionService;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;

class TelevisionServiceController extends Controller
{

    public function index()
    {
        $television_services = TelevisionService::all();
        $channels = Channel::all();

        $blade_data = [
            "television_services" =>  $television_services,
            "channels" => $channels
        ];

        return view('television-services.index', $blade_data);
    }

    public function create(Request $request)
    {
        $channels = Channel::all();
        $blade_data = [
            "channels" => $channels
        ];
        return view('television-services.create', $blade_data);
    }


    public function store(Request $request)
    {
        $data  = $request->validate([
            'name' => 'required|string',
            'tier' => 'required|integer'
        ]);

        $television_service = TelevisionService::create($data);
        $channel_ids = [];

        foreach (array_keys($request->all()) as $key) {
            if (str_starts_with($key, 'channel-id-')) {
                $id = intval(substr($key, 11));
                array_push($channel_ids, $id);
            }
        }

        $television_service->channels()->attach($channel_ids);

        return redirect()->route('admin.television-service-list');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TelevisionService  $televisionService
     * @return \Illuminate\Http\Response
     */
    public function edit(TelevisionService $televisionService)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TelevisionService  $televisionService
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TelevisionService $televisionService)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TelevisionService  $televisionService
     * @return \Illuminate\Http\Response
     */
    public function destroy(TelevisionService $televisionService)
    {
        //
    }
}
