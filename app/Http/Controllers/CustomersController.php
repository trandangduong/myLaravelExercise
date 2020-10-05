<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Customer;
use App\Events\NewCustomerHasRegisteredEvent;
use Intervention\Image\Facades\Image;
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
        $customer = Customer::create($this->validatesRequest());

        $this->storeImage($customer);

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
        $customer->update($this->validatesRequest());
        $this->storeImage($customer);
        return redirect('customers/'. $customer->id);
    }
 
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect('customers');
    }

    private function validatesRequest()
    {
        return request()->validate([
            'name'=> 'required|min:3|string',
            'email'=> 'required|email',
            'active'=> 'required',
            'company_id'=> 'required',
            'image'=> 'sometimes|file|image|max:5000',
        ]);
    }

    private function storeImage($customer)
    {
        if(request()->has('image'))
        {
            $customer->update([
                'image'=>request()->image->store('uploads', 'public'),
            ]);

            $image = Image::make(public_path('storage'. $customer->image))->fit(300,300);
            $image->save();
        }
    }
}
