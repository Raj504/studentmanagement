<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Payment;
use Stripe;
use Illuminate\Support\Facades\Session;

//use Illuminate\Support\Facades\Session;
// use Session;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payments = Payment::all();

        return view('payments.index')->with('payments', $payments);
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $enrollments = Enrollment::pluck('enroll_no', 'id'); 
        return view('payments.create', compact('enrollments')); 

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();
        Payment::create($input);
        return redirect('payments')->with('flash_message', 'payment added!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // dd(23432 , $id);
        $payment = Payment::findOrFail($id);
        
        return view('payments.show', compact('payment'));    
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $payment = Payment::findOrFail($id);

        $enrollments = Enrollment::pluck('enroll_no', 'id'); 

    return view('payments.edit', compact('payment', 'enrollments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $payments = Payment::find($id);
        $input = $request->all();
        $payments->update($input);
        return redirect('payments')->with('flash_message', 'student payment!');  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Payment::destroy($id);
        return redirect('payments')->with('flash_message', 'payment deleted !');
    }

  
   
    
}


// payments/{stripe}