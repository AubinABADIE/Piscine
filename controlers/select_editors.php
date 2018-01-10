<?php
		require('connect_bdd.php');

		$InfoEditeur = $BaseDeDonnée->query('select ID_Editor,Name,count(ID_Game) from editor');
		$data = $InfoEditeur->fetchAll();
		foreach ($data as $key => $value) 
		{
			echo
			<tbody>
				<tr>
					<td>.'ID_Editor'.</td>
					<td>.'Name'.</td>
					<td>.'count(ID_Game'.</td>
				</tr>
			</tbody>
		}
		$InfoEditeur->closeCursor();
		$InfoEditeur = null;
?>
