<?php

class NabidkaKontroler extends Kontroler {

	public function __construct()
	{
		$this->pohled = "nabidka";
		$this->titulek = "Nabídka eshopu";
	}
	public function Proved()
	{
		#Jestli je v GET id produktu a obsahuje jenom čísla, produkt se přidá do SESSION, a přesměruje na čistou nabídku
		$idProduktu = (isset($_GET['id'])) ? $_GET['id'] : "";


		$nabidkaUlozit = new Nabidka();
		if (isset($_POST['pridatProdukt'])) {
			$nabidkaUlozit->akcePridatProdukt();
		}

		$kos = new Kosik();
		if(ctype_digit($idProduktu))
		{
			$kos->Pridej($idProduktu);
			$this->Presmeruj("index.php");
			$_SESSION['zprava']="Produkt úspěšně přidán";
		}

		#Jestli je nastavená kategorie, zobrazí se pouze ta
		$kategorie = (isset($_GET['kat'])) ? $_GET['kat'] : "";
		#Jestli je nastavené řazení, řadí se podle něj, jinak podle ceny
		$razeni = (isset($_POST['razeni'])) ? $_POST['razeni'] : "cena";

		#Vytvoreni nabidky a ulozeni dat
		$nabidka = new Nabidka();
		$this->data = $nabidka->VypisProdukty($kategorie,$razeni);
		$this->cena = $kos->CelkovaCena();
	}

}