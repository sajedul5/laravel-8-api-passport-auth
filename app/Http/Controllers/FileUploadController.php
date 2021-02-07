<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    public function FileUpload(Request $request)
    {
        $upload_files = $request->file->store('public/uploads');
        return ['result' => $upload_files];
    }
}
