@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-6">
        <legend class="col-form-label">Product add</legend>
    </div>
</div>
<form action="{{route('productSave')}}" method="post">
  {{ csrf_field() }}
  <div class="form-group row justify-content-md-center">
    <label for="code" class="col-md-2 col-form-label">Code</label>
    <div class="col-md-6">
      <input type="text" class="form-control" id="code" name="code" placeholder="Product Code" value="{{ old('code') }}">
    </div>
  </div>
  <div class="form-group row justify-content-md-center">
    <label for="name" class="col-md-2 col-form-label">Name</label>
    <div class="col-md-6">
      <input type="text" class="form-control" id="name" name="name" placeholder="Product Name" value="{{ old('name') }}">
    </div>
  </div>

  @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif

  <div class="form-group row justify-content-md-center">
    <div class="col-md-1">
      <button type="submit" class="btn btn-primary">SAVE</button>
    </div>
  </div>
</form>        
@endsection