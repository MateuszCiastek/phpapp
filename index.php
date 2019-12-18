<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Kotłownia</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
a {text-decoration: none;}
table, th, td {border: 0px solid black;}
.buttonHolder{ text-align: center;}
h1 {font-family: monospace;font-size: 15px;font-style: normal;font-variant: normal;font-weight: 500;line-height: 20px;}
input[type=submit] {width: 8em;  height: 2em;}
</style>
</head>
<body bgcolor="#000000" text="#909090" link="#E0E0E0" vlink="#E0E0E0">
<?php
/* index.php */
require_once('soap/lib/nusoap.php');
$wsdl = 'http://127.0.0.1/soap/index.php?wsdl';
$client = new nusoap_client($wsdl, 'wsdl');
$params = array('time_format' => 'Y-m-d D H:i:s T');
$response1 = $client->call('getTime', $params);
echo('WSDL Time: '. $response1);
?><br><br>

Uptime: <?php echo shell_exec ("uptime");?><br>
PHP Today: <?php echo date('Y-m-d H:i:s T');?><br>
PHP Your IP: <?php echo $_SERVER["REMOTE_ADDR"];?><br>
PHP Your hostname: <?php echo gethostbyaddr($_SERVER['REMOTE_ADDR']);?><br><br>

<a href="soap">SOAP</a><br><br>
</body>
</html>

