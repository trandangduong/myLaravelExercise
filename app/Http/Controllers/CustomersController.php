<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Customer;
use Illuminate\Http\Request;


class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activeCustomers = Customer::active()->get();
        $inactiveCustomers = Customer::inactive()->get();
        $companies = Company::all();
        return view ('customers.index', compact('activeCustomers', 'inactiveCustomers', 'companies'));
    }
<<<<<<< HEAD

    public function create()
    {
        return view('customers.create');
=======
    /* List all customers */
    public function list()
    {
        $activeCustomers = Customer::where('active',1)->get();
        $inactiveCustomers = Customer::where('active',0)->get();

        return view ('internals.customers', compact('activeCustomers','inactiveCustomers'));
>>>>>>> 683782c40477b87c1f69a6fc2268282c422ba394
    }

    public function store()
    {
        $data = request()->validate([
            'name'=> 'required|min:3|string',
            'email'=> 'required|email',
            'active'=> 'required',
<<<<<<< HEAD
            'company_id'=> 'required',
        ]);

        $customer = Customer::create($data);
=======
        ]);

        $customer = new Customer();
        $customer->name = request('name');
        $customer->email = request('email');
        $customer->active = request('active');
        $customer->save();
>>>>>>> 683782c40477b87c1f69a6fc2268282c422ba394
        
        return back();
        //dd(request('name'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
