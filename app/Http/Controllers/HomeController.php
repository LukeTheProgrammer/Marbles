<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Child;
use App\Marble;
use App\MarbleActivity;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home', [
            'children' => Child::all(),
        ]);
    }

    public function test()
    {
        $activity = MarbleActivity::findOrFail(1);

        dd($activity->child());
    }
}
