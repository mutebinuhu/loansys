@extends('layouts.app')
@section('content')
		<div class="row">
    
		<div class="col-md-12">
        @if(session('status'))
                <div class="alert alert-success errors">{{session('status')}}</div>

            @endif
          @if(session('message'))

                <div class="alert alert-success errors">{{session('message')}}</div>

          @endif

      @if($errors->any())
        @foreach($errors->all() as $error)
          <div class="alert alert-danger errors">
            {{$error}}
          </div>
        @endforeach
      @endif
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
             <div class="d-flex justify-content-between">
               <form method="POST" action="{{route('customers.destroy', $customer->id)}}"  id="delete-form">
                @csrf
                @method('DELETE')
                  <div class="icon px-2 py-2 text-danger">
                <i class="fas fa-trash-alt"></i>
              </div>
               </form>
              <a href="#" data-toggle="modal" data-target="#editcustomer">
                <div class="icon px-2 py-2 text-info">
                <i class="far fa-edit"></i>
              </div>
              </a>
             </div>
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" src="http://simpleicon.com/wp-content/uploads/user1.svg" alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{$customer->email}}</h3>

                <p class="text-muted text-center">{{$customer->location}}</p>
                <p class="text-muted text-center">0{{$customer->phone}}</p>

                  <?php 
                        use Carbon\Carbon;
                        use Carbon\CarbonPeriod;
                   ?>
                <p class="text-muted text-center">Member Since: {{Carbon::parse($customer->created_at)->format('Y-m-d')}}</p>
                <div class="d-flex justify-content-between">
                    <h3>Previous Loans</h3>
                    <a href="#" class="btn btn-info mb-2" data-toggle="modal" data-target="#exampleModalCenter" ><b>Add Loan</b><i class="fas fa-plus px-2"></i></a>
                  </div>
               


                  @foreach($customer->loans as $loan)
              
                <!-- loan details -->
                <div class="card mb-5">
                      <div class="card-header">
                      <h3 class="card-title">Details for loan Released on {{Carbon::parse($loan->created_at)->format('Y-m-d')}}</h3>
                     
                      </div>

                      <div class="card-body table-responsive p-0">
                       <table class="table table-hover text-nowrap">
                      <thead>
                      <tr>
                      <th>Loan Amount</th>
                      <th>Interest Rate</th>
                      <th>Release Date</th>
                      <th>Payment per month</th>
                      <th>Expected Amount</th>
                      <th>Loan End Date</th>
                      <th>Loan Term</th>
                      <th class="text-center">Payment Dates</th>


                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                      <td> <span class="text-lg">{{$loan->loan_amount}}</span>/=</td>
                      <td>{{$loan->loan_interest_rate}} %</td>
                      <td><strong>{{$loan->created_at}}</strong></td>
                      <td> {{$loan->payment_per_month}}/=</td>
                      <td> {{$loan->expected_amount}}/=</td>
                      <td>{{$loan->loan_end_date}}</td>
                      <td>{{$loan->loan_term}} Month(s)</td>
                      <td>
                        
                        <?php
                            /*calculate the load payment period*/
                           
                            $period =  CarbonPeriod::create($loan->loan_start_date, '1 month', $loan->loan_end_date);
                            $period->toArray();

                              foreach($period as $date){
                                  echo "
                                    <div class='d-flex justify-content-between '>
                                      <div class=''>
                                          <p><strong>$date</strong></p>
                                      </div>
                                      <div>
                                          <form>
                                            <div class='form-group'>
                                              <div class='form-check'>
                                                <input class='form-check-input confirm' type='checkbox' onclick='confirmSubmit()'>
                                                <label class='form-check-label'>Accept Payment</label>
                                              </div>
                                            </div>
                                        </form>
                                      </div>
                                    </div>";

                              }

                           ?>
                      </td>

                      </tr>

                      </tbody>
                      </table>
                      </div>

</div>
                <!-- loan details -->


                  @endforeach


              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
          
            <!-- /.card -->
        </div>
          </div>

                    <!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Add Loan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="/loans" autocomplete="off">
          @csrf
                <div class="card-body">
                  <input type="hidden" name="customer_id" value="{{$customer->id}}">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Amount:</label>
                    <input type="text" name="loan_amount" class="form-control" id="loan_amount" placeholder="Enter Amount">
                  </div>
                  <div class="form-group">
                    <label for="email">Interest (%)</label>
                    <input type="number" min="0" max="100" name="loan_interest_rate" class="form-control loan_interest_rate" id="loan_interest_rate" placeholder="Enter Interest">
                  </div>
                  <div class="row">
                      <div class="form-group col-md-6">
                    <label for="exampleInputPassword1">Start Date (months)</label>
                    <input type="date" name="loan_start_date" class="form-control" id="loan_start_date" placeholder="Start Date">
                  </div>
                   <div class="form-group col-md-6">
                    <label for="exampleInputPassword1">Duration (months)</label>
                    <input type="text" name="loan_term" class="form-control" id="loan_term" placeholder="Duration">
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- edit customer model -->
<div class="modal fade" id="editcustomer" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Edit User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{route('customers.update', $customer->id)}}">
          @csrf
          @method('PATCH')

                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name:</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="" value="{{$customer->name}}">
                  </div>
                  <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="" value="{{$customer->email}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Location</label>
                    <input type="text" name="location" class="form-control" id="location" value="{{$customer->location}}">
                  </div>
                   <div class="form-group">
                    <label for="phone ">Phone Number</label>
                    <input type="text" name="phone" class="form-control" id="phone" value="0{{$customer->phone}}">
                  </div>
                 
                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- loan payment Dates -->

<script type="text/javascript">
  const confirmSubmit = () =>{
    const confirm = document.getElementsByClassName('confirm');
  for(let i = 0; i <= confirm.length; i++){
    confirm[i].addEventListener("click", () =>{
      const agree = confirm("Are You sure ?");
      if(agree){
        return true;
      }else{
        return false;
      }
    })
  }
  }
</script>
@endsection