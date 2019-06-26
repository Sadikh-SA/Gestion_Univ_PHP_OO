<!DOCTYPE html>
<html><!DOCTYPE html>
<html>
<head>
	<title>Ajouter un Etudiant</title>
	<meta charset="UTF-8">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
	<style>
		.reponse{
			text-align: center;
			width: 70%;
			box-shadow: 5px 5px 5px 5px;
			border-radius: 5px 5px 5px 5px;
			color: rgb(77, 124, 215);
			margin: 0 auto;
		}
		.footer {
            margin-top: 5%;
            height: 350px;
            border: 1px solid;
        }
	</style>
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
	<script src="../JQuery/jquery-3.2.1.js"></script>
	<script>
		$(document).ready(function(){

			$("#adresse").hide();
			$("#loger").hide();
			$("#logement").hide();
			$("#logement1").hide();
			$("#type").hide();

			$("#nonboursier").click(function(){
				$("#adresse").show();
				$("#loger").hide();
				$("#logement").hide();
				$("#logement1").hide();
				$("#type").hide();
			});
			$("#boursier").click(function(){
				$("#loger").show();
				$("#type").show();
				$("#adresse").hide();
				$("#logement").hide();
				$("#logement1").hide();
			});
			$("#logero").click(function(){
				$("#logement").show();
				$("#logement1").show();
			});
			$("#logern").click(function(){
				$("#logement").hide();
				$("#logement1").hide();
			});
		});
	</script>
</head>
<body>

<div class="w3-bar w3-light-grey w3-border w3-xxlarge" style="width:100%; height: 100px; margin-top:1%;">
    <a href="index.php" class="w3-bar-item w3-button" style=" height: 100px; width:25%;"><i class="fa fa-graduation-cap" style="margin-top:20px;"></i></a>
    <a href="lister.php" class="w3-bar-item w3-button" style="height: 100px; width:25%; border: 1px solid;"><i class="fa fa-list-alt" style="margin-top:20px;">    LISTER  </i></a>
    <a href="ajouter.php" class="w3-bar-item w3-button w3-green" style="height: 100px; width:25%; border: 1px solid;"><i class="fa fa-plus" style="margin-top:20px;">    AJOUTER   </i></a>
    <a href="rechercher.php" class="w3-bar-item w3-button" style="height: 100px; width:25%; border: 1px solid;"><i class="fa fa-search" style="margin-top:20px;">    RECHERCHER   </i></a>
</div>


