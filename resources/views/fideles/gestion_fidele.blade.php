@extends('layouts.app')
@section('gestion_fidele')
    style='background-color:rgba(0,0,0,0.3) !important; color:black important; pading-left:19px important!;'
@endsection
@section('content')

    <!-- Latest compiled and minified JavaScript -->

    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>GESTION FIDELE</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li class="active">GESTION FIDELE</li>
                        <li class="active"> @if(isset($eglise))
                                <a href="{{route('eglises')}}" class=' btn btn-info pull-right'><i class='fa fa-plus'></i>AJOUTER UNE EGLISE</a>
                            @endif</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <DIV class="row">

        <div class="col-sm-6" style="height: 100%">
            <form  class="form-control" action="{{isset($eglise)? route('update_eglise'): route('save_fidele')}}">
            @csrf
                <small>photo de taille <= 1 Mo et de type jpeg ou png</small>
            <div class="form-group">

                <input type="hidden" value="{{isset($eglise)?$eglise->id:''}}" name="id"/>

                <img src="{{ URL::asset('images/User.png') }}" width="200px" height="200px" id="rendu_img" />
                <input type="file" class="form-control" id="photo" name="photo" placeholder="photo" value="{{isset($eglise)? $eglise->sigle: ""}}" required>
            </div>
            <div class="form-group ">

                <input type="text" class="form-control" id="nom" name="nom" placeholder="NOM" value="{{isset($eglise)? $eglise->sigle: ""}}" required>
            </div>
            <div class="form-group ">

                <input type="text" class="form-control" id="prenoms" name="prenoms" placeholder="PRENOMS" value="{{isset($eglise)? $eglise->sigle: ""}}" required>
            </div>
            <div class="form-group ">

                <input type="date" class="form-control" id="datenaiss" name="datenaiss" placeholder="DATE DE NAISSANCE" value="{{isset($eglise)? $eglise->sigle: ""}}" required>
            </div>
            <div class="form-group ">

                <input type="text" class="form-control" id="lieunaiss" name="lieunaiss" placeholder="LIEU DE NAISSANCE" value="{{isset($eglise)? $eglise->sigle: ""}}" required>
            </div>
                <div class="form-group ">

                    <input type="text" class="form-control" id="nationnalite" name="nationnalite" placeholder="NATIONNALITE" value="{{isset($eglise)? $eglise->sigle: ""}}" required>
                </div>

        </div>


            <div class="col-sm-6">

                <div class="form-group ">
                    <input type="hidden" value="{{isset($eglise)?$eglise->id:''}}" name="id"/>

                    <input type="text" class="form-control" id="email" name="email" placeholder="E-email" value="{{isset($eglise)? $eglise->sigle: ""}}" required>
                </div>
                <div class="form-group ">
                    <input type="hidden" value="{{isset($eglise)?$eglise->id:''}}" name="id"/>

                    <input type="text" class="form-control" id="contact1" name="contact1" placeholder="CONTACT" value="{{isset($eglise)? $eglise->sigle: ""}}" required>
                </div>
                <div class="form-group ">
                    <input type="hidden" value="{{isset($eglise)?$eglise->id:''}}" name="id"/>

                    <input type="text" class="form-control" id="contact2" name="contact2" placeholder="CONTACT" value="{{isset($eglise)? $eglise->sigle: ""}}" required>
                </div>
                <div class="form-group col-sm-3">

                  <label>Celibataire :</label>  <input type="radio" class="form-control" id="sitmat" name="sitmat" placeholder="SITUATION MATRIMONIALs" value="1" required>
                </div>
                <div class="form-group col-sm-3">
                    <label>marié(e) :</label>  <input type="radio" class="form-control" id="sitmat" name="sitmat" placeholder="SITUATION MATRIMONIALs" value="2" required>
                </div>
                <div class="form-group col-sm-3">
                    <label>divorcé(e)</label> <input type="radio" class="form-control" id="sitmat" name="sitmat" placeholder="SITUATION MATRIMONIALs" value="{3" required>
                </div>
                <div class="form-group col-sm-3">
                  <label>veuf(ve)</label> <input type="radio" class="form-control" id="sitmat" name="sitmat" placeholder="SITUATION MATRIMONIALs" value="4" required>

                </div>
                <div class="form-group">
                    <select multiple id="domaine" name="domaine"class="form-control">
                     @foreach($domaines as $domaine)
                         <option value="{{$domaine->id}}">{{$domaine->libelle}}</option>
                         @endforeach
                    </select>
                      </div>
                <div class="form-group">
                    <select  id="eglise" name="eglise" class="form-control">
                        <option></option>
                        @foreach($eglises as $eglise1)
                            <option value="{{$eglise1->id}}">{{$eglise1->libelle.' ('.$eglise1->sigle.')'}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label> Curriculum vitae</label></br>
                    <label id="etatpdf"></label></br>
                    <img src="{{ URL::asset('images/pdf.png') }}" width="50px" height="50px" id="rendu_pdf" />
                    <input type="file" placeholder="Curriculum vitae" name="cv" id="cv"/>

                </div>

                <div class="form-group ">
                    <input type="text" class="form-control" id="profession" name="profession" placeholder="PROFESSION" value="{{isset($eglise)? $eglise->sigle: ""}}" required>
                </div>
                <div class="form-group ">
                    <button class=" btn btn-success">{{isset($eglise)? "MODIFIER": "ENREGISTRER"}}</button>
                </div>
        </form>
            </div>


    </DIV>

    <script>
        (function($) {

            $("#domaine").select2({
                placeholder: "Choisir vos domaines d'activités",
                allowClear: true
            });
            $("#eglise").select2({
                placeholder: "Sélectionnez votre eglise",
                allowClear: true
            });


            function readURL(input) {

                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        console.log(input.files[0]);
                        console.log(input.files[0].type);
                        if(input.files[0].type=="image/jpeg" || input.files[0].type=="image/png" ){
                            if(input.files[0].size<=1000024){

                                console.log('cool');
                                $('#rendu_img').attr('src', e.target.result);
                            }else{
                                alert('trop volumineux');

                                input.value='';
                                $('#rendu_img').attr('src','images/user.png');
                            }
                        }else{
                            alert('le ficher doit être de type jpeg ou png exclusivement');

                            input.value='';
                            $('#rendu_img').attr('src','images/user.png');
                        }


                    }

                    reader.readAsDataURL(input.files[0]);

                }else{
                    $('#rendu_img').attr('src','images/user.png');
                }
            }

            $("#photo").change(function() {
                readURL(this);
            });
            $("#reset").click(function() {
                $('#rendu_img').attr('src','images/user.png');
            });
            // pour l'importation du cv
            function readURLcv(input) {

                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        console.log(input.files[0]);
                        console.log(input.files[0].type);
                        if(input.files[0].type=="application/pdf"){
                            if(input.files[0].size<=1000024){

                                console.log('cool');

                            }else{
                                alert('trop volumineux');

                                input.value='';
                            }
                        }else{
                            alert('le ficher doit être de type pdf exclusivement');

                            input.value='';
                        }


                    }

                    reader.readAsDataURL(input.files[0]);

                }else{

                }
            }

            $("#cv").change(function() {
                readURLcv(this);
            });
            $("#reset").click(function() {
                $('#rendu_pdf').attr('src','images/pdf.png');
            });
        } )( jQuery );

    </script>

@endsection