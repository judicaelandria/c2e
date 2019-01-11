<?php

namespace App\Http\Controllers;

use App\Http\Requests\Section\SectionCreateRequest;
use App\Http\Requests\Section\SectionUpdateRequest;
use App\Repositories\ChapitreRepository;
use Illuminate\Http\Request;

use App\Repositories\SectionRepository;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Tutoriel;

class SectionController extends Controller
{
    protected $sectionRepository;
    protected  $chapitreRepository;

    public function __construct(ChapitreRepository $chapitreRepository,SectionRepository $sectionRepository)
    {
        $this->sectionRepository = $sectionRepository;
        $this->chapitreRepository = $chapitreRepository;

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
    public function create($chap_id)
    {
        Session::put('chapitre',$chap_id);
        $chapitre = $this->chapitreRepository->getById($chap_id);
        return view('section.create',compact('chapitre'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SectionCreateRequest $request)
    {
        $inputs = array_merge($request->all(),['chapitre_id' => Session::get('chapitre')]);
        $this->sectionRepository->store($inputs);
        $tutoriel = Session::get('tutoriel');
        $user = Auth::user();
        $user->score = $user->score+3;
        $user->save();
        return redirect()->route('tutoriel.show',compact('tutoriel'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $section = $this->sectionRepository->getById($id);
        return view('section.edit', compact('section'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SectionUpdateRequest $request, $id)
    {
        $this->sectionRepository->update($id, $request->all());
        $tutoriel = Tutoriel::find(Session::get('tutoriel'));
        return redirect()->route('tutoriel.show', compact('tutoriel'))->withOk("La section a été modifiée.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->sectionRepository->destroy($id);
        return redirect()->back()->withOk("La section a été supprimée.");
    }
}
