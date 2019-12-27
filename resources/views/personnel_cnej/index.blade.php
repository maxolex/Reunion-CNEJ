@extends('scaffold-interface.layouts.app') @section('title','Liste des Personnel CNEJs') @section('content') 
<section class="content">
    <h1>
        Liste des Personnel CNEJs
    </h1>
    <a href='{!!url("personnel_cnej")!!}/create' class = 'btn btn-success'><i class="fa fa-plus"></i> Ajouter</a>
    <br>
    <br>
    <table class = "table table-striped table-bordered table-hover" style = 'background:#fff'>
        <thead>
            <th>Nom</th>
            <th>Prenoms</th>
            <th>actions</th>
        </thead>
        <tbody>
            @foreach($personnel_cnejs as $personnel_cnej) 
            <tr>
                <td>{!!$personnel_cnej->nom!!}</td>
                <td>{!!$personnel_cnej->prenom!!}</td>
                <td>
                    <a data-toggle="modal" data-target="#myModal" class = 'delete btn btn-danger btn-xs' data-link = "/personnel_cnej/{!!$personnel_cnej->id!!}/deleteMsg" ><i class = 'fa fa-trash'> supprimer</i></a>
                    <a href = '#' class = 'viewEdit btn btn-primary btn-xs' data-link = '/personnel_cnej/{!!$personnel_cnej->id!!}/edit'><i class = 'fa fa-edit'> modifier</i></a>
                    <a href = '#' class = 'viewShow btn btn-warning btn-xs' data-link = '/personnel_cnej/{!!$personnel_cnej->id!!}'><i class = 'fa fa-eye'> info</i></a>
                </td>
            </tr>
            @endforeach 
        </tbody>
    </table>
</section>
@endsection