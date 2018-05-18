<?php

namespace MS\Core\Patch;

use Illuminate\Support\ServiceProvider;

class FormServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        \Form::component('inputText', 'Core.HTML.Form.Input.text', ['data','index']);
        \Form::component('inputHidden', 'Core.HTML.Form.Input.hidden', ['data','index']);
        \Form::component('inputEmail', 'Core.HTML.Form.Input.email', ['data','index']);
        \Form::component('inputLockText', 'Core.HTML.Form.Input.LockText', ['data','index']);
        \Form::component('inputPassword', 'Core.HTML.Form.Input.password', ['data','index']);
        \Form::component('inputNumber', 'Core.HTML.Form.Input.number', ['data','index']);
        \Form::component('inputLockNumber', 'Core.HTML.Form.Input.LockNumber', ['data','index']);
        \Form::component('inputRadio', '.Core.HTML.Form.Input.radio', ['data','index']);
        \Form::component('inputLockRadio', 'Core.HTML.Form.Input.LockRadio', ['data','index']);
        \Form::component('inputCheck', 'Core.HTML.Form.Input.check', ['data','index']);
        \Form::component('inputLockCheck', 'Core.HTML.Form.Input.LockCheck', ['data','index']);
        \Form::component('inputOption', 'Core.HTML.Form.Input.option', ['data','index']);
        \Form::component('inputLockOption', 'Core.HTML.Form.Input.LockOption', ['data','index']);
        \Form::component('inputFile', 'Core.HTML.Form.Input.file', ['data','index']);
        \Form::component('inputTextArea', 'Core.HTML.Form.Input.textarea', ['data','index']);
        \Form::component('inputLockTextArea', 'Core.HTML.Form.Input.LockTextArea', ['data','index']);
        \Form::component('inputDate', 'Core.HTML.Form.Input.date', ['data','index']);

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
