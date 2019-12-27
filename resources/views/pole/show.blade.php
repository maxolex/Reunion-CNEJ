@extends('scaffold-interface.layouts.app') @section('title','Affichage Pole') @section('content') 
<section class="content">
    <div class="box box-primary">
        <div class="box-header">
            <h1>
                Details Pole
            </h1>
        </div>
        <div class="box-body">
            <br>
            <a href='{!!url("pole")!!}' class = 'btn btn-primary'><i class="fa fa-home"></i>Liste des Poles</a>
            <br>
            <table class = 'table table-bordered'>
                <thead>
                    <th>Clé</th>
                    <th>Valeur</th>
                </thead>
                <tbody>
                    <tr>
                        <td> <b>Libelle</b> </td>
                        <td>{!!$pole->libelle!!}</td>
                    </tr>
                    <tr>
                        <td> <b>Commentaires</b> </td>
                        <td>{!!$pole->commentaire!!}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection