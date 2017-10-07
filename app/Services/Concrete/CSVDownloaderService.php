<?php

namespace App\Services\Concrete;

use App\Services\Contract\IDownloader;

class CSVDownloaderService implements IDownloader
{
    /**
     * @var StudentService
     */
    private $studentService;

    public function __construct(StudentService $studentService)
    {
        $this->studentService = $studentService;
    }

    public function download(array $data)
    {
        $users = $this->studentService->getByIds($data);
        info($users);
    }
}