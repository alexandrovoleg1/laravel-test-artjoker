<?php

namespace App\Services\Contract;

interface IDownloader
{
    public function download(array $data);
}