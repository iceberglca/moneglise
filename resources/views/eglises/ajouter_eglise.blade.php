@extends('layouts.app')
@section('ajouter_eglise')
    style='background-color:white !important; color:black important'
@endsection
@section('content')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>AJOUTER EGLISE</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li class="active">AJOUTER EGLISE</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <table id="table_eglise"  class='table table-bordered table-striped  no-wrap responsive '>
                <thead>
                <tr>
                    <th>id</th>
                    <th>SIGLE</th>
                    <th>LIBELLE</th>
                </tr>
                </thead>
                <tbody>
                @foreach($eglises as $eglise )
                    <tr>
                        <td> {{$eglise->id}}</td>
                        <td>{{$eglise->sigle}}</td>
                        <td>{{$eglise->libelle}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
    <script src="assets/js/lib/data-table/datatables.min.js"></script>
    <script>
        (function($) {
            var table= $('#table_eglise').DataTable({
                language: {
                    url: "js/French.json"
                },
                "ordering":false,
                "createdRow": function( row, data, dataIndex){

                },
                responsive: false,
                columnDefs: [
                    { responsivePriority: 2, targets: 0 },
                    { responsivePriority: 1, targets: -1 }
                ]
            }).column(0).visible(false)
        } )( jQuery );
    </script>
@endsection