<?php
include_once("intestazione.php");
include_once("connessione.php");
      // Check connection
      if ($conn->connect_error)
      {
          die("Connection failed: " . $conn->connect_error);
      }
      $sql="SELECT * FROM TassiDiCambio";
      $result = $conn->query($sql);
      $conn->close();

if ($result->num_rows > 0) {
      echo "<h2>TASSI DI CAMBIO</h2>
      <table class='table'>
          <thead class='thead-dark'>
              <tr>
              <th scope='col'>CodiceValuta</th>
              <th scope='col'>Anno</th>
              <th scope='col'>TassoDiCambioMedio</th>
              </tr>
          </thead>
          <tbody id='clienti'>";
          while($dati = $result->fetch_assoc()) {
              echo '<tr>
              <td class="cCentrato"> '. $dati['CodiceValuta'].'</td>
              <td class="cCentrato"> '. $dati['Anno'].'</td>
              <td class="cCentrato"> '. $dati['TassoDiCambioMedio'].'</td>
              </tr>';
          }
          echo " </tbody>
      </table>";
  } else {
      echo "Errore!!";
  }
include_once("conclusione.php");
  ?>
