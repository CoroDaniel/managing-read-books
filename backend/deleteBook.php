<?php session_start();
if (empty($_SESSION['email']))
	header('Location: loginfrontend.html');

require 'vendor/autoload.php';

header("Content-type:text/plain");

$client = new EasyRdf\Sparql\Client('http://localhost:8080/rdf4j-server/repositories/grafexamen');
$clientUpdate = new EasyRdf\Sparql\Client('http://localhost:8080/rdf4j-server/repositories/grafexamen/statements');

$check ='';
	// verificare daca cartea pe care userul vrea sa o stearga este salvata si de altcineva
	// daca da, inseamna ca are mai multe comentarii atasate.(userul poate avea doar un com atasat unei carti)
$interogare = 'prefix : <http://danielionut.ro#>
SELECT (COUNT(?z) AS ?nr) WHERE
{
  <http://danielionut.ro#'.$_GET['id'].'> :hasComments ?z.
}';

$raspuns = $client->query($interogare);

foreach($raspuns as $rez)
// preluare valoare din obiect tip EasyRdf\Sparql\Integer
{
	$check = ($rez->nr->getValue());
}
if ($check > 1)
{
	// se sterge doar relatia dintre utilizator si carte si comentariul atasat
	$interogareUpdate = 'prefix : <http://danielionut.ro#>
	
	DELETE{
		<'.$_SESSION['userID'].'> :likes <http://danielionut.ro#'.$_GET['id'].'>.
		<http://danielionut.ro#'.$_GET['id'].'> :hasComments ?z.
		?z :userID <'.$_SESSION['userID'].'>;
		   :comment ?x.}
	WHERE
	{
		<'.$_SESSION['userID'].'> :likes <http://danielionut.ro#'.$_GET['id'].'>.
		<http://danielionut.ro#'.$_GET['id'].'> :hasComments ?z.
		?z :userID <'.$_SESSION['userID'].'>;
		   :comment ?x.
	}';	
	print $clientUpdate->update($interogareUpdate);
}
else {
	// se sterg atat cartea, cat si orice relatie legata de ea
	$interogareUpdate = '
prefix : <http://danielionut.ro#>
	
	DELETE
	{   
 <'.$_SESSION['userID'].'> :likes <http://danielionut.ro#'.$_GET['id'].'>.
		<http://danielionut.ro#'.$_GET['id'].'> rdfs:label ?title;
							  :hasAuthor ?author;    
    						  :hasGenre ?genre;						  
   							  :hasComments ?anonym.
  		?anonym ?w ?q.
}
	WHERE
	{
		<'.$_SESSION['userID'].'> :likes <http://danielionut.ro#'.$_GET['id'].'>.
		<http://danielionut.ro#'.$_GET['id'].'> rdfs:label ?title;
							  :hasAuthor ?author;    
    						  :hasGenre ?genre;						  
   							  :hasComments ?anonym.
  		?anonym ?w ?q.
	}';
	
	print $clientUpdate->update($interogareUpdate);
}

?>