@extends('admin.main-layout')

@section('content-header')
    
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Properties</h1>
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
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                @if (is_countable($properties) && count($properties) > 0)
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Property Image</th>
                    <th>Property Name</th>
                    <th>Address</th>
                    <th>Price</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($properties as $property)
                  <tr>
                    <td><img class="profile-user-img img-fluid img-circle"
                      src="/storage/property_images/{{$property->property_image}}"
                      alt="User profile picture"></td>
                    <td>
                      {{$property->name}}
                    </td>
                    <td>{{$property->address}}</td>
                    <td> {{$property->price}}</td>
                    <td>
                      <a href="{{ route('adminproperties.edit', $property->id) }}" class="btn btn-default">Edit</a>
                    </td>
                    <td>
                        {!! Form::open(['action' => ['App\Http\Controllers\Admin\AdminPropertiesController@destroy', $property->id], 'method' => 'POST', 'class' => 'pull-right']) !!}
                            {{ Form::hidden('_method', 'DELETE') }}
                            {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                        {!! Form::close() !!}
                    </td>
                  </tr>
                  </tbody>
                    @endforeach
                    <tfoot>
                      <tr>
                        <th>Property Image</th>
                        <th>Property Name</th>
                        <th>Address</th>
                        <th>Price</th>
                      </tr>
                    </tfoot>
                </table>
                <br>
                <div class="pagination"> 
                  <div class="text-center">{{ $properties->links() }} 
                  </div>
                </div>
                @else
                {{ __('You have no Properties!') }}
                @endif
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
 @endsection