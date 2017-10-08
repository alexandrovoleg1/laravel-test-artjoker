<?php

namespace App\Services\Contract;

interface IGeneratorCSVFile
{
    public function generateCSV(array $data);
}