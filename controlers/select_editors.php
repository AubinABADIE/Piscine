<?php
		require('connect_bdd.php');

		$InfoEditeur = $BaseDeDonnée->query('select ID_Editor,Name,count(ID_Game) from editor');
		$data = $InfoEditeur->fetchAll();
		$TABLEAU_FINAL = array()
		foreach ($data as $key => $value) 
		{
			$TABLEAU_INDIV=array([,,])
			$TABLEAU_INDIV[0]='ID_Editor'
			$TABLEAU_INDIV[1]='Name'
			$TABLEAU_INDIV[2]='count(ID_Game'
			echo <tbody> $TABLEAU_INDIV <tbody>

		}
		$InfoEditeur->closeCursor();
		$InfoEditeur = null;
?>
