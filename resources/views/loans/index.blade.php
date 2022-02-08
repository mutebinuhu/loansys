@extends('layouts.app');
@section('content')
   <div class="table-responsive">
              <div class="card">
              <div class="card-header ui-sortable-handle" style="cursor: move;">
                <h3 class="card-title">
                  <i class="fas fa-users mr-1"></i>
                  Loans
                </h3>
                <div class="card-tools">
                  <ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                      <a class="nav-link active" href="#" data-toggle="modal" data-target="#exampleModalCenter" >Add Customer</a>
                    </li>
                    
                  </ul>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body ">
                <table class="table table-bordered loans-table ">
                        <thead>
                            <tr>
                              <th>Customer</th>
                              <th>Phone</th>
                              <th>Loan Amount</th>
                              <th>Expected Amount</th>
                              <th>End date</th>
                              <th width="100px">Action</th>
                          </tr>
                      </thead>
                      <tbody>
                      </tbody>
                  </table>
              </div><!-- /.card-body -->
            </div>
            </div>

@endsection

