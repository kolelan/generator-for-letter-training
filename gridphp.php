<?php
require_once('fpdf182/fpdf.php');

class PDF_Grid extends FPDF
{
    var $grid = false;
    var $inclined = false;
    var $border = true;
    var $stave = false;
    var $lines = true;
    var $i_hl = 0;
    var $i_hl_up = 13.5;
    var $line_up = true;
    var $line_down = true;
    var $offset_t_n = 4;


    function DrawGrid()
    {
        if ($this->grid === true) {
            $spacing = 5;
        } else {
            $spacing = $this->grid;
        }
        if ($this->lines) {
            $this->SetDrawColor(0, 0, 0);
            $this->SetLineWidth(0.35);
            $h_limit = $this->h - 20;
            if($this->line_up)
                for ($i = $this->i_hl_up; $i < $h_limit; $i += $spacing) {                        //print up_ horizontal lines 13.5
                    $this->Line(0, $i, $this->w, $i);
                }
            if($this->line_down)
                for ($i = $this->i_hl; $i < $h_limit; $i += $spacing) {                        //print _ horizontal lines
                    $this->Line(0, $i, $this->w, $i);
                }
        }
        /** Если нужен нотный стан */
        if ($this->stave) {
            $this->SetDrawColor(50, 50, 150);
            $this->SetLineWidth(0.15);

            for ($a = $this->offset_t_n; $a < $this->h - 20; $a += $spacing ) {
                for ($i = $a; $i < $a + 7.5; $i += 1.5) {                        //print up_ horizontal lines 13.5
                    $this->Line(0, $i, $this->w, $i);
                }
            }
        }


        //Create inclined lines
        $tan_treangle_inc_line = tan(deg2rad(25));
        if ($this->inclined == true) {                            //print / inclined lines
            $this->SetDrawColor(0, 0, 0);
            for ($i = 4; $i <= 55; $i += 7)
                $this->Line(12 * $i * $tan_treangle_inc_line, 0, 0, 12 * $i);
        }
        if ($this->border == true) {                                //print |  right border line
            $this->SetDrawColor(255, 0, 0);                        //red border
            $this->Line(185, 0, 185, 300);
        }

    }

    function Header()
    {
        if ($this->grid)
            $this->DrawGrid();
    }

}

?>