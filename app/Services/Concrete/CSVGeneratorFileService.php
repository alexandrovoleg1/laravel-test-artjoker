<?php

namespace App\Services\Concrete;

use App\Models\Students;
use App\Models\User;
use App\Services\Contract\IGeneratorFile;

class CSVGeneratorFileService implements IGeneratorFile
{
    /**
     * @var StudentService
     */
    private $studentService;

    public function __construct(StudentService $studentService)
    {
        $this->studentService = $studentService;
    }

    public function generateCSV(array $data)
    {
        $students = $this->studentService->getByIds($data);

        $csvExporter = new \Laracsv\Export();
        $csvExporter->beforeEach(function (Students $student) {
            if ($student->address && $student->course) {
                $student->studendAddress = $student->address->city . ' ' . $student->address->houseNo . ' ' . $student->address->line_1 . ' ' . $student->address->line_2;
                $student->studentCourse = $student->course->university . ' ' . $student->course->course_name;
            }
        });
        $csvExporter->build($students, ['firstname', 'surname', 'email', 'nationality', 'studendAddress', 'studentCourse']);

        return $csvExporter;
    }
}