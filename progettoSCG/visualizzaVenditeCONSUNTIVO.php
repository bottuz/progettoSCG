<?php
include_once("intestazione.php");
include_once("connessione.php");
      // Check connection
      if ($conn->connect_error)
      {
          die("Connection failed: " . $conn->connect_error);
      }

      if(isset($_GET['stato'])){
        $stato = $_GET['stato'];
        $citta = $_GET['citta'];
        $bc = "CONSUNTIVO";
        $sql = "SELECT v.NrArticolo, v.BudgetConsuntivo, sum(v.quantita), sum(v.TotaleVendita), t.TassoDiCambioMedio
        	FROM vendite as v
        	JOIN Clienti as c ON (v.NrOrigine = c.Nr)
            JOIN tassidicambio as t ON (c.valuta = t.CodiceValuta AND c.valuta = '$stato')
          WHERE v.BudgetConsuntivo = '$bc' AND v.BudgetConsuntivo=t.Anno
          GROUP BY v.NrArticolo,v.BudgetConsuntivo";

          $sql2 = "SELECT sum(TotaleVendita/TassoDiCambioMedio)
            FROM vendite as v
            JOIN Clienti as c ON (v.NrOrigine = c.Nr)
              JOIN tassidicambio as t ON (c.valuta = t.CodiceValuta AND c.valuta = '$stato')
            WHERE v.BudgetConsuntivo = '$bc' AND v.BudgetConsuntivo=t.Anno
            ORDER BY v.NrArticolo,v.BudgetConsuntivo";

      }
      else
      {
        $classe="*";
        $bc = "CONSUNTIVO";
        $citta = "TUTTI GLI STATI";
        $sql = "SELECT v.NrArticolo, v.BudgetConsuntivo, sum(v.quantita), sum(v.TotaleVendita), t.TassoDiCambioMedio
        	FROM vendite as v
        	JOIN Clienti as c ON (v.NrOrigine = c.Nr)
            JOIN tassidicambio as t ON (c.valuta = t.CodiceValuta)
          WHERE v.BudgetConsuntivo = '$bc' AND v.BudgetConsuntivo=t.Anno
          GROUP BY v.NrArticolo,v.BudgetConsuntivo";

          $sql2 = "SELECT sum(TotaleVendita/TassoDiCambioMedio)
            FROM vendite as v
            JOIN Clienti as c ON (v.NrOrigine = c.Nr)
              JOIN tassidicambio as t ON (c.valuta = t.CodiceValuta)
            WHERE v.BudgetConsuntivo = '$bc' AND v.BudgetConsuntivo=t.Anno
            ORDER BY v.NrArticolo,v.BudgetConsuntivo";
      }
      $result = $conn->query($sql);
      $result2 = $conn->query($sql2);

      $conn->close();

if ($result->num_rows > 0) {
      echo "<h2>VENDITE IN " .$citta. "</h2></br>
      <h2>" .$bc. "</h2></br>
      <a href='visualizzaVenditeCONSUNTIVO.php?stato=1&citta=ITALIA'>ITALIA</a>
      <a href='visualizzaVenditeCONSUNTIVO.php?stato=2&citta=AMERICA'>AMERICA</a>
      <a href='visualizzaVenditeCONSUNTIVO.php?stato=3&citta=GIAPPONE'>GIAPPONE</a></br></br>
      <h3>TOTALE:\t";
      $dati2 = $result2 -> fetch_assoc();
      echo round($dati2['sum(TotaleVendita/TassoDiCambioMedio)'],2);
      echo"
       EURO</h3>
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
