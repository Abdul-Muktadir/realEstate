@extends('admin.main-layout')

@section('content-header')
    
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Property Form</h1>
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
    {!! Form::open(['action' => ['App\Http\Controllers\Admin\AdminVendorsController@update', $vendor->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
      <div class="col-sm-10">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', $vendor->name, ['class' => 'form-control', 'placeholder' => 'Name']) }}
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-10">
        {{ Form::label('email', 'Email') }}
        {{ Form::text('email', $vendor->email, ['class' => 'form-control', 'placeholder' => 'Email']) }}
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-10">
        {{ Form::hidden('password', $vendor->password, ['class' => 'form-control', 'placeholder' => 'Password']) }}
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-10">
        {{ Form::label('address', 'Address') }}
        {{ Form::text('address', $vendor->address, ['class' => 'form-control', 'placeholder' => 'Address']) }}
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-10">
        {{ Form::label('phone', 'Phone') }}
        {{ Form::text('phone', $vendor->phone, ['class' => 'form-control', 'placeholder' => 'Phone']) }}
      </div>
    </div>
    <p>Solicitor Details</p>
    <hr>
    <div class="form-group">
      <div class="col-sm-10">
        {{ Form::label('solicitor_name', 'Solicitor Name') }}
        {{ Form::text('solicitor_name', $vendor->solicitor_name, ['class' => 'form-control', 'placeholder' => 'Solicitor Name']) }}
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-10">
        {{ Form::label('solicitor_email', 'Solicitor Email') }}
        {{ Form::text('solicitor_email', $vendor->solicitor_email, ['class' => 'form-control', 'placeholder' => 'Solicitor Email']) }}
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-10">
        {{ Form::label('solicitor_phone', 'Solicitor Phone') }}
        {{ Form::text('solicitor_phone', $vendor->solicitor_phone, ['class' => 'form-control', 'placeholder' => 'Solicitor Phone']) }}
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-10">
        {{ Form::label('solicitor_address', 'Solicitor Address') }}
        {{ Form::text('solicitor_address', $vendor->solicitor_address, ['class' => 'form-control', 'placeholder' => 'Solicitor Address']) }}
      </div>
    </div>
    <div class="form-group row">
        <label for="inputExperience" class="col-sm-2 col-form-label">Vendor Image</label>
        <div class="col-sm-10">
        {{ Form::file('vendor_image') }}
        </div>
    </div>
        {{ Form::hidden('_method', 'PUT') }}
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