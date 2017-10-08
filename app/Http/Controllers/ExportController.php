<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExportCoursesRequest;
use App\Http\Requests\ExportRequest;
use App\Models\Course;
use App\Models\Students;
use App\Services\Concrete\CSVGeneratorCoursesFileService;
use App\Services\Contract\IGeneratorFile;

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
    public function exportStudentsToCSV(ExportRequest $request, IGeneratorFile $downloader)
    {
        $data = $request->only('studentsId');
        $csvGenerator = $downloader->generateCSV($data['studentsId']);
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
    public function exporttCourseAttendenceToCSV(ExportCoursesRequest $request, CSVGeneratorCoursesFileService $coursesFileService)
    {
        $data = $request->only('coursesId');
        $csvGeneratorCourse = $coursesFileService->generateCSV($data['coursesId']);
        $csvGeneratorCourse->download();
    }
}