<div class="container">
	<div class="row" style="width: 70%; margin: 0 auto;">
		<form action="" method="POST" class="w3-container w3-card-4 w3-light-grey w3-text-blue w3-margin">
			<h2 class="w3-center">MODIFIER ETUDIANT</h2>
			
			<div class="w3-row w3-section">
				<div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-registered"></i></div>
				<div class="w3-rest">
					<input class="w3-input w3-border" name="matricule" value="<?php if(isset($_POST['matricule']))echo $_POST['matricule']?>" type="text" placeholder="Le Matricule" required>
				</div>
			</div>
			
			<div class="w3-row w3-section">
				<div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-user"></i></div>
				<div class="w3-rest">
					<input class="w3-input w3-border" name="nom" value="<?php if(isset($_POST['nom']))echo $_POST['nom']?>" type="text" placeholder="Votre Nom" required>
				</div>
			</div>

			<div class="w3-row w3-section">
				<div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-user"></i></div>
				<div class="w3-rest">
					<input class="w3-input w3-border" name="prenom" type="text" value="<?php if(isset($_POST['prenom']))echo $_POST['prenom']?>" placeholder="Votre Prénom please" required>
				</div>
			</div>

			<div class="w3-row w3-section">
				<div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-envelope-o"></i></div>
				<div class="w3-rest">
					<input class="w3-input w3-border" name="mail" value="<?php if(isset($_POST['mail']))echo $_POST['mail']?>" type="email" placeholder="Email">
				</div>
			</div>

			<div class="w3-row w3-section">
				<div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-phone"></i></div>
				<div class="w3-rest">
					<input class="w3-input w3-border" name="tel" value="<?php if(isset($_POST['tel']))echo $_POST['tel']?>" type="number" placeholder="Phone" required>
				</div>
			</div>

			<div class="w3-row w3-section">
				<div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-calendar"></i></div>
				<div class="w3-rest">
					<input class="w3-input w3-border" name="ddn" value="<?php if(isset($_POST['ddn']))echo $_POST['ddn']?>" type="date" required>
				</div>
			</div>
			<div class="w3-row w3-section" >
				<div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-line-chart ">Boursier</i>
					<input class="w3-input w3-border" id="boursier" value="Boursier" value="<?php if(isset($_POST['bourse']))echo $_POST['bourse']?>" name="bourse" type="radio" required>
				</div>

				<div class="w3-col" style="width:50px; margin-left: 50%;"><i class="w3-xxlarge fa fa-line-chart ">NonBoursier</i>
					<input class="w3-input w3-border" id="nonboursier" value="NonBoursier" name="bourse" value="<?php if(isset($_POST['bourse']))echo $_POST['bourse']?>" type="radio" required>
				</div>
				
			</div>


			<div class="w3-row w3-section" id="adresse">
				<div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-map-marker"></i></div>
				<div class="w3-rest">
					<input class="w3-input w3-border" name="adresse" value="<?php if(isset($_POST['adresse']))echo $_POST['adresse']?>" type="text" placeholder="Votre Adresse please" >
				</div>
			</div>

			<div class="w3-row w3-section" id="type">
				<div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-building"></i></div>
				<div class="w3-rest">
					<select class="w3-input w3-border" name="situation" placeholder="Votre Adresse please" >
					
					</select>
				</div>
			</div>

			<div class="w3-row w3-section" id="loger">
				<div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-calendar">Loger</i>
					<input class="w3-input w3-border" id="logero" value="Loger" name="loger" type="radio" >
				</div>
				<div class="w3-col" style="width:50px; margin-left: 50%;"><i class="w3-xxlarge fa fa-calendar">NonLoger</i>
					<input class="w3-input w3-border" id="logern" value="NonLoger" name="loger" type="radio" >
				</div>
			</div>

			<div class="w3-row w3-section" id="logement">
				<div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-building"></i></div>
				<div class="w3-rest">
					<select class="w3-input w3-border" name="batiment" placeholder="Votre Adresse please" >
					
					</select>
				</div>
			</div>

			<div class="w3-row w3-section" id="logement1">
				<div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-home"></i></div>
				<div class="w3-rest">
					<select class="w3-input w3-border" name="chambre" placeholder="Votre Adresse please" >
						
					</select>
				</div>
			</div>

			<button type="submit" name="submit" class="w3-button w3-block w3-section w3-blue w3-ripple w3-padding">Send</button>

		</form>

		<?php


			if (isset($_POST['submit'])) {
				$matricule=$_POST['matricule'];
				$nom=$_POST['nom'];
				$prenom=$_POST['prenom'];
				$mail=$_POST['mail'];
				$tel=$_POST['tel'];
				$ddn=$_POST['ddn'];
				$bourse = $_POST['bourse'];
				
			

				include '../Classes/ServiceEtudiant.php';
				$test = new Service();		
				if ($bourse == "NonBoursier") {
					$adresse=$_POST['adresse'];
					$donne = new NonBoursier($matricule,$nom,$prenom,$tel,$mail,$ddn,$adresse);
					$insert = $test->add($donne);
					if ($insert) {
						echo "<h2 class='reponse'>INSERTION D'UN ETUDIANT NON BOURSIER RÉUSSIE</h2>";
					} else {
						echo "<h2 class='reponse'>CE MATRICULE EXISTE DEJA</h2>";
					}
					
				}
				else {
					$loger = $_POST['loger'];
				
					if ($bourse =="Boursier" && $loger=="NonLoger") {
						$type = $_POST['situation'];
						$donne = new Boursier($matricule,$nom,$prenom,$tel,$mail,$ddn,$type);
						$insert = $test->add($donne);
						if ($insert) {
							echo "<h2 class='reponse'>INSERTION D'UN ETUDIANT BOURSIER ET NON LOGER RÉUSSIE</h2>";
						} else {
							echo "<h2 class='reponse'>CE MATRICULE EXISTE DEJA</h2>";
						}
					}
				
					elseif ($bourse =="Boursier" && $loger =="Loger") {
						$chambre = $_POST['chambre'];
						$batiment = $_POST['batiment'];
						$donne = new Loger($matricule,$nom,$prenom,$tel,$mail,$ddn,$type,$chambre,$batiment);
						$insert = $test->add($donne);
						if ($insert) {
							echo "<h2 class='reponse'>INSERTION D'UN ETUDIANT BOURSIER ET LOGER RÉUSSIE</h2>";
						} else {
							echo "<h2 class='reponse'>CE MATRICULE EXISTE DEJA</h2>";
						}
					}	

				}
			}
			


		?>
	</div>
