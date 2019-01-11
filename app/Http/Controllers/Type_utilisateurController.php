<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Type_utilisateurRepository;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class Type_utilisateurController extends Controller
{
  	protected $nbr_page = 3;
    protected $type_utilisateurRepository;

    public function __construct(Type_utilisateurRepository $type_utilisateurRepository)
    {
        $this->type_utilisateurRepository = $type_utilisateurRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $type_utilisateurs = $this->type_utilisateurRepository->getPaginate($this->nbr_page);
        $links = $type_utilisateurs->setPath('')->render();
        return view('type_utilisateur.index', compact('type_utilisateurs', 'links'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('type_utilisateur.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$this->setAdmin($request);
        $type_utilisateur = $this->type_utilisateurRepository->store($request->all());
        return redirect('type_utilisateur')->withOk("L'catégorie " . $type_utilisateur->nom . " a été créé.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $type_utilisateur = $this->type_utilisateurRepository->getById($id);
        return view('type_utilisateur.show',  compact('type_utilisateur'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $type_utilisateur = $this->type_utilisateurRepository->getById($id);
        return view('type_utilisateur.edit',  compact('type_utilisateur'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->type_utilisateurRepository->update($id, $request->all());
        
        return redirect('type_utilisateur')->withOk("La catégorie " . $request->input('nom') . " a été modifié.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->type_utilisateurRepository->destroy($id);
        return redirect()->back();
    }
}
