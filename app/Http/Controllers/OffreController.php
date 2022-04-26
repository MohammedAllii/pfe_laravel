<?php

namespace App\Http\Controllers;
use App\Offre;
use Illuminate\Http\Request;
use Carbon\Carbon;
class OffreController extends Controller
{
    public function registeroffre(){
        $offre = Offre::create([
            'poste' => request('poste'),
            'lieu_travail' => request('lieu_travail'),
            'contrat' =>request('contrat'),
            'temps_travail' =>request('temps_travail'),
            'salaire' =>request('salaire'),
            'periode' =>request('periode'),
            'description' =>request('description'),
            'id_company' =>request('id_company')
        ]);
        return response()->json($offre);
    }
    public function alloffres(){
        $offre = Offre::all();
        Carbon::setlocale('fr');
        foreach($offre as $offres){
            $offres->setAttribute('added',Carbon::parse($offres->created_at)->diffForHumans());
        }
        return response()->json($offre);
    }
}
