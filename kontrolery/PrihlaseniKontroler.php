<?php
#Slouzi k vypsani obsahu kosiku a objednani
class PrihlaseniKontroler extends Kontroler {

public function __construct()
	{
		$this->pohled = "prihlaseni";
		$this->titulek = "Přihlášení";
		$this->error = "";
		$this->test = array();
	}
	public function Proved()
	{
		$prihlaseni = new Prihlaseni();

		#Nacte soubory z POST, pred podminkou, protoze se tyhle veci davaji do sablony
		$this->nick = htmlspecialchars(trim(post('uzivatelJmeno')));
		$this->heslo = htmlspecialchars(trim(post('uzivatelHeslo')));

		if($_POST)
		{
			#Zkontroluje, jestli existuji vsechny udaje
			if($this->nick&&$this->heslo)
				{

					if($prihlaseni->prihlas($this->nick,$this->heslo))
					{
						#ulozi zpravu do SESSION, ktera se zobrazi v index.php a kde se po jejim vypsani SESSION znici
						$_SESSION['zprava']="Úspěšně přihlášeno.";

					}
					else
					{
						$this->error="Nepovedlo se připojit k databazi. Zkuste to za chvili.";
					}
				}
			else
				$this->error = "Nemáte vyplněný formlulář";

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
