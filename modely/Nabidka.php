<?php
class Nabidka{
	#Posle data o produktech podle kriteria�
	public function VypisProdukty($kategorie, $razeni){
		if($kategorie =="")
			return db::VratVse("SELECT*FROM produkty  ORDER BY $razeni", array());
		else
			return db::VratVse("SELECT*FROM produkty WHERE kategorie = ? ORDER BY $razeni", array($kategorie));
	}

	function akcePridatProdukt() {

		$pripojeni = mysqli_connect('localhost', 'root', '', 'eshop');

		// zkontrolovat pripojeni
		if(mysqli_connect_errno($pripojeni)) {
			echo "<p>Nepodařilo se připojit k databázi: ".mysqli_connect_error().
			"</p>";
		}

		// pripravit dotaz
		$dotazSQL = "INSERT INTO produkty (nazev, popis, kategorie, cena)
							VALUES ('".$_POST['nazev']."',
								    '".$_POST['popis']."',
								    '".$_POST['kategorie']."',
								    '".$_POST['cena']."')";



		// provest dotaz
		mysqli_query($pripojeni, $dotazSQL);

		// uzavrit pripojeni k databazi
		mysqli_close($pripojeni);

		header("location: /ES/index.php");
	}

}