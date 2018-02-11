@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-6">
        <legend class="col-form-label">Product list</legend>
    </div>
    <div class="col-md-6">
        <a href="{{route('productAdd')}}" class="btn btn-primary pull-right">ADD</a>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered table-hover" id="productList" 
                cellspacing="0" width="100%" data-change-link="{{route('productChange')}}">
            <thead>
                <tr>
                    <th>CODE</th>
                    <th>NAME</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@endsection

@push('css-plugin')
<!-- Data Tables-->
<link rel="stylesheet" href="{{asset('plugin/datatables/dataTables.bootstrap4.min.css')}}"></script>
@endpush

@push('js-plugin')
<!-- Data Tables-->
<script src="{{asset('plugin/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugin/datatables/dataTables.bootstrap4.min.js')}}"></script>
@endpush

@push('scripts')
<script>
$('#productList').DataTable( {
    "processing": true,
    "serverSide": true,
    "lengthMenu": [ 5, 10, 25, 50, 100 ],
    "ajax": {   
        "url":"{{route('productList')}}",
        "data": function ( data ) { data.page = (data.start/data.length)+1; }
    },
    "createdRow": function( row, data, dataIndex ) {
        $(row).data('id', data.id );
    },
    "columns":[
        {"data":"code"},
        {"data":"name"},
    ]
} );

$('body').on('click','#productList>tbody tr',function () {
    window.location.href = $('#productList').data('change-link')+ '/' +$(this).data('id');
});

</script>
@endpush