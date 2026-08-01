<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\LaravelPdf\Facades\Pdf;

class PdfController extends Controller
{
    public $company_name = 'My Company';
    public $company_logo = 'img/logo.png';
    public $company_address = '123 Main St, City, Country';
    public $company_email = 'info@mycompany.com';
    public $company_ninea = '123456789';
    public $company_telephone = '+1 (555) 123-4567';
    public $company_website = 'https://www.mycompany.com';

    public $document_title = 'Test PDF Document';
    public $document_reference = 'INV-001-26';
    
    public $file_name = 'My Document';
    public $file_path = 'My Document';

    static function pdf(){
        $pdf = Pdf::view('_pdf.test_pdf', [
            'company' => (object)array(
                'logo' => $this->company_logo,
                'name' => $this->company_name,
                'address' => $this->company_address,
                'email' => $this->company_email
            ),
            'document' => (object)array(
                'title' => $this->document_title,
                'date' => date('d-m-Y'),
                'reference' => 'INV-001-26'
            ),
            'file' => (object)array(
                'name' => 'Test PDF',
                'path' => 'img/test.pdf'
            ),
        ]);

        $pdf->format('a4');
        $pdf->margins(0, 5, 5, 5);
        return $pdf->name('invoice.pdf');
    }

}
