<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Collective\Html\FormBuilder;
use Collective\Html\HtmlBuilder;

class HtmlMacrosServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->registerFormControl();
        $this->registerFormSubmit();
        $this->registerHtmlButtonBack();
    }

    private function registerFormControl()
    {
        FormBuilder::macro('control', function($type, $errors, $nom, $placeholder)
        {
            $valeur = \Request::old($nom) ? \Request::old($nom) : null;
            $attributes = ['class' => 'form-control', 'placeholder' => $placeholder];
            return sprintf('
                <div class="form-group %s">
                    %s
                    %s
                </div>',
                $errors->has($nom) ? 'has-error' : '',
                call_user_func_array(['Form', $type], [$nom, $valeur, $attributes]),
                $errors->first($nom, '<small class="help-block">:message</small>')
            );
        });     
    }

    private function registerFormSubmit()
    {
        FormBuilder::macro('button_submit', function($texte)
        {
            return FormBuilder::submit($texte, ['class' => 'btn btn-info pull-right']);
        });     
    }

    private function registerHtmlButtonBack()
    {   
        HtmlBuilder::macro('button_back', function()
        {
            return '<a href="javascript:history.back()" class="btn btn-primary">
                    <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
                </a>';
        });         
    }

}