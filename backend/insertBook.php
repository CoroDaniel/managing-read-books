<?php session_start();
if (empty($_SESSION['email']))
	header('Location: loginfrontend.html');

require 'vendor/autoload.php';

header("Content-type:text/plain");

$client = new EasyRdf\Sparql\Client('http://localhost:8080/rdf4j-server/repositories/graftest');
$clientUpdate = new EasyRdf\Sparql\Client('http://localhost:8080/rdf4j-server/repositories/graftest/statements');

	// verifica daca s-a inserat deja cartea și daca a atașat un comentariu
	$interogare = 'prefix : <http://danielionut.ro#>
	ASK {?x rdfs:label "'.$_POST['title'].'" ;
	:hasAuthor "'.$_POST['author'].'";
	:hasGenre "'.$_POST['genre'].'";
	:hasComments ?z.
	?z :userID <'.$_SESSION['userID'].'>.}';
	$raspuns = $client->query($interogare);
	
	
if ($raspuns->getBoolean() == TRUE)
{
	
	http_response_code(404);
	print "You have already inserted the book!";
}
else{
	// verificare daca a fost deja inserata cartea, pt a nu avea duplicate
	$interogare = 'prefix : <http://danielionut.ro#>
	ASK {?x rdfs:label "'.$_POST['title'].'" ;
	:hasAuthor "'.$_POST['author'].'";
	:hasGenre "'.$_POST['genre'].'";}';
	$raspuns = $client->query($interogare);
	
	
if ($raspuns->getBoolean() == TRUE)
{
	// preluam ID carte 
	$bookID = '';
	$interogare = 'prefix : <http://danielionut.ro#> 
	SELECT ?bookID {?bookID rdfs:label "'.$_POST['title'].'" ; 
	:hasAuthor "'.$_POST['author'].'";
	:hasGenre "'.$_POST['genre'].'";}';
	$raspuns = $client->query($interogare);
	foreach($raspuns as $rez)
	{
		$bookID = $rez->bookID;
	}
	
	// inseram comentariu atasat cartii
	$interogareUpdate ='
prefix : <http://danielionut.ro#> 
							
INSERT DATA{
<'.$_SESSION['userID'].'> :likes <'.$bookID.'>.
   <'.$bookID.'> :hasComments [:userID <'.$_SESSION['userID'].'>;
				  :comment "'.$_POST['comments'].'"]}';

print $clientUpdate->update($interogareUpdate);


}
else
{	
// cream ID carte
$bookID = trim(str_replace(" ","",$_POST['title'])).bin2hex(random_bytes(2));
// iseram cartea si comentariu
$interogareUpdate ='
prefix : <http://danielionut.ro#> 
							
INSERT{
<'.$_SESSION['userID'].'> :likes ?bookID.
?bookID a :Book; 
	  rdfs:label "'.$_POST['title'].'";
    	  :hasAuthor "'.$_POST['author'].'";
       	  :hasGenre "'.$_POST['genre'].'";
          :hasComments [:userID <'.$_SESSION['userID'].'>; :comment "'.$_POST['comments'].'"]
}
WHERE{
	BIND(IRI(CONCAT("http://danielionut.ro#'.$bookID.'")) AS ?bookID)
}';

print $clientUpdate->update($interogareUpdate);

}
}
?>