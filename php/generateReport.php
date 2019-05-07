<?php
//include connection file 
header('Content-type: application/pdf');
include_once("conexion.php");
include_once('../fpdf/fpdf.php');

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('../css/images/logo.png',30,5,150);
    $this->SetFont('Arial','B',13);
    // Move to the right
    $this->Cell(80);
    // Title
    //date('l jS \of F Y h:i:s A');
    //date('d/m/Y'),0,1,'L')
    //$inicio = strftime("%A, %d de %B del %Y", strtotime($fechaComite));
    $fecha = date('d/m/Y');
     $fecha2 = date('N');
     switch ($fecha2) {
         case 1:
         $fecha2 = "Domingo";
             break;
             case 2:
         $fecha2 = "Lunes";
             break;
             case 3:
         $fecha2 = "Martes";
             break;
             case 4:
         $fecha2 = utf8_decode("Miércoles");
             break;
             case 5:
         $fecha2 = "Jueves";
             break;
             case 6:
         $fecha2 = "Viernes";
             break;
             case 7:
         $fecha2 = utf8_decode("Sábado");
             break;
     }
    $date = explode('/', $fecha);
    $month = intval($date[0]);

    switch ($month) {
    case 1:
        $month = "Enero";
        break;
    case 2:
        $month = "Febrero";
        break;
    case 3:
        $month = "Marzo";
        break;
        case 4:
        $month = "Abril";
        break;
        case 5:
        $month = "Mayo";
        break;
        case 6:
        $month = "Junio";
        break;
        case 7:
        $month = "Julio";
        break;
        case 8:
        $month = "Agosto";
        break;
        case 9:
        $month = "Septiembre";
        break;
        case 10:
        $month = "Octubre";
        break;
        case 11:
        $month = "Noviembre";
        break;
        case 12:
        $month = "Diciembre";
        break;
}

    $day   = intval($date[1]);
    $year  = intval($date[2]);
    $this->Text(140, 25, $fecha2." ". $day." de ".$month." de ".$year);
    //$this->Text(160, 25, date('d/m/Y'),0,1,'L'));
    //$this->SetXY(200, 25); // position of text2
    //$this->Cell(80,10,,1,0,'C');
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
    $this->Cell(0,10,'Página '.$this->PageNo().'/{nb}',0,0,'C');
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

    $pdf->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco) 
    $pdf->SetFillColor(8,151,250); // establece el color del fondo de la celda (en este caso es AZUL 
    //$pdf->Cell(145, 20, 'LETRERO', 1, 0, 'C', True); // en orden lo que informan estos parametros es: 
    

    $pdf->Cell(40,12,"Curso",1,0,'C',true);
    $pdf->Cell(40,12,"Vigencia",1);
    $pdf->Cell(40,12,"Estatus",1);

    while($row = mysqli_fetch_array($query)){
        $id=$row['id'];
                $descripcion= utf8_decode ($row['descripcion']);
                $vigencia= utf8_decode ($row['vigencia']);
                $estatus= utf8_decode ($row['estatus']);
        $pdf->Ln();
        $pdf->Cell(40,12,$descripcion,1);
        $pdf->Cell(40,12,$vigencia,1);
        $pdf->Cell(40,12,$estatus,1);
    }

    $pdf->Output("Reporte ".$descripcion.".pdf","D");

?>