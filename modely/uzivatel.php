<?php

// kdyz uzivatel nema prideleno ID
if(!isset($_SESSION['idUzivatel']))
	// nastavit jeho ID na 0
	$_SESSION['idUzivatel'] = 0;


