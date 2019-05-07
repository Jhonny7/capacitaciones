<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Capacitación Integral PEZ</title>
	<link rel="shortcut icon" type="image/x-icon" href="css/images/favicon.ico" />
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="all" />
	
	<script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>
	<!--[if lt IE 9]>
		<script src="js/modernizr.custom.js"></script>
	<![endif]-->
	<script src="js/jquery.flexslider-min.js" type="text/javascript"></script>
	<script src="js/functions.js" type="text/javascript"></script>
    <style type="text/css">
<!--
#Layer1 {
	position:absolute;
	left:92px;
	top:847px;
	width:325px;
	height:100px;
	z-index:1;
}
#Layer2 {
	position:absolute;
	left:132px;
	top:207px;
	width:415px;
	height:195px;
	z-index:1;
}
.Estilo3 {font-size: 14px}
body {
	background-image: url(css/images/body.png);
}
#Layer3 {
	position:absolute;
	left:88px;
	top:136px;
	width:917px;
	height:178px;
	z-index:1;
}
.Estilo4 {
	font-size: x-large;
	color: #000033;
	font-weight: bold;
}
.Estilo2 {color: #FFCC00}
-->
.contenedorBusqueda{
	margin-top: 15px;
	width: 100%;
}
.inputBusqueda{
	width: 78%;
    border-radius: 4px;
    padding: 8px;
    display: inline-block;
}
.botonBusqueda{
	width: 19%;
	display: inline-block;
	border: 1px solid transparent;
    border-radius: 6px;
    padding: 6px;
    color: #fff;
    font-weight: 700;
    font-size: 150%;
    border-color: #0897fa;
    background-color: #0897fa;
}
.contenedorTabla{
	margin-top: 10px;
	box-shadow: 0px 0px 13px #123;
}
.tabla{
    width: 100%;
    border: 1px solid #1122330a;
}
.thead{
	background: #0897fa;
	color: #fff;
    font-size: 127%;
}
.titulos{
	font-weight: 700;
    padding: 3px;
}
.descarga{
	color: #fff;
    background-color: #d80000;
}
.botonDescarga{
	display: inline-block;
    border: 1px solid transparent;
    border-radius: 6px;
    padding: 6px;
    color: #fff;
    font-weight: 700;
    font-size: 150%;
    border-color: #d93c1e;
    background-color: #d93c1e;
}
.loader {
      border: 10px solid #f3f3f3;
    border-radius: 50%;
    border-top: 10px solid #3498db;
    width: 50px;
    height: 50px;
    -webkit-animation: spin 2s linear infinite;
    animation: spin 2s linear infinite;
    position: absolute;
    margin-left: 350px;
    margin-top: 76px;
}

/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
    </style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
<body>
	<!-- wrapper -->
	<div id="wrapper">
		<!-- header -->
		<header class="header">
			<div class="shell">
				<h1 id="logo"><a href="#">Capacitacion Ingral</a></h1>
				
				<!-- navigation -->
				<nav id="navigation">
					<ul>
						<li>
							<a href="index.html">HOME</a>
							<span></span>						</li>
						<li>
							<a href="nosotros.html">NOSOTROS</a>
							<span></span>						</li>
						<li>
							<a href="certifica.html">GALERIA</a>
							<span></span>						</li>
						<li>
							<a href="talleres.html">CURSOS Y TALLERES</a>		
							<span></span>						</li>
						<li>
							<a href="contacto.html">INSCRIPCIÓN</a>
							<span></span>						</li>
						<li class="active">
							<a href="buscador.html">CERTIFICACIONES</a>
							<span> </span>						</li>
					</ul>
					<div class="cl">&nbsp;</div>
				</nav>
				<!-- end of navigation -->
			</div>
		</header>
		<!-- end of header -->
		
		<!-- slider-holder -->
		<div class="shell">
			<!-- shell -->
			<!-- end of shell -->
			<table width="947" border="0" align="center" bgcolor="#FFFFFF" class="shell">
              <tr>
                <td width="78" height="126">&nbsp;</td>
                <td width="770"><p class="Estilo4">Busqueda de Personal Capacitado en SPPTR y Verificador/Probador de Gas acreditado y desde Abril 2019 todos los cursos.</p>
                  <p>&nbsp;</p>
                  <p class="Estilo3">PARA BUSCAR, ESCRIBA EL NOMBRE COMPLETO CON MAYÚSCULAS, SIN ACENTOS EMPEZANDO POR APELLIDOS Y SE DESPLEGARÁ LA INFORMACIÓN RELATIVA AL CURSO QUE TOMÓ.</p>

                  <div class="contenedorBusqueda">
                  	<input id="busqueda" type="text" placeholder="Ej: MORALES ROSALES JUAN ALBERTO" class="inputBusqueda">
				    <button type="button" class="botonBusqueda" onclick="buscar();">
				    	BUSCAR
				    </button>
                  </div>

                  
                  	
                  
                  <div id="loaderi"></div>
                  <div class='outer_div'>

                  </div>

                  

                  <p class="Estilo3">&nbsp;</p>
                  <p class="Estilo3">&nbsp;</p>
                  <p class="Estilo3">&nbsp;</p>
                  <p class="Estilo3">&nbsp;</p>
                  <p class="Estilo3">&nbsp;</p>
                  <p class="Estilo3">&nbsp;</p>
                  <p class="Estilo3">&nbsp;</p>
                  <p class="Estilo3">&nbsp;</p>
                  <p class="Estilo3">&nbsp;</p>
                  <p class="Estilo3">&nbsp;</p>
                  <p class="Estilo3">Por reciente modificacion a la página, se esta recapturando el personal entrenado en SPPTR y Verificador de Gas; consulta opcional enviando correo a: gerencia@capacitacionintegralpez.com y/o capacitacion.integral@hotmail.com, ademas al telefono 833 364 0004, por su comprension gracias.</p>
                  <p class="Estilo3">&nbsp;</p>
                  <p class="Estilo3">&nbsp;</p></td>
                <td width="78">&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td><p align="center"><img src="css/images/nos1.png" width="396" height="172"><img src="css/images/nos3.png" width="376" height="172"></p>
                <p>&nbsp;</p>
                <p>&nbsp;</p></td>
                <td>&nbsp;</td>
              </tr>
            </table>
		    <p>&nbsp;</p>
        </div>	
		<!-- end of slider-holder -->
		
		<!-- shell -->
		<!-- end of shell -->
<div id="footer-push"></div>
	</div>
	<!-- wrapper -->

	<!-- footer -->
	<div id="footer">
		<div class="shell">
			<!-- footer-cols -->
			<section class="footer-cols">
				<div class="col">
					<h3><strong>OFICINAS EN: </strong></h3>
					<p>C. Juan Escutia No. 504-B Col. Niños Héroes CP. 89359 Cd. Tampico, Tamaulipas, México<a href="nosotros.html" target="_self"></a></p>
					<p><a href="https://www.facebook.com/PezAdiestramientoCapacitacion"><img src="css/images/69407.png" width="45" height="41" border="0"></a></p>
				</div>
			  <div class="col">
					<h3><span class="Estilo2">PRÓXIMOS <strong>EVENTOS</strong></span></h3>
					<p>FORMACIÓN DE INSTRUCTORES</p>
			        <p>17-19 DE MAYO 2019 EN LA SALA DE HOTEL CITIEXPRESS, TAMPICO-ALTAMIRA. ¡ENVIA TU SOLICITUD!</p>
			  </div>
				<div class="col contact">
					<h3><strong>CONTACTO</strong></h3>
					<h4>833 364 0004 </h4>
					<a href="#">gerencia@capacitacionintegralpez.com</a> <a href="#">ventas@capacitacionintegralpez.com</a> <a href="#">capacitacion.integral@hotmail.com</a></div>
				<div class="cl">&nbsp;</div>
			</section>
			<!-- end of footer-cols -->
			<p class="copy">&copy;FARES Soluciones Multimedia. Design by <a href="https://www.facebook.com/faressmultimedia/" target="_blank">Fares</a></p>
			<div class="cl">&nbsp;</div>
		</div>	
	</div>
	<!-- end of footer -->
	<script src="js/busqueda.js"></script>
	<script src="js/pdf.js"></script>
</body>
</html>