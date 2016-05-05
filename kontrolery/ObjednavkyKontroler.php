<?php

class ObjednavkyKontroler extends Kontroler {

	public function __construct()
	{
		$this->pohled = "objednavky";
		$this->titulek = "Prehled objednavek";
	}
	public function Proved()
	{
		$idObjednavky = (isset($_GET['id'])) ? $_GET['id'] : "";

		$objednavkyUpdateKO = new Objednavky();
		if (isset($_GET['updateko'])) {
			$objednavkyUpdateKO->akceUpravitObjenavkuKO($idObjednavky);
		}

		$objednavkyUpdateOK = new Objednavky();
		if (isset($_GET['updateok'])) {
			$objednavkyUpdateOK->akceUpravitObjenavkuOK($idObjednavky);
		}

		$objednavky = new Objednavky();
		$this->data = $objednavky->VypisObjednavky();
	}

}