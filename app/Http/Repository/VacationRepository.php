<?php

namespace App\Http\Repository;

use App\Models\Vacation;
class VacationRepository extends Repository
{
    /**
     * @param array $data
     * @return void
     */
    public function create(array $data): void
    {
        auth()->user()->vacation()->create([
            'start_date' => $data['from'],
            'end_date' => $data['to']
        ]);
    }

    /**
     * @param Vacation $vacation
     * @param array $data
     * @return void
     */
    public function update(Vacation $vacation, array $data): void
    {
        $vacation->update([
            'start_date' => $data['from'],
            'end_date' => $data['to']
        ]);
    }

    /**
     * @param Vacation $vacation
     * @return void
     */
    public function approve(Vacation $vacation): void
    {
        $vacation->update([
            'approved_at' => now()
        ]);
    }
}
