<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\Type\TypeCreateRequest;
use App\Http\Requests\Type\TypeUpadteRequest;
use App\Http\Requests;
use App\Repositories\TypeRepository;

class TypeController extends Controller
{
    protected $nbr_page = 3;
    protected $typeRepository;

    public function __construct(TypeRepository $typeRepository)
    {
        $this->typeRepository = $typeRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = $this->typeRepository->getPaginate($this->nbr_page);
        $links = $types->setPath('')->render();
        return view('type.index', compact('types', 'links'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('type.create');
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
        $type = $this->typeRepository->store($request->all());
        return redirect('type')->withOk("L'catégorie " . $type->nom . " a été créé.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $type = $this->typeRepository->getById($id);
        return view('type.show',  compact('type'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $type = $this->typeRepository->getById($id);
        return view('type.edit',  compact('type'));
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
        $this->typeRepository->update($id, $request->all());
        
        return redirect('type')->withOk("La catégorie " . $request->input('nom') . " a été modifié.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->typeRepository->destroy($id);
        return redirect()->back();
    }
}
