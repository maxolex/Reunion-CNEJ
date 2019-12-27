@extends('scaffold-interface.layouts.app') @section('title','Liste des Thematiques') @section('content') 
<section class="content">
    <h1>
        Liste des Thematiques
    </h1>
    <a href='{!!url("thematique")!!}/create' class = 'btn btn-success'><i class="fa fa-plus"></i> Ajouter</a>
    <br>
    <br>
    <table class = "table table-striped table-bordered table-hover" style = 'background:#fff'>
        <thead>
            <th>pole</th>
            <th>Libelle</th>
            <th>actions</th>
        </thead>
        <tbody>
            @foreach($thematiques as $thematique) 
            <tr>
                <td>{!!$thematique->pole->libelle!!}</td>
                <td>{!!$thematique->libelle!!}</td>
                <td>
                    <a data-toggle="modal" data-target="#myModal" class = 'delete btn btn-danger btn-xs' data-link = "/thematique/{!!$thematique->id!!}/deleteMsg" ><i class = 'fa fa-trash'> supprimer</i></a>
                    <a href = '#' class = 'viewEdit btn btn-primary btn-xs' data-link = '/thematique/{!!$thematique->id!!}/edit'><i class = 'fa fa-edit'> modifier</i></a>
                    <a href = '#' class = 'viewShow btn btn-warning btn-xs' data-link = '/thematique/{!!$thematique->id!!}'><i class = 'fa fa-eye'> info</i></a>
                </td>
            </tr>
            @endforeach 
        </tbody>
    </table>
</section>
@endsection