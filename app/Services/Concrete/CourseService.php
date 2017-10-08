<?php

namespace App\Services\Concrete;

class CourseService
{
    public function getByIds(array $ids) {
        return $courseModels = \App\Models\Course::query()
            ->select([
                'id', 'course_name', 'university'
            ])
            ->with([
                'students',
            ])
            ->whereIn('id', $ids)
            ->get();
    }
}