<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Form;

class FormServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Form::component('dhText', 'components.form.text', ['name', 'value' => null, 'attributes' => []]);
        Form::component('dhTextArea', 'components.form.textarea', ['name', 'value' => null, 'attributes' => []]);
        Form::component('dhSubmit', 'components.form.submit', ['value' => 'Submit', 'attributes' => []]);

    }
}
