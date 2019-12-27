@extends('scaffold-interface.layouts.app') @section('title','Liste des Poles') @section('content') 
<section class="content">
    <h1>
        Liste des Poles
    </h1>
    <a href='{!!url("pole")!!}/create' class = 'btn btn-success'><i class="fa fa-plus"></i> Ajouter</a>
    <br>
    <br>
    <table class = "table table-striped table-bordered table-hover" style = 'background:#fff'>
        <thead>
            <th>Libelle</th>
            <th>Commentaires</th>
            <th>actions</th>
        </thead>
        <tbody>
            @foreach($poles as $pole) 
            <tr>
                <td>{!!$pole->libelle!!}</td>
                <td>{!!$pole->commentaire!!}</td>
                <td>
                    <a data-toggle="modal" data-target="#myModal" class = 'delete btn btn-danger btn-xs' data-link = "/pole/{!!$pole->id!!}/deleteMsg" ><i class = 'fa fa-trash'> supprimer</i></a>
                    <a href = '#' class = 'viewEdit btn btn-primary btn-xs' data-link = '/pole/{!!$pole->id!!}/edit'><i class = 'fa fa-edit'> modifier</i></a>
                    <a href = '#' class = 'viewShow btn btn-warning btn-xs' data-link = '/pole/{!!$pole->id!!}'><i class = 'fa fa-eye'> info</i></a>
                </td>
            </tr>
            @endforeach 
        </tbody>
    </table>
</section>
@endsection