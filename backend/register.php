<?php

require 'vendor/autoload.php';

header("Content-type:text/plain");

$client=new EasyRdf\Sparql\Client("http://localhost:8080/rdf4j-server/repositories/graftest");
$clientUpdate = new EasyRdf\Sparql\Client("http://localhost:8080/rdf4j-server/repositories/graftest/statements");

// verificare existenta utilizator, daca emailul este folosit
$interogare="prefix : <http://danielionut.ro#> ASK {?x :hasEmail '".$_POST['email']."'}";
$raspuns = $client->query($interogare);
if ($raspuns->getBoolean() == TRUE)
{

	http_response_code(404);
	print "Insert another email adress!";
	exit;
}
else 
{
	// Introducere utilizator nou, tip persoana cu nume, email si parola. Unicitatea id data de bytes random generati in fct
	// de setari interne ale pc-ului. Convertit in hexa din binary pt a putea fi utilizat
	$interogareUpdate="prefix : <http://danielionut.ro#> 
							INSERT 
							{?id a :Person;
						rdfs:label '".trim($_POST['name'])."'; 
							:hasEmail '".$_POST['email']."';
							:hasPassword '".$_POST['password']."'.
							}
							WHERE{
							BIND(IRI('http://danielionut.ro#".trim(str_replace(" ","",$_POST['name'])).bin2hex(random_bytes(2))."') AS ?id)
							}";
	
	print $clientUpdate->update($interogareUpdate);

	
	}
?>