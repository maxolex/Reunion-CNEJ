@extends('scaffold-interface.layouts.app') @section('title','Edition Thematique') @section('content') 
<section class="content">
    <div class="box box-primary">
        <div class="box-header">
            <h1>
                Editer Thematique
            </h1>
        </div>
        <div class="box-body">
            <a href="{!!url('thematique')!!}" class = 'btn btn-primary'><i class="fa fa-home"></i> Liste des Thematiques</a>
            <br>
            <form method = 'POST' action = '{!! url("thematique")!!}/{!!$thematique->
                id!!}/update'> 
                <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
                <div class="col-md-6 form-group">
                    <label>poles</label>
                    <select name = 'pole_id' class = "form-control">
                        @foreach($poles as $key => $value) 
                        <option value="{{$key}}">{{$value}}</option>
                        @endforeach 
                    </select>
                </div>
                <div class="col-md-6 form-group">
                    <label for="libelle">Libelle</label>
                    <input id="libelle" name = "libelle" type="text" class="form-control" value="{!!$thematique->
                    libelle!!}"> 
                </div>
                <div class="col-md-12">
                    <button class = 'btn btn-success' type ='submit'><i class="fa fa-floppy-o"></i> Mettre à jour</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection