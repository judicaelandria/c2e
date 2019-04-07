<?php

namespace App\Http\Controllers;

use App\Badget;
use App\Http\Requests\Tutoriel\TutorielCreateRequest;
use App\Http\Requests\Tutoriel\TutorielUpadteRequest;
use App\Tag;
use Illuminate\Http\Request;

use App\Repositories\TutorielRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Niveau;
use App\Tutoriel;
use App\User;
Use Notification;

class TutorielController extends Controller
{
    protected $nbr_page = 12;
    protected $tutorielRepository;
    public function  __construct(TutorielRepository $tutorielRepository)
    {
        $this->tutorielRepository = $tutorielRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tutoriels = Tutoriel::where('validation_id', '<>', 'null')->orderBy("created_at", "desc")->paginate($this->nbr_page);
        return view('tutoriel.index',compact('tutoriels'));
    }

    public function validation()
    {
        $tutoriels = Tutoriel::where('validation_id', '=', 'null')->paginate($this->nbr_page);
        $links     = $tutoriels->setPath('')->render();
        return view('tutoriel.validation',compact('tutoriels','links'));
    }

    public function valider($id)
    {
        $tutoriel = $this->tutorielRepository->getById($id);
        $tutoriel->validation_id = Auth::user()->id;
        $tutoriel->save();
        $user = Tutoriel::find($id)->user;
        $user->score = $user->score+16;
        $user->save();

        /*
        Creation de Notification pour un seul user
        */
        Notification::CreateForUser("Votre Tutoriel a été valider merci pour votre précieux contribution :)!",0,"TUTORIEL_VALIDER",$tutoriel->id,"pas",$user->id);

        return redirect()->route('tutoriel.show',compact('tutoriel'))->withOk("Validation effectuée.");
    }

    public function annulerValidation($id)
    {
        $tutoriel = $this->tutorielRepository->getById($id);
        if(Auth::user()->id == $tutoriel->validation_id || Auth::user()->type_utilisateur == 'admin') {
            $tutoriel->validation_id = null;
            $tutoriel->save();
            $user = Tutoriel::find($id)->user;
            $user->score = $user->score-16;
            $user->save();
            return redirect()->route('tutoriel.show', compact('tutoriel'))->withOk("Validation effectuée.");
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $niveaus   = Niveau::lists('niveau','id');
        $badges   = Badget::lists('nom','id');
        return view('tutoriel.create',compact('niveaus', 'badges'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = Auth::user()->id;
        $inputs = array_merge($request->all(),['user_id' => $id]);
        $tutoriel = $this->tutorielRepository->store($inputs);
        $tags = explode(',', $request->all()['tags']);
        foreach ($tags as $t){
            $tag = Tag::where("tag", trim($t))->first();
            if($tag == null)
                $tag = Tag::create(["tag" => trim($t)]);
            $tutoriel->tags()->attach($tag);
        }
        $tutoriel->save();
        $user = Auth::user();
        $user->score = $user->score+4;
        $user->save();
        /* 
        Notification pour tout les user pour annonce un nouveau tuto est créer
        */
        Notification::CreateForAllUser("Un nouveau Tutoriel a été créer par ".Auth::user()->nom." ".Auth::user()->prenom." vous pouvez lui proposer de l'aide",0,"TUTORIEL",$tutoriel->id,"pas");

        return redirect()->route('user.show', compact('user'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tutoriel = Tutoriel::find($id);
        if($tutoriel->validation != null
            || !Auth::guard(null)->guest() && (
                Auth::user() == $tutoriel->user
                || Auth::user()->type_utilisateur->terme == 'validateur'
                || Auth::user()->type_utilisateur->terme == 'admin')){
            Session::put('tutoriel', $id);
            return view('tutoriel.show',compact('tutoriel'));
        };
        return back();
    }

/**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_tutoriel($id)
    {
            Session::put('tutoriel',$id);
            $tutoriel = $this->tutorielRepository->getById($id);
            return view('tutoriel.edit_tutoriel',compact('tutoriel'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tutoriel = $this->tutorielRepository->getById($id);
        $niveaus   = Niveau::lists('niveau','id');
        $badges   = Badget::lists('nom','id');
        $tagArray = $tutoriel->tags;
        $tutoriel->tags = "";
        foreach ($tagArray as $t){
            $tutoriel->tags = $tutoriel->tags .", ". $t->tag;
        }
        $tutoriel->tags = substr($tutoriel->tags, 2);
        return view('tutoriel.edit',compact('tutoriel','niveaus', 'badges'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TutorielUpadteRequest $request, $id)
    {
        $this->tutorielRepository->update($id, $request->all());
        $tutoriel = Tutoriel::find($id);
        foreach ($tutoriel->tags as $tag){
            $tutoriel->tags()->detach($tag);
        }
        $tags = explode(',', $request->all()['tags']);
        foreach ($tags as $t){
            $tag = Tag::where("tag", trim($t))->first();
            if($tag == null)
                $tag = Tag::create(["tag" => trim($t)]);
            $tutoriel->tags()->attach($tag);
        }
        $tutoriel->save();
        return redirect()->route('tutoriel.show', compact('tutoriel'))->withOk("Le tutoriel a été modifié.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Tutoriel::find($id)->user;
        $user->score = $user->score-4;
        $user->save();
        $this->tutorielRepository->destroy($id);
        return redirect()->route('user.show', compact('user'))->withOk("Le tutoriel a été supprimé.");
    }
}
