<?php

namespace App\Http\Controllers;

use PDF;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function invoice()
    {
    	$pdf = PDF::loadView('pdf.invoice');
    	return $pdf->stream('invoice.pdf');
    }
}
