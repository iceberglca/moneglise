@extends('layouts.app')
@section('test_picker')
    style='background-color:rgba(0,0,0,0.3) !important; color:black important; pading-left:19px important!;'
@endsection
@section('content')

    <div class="form-group">
        <select class=" form-control selectpicker"  multiple data-done-button="true" name="domaine[]" data-live-search="true" data-size="6" noneSelectedText="SELECTIONNER UN DOMAINE" >
            @foreach($domaines as $domaine)
                <option value="{{$domaine->id}}">{{$domaine->libelle}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-lg-10">
        <select id="country" name="country" class="form-control selectpicker">
            <option>Argentina</option>
            <option>United State</option>
            <option>Mexico</option>
        </select>

        <p class="help-block">No service available in the selected country</p>
    </div>

@endsection