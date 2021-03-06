<?php

namespace App\Utils;

use App\Lessor;
use App\Utils\PDF;

class LessorsListPDF extends PDF{


    /**
    * PDF header
    */
    function Header()
    {

        $this->SetFont('Arial','',12);
        $this->Cell(40,10,utf8_decode('Saison ' . $this->getLeftHeader()),'BTL',0,'L');
        $this->SetFont('Arial','B',15);
        $this->Cell(197,10,utf8_decode('Liste des Bailleurs'),'BT',0,'C');
        $this->SetFont('Arial','',12);
        $this->Cell(40,10,utf8_decode(Lessor::isValid()->count() . ' Bailleurs'),'BTR',0,'R');
        $this->Ln(20);

    }


    /**
    * PDF footer
    */
    public function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }


    /**
    * Add the table's header
    * @param array
    * @param array
    */
    public function tableHeader($header, $w)
    {
        $this->AddPage('L','A4');
        $this->SetFillColor(0);
        $this->SetTextColor(255);
        for($i=0;$i<count($header);$i++){
            $this->Cell($w[$i],7,utf8_decode($header[$i]),1,0,'L',true);
        }
        $this->Ln();
        $this->SetFont('Arial','',12);
        $this->SetTextColor(0);
        $this->SetFillColor(224,235,255);
    }


    /**
    * Generate the PDF file
    * @param array
    * @param string
    */
    public function generate($data,$filename)
    {

        ob_end_clean();

        $itemsCount = count($data);
        $header = array('N°','Civ','Nom','Prénom','Adresse', 'CP', 'Ville', 'Hec', 'Prix', 'Val');
        $w = array(10,14,35,35,63,15,64,13,15,13);
        $this->SetAutoPageBreak(false);
        $this->AliasNbPages();

        $this->tableHeader($header,$w);

        $this->SetFont('Arial','',12);
        $this->SetTextColor(0);
        $this->SetFillColor(224,235,255);

        $fill = false;
        $count = 0;
        foreach ($data as $lessor) {
            $this->Cell($w[0],6,utf8_decode($lessor->id),1,0,'L',$fill);
            $this->Cell($w[1],6,utf8_decode($lessor->title->abbreviation),1,0,'L',$fill);
            $this->Cell($w[2],6,utf8_decode($lessor->lastName),1,0,'L',$fill);
            $this->Cell($w[3],6,utf8_decode($lessor->firstName),1,0,'L',$fill);
            $this->Cell($w[4],6,str_replace('?','\'',utf8_decode($lessor->address->label)),1,0,'L',$fill);
            $this->Cell($w[5],6,utf8_decode($lessor->address->city->postalCode->label),1,0,'L',$fill);
            $this->Cell($w[6],6,utf8_decode($lessor->address->city->label),1,0,'L',$fill);
            $this->Cell($w[7],6,utf8_decode(str_replace('.',',',$lessor->hectares + 0)),1,0,'L',$fill);
            $this->Cell($w[8],6,utf8_decode(str_replace('.',',',$lessor->price + 0)),1,0,'L',$fill);
            $this->Cell($w[9],6,utf8_decode($lessor->validityDate),1,0,'L',$fill);
            $this->Ln();
            $fill = !$fill;
            $count ++;
            if($count%24 === 0 && $count !== $itemsCount){

                $this->tableHeader($header,$w);

            }
        }

        $this->Output();
    }


}
