<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Company;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function __construct(){
        //$this->middleware('auth')->except(['index']);
        $this->middleware('auth');
    }

    public function index(){
        $activeCustomers = Customer::active()->get();
        $inactiveCustomers = Customer::inactive()->get();

        $customers = Customer::all();
        $companies = Company::all();
        return view('customers.index', ['activeCustomers' => $activeCustomers,'inactiveCustomers' => $inactiveCustomers,'companies' => $companies, 'customers' => $customers]);
    }

    public function create(){
        $companies = Company::all();
        $customer = new Customer();
        return view('customers.create',compact('companies','customer'));
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
        return redirect('customers');
    }

    // example of route model binding here
    public function show(Customer $customer){
        // $customer = Customer::where('id', $customer)->firstOrFail();
        return view('customers.show', compact('customer'));
    }

    public function edit(Customer $customer){
        $companies = Company::all();
        return view('customers.edit', compact('customer','companies'));
    }

    public function update(Customer $customer){
        $data = request()->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'active' => 'required',
            'company_id' => 'required',
        ]);

        $customer->update($data);
        return redirect('customers/' . $customer->id);
    }

    public function destroy(Customer $customer){
        $customer->delete();
        return redirect('customers');
    }
    
}
