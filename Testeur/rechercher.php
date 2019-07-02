<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../Bootstrap/menu.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
    <title>Lister l'ensemble des Etudiants</title>
    <style>
        .footer {
            margin-top: 5%;
            height: 350px;
            border: 1px solid;
        }
    </style>
</head> 
<body style="background: #F2F2F2;" >
    <header>
        <a href="#" class="logo">LOGO</a>
        <div class="menu-toggle"></div>
        <nav>
            <ul>
                <li><a href="lister.php" >LISTER</a></li>
                <li><a href="ajout.php">AJOUTER</a></li>
                <li><a href="#">MODIFIER</a></li>
                <li><a href="#">SUPPRIMER</a></li>
                <li><a href="rechercher.php" class="active">RECHERCHER</a>
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


	<div style="margin-top: 3%;">
        <table id="example" class="table table-striped table-bordered">
            <thead>
                <tr>       
					<th>Matricule</th>
					<th>Nom</th>
					<th>Prénom</th>
					<th>Email</th>
					<th>Telephone</th>
          <th>Date De Naissance</th>
          <th>Type de Bourse</th>
          <th>Editer</th>
          <th>Supprimer</th>
                </tr>
            </thead>   
            <tbody>
					<?php
					
						include '../Classes/ServiceEtudiant.php';
						$test = new Service();
						$p = new Etudiant();
						$x = $test->findAll("Etudiant");
						while ($row = $x->fetch()) {
							echo "<tr>";
                echo "<td>".$row['matricule']."</td>";
                echo "<td>".$row['nom']."</td>";
                echo "<td>".$row['prenom']."</td>";
                echo "<td>".$row['mail']."</td>";
                echo "<td>".$row['tel']."</td>";
                echo "<td>".$row['ddn']."</td>";
                $statut = $row['matricule'];
                $y= $test->statut($statut);
                echo "<td>".$y."</td>";
                  echo'<td align="center"><a href="modifier.php?id='.$row['idEtu'].'"><button class="btn btn-primary">modifier</button></a></td>';
                  echo'<td align="center"><a onclick="return confirm("êtes vous sur de vouloir supprimer cette etudiant?")" href="supprimer.php?id='.$row['idEtu'].'"><button class="btn btn-danger">supprimer</button></a></td>';
              echo "</tr>";
            }
					?>
            </tbody>
		</table>
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

<script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>

<script>
    $(document).ready(function(){
        $('.menu-toggle').click(function(){
            $('.menu-toggle').toggleClass('active')
            $('nav').toggleClass('active')
        });
    });
</script>