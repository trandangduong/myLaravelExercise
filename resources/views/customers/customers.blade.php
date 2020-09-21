@extends('layout')

@section('title', 'Customer List')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Customer List</h1>
            <p><a href="customers/create">Add New Customer</a></p>
        </div>
    </div>
      
    <div class="row">
        <div class="col-6">
            <h3>Active Customers</h3>
            <ul>
            @foreach($activeCustomers as $activeCustomer)
                <li>{{$activeCustomer->name}} <span class="text-primary">{{$activeCustomer->company->name}}</span></li>
            @endforeach
            </ul>
        </div>
        <div class="col-6">
            <h3>Inactive Customers</h3>
            <ul>
            @foreach($inactiveCustomers as $inactiveCustomer)
                <li>{{$inactiveCustomer->name}} <span class="text-primary">{{$inactiveCustomer->company->name}}</span></li>
            @endforeach
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            @foreach($companies as $company)
                <h3>{{$company->name}}</h3>
                
                <ul>
                @foreach($company->customers as $customer)
                    <h4>{{$customer->name}}</h4>
                @endforeach 
                </ul>
            @endforeach
        </div>
    </div>
    
@endsection
