<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';
    public function validations()
    {
        return $this->hasMany('App\User');
    }
    public function tutoriels() 
    {
        return $this->hasMany('App\Tutoriel');
    }
    public function forums() 
    {
        return $this->hasMany('App\Forum');
    }
    public function commentaires() 
    {
        return $this->hasMany('App\Commentaire');
    }
    
    public function annonces() 
    {
        return $this->hasMany('App\Annonce');
    }
    public function universites()
    {
        return $this->belongsToMany('App\universite','user_universite');
    }
    public function type_utilisateur()
    {
        return $this->belongsTo('App\Type_utilisateur');
    }
    /*public function domain()
    {
        return $this->belongsTo('App\Domain');
    }*/
    public function badgets()
    {
        return $this->belongsToMany('App\badget','user_badget');
    }

    public function notifications()
    {
        return $this->belongsToMany('App\Notification','user__notifications')->where('vue',0);
    }
    
    protected $fillable = [
        'name', 'prenom', 'email', 'password','login','telephone','adresse','etudiant','domaine','lieu'
        ,'image','type_utilisateur_id', 'annee_nais', 'score', 'pass_changed'
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    protected $hidden = [
        'password', 'remember_token',
    ];
}
