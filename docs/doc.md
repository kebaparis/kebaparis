#kebaparis doc

##summary
Vor einem Jahr und 2 Tagen machten wir den ersten commit zum Projekt kebaparis. Ziel war es, eine schweizweite Dürüm Ranking Site auf die Beie zu stellen.

>project kockoff... =P 53cea5731f koma5 authored February 07, 2011

*Ich versuche hier mal ein wenig den Ist-Zustand des Projekts zu beschreiben, da unser Vorhaben über das letzte Jahr x-mal eingeschlafen ist. Uns fehlt der Überblick über das was funktioniert und was nicht.*

##tech
Der HTML-Quellcode wird auf der Serverseite mit **php** zusammengebaut. Auf der Clientseite werden einzelne Sachen wie Tags auf der Seite mit **JavaScript** verändert. Es ist auch eine Version **jQuery** integriert.

## DB

to look at the ERD go to http://5th.li/erd and paste in the docs/erd.xml and hit **load xml**

##classes
###class user
In der user Klasse werden alle User spezifischen Aktionen gehandelt. Sei es Registration, Aktivierung der Registration Login, Logout und das ganze Session handling.
####printUser()
ist für Entwicklungszwecke. Echoed alle Parameter des user aus.

####updateFromDB()
sollte alle Parameter aus der DB im user objekt speichern. Wurde erstllt, weil bei jedem Request an der Server ist das Objekt des vorherigen Request wieder wegg. Objekt = flüchtig
**Idee: wir könnten das komplette Userobject in der Session speichern**

####registrationPossible()
überprüft ob sich der User registrieren darf.
Zeitabstände zwischen den Registrationen von einer bestimmten IP-Adresse

+ Username bereits vergeben
+ E-Mail bereits vergeben

returned error code {0, 10, 11, 12, 13}
diese werden in der näcgsten Funktion geparsed

####register()
nimmt die neue Email Adresse und das neue Passwort entgegen. Der Username wird beim erstellen des Objektes übergeben. Ruft die Funktionen registrationPossible(), generateHash() und senActivationEmail() auf.
**Zum Schluss werden die Errorcodes noch als Text ausgeben.
Muss anderst funktionieren!**

####checkActivationDB()
returned true of false wenn der User in der DB aktiv ist oder nicht.

####sendActivationEmail()
versendet mit der Hilfe von der externen Funktion senEmail() das Registrationsemail mit Aktivierungslink. Dieser Link wird in der DB beim user hinterlegt.

####generateHash($plainText, $salt)
generiert den Hash zum user passwort inkl. Salt. Returns salt and md5(salt+password)

####checkActivationLink($linkSent)
vergleicht den link der als Parameter übergeben wird mit dem in der db. Ist es derselbe wird der user auf aktiv gesetzt.

####checkUserDB() *besserer name!*

####createSession()
böööööhhhh keine Ahnung =O

####makeSessionUsable()
setzt dass session-logedin flag auf true und speichert den usernamen in der Session

...

***diese Klasse hat zu viele Funktionen!! =@***


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
