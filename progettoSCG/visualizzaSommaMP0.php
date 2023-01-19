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
        $sql = "SELECT BudgetConsuntivo, CodiceMP, sum(QuantitaMPImpiegata), ImportoCostoTotale
      	FROM consumi
      	WHERE BudgetConsuntivo='$bc' AND ImportoCostoTotale=0
      	GROUP BY BudgetConsuntivo,CodiceMP";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
              echo "<h2>Quantità MP impiegata ".$bc."</h2></br>
              <a href='visualizzaSommaMP0.php?bc=BUDGET'>BUDGET</a>
              <a href='visualizzaSommaMP0.php?bc=CONSUNTIVO'>CONSUNTIVO</a></br></br>
              <table class='table'>
                  <thead class='thead-dark'>
                      <tr>
                      <th scope='col'>CodiceMP</th>
                      <th scope='col'>Quantita</th>
                      <th scope='col'>Importo Totale ".$bc."</th>
                      </tr>
                  </thead>
                  <tbody id='clienti'>";
                  while($dati = $result->fetch_assoc()) {
                      echo '<tr>
                      <td class="cCentrato"> '. $dati['CodiceMP'].'</td>
                      <td class="cCentrato"> '. $dati['sum(QuantitaMPImpiegata)'].'</td>
                      <td class="cCentrato" style="background-color:red;"> '. round($dati['ImportoCostoTotale'],2).'</td

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
        $bc =" BUDGET/CONSUNTIVO";
        $sql = "SELECT BudgetConsuntivo, CodiceMP, sum(QuantitaMPImpiegata), ImportoCostoTotale
      	FROM consumi
      	WHERE ImportoCostoTotale=0
      	GROUP BY BudgetConsuntivo,CodiceMP";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
              echo "<h2>Quantità MP impiegata BUDGET/CONSUNTIVO</h2></br>
              <a href='visualizzaSommaMP0.php?bc=BUDGET'>BUDGET</a>
              <a href='visualizzaSommaMP0.php?bc=CONSUNTIVO'>CONSUNTIVO</a></br></br>
              <table class='table'>
                  <thead class='thead-dark'>
                      <tr>
                      <th scope='col'>CodiceMP</th>
                      <th scope='col'>BUDGET/CONSUNTIVO</th>
                      <th scope='col'>Importo Totale</th>
                      </tr>
                  </thead>
                  <tbody id='clienti'>";
                  while($dati = $result->fetch_assoc()) {
                      echo '<tr>
                      <td class="cCentrato"> '. $dati['CodiceMP'].'</td>
                      <td class="cCentrato"> '. $dati['BudgetConsuntivo'].'</td>
                      <td class="cCentrato" style="background-color:red;"> '. round($dati['ImportoCostoTotale'],2).'</td
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
