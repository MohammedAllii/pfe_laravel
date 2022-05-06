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
            'pays' => request('pays'),
            'contrat' =>request('contrat'),
            'temps_travail' =>request('temps_travail'),
            'salaire' =>request('salaire'),
            'monnaie' => request('monnaie'),
            'periode' =>request('periode'),
            'description' =>request('description'),
            'name_company' => request('name_company'),
            'site_web' => request('site_web'),
            'annee' => request('annee'),
            'employes' => request('employes'),
            'description_company' => request('description_company'),
            'question1' =>request('question1'),
            'question2' =>request('question2'),
            'question3' =>request('question3'),
            'id_company' =>request('id_company')
        ]);
        return response()->json($offre);
    }
    //tous les postes
    public function alloffres($id){
        $offre = Offre::where('id_company','=',$id)->get();
        Carbon::setlocale('fr');
        foreach($offre as $offres){
            $offres->setAttribute('added',Carbon::parse($offres->created_at)->diffForHumans());
        }
        return response()->json($offre);
    }
    //postes en attente
    public function enattente($id){
        $offre = Offre::where('etat','=',0)->where('id_company','=',$id)->get();
        Carbon::setlocale('fr');
        foreach($offre as $offres){
            $offres->setAttribute('added',Carbon::parse($offres->created_at)->diffForHumans());
        }
        return response()->json($offre);
    }
    //poste accepter
    public function accepter($id){
        $offre = Offre::where('etat','=',1)->where('id_company','=',$id)->get();
        Carbon::setlocale('fr');
        foreach($offre as $offres){
            $offres->setAttribute('added',Carbon::parse($offres->created_at)->diffForHumans());
        }
        return response()->json($offre);
    }
    //stat all
    public function statall($id){
        $offre = Offre::where('id_company','=',$id)->count();
        return response()->json($offre);
    }
    //stat attente
    public function statattente($id){
        $offre = Offre::where('etat','=',0)->where('id_company','=',$id)->count();
        return response()->json($offre);
    }
    //stat accepter
    public function stataccepter($id){
        $offre = Offre::where('etat','=',1)->where('id_company','=',$id)->count();
        return response()->json($offre);
    }
    //tout les offres home
    public function toutoffres(){
        $offre = Offre::paginate(4);
        Carbon::setlocale('fr');
        foreach($offre as $offres){
            $offres->setAttribute('added',Carbon::parse($offres->created_at)->diffForHumans());
        }
        return response()->json($offre);
    }
    //offre aujord'hui
    public function offresaujordhui(){
        $date = Carbon::now()->format('Y-m-d');
        $offre=array();
        $offre=Offre::where('updated_at','=',$date)->get();
        Carbon::setlocale('fr');
        foreach($offre as $offres){
            $offres->setAttribute('added',Carbon::parse($offres->created_at)->diffForHumans());
        }
        return response()->json($offre);
    }
    //affichage offre
    public function afficheoffre($id){
        $offre = Offre::where('id','=',$id)->first();
        Carbon::setlocale('fr');
            $offre->setAttribute('added',Carbon::parse($offre->created_at)->diffForHumans());
        return response()->json($offre);
    }
    //offres similaires
    public function afficheoffresimilaire($poste){
        $offree = Offre::where('poste','like','%'.$poste.'%')->skip(1)->first();
        return response()->json($offree);
    }
    //affiche offre by company
    public function getoffrebycompany($name){
        $offre = Offre::where('name_company','=',$name)->get();
        Carbon::setlocale('fr');
        foreach($offre as $offres){
            $offres->setAttribute('added',Carbon::parse($offres->created_at)->diffForHumans());
        }
        return response()->json($offre);
    }
    //count type cdi
    public function counttypecdi(){
        $offre = Offre::where('contrat','=','CDI')->count();
        return response()->json($offre);
    }
    //count type cdd
    public function counttypecdd(){
        $offre = Offre::where('contrat','=','CDD')->count();
        return response()->json($offre);
    }
    //count type Stage
    public function counttypestage(){
        $offre = Offre::where('contrat','=','Stage')->count();
        return response()->json($offre);
    }
    //count type Contrat
    public function counttypecontrat(){
        $offre = Offre::where('contrat','=','Contrat')->count();
        return response()->json($offre);
    }
    //count type Contrat
    public function counttypevolontariat(){
        $offre = Offre::where('contrat','=','Volontariat')->count();
        return response()->json($offre);
    }
    //affiche offre by type
    public function getoffrebytype($type){
        $offre = Offre::where('contrat','=',$type)->get();
        Carbon::setlocale('fr');
        foreach($offre as $offres){
            $offres->setAttribute('added',Carbon::parse($offres->created_at)->diffForHumans());
        }
        return response()->json($offre);
    }
    //count temps plein
    public function counttempsplein(){
        $offre = Offre::where('temps_travail','=','Temps-plein')->count();
        return response()->json($offre);
    }
    //count temps partiel
    public function counttempspartiel(){
        $offre = Offre::where('temps_travail','=','temps-partiel')->count();
        return response()->json($offre);
    }
    //affiche offre by temps
    public function getoffrebytemps($type){
        $offre = Offre::where('temps_travail','=',$type)->get();
        Carbon::setlocale('fr');
        foreach($offre as $offres){
            $offres->setAttribute('added',Carbon::parse($offres->created_at)->diffForHumans());
        }
        return response()->json($offre);
    }
    //recherche offre by poste
    public function rechercheposte($recherche){
        $offre = Offre::where('poste','like','%'.$recherche.'%')->get();
        return response()->json($offre);
    }
    //recherche offre by localite
    public function rechercheposteloc($recherche){
        $offre = Offre::where('lieu_travail','like','%'.$recherche.'%')->get();
        return response()->json($offre);
    }
    
    
}
