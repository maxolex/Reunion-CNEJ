@extends('scaffold-interface.layouts.app') @section('title','Affichage Structure') @section('content') 
<section class="content">
    <div class="box box-primary">
        <div class="box-header">
            <h1>
                Details Structure
            </h1>
        </div>
        <div class="box-body">
            <br>
            <a href='{!!url("structure")!!}' class = 'btn btn-primary'><i class="fa fa-home"></i>Liste des Structures</a>
            <br>
            <table class = 'table table-bordered'>
                <thead>
                    <th>Clé</th>
                    <th>Valeur</th>
                </thead>
                <tbody>
                    <tr>
                        <td> <b>Nom</b> </td>
                        <td>{!!$structure->nom!!}</td>
                    </tr>
                    <tr>
                        <td> <b>Description</b> </td>
                        <td>{!!$structure->description!!}</td>
                    </tr>
                    <tr>
                        <td> <b>Telephone</b> </td>
                        <td>{!!$structure->telephone!!}</td>
                    </tr>
                    <tr>
                        <td> <b>Email</b> </td>
                        <td>{!!$structure->email!!}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection