@extends('layouts.app')
@section('fideles')
    style='background-color:rgba(0,0,0,0.3) !important; color:black important; pading-left:19px important!;'
@endsection
@section('content')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>MES FIDELES</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li class="active">MES FIDELES</li>
                        <li class="active"> @if(isset($eglise))
                                <a href="{{route('eglises')}}" class=' btn btn-info pull-right'><i class='fa fa-plus'></i>AJOUTER UNE EGLISE</a>
                            @endif</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-sm-12">
            <table id="table_fidele"  class='table table-bordered table-striped  no-wrap responsive '>
                <thead>
                <tr>
                    <th>id</th>
                    <th>PHOTO</th>
                    <th>NOM</th>
                    <th>PRENOMS</th>
                    <th>CONTACT</th>
                    <th>SITUATION MATREMONIAL</th>
                    <th>PROFESSION</th>
                    <th>NATIONALITE</th>
                    <th>EGLISE</th>
                    <th>ACTION</th>
                </tr>
                </thead>
                <tbody>
                @foreach($fideles as $fidele )
                    <tr>
                        <td> {{$fidele->id}}</td>
                        <td>{{$fidele->photo}}</td>
                        <td>{{$fidele->nom}}</td>
                        <td>{{$fidele->prenoms}}</td>
                        <td>{{$fidele->email}} {{$fidele->contact."/".$fidele->contact2}}</td>
                        <td>{{$fidele->sitmatrimonial}}</td>
                        <td>{{$fidele->profession}}</td>
                        <td>{{$fidele->nationalite}}</td>
                        <td>{{$fidele->id_eglise}}</td>
                        <td>
                            <a href="{{route('modifier_eglise',['id'=>$fidele->id])}}" data-toggle="modal">
                                <i class=" fa fa-pencil"> modifier</i>
                            </a>
                            <a href="{{route('supprimer_eglise',['id'=>$fidele->id])}}" data-toggle="modal" >
                                <i class=" fa fa-trash">Supprimer</i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
    <script src="{{ URL::asset('assets/js/vendor/jquery-2.1.4.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/lib/data-table/datatables.min.js') }}"></script>
    <script>
        (function($) {
            var table= $('#table_fidele').DataTable({
                language: {
                    url: "{{ URL::asset('js/French.json') }}"
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