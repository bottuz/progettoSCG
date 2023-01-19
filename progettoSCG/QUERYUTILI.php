<?php
          //SEMILAVORATI
          $sql="SELECT CodiceMP, sum(QuantitaMPImpiegata)
        	FROM consumi
        	WHERE CodiceMP IN (SELECT NrArticolo FROM consumi) AND BudgetConsuntivo='BUDGET'
        	GROUP BY CodiceMP";

          //TOTALE COMPERE PER CLIENTE
          $sql2 = "SELECT c.Nr,sum(v.quantita), sum(v.TotaleVendita/t.TassoDiCambioMedio)
          FROM vendite as v JOIN tassidicambio as t JOIN clienti as c ON
          (v.NrOrigine = c.Nr AND c.Valuta=t.CodiceValuta) WHERE v.BudgetConsuntivo='CONSUNTIVO'
          GROUP BY c.Nr";

          //QUANTITA PRODOTTA PER ARTICOLO
          $sql3 = "SELECT ior.NrAreaDiProduzione,ior.NrOrdineDiProduzione, ior.Descrizione,ior.NrArticolo, (ior.TempoRisorsa*corb.CostoOrario)
          FROM ImpiegoOrarioRisorse as ior
          JOIN CostoOrarioRisorseBudget as corb ON (ior.Risorsa=corb.Risorsa AND ior.NrAreaDiProduzione = corb.AreaDiProduzione)
          WHERE ior.BudgetConsuntivo='BUDGET'
          ORDER BY ior.NrAreaDiProduzione,ior.NrArticolo,ior.NrOrdineDiProduzione";

          $sql4 = "SELECT cb.NrArticolo,cb.BudgetConsuntivo, cb.CostoTot as CostoLD, sum(c.ImportoCostoTotale) as CostoMP, cb.QuantitaTot as QOUT,
          sum(c.QuantitaMPImpiegata) as QIN FROM `costo_impiego_b_unit_vero` as cb JOIN consumi as c ON (cb.NrArticolo = c.NrArticolo)
          WHERE c.BudgetConsuntivo="BUDGET" GROUP BY cb.NrArticolo;";





          //quantitaMAXPRODOTTA
          $sql5 = "SELECT * FROM ImpiegoOrarioRisorse as ior JOIN CostoOrarioRisorseBudget as corb ON (ior.Risorsa = corb.Risorsa AND ior.NrAreaDiProduzione = corb.AreaDiProduzione AND ior.BudgetConsuntivo = 'BUDGET')
          WHERE QuantitaDiOutput=(SELECT MAX(QuantitaDiOutput) from impiegoorariorisorse WHERE NrArticolo =ior.NrArticolo AND NrOrdineDiProduzione = ior.NrOrdineDiProduzione AND Descrizione=ior.Descrizione AND NrAreaDiProduzione=ior.NrAreaDiProduzione)
          GROUP BY ior.NrArticolo;";

          //quantitaVenduta
          $sql4 = "SELECT * FROM `vendite` WHERE BudgetConsuntivo="BUDGET" GROUP BY NrArticolo;";


?>
