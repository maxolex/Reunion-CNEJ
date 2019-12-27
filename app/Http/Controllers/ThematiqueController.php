<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Thematique;
use Amranidev\Ajaxis\Ajaxis;
use MercurySeries\Flashy\Flashy;
use URL;
use Validator;

use App\Pole;


/**
 * Class ThematiqueController.
 *
 * @author  The scaffold-interface created at 2019-12-27 12:49:34pm
 * @link  https://github.com/maxolex/scaffold-interface
 */
class ThematiqueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Liste - thematique';
        $thematiques = Thematique::all();
        return view('thematique.index',compact('thematiques','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Ajout - thematique';
        
        $poles = Pole::all()->pluck('libelle','id');
        
        return view(' thematique.create',compact('title','poles'  ));
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
            Thematique::RULES
        );

        if ($validator->fails()) {
            return redirect(route('thematique.index'))
                ->withErrors($validator)
                ->withInput();
        }

        $thematique = new Thematique();

        
        $thematique->libelle = $request->libelle;

        
        
        $thematique->pole_id = $request->pole_id;

        
        $thematique->save();

        Flashy::success('Un element a été ajouté avec succès', route('thematique.index'));

        $pusher = App::make('pusher');

        //default pusher notification.
        //by default channel=test-channel,event=test-event
        //Here is a pusher notification example when you create a new resource in storage.
        //you can modify anything you want or use it wherever.
        $pusher->trigger('test-channel',
                         'test-event',
                        ['message' => 'thematique a été ajouté !!']);

        return redirect('thematique');
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
        $title = 'Affichage - thematique';

        if($request->ajax())
        {
            return URL::to('thematique/'.$id);
        }

        $thematique = Thematique::findOrfail($id);
        return view('thematique.show',compact('title','thematique'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        $title = 'Edition - thematique';
        if($request->ajax())
        {
            return URL::to('thematique/'. $id . '/edit');
        }

        
        $poles = Pole::all()->pluck('libelle','id');

        
        $thematique = Thematique::findOrfail($id);
        return view('thematique.edit',compact('title','thematique' ,'poles' ) );
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
            Thematique::RULES_UPDATE
        );

        if ($validator->fails()) {
            return redirect(route('thematique.edit',$id))
                ->withErrors($validator)
                ->withInput();
        }

        $thematique = Thematique::findOrfail($id);
    	
        $thematique->libelle = $request->libelle;
        
        
        $thematique->pole_id = $request->pole_id;

        
        $thematique->save();

        Flashy::success('Un element a été modifié avec succès', route('thematique.index'));

        return redirect('thematique');
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
        $msg = Ajaxis::BtDeleting('Attention!!','êtes vous sûr de vouloir supprimer cet element?','/thematique/'. $id . '/delete');

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
     	$thematique = Thematique::findOrfail($id);
     	$thematique->delete();
        Flashy::success('Un element a été supprimé avec succès', route('thematique.index'));
        return URL::to('thematique');
    }
}
