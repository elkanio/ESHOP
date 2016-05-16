<?php
class Prihlaseni{
	public function prihlas($jmeno,$heslo){


		$dotaz = "SELECT * FROM uzivateldb WHERE login='$jmeno' LIMIT 1";
		$pripojeni = mysqli_connect('localhost', 'root', '', 'eshop');
		$data = mysqli_query($pripojeni, $dotaz);

			// kdyz existuje
			if($data) {
				$uzivatel = mysqli_fetch_array($data);
				// kdyz je hash zadaneho hesla stejny jako hash v databazi
				if($uzivatel['hashHesla'] == sha1($heslo)) {
					// prihlasit uzivatele -> vytvorit SESSION id podle ID v databazi
					include_once 'uzivatel.php';
					$_SESSION['idUzivatel'] = $uzivatel['role'];
					// ulozit udaje uzivatele do SESSION
					$_SESSION['jm'] = $uzivatel['login'];

		      header("location: index.php");
				}

				// jinak
				else {
					// vypsat spatne zadane heslo
					echo '<b>Zadané heslo není správné.</b>';

				}
			}
			// jinak
			else {
				// vypsat neexistujici uzivatel
				echo '<b>Uživatel neexistuje</b>';

			}

		}

	}
?>