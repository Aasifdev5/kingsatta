@include('admin.layout.header')



@include('admin.layout.nav')


<div class="row">
   <center>
      <div class="col-xl-10 col-lg-12">
         <div class="card">
            <div class="card-header d-flex ">
               <div class="header-title">
                  <h4 class="card-title">Add User</h4>
               </div>
            </div>
            <div class="card-body">
               <div class="new-user-info">
                  <form action="{{url('save_distributor')}}" method="POST" class="form-horizontal">
                     @if(Session::has('success'))
                     <div class="alert alert-success">{{Session::get('success')}}</div>
                     @endif
                     @if(Session::has('fail'))
                     <div class="alert alert-danger">{{Session::get('fail')}}</div>
                     @endif
                     @csrf
                     <div class="form-group row">
                        <label class="control-label col-sm-3 align-self-center mb-0" for="email1"> Name
                           :</label>
                        <div class="col-sm-9">
                           <input type="text" class="form-control" id="distributor_name" name="distributor_name" value="{{old('distributor_name')}}" placeholder="Enter Distributor Name">
                           <span class="text-danger">@error ('distributor_name') {{$message}} @enderror</span>
                        </div>
                     </div>
                     <div class="form-group row">
                        <label class="control-label col-sm-3 align-self-center mb-0" for="email1">
                           Email:</label>
                        <div class="col-sm-9">
                           <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}" placeholder="Enter Distributor Email">
                           <span class="text-danger">@error ('email') {{$message}} @enderror</span>
                        </div>
                     </div>

                     <div class="form-group row">
                        <label class="control-label col-sm-3 align-self-center mb-0" for="pass">
                           Password:</label>
                        <div class="col-sm-9">

                           <input type="password" class="form-control" id="pass" value="{{old('password')}}" name="password" placeholder="Password">
                           <span class="text-danger">@error ('password') {{$message}} @enderror</span>
                        </div>
                     </div>

                     <div class="form-group">
                        <div class="col-sm-12">
                           <button type="submit" class="btn btn-primary btn-block pull-right"> Save
                           </button>
                        </div>

                     </div>
                  </form>

               </div>
            </div>
         </div>
      </div>
   </center>

</div>