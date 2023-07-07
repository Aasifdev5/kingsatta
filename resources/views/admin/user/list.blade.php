@include('admin.layout.header')

@include('admin.layout.sidebar')

@include('admin.layout.nav')

<section class="pcoded-main-container">
   <div class="pcoded-content">
      <!-- [ breadcrumb ] start -->
      <div class="page-header">
         <div class="page-block">
            <div class="row align-items-center">
               <div class="col-md-12">
                  <div class="page-header-title">
                     <h5 class="m-b-10">Bootstrap Basic Tables</h5>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <!-- [ Main Content ] start -->
      <div class="row">
         <!-- [ striped-table ] start -->
         <div class="col-xl-12">
            <div class="card">
               <div class="card-header">
                  <a href="add_distributor">Add User</a>
               </div>
               <div class="card-body table-border-style">
                  <div class="table-responsive">
                     <table id="datatable" class="table table-striped" data-toggle="data-table">
                        @if(Session::has('success'))
                        <div class="alert alert-success">{{Session::get('success')}}</div>
                        @endif
                        @if(Session::has('fail'))
                        <div class="alert alert-danger">{{Session::get('fail')}}</div>
                        @endif
                        <thead>
                           <tr class="ligth">
                              <th>#</th>
                              <th> Name</th>
                              <th> Username</th>
                              <th>Password</th>

                           </tr>
                        </thead>
                        <?php
                        // $session = session()->all();
                        // echo "<pre>";
                        // print_r($session);
                        // echo "</pre>";
                        ?>
                        <tbody>
                           <?php $count = 1; ?>
                           @foreach($data1 as $row)
                           <?php


                           ?>
                           <tr>
                              <td><?php echo $count++; ?></td>
                              <td>{{$row->name}}</td>
                              <td>{{$row->email}}</td>
                              <td>{{$row->password}}</td>
                           </tr>
                           <?php ?>
                           @endforeach
                        </tbody>
                     </table>
                  </div>
               </div>
               <div class="card-footer">
                  <div class="row">

                     <div class="col-sm-6">
                        <div class="dataTables_paginate paging_simple_numbers">
                           <ul class="pagination justify-content-end" id="pagination"></ul>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- [ striped-table ] end -->
      </div>
      <!-- [ Main Content ] end -->
   </div>
</section>

@include('admin.layout.footer')