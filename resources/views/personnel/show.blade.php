@extends('scaffold-interface.layouts.app') @section('title','Affichage Personnel') @section('content') 
<section class="content">
    <div class="box box-primary">
        <div class="box-header">
            <h1>
                Details Personnel
            </h1>
        </div>
        <div class="box-body">
            <br>
            <a href='{!!url("personnel")!!}' class = 'btn btn-primary'><i class="fa fa-home"></i>Liste des Personnels</a>
            <br>
            <table class = 'table table-bordered'>
                <thead>
                    <th>Clé</th>
                    <th>Valeur</th>
                </thead>
                <tbody>
                    <tr>
                        <td> <b>Nom</b> </td>
                        <td>{!!$personnel->nom!!}</td>
                    </tr>
                    <tr>
                        <td> <b>Prenoms</b> </td>
                        <td>{!!$personnel->prenom!!}</td>
                    </tr>
                    <tr>
                        <td> <b>Sexe</b> </td>
                        <td>{!!$personnel->sexe!!}</td>
                    </tr>
                    <tr>
                        <td> <b>Telephone</b> </td>
                        <td>{!!$personnel->telephone!!}</td>
                    </tr>
                    <tr>
                        <td> <b>Email</b> </td>
                        <td>{!!$personnel->email!!}</td>
                    </tr>
                    <tr>
                        <td> <b>structure : </b> </td>
                        <td>{!!$personnel->structure->nom!!}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection