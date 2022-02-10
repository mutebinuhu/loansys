@extends('layouts.app')
@section('content')
		<div class="row">
    
		<div class="col-md-6">
        @if(session('status'))
                <div class="alert alert-success errors">{{session('status')}}</div>

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
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" src="../../dist/img/user4-128x128.jpg" alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{$customer->email}}</h3>

                <p class="text-muted text-center">{{$customer->location}}</p>
                <h3>Previous Loans</h3>
                  <?php 
                        use Carbon\Carbon;
                        use Carbon\CarbonPeriod;
                   ?>

                  @foreach($customer->loans as $loan)
                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <div>
                      <h2>LOAN DETAILS</h2>
                      <p><strong>Loan Amount: </strong> <span class="text-lg">{{$loan->loan_amount}}</span>/=</p>
                      <p><strong>Loan Interest Rate: </strong> {{$loan->loan_interest_rate}} %</p>
                      <p><strong>Loan Date: </strong> {{$loan->created_at}}</p>
                      <p><strong>Payment per month: </strong> {{$loan->payment_per_month}}/=</p>
                      <p><strong>Expected Amount: </strong> {{$loan->expected_amount}}/=</p>
                      <p><strong>Loan Start Date: </strong> {{$loan->loan_start_date}}</p>
                      <p><strong>Loan End Date: </strong> {{$loan->loan_end_date}}</p>
                      <p><strong>Loan Term: </strong> {{$loan->loan_term}} Month(s)</p>
                    </div>
                    <div class="card">
                     <div class="card-body">
                        <div class="card-header d-flex justify-content-between py-2 px-2">
                          <h4 class="">PAYMENT DATES FOR LOAN GIVEN ON <strong>{{$loan->created_at}}</strong></h4>
                        </div>
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
                      
                    </div>
                     </div>
                  </li>
                 

                </ul>


                  @endforeach


                <a href="#" class="btn btn-primary btn-block" data-toggle="modal" data-target="#exampleModalCenter" ><b>Add Loan</b></a>
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