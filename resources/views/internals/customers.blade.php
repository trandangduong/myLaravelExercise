@extends('layout')

@section('content')
    <h1>Customers</h1>
    
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

    <ul>
        @foreach($customers as $customer)
            <li>{{$customer->name}} <span class="text-primary">{{$customer->email}}</span></li>
        @endforeach
    </ul>
@endsection
