@extends('admin.main-layout')

@section('content-header')
    
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Add Vendor Form</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

@endsection
@section('body')




        <div class="card-body">
            <div class="tab-content">
              <!-- /.tab-pane -->

                <form class="form-horizontal" action="{{route('postVendor')}}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                      <input name="name" type="text" class="form-control" id="inputName" placeholder="Name">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input name="email" type="email" class="form-control" id="inputEmail" placeholder="Email">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputName2" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                      <input name="password" type="password" class="form-control" id="inputName2" placeholder="Password">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputExperience" class="col-sm-2 col-form-label">Phone</label>
                    <div class="col-sm-10">
                      <input name="phone" type="text" class="form-control" id="inputSkills" placeholder="Phone">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputSkills" class="col-sm-2 col-form-label">Address</label>
                    <div class="col-sm-10">
                      <input name="address" type="text" class="form-control" id="inputSkills" placeholder="Address">
                    </div>
                  </div>
                  <p>Solicitor Details</p>
                  <hr>
                  <div class="form-group row">
                    <label for="inputSkills" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                      <input name="solicitor_name" type="text" class="form-control" id="inputSkills" placeholder="Solicitor Name">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputSkills" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input name="solicitor_email" type="text" class="form-control" id="inputSkills" placeholder="Solicitor Email">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputSkills" class="col-sm-2 col-form-label">Phone</label>
                    <div class="col-sm-10">
                      <input name="solicitor_phone" type="text" class="form-control" id="inputSkills" placeholder="Solicitor Phone">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputSkills" class="col-sm-2 col-form-label">Address</label>
                    <div class="col-sm-10">
                      <input name="solicitor_address" type="text" class="form-control" id="inputSkills" placeholder="Solicitor Address">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputSkills" class="col-sm-2 col-form-label">Vendor Image</label>
                    <div class="col-sm-10">
                      <input name="vendor_image" type="file">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Submit</button>
                    </div>
                  </div>
                </form>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.card-body -->
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection