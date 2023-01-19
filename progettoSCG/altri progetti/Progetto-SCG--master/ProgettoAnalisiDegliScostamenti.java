import java.io.File;
import java.io.FileInputStream;
import java.io.IOException;
import java.util.ArrayList;

import org.apache.poi.ss.usermodel.CellType;
import org.apache.poi.ss.usermodel.Row;
import org.apache.poi.xssf.usermodel.XSSFSheet;
import org.apache.poi.xssf.usermodel.XSSFWorkbook;

public class ProgettoAnalisiDegliScostamenti {

	public static void main(String[] args) throws IOException {

		/** ------ IMPORTAZIONE TABELLA CLIENTI: | numero cliente | valuta | ------------------------------------------------------------------------*/

		File file1 = new File("Clienti.xlsx");
		FileInputStream fis1 = new FileInputStream(file1); // Importo foglio excel Clienti
		XSSFWorkbook wb1 = new XSSFWorkbook(fis1);
		XSSFSheet sheet1 = wb1.getSheetAt(0); // seleziono primo foglio

		ArrayList<String> numeroclienti = new ArrayList<>();
		ArrayList<Integer> valutaclienti = new ArrayList<>();

		for (Row row : sheet1) {
			// skip first row
			if (row == sheet1.getRow(0))
				continue;
			numeroclienti.add(row.getCell(0).getStringCellValue());
			valutaclienti.add((int) row.getCell(2).getNumericCellValue());
		}
		
		wb1.close();

		// /** STAMPA DI PROVA */
		// for (int i = 0; i < numeroclienti.size(); i++) {
		// System.out.print(numeroclienti.get(i) + "\t" + valutaclienti.get(i) + "\r");
		// }

		/**----------------------------------------------------------------------------------------------------------------------------------------
		 * IMPORTAZIONE TABELLA CONSUMI: | nr movimento | BUDGET/CONSUNTIVO | Numero MP | Numero Articolo | Numero ordine di produzione | Quantità consumata | Costo totale |
		----------------------------------------------------------------------------------------------------------------------- */

		File file2 = new File("Consumi.xlsx");
		FileInputStream fis2 = new FileInputStream(file2); // Importo foglio Excel Consumi
		XSSFWorkbook wb2 = new XSSFWorkbook(fis2);
		XSSFSheet sheet2 = wb2.getSheetAt(0); // seleziono primo foglio

		ArrayList<Integer> NrMovimento = new ArrayList<>(); // inizializzaione vettori dati
		ArrayList<String> BudgetConsuntivo = new ArrayList<>();
		ArrayList<String> numeroMP = new ArrayList<>();
		ArrayList<String> numeroArticolo = new ArrayList<>();
		ArrayList<String> numeroOrdineDiProduzione = new ArrayList<>();
		ArrayList<Integer> QuantitàConsumata = new ArrayList<>();
		ArrayList<Double> CostoTotale = new ArrayList<>();

		for (Row row : sheet2) {
			if (row == sheet2.getRow(0)) 	// skip first row because of not relevant values
				continue;
			if(row.getCell(0) == null) 		// break at the end
				break;
			NrMovimento.add((int) row.getCell(0).getNumericCellValue());
			BudgetConsuntivo.add(row.getCell(1).getStringCellValue());
			numeroMP.add(row.getCell(3).getStringCellValue());
			numeroArticolo.add(row.getCell(4).getStringCellValue());
			numeroOrdineDiProduzione.add(row.getCell(6).getStringCellValue());
			QuantitàConsumata.add((int) row.getCell(7).getNumericCellValue());
			CostoTotale.add(row.getCell(9).getNumericCellValue());
		}

		// /** STAMPA DI PROVA */
		// for (int i = 0; i < NrMovimento.size(); i++) {
		// System.out.print(NrMovimento.get(i) + "\t" + BudgetConsuntivo.get(i) + "\t" +
		// numeroMP.get(i) + "\t\t\t"
		// + numeroArticolo.get(i) + "\t\t\t" + numeroOrdineDiProduzione.get(i) + "\t"
		// + QuantitàConsumata.get(i) + "\t" + CostoTotale.get(i) + "\r");
		// }

		wb2.close();
		
		/** -------IMPORTAZIONE TABELLA COSTO_ORARIO_RISORSE_BUDGET: | Nr Area Produzione | Risorsa | Costo Orario |-------------------------------------*/

		File file3 = new File("Costo orario risorse _ budget.xlsx");
		FileInputStream fis3 = new FileInputStream(file3); // Importo foglio excel Costo orario risorse budget
		XSSFWorkbook wb3 = new XSSFWorkbook(fis3);
		XSSFSheet sheet3 = wb3.getSheetAt(0); // seleziono primo foglio

		ArrayList<String> numeroAreaProduzioneB = new ArrayList<>(); // inizializzaione vettori dati
		ArrayList<String> RisorsaB = new ArrayList<>();
		ArrayList<Double> CostoOrarioB = new ArrayList<>();

		for (Row row : sheet3) { // ciclo di lettura
			// skip first row
			if (row == sheet3.getRow(0))
				continue;
			numeroAreaProduzioneB.add(row.getCell(0).getStringCellValue()); // lettura dati
			RisorsaB.add(row.getCell(1).getStringCellValue());
			CostoOrarioB.add(row.getCell(2).getNumericCellValue());
		}
		
		wb3.close();

		// /** STAMPA DI PROVA */
		// for (int i = 0; i < numeroAreaProduzioneB.size(); i++) {
		// System.out.print(numeroAreaProduzioneB.get(i) + "\t" + RisorsaB.get(i) + "\t"
		// + CostoOrarioB.get(i) + "\r");
		// }

		
		/** ------- IMPORTAZIONE TABELLA COSTO_ORARIO_RISORSE_CONSUNTIVO: | Nr Area Produzione | Risorsa | Costo Orario |-------------------------------*/

		File file4 = new File("Costo orario risorse _ consuntivo.xlsx");
		FileInputStream fis4 = new FileInputStream(file4); // Importo foglio excel Costo orario risorse budget
		XSSFWorkbook wb4 = new XSSFWorkbook(fis4);
		XSSFSheet sheet4 = wb4.getSheetAt(0); // seleziono primo foglio

		ArrayList<String> numeroAreaProduzioneC = new ArrayList<>(); // inizializzaione vettori dati
		ArrayList<String> RisorsaC = new ArrayList<>();
		ArrayList<Double> CostoOrarioC = new ArrayList<>();

		for (Row row : sheet4) { // ciclo di lettura
			// skip first row
			if (row == sheet4.getRow(0))
				continue;
			numeroAreaProduzioneC.add(row.getCell(0).getStringCellValue()); // lettura dati
			RisorsaC.add(row.getCell(1).getStringCellValue());
			CostoOrarioC.add(row.getCell(2).getNumericCellValue());
		}
		
		wb4.close();

		// /** STAMPA DI PROVA */
		// for (int i = 0; i < numeroAreaProduzioneC.size(); i++) {
		// System.out.print(numeroAreaProduzioneC.get(i) + "\t" + RisorsaC.get(i) + "\t"
		// + CostoOrarioC.get(i) + "\r");
		// }

		/** ---------------------------------------------------------------------------------------------------------------------------------
		 * IMPORTAZIONE TABELLA IMPIEGO_ORARIO_RISORSE: | NrArticolo | BUDGET/CONSUNTIVO | Nr Ordine Produzione | Nr Operazione | Nr | Tempo di Setup | Tempo di Lavorazione | Tempo Fermo | Nr Area Produzione | Tempo Risorsa | Cod Tipo Lavoro | Codice Risorsa | Nr Movimento |
		 ------------------------------------------------------------------------------------------------------------------------------------ */

		File file5 = new File("Impiego_orario_risorse.xlsx");
		FileInputStream fis5 = new FileInputStream(file5); // Importo foglio excel Clienti
		XSSFWorkbook wb5 = new XSSFWorkbook(fis5);
		XSSFSheet sheet5 = wb5.getSheetAt(0); // seleziono primo foglio

		ArrayList<String> numeroArticoloI = new ArrayList<>(); // inizializzaione vettori dati
		ArrayList<String> BudgetConsuntivoI = new ArrayList<>();
		ArrayList<String> NrOrdineProduzione = new ArrayList<>();
		ArrayList<String> NrOperazione = new ArrayList<>();
		ArrayList<String> Nr = new ArrayList<>();
		ArrayList<Double> TempoSetup = new ArrayList<>();
		ArrayList<Double> TempoLavorazione = new ArrayList<>();
		ArrayList<Double> TempoFermo = new ArrayList<>();
		ArrayList<String> NrAreaProduzione = new ArrayList<>();
		ArrayList<Double> TempoRisorsa = new ArrayList<>();
		ArrayList<String> CodTipoLavoro = new ArrayList<>();
		ArrayList<String> CodiceRisorsa = new ArrayList<>();
		ArrayList<Integer> NrMovimentoI = new ArrayList<>();

		for (Row row : sheet5) { // ciclo di lettura
			// skip first row
			if (row == sheet5.getRow(0))
				continue;
			numeroArticoloI.add(row.getCell(0).getStringCellValue()); // lettura dati
			BudgetConsuntivoI.add(row.getCell(1).getStringCellValue());
			NrOrdineProduzione.add(row.getCell(3).getStringCellValue());
			NrOperazione.add(row.getCell(4).getStringCellValue());
			Nr.add(row.getCell(6).getStringCellValue());
			TempoSetup.add(row.getCell(7).getNumericCellValue());
			TempoLavorazione.add(row.getCell(8).getNumericCellValue());
			TempoFermo.add(row.getCell(9).getNumericCellValue());
			NrAreaProduzione.add(row.getCell(10).getStringCellValue());
			TempoRisorsa.add(row.getCell(11).getNumericCellValue());
			try { // NON PRENDE LE CELLE VUOTE??? INSERITO A MANO
				CodTipoLavoro.add(row.getCell(12).getStringCellValue());
			} catch (NullPointerException e) {
				CodTipoLavoro.add(null);
			}
			CodiceRisorsa.add(row.getCell(13).getStringCellValue());
			NrMovimentoI.add((int) row.getCell(15).getNumericCellValue());
		}

		// /** STAMPA DI PROVA */
		// for (int i = 0; i < numeroAtricoloI.size(); i++) {
		// System.out.print(numeroAtricoloI.get(i) + "\t" + BudgetConsuntivoI.get(i) +
		// "\t" + NrOrdineProduzione.get(i)
		// + "\t" + NrOperazione.get(i) + "\t" + Nr.get(i) + "\t" + TempoSetup.get(i) +
		// "\t"
		// + TempoLavorazione.get(i) + "\t" + TempoFermo.get(i) + "\t" +
		// NrAreaProduzione.get(i) + "\t"
		// + TempoRisorsa.get(i) + "\t" + CodTipoLavoro.get(i) + "\t" +
		// CodiceRisorsa.get(i) + "\t"
		// + NrMovimentoI.get(i) + "\r");
		// }

		/** --------------- IMPORTAZIONE TABELLA TASSI DI CAMBIO --------------------------------------------------------------------------------*/

		File file6 = new File("Tassi di cambio.xlsx");
		FileInputStream fis6 = new FileInputStream(file6); // Importo foglio excel Clienti
		XSSFWorkbook wb6 = new XSSFWorkbook(fis6);
		XSSFSheet sheet6 = wb6.getSheetAt(0); // seleziono primo foglio
		
		ArrayList<String> valuta = new ArrayList<>();	// 3° elemento valore Valuta
		
		for (Row row: sheet6) { 		
			
			if (row == sheet6.getRow(0)) 	// skip first row because of not relevant values
				continue;
			if(row.getCell(0).getCellTypeEnum()==CellType.BLANK) 		// break at the end
				break;
			
				
			if(row.getCell(2).getCellTypeEnum() == CellType.STRING) 
				valuta.add(row.getCell(2).getStringCellValue().replace(",", ".")); //problema conversione a double se c'è la virgola
			else
				valuta.add(Double.toString(row.getCell(2).getNumericCellValue()));
		}

		wb6.close();
		
//		System.out.print(valuta);
		/** STAMPA DI PROVA */
//		String[] val = new String[3];
//		for(String elem: valuta) {
//			val = elem.split("-");
//			System.out.println("Tipo: " + val[1] +"\tCodice valuta: " + val[0] + "\tValuta = " + val[2]);
//		}

		/**-----------------------------------------------------------------------------------------------------------------------
		 * IMPORTAZIONE TABELLA VENDITE: | NrMovimento | BUDGET/CONSUNTIVO | NrArticolo | NrOrigine | QuantitàVenduta | Importo vendita in valuta locale |
		 --------------------------------------------------------------------------------------------------------------------------*/

		File file7 = new File("Vendite.xlsx");
		FileInputStream fis7 = new FileInputStream(file7); // Importo foglio excel Clienti
		XSSFWorkbook wb7 = new XSSFWorkbook(fis7);
		XSSFSheet sheet7 = wb7.getSheetAt(0); // seleziono primo foglio

		ArrayList<Integer> NrMovimentoV = new ArrayList<>(); // inizializzaione vettori dati
		ArrayList<String> BudgetConsuntivoV = new ArrayList<>();
		ArrayList<String> NrArticoloV = new ArrayList<>();
		ArrayList<String> NrOrigine = new ArrayList<>();
		ArrayList<Integer> QuantitàVendutaV = new ArrayList<>();
		ArrayList<Double> ImportoValutaLocale = new ArrayList<>();

		for (Row row : sheet7) { // ciclo di lettura
			// skip first row
			if (row == sheet7.getRow(0))
				continue;
			NrMovimentoV.add((int) row.getCell(0).getNumericCellValue()); // lettura dati
			BudgetConsuntivoV.add(row.getCell(1).getStringCellValue());
			NrArticoloV.add(row.getCell(3).getStringCellValue());
			NrOrigine.add(row.getCell(5).getStringCellValue());
			QuantitàVendutaV.add((int) row.getCell(6).getNumericCellValue());
			ImportoValutaLocale.add(row.getCell(7).getNumericCellValue());
			if (row.getCell(0).getNumericCellValue() == 35599) // CICLO FOR NON FINISCE QUANDO FINISCE IL FOGLIO????
				break;
		}
		
		wb7.close();

		// /** STAMPA DI PROVA */
		// for (int i = 0; i < NrMovimentoV.size(); i++) {
		// System.out.print(NrMovimentoV.get(i) + "\t" + BudgetConsuntivoV.get(i) + "\t"
		// + NrArticoloV.get(i) + "\t"
		// + NrOrigine.get(i) + "\t" + QuantiàVendutaV.get(i) + "\t" +
		// ImportoValutaLocale.get(i) + "\r");
		// }

		
		/** ---------SELEZIONE ARTICOLI CHE MATCHANO BUDGET-CONSUNTIVO ------------------------------------------------------------- */
		/**ARTICOLI IN TABELLA VENDITE DA CONSIDERARE*/
		//separo articoli da "vendite.xlsx" tra budget e consuntivo
		ArrayList<String> ArticoliaBudgetduplicati = new ArrayList<>();
		ArrayList<String> ArticoliaConsuntivoduplicati = new ArrayList<>();
		for(int i=0; i<BudgetConsuntivoV.size();i++) {
			if(BudgetConsuntivoV.get(i).compareTo("BUDGET")==0) //selezione articoli presenti a budget
				ArticoliaBudgetduplicati.add(NrArticoloV.get(i));
			if(BudgetConsuntivoV.get(i).compareTo("CONSUNTIVO")==0) // selezione articoli presenti a consuntivo
				ArticoliaConsuntivoduplicati.add(NrArticoloV.get(i));
		}
		
		//devo eliminiare i duplicati 
		ArrayList<String> ArticoliaBudgetsingoli = new ArrayList<>();
		ArrayList<String> ArticoliaConsuntivosingoli = new ArrayList<>();
		//array a budget senza duplicati
scandupb: for(int i=0; i<ArticoliaBudgetduplicati.size();i++) {
			for(int j=0; j<ArticoliaBudgetsingoli.size();j++) {
				if(ArticoliaBudgetduplicati.get(i).compareTo(ArticoliaBudgetsingoli.get(j))==0)// se l'articolo è già stato inserito passo al prossimo
					continue scandupb;
			}
			ArticoliaBudgetsingoli.add(ArticoliaBudgetduplicati.get(i));
		}
		//array a consuntivo senza duplicati
scandupc: for(int i=0; i<ArticoliaConsuntivoduplicati.size();i++) {
				for(int j=0; j<ArticoliaConsuntivosingoli.size();j++) {
					if(ArticoliaConsuntivoduplicati.get(i).compareTo(ArticoliaConsuntivosingoli.get(j))==0)
						continue scandupc;
				}
				ArticoliaConsuntivosingoli.add(ArticoliaConsuntivoduplicati.get(i)); 
			}
		
		//creo array di articoli singoli da vendite
		ArrayList<String> ArticoliVendite = new ArrayList<>();
		//scorro gli articoli a budget, se lo trovo anche a consuntivo lo inserisco nell'array finale, ho tolto i duplicati quindi un articolo non può essere inserito due volte
scana:	for(int i=0; i<ArticoliaBudgetsingoli.size();i++) {
			for(int j=0;j<ArticoliaConsuntivosingoli.size();j++) {
				if(ArticoliaBudgetsingoli.get(i).compareTo(ArticoliaConsuntivosingoli.get(j))==0) {
					ArticoliVendite.add(ArticoliaBudgetsingoli.get(i)); //articolo trovato inserito nell'array finae
					continue scana; // passo al prossimo
				}//se non lo trova passa al prossimo articolo
			}
		}
		
		//elimino righe con articoli che non matchano
		//Vendite
scana1:for(int i=0; i<NrArticoloV.size(); i++) {
			for(int j=0; j<ArticoliVendite.size();j++) {
				if(NrArticoloV.get(i).compareTo(ArticoliVendite.get(j))==0)
					continue scana1;
			}
			//articolo da scartare -> elimino "riga"
			NrMovimentoV.remove(i);
			BudgetConsuntivoV.remove(i);
			NrArticoloV.remove(i);
			NrOrigine.remove(i);
			QuantitàVendutaV.remove(i);
			ImportoValutaLocale.remove(i);
			i--;
		}
		
		System.out.print(ArticoliVendite.size());
		
//		/**ARTICOLI IN TABELLA CONSUMI DA CONSIDERARE*/
//		
//		//separo articoli da "consumi.xlsx" tra budget e consuntivo
//		ArrayList<String> ArticoliaBudgetduplicatiConsumi = new ArrayList<>();
//		ArrayList<String> ArticoliaConsuntivoduplicatiConsumi = new ArrayList<>();
//		for(int i=0; i<BudgetConsuntivo.size();i++) {
//			if(BudgetConsuntivo.get(i).compareTo("BUDGET")==0) //selezione articoli presenti a budget
//				ArticoliaBudgetduplicatiConsumi.add(numeroOrdineDiProduzione.get(i));
//			if(BudgetConsuntivo.get(i).compareTo("CONSUNTIVO")==0) // selezione articoli presenti a consuntivo
//				ArticoliaConsuntivoduplicatiConsumi.add(numeroOrdineDiProduzione.get(i));
//		}
//		
//		//devo eliminiare i duplicati 
//		ArrayList<String> ArticoliaBudgetsingoliConsumi = new ArrayList<>();
//		ArrayList<String> ArticoliaConsuntivosingoliConsumi = new ArrayList<>();
//		//array a budget senza duplicati
//scandupb2: for(int i=0; i<ArticoliaBudgetduplicatiConsumi.size();i++) {
//			for(int j=0; j<ArticoliaBudgetsingoliConsumi.size();j++) {
//				if(ArticoliaBudgetduplicatiConsumi.get(i).compareTo(ArticoliaBudgetsingoliConsumi.get(j))==0)// se l'atricolo è già stato inserito passo al prossimo
//					continue scandupb2;
//			}
//			ArticoliaBudgetsingoliConsumi.add(ArticoliaBudgetduplicatiConsumi.get(i));
//		}
//		//array a consuntivo senza duplicati
//scandupc2: for(int i=0; i<ArticoliaConsuntivoduplicatiConsumi.size();i++) {
//				for(int j=0; j<ArticoliaConsuntivosingoliConsumi.size();j++) {
//					if(ArticoliaConsuntivoduplicatiConsumi.get(i).compareTo(ArticoliaConsuntivosingoliConsumi.get(j))==0)
//						continue scandupc2;
//				}
//				ArticoliaConsuntivosingoliConsumi.add(ArticoliaConsuntivoduplicatiConsumi.get(i)); 
//			}
//		
//		//creo array finale con prodotti bersaglio che sono presenti in entrambi gli array di consumi
//		ArrayList<String> ArticoliConsumi = new ArrayList<>();
//		//scorro gli articoli a budget, se lo trovo anche a consuntivo lo inserisco nell'array finale, ho tolto i duplicati quindi un articolo non può essere inserito due volte
//scana2:	for(int i=0; i<ArticoliaBudgetsingoliConsumi.size();i++) {
//			for(int j=0;j<ArticoliaConsuntivosingoliConsumi.size();j++) {
//				if(ArticoliaBudgetsingoliConsumi.get(i).compareTo(ArticoliaConsuntivosingoliConsumi.get(j))==0) {
//					ArticoliConsumi.add(ArticoliaBudgetsingoliConsumi.get(i)); //articolo trovato inserito nell'array finae
//					continue scana2; // passo al prossimo
//				}//se non lo trova passa al prossimo articolo
//			}
//		}
//		
//		//elimino righe con articoli che non matchano
//		//Consumi
//		scana2:for(int i=0; i<numeroArticolo.size(); i++) {
//					for(int j=0; j<ArticoliConsumi.size();j++) {
//						if(numeroArticolo.get(i).compareTo(ArticoliConsumi.get(j))==0)
//							continue scana2;
//					}
//					//articolo da scartare -> elimino "riga"
//					NrMovimento.remove(i);
//					BudgetConsuntivo.remove(i);
//					numeroMP.remove(i);
//					numeroArticolo.remove(i);
//					numeroOrdineDiProduzione.remove(i);
//					QuantitàConsumata.remove(i);
//					CostoTotale.remove(i);
//					i--;
//				}
//		
//		/**ARTICOLI IN TABELLA IMPIEGO_ORARIO_RISORSE DA CONSIDERARE*/
//		
//		//separo articoli da "Impiego_orario_risorse.xlsx" tra budget e consuntivo
//		ArrayList<String> ArticoliaBudgetduplicatiImpiego = new ArrayList<>();
//		ArrayList<String> ArticoliaConsuntivoduplicatiImpiego = new ArrayList<>();
//		for(int i=0; i<BudgetConsuntivoI.size();i++) {
//			if(BudgetConsuntivoI.get(i).compareTo("BUDGET")==0) //selezione articoli presenti a budget
//				ArticoliaBudgetduplicatiImpiego.add(numeroArticoloI.get(i));
//			if(BudgetConsuntivoI.get(i).compareTo("CONSUNTIVO")==0) // selezione articoli presenti a consuntivo
//				ArticoliaConsuntivoduplicatiImpiego.add(numeroArticoloI.get(i));
//		}
//		
//		//devo eliminiare i duplicati 
//		ArrayList<String> ArticoliaBudgetsingoliImpiego = new ArrayList<>();
//		ArrayList<String> ArticoliaConsuntivosingoliImpiego = new ArrayList<>();
//		//array a budget senza duplicati
//scandupb3: for(int i=0; i<ArticoliaBudgetduplicatiImpiego.size();i++) {
//			for(int j=0; j<ArticoliaBudgetsingoliImpiego.size();j++) {
//				if(ArticoliaBudgetduplicatiImpiego.get(i).compareTo(ArticoliaBudgetsingoliImpiego.get(j))==0)// se l'atricolo è già stato inserito passo al prossimo
//					continue scandupb3;
//			}
//			ArticoliaBudgetsingoliImpiego.add(ArticoliaBudgetduplicatiImpiego.get(i));
//		}
//		//array a consuntivo senza duplicati
//scandupc3: for(int i=0; i<ArticoliaConsuntivoduplicatiImpiego.size();i++) {
//				for(int j=0; j<ArticoliaConsuntivosingoliImpiego.size();j++) {
//					if(ArticoliaConsuntivoduplicatiImpiego.get(i).compareTo(ArticoliaConsuntivosingoliImpiego.get(j))==0)
//						continue scandupc3;
//				}
//				ArticoliaConsuntivosingoliImpiego.add(ArticoliaConsuntivoduplicatiImpiego.get(i)); 
//			}
//		
//		//creo array finale con prodotti bersaglio che sono presenti in entrambi gli array di impego_orario_risorse
//		ArrayList<String> ArticoliImpiego = new ArrayList<>();
//		//scorro gli articoli a budget, se lo trovo anche a consuntivo lo inserisco nell'array finale, ho tolto i duplicati quindi un articolo non può essere inserito due volte
//scana3:	for(int i=0; i<ArticoliaBudgetsingoliImpiego.size();i++) {
//			for(int j=0;j<ArticoliaConsuntivosingoliImpiego.size();j++) {
//				if(ArticoliaBudgetsingoliImpiego.get(i).compareTo(ArticoliaConsuntivosingoliImpiego.get(j))==0) {
//					ArticoliImpiego.add(ArticoliaBudgetsingoliImpiego.get(i)); //articolo trovato inserito nell'array finae
//					continue scana3; // passo al prossimo
//				}//se non lo trova passa al prossimo articolo
//			}
//		}
//		
//		//elimino righe con articoli che non matchano
//		//Impiego_orario_risorse
//scana3:for(int i=0; i<numeroArticoloI.size(); i++) {
//			for(int j=0; j<ArticoliImpiego.size();j++) {
//				if(numeroArticoloI.get(i).compareTo(ArticoliImpiego.get(j))==0)
//					continue scana3;
//			}
//			//articolo da scartare -> elimino "riga"
//			numeroArticoloI.remove(i);
//			BudgetConsuntivoI.remove(i);
//			NrOrdineProduzione.remove(i);
//			NrOperazione.remove(i);
//			Nr.remove(i);
//			TempoSetup.remove(i);
//			TempoLavorazione.remove(i);
//			TempoFermo.remove(i);
//			NrAreaProduzione.remove(i);
//			TempoRisorsa.remove(i);
//			CodTipoLavoro.remove(i);
//			CodiceRisorsa.remove(i);
//			NrMovimentoI.remove(i);
//			i--;
//		}	
		
		/** ----------------------- SCOSTAMENTO SUI RICAVI E RISULTATO INDUSTRIALE ------------------------------------ 
		 * 
		 * non posso calcolare scostamento di volume e di prezzo perchè non ho il prezzo standard/effettivo di ogni articolo
		 * posso calcolare il risultato indutriale e lo scostamento ddovuto al tasso di cambio
		 * 
		 */
		
    
		
		
		
		
		
		
		
		
		

		
		/** CALCOLO RICAVI DALLE VENDITE BUDGET------------------------------------------------------------------------------- */
		double RicaviVenditeBudget = 0;
		for (int i = 0; i < NrMovimentoV.size(); i++) { // scorro tutte le vendite
			if (BudgetConsuntivoV.get(i).compareTo("BUDGET") == 0)
			RicaviVenditeBudget += ImportoValutaLocale.get(i) / tassodicambio(numeroclienti, valutaclienti, valuta, NrOrigine.get(i), 0);
		}
		System.out.print("Ricavi vendite budget: " + Math.floor(RicaviVenditeBudget * 100) / 100 + " € \r");

		/** CALCOLO RICAVI DALLE VENDITE CONSUNTIVO------------------------------------------------------------------------------ */
		double RicaviVenditeConsuntivo = 0;
		for (int i = 0; i < NrMovimentoV.size(); i++) { // scorro tutte le vendite
			if (BudgetConsuntivoV.get(i).compareTo("CONSUNTIVO") == 0)
			RicaviVenditeConsuntivo += ImportoValutaLocale.get(i) / tassodicambio(numeroclienti, valutaclienti, valuta, NrOrigine.get(i), 1);
		}
		System.out.print("Ricavi vendite consuntivo: " + Math.floor(RicaviVenditeConsuntivo * 100) / 100 + " € \r");

		
		/** ------------------VOLUMI -------------------------------------------------------------------------------------------------------------*/
		ArrayList<String> ProdottiSingoliB = new ArrayList<>();
		ArrayList<Integer> QuantitàTotaleB = new ArrayList<>();
		ArrayList<String> ProdottiSingoliC = new ArrayList<>();
		ArrayList<Integer> QuantitàTotaleC = new ArrayList<>();

scanarticoli: for (int i = 0; i < NrMovimentoV.size(); i++) { // scorrimento vendite
			if (BudgetConsuntivoV.get(i).compareTo("BUDGET") == 0) { // Calcolo quantità prodotti a budget
				for (int j = 0; j < ProdottiSingoliB.size(); j++) { // scorro per trovare se ho già aggiunto il prodotto
					if (ProdottiSingoliB.size() != 0 && NrArticoloV.get(i).compareTo(ProdottiSingoliB.get(j)) == 0) { // se ho trovato il prodotto
						QuantitàTotaleB.set(j, QuantitàTotaleB.get(j) - QuantitàVendutaV.get(i)); // aumento la quantità
						continue scanarticoli;
					}
				} // end for
					// se non ho trovato il prodotto aggiungo nuovo prodotto con quantità
				ProdottiSingoliB.add(NrArticoloV.get(i)); // nuovo prodotto in posizione i
				QuantitàTotaleB.add(-QuantitàVendutaV.get(i)); // nuova quantità in posizione i
			} // end if
		}
		
		
scanarticoli2: for (int i = 0; i < NrMovimentoV.size(); i++) {
			if (BudgetConsuntivoV.get(i).compareTo("CONSUNTIVO") == 0) { // Calcolo quantità prodotti a consuntivo
				for (int j = 0; j < ProdottiSingoliC.size(); j++) { // scorro per trovare se ho già aggiunto il prodotto
					if (ProdottiSingoliC.size() != 0 && NrArticoloV.get(i).compareTo(ProdottiSingoliC.get(j)) == 0) { // se ho trovato il prodotto
						QuantitàTotaleC.set(j, QuantitàTotaleC.get(j) - QuantitàVendutaV.get(i)); // aumento la quantità
						continue scanarticoli2;
					}
				} // end for
					// se non ho trovato il prodotto aggiungo nuovo prodotto con quantità
				ProdottiSingoliC.add(NrArticoloV.get(i)); // nuovo prodotto in posizione i
				QuantitàTotaleC.add(-QuantitàVendutaV.get(i)); // nuova quantità in posizione i
			} // end if
		}

		/** STAMPA DI PROVA */
//		System.out.print("\r\rVOLUMI BUDGET\r\r");
//		for (int i = 0; i < ProdottiSingoliB.size(); i++) {
//			System.out.print(ProdottiSingoliB.get(i) + "\t" + QuantitàTotaleB.get(i) + "\r");
//		}
//		
//		System.out.print("\r\rVOLUMI CONSUNTIVO\r\r");
//		for (int i = 0; i < ProdottiSingoliC.size(); i++) {
//			System.out.print(ProdottiSingoliC.get(i) + "\t" + QuantitàTotaleC.get(i) + "\r");
//		}

		
		/** -------- CALCOLO VOULUMI TOTALI ---------------------------------------------------*/
		
		int VolumeTotaleBudget=0;
		int VolumeTotaleConsuntivo=0;
		int VolumeTotale=0;
		
		for(int elem: QuantitàTotaleB)
			VolumeTotaleBudget+=elem;
		for(int elem: QuantitàTotaleC)
			VolumeTotaleConsuntivo+=elem;
		VolumeTotale=VolumeTotaleBudget+VolumeTotaleConsuntivo;
		
		System.out.print("Volume a Budget: "+VolumeTotaleBudget+"\rVolume a Consuntivo: "+VolumeTotaleConsuntivo+"\rVolume totale: "+VolumeTotale+"\r");
		
		
		/** -----------MIX---------------------------------------------------------------- */
		//mix a budget
		ArrayList<Double> mixbudget = new ArrayList<>();
		for(int elem: QuantitàTotaleB)
			mixbudget.add((double)elem/VolumeTotaleBudget*100); //arraylist con percentuale di mix	 di ogni prodotto a budget
		//mix a consuntivo
		ArrayList<Double> mixconsuntivo = new ArrayList<>();
		for(int elem: QuantitàTotaleC)
			mixconsuntivo.add((double)elem/VolumeTotaleConsuntivo*100); //arraylist con percentuale di mix di ogni prodotto a consuntivo
		
		
		/** ----------COSTO MATERIE PRIME ----------------------------------------- */
		double CostoTotMateriePrimeB=0;
		double CostoTotMateriePrimeC=0;
		for(int i=0;i<BudgetConsuntivo.size();i++) {
			if(BudgetConsuntivo.get(i).compareTo("BUDGET")==0)
				CostoTotMateriePrimeB+=CostoTotale.get(i);
			else
				CostoTotMateriePrimeC+=CostoTotale.get(i);
		}
			
		System.out.print("Costo Materie prime a Budget : " +Math.floor(+CostoTotMateriePrimeB*100)/100 + " €\r");
		System.out.print("Costo Materie prime a Consuntivo : " +Math.floor(+CostoTotMateriePrimeC*100)/100 + " €\r");
		
		
		/** ---------- COSTO ORARIO * TEMPO RISORSA ----------------------------------------- */
		//separo budget consuntivo
		double CostoLDBudget=0;
		double CostoLDConsuntivo=0;
		
		//numero movimento identifica una riga
		//per ogni coppia articolo-ordine di produzione cerco la coppia risorsa-numero area di produzione e relativo tempo risorse e moltiplico per il costo orario

scanco:	for(int i=0; i<NrMovimentoI.size();i++) {
			if(BudgetConsuntivoI.get(i).compareTo("BUDGET")==0) { //budget
				for(int j=0;j<numeroAreaProduzioneB.size();j++) {
					if(NrAreaProduzione.get(i).compareTo(numeroAreaProduzioneB.get(j))==0 && CodiceRisorsa.get(i).compareTo(RisorsaB.get(j))==0) //cerco match della coppia risorsa-numeroareaproduzione
						CostoLDBudget+=CostoOrarioB.get(j)*TempoRisorsa.get(i);
					continue scanco;
				}
			}
			else { //consuntivo
				for(int j=0;j<numeroAreaProduzioneC.size();j++) {
					if(NrAreaProduzione.get(i).compareTo(numeroAreaProduzioneC.get(j))==0 && CodiceRisorsa.get(i).compareTo(RisorsaC.get(j))==0)
						CostoLDConsuntivo+=CostoOrarioC.get(j)*TempoRisorsa.get(i);
					continue scanco;
				}
			}		
		}

		System.out.print("Costo LD Budget: "+Math.floor(CostoLDBudget*100)/100+" € \rCosto LD Consuntivo: "+Math.floor(CostoLDConsuntivo*100)/100+" €\r");
		
		
		/** ---------- SCOSTAMENTO SU AREA DI PRODUZIONE --------------------*/
		
		
		
		/** --------- SCOSTAMENTO TEMPO 
		
		
		/** -------- MDC ----------------   */
		double MDCBudget=RicaviVenditeBudget-CostoTotMateriePrimeB-CostoLDBudget;
		double MDCConsuntivo=RicaviVenditeConsuntivo-CostoTotMateriePrimeC-CostoLDConsuntivo;
		
		System.out.print("MDC Budget: "+Math.floor(MDCBudget*100)/100+" € \r"+"MDC Consuntivo: "+Math.floor(MDCConsuntivo*100)/100+" € \r");
		
		
		/** --------------- DELTA ---------*/
		double deltaRicaviVendite = RicaviVenditeConsuntivo - RicaviVenditeBudget;
		int deltaVolume = VolumeTotaleConsuntivo - VolumeTotaleBudget;
		double deltaCostoMateriePrime = CostoTotMateriePrimeC - CostoTotMateriePrimeB;
		double deltaCostoLD = CostoLDConsuntivo - CostoLDBudget;
		double deltaMDC = MDCConsuntivo - MDCBudget;
		
		System.out.print(deltaRicaviVendite+"\t"+deltaVolume+"\t"+deltaCostoMateriePrime+"\t"+deltaCostoLD+"\t"+deltaMDC);
		
		
		/**ANALISI SCOSTAMENTI*/
		
		
	} // END MAIN

	
	
	/** ----------------------------METODI------------------------------------ */
	/**metodo ritorna tasso di cambio per cliente
	 * @param numeroclienti
	 *            ArrayList tabella clienti
	 * @param valutaclienti
	 *            ArrayList tabella valuta clienti
	 * @param codicecliente
	 *            da ricercare
	 * @param tipo
	 *            Budget/Consuntivo
	 * @return tasso di cambio
	 */
	private static double tassodicambio(ArrayList<String> numeroclienti, ArrayList<Integer> valutaclienti,ArrayList<String> valuta, String codicecliente, int tipo) {
		for (int i = 0; i < numeroclienti.size(); i++) { // scorro codici cliente
			if (numeroclienti.get(i).compareTo(codicecliente) == 0) { // trovo il mio cliente
				if (tipo == 0) { // budget
					switch (valutaclienti.get(i)) { // trovo la valuta usata dal cliente
					case 1:
						return Double.parseDouble(valuta.get(0));
					case 2:
						return Double.parseDouble(valuta.get(1));
					case 3:
						return Double.parseDouble(valuta.get(2));
					}
				}
				if (tipo == 1) { // consuntivo
					switch (valutaclienti.get(i)) {
					case 1:
						return Double.parseDouble(valuta.get(3));
					case 2:
						return Double.parseDouble(valuta.get(4));
					case 3:
						return Double.parseDouble(valuta.get(5));
					}
				}
			}
		}
		return 0;
	} // END METHOD tassodicambio

	
	
} // END PROGRAMMA
