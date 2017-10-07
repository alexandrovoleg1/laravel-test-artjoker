<?php

namespace App\Services\Concrete;
use App\Entities\Student;
use Illuminate\Support\Collection;

class StudentService
{
    /**
     * @param array $ids
     * @return Collection
     */
    public function getByIds(array $ids): Collection {
        $studentModels = \App\Models\Students::query()
            ->select([
                'firstname', 'surname', 'email', 'nationality'
            ])
            ->with([
                'course',
                'address'
            ])
            ->get();
        return $studentModels->map(function ($student) {
            return new Student(
                $student->id,
                $student->firstname,
                $student->surname,
                $student->nationality,
                $student->address()->line_1,
                $student->course()->course_name
            );
        });
    }
}