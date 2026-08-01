<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\LaravelPdf\Facades\Pdf;



class TestController extends Controller
{

    static function pdf(){
        // Generate PDF
        $pdf = Pdf::view('_pdf.test_pdf', [
            'company' => (object)array(
                'logo' => 'img/logo.png',
                'name' => 'My Company',
                'address' => '123 Main St, City, Country',
                'email' => 'info@mycompany.com'
            ),
            'document' => (object)array(
                'title' => 'Test PDF Document',
                'date' => date('d-m-Y'),
                'reference' => 'INV-001-26'
            ),
            'file' => (object)array(
                'name' => 'Test PDF',
                'path' => 'img/test.pdf'
            ),
        ]);

    
        $pdf->format('a4');
        
        $pdf->headerView('_pdf.header', [
            'company' => (object)array(
                'logo' => 'img/logo.png',
                'name' => 'My Company',
                'address' => '123 Main St, City, Country',
                'email' => 'info@mycompany.com'
            ),
            'document' => (object)array(
                'title' => 'Test PDF Document',
                'date' => date('d-m-Y'),
                'reference' => 'INV-001-26'
            ),
            'file' => (object)array(
                'name' => 'Test PDF',
                'path' => 'img/test.pdf'
            ),
        ]);
        $pdf->footerView('_pdf.footer',[
            'company' => (object)array(
                'name' => 'Tyto Services',
                'address' => '123 Main St, City, Country',
                'email' => 'diene@tytoservices.com',
                'website' => 'www.tytoservices.com',
                'telephone' => '+221 77 728 88 95',
                'ninea' => '007737440 1D',
                'rc' => 'SN DKR 2020 A 1703',
                'rib' => 'SN012 0120 1036 2067 5050 196',
            ),
        ]);
        $pdf->meta(
            title: 'Invoice #123',
            author: 'Acme Corp',
            subject: 'Monthly invoice',
            keywords: 'invoice, acme, april',
            creator: 'My Application',
        );
        $pdf->withBrowsershot(function ($browsershot) {
            $browsershot->setOption('displayHeaderFooter', true);
        });

        $pdf->margins(35, 5, 15, 5);
        return $pdf->name('invoice.pdf');
    }
}
