@extends('layouts.app')
@section('eglises')
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
        <div class="col-sm-6">

            <form class="form-control" action="{{isset($eglise)? route('update_eglise'): route('save_eglise')}}">
                @csrf
                <div class="form-group ">
                    <input type="hidden" value="{{isset($eglise)?$eglise->id:''}}" name="id"/>
                    <label for="sigle">SIGLE :</label>
                    <input type="text" class="form-control" id="sigle" name="sigle" placeholder="SIGLE" value="{{isset($eglise)? $eglise->sigle: ""}}" required>
                </div>
                <div class="form-group ">
                    <label for="libelle">Libelle :</label>
                    <input type="text" class="form-control" id="libelle" name="libelle" placeholder="SIGLE" value="{{isset($eglise)? $eglise->sigle: ""}}" required>
                </div>
                <div class="form-group ">
                    <button class="btn-success">{{isset($eglise)? "MODIFIER": "ENREGISTRER"}}</button>
                </div>
            </form>

        </div>
        <div class="col-sm-6">
            <table id="table_eglise"  class='table table-bordered table-striped  no-wrap responsive '>
                <thead>
                <tr>
                    <th>id</th>
                    <th>SIGLE</th>
                    <th>LIBELLE</th>
                    <th>ACTION</th>
                </tr>
                </thead>
                <tbody>
                @foreach($eglises as $eglise )
                    <tr>
                        <td> {{$eglise->id}}</td>
                        <td>{{$eglise->sigle}}</td>
                        <td>{{$eglise->libelle}}</td>
                        <td>
                            <a href="{{route('modifier_eglise',['id'=>$eglise->id])}}" data-toggle="modal">
                                <i class=" fa fa-pencil"> modifier</i>
                            </a>
                            <a href="{{route('supprimer_eglise',['id'=>$eglise->id])}}" data-toggle="modal" >
                                <i class=" fa fa-trash">Supprimer</i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
    <script src="{{ URL::asset('assets/js/lib/data-table/datatables.min.js') }}"></script>
    <script>
        (function($) {
            var table= $('#table_eglise').DataTable({
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