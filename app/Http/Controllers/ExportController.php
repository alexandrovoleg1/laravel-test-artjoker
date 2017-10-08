<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExportCoursesRequest;
use App\Http\Requests\ExportUsersRequest;
use App\Models\Course;
use App\Models\Students;
use App\Services\Concrete\GeneratorCoursesCSVFileService;
use App\Services\Contract\IGeneratorCSVFile;

class ExportController extends Controller
{
    public function __construct()
    {

    }

    public function welcome()
    {
        return view('hello');
    }

    /**
     * View all students found in the database
     */
    public function viewStudents()
    {
        $students = Students::with('course')->get();
        return view('view_students', compact(['students']));
    }

    /**
     * Exports all student data to a CSV file
     */
    public function exportStudentsToCSV(ExportUsersRequest $request, IGeneratorCSVFile $generatorCSVFile)
    {
        $data = $request->only('studentsId');
        $csvGenerator = $generatorCSVFile->generateCSV($data['studentsId']);
        $csvGenerator->download();
    }

    public function viewCourses()
    {
        $courses = Course::query()->get();
        return view('view_courses', compact(['courses']));
    }

    /**
     * Exports the total amount of students that are taking each course to a CSV file
     */
    public function exportCourseAttendenceToCSV(ExportCoursesRequest $request, GeneratorCoursesCSVFileService $coursesFileService)
    {
        $data = $request->only('coursesId');
        $generatorCSVFile = $coursesFileService->generateCSV($data['coursesId']);
        $generatorCSVFile->download();
    }
}
