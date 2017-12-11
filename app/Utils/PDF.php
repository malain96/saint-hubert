<?php

namespace App\Utils;

use FPDF;

abstract class PDF extends \Anouar\Fpdf\Fpdf{

    private $LeftHeader;

    public function setLeftHeader($value)
    {
        $this->LeftHeader = $value;
    }

    public function getLeftHeader()
    {
        return $this->LeftHeader;
    }

    abstract public function generate($data,$filename);

}
