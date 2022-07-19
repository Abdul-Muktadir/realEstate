@extends('admin.main-layout')

@section('content-header')
    
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Vendors</h1>
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
                @if (is_countable($vendors) && count($vendors) > 0)
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>vendor Image</th>
                    <th>vendor Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Solicitor Name</th>
                    <th>Solicitor Email</th>
                    <th>Solicitor Phone</th>
                    <th>Solicitor Address</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($vendors as $vendor)
                  <tr>
                    <td><img class="profile-user-img img-fluid img-circle"
                      src="/storage/vendor_images/{{$vendor->vendor_image}}"
                      alt="User profile picture"></td>
                    <td>{{$vendor->name}}</td>
                    <td>{{$vendor->email}}</td>
                    <td>{{$vendor->phone}}</td>
                    <td>{{$vendor->address}}</td>
                    <td>{{$vendor->solicitor_name}}</td>
                    <td>{{$vendor->solicitor_email}}</td>
                    <td>{{$vendor->solicitor_phone}}</td>
                    <td>{{$vendor->solicitor_address}}</td>
                    <td>
                      <a href="{{ route('adminvendors.edit', $vendor->id) }}" class="btn btn-default">Edit</a>
                    </td>
                    {{-- {{ url('edit_vendor/'.$vendor->id.'/editVendor') }} --}}
                    {{-- {{ route('adminvendor.edit', $property->id) }}  --}}
                    <td>
                        {!! Form::open(['action' => ['App\Http\Controllers\Admin\DashboardController@destroyVendor', $vendor->id], 'method' => 'POST', 'class' => 'pull-right']) !!}
                            {{ Form::hidden('_method', 'DELETE') }}
                            {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                        {!! Form::close() !!}
                    </td>
                  </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>vendor Image</th>
                      <th>vendor Name</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Address</th>
                      <th>Solicitor Name</th>
                      <th>Solicitor Email</th>
                      <th>Solicitor Phone</th>
                      <th>Solicitor Address</th>
                    </tr>
                  </tfoot>
                </table>
                <br>
                <div class="pagination"> 
                  <div class="text-center">{{ $vendors->links() }} 
                  </div>
                </div>
                @else
                  <div class="text-center">
                    <h3>You have no Properties!</h3>
                  </div>
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