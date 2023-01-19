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
        $sql="SELECT v.BudgetConsuntivo, v.NrArticolo,sum(v.quantita), sum(v.TotaleVendita/t.TassoDiCambioMedio)
        FROM vendite as v
        JOIN Clienti as c ON (v.NrOrigine = c.Nr)
          JOIN tassidicambio as t ON (c.valuta = t.CodiceValuta)
        WHERE v.BudgetConsuntivo = '$bc' AND v.BudgetConsuntivo=t.Anno
        GROUP BY v.NrArticolo";

        $sql2 = "SELECT sum(v.quantita), sum(v.TotaleVendita/t.TassoDiCambioMedio)
        FROM vendite as v
        JOIN Clienti as c ON (v.NrOrigine = c.Nr)
          JOIN tassidicambio as t ON (c.valuta = t.CodiceValuta)
        WHERE v.BudgetConsuntivo = '$bc' AND v.BudgetConsuntivo=t.Anno";
        $result = $conn->query($sql);
        $result2 = $conn->query($sql2);

        if ($result->num_rows > 0) {
              echo "<h2>MIX VENDITE A "."$bc</h2></br>
              <a href='visualizzaMIXVENDITE.php?bc=BUDGET'>BUDGET</a>
              <a href='visualizzaMIXVENDITE.php?bc=CONSUNTIVO'>CONSUNTIVO</a></br></br>
              <table class='table'>
                  <thead class='thead-dark'>
                      <tr>
                      <th scope='col'>BUDGET/CONSUNTIVO</th>
                      <th scope='col'>NrArticolo</th>
                      <th scope='col'>quantita</th>
                      <th scope='col'>MIX QUANTITA (%QTA)</th>
                      <th scope='col'>EURO</th>
                      <th scope='col'>MIX FATTURATO (%EURO)</th>
                      </tr>
                  </thead>
                  <tbody id='clienti'>";
                  $dati2 = $result2->fetch_assoc();
                  while($dati = $result->fetch_assoc()) {
                      echo '<tr>
                      <td class="cCentrato"> '. strtoupper($dati['BudgetConsuntivo']).'</td>
                      <td class="cCentrato"> '. $dati['NrArticolo'].'</td>
                      <td class="cCentrato"> '. $dati['sum(v.quantita)'].'</td>
                      <td class="cCentrato"> '. round($dati['sum(v.quantita)']/$dati2['sum(v.quantita)']*100,4).'%</td>
                      <td class="cCentrato"> '. round($dati['sum(v.TotaleVendita/t.TassoDiCambioMedio)'],2).'</td>
                      <td class="cCentrato" style="background-color:red;"> '. round($dati['sum(v.TotaleVendita/t.TassoDiCambioMedio)']/$dati2['sum(v.TotaleVendita/t.TassoDiCambioMedio)']*100,5).'%</td>
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
        $classe="*";
        $bc ="BUDGET";
        $sql="SELECT v.BudgetConsuntivo, v.NrArticolo, sum(v.quantita), sum(v.TotaleVendita/t.TassoDiCambioMedio)
        FROM vendite as v
        JOIN Clienti as c ON (v.NrOrigine = c.Nr)
          JOIN tassidicambio as t ON (c.valuta = t.CodiceValuta)
        WHERE v.BudgetConsuntivo = '$bc' AND v.BudgetConsuntivo=t.Anno
        GROUP BY v.NrArticolo,v.BudgetConsuntivo";

        $sql2 = "SELECT sum(v.quantita), sum(v.TotaleVendita/t.TassoDiCambioMedio)
        FROM vendite as v
        JOIN Clienti as c ON (v.NrOrigine = c.Nr)
          JOIN tassidicambio as t ON (c.valuta = t.CodiceValuta)
        WHERE v.BudgetConsuntivo = '$bc' AND v.BudgetConsuntivo=t.Anno";
        $result = $conn->query($sql);
        $result2 = $conn->query($sql2);

        $bc ="CONSUNTIVO";
        $sql3="SELECT v.BudgetConsuntivo, v.NrArticolo, sum(v.quantita), sum(v.TotaleVendita/t.TassoDiCambioMedio)
        FROM vendite as v
        JOIN Clienti as c ON (v.NrOrigine = c.Nr)
          JOIN tassidicambio as t ON (c.valuta = t.CodiceValuta)
        WHERE v.BudgetConsuntivo = '$bc' AND v.BudgetConsuntivo=t.Anno
        GROUP BY v.NrArticolo,v.BudgetConsuntivo";

        $sql4 = "SELECT sum(v.quantita), sum(v.TotaleVendita/t.TassoDiCambioMedio)
        FROM vendite as v
        JOIN Clienti as c ON (v.NrOrigine = c.Nr)
          JOIN tassidicambio as t ON (c.valuta = t.CodiceValuta)
        WHERE v.BudgetConsuntivo = '$bc' AND v.BudgetConsuntivo=t.Anno";
        $result3 = $conn->query($sql3);
        $result4 = $conn->query($sql4);

        $bc = " BUDGET/CONSUNTIVO";
        if ($result->num_rows > 0) {
              echo "<h2>MIX VENDITE A "."$bc</h2></br>
              <a href='visualizzaMIXVENDITE.php?bc=BUDGET'>BUDGET</a>
              <a href='visualizzaMIXVENDITE.php?bc=CONSUNTIVO'>CONSUNTIVO</a></br></br>
              <table class='table'>
                  <thead class='thead-dark'>
                      <tr>
                      <th scope='col'>BUDGET/CONSUNTIVO</th>
                      <th scope='col'>NrArticolo</th>
                      <th scope='col'>quantita</th>
                      <th scope='col'>MIX QUANTITA (%QTA)</th>
                      <th scope='col'>EURO</th>
                      <th scope='col'>MIX FATTURATO (%EURO)</th>
                      </tr>
                  </thead>
                  <tbody id='clienti'>";
                  $dati2 = $result2->fetch_assoc();
                  while($dati = $result->fetch_assoc()) {
                      echo '<tr>
                      <td class="cCentrato"> '. strtoupper($dati['BudgetConsuntivo']).'</td>
                      <td class="cCentrato"> '. $dati['NrArticolo'].'</td>
                      <td class="cCentrato"> '. $dati['sum(v.quantita)'].'</td>
                      <td class="cCentrato"> '. round($dati['sum(v.quantita)']/$dati2['sum(v.quantita)']*100,4).'%</td>
                      <td class="cCentrato"> '. round($dati['sum(v.TotaleVendita/t.TassoDiCambioMedio)'],2).'</td>
                      <td class="cCentrato" style="background-color:red;"> '. round($dati['sum(v.TotaleVendita/t.TassoDiCambioMedio)']/$dati2['sum(v.TotaleVendita/t.TassoDiCambioMedio)']*100,5).'%</td>
                      </tr>';
                  }
                  $dati4 = $result4->fetch_assoc();
                  while($dati3 = $result3->fetch_assoc()) {
                      echo '<tr>
                      <td class="cCentrato"> '. strtoupper($dati3['BudgetConsuntivo']).'</td>
                      <td class="cCentrato"> '. $dati3['NrArticolo'].'</td>
                      <td class="cCentrato"> '. $dati3['sum(v.quantita)'].'</td>
                      <td class="cCentrato"> '. round($dati3['sum(v.quantita)']/$dati4['sum(v.quantita)']*100,4).'%</td>
                      <td class="cCentrato"> '. round($dati3['sum(v.TotaleVendita/t.TassoDiCambioMedio)'],2).'</td>
                      <td class="cCentrato" style="background-color:red;"> '. round($dati3['sum(v.TotaleVendita/t.TassoDiCambioMedio)']/$dati4['sum(v.TotaleVendita/t.TassoDiCambioMedio)']*100,5).'%</td>
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
