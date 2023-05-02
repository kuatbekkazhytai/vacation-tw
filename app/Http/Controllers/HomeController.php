<?php

namespace App\Http\Controllers;

use App\Http\Repository\Repository;
use App\Http\Repository\UserRepository;
use Illuminate\Contracts\Support\Renderable;

class HomeController extends Controller
{
    private Repository $repository;

    /**
     * @param UserRepository $repository
     */
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index(): Renderable
    {
        $users = $this->repository->list();

        return view('home', compact('users'));
    }
}
