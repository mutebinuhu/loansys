@extends('layouts.app');
@section('content')
                
                <!-- loan details -->
                <div class="card mb-5">
                      <div class="card-header">
                      <h3 class="card-title">Details for loan Released on</h3>
                     
                      </div>

                      <div class="card-body table-responsive px-5">
                       <table class="table table-hover text-nowrap  table-bordered loans-table">
                      <thead>
                      <tr>
                      <th>No</th>
                      <th>Customer</th>
                      <th>Created At</th>
                      <th>Loan Term</th>
                      <th>Interest</th>
                      <th>Payment per month</th>
                      <th>Start date</th>
                      <th>Loan Amount</th>
                      <th>Action</th>
                      </tr>
                      </thead>
                      <tbody>
                      </tbody>
                      </table>
                      </div>

</div>


@endsection

