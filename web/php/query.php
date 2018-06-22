<?php 

	function query_sede($con, $distaccamento)
	{
		 $sql_sede = "SELECT COUNT(disponibilita.IDDIsponibilita) FROM disponibilita, utenti, vigili, distaccamenti 
                        	WHERE distaccamenti.IDDistaccamento = vigili.IDDistaccamento AND vigili.IDVigile = utenti.IDVigile 
                        	AND utenti.IDUtente = disponibilita.IDUtente AND distaccamenti.Citta = '$distaccamento' AND vigili.Stato = '2'  
                        	AND DATE_FORMAT(NOW(), '%Y, %c, %d') = DATE_FORMAT(disponibilita.Inserimento, '%Y, %c, %d')                                
                        	AND TIME_FORMAT(NOW(), '%T') BETWEEN disponibilita.Inizio AND disponibilita.Fine";
    	 $result_sede = @mysqli_query($con, $sql_sede) or die("Errore query vigili in sede");
    	 $row_sede = mysqli_fetch_array($result_sede);
    	 @mysqli_free_result($result_sede);
    	 return $row_sede;
	}

	function query_reperibili($con, $distaccamento)
	{
		$sql_reperibili = "SELECT COUNT(disponibilita.IDDIsponibilita) FROM disponibilita, utenti, vigili, distaccamenti 
                        	WHERE distaccamenti.IDDistaccamento = vigili.IDDistaccamento AND vigili.IDVigile = utenti.IDVigile 
                        	AND utenti.IDUtente = disponibilita.IDUtente AND distaccamenti.Citta = '$distaccamento' AND vigili.Stato = '1'   
                        	AND DATE_FORMAT(NOW(), '%Y, %c, %d') = DATE_FORMAT(disponibilita.Inserimento, '%Y, %c, %d')                                
                        	AND TIME_FORMAT(NOW(), '%T') BETWEEN disponibilita.Inizio AND disponibilita.Fine";

    	$result_reperibili = @mysqli_query($con, $sql_reperibili) or die("Errore query vigili reperibili");
    	 $row_reperibili = mysqli_fetch_array($result_reperibili);
    	 @mysqli_free_result($result_reperibili); 
    	 return $row_reperibili;
	}

	function query_disponibiliTot($con, $distaccamento)
	{
		$sql_disponibili = "SELECT COUNT(disponibilita.IDDIsponibilita) FROM disponibilita, utenti, vigili, distaccamenti 
                		    WHERE distaccamenti.IDDistaccamento = vigili.IDDistaccamento AND vigili.IDVigile = utenti.IDVigile 
	            			AND utenti.IDUtente = disponibilita.IDUtente AND distaccamenti.Citta = '$distaccamento'  
	                        AND DATE_FORMAT(NOW(), '%Y, %c, %d') = DATE_FORMAT(disponibilita.Inserimento, '%Y, %c, %d')                                
	                        AND TIME_FORMAT(NOW(), '%T') BETWEEN disponibilita.Inizio AND disponibilita.Fine";	
         $result_disponibili = @mysqli_query($con, $sql_disponibili) or die("Errore query vigili disponibili");
         $row_disponibili = mysqli_fetch_array($result_disponibili);

         return $row_disponibili;
	}

	function query_dati($con, $distaccamento)
	{
		$sql = "SELECT distaccamenti.Indirizzo, distaccamenti.Telefono, distaccamenti.Cicalino FROM distaccamenti WHERE Citta = '$distaccamento'";
      					$result = @mysqli_query($con, $sql) or die("Errore query su tabella distaccamenti");
      					$row = mysqli_fetch_array($result);
      					echo "<tr class='small-font'>". "<th>Indirizzo</th>" . "<td>" . $row['Indirizzo'] . "</td></tr>";      					
      					echo "<tr class='small-font'>". "<th>Telefono</th>" . "<td>" . $row['Telefono'] . "</td></tr>";
      					if($row['Cicalino'] != NULL)
      						echo "<tr class='small-font'>". "<th>Cicalino</th>" . "<td>" . $row['Cicalino'] . "</td></tr>";

      					@mysqli_free_result($result);
	}

	function query_capoPosto($con, $distaccamento)
	{
		$sql = "SELECT vigili.Cognome, vigili.Nome FROM vigili, distaccamenti 
                        WHERE distaccamenti.IDDistaccamento = vigili.IDDistaccamento AND distaccamenti.Citta = '$distaccamento' 
                        AND vigili.Capoposto = 1";
				       	$result = @mysqli_query($con, $sql) or die("Errore query capoposto");
				       	$row = mysqli_fetch_array($result);
				       	if($row['Cognome'] && $row['Nome'])
				       		echo "<tr class='small-font'>". "<th>Capo posto</th>" . "<td>" . $row['Cognome'] . " " . $row['Nome'] . "</td></tr>";
				       	else
				       		echo "<tr class='small-font'>". "<th>Capo posto</th>" . "<td>Nessuno</td></tr>";
				       	@mysqli_free_result($result);
	}

	function query_capoSquadra($con, $distaccamento)
	{
		$sql = "SELECT COUNT(disponibilita.IDDIsponibilita) FROM disponibilita, utenti, vigili, distaccamenti 
                        WHERE distaccamenti.IDDistaccamento = vigili.IDDistaccamento AND vigili.IDVigile = utenti.IDVigile 
                        AND utenti.IDUtente = disponibilita.IDUtente AND distaccamenti.Citta = '$distaccamento' AND vigili.Ruolo = 'Capo squadra volontario'  
                        AND DATE_FORMAT(NOW(), '%Y, %c, %d') = DATE_FORMAT(disponibilita.Inserimento, '%Y, %c, %d')                                
                        AND TIME_FORMAT(NOW(), '%T') BETWEEN disponibilita.Inizio AND disponibilita.Fine";
				       	$result = @mysqli_query($con, $sql) or die("Errore query conteggio disponibilità");
				       	$row = mysqli_fetch_array($result);
				       	echo "<tr>". "<th>Capi squadra</th>" . "<td>" . $row[0] . "</td></tr>";
				       	@mysqli_free_result($result);
	}

	function query_gradoPatente($con, $distaccamento, $grado)
	{
		$sql = "SELECT COUNT(disponibilita.IDDIsponibilita) FROM disponibilita, utenti, vigili, distaccamenti 
                        WHERE distaccamenti.IDDistaccamento = vigili.IDDistaccamento AND vigili.IDVigile = utenti.IDVigile 
                        AND utenti.IDUtente = disponibilita.IDUtente AND distaccamenti.Citta = '$distaccamento' AND vigili.Patente = '$grado'  
                        AND DATE_FORMAT(NOW(), '%Y, %c, %d') = DATE_FORMAT(disponibilita.Inserimento, '%Y, %c, %d')                                
                        AND TIME_FORMAT(NOW(), '%T') BETWEEN disponibilita.Inizio AND disponibilita.Fine";
				       	$result = @mysqli_query($con, $sql) or die("Errore query conteggio disponibilità");
				       	$row = mysqli_fetch_array($result);
				       	echo "<tr>". "<th>Vigili con patente " . $grado."</th>" . "<td>" . $row[0] . "</td></tr>";
				       	@mysqli_free_result($result);
	}

	function query_tipoIntervento($con, $distaccamento)
	{
		$sql = "SELECT distaccamenti.Intervento FROM distaccamenti WHERE Citta = '$distaccamento'";
		$result = @mysqli_query($con, $sql) or die("Errore query tipo intervento");
		$row = mysqli_fetch_array($result);
		if($row[0] == 1)
			echo "<tr><th>Tipo intervento</th><td>Tutti i casi</td>";
		else if($row[0] == 2)
			echo "<tr><th>Tipo intervento</th><td>Solo emergenze</td>";
		else
			echo "<tr><th>Tipo intervento</th><td>Nessuno</td>";
		@mysqli_free_result($result);
	}

	function query_vigiliDisponibili($con, $distaccamento)
	{
		 $sql = "SELECT vigili.IDVigile, vigili.Cognome, vigili.Nome, vigili.Ruolo, vigili.Patente, vigili.Stato FROM vigili, distaccamenti, utenti, 
                        disponibilita 
                        WHERE distaccamenti.IDDistaccamento = vigili.IDDistaccamento AND vigili.IDVigile = utenti.IDVigile 
                        AND utenti.IDUtente = disponibilita.IDUtente AND distaccamenti.Citta = '$distaccamento'  
                        AND DATE_FORMAT(NOW(), '%Y, %c, %d') = DATE_FORMAT(disponibilita.Inserimento, '%Y, %c, %d')                                
                        AND TIME_FORMAT(NOW(), '%T') 
                        BETWEEN disponibilita.Inizio AND disponibilita.Fine
                        GROUP BY vigili.IDVigile
                        ORDER BY vigili.Stato DESC, vigili.IDVigile";
                $result = @mysqli_query($con, $sql) or die("Errore query su tabella distaccamenti");
                while($row=mysqli_fetch_array($result))
                {
                	if($row['Stato'] == 2)
                   		echo "<tr>"."<td class='sede'>".$row['IDVigile']."</td>"."<td>".$row['Cognome']."</td>"."<td>".$row['Nome']."</td>"."<td>".$row['Ruolo']."</td>"."<td>".$row['Patente']."</td>"."</tr>";
                   	else if($row['Stato'] == 1)
                   		echo "<tr>"."<td class='reperibili'>".$row['IDVigile']."</td>"."<td>".$row['Cognome']."</td>"."<td>".$row['Nome']."</td>"."<td>".$row['Ruolo']."</td>"."<td>".$row['Patente']."</td>"."</tr>";
                   	else
                   		echo "<tr>"."<td>".$row['IDVigile']."</td>"."<td>".$row['Cognome']."</td>"."<td>".$row['Nome']."</td>"."<td>".$row['Ruolo']."</td>"."<td>".$row['Patente']."</td>"."</tr>";
                  
                }       
                @mysqli_free_result($result);
	}

?>