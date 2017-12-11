<?php

namespace App\Utils;

use App\Hunter;
use App\Utils\PDF;

class LessorsEtiquettesPDF extends PDF{

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
        $this->AliasNbPages();
        $this->AddPage();
        $row = array();
        $this->SetFont('Arial','',12);
        $this->SetTextColor(0);
        $this->SetFillColor(224,235,255);

        $rowCount = 0;
        $i = 1;
        $y = 1;

        foreach ($data as $lessor) {
            array_push($row,$lessor);
            if($i%2 === 0 || $y === $itemsCount){

                $this->Cell(210,7.75,'');
                $this->Ln();

                for ($x = 0; $x < sizeof($row); $x++) {
                    $this->Cell(105,10,utf8_decode($row[$x]->lastName.' '.$row[$x]->firstName));
                    $this->Cell(3,10,'');
                }

                $this->Ln();

                for ($x = 0; $x < sizeof($row); $x++) {
                    $this->Cell(105,7.5,str_replace('?','\'',utf8_decode($row[$x]->address->label)));
                    $this->Cell(3,7.5,'');
                }

                $this->Ln();

                for ($x = 0; $x < sizeof($row); $x++) {
                    $this->Cell(105,4,utf8_decode($row[$x]->address->city->postalCode->label.' '.$row[$x]->address->city->label));
                    $this->Cell(3,4,'');
                }

                $this->Ln();

                $this->Cell(210,7.75,'');
                $this->Ln();

                $rowCount++;
                $row = array();

                if($rowCount === 8 && $y !== $itemsCount){
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
