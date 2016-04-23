<?php
class ProduktKontroler extends Kontroler
{
	public function __construct()
	{
		$this->pohled = "produkt";
		$this->titulek;
	}
	public function Proved()
	{
		#Nacte id produktu, ktery ma zobrazit z GET a jestlize nenalezne produkt v DB,
		#tak presmeruje na nabidku, jinak ulozi data
		$idProduktu = (isset($_GET['id'])) ? $_GET['id'] : "";

		if(Produkt::Existuje($idProduktu) && isset($_GET['delete']))
		{
			$produkt = new Produkt();
			$produkt->akceOdstranitProdukt($idProduktu);
		}


		if (isset($_POST['upravitProdukt'])) {
			$produktUpravit = new Produkt();
			$produktUpravit->akceUpravitProdukt($idProduktu);
		}

		if(Produkt::Existuje($idProduktu))
		{
			$this->data = Produkt::Vypis($idProduktu);
			$this->titulek= $this->data['nazev'];
		}
		else
			$this->Presmeruj("index.php");

		#Vytvoreni nabidky a ulozeni dat

	}

}