<!DOCTYPE html>
<html lang="fr">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../Bootstrap/menu.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
    <script src="../bootstrap/js/bootstrap.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script src="https://cdn.datatables.net/plug-ins/1.10.19/i18n/French.json"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>

<script>
    $(document).ready(function(){
        $('.menu-toggle').click(function(){
            $('.menu-toggle').toggleClass('active')
            $('nav').toggleClass('active')
        });
    });
</script>
    <title>Lister l'ensemble des Etudiants</title>
    <style>
        .footer {
            margin-top: 5%;
            height: 350px;
            border: 1px solid;
        }
    </style>
</head> 
<body style="background:none;">
    <header>
        <a href="#" class="logo">LOGO</a>
        <div class="menu-toggle"></div>
        <nav>
            <ul>
                <li><a href="#" class="active">LISTER</a></li>
                <li><a href="ajout.php">AJOUTER</a></li>
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


	<div style="margin-top: 3%;">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>       
					<th>Matricule</th>
					<th>Nom</th>
					<th>Prénom</th>
					<th>Email</th>
					<th>Telephone</th>
					<th>Date De Naissance</th>
					<th>Statut</th>
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
                            echo'<td align="center"><a href="supprimer.php?id='.$row['idEtu'].'"><button class="btn btn-danger">supprimer</button></a></td>';
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
                $('#example').DataTable({
                    dom: "<'row'<'col-sm-4'f><'col-sm-offset-2 col-sm-6'B>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-xs-12 col-sm-7 col-sm-offset-5 text-right'p>>",
                    "aoColumnDefs": [{
                        'bSortable': false,
                        'aTargets': [-1]
                    }],
                    "oLanguage": {
                        "oPaginate": {
                            "sFirst": "Premier",
                            "sLast": "Dérnier",
                            "sNext": "Suivant",
                            "sPrevious": "Précedent",
                        },
                        "sSearch": "Recherche:",
                        "sEmptyTable": "Aucune donnée disponible",
                        "sInfo": "affichage de START à END sur TOTAL éléments",
                        "sInfoEmpty": "Aucune donnée disponible",
                        "sInfoFiltered": "(Recherché sur MAX éléments au total)",
                        "infoPostFix": "",
                        "thousands": ",",
                        "sLengthMenu": "Afficher par MENU éléments",
                        "loadingRecords": "Chargement...",
                        "processing": "procéssus...",
                        "sZeroRecords": "Aucun résultat trouvé",
                    },
                    "iDisplayLength": 10,
                    "lengthChange": false,
                    "info": false,
                    buttons: [{
                        extend: "copyHtml5",
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7]
                        },
                        className: "btn-sm",
                        text: "Copier"
                    }, {
                        extend: "csvHtml5",
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7]
                        },
                        className: "btn-sm"
                    }, {
                        extend: "excelHtml5",
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7]
                        },
                        className: "btn-sm"
                    }, {
                        extend: "pdfHtml5",
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7]
                        },
                        className: "btn-sm"
                    }, {
                        extend: "print",
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7]
                        },
                        className: "btn-sm",
                        text: "Imprimer"
                    }],
                    responsive: false
                });

            });
        </script>

