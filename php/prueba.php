<?php
//include connection file 
include_once("conexion.php");
include_once('../fpdf/fpdf.php');

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('../css/images/logo.png',10,-1,70);
    $this->SetFont('Arial','B',13);
    // Move to the right
    $this->Cell(80);
    // Title
    //$this->Cell(80,10,'Employee List',1,0,'C');
    // Line break
    $this->Ln(20);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}
$id;
foreach($_POST as $key=>$value){
    //echo $key, ' => ', $value, "<br/>";
    if($key == "id"){
        $id = $value;
    }else{
        //echo "string2";
    }
}
//echo $id;
$db = new Connection();
$con =  $db->getConnection();
    $query = $id;
    //print_r($query);
    $joins = "INNER JOIN curso c ON (c.id = e.id_curso)
              INNER JOIN estatus es ON (es.id = e.id_estatus)
              INNER JOIN persona p ON (p.id = e.id_persona)";
    $tables="estudiante e";
    $campos="e.id,
             c.descripcion,
             c.vigencia,
             es.descripcion as estatus";
    //$sWhere=" concat(p.apellido_paterno,' ',p.apellido_materno,' ',p.nombre) = '".$query."'";
    $sWhere=" e.id = ".$query;

    $querieArmado = "SELECT $campos FROM $tables $joins where $sWhere";
    mysqli_query ($con,"SET NAMES 'utf8'");
    $query = mysqli_query($con,$querieArmado) or die(mysqli_error());

    $pdf = new PDF();
    //header
    $pdf->AddPage();
    //foter page
    $pdf->AliasNbPages();
    $pdf->SetFont('Arial','B',12);

    $pdf->Cell(40,12,"Curso",1);
    $pdf->Cell(40,12,"Vigencia",1);
    $pdf->Cell(40,12,"Estatus",1);

    while($row = mysqli_fetch_array($query)){
        $id=$row['id'];
                $descripcion= $row['descripcion'];
                $vigencia=$row['vigencia'];
                $estatus=$row['estatus'];
        $pdf->Ln();
        $pdf->Cell(40,12,$descripcion,1);
        $pdf->Cell(40,12,$vigencia,1);
        $pdf->Cell(40,12,$estatus,1);
    }

    $pdf->Output("Reporte ".$descripcion.".pdf","D");

?>