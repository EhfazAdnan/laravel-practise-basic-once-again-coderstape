<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Company;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function list(){
        $activeCustomers = Customer::active()->get();
        $inactiveCustomers = Customer::inactive()->get();
        $companies = Company::all();
        return view('internals.customers', ['activeCustomers' => $activeCustomers,'inactiveCustomers' => $inactiveCustomers,'companies' => $companies]);
    }

    // public function store(){

    //     $data = request()->validate([
    //        'name' => 'required|min:3',
    //        'email' => 'required|email',
    //        'active' => 'required',
    //        'company_id' => 'required',
    //     ]);

    //     $customer = new Customer();
    //     $customer->name = request('name');
    //     $customer->email = request('email');
    //     $customer->active = request('active');
    //     $customer->company_id = request('company_id');
    //     $customer->save();

    //     return back();
    // }

    // another way to store data
    public function store(){

        $data = request()->validate([
           'name' => 'required|min:3',
           'email' => 'required|email',
           'active' => 'required',
           'company_id' => 'required',
        ]);
        
        // mass assignment and for do that we must put fillable/guraded to the model
        Customer::create($data);
        return back();
    }
    
}
