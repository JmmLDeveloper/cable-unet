<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{

    public function index()
    {
        $invoices = Invoice::all();
        return view('invoices.index', ["invoices"=> $invoices] );
    }

    public function subscriberInvoices()
    {
        $user = Auth::user();
        return view('invoices.user-invoices', ["invoices"=> $user->invoices ] );
    }


    public function create()
    {

    }


    public function store(Request $request)
    {
        $users = User::where('package_id','!=',null)->get();

        foreach( $users as $user ) {
            Invoice::create([
                'user_id' => $user->id,
                'package_id' => $user->package->id,
                'charge' => $user->package->price,
            ]);
        }

        return redirect()->route('admin.invoice-list');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        //
    }
}
