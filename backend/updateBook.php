<?php session_start();
if (empty($_SESSION['email']))
	header('Location: loginfrontend.html');

require 'vendor/autoload.php';

header("Content-type:text/plain");

$clientUpdate = new EasyRdf\Sparql\Client('http://localhost:8080/rdf4j-server/repositories/grafexamen/statements');

	// actualizare comentariu
	$interogareUpdate = '
prefix : <http://danielionut.ro#> 
							
DELETE{
   <http://danielionut.ro#'.$_POST['id'].'> :hasComments ?z.
    ?z :userID <'.$_SESSION['userID'].'>;
	   :comment ?x.
}
INSERT{
  <http://danielionut.ro#'.$_POST['id'].'> :hasComments ?z.
     ?z :userID <'.$_SESSION['userID'].'>;
      :comment "'.$_POST['comment'].'".
}
WHERE{
<http://danielionut.ro#'.$_POST['id'].'> :hasComments ?z.
    ?z :userID <'.$_SESSION['userID'].'>;
	   :comment ?x.
}';

print $clientUpdate->update($interogareUpdate)->getStatus();	

?>