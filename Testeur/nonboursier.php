<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
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
    <div class="w3-bar w3-light-grey w3-border w3-xxlarge" style="width:100%; height: 100px; margin-top:1%;">
        <a href="index.php" class="w3-bar-item w3-button" style=" height: 100px; width:25%;"><i class="fa fa-graduation-cap" style="margin-top:20px;"></i></a>
        <a href="lister.php" class="w3-bar-item w3-button" style="height: 100px; width:25%; border: 1px solid;"><i class="fa fa-list-alt" style="margin-top:20px;">    LISTER  </i></a>
        <a href="ajouter.php" class="w3-bar-item w3-button" style="height: 100px; width:25%; border: 1px solid;"><i class="fa fa-plus" style="margin-top:20px;">    AJOUTER   </i></a>
        <a href="rechercher.php" class="w3-bar-item w3-button w3-green" style="height: 100px; width:25%; border: 1px solid;"><i class="fa fa-search" style="margin-top:20px;">    RECHERCHER   </i></a>
    </div>
    <div class="w3-bar w3-light-grey w3-border w3-xxlarge" style="width:100%; height: 70px; margin-top:1%; background: #ccc;">
        <a href="rechercher.php" class="w3-bar-item w3-button" style=" height: 70px; width:20%; border: 1px solid; box-shadow: 5px 5px 5px 5px;"><i class="fa fa-graduation-cap" style="margin-top:10px;">Boursier</i></a>
        <a href="rechercherloger.php" class="w3-bar-item w3-button" style="height: 70px; width:20%; border: 1px solid; margin-left: 5%; box-shadow: 5px 5px 5px 5px;"><i class="fa fa-list-alt" style="margin-top:10px;">    Loger  </i></a>
        <a href="rechercheboursiernonloger.php" class="w3-bar-item w3-button " style="height: 70px; width:20%; border: 1px solid; margin-left: 5%; box-shadow: 5px 5px 5px 5px;"><i class="fa fa-plus" style="margin-top: -12px;">    Boursier & Non Loger   </i></a>
        <a href="#" class="w3-bar-item w3-button w3-green" style="height: 70px; width:20%; border: 1px solid; margin-left: 5%; border-radius: 5px 5px 5px 5px; box-shadow: 5px 5px 5px 5px;"><i class="fa fa-plus" style="margin-top:-12px;">    Non Boursier  </i></a>
    </div>


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
          <th>Editer</th>
          <th>Supprimer</th>
                </tr>
            </thead>   
            <tbody>
					<?php
					
						include '../Classes/ServiceEtudiant.php';
						$test = new Service();
						$p = new Etudiant();
						$x = $test->findBoursier("NonBoursier");
						while ($row = $x->fetch()) {
							echo "<tr>";
                echo "<td>".$row['matricule']."</td>";
                echo "<td>".$row['nom']."</td>";
                echo "<td>".$row['prenom']."</td>";
                echo "<td>".$row['mail']."</td>";
                echo "<td>".$row['tel']."</td>";
                echo "<td>".$row['ddn']."</td>";
                echo'<td align="center"><button class="btn btn-primary">modifier</button></td>';
                echo'<td align="center"><button class="btn btn-danger">supprimer</button></td>';
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