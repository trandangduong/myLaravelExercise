@extends('layout')

@section('title')
    Customer List
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Customers</h1>
        </div>
    </div>
    
    <div class="row">
        <div class="col-12">
            <form action="customers" method="POST" class="pb-5">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name">    
                <div>{{$errors->first('name') }}</div>
            </div>
            
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email">    
                <div>{{$errors->first('email') }}</div>
            </div>

            <div class="form-group">
                <label for="active">Status</label>
                <select name="active" id="active" class="form-control">
                    <option value="" disabled>Select Customer status</option>
                    <option value="1" Active></option>
                    <option value="0" inactive></option>
                </select>
            </div>
            <button type="submit">Add Customer</button>
            
            <!-- avoid cross-site request forgery attack -->
            @csrf
            
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <h3>Active Customers</h3>
            <ul>
            @foreach($activeCustomers as $activeCustomer)
                <li>{{$activeCustomer->name}} <span class="text-primary">{{$activeCustomer->email}}</span></li>
            @endforeach
            </ul>
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <h3>Inactive Customers</h3>
            <ul>
            @foreach($inactiveCustomers as $inactiveCustomer)
                <li>{{$inactiveCustomer->name}} <span class="text-primary">{{$inactiveCustomer->email}}</span></li>
            @endforeach
            </ul>
        </div>
    </div>

@endsection
