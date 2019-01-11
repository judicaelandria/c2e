<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\DomainRepository;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class DomainController extends Controller
{
    protected $nbr_page = 3;
    protected $domainRepository;

    public function __construct(DomainRepository $domainRepository)
    {
        $this->domainRepository = $domainRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $domains = $this->domainRepository->getPaginate($this->nbr_page);
        $links = $domains->setPath('')->render();
        return view('domain.index', compact('domains', 'links'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('domain.create');
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
        $domain = $this->domainRepository->store($request->all());
        return redirect('domain')->withOk("L'catégorie " . $domain->nom . " a été créé.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $domain = $this->domainRepository->getById($id);
        return view('domain.show',  compact('domain'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $domain = $this->domainRepository->getById($id);
        return view('domain.edit',  compact('domain'));
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
        $this->domainRepository->update($id, $request->all());
        
        return redirect('domain')->withOk("La catégorie " . $request->input('nom') . " a été modifié.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->domainRepository->destroy($id);
        return redirect()->back();
    }
}
