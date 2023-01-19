<?php
include_once("intestazione.php");
include_once("connessione.php");
      // Check connection
      if ($conn->connect_error)
      {
          die("Connection failed: " . $conn->connect_error);
      }

      if(isset($_GET['bc'])){
        $bc = $_GET['bc'];
        if($bc=="BUDGET"){
          $sql = "SELECT ior.NrOrdineDiProduzione, sum(ior.QuantitaDiOutput),ior.NrArticolo,sum(ior.TempoRisorsa),sum(corb.CostoOrario), sum(ior.TempoRisorsa*corb.CostoOrario)
          FROM ImpiegoOrarioRisorse as ior
          JOIN CostoOrarioRisorseBudget as corb ON (ior.Risorsa = corb.Risorsa AND ior.NrAreaDiProduzione = corb.AreaDiProduzione AND ior.BudgetConsuntivo = '$bc')
          GROUP BY ior.NrOrdineDiProduzione, ior.NrArticolo";

          $sql2 = "SELECT sum(ior.TempoRisorsa*corb.CostoOrario), sum(ior.QuantitaDiOutput)
          FROM ImpiegoOrarioRisorse as ior
          JOIN CostoOrarioRisorseBudget as corb ON (ior.Risorsa = corb.Risorsa AND ior.NrAreaDiProduzione = corb.AreaDiProduzione AND ior.BudgetConsuntivo = '$bc')";
        }else {
          $sql = "SELECT ior.NrOrdineDiProduzione, sum(ior.QuantitaDiOutput),ior.NrArticolo,sum(ior.TempoRisorsa),sum(corb.CostoOrario), sum(ior.TempoRisorsa*corb.CostoOrario)
          FROM ImpiegoOrarioRisorse as ior
          JOIN CostoOrarioRisorseConsuntivo as corb ON (ior.Risorsa = corb.Risorsa AND ior.NrAreaDiProduzione = corb.AreaDiProduzione AND ior.BudgetConsuntivo = '$bc')
          GROUP BY ior.NrOrdineDiProduzione,ior.BudgetConsuntivo, ior.NrArticolo";

          $sql2 = "SELECT sum(ior.TempoRisorsa*corb.CostoOrario), sum(ior.QuantitaDiOutput)
          FROM ImpiegoOrarioRisorse as ior
          JOIN CostoOrarioRisorseConsuntivo as corb ON (ior.Risorsa = corb.Risorsa AND ior.NrAreaDiProduzione = corb.AreaDiProduzione AND ior.BudgetConsuntivo = '$bc')";
        }

        $result = $conn->query($sql);
        $result2 = $conn->query($sql2);

        if ($result->num_rows > 0) {
          echo "<h2>Costo Orario per Risorsa ".$bc."</h2></br>
          <a href='visualizzaTotaleImpiego.php?bc=BUDGET'>BUDGET</a>
          <a href='visualizzaTotaleImpiego.php?bc=CONSUNTIVO'>CONSUNTIVO</a></br></br>
          <h3>TOTALE:\t";
          $dati2 = $result2 -> fetch_assoc();
          echo round($dati2['sum(ior.TempoRisorsa*corb.CostoOrario)'],2);
          echo"
           EURO</h3>
           <h3>QUANTITA:\t"; echo round($dati2['sum(ior.QuantitaDiOutput)'],2);
           echo"
          </h3>
           <table class='table'>
                  <thead class='thead-dark'>
                      <tr>
                      <th scope='col'>NrOrdineDiProduzione</th>
                      <th scope='col'>NrArticolo</th>
                      <th scope='col'>Quantita Output</th>
                      <th scope='col'>Prezzo</th>
                      </tr>
                  </thead>
                  <tbody id='clienti'>";
                  while($dati = $result->fetch_assoc()) {
                      echo '<tr>
                      <td class="cCentrato"> '. $dati['NrOrdineDiProduzione'].'</td>
                      <td class="cCentrato"> '. $dati['NrArticolo'].'</td>
                      <td class="cCentrato"> '. $dati['sum(ior.QuantitaDiOutput)'].'</td>
                      <td class="cCentrato" style="background-color:red;"> '. round($dati['sum(ior.TempoRisorsa*corb.CostoOrario)'],2).'</td>
                      </tr>';
                  }
                  echo " </tbody>
              </table>";
              $conn->close();
      }else {
          echo "Errore!!";
      }
    }//END IF GET
    else {
        $bc = "BUDGET/CONSUNTIVO";
        //BUDGET
        $sql = "SELECT ior.NrOrdineDiProduzione,ior.BudgetConsuntivo, sum(ior.QuantitaDiOutput),ior.NrArticolo, sum(ior.TempoRisorsa*corb.CostoOrario), sum(ior.QuantitaDiOutput)
      	FROM ImpiegoOrarioRisorse as ior
      	JOIN CostoOrarioRisorseBudget as corb ON (ior.Risorsa = corb.Risorsa AND ior.NrAreaDiProduzione = corb.AreaDiProduzione AND ior.BudgetConsuntivo = 'BUDGET')
        GROUP BY ior.NrOrdineDiProduzione,ior.BudgetConsuntivo, ior.NrArticolo";

        //CONSUNTIVO
        $sql2 = "SELECT ior.NrOrdineDiProduzione,ior.BudgetConsuntivo, sum(ior.QuantitaDiOutput),ior.NrArticolo, sum(ior.TempoRisorsa*corb.CostoOrario), sum(ior.QuantitaDiOutput)
      	FROM ImpiegoOrarioRisorse as ior
      	JOIN CostoOrarioRisorseConsuntivo as corb ON (ior.Risorsa = corb.Risorsa AND ior.NrAreaDiProduzione = corb.AreaDiProduzione AND ior.BudgetConsuntivo = 'CONSUNTIVO')
        GROUP BY ior.NrOrdineDiProduzione,ior.BudgetConsuntivo, ior.NrArticolo";

        $result = $conn->query($sql);
        $result2 = $conn->query($sql2);

        if ($result->num_rows > 0) {
              echo "<h2>Costo Orario per Risorsa ".$bc."</h2></br>
              <a href='visualizzaTotaleImpiego.php?bc=BUDGET'>BUDGET</a>
              <a href='visualizzaTotaleImpiego.php?bc=CONSUNTIVO'>CONSUNTIVO</a></br></br>
              <table class='table'>
                  <thead class='thead-dark'>
                      <tr>
                      <th scope='col'>BUDGET/CONSUNTIVO</th>
                      <th scope='col'>NrOrdineDiProduzione</th>
                      <th scope='col'>NrArticolo</th>
                      <th scope='col'>Quantita Output</th>
                      <th scope='col'>Prezzo</th>
                      </tr>
                  </thead>
                  <tbody id='clienti'>";
                  while($dati = $result->fetch_assoc()) {
                      echo '<tr>
                      <td class="cCentrato"> '. strtoupper($dati['BudgetConsuntivo']).'</td>
                      <td class="cCentrato"> '. $dati['NrOrdineDiProduzione'].'</td>
                      <td class="cCentrato"> '. $dati['NrArticolo'].'</td>
                      <td class="cCentrato"> '. $dati['sum(ior.QuantitaDiOutput)'].'</td>
                      <td class="cCentrato" style="background-color:red;"> '. round($dati['sum(ior.TempoRisorsa*corb.CostoOrario)'],2).'</td>
                      </tr>';
                  }
                  while($dati2 = $result2->fetch_assoc()) {
                      echo '<tr>
                      <td class="cCentrato"> '. strtoupper($dati2['BudgetConsuntivo']).'</td>
                      <td class="cCentrato"> '. $dati2['NrOrdineDiProduzione'].'</td>
                      <td class="cCentrato"> '. $dati2['NrArticolo'].'</td>
                      <td class="cCentrato"> '. $dati2['sum(ior.QuantitaDiOutput)'].'</td>
                      <td class="cCentrato" style="background-color:red;"> '. round($dati2['sum(ior.TempoRisorsa*corb.CostoOrario)'],2).'</td>
                      </tr>';
                  }
                  echo " </tbody>
              </table>";
          } else {
              echo "Errore!!";
          }
          $conn->close();
      }
include_once("conclusione.php");
?>
