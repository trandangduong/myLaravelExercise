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
            <p>Name:</p>
            <div class="input-group pb-2">
                <input type="text" name="name">    
                <div>{{$errors->first('name') }}</div>
            </div>
            
            <p>Email:</p>
            <div class="input-group pb-3">
                <input type="text" name="email">    
                <div>{{$errors->first('email') }}</div>
            </div>

            <button type="submit">Add Customer</button>
            
            <!-- avoid cross-site request forgery attack -->
            @csrf
            
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <ul>
            @foreach($customers as $customer)
                <li>{{$customer->name}} <span class="text-primary">{{$customer->email}}</span></li>
            @endforeach
            </ul>
        </div>
    </div>
    
@endsection
