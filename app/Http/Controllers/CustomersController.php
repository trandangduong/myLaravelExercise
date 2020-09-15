<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Controllers;

class CustomersController extends Controller
{
    public function list()
    {
        $customers = [
            'Nguyen Van A',
            'Tran Van B',
            'C',
        ];
        return view ('internals.customers', [
            'customers' => $customers,
        ]);
}
}