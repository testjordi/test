<?php
	//hello
	session_start();
	if(isset($_SESSION['loguejat']))
	$loguejat=$_SESSION['loguejat'];else $loguejat=false;
	if(isset($_SESSION['carret']))
	$carret=$_SESSION['carret'];else $carret=false;
	
?>
<!DOCTYPE html>
<html>	
	<head>
		<meta name="description" content="Test Web">
		<link href="images/favicon.ico" rel="shortcut icon" type="image/x-icon" >
		<!-- DEFINIM TIPUS ARXIUS USATS I REPRESENTACIONS FORMATS -->
		
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Music'Store</title>
		<link rel="stylesheet" type="text/css" href="css\index.css"/>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js">
		</script>
		<script>
			function showHint(str)
			{
			var xmlhttp;
			if (str.length==0)
			  { 
			  document.getElementById("txtHint").innerHTML="";
			  return;
			  }
			xmlhttp=new XMLHttpRequest();
			xmlhttp.onreadystatechange=function()
			  {
			  if (xmlhttp.readyState==4 && xmlhttp.status==200)
				{
				document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
				}
			  }
			xmlhttp.open("GET","gethint.php?q="+str,true);
			xmlhttp.send();
			}
		</script>
		<script>
				function canvidiv(div, noudiv)
				{
				$(div).load(noudiv);
				}
		</script> 
		<script>
		function registrat()
		{
		
			<?	if(isset($_SESSION['loguejat'])){
				
				?>
				return true;
				<?
				}
				else{
			?>			
				alert( "Necessites estar registrat per a poder veure el cistell" )
				return false;
				<?
				}
				?>
		}

	</script>

	</head>
	
	<body> 
		<header> <!-- ARTICLE, cap�alera informativa -->
			 <!-- Defineix una divisi o secci en document HTML o per agrupar block-elements per donar-los format en CSS-->
				<p><b><a href="index.php" >Music'Store</a></b></p>
		</header>
		
		<div id="login">
			<?php
				if($_SESSION['loguejat']){
					if($loguejat['Admin']){
					?>
					<b>Benvingut <?php echo $loguejat['Nom'] ?>! <a  href="admin.php">Administrar </a></b><br><br>
					<table>
						<tr><td>
							<a href="carret.php"><img src="images/cistell1.png" alt="Carret" width="60" height="60"></a></td>
											
							<td><a href="logout.php"><input type="submit" value="Desconnecta't" name="logout" ></a></td>
						</tr>
					</table>
										
					<?php	
					} else {
					?>
						
					<b>Benvingut <?php echo $loguejat['Nom'] ?>! </b><br><br>
					<table>
						<tr><td>
							<a href="carret.php"><img src="images/cistell1.png" alt="Carret" width="60" height="60"></a></td>
											
							<td><a href="logout.php"><input type="submit" value="Desconnecta't" name="logout" ></a></td>
						</tr>
					</table>
					<?php
					}
				} else {
					?>
					<FORM id="log" name="form" action="login.php" method="post"><b>
						Usuari:    <INPUT type="email" name="user" required> 
						Contrase&#241;a: <INPUT type="password" name="contra" required></b> 
						<INPUT type="submit" value="Accedeix" name="Login">
					</FORM>
					<b><a href="#" onclick="canvidiv('#cos','registre.php')"> Reg&#237;stra't aqu&#237;</a></b>
					
					<?php
					}
			?>
										
		</div>
		
		<div id="menu">
			<h4>Busqui un producte:</h4>
			<form action="buscar.php" method="post"> 
			<input type="text" name="buscador" onkeyup="showHint(this.value)" />
			</form>
			<p>Sugger�ncies: <span id="txtHint"></span></p> 
			<br>
			
			<ul class="men">			
				<li><b><a href="#" <?php $cat = "Classica";?> onclick="canvidiv('#cos','categoria.php?cat=<?php echo $cat ?>')">Cl�ssiques</a></b></li><br>
				<li><b><a href="#" <?php $cat = "Acustica";?> onclick="canvidiv('#cos','categoria.php?cat=<?php echo $cat ?>')">Ac�stiques</a></b></li><br>
				<li><b><a href="#" <?php $cat = "Electrica";?> onclick="canvidiv('#cos','categoria.php?cat=<?php echo $cat ?>')">El�ctriques</a></b></li><br>
				<li><b><a href="#" <?php $cat = "Baix";?> onclick="canvidiv('#cos','categoria.php?cat=<?php echo $cat ?>')">Baixos</a></b></li>
			</ul>
			
		</div>
		
		<div id="menuHorizontal">		
			<ul class="dropdown"> 
				<li class="dropdown_trigger"><a href="#" <?php $cat = "Classica";?> onclick="canvidiv('#cos','categoria.php?cat=<?php echo $cat ?>')">CL&#192;SSICA </a></li> 
				<li class="dropdown_trigger"><a href="#" <?php $cat = "Acustica";?> onclick="canvidiv('#cos','categoria.php?cat=<?php echo $cat ?>')">AC&#218;STICA </a></li> 
				<li class="dropdown_trigger"><a href="#" <?php $cat = "Electrica";?> onclick="canvidiv('#cos','categoria.php?cat=<?php echo $cat ?>')">EL&#200;CTRICA </a></li> 
				<li class="dropdown_trigger"><a href="#" <?php $cat = "Baix";?> onclick="canvidiv('#cos','categoria.php?cat=<?php echo $cat ?>')">BAIX </a></li> 
				<li class="dropdown_trigger"><a href="#" >CAT&#192;LEG </a></li> 
				<li class="dropdown_trigger"><a href="carret.php" OnClick="return registrat()">CISTELL</a></li> 
				<li class="dropdown_trigger"><a href="#">CONTACTE </a></li>
			</ul>
		</div>
		
		<div id="cos">	
			<div id="portada" align="center">
			<table align="center" cellpadding="0" cellspacing="0">
				<td width="", height="" >
					<img name="milmagen" alt="Portada" height="126" width="78"> <!--253x156-->
					
					<script>
						i=0;
						direccion = new Array();
						direccion[0] = "images/portada/1.jpg";
						direccion[1] = "images/portada/2.jpg";
						direccion[2] = "images/portada/3.jpg";
						direccion[3] = "images/portada/4.jpg";
						direccion[4] = "images/portada/5.jpg";
						direccion[5] = "images/portada/6.jpg";
						direccion[6] = "images/portada/7.jpg";
						direccion[7] = "images/portada/8.jpg";
						direccion[8] = "images/portada/9.jpg";
						direccion[9] = "images/portada/11.jpg";
						direccion[10] = "images/portada/12.jpg";
						direccion[11] = "images/portada/14.jpg";
						direccion[12] = "images/portada/15.jpg";
						function CanviImatge()
						{
							i = i + 1;
							if(i==direccion.length) i=0;
							document.images.milmagen.src = direccion[i];
							setTimeout('CanviImatge()',1900)
						};
						CanviImatge()
						</script>
					<tr>
					<h2> Benvingut a la botiga de m&#250sica </h2>
					<br><br>
					<iframe width="360" height="215" src="http://www.youtube.com/embed/DUnR_IS_4TM?rel=0" frameborder="0" allowfullscreen></iframe>
					<br><br>
					</tr>
				</td>
			</table>	
			</div>
		</div>	
	</body>
</html>
