<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\UserAddress;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;
use TCPDF;
class PdfController extends Controller
{
    public function getPdftest()
    {
        $pdf = new TCPDF();
        $pdf->SetPrintHeader(false);
        $pdf->SetPrintFooter(false);
        $pdf->AddPage();
        $pdf->Text(90, 140, 'This is a test');
        $filename = storage_path() . '/test.pdf';
        $pdf->output($filename, 'F');
        return Response::download($filename);
    } 
    public function HtmlToPDF2($id)
    {    
        $order=Order::FindOrFail($id);
        $address=UserAddress::findOrFail($order->user_address_id);
        $view = view::make('admin.pages.orders.pdf',['order'=>$order,'address'=>$address]);
        $html_content = $view->render();
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->SetTitle('Sample PDF');
        $pdf->AddPage();
        $pdf->writeHTML($html_content, true, false, true, false, '');
        // dd($pdf);
        // $pdf->Output(uniqid().'_SamplePDF.pdf');
        $pdf->output(uniqid().'_SamplePDF.pdf');
        // return Response::download($pdf);
    }
        
}
