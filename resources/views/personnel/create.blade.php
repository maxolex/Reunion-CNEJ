@extends('scaffold-interface.layouts.app') @section('title','Ajout Personnel') @section('content') 
<section class="content">
    <div class="box box-primary">
        <div class="box-header">
            <h1>
                Ajout Personnel
            </h1>
        </div>
        <div class="box-body">
            <a href="{!!url('personnel')!!}" class = 'btn btn-danger'><i class="fa fa-home"></i> Liste des Personnels</a>
            <br>
            <form method = 'POST' action = '{!!url("personnel")!!}'>
                <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
                <div class="col-md-6 form-group">
                    <label>structures</label>
                    <select name = 'structure_id' class = 'form-control'>
                        @foreach($structures as $key => $value) 
                        <option value="{{$key}}">{{$value}}</option>
                        @endforeach 
                    </select>
                </div>
                <div class="col-md-6 form-group">
                    <label for="nom">Nom</label>
                    <input id="nom" name = "nom" type="text" class="form-control">
                </div>
                <div class="col-md-6 form-group">
                    <label for="prenom">Prenoms</label>
                    <input id="prenom" name = "prenom" type="text" class="form-control">
                </div>
                <div class="col-md-6 form-group">
                    <label for="sexe">Sexe</label>
                    <input id="sexe" name = "sexe" type="text" class="form-control">
                </div>
                <div class="col-md-6 form-group">
                    <label for="telephone">Telephone</label>
                    <input id="telephone" name = "telephone" type="text" class="form-control">
                </div>
                <div class="col-md-6 form-group">
                    <label for="email">Email</label>
                    <input id="email" name = "email" type="text" class="form-control">
                </div>
                <div class="col-md-12">
                    <button class = 'btn btn-success' type ='submit'> <i class="fa fa-floppy-o"></i> Sauvegarder</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection