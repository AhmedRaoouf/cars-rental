<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class ContarctCreateController extends Controller
{

    public function generateContract($owner , $borrower , $car , $duration , $from , $to, $total)
    {
        $data = [
            'owner' => $owner,
            'borrower' => $borrower,
            'car' => $car,
            'rentDuration' => $duration,
            'fromDate' => $from,
            'toDate' => $to,
            'totalPrice' => $total
        ];

        // Generate the HTML content of the contract using the Blade template
        $htmlContent = view('contract', $data)->render();

        // Convert HTML to PDF
        $pdf = PDF::loadHTML($htmlContent);

        // Generate a unique filename for the PDF
        $filename = 'contract_' . uniqid() . '.pdf';

        // Save the PDF to the storage directory
        $publicPath = $_SERVER['DOCUMENT_ROOT']; // Get the document root path
        $filePath = $publicPath . '/uploads/contracts/' . $filename;

        // Save the PDF to the public HTML folder
        $pdf->save($filePath);

        // Generate the public URL for the PDF
        $pdfUrl = asset('uploads/contracts/' . $filename);

        return  [
            'filename' =>$filename,
            'url' =>$pdfUrl
        ];
    }
}
