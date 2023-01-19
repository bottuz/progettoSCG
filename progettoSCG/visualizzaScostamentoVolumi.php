<?php
include_once("intestazione.php");
include_once("connessione.php");
    // Check connection
    if ($conn->connect_error)
    {
        die("Connection failed: " . $conn->connect_error);
    }
    //QTA BUDGET (vendita) 7224
    $qtaBUDGET="SELECT sum(v.quantita), sum(v.TotaleVendita/t.TassoDiCambioMedio)
      FROM vendite as v
      JOIN Clienti as c ON (v.NrOrigine = c.Nr)
        JOIN tassidicambio as t ON (c.valuta = t.CodiceValuta)
      WHERE v.BudgetConsuntivo = 'BUDGET' AND v.BudgetConsuntivo=t.Anno";

    //QTA CONSUNTIVO (vendita) 9329
    $qtaCONSUNTIVO="SELECT sum(v.quantita), sum(v.TotaleVendita/t.TassoDiCambioMedio)
      FROM vendite as v
      JOIN Clienti as c ON (v.NrOrigine = c.Nr)
        JOIN tassidicambio as t ON (c.valuta = t.CodiceValuta)
      WHERE v.BudgetConsuntivo = 'CONSUNTIVO' AND v.BudgetConsuntivo=t.Anno";

    //QTA BUDGET (consumi) 1697
    $qtaBUDGETconsumi = "SELECT sum(QuantitaMPImpiegata), sum(ImportoCostoTotale)
            FROM consumi
            WHERE CodiceMP IN (SELECT NrArticolo FROM consumi) AND BudgetConsuntivo='BUDGET'";

    //QTA CONSUNTIVO (consumi) 2624
    $qtaCONSUNTIVOconsumi = "SELECT sum(QuantitaMPImpiegata), sum(ImportoCostoTotale)
            FROM consumi
            WHERE CodiceMP IN (SELECT NrArticolo FROM consumi) AND BudgetConsuntivo='CONSUNTIVO'";

    //FACCIO PARTIRE LE QUERY
      $resultQTAB = $conn->query($qtaBUDGET);
      $resultQTAC = $conn->query($qtaCONSUNTIVO);
      $resultQTABconsumi = $conn->query($qtaBUDGETconsumi);
      $resultQTACconsumi = $conn->query($qtaCONSUNTIVOconsumi);

    //END Connection
    $conn->close();


    //converto in int la qta e double il totale in euro
    $resultQTAB = $resultQTAB->fetch_array();
    $QTAVENDITAB = intval($resultQTAB[0]);
    $QTAVENDITABE = doubleval($resultQTAB[1]);

    //converto in int la qta e double il totale in euro
    $resultQTAC = $resultQTAC->fetch_array();
    $QTAVENDITAC = intval($resultQTAC[0]);
    $QTAVENDITACE = doubleval($resultQTAC[1]);

    //converto in int la qta e double il totale in euro
    $resultQTABconsumi = $resultQTABconsumi->fetch_array();
    $QTACONSUMIB = intval($resultQTABconsumi[0]);
    $QTACONSUMIBE = doubleval($resultQTABconsumi[1]);

    //converto in int la qta e double il totale in euro
    $resultQTACconsumi = $resultQTACconsumi->fetch_array();
    $QTACONSUMIC = intval($resultQTACconsumi[0]);
    $QTACONSUMICE = doubleval($resultQTACconsumi[1]);


    //SCOSTAMENTO (vendita) in qta ed euro
    $scostamentoQTA = $QTAVENDITAB - $QTAVENDITAC;
    $scostamentoQTAE = $QTAVENDITABE - $QTAVENDITACE;
    $scostamentoQTAconsumi = $QTACONSUMIB - $QTACONSUMIC;
    $scostamentoQTAconsumiE = $QTACONSUMIBE - $QTACONSUMICE;

  ?>
  <h2>SCOSTAMENTO VOLUMI</h2></br>
      <table class = "table">
        <thead class='thead-dark'>
            <tr>
            <th scope='col'></th>
            <th scope='col'>BUDGET</th>
            <th scope='col'>SCOSTAMENTO</th>
            <th scope='col'>CONSUNTIVO</th>
            </tr>
        </thead>
        <!--- QTA TOTALI (costi) ----->
        <tr class = "table__row">
          <td style="background: rgba(10, 100, 100, 0.5);"><b>VOLUME COSTI</b></td>
           <td><?php echo $QTACONSUMIB; ?> (<?php echo round(abs($QTACONSUMIBE),2); ?>€)</td>
           <td><?php echo abs($scostamentoQTAconsumi); ?> (<?php echo round(abs($scostamentoQTAconsumiE),2); ?>€)</td>
           <td><?php echo $QTACONSUMIC; ?> (<?php echo round(abs($QTACONSUMICE),2); ?>€)</td>
        </tr>
         <!-- QTA TOTALI (vendute) --->
         <tr class = "table__row">
           <td style="background: rgba(10, 100, 100, 0.5);"><b>VOLUME VENDITE</b></td>
            <td><?php echo $QTAVENDITAB; ?> (<?php echo round(abs($QTAVENDITABE),2); ?>€)</td>
            <td><?php echo abs($scostamentoQTA); ?> (<?php echo round(abs($scostamentoQTAE),2); ?>€)</td>
            <td><?php echo $QTAVENDITAC; ?> (<?php echo round(abs($QTAVENDITACE),2); ?>€)</td>
         </tr>
      </table>
<?php
include_once("conclusione.php");
  ?>
