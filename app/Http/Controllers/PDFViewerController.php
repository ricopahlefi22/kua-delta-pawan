<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFViewerController extends Controller
{
    function pdf(){
        $test = Pdf::loadFile(asset('test.pdf'));

        return $test->stream();
    }
}
