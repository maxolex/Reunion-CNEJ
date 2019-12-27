@extends('scaffold-interface.layouts.app') @section('title','Liste des Personnels') @section('content') 
<section class="content">
    <h1>
        Liste des Personnels
    </h1>
    <a href='{!!url("personnel")!!}/create' class = 'btn btn-success'><i class="fa fa-plus"></i> Ajouter</a>
    <br>
    <br>
    <table class = "table table-striped table-bordered table-hover" style = 'background:#fff'>
        <thead>
            <th>structure</th>
            <th>Nom</th>
            <th>Prenoms</th>
            <th>Sexe</th>
            <th>Telephone</th>
            <th>Email</th>
            <th>actions</th>
        </thead>
        <tbody>
            @foreach($personnels as $personnel) 
            <tr>
                <td>{!!$personnel->structure->nom!!}</td>
                <td>{!!$personnel->nom!!}</td>
                <td>{!!$personnel->prenom!!}</td>
                <td>{!!$personnel->sexe!!}</td>
                <td>{!!$personnel->telephone!!}</td>
                <td>{!!$personnel->email!!}</td>
                <td>
                    <a data-toggle="modal" data-target="#myModal" class = 'delete btn btn-danger btn-xs' data-link = "/personnel/{!!$personnel->id!!}/deleteMsg" ><i class = 'fa fa-trash'> supprimer</i></a>
                    <a href = '#' class = 'viewEdit btn btn-primary btn-xs' data-link = '/personnel/{!!$personnel->id!!}/edit'><i class = 'fa fa-edit'> modifier</i></a>
                    <a href = '#' class = 'viewShow btn btn-warning btn-xs' data-link = '/personnel/{!!$personnel->id!!}'><i class = 'fa fa-eye'> info</i></a>
                </td>
            </tr>
            @endforeach 
        </tbody>
    </table>
</section>
@endsection