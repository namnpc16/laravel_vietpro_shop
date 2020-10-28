<?php

namespace App\Http\Controllers;

use App\Demo\Demo as DemoDemo;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use App\Events\TestEvent;
use App\Jobs\TestJob;
use App\User;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        Collection::macro('toUpper', function (){
            return $this->map(function ($value){
                return Str::upper($value);
            });
        });

        $collection = collect([25, 50]);
        $upper = $collection->filter(function($value){
            if($value > 30){
                $data = $value;
                return $data;
            }
        });
        dd($upper);
    }

    public function bind()
    {
        dd(config('app.name'));
        // $name = 'Bach linh';
        // app()->instance('now', $name);

        // dd(app('now'));
    }

    public function event()
    {
        $name = event(new TestEvent('Phuong nam'));
        dd($name);
    }

    public function job()
    {
        dd(TestJob::dispatch(User::find(1)));
    }
}
