<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Customer;
use App\Events\NewCustomerHasRegisteredEvent;
use App\Mail\WelcomeNewUserMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CustomersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }

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
        $customer = Customer::create($this->validatesRequests());

        event(new NewCustomerHasRegisteredEvent($customer));

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
