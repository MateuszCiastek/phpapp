<?php
/* index.php */
require_once("lib/nusoap.php");
// załączamy bibliotekę nuSOAP

$server = new soap_server(); // tworzymy nowy obiekt serwera SOAP
$namespace = 'dodomu.ddns.net'; // definiujemy przestrzeń nazw dla XML

$server->configureWSDL('mySOAP', $namespace);  // konfigurujemy nową usługę
$server->wsdl->schemaTargetNamespace = $namespace; // przypisujemy namespace do struktury tworzonego schematu WSDL

// rejestrujemy metodę
$server->register("getTime"                     
                 ,array('time_format'=>'xsd:string')
                 ,array('return'=>'xsd:string')
                 ,$namespace
                 ,false
                 ,'rpc'
                 ,'encoded'
                 ,'To jest nasza testowa metoda zwracająca czas na serwerze'
                  );
                
// definiujemy metodę                 
function getTime($time_format)
{
  $result = date($time_format); 
  return new soapval('return', 'xsd:string', $result);
}

// odbieramy żądanie
$postdata = file_get_contents("php://input");
$postdata = isset($postdata) ? $postdata : '';

// startujemy usługę
$server->service($postdata);
?>
