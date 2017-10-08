<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExportRequest;
use App\Models\Students;
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

    /**
     * Exports the total amount of students that are taking each course to a CSV file
     */
    public function exporttCourseAttendenceToCSV()
    {

    }
}
