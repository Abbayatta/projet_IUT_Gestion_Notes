
<?php
	
	session_start();

	if ($_SESSION["rank"]==2) 
	{
		
?>
	<!-- ADMINISTRATEUR -->
		<!DOCTYPE html>
		<html lang="en">
		<head>
		    <meta charset="utf-8">
		    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		    <title>Unités d'enseignement</title>

		    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
		    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
		    <link rel="stylesheet" type="text/css" href="css/local.css" />
			<!-- you need to include : pour travailler sur les tableaux -->
			<link rel="stylesheet" type="text/css" href="css/dataTables-departement.css" />
			
		    <!--<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>-->
			<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
		    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>  
			
			<!-- you need to include : pour travailler sur les tableaux -->
			<script type="text/javascript" src="js/dataTables-departement.min.js"></script>  
			
			<style>
		        tr.group,
				tr.group:hover {
					background-color: #ddd !important;
				}
		    </style>
		</head>
		<body>

		    <div id="wrapper">
				<!-- Includes -->
		        <?php include("nav.php"); include("get_ue.php");?>
				
				<div class="row text-center">
					<h2>Unités d'enseignement</h2>
				</div>
				<div class="row center-block">
		            <div class="col-lg-12">
		               <table id="example" class="display" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>Numéro</th>
								<th></th>
								<th>Département</th>
								<th>Description</th>
								<th>Supprimer</th>
							</tr>
						</thead>
				 
						<tfoot>
							<tr>
								<th>Nom</th>
								<th></th>
								<th>Département</th>
								<th>Description</th>
								<th>Supprimer</th>
							</tr>
						</tfoot>
				 
						<tbody>
						<?php get_all_ue(); ?>
		        		</tbody>
		    			</table>
		            </div>
		        </div>
		        <div class="row center-block">
					<div class="col-lg-6 text-left">
						<h4><a href="add_ue.php"><i class="fa fa-plus"></i> Nouvelle unité d'enseignement</a></h4>
					</div>
				</div>
		    </div>
			
			
			<script type="text/javascript">
	
		        jQuery(function ($) {
				
				var table = $('#example').DataTable({
		        "columnDefs": [
		            { "visible": false, "targets": 2 }
		        ],
		        "order": [[ 2, 'asc' ]],
		        "displayLength": 25,
		        "drawCallback": function ( settings ) {
		            var api = this.api();
		            var rows = api.rows( {page:'current'} ).nodes();
		            var last=null;
		 
		            api.column(2, {page:'current'} ).data().each( function ( group, i ) {
		                if ( last !== group ) {
		                    $(rows).eq( i ).before(
		                        '<tr class="group"><td colspan="5">'+group+'</td></tr>'
		                    );
		 
		                    last = group;
							}
						} );
					}
				} );

				// Order by the grouping
				$('#example tbody').on( 'click', 'tr.group', function () {
		        var currentOrder = table.order()[0];
		        if ( currentOrder[0] === 2 && currentOrder[1] === 'asc' ) {
		            table.order( [ 2, 'desc' ] ).draw();
		        }
					else {
		            table.order( [ 2, 'asc' ] ).draw();
					}	
					} );
		        });
		    </script>

		</body>
		</html>
<?php
}

else if ($_SESSION["rank"]==1)
{
?>
<!-- PROFESSEUR -->
<!DOCTYPE html>
		<html lang="en">
		<head>
		    <meta charset="utf-8">
		    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		    <title>Groupes d'étudiants</title>

		    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
		    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
		    <link rel="stylesheet" type="text/css" href="css/local.css" />
			<!-- you need to include : pour travailler sur les tableaux -->
			<link rel="stylesheet" type="text/css" href="css/dataTables-departement.css" />
			
		    <!--<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>-->
			<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
		    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>  
			
			<!-- you need to include : pour travailler sur les tableaux -->
			<script type="text/javascript" src="js/dataTables-departement.min.js"></script>  
			
			<style>
		        tr.group,
				tr.group:hover {
					background-color: #ddd !important;
				}
		    </style>
		</head>
		<body>

		    <div id="wrapper">
				<!-- Includes -->
		        <?php include("nav.php"); include("get_groups.php");?>
				
				<div class="row text-center">
					<h2>Classes</h2>
				</div>
				<div class="row center-block">
		            <div class="col-lg-12">
		               <table id="example" class="display" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>Nom</th>
								<th></th>
								<th>Département</th>
								<th>Nombre d'élèves</th>
							</tr>
						</thead>
				 
						<tfoot>
							<tr>
								<th>Nom</th>
								<th></th>
								<th>Département</th>
								<th>Nombre d'élèves</th>
							</tr>
						</tfoot>
				 
						<tbody>
						<?php get_prof_groups($_SESSION["id"]); ?>
		        		</tbody>
		    			</table>
		            </div>
		        </div>
		        <div class="row center-block">
					<div class="col-lg-6 text-left">
						<h4><a href="add_group.php"><i class="fa fa-plus"></i> Nouveau groupe</a></h4>
					</div>
				</div>
		    </div>
			
			
			<script type="text/javascript">
		        jQuery(function ($) {
				
				<!-- you need to include : pour travailler sur les tableaux -->
				var table = $('#example').DataTable({
		        "columnDefs": [
		            { "visible": false, "targets": 2 }
		        ],
		        "order": [[ 2, 'asc' ]],
		        "displayLength": 25,
		        "drawCallback": function ( settings ) {
		            var api = this.api();
		            var rows = api.rows( {page:'current'} ).nodes();
		            var last=null;
		 
		            api.column(2, {page:'current'} ).data().each( function ( group, i ) {
		                if ( last !== group ) {
		                    $(rows).eq( i ).before(
		                        '<tr class="group"><td colspan="5">'+group+'</td></tr>'
		                    );
		 
		                    last = group;
							}
						} );
					}
				} );
				<!-- you need to include : pour travailler sur les tableaux -->
				// Order by the grouping
				$('#example tbody').on( 'click', 'tr.group', function () {
		        var currentOrder = table.order()[0];
		        if ( currentOrder[0] === 2 && currentOrder[1] === 'asc' ) {
		            table.order( [ 2, 'desc' ] ).draw();
		        }
					else {
		            table.order( [ 2, 'asc' ] ).draw();
					}	
					} );
		        });
		    </script>

		</body>
		</html>
<?php	
}

else
{
	header("Location: index.php");
	exit;
}