</div>
<footer class="footer">
    <div class="container">
  <h3 class="text-center">Contact</h3>
  <p class="text-center"><em>Sadikh</em></p>

  <div class="row">
    <div class="col-md-4">
      <p><span class="glyphicon glyphicon-map-marker"></span>Guédiawaye, Hamo 4</p>
      <p><span class="glyphicon glyphicon-phone"></span>Phone: +221 78 440 88 22</p>
      <p><span class="glyphicon glyphicon-envelope"></span>Email: sadikhabou@mail.com</p>
    </div>
    <div class="col-md-8">
      <div class="row">
        <div class="col-sm-6 form-group">
          <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
        </div>
        <div class="col-sm-6 form-group">
          <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
        </div>
      </div>
      <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea>
      <br>
      <div class="row">
        <div class="col-md-12 form-group">
          <button class="btn pull-right" type="submit">Send</button>
        </div>
      </div>
    </div>
  </div>
</div>

    </footer>
</body>
</html>



<head>
	<title>Ajouter un Etudiant</title>
	<meta charset="UTF-8">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
	<style>
		.reponse{
			text-align: center;
			width: 70%;
			box-shadow: 5px 5px 5px 5px;
			border-radius: 5px 5px 5px 5px;
			color: rgb(77, 124, 215);
			margin: 0 auto;
		}
		.footer {
            margin-top: 5%;
            height: 350px;
            border: 1px solid;
        }
	</style>
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
	<script src="../JQuery/jquery-3.2.1.js"></script>
	<script>
		$(document).ready(function(){

			$("#adresse").hide();
			$("#loger").hide();
			$("#logement").hide();
			$("#logement1").hide();
			$("#type").hide();

			$("#nonboursier").click(function(){
				$("#adresse").show();
				$("#loger").hide();
				$("#logement").hide();
				$("#logement1").hide();
				$("#type").hide();
			});
			$("#boursier").click(function(){
				$("#loger").show();
				$("#type").show();
				$("#adresse").hide();
				$("#logement").hide();
				$("#logement1").hide();
			});
			$("#logero").click(function(){
				$("#logement").show();
				$("#logement1").show();
			});
			$("#logern").click(function(){
				$("#logement").hide();
				$("#logement1").hide();
			});
		});
	</script>
</head>
<body>

<div class="w3-bar w3-light-grey w3-border w3-xxlarge" style="width:100%; height: 100px; margin-top:1%;">
    <a href="index.php" class="w3-bar-item w3-button" style=" height: 100px; width:25%;"><i class="fa fa-graduation-cap" style="margin-top:20px;"></i></a>
    <a href="lister.php" class="w3-bar-item w3-button" style="height: 100px; width:25%; border: 1px solid;"><i class="fa fa-list-alt" style="margin-top:20px;">    LISTER  </i></a>
    <a href="ajouter.php" class="w3-bar-item w3-button w3-green" style="height: 100px; width:25%; border: 1px solid;"><i class="fa fa-plus" style="margin-top:20px;">    AJOUTER   </i></a>
    <a href="rechercher.php" class="w3-bar-item w3-button" style="height: 100px; width:25%; border: 1px solid;"><i class="fa fa-search" style="margin-top:20px;">    RECHERCHER   </i></a>
</div>


