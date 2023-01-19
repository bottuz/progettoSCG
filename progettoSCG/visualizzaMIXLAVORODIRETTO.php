<?php
include_once("intestazione.php");
include_once("connessione.php");
      // Check connection
      if ($conn->connect_error)
      {
          die("Connection failed: " . $conn->connect_error);
      }

      if(isset($_GET['tipo'])){
        $tipo = $_GET['tipo'];
        if($tipo=="STANDARD"){
          $sql="SELECT NrArticolo, BudgetConsuntivo, sum(ior.QuantitaDiOutput), sum(ior.TempoRisorsa*corb.CostoOrario) FROM ImpiegoOrarioRisorse as ior JOIN CostoOrarioRisorseBudget as corb ON (ior.Risorsa = corb.Risorsa AND ior.NrAreaDiProduzione = corb.AreaDiProduzione AND ior.BudgetConsuntivo = 'BUDGET') GROUP BY ior.budgetConsuntivo,ior.NrArticolo";

          $sql2 = "SELECT sum(ior.QuantitaDiOutput), sum(ior.TempoRisorsa*corb.CostoOrario) FROM ImpiegoOrarioRisorse as ior JOIN CostoOrarioRisorseBudget as corb ON (ior.Risorsa = corb.Risorsa AND ior.NrAreaDiProduzione = corb.AreaDiProduzione AND ior.BudgetConsuntivo = 'BUDGET')";
          $result = $conn->query($sql);
          $result2 = $conn->query($sql2);

          $sql3="SELECT NrArticolo, BudgetConsuntivo, sum(ior.QuantitaDiOutput), sum(ior.TempoRisorsa*corb.CostoOrario) FROM ImpiegoOrarioRisorse as ior JOIN CostoOrarioRisorseConsuntivo as corb ON (ior.Risorsa = corb.Risorsa AND ior.NrAreaDiProduzione = corb.AreaDiProduzione AND ior.BudgetConsuntivo = 'CONSUNTIVO') GROUP BY ior.budgetConsuntivo,ior.NrArticolo";

          $sql4="SELECT sum(ior.QuantitaDiOutput), sum(ior.TempoRisorsa*corb.CostoOrario) FROM ImpiegoOrarioRisorse as ior JOIN CostoOrarioRisorseConsuntivo as corb ON (ior.Risorsa = corb.Risorsa AND ior.NrAreaDiProduzione = corb.AreaDiProduzione AND ior.BudgetConsuntivo = 'CONSUNTIVO')";
          $result3 = $conn->query($sql3);
          $result4 = $conn->query($sql4);

          $bc = " BUDGET/CONSUNTIVO";
          if ($result->num_rows > 0) {
                echo "<h2>MIX LAVORO DIRETTO ".$tipo."</h2></br>
                <a href='visualizzaMIXLAVORODIRETTO.php?tipo=STANDARD'>STANDARD</a>
                <a href='visualizzaMIXLAVORODIRETTO.php?tipo=EFFETTIVO'>EFFETTIVO</a></br></br>
                <table class='table'>
                    <thead class='thead-dark'>
                        <tr>
                        <th scope='col'>NR ARTICOLO</th>
                        <th scope='col'> % </th>
                        <th scope='col'>QTA (PZ)</th>
                        <th scope='col'>COSTO</th>
                        </tr>
                    </thead>
                    <tbody id='clienti'>";
                    $dati2 = $result2->fetch_assoc();
                    $dati4 = $result4->fetch_assoc();
                    while($dati = $result->fetch_assoc()) {
                        echo '<tr>
                        <td class="cCentrato"> '. $dati['NrArticolo'].'</td>
                        <td class="cCentrato"> '. round($dati["sum(ior.QuantitaDiOutput)"]/$dati2["sum(ior.QuantitaDiOutput)"]*100,4).'%</td>
                        <td class="cCentrato" style="background-color:red;"> '. round($dati["sum(ior.QuantitaDiOutput)"]/$dati2["sum(ior.QuantitaDiOutput)"]*$dati4["sum(ior.QuantitaDiOutput)"],0).'</td>
                        <td class="cCentrato" style="background-color:red;"> '. round($dati["sum(ior.QuantitaDiOutput)"]/$dati2["sum(ior.QuantitaDiOutput)"]*$dati4["sum(ior.QuantitaDiOutput)"]*$dati["sum(ior.TempoRisorsa*corb.CostoOrario)"],2).'€</td>
                        </tr>';
                    }
                    echo " </tbody>
                </table>";
            } else {
                echo "Errore!!";
            }

        }else {
          $sql="SELECT NrArticolo, BudgetConsuntivo, sum(ior.QuantitaDiOutput), sum(ior.TempoRisorsa*corb.CostoOrario) FROM ImpiegoOrarioRisorse as ior JOIN CostoOrarioRisorseBudget as corb ON (ior.Risorsa = corb.Risorsa AND ior.NrAreaDiProduzione = corb.AreaDiProduzione AND ior.BudgetConsuntivo = 'BUDGET') GROUP BY ior.budgetConsuntivo,ior.NrArticolo";

          $sql2 = "SELECT sum(ior.QuantitaDiOutput), sum(ior.TempoRisorsa*corb.CostoOrario) FROM ImpiegoOrarioRisorse as ior JOIN CostoOrarioRisorseBudget as corb ON (ior.Risorsa = corb.Risorsa AND ior.NrAreaDiProduzione = corb.AreaDiProduzione AND ior.BudgetConsuntivo = 'BUDGET')";
          $result = $conn->query($sql);
          $result2 = $conn->query($sql2);

          $sql3="SELECT NrArticolo, BudgetConsuntivo, sum(ior.QuantitaDiOutput), sum(ior.TempoRisorsa*corb.CostoOrario) FROM ImpiegoOrarioRisorse as ior JOIN CostoOrarioRisorseConsuntivo as corb ON (ior.Risorsa = corb.Risorsa AND ior.NrAreaDiProduzione = corb.AreaDiProduzione AND ior.BudgetConsuntivo = 'CONSUNTIVO') GROUP BY ior.budgetConsuntivo,ior.NrArticolo";

          $sql4="SELECT sum(ior.QuantitaDiOutput), sum(ior.TempoRisorsa*corb.CostoOrario) FROM ImpiegoOrarioRisorse as ior JOIN CostoOrarioRisorseConsuntivo as corb ON (ior.Risorsa = corb.Risorsa AND ior.NrAreaDiProduzione = corb.AreaDiProduzione AND ior.BudgetConsuntivo = 'CONSUNTIVO')";
          $result3 = $conn->query($sql3);
          $result4 = $conn->query($sql4);

          $bc = " BUDGET/CONSUNTIVO";
          if ($result->num_rows > 0) {
            echo "<h2>MIX LAVORO DIRETTO ".$tipo."</h2></br>
                <a href='visualizzaMIXLAVORODIRETTO.php?tipo=STANDARD'>STANDARD</a>
                <a href='visualizzaMIXLAVORODIRETTO.php?tipo=EFFETTIVO'>EFFETTIVO</a></br></br>
                <table class='table'>
                    <thead class='thead-dark'>
                        <tr>
                        <th scope='col'>NR ARTICOLO</th>
                        <th scope='col'> % </th>
                        <th scope='col'>QTA (PZ)</th>
                        <th scope='col'>COSTO</th>
                        </tr>
                    </thead>
                    <tbody id='clienti'>";
                    $dati2 = $result2->fetch_assoc();
                    $dati4 = $result4->fetch_assoc();
                    while($dati3 = $result3->fetch_assoc()) {
                        echo '<tr>
                        <td class="cCentrato"> '. $dati3['NrArticolo'].'</td>
                        <td class="cCentrato"> '. round($dati3["sum(ior.QuantitaDiOutput)"]/$dati4["sum(ior.QuantitaDiOutput)"]*100,4).'%</td>
                        <td class="cCentrato" style="background-color:red;"> '. round($dati3["sum(ior.QuantitaDiOutput)"]/$dati4["sum(ior.QuantitaDiOutput)"]*$dati2["sum(ior.QuantitaDiOutput)"],0).'</td>
                        <td class="cCentrato" style="background-color:red;"> '. round($dati3["sum(ior.QuantitaDiOutput)"]/$dati4["sum(ior.QuantitaDiOutput)"]*$dati2["sum(ior.QuantitaDiOutput)"]*$dati3["sum(ior.TempoRisorsa*corb.CostoOrario)"],2).'€</td>
                        </tr>';
                    }
                    echo " </tbody>
                </table>";
            } else {
                echo "Errore!!";
            }

        }


      $conn->close();
      }
      else
      {
        $classe="*";
        $sql="SELECT NrArticolo, BudgetConsuntivo, sum(ior.QuantitaDiOutput), sum(ior.TempoRisorsa*corb.CostoOrario) FROM ImpiegoOrarioRisorse as ior JOIN CostoOrarioRisorseBudget as corb ON (ior.Risorsa = corb.Risorsa AND ior.NrAreaDiProduzione = corb.AreaDiProduzione AND ior.BudgetConsuntivo = 'BUDGET') GROUP BY ior.budgetConsuntivo,ior.NrArticolo";

        $sql2 = "SELECT sum(ior.QuantitaDiOutput), sum(ior.TempoRisorsa*corb.CostoOrario) FROM ImpiegoOrarioRisorse as ior JOIN CostoOrarioRisorseBudget as corb ON (ior.Risorsa = corb.Risorsa AND ior.NrAreaDiProduzione = corb.AreaDiProduzione AND ior.BudgetConsuntivo = 'BUDGET')";
        $result = $conn->query($sql);
        $result2 = $conn->query($sql2);

        $sql3="SELECT NrArticolo, BudgetConsuntivo, sum(ior.QuantitaDiOutput), sum(ior.TempoRisorsa*corb.CostoOrario) FROM ImpiegoOrarioRisorse as ior JOIN CostoOrarioRisorseConsuntivo as corb ON (ior.Risorsa = corb.Risorsa AND ior.NrAreaDiProduzione = corb.AreaDiProduzione AND ior.BudgetConsuntivo = 'CONSUNTIVO') GROUP BY ior.budgetConsuntivo,ior.NrArticolo";

        $sql4="SELECT sum(ior.QuantitaDiOutput), sum(ior.TempoRisorsa*corb.CostoOrario) FROM ImpiegoOrarioRisorse as ior JOIN CostoOrarioRisorseConsuntivo as corb ON (ior.Risorsa = corb.Risorsa AND ior.NrAreaDiProduzione = corb.AreaDiProduzione AND ior.BudgetConsuntivo = 'CONSUNTIVO')";
        $result3 = $conn->query($sql3);
        $result4 = $conn->query($sql4);

        $tipo = " STANDARD/EFFETTIVO";
        if ($result->num_rows > 0) {
          echo "<h2>MIX LAVORO DIRETTO ".$tipo."</h2></br>
              <a href='visualizzaMIXLAVORODIRETTO.php?tipo=STANDARD'>STANDARD</a>
              <a href='visualizzaMIXLAVORODIRETTO.php?tipo=EFFETTIVO'>EFFETTIVO</a></br></br>
              <table class='table'>
                  <thead class='thead-dark'>
                      <tr>
                      <th scope='col'>NR ARTICOLO</th>
                      <th scope='col'> % </th>
                      <th scope='col'>QUANTITA (PZ)</th>
                      <th scope='col'>COSTO</th>
                      </tr>
                  </thead>
                  <tbody id='clienti'>";
                  $dati2 = $result2->fetch_assoc();
                  $dati4 = $result4->fetch_assoc();
                  while($dati = $result->fetch_assoc()) {
                      echo '<tr>
                      <td class="cCentrato"> '. $dati['NrArticolo'].'</td>
                      <td class="cCentrato"> '. round($dati["sum(ior.QuantitaDiOutput)"]/$dati2["sum(ior.QuantitaDiOutput)"]*100,4).'%</td>
                      <td class="cCentrato" style="background-color:red;"> '. round($dati["sum(ior.QuantitaDiOutput)"]/$dati2["sum(ior.QuantitaDiOutput)"]*$dati4["sum(ior.QuantitaDiOutput)"],0).'</td>
                      <td class="cCentrato" style="background-color:red;"> '. round($dati["sum(ior.QuantitaDiOutput)"]/$dati2["sum(ior.QuantitaDiOutput)"]*$dati4["sum(ior.QuantitaDiOutput)"]*$dati["sum(ior.TempoRisorsa*corb.CostoOrario)"],2).'€</td>
                      </tr>';
                  }
                  while($dati3 = $result3->fetch_assoc()) {
                      echo '<tr>
                      <td class="cCentrato"> '. $dati3['NrArticolo'].'</td>
                      <td class="cCentrato"> '. round($dati3["sum(ior.QuantitaDiOutput)"]/$dati4["sum(ior.QuantitaDiOutput)"]*100,4).'%</td>
                      <td class="cCentrato" style="background-color:red;"> '. round($dati3["sum(ior.QuantitaDiOutput)"]/$dati4["sum(ior.QuantitaDiOutput)"]*$dati2["sum(ior.QuantitaDiOutput)"],0).'</td>
                      <td class="cCentrato" style="background-color:red;"> '. round($dati3["sum(ior.QuantitaDiOutput)"]/$dati4["sum(ior.QuantitaDiOutput)"]*$dati2["sum(ior.QuantitaDiOutput)"]*$dati3["sum(ior.TempoRisorsa*corb.CostoOrario)"],2).'€</td>
                      </tr>';
                  }
                  echo " </tbody>
              </table>";
          } else {
              echo "Errore!!";
          }

      }

      $conn->close();

include_once("conclusione.php");
  ?>
