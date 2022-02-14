<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use DataTables;
use Alert;


class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        
        if($request->ajax()){
            $customers = Customer::latest()->get();
            return DataTables::of($customers)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){

                        $btn = '<div class="d-flex justify-content-between">'.
                            '<a href="customers/'.$row->id.'" class="btn btn-xs btn-primary mx-2"><i class="fas fa-eye"></i> View </a>'.

                        '<a href="customers/'.$row->id.'" class="btn btn-xs btn-danger"><i class="fas fa-trash-alt"></i> Delete </a>'
                        .'</div>';

                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
                'name'=>'required',
                'location'=>'required',
                'phone'=>'required|unique:customers',
        ]);

        Customer::create([
                'name'=>$request->name,
                'location'=>$request->location,
                'phone'=>$request->phone,
                'email'=>$request->email,

        ]);
        Alert::success('Success', 'Customer Successfully Registered');
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
        return view('customers.show', ['customer'=>$customer]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $id = Customer::find($id);
        $id->delete();
        return redirect('/')->with('status', 'Customer Deleted');
   
    }

}
