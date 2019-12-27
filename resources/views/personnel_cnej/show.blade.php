@extends('scaffold-interface.layouts.app') @section('title','Affichage Personnel CNEJ') @section('content') 
<section class="content">
    <div class="box box-primary">
        <div class="box-header">
            <h1>
                Details Personnel CNEJ
            </h1>
        </div>
        <div class="box-body">
            <br>
            <a href='{!!url("personnel_cnej")!!}' class = 'btn btn-primary'><i class="fa fa-home"></i>Liste des Personnel CNEJs</a>
            <br>
            <table class = 'table table-bordered'>
                <thead>
                    <th>Clé</th>
                    <th>Valeur</th>
                </thead>
                <tbody>
                    <tr>
                        <td> <b>Nom</b> </td>
                        <td>{!!$personnel_cnej->nom!!}</td>
                    </tr>
                    <tr>
                        <td> <b>Prenoms</b> </td>
                        <td>{!!$personnel_cnej->prenom!!}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection