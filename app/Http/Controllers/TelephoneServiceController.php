<?php

namespace App\Http\Controllers;

use App\Models\TelephoneService;
use Illuminate\Http\Request;

class TelephoneServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin-route');
    }

    public function index()
    {
        $telephone_services = TelephoneService::all();
        return view('telephone-services.index',[ "telephone_services" =>  $telephone_services ]);
    }

    public function create()
    {
        return view('telephone-services.create');
    }

    public function store(Request $request)
    {
        $data  = $request->validate([
            'name' => 'required|string',
            'minutes' => 'required|integer'
        ]);

        TelephoneService::create($data);

        return redirect()->route('admin.telephone-service-list');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TelephoneService  $telephoneService
     * @return \Illuminate\Http\Response
     */
    public function show(TelephoneService $telephoneService)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TelephoneService  $telephoneService
     * @return \Illuminate\Http\Response
     */
    public function edit(TelephoneService $telephoneService)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TelephoneService  $telephoneService
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TelephoneService $telephoneService)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TelephoneService  $telephoneService
     * @return \Illuminate\Http\Response
     */
    public function destroy(TelephoneService $telephoneService)
    {
        //
    }
}
