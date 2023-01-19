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
        $sql="SELECT *
                FROM consumi
                WHERE BudgetConsuntivo='$bc'  GROUP BY NrArticolo,CodiceMP";
        $sql2="SELECT sum(ImportoCostoTotale),sum(QuantitaMPImpiegata)
                FROM consumi
                WHERE BudgetConsuntivo='$bc'";
      }
      else
      {
        $classe="*";
        $bc ="BUDGET/CONSUNTIVO";
        $stato = "TUTTI GLI STATI";
        $sql = "SELECT *
                FROM consumi
                GROUP BY NrArticolo,CodiceMP";
        $sql2="SELECT sum(ImportoCostoTotale),sum(QuantitaMPImpiegata)
                FROM consumi";
      }
      $result = $conn->query($sql);
      $result2 = $conn->query($sql2);
      $conn->close();

if ($result->num_rows > 0) {
      echo "<h2>CONSUMI ".$bc."</h2></br></br>
      <a href='visualizzaConsumi.php?bc=BUDGET'>BUDGET</a>
      <a href='visualizzaConsumi.php?bc=CONSUNTIVO'>CONSUNTIVO</a></br></br>
      ";
      $dati2 = $result2->fetch_assoc();
      echo"
      <h2>TOTALE MP(QTA): ".$dati2['sum(QuantitaMPImpiegata)']."(Pz)    -->".round($dati2['sum(ImportoCostoTotale)'],2)."(€)</h2>
      <table class='table'>
          <thead class='thead-dark'>
              <tr>
              <th scope='col'>NR MOVIMENTO</th>
              <th scope='col'>BUDGET/CONSUNTIVO</th>
              <th scope='col'>CODICE MP</th>
              <th scope='col'>NR ARTICOLO</th>
              <th scope='col'>QUANTITA MP IMPIEGATA</th>
              <th scope='col'>IMPORTO COSTO TOTALE</th>
              <th scope='col'>IMPORTO COSTO UNITARIO</th>
              </tr>
          </thead>
          <tbody id='clienti'>";
          while($dati = $result->fetch_assoc()) {
              echo '<tr>
              <td class="cCentrato"> '. $dati['NrMovimento'].'</td>
              <td class="cCentrato"> '. $dati['BudgetConsuntivo'].'</td>
              <td class="cCentrato"> '. $dati['CodiceMP'].'</td>
              <td class="cCentrato" style="background-color:red ;"> '. $dati['NrArticolo'].'</td>
              <td class="cCentrato"> '. $dati['QuantitaMPImpiegata'].'</td>
              <td class="cCentrato" style="background-color:red;"> '. $dati['ImportoCostoTotale'].'</td>
              <td class="cCentrato" style="background-color:red;"> '. round($dati['ImportoCostoTotale']/$dati['QuantitaMPImpiegata'],2).'</td>
              </tr>';
          }
          echo " </tbody>
      </table>";
  } else {
      echo "Errore!!";
  }
include_once("conclusione.php");
  ?>
