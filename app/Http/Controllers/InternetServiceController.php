<?php

namespace App\Http\Controllers;

use App\Models\InternetService;
use Illuminate\Http\Request;

class InternetServiceController extends Controller
{
    public function index()
    {
        $internet_services = InternetService::all();
        return view('internet-services.index',[ "internet_services" =>  $internet_services ]);
    }

    public function create()
    {
        return view('internet-services.create');
    }

    public function store(Request $request)
    {
        $data  = $request->validate([
            'name' => 'required|string',
            'bandwidth' => 'required|integer'
        ]);

        InternetService::create($data);

        return redirect()->route('admin.internet-service-list');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InternetService  $internetService
     * @return \Illuminate\Http\Response
     */
    public function show(InternetService $internetService)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InternetService  $internetService
     * @return \Illuminate\Http\Response
     */
    public function edit(InternetService $internetService)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\InternetService  $internetService
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InternetService $internetService)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InternetService  $internetService
     * @return \Illuminate\Http\Response
     */
    public function destroy(InternetService $internetService)
    {
        //
    }
}
