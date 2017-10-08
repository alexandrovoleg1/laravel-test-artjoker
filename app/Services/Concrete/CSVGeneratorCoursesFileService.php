<?php

namespace App\Services\Concrete;

use App\Models\Course;
use App\Services\Contract\IGeneratorFile;

class CSVGeneratorCoursesFileService implements IGeneratorFile
{
    /**
     * @var CourseService
     */
    private $courseService;

    public function __construct(CourseService $courseService)
    {
        $this->courseService = $courseService;
    }

    public function generateCSV(array $data)
    {
        $courses = $this->courseService->getByIds($data);

        $csvExporter = new \Laracsv\Export();
        $csvExporter->beforeEach(function (Course $course) {
            $course->countStudents = $course->students->count();
        });
        $csvExporter->build($courses, ['course_name', 'university', 'countStudents']);
        return $csvExporter;
    }
}