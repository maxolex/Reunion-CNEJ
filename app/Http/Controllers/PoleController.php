<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pole;
use Amranidev\Ajaxis\Ajaxis;
use MercurySeries\Flashy\Flashy;
use URL;
use Validator;

/**
 * Class PoleController.
 *
 * @author  The scaffold-interface created at 2019-12-27 12:48:36pm
 * @link  https://github.com/maxolex/scaffold-interface
 */
class PoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Liste - pole';
        $poles = Pole::all();
        return view('pole.index',compact('poles','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Ajout - pole';
        
        return view(' pole.create');
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
            Pole::RULES
        );

        if ($validator->fails()) {
            return redirect(route('pole.index'))
                ->withErrors($validator)
                ->withInput();
        }

        $pole = new Pole();

        
        $pole->libelle = $request->libelle;

        
        $pole->commentaire = $request->commentaire;

        
        
        $pole->save();

        Flashy::success('Un element a été ajouté avec succès', route('pole.index'));

        $pusher = App::make('pusher');

        //default pusher notification.
        //by default channel=test-channel,event=test-event
        //Here is a pusher notification example when you create a new resource in storage.
        //you can modify anything you want or use it wherever.
        $pusher->trigger('test-channel',
                         'test-event',
                        ['message' => 'pole a été ajouté !!']);

        return redirect('pole');
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
        $title = 'Affichage - pole';

        if($request->ajax())
        {
            return URL::to('pole/'.$id);
        }

        $pole = Pole::findOrfail($id);
        return view('pole.show',compact('title','pole'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        $title = 'Edition - pole';
        if($request->ajax())
        {
            return URL::to('pole/'. $id . '/edit');
        }

        
        $pole = Pole::findOrfail($id);
        return view('pole.edit',compact('title','pole'  ));
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
            Pole::RULES_UPDATE
        );

        if ($validator->fails()) {
            return redirect(route('pole.edit',$id))
                ->withErrors($validator)
                ->withInput();
        }

        $pole = Pole::findOrfail($id);
    	
        $pole->libelle = $request->libelle;
        
        $pole->commentaire = $request->commentaire;
        
        
        $pole->save();

        Flashy::success('Un element a été modifié avec succès', route('pole.index'));

        return redirect('pole');
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
        $msg = Ajaxis::BtDeleting('Attention!!','êtes vous sûr de vouloir supprimer cet element?','/pole/'. $id . '/delete');

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
     	$pole = Pole::findOrfail($id);
     	$pole->delete();
        Flashy::success('Un element a été supprimé avec succès', route('pole.index'));
        return URL::to('pole');
    }
}
