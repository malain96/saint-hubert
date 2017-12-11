<?php

namespace App\Utils;

use App\Hunter;
use App\Utils\PDF;

class HuntersEtiquettesPDF extends PDF{

    /**
    * Generate the PDF file
    * @param array
    * @param string
    */
    public function generate($data,$filename)
    {

        ob_end_clean();

        $itemsCount = count($data);
        $this->SetMargins(0,0,0);
        $this->SetAutoPageBreak(false);
        $this->AddPage();
        $row = array();
        $this->SetFont('Arial','',12);
        $this->SetTextColor(0);
        $this->SetFillColor(224,235,255);

        $rowCount = 0;
        $i = 1;
        $y = 1;

        foreach ($data as $hunter) {
            array_push($row,$hunter);
            if($i%3 == 0 || $y == $itemsCount){
                $this->Cell(210,10,'');
                $this->Ln();

                for ($x = 0; $x < sizeof($row); $x++) {
                    $this->Cell(50,10,utf8_decode($row[$x]->lastName.' '.$row[$x]->firstName));
                    $this->Cell(20,10,utf8_decode('n° '.$row[$x]->id));
                    $this->Cell(2,10,'');
                }

                $this->Ln();

                for ($x = 0; $x < sizeof($row); $x++) {
                    $this->Cell(70,7.5,utf8_decode($row[$x]->address->label));
                    $this->Cell(2,7.5,'');
                }

                $this->Ln();

                for ($x = 0; $x < sizeof($row); $x++) {
                    $this->Cell(70,4,utf8_decode($row[$x]->address->city->postalCode->label.' '.$row[$x]->address->city->label));
                    $this->Cell(2,4,'');
                }

                $this->Ln();

                $this->Cell(210,10,'');
                $this->Ln();

                $rowCount++;
                $row = array();

                if($rowCount == 8 && $y != $itemsCount){
                    $this->AddPage();
                    $rowCount = 0;
                }
            }
            $i++;
            $y++;

        }

        $this->Output();

    }


}
