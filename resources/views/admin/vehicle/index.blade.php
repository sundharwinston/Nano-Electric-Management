@extends('admin.layout.master')

@section('VehicleMenu','active open')

@section('content')

 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="{{ url('admin/home') }}">Home</a></li>
              <li class="breadcrumb-item active">vehicle</li>
            </ol>
          </div> 
          <div class="col-sm-6">
             <a href="{{action('AdminController\VehicleController@create')}}" class="btn btn-info float-right">Add Vehicle</a>
          </div>
        </div>
      </div>
</section>

 <div class="card card-info">
   <div class="card-header">
      <h3 class="card-title">Vehicles Info</h3>
   </div>
   <meta name="csrf-token" content="{{ csrf_token() }}">
   <div class="card-body">
      <div class="table-responsive">
         <table id="VehicleDetailsTable" class="table table-bordered table-striped">
            <thead>
               <tr>
                  <th>CustomerName</th>
                  <th>Address</th>
                  <th>Mobile Number</th>
                  <th>Engin Id</th>
                  <th>Vehicle Model</th>
                  <th>Vehicle Number</th>
                  <th>Action</th>
               </tr>
            </thead>
         </table>
      </div>
   </div>
</div>


@endsection

@section('script')
<script>
    var VehicleDetails = $('#VehicleDetailsTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ action('AdminController\VehicleController@index') }}',
        "columns": [
            {data: 'customer_name', name: 'customer_name'},
            {data: 'mobile1', name: 'mobile1'},
            {data: 'address', name: 'address'},
            {data: 'vehicle_id', name: 'vehicle_id'},
            {data: 'vehicle_model', name: 'vehicle_model'},
            {data: 'vehicle_number', name: 'vehicle_number'},
            {data: 'action', name: 'action'}
        ]
    });

        $('#VehicleDetailsTable').on('click', '.Delete', function (e) { 
            e.preventDefault();
            var url = $(this).attr('href');
            var DeleteMessage = $(this).attr('DeleteMessage');
            swal({
                title: "Are you sure?",
                text: DeleteMessage,
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel!",
                closeOnConfirm: false,
                closeOnCancel: false
            },function(isConfirm) {
                if (isConfirm) {
                    $.ajax(
                        {headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        url: url,
                        type: 'DELETE',
                        dataType: 'json',
                    }).always(function (data) {
                        VehicleDetails.ajax.reload();
                        swal("Deleted!", data.msg, data.status);
                    });
                } else {
                    swal("Cancelled", "Your Data is safe", "error");
                }
            });
        });
</script>

@endsection


