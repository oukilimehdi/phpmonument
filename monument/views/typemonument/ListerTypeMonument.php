<!DOCTYPE HTML>
<head>
	<?php
		session_start();
		$listeTypemonument = $_SESSION['listeTypemonument'];
	?>
</head>
<html>  
<body>

<table>
	<thead>
		<tr>
			<th>Libellé</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($listeTypemonument as $ligne ) {?>	
		<tr>
			<td><?php echo $ligne['Libelle_TYPE_Monument'];?></td>
			<td><a href="../../controllers/typemonument/TypeMonumentVoirAccept.php?idtypemonument=<?php echo $ligne['ID_TYPE_Monument'] ?>">Voir</a>&nbsp;&nbsp;
			<a href="../../controllers/typemonument/typemonumentModifierAcceptchercher.php?idtypemonument=<?php echo $ligne['ID_TYPE_Monument'] ?>">Modifier</a>&nbsp;
			<a href="../../controllers/typemonument/typemonumentsupprimerAcceptChercher.php?idtypemonument=<?php echo $ligne['ID_TYPE_Monument'] ?>">Supprimer</a></td>
		</tr>
		<?php
			}
		?>
	</tbody>
</table>
<a href="frmTypeMonumentCreer.php"><button>Ajouter</button></a>
</body>
</html>