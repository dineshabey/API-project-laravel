<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;
use PDF;

/**
 * Class PdfController.
 *
 * @author Rakitha Dissanayake <rakithadd@gmail.com>
 */
class PdfController extends Controller
{
    /**
     * Illustrate quotation data
     *
     * @param   $request
     * @return  mixed
     */

    public function pdfGen(Request $request)
    {


        $quotation_number = $request->get('quotation_no');
        $lang = $request->get('lang');

        //TO DO
        //get quotation data
        $quotationData = array();

        $headers = [
            'Content-Type' => 'application/pdf',
        ];

        $locale = App::getLocale();

        App::setLocale('si');

        //return view('backend.pdf.quotation', compact('quotationData','lang'));


        $pdf = PDF::loadView('backend.pdf.quotation_si', compact('quotationData', 'lang'));

        //$pdf->setOptions(['isPhpEnabled' => true]);

        $file_name = $quotation_number . "_" . $lang . '.pdf';

        $file_path = '/tmp/' . $file_name;

        $pdf->save($file_path);

        //return $pdf->download('demo.pdf');

        $url = asset(config('app.file_path') . '/tmp/' . $file_name);

        App::setLocale($locale);

        return $url;
    }
}
