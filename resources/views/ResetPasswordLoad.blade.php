

<!DOCTYPE html>
<html lang="en">

<head>

   <title>Ablepro</title>

   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <meta name="description" content="" />
   <meta name="keywords" content="">
   <meta name="author" content="Phoenixcoded" />
   <!-- Favicon icon -->
   <link rel="icon" href="{{asset('public/assets/images/favicon.ico')}}" type="image/x-icon">

   <!-- vendor css -->
   <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

</head>

<!-- [ auth-signin ] start -->

<div class="container" style="margin-top: 175px;">
   <div class="row">
     
         <div class="col-xl-12 col-lg-">
            <div class="card">
               <div class="card-header">
                  <div class="header-title">
                     <h4 class="card-title">Reset Password</h4>
                  </div>
               </div>
               <div class="card-body">
                  <div class="new-user-info">
                     <form action="{{route('ResetPassword')}}" method="post">
                        @if(Session::has('success'))
                        <div class="alert alert-success">{{Session::get('success')}}</div>
                        @endif
                        @if(Session::has('fail'))
                        <div class="alert alert-danger">{{Session::get('fail')}}</div>
                        @endif
                        @csrf

                        <input type="hidden" name="user_id" value="{{$customer[0]['id']}}">
                        <div class="row">

                           <div class="form-group col-md-12">

                              <input type="password" class="form-control" id="pass" value="{{old('new_password')}}"
                                 name="new_password" autofocus placeholder="New Password">
                              <span class="text-danger">@error ('new_password') {{$message}} @enderror</span>
                           </div>
                        </div>
                        <div class="row">

                           <div class="form-group col-md-12">

                              <input type="password" class="form-control" id="rpass" value="{{old('confirm_password')}}"
                                 name="confirm_password" placeholder="Confirm Password ">
                              <span class="text-danger">@error ('confirm_password') {{$message}} @enderror</span>
                           </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Reset Password</button>
                     </form>
                  </div>
               </div>
            </div>
         </div>
     

   </div>
</div>

