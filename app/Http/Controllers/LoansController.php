<?php

namespace App\Http\Controllers;
use Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Loan;
use Carbon\Carbon;
use DataTables;

class LoansController extends Controller
{
    //
    public function index(Request $request){
       
        return view('loans.index');
    }
    public function store(Request $request){

        $validatedData = $request->validate([
            'loan_amount'=>'required',
            'loan_term'=>'required',
            'loan_interest_rate'=>'required',
            'loan_start_date'=>'required'
        ]);

        $dt = Carbon::now();
        //get the end date and remove the last month;
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

    public function allLoans(Request $request){

        if($request->ajax()){
            $loans = DB::table('loans')
                    ->join('customers', 'loans.customer_id', '=', 'customers.id')->get();
            return DataTables::of($loans)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $btn =  '<a href="#" class="btn btn-xs btn-primary mx-2"><i class="fas fa-eye"></i> View </a>';
                return $btn;
            })->rawColumns(['action'])
            ->make(true);
        }
 
    }
}
