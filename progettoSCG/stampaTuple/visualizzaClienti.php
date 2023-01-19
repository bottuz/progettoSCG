        <?php
      include_once("intestazione.php");
			include_once("connessione.php");
            // Check connection
            if ($conn->connect_error)
            {
                die("Connection failed: " . $conn->connect_error);
            }
            $sql="SELECT * FROM clienti";
            $result = $conn->query($sql);
            $conn->close();

		if ($result->num_rows > 0) {
            echo "<h2>CLIENTI</h2>
			      <table class='table'>
                <thead class='thead-dark'>
                    <tr>
                    <th scope='col'>Nr</th>
                    <th scope='col'>CodCondizioniPagam</th>
                    <th scope='col'>FattCumulative</th>
                    <th scope='col'>Valuta</th>
                    </tr>
                </thead>
                <tbody id='clienti'>";
                while($dati = $result->fetch_assoc()) {
                    echo '<tr>
                    <td class="cCentrato"> '. $dati['Nr'].'</td>
                    <td class="cCentrato"> '. $dati['CodCondizioniPagam'].'</td>
    				        <td class="cCentrato"> '. $dati['FattCumulative'].'</td>
                    <td class="cCentrato"> '. $dati['Valuta'].'</td>
                    </tr>';
                }
                echo " </tbody>
            </table>";
        } else {
            echo "Errore!!";
        }
      include_once("conclusione.php");
        ?>
