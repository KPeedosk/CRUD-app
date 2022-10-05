<?php

namespace App\Http\Controllers;

use App\Models\UserApplication;

class DownloadController extends Controller
{
    public function downloadFromUserApplication($id)
    {
        $application = UserApplication::where('id', $id)->first();
        $data = $application->cv_file;

        return response()->streamDownload(function () use ($data) {
            echo $data;
        }, 'CV.txt');
    }
}
