<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Contracts\Support\Renderable;

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
     * @return Renderable
     */
    public function index(): Renderable
    {
        Role::find(1)->givePermissionTo('delete user');
        auth()->user()->giveRoleTo('admin');
        dd(auth()->user()->can('add user'));
        return view('home');
    }
}
