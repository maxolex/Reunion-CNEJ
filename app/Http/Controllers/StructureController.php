<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Structure;
use Amranidev\Ajaxis\Ajaxis;
use MercurySeries\Flashy\Flashy;
use URL;
use Validator;

/**
 * Class StructureController.
 *
 * @author  The scaffold-interface created at 2019-12-27 12:39:03pm
 * @link  https://github.com/maxolex/scaffold-interface
 */
class StructureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Liste - structure';
        $structures = Structure::all();
        return view('structure.index',compact('structures','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Ajout - structure';
        
        return view(' structure.create');
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
            Structure::RULES
        );

        if ($validator->fails()) {
            return redirect(route('structure.index'))
                ->withErrors($validator)
                ->withInput();
        }

        $structure = new Structure();

        
        $structure->nom = $request->nom;

        
        $structure->description = $request->description;

        
        $structure->telephone = $request->telephone;

        
        $structure->email = $request->email;

        
        
        $structure->save();

        Flashy::success('Un element a été ajouté avec succès', route('structure.index'));

        $pusher = App::make('pusher');

        //default pusher notification.
        //by default channel=test-channel,event=test-event
        //Here is a pusher notification example when you create a new resource in storage.
        //you can modify anything you want or use it wherever.
        $pusher->trigger('test-channel',
                         'test-event',
                        ['message' => 'structure a été ajouté !!']);

        return redirect('structure');
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
        $title = 'Affichage - structure';

        if($request->ajax())
        {
            return URL::to('structure/'.$id);
        }

        $structure = Structure::findOrfail($id);
        return view('structure.show',compact('title','structure'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        $title = 'Edition - structure';
        if($request->ajax())
        {
            return URL::to('structure/'. $id . '/edit');
        }

        
        $structure = Structure::findOrfail($id);
        return view('structure.edit',compact('title','structure'  ));
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
            Structure::RULES_UPDATE
        );

        if ($validator->fails()) {
            return redirect(route('structure.edit',$id))
                ->withErrors($validator)
                ->withInput();
        }

        $structure = Structure::findOrfail($id);
    	
        $structure->nom = $request->nom;
        
        $structure->description = $request->description;
        
        $structure->telephone = $request->telephone;
        
        $structure->email = $request->email;
        
        
        $structure->save();

        Flashy::success('Un element a été modifié avec succès', route('structure.index'));

        return redirect('structure');
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
        $msg = Ajaxis::BtDeleting('Attention!!','êtes vous sûr de vouloir supprimer cet element?','/structure/'. $id . '/delete');

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
     	$structure = Structure::findOrfail($id);
     	$structure->delete();
        Flashy::success('Un element a été supprimé avec succès', route('structure.index'));
        return URL::to('structure');
    }
}
