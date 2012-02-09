#kebaparis doc

##summary
Vor einem Jahr und 2 Tagen machten wir den ersten commit zum Projekt kebaparis. Ziel war es, eine schweizweite Dürüm Ranking Site auf die Beie zu stellen.

*project kockoff... =P 53cea5731f Browse code koma5 authored February 07, 2011*

*Ich versuche hier mal ein wenig den Ist-Zustand des Projekts zu beschreiben, da unser Vorhaben über das letzte Jahr x-mal eingeschlafen ist. Uns fehlt der Überblick über das was funktioniert und was nicht.*

##tech
Der HTML-Quellcode wird auf der Serverseite mit **php** zusammengebaut. Auf der Clientseite werden einzelne Sachen wie Tags auf der Seite mit **JavaScript** verändert. Es ist auch eine Version **jQuery** integriert.

##classes
###class user
In der user Klasse werden alle User spezifischen Aktionen gehandelt. Sei es Registration, Aktivierung der Registration Login, Logout und das ganze Session handling.


###class Database
in dieser Klasse wird der db-handler definiert. Wird ein Objekt der Klasse gemacht, wird das file db_config.php included, in welches in etwa so aussieht:
`<?php  
// db
$this->db_server = '127.0.0.1';
$this->db_user = '<username>';
$this->db_password = '<password>';
$this->db_name = 'kebap';  	
?>`
Die Klasse Database wird nicht in die anderen Klassen referenziert. Ein Abbild der Klasse wird immer dann gemacht, wenn danach ein db handler gebraucht wird. Gutes Beispiel ist die Seite usr.php.
####connect()
hier wird der db-handler *gemacht*
####quit()
hier wird der db-handler wieder gekillt. = NULL