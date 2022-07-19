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
    {!! Form::open(['action' => ['App\Http\Controllers\Admin\AdminPropertiesController@update', $properties->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', $properties->name, ['class' => 'form-control', 'placeholder' => 'Name']) }}
    </div>
    <div class="form-group">
        {{ Form::label('address', 'Address') }}
        {{ Form::text('address', $properties->address, ['class' => 'form-control', 'placeholder' => 'Address']) }}
    </div>
    <div class="form-group">
        {{ Form::label('price', 'Price') }}
        {{ Form::text('price', $properties->price, ['class' => 'form-control', 'placeholder' => 'Price']) }}
    </div>
    <div class="form-group">
        {{ Form::file('property_image') }}
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