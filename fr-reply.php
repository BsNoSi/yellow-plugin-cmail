<?php
// belongs to cmail extension for YELLOW, https://github.com/bsnosi/yellow-extension-cmail
// YELLOW Copyright ©2013-now Datenstrom, http://datenstrom.se
// This file may be used and distributed under the terms of the public license.
// ***************************************************************
// SEE README.MD FOR SETUP REQUIREMENTS
// ***************************************************************

	$mailadress = "adresse@domain.tld";
	$subject = "Envoyé par domain.tld: " . $_GET["more"];
	$body = "de l'adresse : " .$_SERVER['HTTP_REFERER'] ."\n\n";
	$body .= "Veuillez laisser sujet et \"de l'adresse\" (paramètres pour le filtre anti-spam),\nsinon votre message finira dans le dossier spam. Ce serait dommage.\n\nVotre demande :";

// nothing to do below

	$r_in =  array("%",   "\n",  " ",   "/",   "!",   "#",   "*",   "<",   ">",   "?",   "&");
	$r_out = array("%25", "%0A", "%20", "%2F", "%21", "%23", "%2A", "%3C", "%3E", "%3F", "%26");

      $output = "Location: mailto:" . $mailadress;
	$output .= "?subject=" . str_replace($r_in,$r_out,$subject);
	$output .= "&body=". str_replace($r_in,$r_out,$body);
	
	echo $output;

    header($output);
    exit;
?>