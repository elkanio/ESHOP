<?php
class Objednavky{
	#Posle data o produktech podle kriteria�
	public function VypisObjednavky(){
			return db::VratVse("SELECT*FROM objednavky");
	}

	function akceUpravitObjenavkuOK($idObjednavky) {

		$pripojeni = mysqli_connect('localhost', 'root', '', 'eshop');

		// aktualizovat hodnotu v databazi
		$query = "UPDATE objednavky SET vyrizeno='1' WHERE id='$idObjednavky'";

		// spustit dotaz
		if ($pripojeni->query($query) === TRUE) {
			echo "Produkt úspěšně upraven";
		} else {
			echo "Chyba databaze: " . $pripojeni->error;
		}

		mysqli_close($pripojeni);

	}


	function akceUpravitObjenavkuKO($idObjednavky) {

		$pripojeni = mysqli_connect('localhost', 'root', '', 'eshop');

		// aktualizovat hodnotu v databazi
		$query = "UPDATE objednavky SET vyrizeno='0' WHERE id='$idObjednavky'";

		// spustit dotaz
		if ($pripojeni->query($query) === TRUE) {
			echo "Produkt úspěšně upraven";
		} else {
			echo "Chyba databaze: " . $pripojeni->error;
		}

		mysqli_close($pripojeni);

	}

}