<?php

namespace App\Http\Controllers;

use App\Models\Files;
use App\Traits\Upload;
use Illuminate\Http\Request;

class FileController extends Controller
{
    use Upload;

    public function store(Request $request)
    {
        if ($request->hasFile('test')) {
            $path = $this->UploadFile($request->file('test'), 'Products');
            Files::create([
                'path' => $path
            ]);
            return redirect()->route('files.index')->with('success', 'File Uploaded Successfully');
        }
    }
}



