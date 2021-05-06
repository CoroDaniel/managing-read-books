<?php session_start();

if (empty($_SESSION['email']))
	header('Location: loginfrontend.html');

require 'vendor/autoload.php';

header("Content-type:application/json");

$client = new EasyRdf\Sparql\Client('http://localhost:8080/rdf4j-server/repositories/graftest');
$deTrimis = array();

$interogare='PREFIX : <http://danielionut.ro#>

SELECT ?opera ?title ?author ?genre ?comment WHERE
{
    <'.$_SESSION['userID'].'> :likes ?opera.
	?opera rdfs:label ?title;
    		:hasAuthor ?author;
    		:hasGenre ?genre.	
?opera :hasComments ?z.
    ?z :userID <'.$_SESSION['userID'].'>;
    :comment ?comment.
}';
$rezultat = $client->query($interogare);

foreach($rezultat as $rez)
{
	array_push($deTrimis, array('id' => ''.$rez->opera,
	'title'=>''.$rez->title,
	'author'=>''.$rez->author,
	'genre'=>''.$rez->genre,
	'comment'=>''.$rez->comment));
}
echo json_encode($deTrimis);

?>