<div class="container">
	<div class="row" style="width: 70%; margin: 0 auto;">
		<form action="" method="POST" class="w3-container w3-card-4 w3-light-grey w3-text-blue w3-margin">
			<h2 class="w3-center">AJOUTER ETUDIANT</h2>
			
			<div class="w3-row w3-section">
				<div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-registered"></i></div>
				<div class="w3-rest">
					<input class="w3-input w3-border" name="matricule" value="<?php if(isset($_POST['matricule']))echo $_POST['matricule']?>" type="text" placeholder="Le Matricule" required>
				</div>
			</div>
			
			<div class="w3-row w3-section">
				<div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-user"></i></div>
				<div class="w3-rest">
					<input class="w3-input w3-border" name="nom" value="<?php if(isset($_POST['nom']))echo $_POST['nom']?>" type="text" placeholder="Votre Nom" required>
				</div>
			</div>

			<div class="w3-row w3-section">
				<div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-user"></i></div>
				<div class="w3-rest">
					<input class="w3-input w3-border" name="prenom" type="text" value="<?php if(isset($_POST['prenom']))echo $_POST['prenom']?>" placeholder="Votre Prénom please" required>
				</div>
			</div>

			<div class="w3-row w3-section">
				<div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-envelope-o"></i></div>
				<div class="w3-rest">
					<input class="w3-input w3-border" name="mail" value="<?php if(isset($_POST['mail']))echo $_POST['mail']?>" type="email" placeholder="Email">
				</div>
			</div>

			<div class="w3-row w3-section">
				<div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-phone"></i></div>
				<div class="w3-rest">
					<input class="w3-input w3-border" name="tel" value="<?php if(isset($_POST['tel']))echo $_POST['tel']?>" type="number" placeholder="Phone" required>
				</div>
			</div>

			<div class="w3-row w3-section">
				<div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-calendar"></i></div>
				<div class="w3-rest">
					<input class="w3-input w3-border" name="ddn" value="<?php if(isset($_POST['ddn']))echo $_POST['ddn']?>" type="date" required>
				</div>
			</div>
			<div class="w3-row w3-section" >
				<div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-line-chart ">Boursier</i>
					<input class="w3-input w3-border" id="boursier" value="Boursier" value="<?php if(isset($_POST['bourse']))echo $_POST['bourse']?>" name="bourse" type="radio" required>
				</div>

				<div class="w3-col" style="width:50px; margin-left: 50%;"><i class="w3-xxlarge fa fa-line-chart ">NonBoursier</i>
					<input class="w3-input w3-border" id="nonboursier" value="NonBoursier" name="bourse" value="<?php if(isset($_POST['bourse']))echo $_POST['bourse']?>" type="radio" required>
				</div>
				
			</div>


			<div class="w3-row w3-section" id="adresse">
				<div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-map-marker"></i></div>
				<div class="w3-rest">
					<input class="w3-input w3-border" name="adresse" value="<?php if(isset($_POST['adresse']))echo $_POST['adresse']?>" type="text" placeholder="Votre Adresse please" >
				</div>
			</div>

			<div class="w3-row w3-section" id="type">
				<div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-building"></i></div>
				<div class="w3-rest">
					<select class="w3-input w3-border" name="situation" placeholder="Votre Adresse please" >
					<?php 
					
						$pdo = new PDO("mysql:host=127.0.0.1;dbname=MiniProjetPHPOO","root","Moimeme2018");
						$requete = "select * from Situation";
						$res = $pdo->prepare($requete);
						$donnee = $res ->execute();
						echo '<meta charset="UTF-8">';
						echo '<option value=""></option>';
						while ($a = $res->fetch()) {
							echo '<option value="'.$a['libelle'].'">'.$a['libelle'].'</option>';
						}
					
						?>
					</select>
				</div>
			</div>

			<div class="w3-row w3-section" id="loger">
				<div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-calendar">Loger</i>
					<input class="w3-input w3-border" id="logero" value="Loger" name="loger" type="radio" >
				</div>
				<div class="w3-col" style="width:50px; margin-left: 50%;"><i class="w3-xxlarge fa fa-calendar">NonLoger</i>
					<input class="w3-input w3-border" id="logern" value="NonLoger" name="loger" type="radio" >
				</div>
			</div>

			<div class="w3-row w3-section" id="logement">
				<div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-building"></i></div>
				<div class="w3-rest">
					<select class="w3-input w3-border" name="batiment" placeholder="Votre Adresse please" >
					<?php 
					
					$pdo = new PDO("mysql:host=127.0.0.1;dbname=MiniProjetPHPOO", "root","Moimeme2018");
					$requete = "select * from Batiment";
					$res = $pdo->prepare($requete);
					$donnee = $res ->execute();
					echo '<option value=""></option>';
					while ($a = $res->fetch()) {
						echo '<option value="'.$a['numbat'].'">'.$a['numbat'].'</option>';
					}
					
						?>
					</select>
				</div>
			</div>

			<div class="w3-row w3-section" id="logement1">
				<div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-home"></i></div>
				<div class="w3-rest">
					<select class="w3-input w3-border" name="chambre" placeholder="Votre Adresse please" >
						
						<?php
							
							$pdo = new PDO("mysql:host=127.0.0.1;dbname=MiniProjetPHPOO", "root","Moimeme2018");
							$requete = "select * from Chambre";
							$res = $pdo->prepare($requete);
							$donnee = $res ->execute();
							echo '<option value=""></option>';
							while ($a = $res->fetch()) {
								echo '<option value="'.$a['numcham'].'">'.$a['numcham'].'</option>';
							}
						?>
					</select>
				</div>
			</div>

			<button type="submit" name="submit" class="w3-button w3-block w3-section w3-blue w3-ripple w3-padding">Send</button>

		</form>

		<?php


			if (isset($_POST['submit'])) {
				$matricule=$_POST['matricule'];
				$nom=$_POST['nom'];
				$prenom=$_POST['prenom'];
				$mail=$_POST['mail'];
				$tel=$_POST['tel'];
				$ddn=$_POST['ddn'];
				$bourse = $_POST['bourse'];
				
			

				include '../Classes/ServiceEtudiant.php';
				$test = new Service();		
				if ($bourse == "NonBoursier") {
					$adresse=$_POST['adresse'];
					$donne = new NonBoursier($matricule,$nom,$prenom,$tel,$mail,$ddn,$adresse);
					$insert = $test->add($donne);
					if ($insert) {
						echo "<h2 class='reponse'>INSERTION D'UN ETUDIANT NON BOURSIER RÉUSSIE</h2>";
					} else {
						echo "<h2 class='reponse'>CE MATRICULE EXISTE DEJA</h2>";
					}
					
				}
				else {
					$loger = $_POST['loger'];
				
					if ($bourse =="Boursier" && $loger=="NonLoger") {
						$type = $_POST['situation'];
						$donne = new Boursier($matricule,$nom,$prenom,$tel,$mail,$ddn,$type);
						$insert = $test->add($donne);
						if ($insert) {
							echo "<h2 class='reponse'>INSERTION D'UN ETUDIANT BOURSIER ET NON LOGER RÉUSSIE</h2>";
						} else {
							echo "<h2 class='reponse'>CE MATRICULE EXISTE DEJA</h2>";
						}
					}
				
					elseif ($bourse =="Boursier" && $loger =="Loger") {
						$chambre = $_POST['chambre'];
						$batiment = $_POST['batiment'];
						$donne = new Loger($matricule,$nom,$prenom,$tel,$mail,$ddn,$type,$chambre,$batiment);
						$insert = $test->add($donne);
						if ($insert) {
							echo "<h2 class='reponse'>INSERTION D'UN ETUDIANT BOURSIER ET LOGER RÉUSSIE</h2>";
						} else {
							echo "<h2 class='reponse'>CE MATRICULE EXISTE DEJA</h2>";
						}
					}	

				}
			}
			


		?>
	</div>
</div>
<footer class="footer">
    <div class="container">
  <h3 class="text-center">Contact</h3>
  <p class="text-center"><em>Sadikh</em></p>

  <div class="row">
    <div class="col-md-4">
      <p><span class="glyphicon glyphicon-map-marker"></span>Guédiawaye, Hamo 4</p>
      <p><span class="glyphicon glyphicon-phone"></span>Phone: +221 78 440 88 22</p>
      <p><span class="glyphicon glyphicon-envelope"></span>Email: sadikhabou@mail.com</p>
    </div>
    <div class="col-md-8">
      <div class="row">
        <div class="col-sm-6 form-group">
          <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
        </div>
        <div class="col-sm-6 form-group">
          <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
        </div>
      </div>
      <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea>
      <br>
      <div class="row">
        <div class="col-md-12 form-group">
          <button class="btn pull-right" type="submit">Send</button>
        </div>
      </div>
    </div>
  </div>
</div>

    </footer>
</body>
</html>


