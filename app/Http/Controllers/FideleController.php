<?php

namespace App\Http\Controllers;

use App\Domaine;
use App\Eglise;
use App\Fidele;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FideleController extends Controller
{
    //
    public function lister_fideles(){
        $fideles=Fidele::all();
        return view('fideles/fideles',compact('fideles'));
    }
    public function gestion_fidele(){
        $eglises=Eglise::all();
        $domaines=Domaine::all();
        return view('fideles/gestion_fidele',compact('eglises','domaines'));
    }
    public function test_picker(){
        $eglises=Eglise::all();
        $domaines=Domaine::all();
        return view('fideles/test_picker',compact('eglises','domaines'));
    }
    public function save_fidele(Request $request){
        $parameters = $request->except(['_token']);

        $photo=$parameters['photo'];
        $nom=$parameters['nom'];
        $prenom=$parameters['prenoms'];
        $datenais = $parameters['datenaiss'];
        $lieunaiss = $parameters['lieunaiss'];
        $email = $parameters['email'];
        $contact1 = $parameters['contact1'];
        $contact2 = $parameters['contact2'];
        $sitmatrimonial = $parameters['sitmat'];
        $profession = $parameters['profession'];
        $nationalite = $parameters['nationnalite'];
        $id_eglise = $parameters['eglise'];
        $domaine = $parameters['domaine'];

        $date= new \DateTime(null);


        $fidele = new Fidele();
        $fidele->nom=$nom;
        $fidele->prenoms=$prenom;
        $fidele->datenais=$datenais;
        $fidele->lieunaiss=$lieunaiss;
        $fidele->email=$email;
        $fidele->contact=$contact1;
        $fidele->contact2=$contact2;
        $fidele->sitmatrimonial=$sitmatrimonial;
        $fidele->profession=$profession;
        $fidele->nationalite=$nationalite;
        $fidele->id_eglise=$id_eglise;
        $fidele->domaine=$domaine;
        $fidele->slug=Str::slug($nom.$prenom.$date->format('dmYhis'));

        if($request->file('photo')){
            $fidele->photo=$fidele->slug.'.'.$request->file('photo')->getClientOriginalExtension();

            //try catch
            try {
                $path = Storage::putFileAs(
                    'images', $request->file('photo'), $fidele->slug . '.' . $request->file('photo')->getClientOriginalExtension()
                );
            }catch (Exception $e){
                return redirect()->route('gestion_fidele')->with('error',$e->getMessage());
            }
            //fin try catch

        }else{
            $fidele->photo="";
        }
        if($request->file('cv')){
            $fidele->cv=$fidele->slug.'.'.$request->file('cv')->getClientOriginalExtension();

            //try catch
            try {
                $path = Storage::putFileAs(
                    'cv', $request->file('cv'), $fidele->slug . '.' . $request->file('cv')->getClientOriginalExtension()
                );
            }catch (Exception $e){
                return redirect()->route('gestion_fidele')->with('error',$e->getMessage());
            }
            //fin try catch

        }else{
            $fidele->cv="";
        }
        $fidele->save();
        return redirect()->route('gestion_fidele')->with('success',"Fidele bien enregistré");
    }
}
