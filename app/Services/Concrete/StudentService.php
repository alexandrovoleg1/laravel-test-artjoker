<?php

namespace App\Services\Concrete;
use Illuminate\Database\Eloquent\Collection;

class StudentService
{
    public function getByIds(array $ids): Collection {
        return $studentModels = \App\Models\Students::query()
            ->select([
                'id', 'firstname', 'surname', 'email', 'nationality', 'course_id', 'address_id'
            ])
            ->with([
                'course',
                'address'
            ])
            ->whereIn('id', $ids)
            ->get();
    }
}