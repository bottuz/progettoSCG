<?php
include_once("intestazione.php");
include_once("connessione.php");
      // Check connection
      if ($conn->connect_error)
      {
          die("Connection failed: " . $conn->connect_error);
      }
      $sql="SELECT * FROM costoorariorisorsebudget";
      $result = $conn->query($sql);
      $conn->close();

if ($result->num_rows > 0) {
      echo "<h2>COSTO ORARIO RISORSE BUDGET</h2>
      <table class='table'>
          <thead class='thead-dark'>
              <tr>
              <th scope='col'>Risorsa</th>
              <th scope='col'>AreaDiProduzione</th>
              <th scope='col'>CostoOrario</th>
              </tr>
          </thead>
          <tbody id='clienti'>";
          while($dati = $result->fetch_assoc()) {
              echo '<tr>
              <td class="cCentrato"> '. $dati['Risorsa'].'</td>
              <td class="cCentrato"> '. $dati['AreaDiProduzione'].'</td>
              <td class="cCentrato"> '. $dati['CostoOrario'].'</td>
              </tr>';
          }
          echo " </tbody>
      </table>";
  } else {
      echo "Errore!!";
  }
include_once("conclusione.php");
  ?>
