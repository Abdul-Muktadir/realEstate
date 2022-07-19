@extends('vendors.main-layout')

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

      <form class="form-horizontal" action="{{ route('properties.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
          <label for="inputName" class="col-sm-2 col-form-label">name</label>
          <div class="col-sm-10">
            <input name="name" type="text" class="form-control" id="inputName" placeholder="Name">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputExperience" class="col-sm-2 col-form-label">Address</label>
          <div class="col-sm-10">
            <input name="address" type="text" class="form-control" id="inputSkills" placeholder="Phone">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputSkills" class="col-sm-2 col-form-label">Price</label>
          <div class="col-sm-10">
            <input name="price" type="text" class="form-control" id="inputSkills" placeholder="Address">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputSkills" class="col-sm-2 col-form-label">Property Image</label>
          <div class="col-sm-10">
            <input name="property_image" type="file">
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