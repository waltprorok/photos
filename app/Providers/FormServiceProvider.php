<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Form;

class FormServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Form::component('text', 'components.form.text', ['name', 'value' => null, 'arrtibutes' => []]);
        Form::component('textarea', 'components.form.textarea', ['name', 'value' => null, 'arrtibutes' => []]);
        Form::component('submit', 'components.form.submit', ['name', 'value' => 'Submit', 'arrtibutes' => []]);
        Form::component('hidden', 'components.form.hidden', ['name', 'value' => null, 'arrtibutes' => []]);
        Form::component('file', 'components.form.file', ['name', 'arrtibutes' => []]);
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
