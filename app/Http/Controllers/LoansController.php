<?php

namespace App\Http\Controllers;
use Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Loan;
use Carbon\Carbon;
class LoansController extends Controller
{
    //
    public function index(Request $request){
        $loans = DB::table('loans')->get();
        
        return view('loans.index', ['loans'=>$loans]);
    }
    public function store(Request $request){

        $validatedData = $request->validate([
            'loan_amount'=>'required',
            'loan_term'=>'required',
            'loan_interest_rate'=>'required',
            'loan_start_date'=>'required'
        ]);

        $dt = Carbon::now();
        $end_loan_date = $dt->addMonth($request->loan_term);
        //dd($nextdate);
        $expected_amount = ($request->loan_interest_rate / 100) * ($request->loan_amount) + $request->loan_amount;
        $payment_per_month = $expected_amount / $request->loan_term;
        Loan::create([
            'loan_amount'=>$request->loan_amount,
            'loan_term'=>$request->loan_term,
            'loan_interest_rate'=>$request->loan_interest_rate,
            'expected_amount'=>$expected_amount,
            'customer_id'=>$request->customer_id,
            'payment_per_month'=>round($payment_per_month),
            'loan_end_date'=>$end_loan_date,
            'loan_start_date'=>$request->loan_start_date
        ]);

       
        return redirect()->back()->with('status', 'Loan created');

    }
}
