<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Repositories\ExerciceRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Type_d_exercice;
class ExerciceController extends Controller
{
    protected $nbr_page = 4;
    protected $exerciceRepository;
    public function __construct(ExerciceRepository $exerciceRepository)
    {
        $this->exerciceRepository = $exerciceRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exercices = $this->exerciceRepository->getPaginate($this->nbr_page);
        $links = $exercices->setPath('')->render();
       return view("exercice.index",compact('exercices','links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Type_d_exercice   = Type_d_exercice::lists('nom','id'); 
        return view('exercice.create',compact('Type_d_exercice'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = array_merge($request->all(), ['user_id' => Auth::user()->id]);
        $exercice = $this->exerciceRepository->store($inputs);
        return redirect('exercice')->withOk("Le exercice " . $exercice->nom . " a été créé.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $exercice = $this->exerciceRepository->getById($id);
        Session::put('exercice',$id);
        return view('exercice.show',compact('exercice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Type_d_exercice   = Type_d_exercice::lists('nom','id'); 
         $exercice = $this->exerciceRepository->getById($id);
        return view("exercice.edit",compact('exercice','Type_d_exercice'));
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
        $this->exerciceRepository->update($id, $request->all());   
        return redirect('exercice')->withOk("L'exercice " . $request->input('nom') . " a été modifié.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
