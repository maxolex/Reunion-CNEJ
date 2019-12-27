@extends('scaffold-interface.layouts.app') @section('title','Ajout Pole') @section('content') 
<section class="content">
    <div class="box box-primary">
        <div class="box-header">
            <h1>
                Ajout Pole
            </h1>
        </div>
        <div class="box-body">
            <a href="{!!url('pole')!!}" class = 'btn btn-danger'><i class="fa fa-home"></i> Liste des Poles</a>
            <br>
            <form method = 'POST' action = '{!!url("pole")!!}'>
                <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
                <div class="col-md-6 form-group">
                    <label for="libelle">Libelle</label>
                    <input id="libelle" name = "libelle" type="text" class="form-control">
                </div>
                <div class="col-md-6 form-group">
                    <label for="commentaire">Commentaires</label>
                    <input id="commentaire" name = "commentaire" type="text" class="form-control">
                </div>
                <div class="col-md-12">
                    <button class = 'btn btn-success' type ='submit'> <i class="fa fa-floppy-o"></i> Sauvegarder</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection