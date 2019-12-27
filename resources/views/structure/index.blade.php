@extends('scaffold-interface.layouts.app') @section('title','Liste des Structures') @section('content') 
<section class="content">
    <h1>
        Liste des Structures
    </h1>
    <a href='{!!url("structure")!!}/create' class = 'btn btn-success'><i class="fa fa-plus"></i> Ajouter</a>
    <br>
    <br>
    <table class = "table table-striped table-bordered table-hover" style = 'background:#fff'>
        <thead>
            <th>Nom</th>
            <th>Description</th>
            <th>Telephone</th>
            <th>Email</th>
            <th>actions</th>
        </thead>
        <tbody>
            @foreach($structures as $structure) 
            <tr>
                <td>{!!$structure->nom!!}</td>
                <td>{!!$structure->description!!}</td>
                <td>{!!$structure->telephone!!}</td>
                <td>{!!$structure->email!!}</td>
                <td>
                    <a data-toggle="modal" data-target="#myModal" class = 'delete btn btn-danger btn-xs' data-link = "/structure/{!!$structure->id!!}/deleteMsg" ><i class = 'fa fa-trash'> supprimer</i></a>
                    <a href = '#' class = 'viewEdit btn btn-primary btn-xs' data-link = '/structure/{!!$structure->id!!}/edit'><i class = 'fa fa-edit'> modifier</i></a>
                    <a href = '#' class = 'viewShow btn btn-warning btn-xs' data-link = '/structure/{!!$structure->id!!}'><i class = 'fa fa-eye'> info</i></a>
                </td>
            </tr>
            @endforeach 
        </tbody>
    </table>
</section>
@endsection