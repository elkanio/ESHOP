<?php
class Produkt
{
	#kontroluje jestli daný Produkt existuje
	public static function Existuje($id)
	{
		if(db::VratRadek("SELECT * FROM produkty WHERE id = ?", array($id)))
			return true;
		else
			return false;
	}
	#Vraci data o danem produktu
	public static function Vypis($id)
	{

			return db::VratRadek("SELECT * FROM produkty WHERE id = ?", array($id));
	}



	function akceOdstranitProdukt($idPrispevku) {

		// pripojit k DB
		$pripojeni = mysqli_connect('localhost', 'root', '', 'eshop');

		// pripravit dotaz pro databazi na smazani obrazku se zadanym ID
		$query = "DELETE FROM produkty WHERE id=('".$idPrispevku."');";


		// spusti pripraveny dotaz na databazi
		mysqli_query($pripojeni, $query);

		// uzavrit pripojeni k databazi
		mysqli_close($pripojeni);

		header("location: /ES/index.php");

	}

	function akceUpravitProdukt($idProduktu) {
		// pokud parametr ID existuje -> nacist ho do $id

			$pripojeni = mysqli_connect('localhost', 'root', '', 'eshop');

				// zde nacist veci z formu
				$nazev = $_POST['nazev'];
				$popis = $_POST['popis'];
				$kategorie = $_POST['kategorie'];
				$cena = $_POST['cena'];

				// aktualizovat hodnotu v databazi
				$query = "UPDATE produkty SET nazev='.$nazev.', popis='.$popis.', kategorie='.$kategorie.',
						cena='.$cena.' WHERE id='.$idProduktu.'";

				// spustit dotaz
				mysqli_query($pripojeni, $query);
				if ($pripojeni->query($query) === TRUE) {
					echo "Produkt úspěšně upraven";
					header("location: /ES/index.php");
				} else {
					echo "Chyba databaze: " . $pripojeni->error;
				}

			mysqli_close($pripojeni);

	}


}
