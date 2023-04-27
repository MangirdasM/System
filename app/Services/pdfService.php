<?php
namespace App\Services;

use PDF;
use App\Models\Uzsakymas;

    class pdfService
    {
        public function createPDF(Uzsakymas $uzsakymas) {
            $uzsakymo_pavadinimas = $uzsakymas['vieta'] . '/' . $uzsakymas['sventestipas'] .'_'. $uzsakymas['data'];
            
            view()->share('uzsakymas',$uzsakymas);
            view()->share('darbuotojai',$uzsakymas->darbuotojai);
            view()->share('inventorius',$uzsakymas->inventorius);
            $pdf = PDF::loadView('uzsakymai.export_pdf');
            
            return $pdf->stream($uzsakymo_pavadinimas . '.pdf');
        }
    }
?>