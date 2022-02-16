@extends('layouts.app')

@section('content')
	          <!-- customers card -->

                      <section class="col-lg-12"> 
                    @if(session()->has('message'))
                          <div class="alert alert-success" id="confirm-add-user">
                                {{session()->get('message')}}
                          </div>
                    @endif 

                     

                     @yield('content')
                     @if($errors->any())
                     <div class="col-4 " id="errors">
                        @foreach($errors->all() as $error)
                          <div class="bg-danger py-2 my-2 px-2">{{$error}}</div>
                        @endforeach
                      </div>
                    @endif
                 </section>
              <div class="table-responsive">
              <div class="card">
              <div class="card-header ui-sortable-handle" style="cursor: move;">
                <h3 class="card-title">
                  <i class="fas fa-users mr-1"></i>
                  Customers
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
                <table class="table table-bordered data-table ">
                        <thead>
                            <tr>
                              <th>No</th>
                              <th>Name</th>
                              <th>Phone</th>
                              <th>Location</th>

                              <th width="100px">Action</th>
                          </tr>
                      </thead>
                      <tbody>
                      </tbody>
                  </table>
              </div><!-- /.card-body -->
            </div>
            </div>
          </div>
                  <!-- /.card-body -->
          <!-- customers card -->

          <!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Create User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="/customers">
          @csrf

                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name:</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter name">
                  </div>
                  <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Location</label>
                    <input type="text" name="location" class="form-control" id="location" placeholder="Location">
                  </div>
                   <div class="form-group">
                    <label for="phone ">Phone Number</label>
                    <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone">
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

@endsection