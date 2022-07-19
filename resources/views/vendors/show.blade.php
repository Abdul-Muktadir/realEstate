@extends('vendors.main-layout')

@section('content-header')
    
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Vendor</h1>
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
    
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-md-3">
            @if (auth('vendor')->check())
                
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="/storage/vendor_images/{{Auth::guard('vendor')->user()->vendor_image}}"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{Auth::guard('vendor')->user()->name}}</h3>

                <p class="text-muted text-center">{{Auth::guard('vendor')->user()->email}}</p>

                <p class="text-muted text-center">{{Auth::guard('vendor')->user()->phone}}</p>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Solicitor</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> {{Auth::guard('vendor')->user()->name}}</strong>

                <p class="text-muted">
                  {{Auth::guard('vendor')->user()->solicitor_address}}
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> {{Auth::guard('vendor')->user()->solicitor_email}}</strong>

                <p class="text-muted">{{Auth::guard('vendor')->user()->solicitor_phone}}</p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active">Settings</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <!-- /.tab-pane -->

                    <form class="form-horizontal">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input value="{{Auth::guard('vendor')->user()->name}}" type="email" class="form-control" id="inputName" disabled placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input value="{{Auth::guard('vendor')->user()->email}}" type="email" class="form-control" id="inputEmail" disabled placeholder="Email">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Phone</label>
                        <div class="col-sm-10">
                          <input value="{{Auth::guard('vendor')->user()->phone}}" type="text" class="form-control" id="inputName2" disabled placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-10">
                          <input value="{{Auth::guard('vendor')->user()->address}}" type="text" class="form-control" id="inputSkills" disabled placeholder="Skills">
                        </div>
                      </div>
                      {{-- <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                      </div> --}}
                    </form>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
              @endif
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
 @endsection