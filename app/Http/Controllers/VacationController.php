<?php

namespace App\Http\Controllers;

use App\Http\Repository\Repository;
use App\Http\Repository\VacationRepository;
use App\Http\Requests\VacationRequest;
use App\Models\Vacation;
use Illuminate\Http\RedirectResponse;

class VacationController extends Controller
{
    private Repository $repository;

    /**
     * @param VacationRepository $repository
     */
    public function __construct(VacationRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function create()
    {
        return view('vacation.create');
    }

    /**
     * @param VacationRequest $request
     * @return RedirectResponse
     */
    public function store(VacationRequest $request): RedirectResponse
    {
        $this->repository->create($request->validated());

        return redirect()->route('home')->with('success', 'Vacation request created successfully.');
    }

    /**
     * @param Vacation $vacation
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function edit(Vacation $vacation)
    {
        return view('vacation.edit', compact('vacation'));
    }

    /**
     * @param Vacation $vacation
     * @param VacationRequest $request
     * @return RedirectResponse
     */
    public function update(Vacation $vacation, VacationRequest $request): RedirectResponse
    {
        $this->repository->update($vacation, $request->validated());

        return redirect()->route('home')->with('success', 'Vacation dates updated successfully.');
    }

    /**
     * @param Vacation $vacation
     * @return RedirectResponse
     */
    public function approve(Vacation $vacation): RedirectResponse
    {
        $this->repository->approve($vacation);

        return redirect()->route('home')->with('success', "Vacation dates fixed for user with ID {$vacation->user_id} .");
    }
}
