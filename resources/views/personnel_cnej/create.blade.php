@extends('scaffold-interface.layouts.app') @section('title','Ajout Personnel CNEJ') @section('content') 
<section class="content">
    <div class="box box-primary">
        <div class="box-header">
            <h1>
                Ajout Personnel CNEJ
            </h1>
        </div>
        <div class="box-body">
            <a href="{!!url('personnel_cnej')!!}" class = 'btn btn-danger'><i class="fa fa-home"></i> Liste des Personnel CNEJs</a>
            <br>
            <form method = 'POST' action = '{!!url("personnel_cnej")!!}'>
                <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
                <div class="col-md-6 form-group">
                    <label for="nom">Nom</label>
                    <input id="nom" name = "nom" type="text" class="form-control">
                </div>
                <div class="col-md-6 form-group">
                    <label for="prenom">Prenoms</label>
                    <input id="prenom" name = "prenom" type="text" class="form-control">
                </div>
                <div class="col-md-12">
                    <button class = 'btn btn-success' type ='submit'> <i class="fa fa-floppy-o"></i> Sauvegarder</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection