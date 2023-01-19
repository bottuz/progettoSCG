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
        $sql = "SELECT BudgetConsuntivo, CodiceMP, sum(QuantitaMPImpiegata), sum(ImportoCostoTotale)
      	FROM consumi
      	WHERE CodiceMP IN (SELECT NrArticolo FROM consumi) AND BudgetConsuntivo='$bc'
      	GROUP BY '$bc', CodiceMP";
        //TOTALE
        $sql2 = "SELECT sum(ImportoCostoTotale),sum(QuantitaMPImpiegata)
        FROM consumi
        WHERE CodiceMP IN (SELECT NrArticolo FROM consumi) AND BudgetConsuntivo='$bc'";

        $result2 = $conn->query($sql2);
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
              echo "<h2>Quantità MP impiegata ".$bc."</h2></br>
              <a href='visualizzaSommaMP.php?bc=BUDGET'>BUDGET</a>
              <a href='visualizzaSommaMP.php?bc=CONSUNTIVO'>CONSUNTIVO</a></br></br>
              <h3>TOTALE:\t";
              $dati2 = $result2 -> fetch_assoc();
              echo round($dati2['sum(ImportoCostoTotale)'],2);
              echo"
               EURO</h3>
               <h3>QUANTITA:\t"; echo round($dati2['sum(QuantitaMPImpiegata)'],2);
               echo"
              </h3>
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
                      <td class="cCentrato" style="background-color:red;"> '. round($dati['sum(ImportoCostoTotale)'],2).'</td

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
        $sql = "SELECT BudgetConsuntivo, CodiceMP, sum(ImportoCostoTotale), sum(QuantitaMPImpiegata)
      	FROM consumi
      	WHERE CodiceMP IN (SELECT NrArticolo FROM consumi)
      	GROUP BY BudgetConsuntivo,CodiceMP";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
              echo "<h2>Quantità MP impiegata BUDGET/CONSUNTIVO</h2></br>
              <a href='visualizzaSommaMP.php?bc=BUDGET'>BUDGET</a>
              <a href='visualizzaSommaMP.php?bc=CONSUNTIVO'>CONSUNTIVO</a></br></br>
              <table class='table'>
                  <thead class='thead-dark'>
                      <tr>
                      <th scope='col'>CodiceMP</th>
                      <th scope='col'>Quantita</th>
                      <th scope='col'>BUDGET/CONSUNTIVO</th>
                      <th scope='col'>Importo Totale</th>
                      </tr>
                  </thead>
                  <tbody id='clienti'>";
                  while($dati = $result->fetch_assoc()) {
                      echo '<tr>
                      <td class="cCentrato"> '. $dati['CodiceMP'].'</td>
                      <td class="cCentrato"> '. $dati['sum(QuantitaMPImpiegata)'].'</td>
                      <td class="cCentrato"> '. strtoupper($dati['BudgetConsuntivo']).'</td>
                      <td class="cCentrato" style="background-color:red;"> '. round($dati['sum(ImportoCostoTotale)'],2).'</td
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
