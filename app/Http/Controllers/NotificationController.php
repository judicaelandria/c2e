<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Notification;
use App\Http\Requests;
use App\Repositories\NotificationRepository;

class NotificationController extends Controller
{
    protected $nbr_page = 5;
    protected $notificationRepository;
    public function __construct(NotificationRepository $notificationRepository)
    {
        $this->notificationRepository = $notificationRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //liste des notification de Auth::user()......
         Notification::get();


         /*Mais pour la vue blade pour l afficher il faut 

         @foreach (Auth::user()->notifications as $n)
        {!! link_to_route("notification_activation", $n->phrase, [$n->id], ['class' => '']) !!}
        @endforeach

         */
    }

    public function activation($id)
    {

        /*Petit code de la vue 
        @foreach (Auth::user()->notifications as $n)
            {!! link_to_route("notification_activation", $n->phrase, [$n->id], ['class' => '']) !!}
        @endforeach
        */



        /*
        Les types sont 
        TUTORIEL ----->creation de tutoriel et besoin d'aide
        FORUM--------->forum nouveau
        EXERCICE------->Exercice nouveau
        NOUVEAU_USER------->Salutation au nouveau user
        TUTORIEL_MODIFIER----->tutoriel modifier
        FORUM_COMMENTER----->forum commenter
        CHALLENG------->challeng pour tout les membres
        TUTORIEL_VALIDER----->tutoriel valider
        */
        $n = Notification::visualiser($id);
        $id_objet = $n->id_objet;
        switch($n->type_notification) {
            case "TUTORIEL":
                return redirect()->route('tutoriel.show',compact('id_objet'));
                break;
            case "FORUM":
                return redirect()->route('forum.show',compact('id_objet'));
                
                break;
            case "NOUVEAU_USER":
                return redirect()->route('user.show',compact('id_objet'));
                
                break;
            case "TUTORIEL_MODIFIER":
                return redirect()->route('tutoriel.show',compact('tutoriel'));
                
                break;
            case "TUTORIEL_VALIDER":
                return redirect()->route('tutoriel.show',compact('id_objet'));
                
                break;
            case "EXERCICE":
                //return redirect()->route('tutoriel.show',compact('tutoriel'));
                
                break;
            case "FORUM_COMMENTER":
                //return redirect()->route('tutoriel.show',compact('tutoriel'));
                
                break;
            case "CHALLENG":
                //return redirect()->route('tutoriel.show',compact('tutoriel'));
                
                break;
            case "FORUM_VALIDER":
                //return redirect()->route('tutoriel.show',compact('tutoriel'));
                
                break;
        }
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
        //
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
        //
    }
}
