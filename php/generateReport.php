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
         $fecha2 = "Lunes";
             break;
             case 2:
         $fecha2 = "Martes";
             break;
             case 3:
         $fecha2 = utf8_decode("Miércoles");
             break;
             case 4:
         $fecha2 = "Jueves";
             break;
             case 5:
         $fecha2 = "Viernes";
             break;
             case 6:
         $fecha2 = utf8_decode("Sábado");
             break;
             case 7:
         $fecha2 = "Domingo";
             break;
     }
    $date = explode('/', $fecha);
    //$month = intval($date[0]);

    $month = intval(date('m'));
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

    //Personal capacitado por Corporativo de Servicios Industriales y Consultoria ( CSIyC ).

    $this->Text(40, 37, utf8_decode("Personal capacitado por PEZ Adiestramiento y Capacitación"));
    //$this->Text(160, 25, date('d/m/Y'),0,1,'L'));
    //$this->SetXY(200, 25); // position of text2
    //$this->Cell(80,10,,1,0,'C');
    // Line break
    $this->Ln(40);
}

// Page footer
function Footer()
{
  /*Imagen footer*/
    //$this->Image('../css/images/qr.jpeg',10,-25,50);
    
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    
    //$this->SetTextColor(255,255,255);
    //$this->Cell(170,$this->GetY()-60,"CURSO VALIDADO POR Pez Capacitación Integral INSTRUCTOR EXTERNO Ing. Juan J. Buda G. Reg. STPS-BUGJ7503039B4-0005 Reg. CONOCER: 07976816 Validación de Participante en: www.capacitacionintegralpez.com E-Mail: ventas@capacitacionintegralpez.com",1,0,'C',true);
    
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    //$this->Cell(70,12,"CURSO VALIDADO POR Pez Capacitación Integral INSTRUCTOR EXTERNO Ing. Juan J. Buda G. Reg. STPS-BUGJ7503039B4-0005 Reg. CONOCER: 07976816 Validación de Participante en: www.capacitacionintegralpez.com E-Mail: ventas@capacitacionintegralpez.com",1,0,'C',true);
    //$this->Text(10, 45, utf8_decode("CURSO VALIDADO POR Pez Capacitación Integral INSTRUCTOR EXTERNO Ing. Juan J. Buda G. Reg. STPS-BUGJ7503039B4-0005 Reg. CONOCER: 07976816 Validación de Participante en: www.capacitacionintegralpez.com E-Mail: ventas@capacitacionintegralpez.com"));
    //$this->drawTextBox('This sentence is centered in the middle of the box.', 50, 50, 'C', 'M');
    //$this->WriteHTML($html);
    $texto = "CURSO VALIDADO POR Pez Capacitación Integral INSTRUCTOR EXTERNO"; 
    $texto2 = "Ing. Juan J. Buda G. Reg. STPS-BUGJ7503039B4-0005 Reg. CONOCER: 07976816 Validación de Participante en: ";
    $texto3 = "www.capacitacionintegralpez.com E-Mail: ventas@capacitacionintegralpez.com";
    $this->SetDrawColor(0,0,0);
    $this->Rect(10, $this->GetY()-40, 190, 33);
    $this->SetDrawColor(0,0,0);
    $this->Image('../css/images/qr.jpeg', 15, $this->GetY()-39, 30);
    $nuevoY = 8;
    $this->Text(48, $this->GetY()-28+$nuevoY, utf8_decode($texto));
    $this->Text(48, $this->GetY()-24+$nuevoY, utf8_decode($texto2));
    $this->Text(48, $this->GetY()-20+$nuevoY, utf8_decode($texto3));
    
    //$this->Multicell(165,28,"This is a multi-line text string\nNew line\nNew line")
//$this->Text(55, 75, utf8_decode('FUNCIONARIO(A) RECEPTOR'));
    // Page number
    $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
}
}
$id;
$nombres;
foreach($_POST as $key=>$value){
    //echo $key, ' => ', $value, "<br/>";
    if($key == "id"){
        $id = $value;
    }else if($key == "nombre"){
        $nombres = $value;
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
             es.descripcion as estatus,
             concat(unix_timestamp(e.fecha_alta),'-P-TG') as idCurso,
             concat(p.apellido_paterno,' ',p.apellido_materno,' ',p.nombre) as nombre";
    //$sWhere=" concat(p.apellido_paterno,' ',p.apellido_materno,' ',p.nombre) = '".$query."'";
    $sWhere=" e.id = ".$query;

    $querieArmado = "SELECT $campos FROM $tables $joins where $sWhere";
    mysqli_query ($con,"SET NAMES 'utf8'");
    $query = mysqli_query($con,$querieArmado) or die(mysqli_error());

/////////////////////////////////////////////////////////////////
    $pdf = new PDF();
    //header
    $pdf->AddPage();
    $pdf->Text(10, 45, utf8_decode($nombres));
    //foter page
    $pdf->AliasNbPages();
    $pdf->SetFont('Arial','B',12);

    $pdf->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco) 
    $pdf->SetFillColor(8,151,250); // establece el color del fondo de la celda (en este caso es AZUL 
    //$pdf->Cell(145, 20, 'LETRERO', 1, 0, 'C', True); // en orden lo que informan estos parametros es: 
    

    $pdf->Cell(70,12,"Curso",1,0,'C',true);
    $pdf->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco) 
    $pdf->SetFillColor(8,151,250); 
    $pdf->Cell(40,12,"Vigencia",1,0,'C',true);
    $pdf->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco) 
    $pdf->SetFillColor(8,151,250); 
    $pdf->Cell(40,12,utf8_decode ("Calificación"),1,0,'C',true);
    $pdf->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco) 
    $pdf->SetFillColor(8,151,250); 
    $pdf->Cell(40,12,utf8_decode ("No. Acreditación"),1,0,'C',true);

    while($row = mysqli_fetch_array($query)){
        $id=$row['id'];
        $descripcion= utf8_decode ($row['descripcion']);
        $vigencia= utf8_decode ($row['vigencia']);
        $estatus= utf8_decode ($row['estatus']);
        $idCurso= utf8_decode ($row['idCurso']);

        $pdf->Ln();
        $pdf->SetTextColor(0,0,0);
        $pdf->Cell(70,12,$descripcion,1);
        $pdf->Cell(40,12,$vigencia,1);
        $pdf->Cell(40,12,$estatus,1);
        $pdf->Cell(40,12,$idCurso,1);
    }

    $pdf->Output("Reporte ".$descripcion.".pdf","D");

?>