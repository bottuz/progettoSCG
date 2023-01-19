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
          $sql="SELECT NrArticolo, sum(QuantitaMPImpiegata), sum(ImportoCostoTotale), (SELECT sum(QuantitaMPImpiegata) from consumi where BudgetConsuntivo='CONSUNTIVO') as QTOTCONSUNTIVO
                  FROM consumi
                  WHERE BudgetConsuntivo='BUDGET'
                  GROUP BY NrArticolo";

          $sql2 = "SELECT sum(QuantitaMPImpiegata), sum(ImportoCostoTotale)
                  FROM consumi
                  WHERE BudgetConsuntivo='BUDGET'";
          $result = $conn->query($sql);
          $result2 = $conn->query($sql2);

          if ($result->num_rows > 0) {
            echo "<h2>MIX MATERIALE DIRETTO ".$tipo."</h2></br>
                <a href='visualizzaMIXMATERIALEDIRETTO.php?tipo=STANDARD'>STANDARD</a>
                <a href='visualizzaMIXMATERIALEDIRETTO.php?tipo=EFFETTIVO'>EFFETTIVO</a></br></br>
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
                    while($dati = $result->fetch_assoc()) {
                        echo '<tr>
                        <td class="cCentrato"> '. $dati['NrArticolo'].'</td>
                        <td class="cCentrato"> '.round($dati["sum(QuantitaMPImpiegata)"]/$dati2["sum(QuantitaMPImpiegata)"]*100,4).'%</td>
                        <td class="cCentrato" style="background-color:red;"> '. round($dati["sum(QuantitaMPImpiegata)"]/$dati2["sum(QuantitaMPImpiegata)"]*$dati["QTOTCONSUNTIVO"],0).'</td>
                        <td class="cCentrato" style="background-color:red;"> '. round($dati["sum(QuantitaMPImpiegata)"]/$dati2["sum(QuantitaMPImpiegata)"]*$dati["QTOTCONSUNTIVO"]*$dati['sum(ImportoCostoTotale)'],2).'€</td>
                        </tr>';
                          }
                          echo " </tbody>
                      </table>";
                  } else {
                      echo "Errore!!";
                  }

      }else if ($tipo=="EFFETTIVO") {
        // EFFETTIVO
        $tipo ="EFFETTIVO";
        $sql3="SELECT NrArticolo, sum(QuantitaMPImpiegata), sum(ImportoCostoTotale), (SELECT sum(QuantitaMPImpiegata) from consumi where BudgetConsuntivo='BUDGET') as QTOTBUDGET
                FROM consumi
                WHERE BudgetConsuntivo='CONSUNTIVO'
                GROUP BY NrArticolo";

        $sql4 = "SELECT sum(QuantitaMPImpiegata), sum(ImportoCostoTotale)
                FROM consumi
                WHERE BudgetConsuntivo='CONSUNTIVO'";
        $result3 = $conn->query($sql3);
        $result4 = $conn->query($sql4);

        if ($result3->num_rows > 0) {
          echo "<h2>MIX MATERIALE DIRETTO ".$tipo."</h2></br>
              <a href='visualizzaMIXMATERIALEDIRETTO.php?tipo=STANDARD'>STANDARD</a>
              <a href='visualizzaMIXMATERIALEDIRETTO.php?tipo=EFFETTIVO'>EFFETTIVO</a></br></br>
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
                  $dati4 = $result4->fetch_assoc();
                  while($dati3 = $result3->fetch_assoc()) {
                      echo '<tr>
                      <td class="cCentrato"> '. $dati3['NrArticolo'].'</td>
                      <td class="cCentrato"> '.round($dati3["sum(QuantitaMPImpiegata)"]/$dati4["sum(QuantitaMPImpiegata)"]*100,4).'%</td>
                      <td class="cCentrato" style="background-color:red;"> '. round($dati3['sum(QuantitaMPImpiegata)']/$dati4['sum(QuantitaMPImpiegata)']*$dati3['QTOTBUDGET'],0).'</td>
                      <td class="cCentrato" style="background-color:red;"> '. round($dati3["sum(QuantitaMPImpiegata)"]/$dati4["sum(QuantitaMPImpiegata)"]*$dati3["QTOTBUDGET"]*$dati3['sum(ImportoCostoTotale)'],2).'€</td>
                      </tr>';
                  }
                  echo " </tbody>
              </table>";
          } else {
              echo "Errore!!";
          }
      }
      else
      {


      }
}else{
  $tipo ="STANDARD/EFFETTIVO";
  $sql="SELECT NrArticolo, sum(QuantitaMPImpiegata), sum(ImportoCostoTotale), (SELECT sum(QuantitaMPImpiegata) from consumi where BudgetConsuntivo='CONSUNTIVO') as QTOTCONSUNTIVO
          FROM consumi
          WHERE BudgetConsuntivo='BUDGET'
          GROUP BY NrArticolo";

  $sql2 = "SELECT sum(QuantitaMPImpiegata), sum(ImportoCostoTotale)
          FROM consumi
          WHERE BudgetConsuntivo='BUDGET'";
  $result = $conn->query($sql);
  $result2 = $conn->query($sql2);

  $sql3="SELECT NrArticolo, sum(QuantitaMPImpiegata), sum(ImportoCostoTotale), (SELECT sum(QuantitaMPImpiegata) from consumi where BudgetConsuntivo='BUDGET') as QTOTBUDGET
          FROM consumi
          WHERE BudgetConsuntivo='CONSUNTIVO'
          GROUP BY NrArticolo";

  $sql4 = "SELECT sum(QuantitaMPImpiegata), sum(ImportoCostoTotale)
          FROM consumi
          WHERE BudgetConsuntivo='CONSUNTIVO'";
  $result3 = $conn->query($sql3);
  $result4 = $conn->query($sql4);

  $dati2 = $result2->fetch_assoc();
  $dati4 = $result4->fetch_assoc();
  if ($result->num_rows > 0) {
    echo "<h2>MIX MATERIALE DIRETTO ".$tipo."</h2></br>
        <a href='visualizzaMIXMATERIALEDIRETTO.php?tipo=STANDARD'>STANDARD</a>
        <a href='visualizzaMIXMATERIALEDIRETTO.php?tipo=EFFETTIVO'>EFFETTIVO</a></br></br>
        <h2>TOTALE QUANTITA BUDGET: ".$dati2['sum(QuantitaMPImpiegata)']."</h2>
        <h2>TOTALE QUANTITA CONSUNTIVO: ".$dati4['sum(QuantitaMPImpiegata)']."</h2>
        <table class='table'>
            <thead class='thead-dark'>
                <tr>
                <th scope='col'>NrArticolo</th>
                <th scope='col'>BUDGET (%)</th>
                <th scope='col'>MIX STD (PZ)</th>
                <th scope='col'>MIX EFF (PZ)</th>
                <th scope='col'>CONSUNTIVO (%)</th>
                </tr>
            </thead>
            <tbody id='clienti'>";
            while($dati = $result->fetch_assoc()) {
              $dati3 = $result3->fetch_assoc();
                echo '<tr>
                <td class="cCentrato"> '. $dati["NrArticolo"].'</td>
                <td class="cCentrato"> '. $dati["sum(QuantitaMPImpiegata)"].' ('.round($dati["sum(QuantitaMPImpiegata)"]/$dati2["sum(QuantitaMPImpiegata)"]*100,4).'%)</td>
                <td class="cCentrato" style="background-color:red;"> '. round($dati["sum(QuantitaMPImpiegata)"]/$dati2["sum(QuantitaMPImpiegata)"]*$dati["QTOTCONSUNTIVO"],0).'</td>
                <td class="cCentrato" style="background-color:red;"> '. round($dati3["sum(QuantitaMPImpiegata)"]/$dati4["sum(QuantitaMPImpiegata)"]*$dati3["QTOTBUDGET"],0).'</td>
                <td class="cCentrato"> '. $dati3["sum(QuantitaMPImpiegata)"].' ('.round($dati3["sum(QuantitaMPImpiegata)"]/$dati4["sum(QuantitaMPImpiegata)"]*100,4).'%)</td>


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
