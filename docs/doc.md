#kebaparis doc

##summary
Vor einem Jahr und 2 Tagen machten wir den ersten commit zum Projekt kebaparis. Ziel war es, eine schweizweite Dürüm Ranking Site auf die Beie zu stellen.

*project kockoff... =P 53cea5731f Browse code koma5 authored February 07, 2011*

*Ich versuche hier mal ein wenig den Ist-Zustand des Projekts zu beschreiben, da unser Vorhaben über das letzte Jahr x-mal eingeschlafen ist. Uns fehlt der Überblick über das was funktioniert und was nicht.*

##tech
Der HTML-Quellcode wird auf der Serverseite mit **php** zusammengebaut. Auf der Clientseite werden einzelne Sachen wie Tags auf der Seite mit **JavaScript** verändert. Es ist auch eine Version **jQuery** integriert.

##classes
###class user
In der user Klasse werden alle User spezifischen Aktionen gehandelt. Sei es Registration, aktivierung der Registration Login, Logout und das ganze Session handling
####methods