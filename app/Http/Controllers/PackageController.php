<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\TelevisionService;
use App\Models\InternetService;
use App\Models\TelephoneService;

use Illuminate\Support\Facades\Log;

use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Package::all();
        return view('packages.index', ["packages" =>  $packages]);
    }

    public function create(Request $request)
    {
        Log::channel('stderr')->info($request->session()->all());

        $template_data = [
            "internet_services" => InternetService::all(),
            "telephone_services" => TelephoneService::all(),
            "television_services" => TelevisionService::all()
        ];
        return view('packages.create', $template_data);
    }

    public function store(Request $request)
    {

        $internet_service_id = $request->input('internet_service') === 'nil' ? null : $request->input('internet_service');
        $telephone_service_id = $request->input('telephone_service') === 'nil' ? null : $request->input('telephone_service');
        $television_service_id = $request->input('television_service') === 'nil' ? null : $request->input('television_service');

        $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric'
        ]);

        Package::create([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'internet_service_id' => $internet_service_id,
            'telephone_service_id' => $telephone_service_id,
            'television_service_id' => $television_service_id,
        ]);

        return redirect()->route('admin.package-list');
    }

    public function show(Package $package)
    {
        Log::channel('stderr')->info( $package );
        return view('packages.detail',[ "package" => $package]);
    }

    public function subscriberIndex(Request $request)
    {
        $packages = Package::all();
        return view('packages.subscriber-index', ["packages" =>  $packages]);
    }

}
