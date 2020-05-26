<?php

namespace App\Http\Controllers;

use App\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\PdfToImage\Pdf;

class FileUploadController extends Controller
{
    public function fileUploadPost(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:pdf|max:2048',
        ]);

        $nameWithoutExtension = time();
        $fileName = $nameWithoutExtension . '.' . $request->file->extension();


        //Saving document file into uploads folder.
        $request->file->move(public_path('uploads'), $fileName);


        //Making thumbnail and saving it into public/thumnbails folder.
        $pdfRoute = public_path('uploads/' . $fileName);
        $saveRoute = public_path('thumbnails/');
        $thumbName = $nameWithoutExtension . '.jpg';
        $pdf = new Pdf($pdfRoute);
        $pdf->saveImage($saveRoute . $thumbName);


        //Adding new document entry to database.
        $document = new Document([
            'name' => $fileName,
            'thumbnail' => $thumbName
        ]);
        $document->save();

        return back()
            ->with('success', 'You have successfully upload file.')
            ->with('file', $fileName);
    }
}
