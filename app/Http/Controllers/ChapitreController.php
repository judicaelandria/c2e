<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\Chapitre\ChapitreCreateRequest;
use App\Http\Requests\Chapitre\ChapitreUpdateRequest;
use App\Repositories\TutorielRepository;
use App\Repositories\ChapitreRepository;
use Illuminate\Support\Facades\Session;
use App\Chapitre;
use Illuminate\Support\Facades\Auth;
use App\Tutoriel;

class ChapitreController extends Controller
{
    protected $chapitreRepository;
    protected $tutorielRepository;

    public function __construct(TutorielRepository $tutorielRepository, ChapitreRepository $chapitreRepository)
    {
        $this->tutorielRepository  = $tutorielRepository;
        $this->chapitreRepository  = $chapitreRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($tuto_id){
        Session::put('tutoriel',$tuto_id);
        $tutoriel = $this->tutorielRepository->getById($tuto_id);
        return view('chapitre.create',compact('tutoriel'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ChapitreCreateRequest $request)
    {
        $inputs = array_merge($request->all(),['tutoriel_id' => Session::get('tutoriel')]);
        $inputs = array_merge($inputs,['nom' => strtoupper($request->all()['nom'])]);
        $this->chapitreRepository->store($inputs);
        $tutoriel = Session::get('tutoriel');
        $user = Auth::user();
        $user->score = $user->score+1;
        $user->save();
        return redirect()->route('tutoriel.show',compact('tutoriel'))->withOk('Le chapitre a été bien ajouté');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $chapitre = Chapitre::find($id);
        return view('chapitre.show',compact('chapitre'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //show for edite 
    public function edit_chapitre($id)
    {
        Session::put('chapitre',$id);        
        $chapitre = $this->chapitreRepository->getById($id);
        return view('chapitre.edit',compact('chapitre'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Session::put('chapitre', $id);
        $chapitre = $this->chapitreRepository->getById($id);
        return view('chapitre.edit', compact('chapitre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ChapitreUpdateRequestRequest $request, $id)
    {
        $inputs = array_merge($request->all(),['nom' => strtoupper($request->all()['nom'])]);
        $this->chapitreRepository->update($id, $inputs);
        $tutoriel = Tutoriel::find(Session::get('tutoriel'));
        return redirect()->route('tutoriel.show', compact('tutoriel'))->withOk("Le chapitre a été modifié.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->chapitreRepository->destroy($id);
        return redirect()->back()->withOk("Le chapitre a été supprimé.");
    }
}
