<?php
	App::import('Vendor', 'tcpdf/tcpdf');
	$Pdf = new TCPDF();
        $Pdf->setPrintHeader(false);
	$Pdf->setPrintFooter(false);
	//$Pdf->SetMargins(10, 20, 0);
	$Pdf->AddPage('P', 'A4');
        $Pdf->SetFont('times', '', 9, '', 'false');
        
        $Pdf->SetLineStyle(array('width' => 0.1, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));
        $l = 5;
        $mx = 35;
        for ($i=0; $i<count($pessoa);) {
            
            $Pdf->Text(10, $l + 5, substr($pessoa[$i]['Pessoa']['nome'], 0, $mx));
            $Pdf->Text(10, $l + 10, substr($pessoa[$i]['Pessoa']['endereco'] . " " . $pessoa[$i]['Pessoa']['numero'] . " " . $pessoa[$i]['Bairro']['nome'], 0, $mx));
            $Pdf->Text(10, $l + 15, substr($pessoa[$i]['Cidade']['nome'] . " " . $pessoa[$i]['Cidade']['uf'] . " " . $pessoa[$i]['Pessoa']['cep'], 0, $mx));

            $Pdf->Text(80, $l + 5, substr($pessoa[$i+1]['Pessoa']['nome'], 0, $mx));
            $Pdf->Text(80, $l + 10, substr($pessoa[$i+1]['Pessoa']['endereco'] . " " . $pessoa[$i+1]['Pessoa']['numero'] . " " . $pessoa[$i+1]['Bairro']['nome'], 0, $mx));
            $Pdf->Text(80, $l + 15, substr($pessoa[$i+1]['Cidade']['nome'] . " " . $pessoa[$i+1]['Cidade']['uf'] . " " . $pessoa[$i+1]['Pessoa']['cep'], 0, $mx));

            $Pdf->Text(150, $l + 5, substr($pessoa[$i+2]['Pessoa']['nome'], 0, $mx));
            $Pdf->Text(150, $l + 10, substr($pessoa[$i+2]['Pessoa']['endereco'] . " " . $pessoa[$i+2]['Pessoa']['numero'] . " " . $pessoa[$i+2]['Bairro']['nome'], 0, $mx));
            $Pdf->Text(150, $l + 15, substr($pessoa[$i+2]['Cidade']['nome'] . " " . $pessoa[$i+2]['Cidade']['uf'] . " " . $pessoa[$i+2]['Pessoa']['cep'], 0, $mx));
            
            /*$Pdf->Rect(0, $l, 70, 25);
            $Pdf->Rect(70, $l, 70, 25);
            $Pdf->Rect(140, $l, 70, 25);*/
            
            $i = $i + 3;
            
            $l += 25;
            if (($i >= 10) && ($i % 10 == 0)) {
               $Pdf->AddPage();
               $l = 5;
            }
        }
        
	echo $Pdf->Output(APP . 'files' . DS . 'Etiqueta.pdf', 'F');
?>