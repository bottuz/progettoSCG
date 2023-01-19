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
          $sql="SELECT *,sum(ior.QuantitaDiOutput), sum(ior.TempoRisorsa*corb.CostoOrario)
          FROM ImpiegoOrarioRisorse as ior
          JOIN CostoOrarioRisorseBudget as corb
          ON (ior.Risorsa = corb.Risorsa AND ior.NrAreaDiProduzione = corb.AreaDiProduzione AND ior.BudgetConsuntivo = 'BUDGET')
          GROUP BY ior.NrArticolo;";
        }else {
          $sql="SELECT *,sum(ior.QuantitaDiOutput), sum(ior.TempoRisorsa*corb.CostoOrario)
          FROM ImpiegoOrarioRisorse as ior
          JOIN CostoOrarioRisorseConsuntivo as corb
          ON (ior.Risorsa = corb.Risorsa AND ior.NrAreaDiProduzione = corb.AreaDiProduzione AND ior.BudgetConsuntivo = 'CONSUNTIVO')
          GROUP BY ior.NrArticolo;";
        }
      }
      else
      {
        $bc ="BUDGET/CONSUNTIVO";
        $stato = "TUTTI GLI STATI";
        $sql="SELECT ior.NrArticolo,sum(ior.QuantitaDiOutput), sum(ior.TempoRisorsa*corb.CostoOrario)
                  FROM ImpiegoOrarioRisorse as ior
                  JOIN CostoOrarioRisorseBudget as corb
                  ON (ior.Risorsa = corb.Risorsa AND ior.NrAreaDiProduzione = corb.AreaDiProduzione AND ior.BudgetConsuntivo = 'BUDGTE')
                  GROUP BY ior.NrArticolo";
        $sql2="SELECT ior.NrArticolo,sum(ior.QuantitaDiOutput), sum(ior.TempoRisorsa*corb.CostoOrario)
                  FROM ImpiegoOrarioRisorse as ior
                  JOIN CostoOrarioRisorseConsuntivo as corb
                  ON (ior.Risorsa = corb.Risorsa AND ior.NrAreaDiProduzione = corb.AreaDiProduzione AND ior.BudgetConsuntivo = 'CONSUNTIVO')
                  GROUP BY ior.NrArticolo";
      }
      $result = $conn->query($sql);
      $conn->close();

      if ($result->num_rows > 0) {
            echo "<h2>IMPIEGO ORARIO RISORSE ".$bc."</h2></br></br>
            <a href='visualizzaImpiegoOrarioRisorse.php?bc=BUDGET'>BUDGET</a>
            <a href='visualizzaImpiegoOrarioRisorse.php?bc=CONSUNTIVO'>CONSUNTIVO</a></br></br>
            ";
            $dati3 = $result3->fetch_assoc();
            echo"
            <h2>TOTALE MP(QTA): ".$dati3['sum(QuantitaMPImpiegata)']."(Pz)    -->".round($dati3['sum(ImportoCostoTotale)'],2)."(€)</h2>

            <table class='table'>
                <thead class='thead-dark'>
                    <tr>
                    <th scope='col'>NR ARTICOLO</th>
                    <th scope='col'>QUANTITA DI OUTPUT</th>
                    <th scope='col'>COSTO</th>
                    </tr>
                </thead>
                <tbody id='clienti'>";
                while($dati = $result->fetch_assoc()) {
                    echo '<tr>
                    <td class="cCentrato"> '. $dati['NrArticolo'].'</td>
                    <td class="cCentrato"> '. $dati['sum(ior.QuantitaDiOutput)'].'</td>
                    <td class="cCentrato"> '. round($dati['sum(ior.TempoRisorsa*corb.CostoOrario)'],2).'</td>
                    </tr>';
                }
                echo " </tbody>
            </table>";
        } else {
            echo "Errore!!";
        }
      include_once("conclusione.php");
?>
