<?php
namespace App\Services\Notification;

use App\Repositories\NotificationRepository;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\User_Notification;
use App\Forum;
use App\Exercice;

class Notification
{
    public function __construct(NotificationRepository $notificationRepository)
	{
        $this->notificationRepository = $notificationRepository;
	}
	public function get()
	{	
		return $notifications = Auth::user()->notifications;
	}
	
	public function CreateForUserCommentedForum()
	{

	}

	public function CreateForUser($phrase,$visualiser,$type_notification,$id_objet,$ancre,$id)
	{
		$users = User::find($id);
		$notification = $this->notificationRepository->store(["phrase"=>$phrase,"visualiser"=>$visualiser,"type_notification"=>$type_notification,"id_objet"=>$id_objet,"ancre"=>$ancre]);
		Auth::user()->notifications()->sync([$notification->id]);
	}

	public function CreateForAllUser($phrase,$visualiser,$type_notification,$id_objet,$ancre)
	{
		$users = User::all();
		$notification = $this->notificationRepository->store(["phrase"=>$phrase,"visualiser"=>$visualiser,"type_notification"=>$type_notification,"id_objet"=>$id_objet,"ancre"=>$ancre]);
		foreach ($users as $user) {
			if($user->id != Auth::user()->id)
			$user->notifications()->sync([$notification->id]);
		}
	}
	public function showView()
	{
		return ;
	}
	public function show()
	{
		return ;
	}
	public function visualiser($id)
	{
		$n = User_Notification::where("notification_id",$id)->where("user_id",Auth::user()->id)->get()->first();
		$n->vue = 1;
		$n->save();
		return $this->notificationRepository->getById($id);
	}
}