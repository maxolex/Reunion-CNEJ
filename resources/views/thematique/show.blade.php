@extends('scaffold-interface.layouts.app') @section('title','Affichage Thematique') @section('content') 
<section class="content">
    <div class="box box-primary">
        <div class="box-header">
            <h1>
                Details Thematique
            </h1>
        </div>
        <div class="box-body">
            <br>
            <a href='{!!url("thematique")!!}' class = 'btn btn-primary'><i class="fa fa-home"></i>Liste des Thematiques</a>
            <br>
            <table class = 'table table-bordered'>
                <thead>
                    <th>Clé</th>
                    <th>Valeur</th>
                </thead>
                <tbody>
                    <tr>
                        <td> <b>Libelle</b> </td>
                        <td>{!!$thematique->libelle!!}</td>
                    </tr>
                    <tr>
                        <td> <b>pole : </b> </td>
                        <td>{!!$thematique->pole->libelle!!}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection