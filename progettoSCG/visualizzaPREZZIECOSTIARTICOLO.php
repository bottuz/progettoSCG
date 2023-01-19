<?php
include_once("intestazione.php");
include_once("connessione.php");
      // Check connection
      if ($conn->connect_error)
      {
          die("Connection failed: " . $conn->connect_error);
      }

        $classe="*";
        $bc ="BUDGET";
        $stato = "DI TUTTI GLI ARTICOLI";
        //RICAVI BUDGET VENDITE
        $sql = "SELECT v.NrArticolo, sum(v.TotaleVendita)/t.TassoDiCambioMedio/sum(v.quantita)
        	FROM vendite as v
        	JOIN Clienti as c ON (v.NrOrigine = c.Nr)
            JOIN tassidicambio as t ON (c.valuta = t.CodiceValuta)
          WHERE v.BudgetConsuntivo=t.Anno AND v.BudgetConsuntivo = '$bc'
          GROUP BY v.NrArticolo,v.BudgetConsuntivo";
        //COSTI BUDGET MP
        $sql3 = "SELECT NrArticolo, count(NrArticolo), sum(ImportoCostoTotale), sum(ImportoCostoTotale)/count(NrArticolo) FROM `consumi` WHERE BudgetConsuntivo='$bc'
        GROUP BY NrArticolo, BudgetConsuntivo";
        //COSTI BUDGET LD
        $sql5="SELECT NrArticolo, sum(ior.QuantitaDiOutput), sum(ior.TempoRisorsa*corb.CostoOrario) FROM ImpiegoOrarioRisorse as ior JOIN CostoOrarioRisorseBudget as corb ON (ior.Risorsa = corb.Risorsa AND ior.NrAreaDiProduzione = corb.AreaDiProduzione AND ior.BudgetConsuntivo = '$bc') GROUP BY ior.BudgetConsuntivo, ior.NrArticolo";


        $bc="CONSUNTIVO";
        //RICAVI CONSUNTIVO VENDITE
        $sql2 = "SELECT v.NrArticolo, sum(v.TotaleVendita)/t.TassoDiCambioMedio/sum(v.quantita)
          FROM vendite as v
          JOIN Clienti as c ON (v.NrOrigine = c.Nr)
            JOIN tassidicambio as t ON (c.valuta = t.CodiceValuta)
          WHERE v.BudgetConsuntivo=t.Anno AND v.BudgetConsuntivo = '$bc'
          GROUP BY v.NrArticolo,v.BudgetConsuntivo";
        //COSTI CONSUNTIVO MP
        $sql4 = "SELECT NrArticolo, count(NrArticolo), sum(ImportoCostoTotale), sum(ImportoCostoTotale)/count(NrArticolo) FROM `consumi` WHERE BudgetConsuntivo='$bc'
        GROUP BY NrArticolo, BudgetConsuntivo";
        //COSTI CONSUNTIVO LD
        $sql6="SELECT NrArticolo, sum(ior.QuantitaDiOutput), sum(ior.TempoRisorsa*corb.CostoOrario) FROM ImpiegoOrarioRisorse as ior JOIN CostoOrarioRisorseBudget as corb ON (ior.Risorsa = corb.Risorsa AND ior.NrAreaDiProduzione = corb.AreaDiProduzione AND ior.BudgetConsuntivo = '$bc') GROUP BY ior.BudgetConsuntivo, ior.NrArticolo";


      $result = $conn->query($sql);
      $result2 = $conn->query($sql2);
      $result3 = $conn->query($sql3);
      $result4 = $conn->query($sql4);
      $result5 = $conn->query($sql5);
      $result6 = $conn->query($sql6);

      $conn->close();



if ($result->num_rows > 0) {
      echo "<h2>SCOSTAMENTO PREZZI-COSTI " .$stato. "</h2></br>
      <table class='table'>
          <thead class='thead-dark'>
              <tr>
              <th scope='col'>NrArticolo</th>
              <th scope='col'>Ru BUDGET</th>
              <th scope='col'>Ru CONSUNTIVO</th>
              <th scope='col'>Cu BUDGET MP</th>
              <th scope='col'>Cu CONSUNTIVO MP</th>
              <th scope='col'>Cu BUDGET LD</th>
              <th scope='col'>Cu CONSUNTIVO LD</th>
              <th scope='col'>MARGINE BUDGET</th>
              <th scope='col'>MARGINE CONSUNTIVO</th>
              </tr>
          </thead>
          <tbody id='clienti'>";
          while($dati = $result->fetch_assoc()) {
            $dati2 = $result2->fetch_assoc();
            $dati3 = $result3->fetch_assoc();
            $dati4 = $result4->fetch_assoc();
            $dati5 = $result5->fetch_assoc();
            $dati6 = $result6->fetch_assoc();


              echo '<tr>
              <td class="cCentrato"> '. $dati['NrArticolo'].'</td>
              <td class="cCentrato" style="background-color:cyan;"> '. round($dati['sum(v.TotaleVendita)/t.TassoDiCambioMedio/sum(v.quantita)'],2).'</td>
              <td class="cCentrato" style="background-color:yellow;"> '. round($dati2['sum(v.TotaleVendita)/t.TassoDiCambioMedio/sum(v.quantita)'],2).'</td>
              <td class="cCentrato" style="background-color:cyan;"> '. round($dati3['sum(ImportoCostoTotale)/count(NrArticolo)'],2).'</td>
              <td class="cCentrato" style="background-color:yellow;"> '. round($dati4['sum(ImportoCostoTotale)/count(NrArticolo)'],2).'</td>
              <td class="cCentrato" style="background-color:cyan;"> '. round($dati5['sum(ior.TempoRisorsa*corb.CostoOrario)']/$dati5['sum(ior.QuantitaDiOutput)'],2).'</td>
              <td class="cCentrato" style="background-color:yellow;"> '. round($dati6['sum(ior.TempoRisorsa*corb.CostoOrario)']/$dati6['sum(ior.QuantitaDiOutput)'],2).'</td>
              <td class="cCentrato" style="background-color:cyan;"> '. round($dati['sum(v.TotaleVendita)/t.TassoDiCambioMedio/sum(v.quantita)'] - $dati3['sum(ImportoCostoTotale)/count(NrArticolo)'] - $dati5['sum(ior.TempoRisorsa*corb.CostoOrario)']/$dati5['sum(ior.QuantitaDiOutput)'] ,2).'</td>
              <td class="cCentrato" style="background-color:yellow;"> '. round($dati2['sum(v.TotaleVendita)/t.TassoDiCambioMedio/sum(v.quantita)'] - $dati4['sum(ImportoCostoTotale)/count(NrArticolo)'] - $dati6['sum(ior.TempoRisorsa*corb.CostoOrario)']/$dati6['sum(ior.QuantitaDiOutput)'] ,2).'</td>
              </tr>';
          }
          echo " </tbody>
      </table>";
  } else {
      echo "Errore!!";
  }
include_once("conclusione.php");
  ?>
