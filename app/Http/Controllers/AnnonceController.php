<?php

namespace App\Http\Controllers;

use App\Annonce;
use App\Repositories\AnnonceRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Forum;
use App\User;
use App\Type;

class AnnonceController extends Controller
{

    protected $nbr_page =12;
    protected $annonceRepository;
    public function __construct(AnnonceRepository $annonceRepository)
    {
        $this->annonceRepository = $annonceRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $annonces = Annonce::orderBy('created_at', 'desc')->paginate($this->nbr_page);
        return view('annonce.index', compact('annonces'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('annonce.create');
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
        $inputs = array_merge($request->all(), ['user_id' => $id]);
        $this->annonceRepository->store($inputs);
        $user = Auth::user();
        $user->score = $user->score+6;
        $user->save();
        return redirect('annonce')->withOk("L'annonce a été créé.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $forum = $this->annonceRepository->getById($id);
        Session::put('forum',$id);
        return view('forum.show',  compact('forum'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $annonce = Annonce::find($id);
        if(Auth::user() == $annonce->user || Auth::user()->type_utilisateur->terme == 'admin')
            return view('annonce.edit',compact('annonce'));
        return back();
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
        if(Auth::user() == Annonce::find($id)->user || Auth::user()->type_utilisateur->terme == 'admin') {
            $this->annonceRepository->update($id, $request->all());
            return redirect('annonce')->withOk("L'annonce a été modifié.");
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::user() == Annonce::find($id)->user || Auth::user()->type_utilisateur->terme == 'admin') {
            $user = Annonce::find($id)->user;
            $user->score = $user->score-6;
            $user->save();
            $this->annonceRepository->destroy($id);
            return redirect('annonce')->withOk("L'annonce a été supprimé.");
        }
        return back();
    }
}
