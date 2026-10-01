@extends('layout.admin-layout')

@section('title', 'Admin Dashboard')

@section('content')
<div class="row">
  <div class="col-lg-3 col-md-6">
    <div class="card">
      <div class="card-body">
        <h5>Total Users</h5>
        <h3>100</h3>
      </div>
    </div>
  </div>

  <div class="col-lg-3 col-md-6">
    <div class="card">
      <div class="card-body">
        <h5>Total Products</h5>
        <h3>50</h3>
      </div>
    </div>
  </div>
</div>
@endsection