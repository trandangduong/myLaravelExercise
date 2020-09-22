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
        $customers = Customer::all();
        return view('customers.index',compact('customers'));
    }

    public function create()
    {
        $companies = Company::all();
        $customer = new Customer();
        return view('customers.create',compact('companies','customer'));
    }

    public function store()
    {
        Customer::create($this->validatesRequests());
                     
        return redirect('customers');
    }
    
    public function show(Customer $customer)
    {
        return view('customers.show',compact('customer'));
    } 

    public function edit(Customer $customer)
    {
        $companies = Company::all();
        return view('customers.edit', compact('customer','companies'));
    }

    public function update(Customer $customer)
    {
        $customer->update($this->validatesRequests());
        return redirect('customers/'. $customer->id);
    }
 
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect('customers');
    }

    private function validatesRequests(){
        return request()->validate([
            'name'=> 'required|min:3|string',
            'email'=> 'required|email',
            'active'=> 'required',
            'company_id'=> 'required',
        ]);
    }
}
