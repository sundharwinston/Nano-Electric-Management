@extends('admin.layout.master')

@section('VehicleMenu','active open')

@section('content')
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href=" {{ url('admin/home') }}">Home</a></li>
              <li class="breadcrumb-item active">Vehicle</li>
            </ol>
          </div> 
          <div class="col-sm-6">
            <a href="{{action('AdminController\VehicleController@index')}}" class="btn btn-info float-right">View Vehicle</a>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<div class="card card-info">
  <div class="card-header">
    <h3 class="card-title">Vehicle Details</h3>
  </div>
    <div class="card-body">
       @if(isset($Vehicle))
            {!! Form::model($Vehicle,['url' => action('AdminController\VehicleController@update',$Vehicle->id),'method' => 'put','id'=>'VehicleForm']) !!}
       @else
            {!! Form::open(['url' =>action('AdminController\VehicleController@store'),'method' => 'post']) !!}
       @endif
            {{ csrf_field() }}                       
       <div class="row">
          <div class="col-sm-6{{ $errors->has('name') ? ' has-error' : '' }}">
             <div class="form-group">
                {!! Form::label('customer_name', 'Customer Name') !!}
                <div class="input-group">
                   <span class="input-group-text">@</span>
                   {!! Form::text('customer_name', null, ['class' => 'form-control','placeholder'=>'Customer Name']) !!}
                </div>
             </div>
          </div>
          <div class="col-sm-6{{ $errors->has('address') ? ' has-error' : '' }}">
             <div class="form-group">
                {!! Form::label('address', 'Address') !!}
                <div class="input-group">
                   {!! Form::textarea('address', null, ['class' => 'form-control','placeholder'=>'Address','rows'=>3]) !!}
                </div>
             </div>
          </div>
       </div>
       <div class="row">
          <div class="col-sm-6{{ $errors->has('mobile') ? ' has-error' : '' }}">
             <div class="form-group">
                {!! Form::label('mobile', 'Mobile1') !!}
                <div class="input-group">
                   <span class="input-group-text"><i class="fas fa-phone"></i></span>
                   {!! Form::text('mobile1', null, ['class' => 'form-control','placeholder'=>'Mobile']) !!}
                </div>
             </div>
          </div>
          <div class="col-sm-6{{ $errors->has('mobile1') ? ' has-error' : '' }}">
             <div class="form-group">
                {!! Form::label('mobile2', 'Mobile2') !!}
                <div class="input-group">
                   <span class="input-group-text"><i class="fas fa-phone"></i></span>
                   {!! Form::text('mobile2', null, ['class' => 'form-control','placeholder'=>'Mobile']) !!}
                </div>
             </div>
          </div>
       </div>
       <div class="row">
          <div class="col-sm-6{{ $errors->has('mobile') ? ' has-error' : '' }}">
             <div class="form-group">
                {!! Form::label('vehicle_id', 'Engine Id') !!}
                <div class="input-group">
                   <span class="input-group-text"><i class="fas fa-bezier-curve"></i></span>
                   {!! Form::text('vehicle_id', null, ['class' => 'form-control','placeholder'=>'Engine Id']) !!}
                </div>
             </div>
          </div>
          <div class="col-sm-6{{ $errors->has('mobile1') ? ' has-error' : '' }}">
             <div class="form-group">
                {!! Form::label('vehicle_model', 'Vehicle Model') !!}
                <div class="input-group">
                   <span class="input-group-text"><i class="fas fa-car"></i></span>
                   {!! Form::text('vehicle_model', null, ['class' => 'form-control','placeholder'=>'Vehicle Model']) !!}
                </div>
             </div>
          </div>
       </div>
       <div class="row">
          <div class="col-sm-6{{ $errors->has('mobile') ? ' has-error' : '' }}">
             <div class="form-group">
                {!! Form::label('vehicle_number', 'Vehicle Number') !!}
                <div class="input-group">
                   <span class="input-group-text"><i class="fas fa-sort-numeric-up-alt"></i></span>
                   {!! Form::text('vehicle_number', null, ['class' => 'form-control','placeholder'=>'Vehicle Number']) !!}
                </div>
             </div>
          </div>
       </div>
       <div class="row">
          <div class="col-sm-12">
             <div class="form-group">
                <div class="col-sm-12">
                   <p align="center">
                      <button type="submit" class="btn btn-info ">Submit</button>
                   </p>
                </div>
             </div>
          </div>
       </div>
       {!! Form::close() !!}
    </div>
</div>
 

@endsection
