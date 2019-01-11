<?php

namespace App\Http\Controllers;

use App\Annonce;
use App\Http\Requests;
use App\Tag;
use Illuminate\Http\Request;
use DB;
use App\Forum;
use App\User;
use App\Tutoriel;
use Notification;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
        //Notification::CreateForAllUser("ddd",false,"tuto","id","eeee");
       // $n = Notification::get();
        //dd($n[0]->phrase);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('score','desc')->where('pass_changed', '<>', '0')->take(6)->get();
        $annonces = Annonce::orderBy('created_at','desc')->take(3)->get();
        //$forums     = Forum::orderBy('created_at','desc')->take(4)->get();
        $tutoriels   = Tutoriel::where('validation_id', '<>', 'null')->orderBy('created_at','desc')->take(6)->get();
        foreach ($users as $user){
            $tutoArray = [];
            foreach ($user->tutoriels as $tuto){
                $existe = false;
                foreach ($tutoArray as $tutoA){
                    if($tuto->badge == $tutoA->badge) $existe = true;
                }
                if(!$existe && $tuto->validation != null) array_push($tutoArray, $tuto);
            }
            $user->tutoriels = $tutoArray;
        }
        return view('home',compact('users','forums','tutoriels', 'annonces'));
    }

    public function apropos(){
        $auteurs = User::where('statut', 'AUTEUR')->get();
        $anciens = User::where('statut', 'ANCIEN')->get();
        $contributeurs = User::where('statut', 'CONTRIBUTEUR')->get();
        return view('apropos', compact('auteurs', 'anciens', 'contributeurs'));
    }

    public function search(Request $request){
        $search = "%".trim($request->all()['data'])."%";
        $users = User::where('name', 'like', $search)
            ->orWhere('prenom', 'like', $search)
            ->orWhere('login', 'like', $search)
            ->get();
        if(emptyArray($users)){
            foreach(explode(' ', trim($request->all()['data'])) as $s) {
                $search = "%" . trim($s) . "%";
                $users = User::where('name', 'like', $search)
                    ->orWhere('prenom', 'like', $search)
                    ->orWhere('login', 'like', $search)
                    ->get();
            }
        }

        foreach ($users as $user){
            $tutoArray = [];
            foreach ($user->tutoriels as $tuto){
                $existe = false;
                foreach ($tutoArray as $tutoA){
                    if($tuto->badge == $tutoA->badge) $existe = true;
                }
                if(!$existe) array_push($tutoArray, $tuto);
            }
            $user->tutoriels = $tutoArray;
        }

        $tutoriels = Tutoriel::where('nom', 'like', $search)
            ->where('validation_id', '<>', 'null')
            ->get();
        foreach ($tutoriels as $tuto){
            if($tuto->validation == null)
                return $tuto;
        }
        foreach (Tag::all() as $tag){
            if($tag->tag == $request->all()['data']) {
                foreach ($tag->tutoriels as $tutoriel){
                    $existe = false;
                    foreach ($tutoriels as $tuto){
                        if($tutoriels == $tuto)
                            $existe = true;
                    }
                    if(!$existe && ($tutoriel->validation != null))
                        $tutoriels->add($tutoriel);
                }
            }
        }

        $forums = Forum::where('sujet', 'like', $search)->get();
        $annonces =  Annonce::where('titre', 'like', $search)->get();
        $data = trim($request->all()['data']);
        return view('search',compact('users','forums','tutoriels', 'annonces', 'data'));
    }
}
