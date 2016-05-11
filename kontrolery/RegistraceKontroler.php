<?php
class RegistraceKontroler extends Kontroler {

public function __construct()
	{
		$this->pohled = "registrace";
		$this->titulek = "Registrace";
		$this->error = "";
		$this->test = array();
	}
	public function Proved()
	{
		$registrace = new Registrace();

		#Nacte soubory z POST, pred podminkou, protoze se tyhle veci davaji do sablony
		$this->nick = post('uzivatelLogin');
		$this->heslo = post('uzivatelHeslo1');
		$this->hesloZnova = post('uzivatelHeslo2');

		if(post('registrace'))
		{
			$registrace->registruj($this->nick,$this->heslo,$this->hesloZnova);
		}
	}

}
#jen pro zjednoduseni nacteni z POST
	function post($nazev)
	{
		if(isset($_POST[$nazev])&&$_POST[$nazev]!="")
			return $_POST[$nazev];
		else
			return null;

	}

