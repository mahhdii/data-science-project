<?php

namespace App\Providers;

use App\User;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        Blade::directive('students', function ($selected) {
            $items = "'";
            $students =collect( User::all());
            $students->each(function ($student) use (&$items,$selected){
                if($student->id == $selected){
                    $items.="<option selected id={$student->id}>{$student->first_name} {$student->last_name}</option>";
                }else{
                    $items.="<option id={$student->id}>{$student->first_name} {$student->last_name}</option>";
                }
            });

            $items.="'";


            return "<?php  $items; ?>";
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
