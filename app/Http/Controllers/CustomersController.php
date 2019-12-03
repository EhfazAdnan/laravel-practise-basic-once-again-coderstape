<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Company;
use App\Mail\WelcomeNewUserMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Events\NewCustomerHasRegisteredEvent;

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
        $customer = Customer::create($data);

        // create a event to mail new user/register in news letter/slack notifications
        event(new NewCustomerHasRegisteredEvent($customer));

        // send mail to new user
        // Mail::to($customer->email)->send(new WelcomeNewUserMail());

        // register to news letter
        // dump('Register to newsletter');

        // slack notification to admin
        // dump('slack message here');

        // return redirect('customers');
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
