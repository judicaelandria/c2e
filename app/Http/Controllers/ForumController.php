<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\Forum\ForumCreateRequest;
use App\Http\Requests\Forum\ForumUpadteRequest;
use App\Repositories\ForumRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Forum;
use App\User;
use App\Type;
class ForumController extends Controller
{

    protected $nbr_page =12;
    protected $forumRepository;
    public function __construct(ForumRepository $forumRepository)
    {
        $this->forumRepository = $forumRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $forums = Forum::orderBy('created_at', 'desc')->paginate($this->nbr_page);
        return view('forum.index', compact('forums'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types   = Type::all();
        return view('forum.create',compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ForumCreateRequest $request)
    {
        $inputs = array_merge($request->all(), ['user_id' => Auth::user()->id]);
        $inputs = array_merge($inputs, ['sujet' => strtoupper($request->all()['sujet'])]);
        $this->forumRepository->store($inputs);
        $user = Auth::user();
        $user->score = $user->score+3;
        $user->save();
        return redirect('discussion')->withOk("La discussion a été créé.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $forum = $this->forumRepository->getById($id);
        Session::put('forum',$id);
        return view('forum.show',  compact('forum'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $forum = Forum::find($id);
        return view('forum.edit',compact('forum'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ForumUpadteRequest $request, $id)
    {
        $inputs = array_merge($request->all(), ['sujet' => strtoupper($request->all()['sujet'])]);
        $this->forumRepository->update($id, $inputs);
        return redirect('discussion')->withOk("La discussion a été modifié.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->forumRepository->destroy($id);
        $user = Forum::find($id)->user;
        $user->score = $user->score-3;
        $user->save();
        return redirect('discussion')->withOk("La discussion a été supprimé.");
    }
}
