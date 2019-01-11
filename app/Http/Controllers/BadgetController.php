<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\BadgetRepository;
use App\Http\Requests\Badget\BadgetCreateRequest;
use App\Http\Requests\Badget\BadgetUpadteRequest;
use App\Http\Requests;
use App\Gestion\ImageGestion;

class BadgetController extends Controller
{

    protected $badgetRepository;
    protected $nbrPerPage = 4;
    public function __construct(badgetRepository $badgetRepository)
    {
        $this->badgetRepository = $badgetRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $badgets = $this->badgetRepository->getPaginate($this->nbrPerPage);
        $links = $badgets->setPath('')->render();

        return view('badget.index', compact('badgets', 'links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('badget.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BadgetCreateRequest $request,
        ImageGestion $photogestion)
    {

        if(true) {
            $this->badgetRepository->store($request->all());
           return redirect()->route('badget.index');

        } 
        return redirect('photo/form')

            ->with('error','Désolé mais votre image ne peut pas être envoyée !');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $badget = $this->badgetRepository->getById($id);
        return view('badget.show',  compact('badget'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $badget = $this->badgetRepository->getById($id);
        return view('badget.edit',  compact('badget'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BadgetUpadteRequest $request, $id)
    {
        $ancien_badget = $this->badgetRepository->getById($id);
        if(file_exists($ancien_badget->image))
        unlink($ancien_badget->image);


        $this->badgetRepository->update($id, $request->all());
        return redirect('badget')->withOk("L'badget " . $request->input('nom') . " a été modifié.");
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
