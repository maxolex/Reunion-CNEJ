<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Personnel;
use Amranidev\Ajaxis\Ajaxis;
use MercurySeries\Flashy\Flashy;
use URL;
use Validator;

use App\Structure;


/**
 * Class PersonnelController.
 *
 * @author  The scaffold-interface created at 2019-12-27 12:47:30pm
 * @link  https://github.com/maxolex/scaffold-interface
 */
class PersonnelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Liste - personnel';
        $personnels = Personnel::all();
        return view('personnel.index',compact('personnels','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Ajout - personnel';
        
        $structures = Structure::all()->pluck('nom','id');
        
        return view(' personnel.create',compact('title','structures'  ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            Personnel::RULES
        );

        if ($validator->fails()) {
            return redirect(route('personnel.index'))
                ->withErrors($validator)
                ->withInput();
        }

        $personnel = new Personnel();

        
        $personnel->nom = $request->nom;

        
        $personnel->prenom = $request->prenom;

        
        $personnel->sexe = $request->sexe;

        
        $personnel->telephone = $request->telephone;

        
        $personnel->email = $request->email;

        
        
        $personnel->structure_id = $request->structure_id;

        
        $personnel->save();

        Flashy::success('Un element a été ajouté avec succès', route('personnel.index'));

        $pusher = App::make('pusher');

        //default pusher notification.
        //by default channel=test-channel,event=test-event
        //Here is a pusher notification example when you create a new resource in storage.
        //you can modify anything you want or use it wherever.
        $pusher->trigger('test-channel',
                         'test-event',
                        ['message' => 'personnel a été ajouté !!']);

        return redirect('personnel');
    }

    /**
     * Display the specified resource.
     *
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function show($id,Request $request)
    {
        $title = 'Affichage - personnel';

        if($request->ajax())
        {
            return URL::to('personnel/'.$id);
        }

        $personnel = Personnel::findOrfail($id);
        return view('personnel.show',compact('title','personnel'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        $title = 'Edition - personnel';
        if($request->ajax())
        {
            return URL::to('personnel/'. $id . '/edit');
        }

        
        $structures = Structure::all()->pluck('nom','id');

        
        $personnel = Personnel::findOrfail($id);
        return view('personnel.edit',compact('title','personnel' ,'structures' ) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function update($id,Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            Personnel::RULES_UPDATE
        );

        if ($validator->fails()) {
            return redirect(route('personnel.edit',$id))
                ->withErrors($validator)
                ->withInput();
        }

        $personnel = Personnel::findOrfail($id);
    	
        $personnel->nom = $request->nom;
        
        $personnel->prenom = $request->prenom;
        
        $personnel->sexe = $request->sexe;
        
        $personnel->telephone = $request->telephone;
        
        $personnel->email = $request->email;
        
        
        $personnel->structure_id = $request->structure_id;

        
        $personnel->save();

        Flashy::success('Un element a été modifié avec succès', route('personnel.index'));

        return redirect('personnel');
    }

    /**
     * Delete confirmation message by Ajaxis.
     *
     * @link      https://github.com/amranidev/ajaxis
     * @param    \Illuminate\Http\Request  $request
     * @return  String
     */
    public function DeleteMsg($id,Request $request)
    {
        $msg = Ajaxis::BtDeleting('Attention!!','êtes vous sûr de vouloir supprimer cet element?','/personnel/'. $id . '/delete');

        if($request->ajax())
        {
            return $msg;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param    int $id
     * @return  \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     	$personnel = Personnel::findOrfail($id);
     	$personnel->delete();
        Flashy::success('Un element a été supprimé avec succès', route('personnel.index'));
        return URL::to('personnel');
    }
}
