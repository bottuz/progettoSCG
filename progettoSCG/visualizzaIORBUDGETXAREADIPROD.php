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
        $sql="SELECT ior.NrAreaDiProduzione,ior.NrArticolo, ior.descrizione, sum(ior.QuantitaDiOutput), sum(ior.TempoRisorsa*corb.CostoOrario) FROM `ImpiegoOrarioRisorse` as ior JOIN `CostoOrarioRisorseBudget` as corb ON (ior.Risorsa = corb.Risorsa AND ior.NrAreaDiProduzione = corb.AreaDiProduzione) WHERE ior.budgetConsuntivo = 'BUDGET' GROUP BY ior.NrAreaDiProduzione,ior.NrArticolo";

        $result = $conn->query($sql);

        #$bc ="CONSUNTIVO";
        #$sql3="SELECT NrArticolo, BudgetConsuntivo, sum(ior.QuantitaDiOutput), sum(ior.TempoRisorsa*corb.CostoOrario) FROM ImpiegoOrarioRisorse as ior JOIN CostoOrarioRisorseConsuntivo as corb ON (ior.Risorsa = corb.Risorsa AND ior.NrAreaDiProduzione = corb.AreaDiProduzione AND ior.BudgetConsuntivo = '$bc') GROUP BY ior.BudgetConsuntivo, ior.NrArticolo";

        #$sql4="SELECT sum(ior.QuantitaDiOutput), sum(ior.TempoRisorsa*corb.CostoOrario) FROM ImpiegoOrarioRisorse as ior JOIN CostoOrarioRisorseConsuntivo as corb ON (ior.Risorsa = corb.Risorsa AND ior.NrAreaDiProduzione = corb.AreaDiProduzione AND ior.BudgetConsuntivo = '$bc')";
        #$result3 = $conn->query($sql3);
        #$result4 = $conn->query($sql4);

        if ($result->num_rows > 0) { // 9 cicli
              echo "<h2>PRODUZIONE PER NR AREA DI PRODUZIONE</h2></br>

              <table class='table'>
              <thead class='thead-dark'>
                  <tr>
                  <th scope='col'>NrArticolo</th>
                  <th scope='col'>QUANTITA OUTPUT</th>
                  <th scope='col'>COSTO</th>
                  </tr>
              </thead>
              <tbody id='clienti'>";
                  while($dati = $result->fetch_assoc()) {
                    echo '<tr>
                    <td class="cCentrato"> '. $dati2["ior.NrArticolo"].'</td>
                    <td class="cCentrato"> '. $dati["sum(ior.QuantitaDiOutput)"].'</td>
                    <td class="cCentrato"> '. $dati["sum(ior.TempoRisorsa*corb.CostoOrario)"].'</td>
                    </tr>';
                  }
                  echo " </tbody>
              </table>";
          } else {
              echo "Errore!!";
          }

      $conn->close();

include_once("conclusione.php");
  ?>
