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
		$this->nick = htmlspecialchars(trim(post('uzivatelLogin')));
		$this->heslo = htmlspecialchars(trim(post('uzivatelHeslo1')));
		$this->hesloZnova = htmlspecialchars(trim(post('uzivatelHeslo2')));

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

