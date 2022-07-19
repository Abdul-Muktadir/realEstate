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

    {!! Form::open(['action' => ['App\Http\Controllers\Admin\AdminVendorsController@store'], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group row">
        <label for="inputExperience" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
        {{ Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name']) }}
        </div>
    </div>
    <div class="form-group row">
        <label for="inputExperience" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
        {{ Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'Email']) }}
        </div>
    </div>
    <div class="form-group row">
        <label for="inputExperience" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
        {{ Form::text('password', '', ['class' => 'form-control', 'placeholder' => 'Password']) }}
        </div>
    </div>
    <div class="form-group row">
        <label for="inputExperience" class="col-sm-2 col-form-label">Phone</label>
        <div class="col-sm-10">
        {{ Form::text('phone', '', ['class' => 'form-control', 'placeholder' => 'Phone']) }}
        </div>
    </div>
    <div class="form-group row">
        <label for="inputExperience" class="col-sm-2 col-form-label">Address</label>
        <div class="col-sm-10">
        {{ Form::text('address', '', ['class' => 'form-control', 'placeholder' => 'Address']) }}
        </div>
    </div>
    <div class="form-group row">
        <label for="inputExperience" class="col-sm-2 col-form-label">Solicitor Name</label>
        <div class="col-sm-10">
        {{ Form::text('solicitor_name', '', ['class' => 'form-control', 'placeholder' => 'Solicitor Name']) }}
        </div>
    </div>
    <div class="form-group row">
        <label for="inputExperience" class="col-sm-2 col-form-label">Solicitor Email</label>
        <div class="col-sm-10">
        {{ Form::text('solicitor_email', '', ['class' => 'form-control', 'placeholder' => 'Solicitor Email']) }}
        </div>
    </div>
    <div class="form-group row">
        <label for="inputExperience" class="col-sm-2 col-form-label">Solicitor Phone</label>
        <div class="col-sm-10">
        {{ Form::text('solicitor_phone', '', ['class' => 'form-control', 'placeholder' => 'Solicitor Phone']) }}
        </div>
    </div>
    <div class="form-group row">
        <label for="inputExperience" class="col-sm-2 col-form-label">Solicitor Address</label>
        <div class="col-sm-10">
        {{ Form::text('solicitor_address', '', ['class' => 'form-control', 'placeholder' => 'Solicitor Address']) }}
        </div>
    </div>
    <div class="form-group row">
        <label for="inputExperience" class="col-sm-2 col-form-label">Vendor Image</label>
        <div class="col-sm-10">
        {{ Form::file('vendor_image') }}
        </div>
    </div>
        {{ Form::submit('submit', ['class' => 'btn btn-primary']) }}
    {!! Form::close() !!}
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