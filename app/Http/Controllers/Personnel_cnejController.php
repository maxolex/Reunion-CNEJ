<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Personnel_cnej;
use Amranidev\Ajaxis\Ajaxis;
use MercurySeries\Flashy\Flashy;
use URL;
use Validator;

/**
 * Class Personnel_cnejController.
 *
 * @author  The scaffold-interface created at 2019-12-27 12:47:57pm
 * @link  https://github.com/maxolex/scaffold-interface
 */
class Personnel_cnejController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Liste - personnel_cnej';
        $personnel_cnejs = Personnel_cnej::all();
        return view('personnel_cnej.index',compact('personnel_cnejs','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Ajout - personnel_cnej';
        
        return view(' personnel_cnej.create');
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
            Personnel_cnej::RULES
        );

        if ($validator->fails()) {
            return redirect(route('personnel_cnej.index'))
                ->withErrors($validator)
                ->withInput();
        }

        $personnel_cnej = new Personnel_cnej();

        
        $personnel_cnej->nom = $request->nom;

        
        $personnel_cnej->prenom = $request->prenom;

        
        
        $personnel_cnej->save();

        Flashy::success('Un element a été ajouté avec succès', route('personnel_cnej.index'));

        $pusher = App::make('pusher');

        //default pusher notification.
        //by default channel=test-channel,event=test-event
        //Here is a pusher notification example when you create a new resource in storage.
        //you can modify anything you want or use it wherever.
        $pusher->trigger('test-channel',
                         'test-event',
                        ['message' => 'personnel_cnej a été ajouté !!']);

        return redirect('personnel_cnej');
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
        $title = 'Affichage - personnel_cnej';

        if($request->ajax())
        {
            return URL::to('personnel_cnej/'.$id);
        }

        $personnel_cnej = Personnel_cnej::findOrfail($id);
        return view('personnel_cnej.show',compact('title','personnel_cnej'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        $title = 'Edition - personnel_cnej';
        if($request->ajax())
        {
            return URL::to('personnel_cnej/'. $id . '/edit');
        }

        
        $personnel_cnej = Personnel_cnej::findOrfail($id);
        return view('personnel_cnej.edit',compact('title','personnel_cnej'  ));
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
            Personnel_cnej::RULES_UPDATE
        );

        if ($validator->fails()) {
            return redirect(route('personnel_cnej.edit',$id))
                ->withErrors($validator)
                ->withInput();
        }

        $personnel_cnej = Personnel_cnej::findOrfail($id);
    	
        $personnel_cnej->nom = $request->nom;
        
        $personnel_cnej->prenom = $request->prenom;
        
        
        $personnel_cnej->save();

        Flashy::success('Un element a été modifié avec succès', route('personnel_cnej.index'));

        return redirect('personnel_cnej');
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
        $msg = Ajaxis::BtDeleting('Attention!!','êtes vous sûr de vouloir supprimer cet element?','/personnel_cnej/'. $id . '/delete');

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
     	$personnel_cnej = Personnel_cnej::findOrfail($id);
     	$personnel_cnej->delete();
        Flashy::success('Un element a été supprimé avec succès', route('personnel_cnej.index'));
        return URL::to('personnel_cnej');
    }
}
