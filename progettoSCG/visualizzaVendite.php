<?php
include_once("intestazione.php");
include_once("connessione.php");
      // Check connection
      if ($conn->connect_error)
      {
          die("Connection failed: " . $conn->connect_error);
      }

      if(isset($_GET['bc'])){
        $stato = "TUTTI GLI STATI";
        $bc = $_GET['bc'];
        $sql = "SELECT v.NrArticolo, v.BudgetConsuntivo, sum(v.quantita), sum(v.TotaleVendita), t.TassoDiCambioMedio
        	FROM vendite as v
        	JOIN Clienti as c ON (v.NrOrigine = c.Nr)
            JOIN tassidicambio as t ON (c.valuta = t.CodiceValuta)
          WHERE v.BudgetConsuntivo = '$bc' AND v.BudgetConsuntivo=t.Anno
          GROUP BY v.NrArticolo,v.BudgetConsuntivo";
      }
      else
      {
        $classe="*";
        $bc ="BUDGET/CONSUNTIVO";
        $stato = "TUTTI GLI STATI";
        $sql = "SELECT v.NrArticolo, v.BudgetConsuntivo, sum(v.quantita), sum(v.TotaleVendita), t.TassoDiCambioMedio
        	FROM vendite as v
        	JOIN Clienti as c ON (v.NrOrigine = c.Nr)
            JOIN tassidicambio as t ON (c.valuta = t.CodiceValuta)
          WHERE v.BudgetConsuntivo=t.Anno
          GROUP BY v.NrArticolo,v.BudgetConsuntivo";
      }


      $sql2 = "SELECT sum(v.TotaleVendita / t.TassoDiCambioMedio)
        FROM vendite as v
        JOIN Clienti as c ON (v.NrOrigine = c.Nr)
          JOIN tassidicambio as t ON (c.valuta = t.CodiceValuta)
        WHERE v.BudgetConsuntivo=t.Anno";

      $result = $conn->query($sql);
      $result2 = $conn->query($sql2);
      $conn->close();

if ($result->num_rows > 0) {
      echo "<h2>VENDITE IN " .$stato. " A ".$bc."</h2></br>
      <a href='visualizzaVenditeBUDGET.php'>BUDGET</a>
      <a href='visualizzaVenditeCONSUNTIVO.php'>CONSUNTIVO</a></br></br>
      <table class='table'>
          <thead class='thead-dark'>
              <tr>
              <th scope='col'>NrArticolo</th>
              <th scope='col'>quantità</th>
              <th scope='col'>Prezzo Totale Valuta Locale</th>
              <th scope='col'>Budget/Consuntivo</th>
              <th scope='col'>Tasso di Cambio</th>
              <th scope='col'>PREZZO FINALE</th>
              </tr>
          </thead>
          <tbody id='clienti'>";
          while($dati = $result->fetch_assoc()) {
              echo '<tr>
              <td class="cCentrato"> '. $dati['NrArticolo'].'</td>
              <td class="cCentrato"> '. $dati['sum(v.quantita)'].'</td>
              <td class="cCentrato"> '. round($dati['sum(v.TotaleVendita)'],2).'</td>
              <td class="cCentrato"> '. strtoupper($dati['BudgetConsuntivo']).'</td>
              <td class="cCentrato"> '. $dati['TassoDiCambioMedio'].'</td>
              <td class="cCentrato"  style="background-color:red;"> '. round($dati['sum(v.TotaleVendita)']/$dati['TassoDiCambioMedio'],2).'</td>
              </tr>';
          }
          echo " </tbody>
      </table>";
  } else {
      echo "Errore!!";
  }
include_once("conclusione.php");
  ?>
