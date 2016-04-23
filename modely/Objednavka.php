<?php
class Objednavka{
	#Prida do DB zaznam o objednavce
	public function Objednej($jmeno,$prijmeni,$mesto,$platba,$doprava,$produkty,$cena)
	{
		$param = array(
			"jmeno"=>$jmeno,
			"prijmeni"=>$prijmeni,
			"mesto"=>$mesto,
			"platba"=>$platba,
			"doprava"=>$doprava,
			"produkty"=>$produkty,
			"cena"=>$cena);
		

		return db::Vloz("objednavky",$param);
	}
}