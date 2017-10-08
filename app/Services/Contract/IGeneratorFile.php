<?php

namespace App\Services\Contract;

interface IGeneratorFile
{
    public function generateCSV(array $data);
}