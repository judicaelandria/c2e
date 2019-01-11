<?php

namespace App\Http\Controllers;

use App\Commentaire;
use App\User;
use Illuminate\Http\Request;
use App\Repositories\CommentaireRepository;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Forum;
class CommentaireController extends Controller
{
    protected $commentaireRepository;
    protected $nbrPerPage = 4;
    public function __construct(CommentaireRepository $commentaireRepository)
    {
        $this->commentaireRepository = $commentaireRepository;
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
    public function create()
    {
        //
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
        $forum = Forum::find(Session::get('forum'));
        $inputs = array_merge($request->all(), ['user_id' => $id]);
        $inputs = array_merge($inputs, ['forum_id' => Session::get('forum')]);
        Commentaire::create($inputs);
        $user = Auth::user();
        $user->score = $user->score+1;
        $user->save();
        return  redirect()->route('forum.show',compact('forum'));
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Commentaire::find($id)->user;
        if(Auth::user() == $user || Auth::user()->type_utilisateur->terme == 'admin') {
            $this->commentaireRepository->destroy($id);
            $user->score = $user->score-1;
            $user->save();
            return back()->withOk("Le commentaire a été supprimé.");
        }
        return back();
    }
}
