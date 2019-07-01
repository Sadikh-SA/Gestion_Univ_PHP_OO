<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../Bootstrap/menu.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
    <title>Modifier</title>
    <style>
        .reponse{
			text-align: center;
			width: 400px;
			box-shadow: 5px 5px 5px 5px;
			border-radius: 24px;
            color: darkgray;
            background: #191919;
            margin: 0 auto;
            margin-top: 5%;
		}
    </style>
</head>
<body>

    <header>
        <a href="#" class="logo">LOGO</a>
        <div class="menu-toggle"></div>
        <nav>
            <ul>
                <li><a href="lister.php">LISTER</a></li>
                <li><a href="ajout.php">AJOUTER</a></li>
                <li><a href="#" class="active">MODIFIER</a></li>
                <li><a href="#">SUPPRIMER</a></li>
                <li><a href="rechercher.php">RECHERCHER</a>
                    <ul class="sousmenu">
                      <li><a href="nonboursier.php">Etudiant Non Boursier</a></li>
                      <li><a href="rechercheboursiernonloger.php">Etudiant Boursier Non Loger</a></li>
                      <li><a href="rechercherloger.php">Etudiant Boursier & Loger</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div class="clearfix"></div>
	</header>
	
	<?php
		$id=$_GET['id'];
		$pdo = new PDO("mysql:host=127.0.0.1;dbname=MiniProjetPHPOO","root","Moimeme2018");
		$requete = "SELECT matricule, nom, prenom, tel, mail, ddn from Etudiant,NonBoursier, Boursier where NonBoursier.idEtu=$id OR Boursier.idEtu=$id";
		$res = $pdo->prepare($requete);
		$donne = $res->execute();
		//var_dump($donne);
		while ($a = $res->fetch()) {
			
		//var_dump($a['nom']);
		//var_dump($a['prenom']);
	?>

    <form action="#" method="post" class="box" style="">
        <h1>MODIFIER ETUDIANT</h1>
        <input type="text" name="matricule" id="" value="<?php echo $a['matricule'] ?>" placeholder="Matricule">
        <input type="text" name="nom" id="" value="<?php echo $a['nom'] ?>" placeholder="Votre Nom">
        <input type="text" name="prenom" id="" value="<?php echo $a['prenom'] ?>" placeholder="Votre Prénom">
        <input type="number" name="tel" id="" value="<?php echo $a['tel'] ?>" placeholder="Votre Téléphone">
        <input type="email" name="mail" id="" value="<?php echo $a['mail'] ?>" placeholder="Votre Mail">
        <input type="date" name="ddn" id="" value="<?php echo $a['ddn'] ?>" >
        <label for="" id="boursiers">Boursier</label> <input type="radio" id="boursier" name="bourse" value="Boursier">
        <label for="" id="nonboursiers">Non Boursier</label> <input type="radio" id="nonboursier" name="bourse" value="NonBoursier">
        <input type="text" name="adresse" id="adresse" value="<?php ?>" placeholder="Votre Adresse">
        <select id="type" name="situation" placeholder="Votre Adresse please" >
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
        <label for="" id="ologer">Loger</label><input type="radio" id="loger" name="loger" value="Loger">
        <label for="" id="nloger">Non Loger</label><input type="radio" id="nonloger" name="loger" value="NonLoger">
        <select id="batiment" name="batiment" placeholder="Votre Adresse please" >
		    <?php 
					
                $pdo = new PDO("mysql:host=127.0.0.1;dbname=MiniProjetPHPOO", "root","Moimeme2018");
                $requete = "select * from Batiment";
                $res = $pdo->prepare($requete);
                $donnee = $res ->execute();
                echo '<option value=""></option>';
                while ($a = $res->fetch()) {
                    echo '<option id="bat" value="'.$a['numbat'].'">'.$a['numbat'].'</option>';
                }
						
		    ?>
	    </select>
        <input type="text" name="chambre" id="chambre" placeholder="Chambre">
        <input type="submit" name="submit" value="Envoyer">
    </form>


    <?php
		}
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
					$insert = $test->update($donne,$matricule);
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
						$donnes = new Boursier($matricule,$nom,$prenom,$tel,$mail,$ddn,$type);
						$insert = $test->update($donnes,$matricule);
						if ($insert) {
							echo "<h2 class='reponse'>INSERTION D'UN ETUDIANT BOURSIER ET NON LOGER RÉUSSIE</h2>";
						} else {
							echo "<h2 class='reponse'>CE MATRICULE EXISTE DEJA</h2>";
						}
					}
				
					elseif ($bourse =="Boursier" && $loger =="Loger") {
						$chambre = $_POST['chambre'];
						$batiment = $_POST['batiment'];
						$type = $_POST['situation'];
						$donness = new Loger($matricule,$nom,$prenom,$tel,$mail,$ddn,$type,$chambre,$batiment);
						$insert = $test->update($donness,$matricule);
						if ($insert) {
							echo "<h2 class='reponse'>INSERTION D'UN ETUDIANT BOURSIER ET LOGER RÉUSSIE</h2>";
						} else {
							echo "<h2 class='reponse'>CE MATRICULE EXISTE DEJA</h2>";
						}
					}	

				}
			}
			


		?>
</body>
</html>

<script src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous">
</script>

<script>
    $(document).ready(function(){
        $('.menu-toggle').click(function(){
            $('.menu-toggle').toggleClass('active')
            $('nav').toggleClass('active')
        });
    });
</script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
	<script src="../JQuery/jquery-3.2.1.js"></script>
	<script>
		$(document).ready(function(){

			$("#adresse").hide();
            $("#ologer").hide();
			$("#nloger").hide();
			$("#loger").hide();
			$("#nonloger").hide();
            $("#type").hide();
			$("#batiment").hide();
			$("#chambre").hide();

			$("#nonboursier").click(function(){
				$("#adresse").show();
                $("#ologer").hide();
			    $("#nloger").hide();
				$("#loger").hide();
				$("#nonloger").hide();
                $("#type").hide();
                $("#batiment").hide();
                $("#chambre").hide();
			});
			$("#boursier").click(function(){
                $("#ologer").show();
			    $("#nloger").show();
				$("#loger").show();
				$("#type").show();
                $("#nonloger").show();
				$("#adresse").hide();
				$("#batiment").hide();
                $("#chambre").hide();
			});
			$("#loger").click(function(){
				$("#batiment").show();
                $("#chambre").show();
			});
			$("#nonloger").click(function(){
				$("#batiment").hide();
                $("#chambre").hide();
                $("#adresse").hide();
			});
		});
	</script>