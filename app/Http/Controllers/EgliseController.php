<?php

namespace App\Http\Controllers;

use App\Eglise;
use Illuminate\Http\Request;

class EgliseController extends Controller
{
    //
    public function lister_eglise(){
        $eglises=Eglise::all();
        return view('eglises/eglises',compact('eglises'));
    }

    public function save_eglise(Request $request){
        $parameters = $request->except(['_token']);

        $sigle=$parameters['sigle'];
        $libelle=$parameters['libelle'];
$eglise = new Eglise();
        $eglise->sigle=$sigle;
        $eglise->libelle=$libelle;
        $eglise->save();
        return redirect()->route('eglises')->with('success',"Eglise bien enregistrer");
    }
    public function update_eglise(Request $request){
        $parameters = $request->except(['_token']);

        $id=$parameters['id'];

        $sigle=$parameters['sigle'];
        $libelle=$parameters['libelle'];
        $eglise = Eglise::find($id);
        $eglise->sigle=$sigle;
        $eglise->libelle=$libelle;
        $eglise->save();
        return redirect()->route('eglises')->with('success',"Eglise bien modifié");
    }
    public function modifier_eglise($id){
        $eglises=Eglise::all();
        $eglise=Eglise::find($id);
        return view('eglises/eglises',compact('eglises','eglise'));
    }
    public function supprimer_eglise($id){
        $eglise=Eglise::find($id);
        $eglise->delete();
        return redirect()->route('eglises')->with('success',"Eglise bien supprimé");
    }
}
