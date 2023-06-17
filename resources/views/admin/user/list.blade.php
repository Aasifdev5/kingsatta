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
                     <table class="table table-striped" id="data-table">
                        <thead>
                           <tr>
                              <th>#</th>
                              <th>First Name</th>
                              <th>Last Name</th>
                              <th>Username</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <td>1</td>
                              <td>Mark</td>
                              <td>Otto</td>
                              <td>@mdo</td>
                              <td>
                                 <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-outline-primary btn-sm rounded-circle">
                                       <i class="fas fa-edit"></i>
                                    </button>
                                    <button type="button" class="btn btn-outline-danger btn-sm rounded-circle">
                                       <i class="fas fa-trash"></i>
                                    </button>
                                 </div>

                              </td>
                           </tr>


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