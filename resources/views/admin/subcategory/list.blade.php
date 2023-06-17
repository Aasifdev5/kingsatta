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
            <h5>list SubCategory</h5>
                <div class="btn-group float-right" role="group">
  <a href="{{('/addsubcategory')}}" class="btn btn-outline-primary btn-sm rounded-circle">
    <i class="fas fa-plus"></i>
  </a>
</div>

          </div>
          <div class="card-body table-border-style">
            <div class="table-responsive">
              <table class="table table-striped" id="data-table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Category Name</th>
                    <th>Time</th>
                    <th>Date</th>
                    <th>Number</th>
                
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                     <?php $i = 1; ?>
        @foreach($datas as $u) 
                  <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $u->category_name }}</td>
                    <td>{{ $u->time }}</td>
                    <td>{{ $u->date }}</td>
                    <td>{{ $u->number }}</td>
                
                    <td>
                     <div class="btn-group" role="group">
                      <div class="btn-group float-right" role="group">
                    <a href="{{ url('editsubcategory', $u->id) }}" class="btn btn-outline-primary btn-sm rounded-circle">
                    <i class="fas fa-edit"></i>
                    </a>
                  </div>
                     
                     <br>
                      <div class="btn-group float-right" role="group">
                    <a href="{{ url('deletesubcategory', $u->id) }}" class="btn btn-outline-danger btn-sm rounded-circle">
                     <i class="fas fa-trash"></i>
                    </a>
                  </div>
                     </div>

                    </td>
                  </tr>
                <?php $i++; ?>
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




