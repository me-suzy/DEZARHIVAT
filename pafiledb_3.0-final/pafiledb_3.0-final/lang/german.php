<?php
/*
  paFileDB 3.0
  ©2001 PHP Arena
  Written by Todd
  todd@phparena.uni.cc
  http://www.phparena.uni.cc
  Keep all copyright links on the script visible
  Please read the license included with this script for more information.

  ##########
  #paFileDB 3.0 Language File
  #German
  #Translated by Bobbi
  ##########

  ##########	
  #If you are translating this file, DO NOT translate anything in brackets, such as {something}, any variables ($something) or arrays #($something[somethingelse]), or HTML tags (<something></something>) or else parts of the script will not work
  #Also, do not delete any lines in this script
  ##########

*/

//Start Beta 2 Language File
$str[time] = "Alle Zeiten sind";
$str[power] = "Powered by";
$str[exectime] = "Benötigte Ausführungszeit";
$str[numqueries] = "Benutzte MySQL Queries";
$str[adminops] = "Admin Optionen";
$str[mainpage] = "Startseite";
$str[addcat] = "Neue Kategorie";
$str[editcat] = "Änderen Kategorie";
$str[delcat] = "Löschen Kategorie";
$str[ordercat] = "Sortiere Kategorien";
$str[category] = "Kategorie";
$str[files] = "Dateien";
$str[jump] = "Category Jump";
$str[logged] = "Angemeldet als";
$str[admincenter] = "Admin Center";
$str[logout] = "Abmelden";
$str[file] = "Datei";
$str[date] = "Hinzugefügt am";
$str[rating] = "Bewertung";
$str[dls] = "Downloads";
$str[email] = "Sende Datei zu einem Freund";
$str[emailinfo] = "Wenn du einem Freund über diese Datei informieren willst, kannst du dieses Formular ausfüllen und absenden. Dein Freund erhält dann eine E-Mail von uns mit Informationen und einem Link zu dieser Datei!";
$str[yname] = "Dein Name";
$str[yemail] = "Deine E-Mail Adresse";
$str[fname] = "Name deines Freundes";
$str[femail] = "E-mail deines Freundes";
$str[esub] = "E-mail Betreff";
$str[etext] = "E-mail Text";
$str[defaultmail] = "Ich dachte mir du könntest dich für die Datei, welche du bei untenstehender Adresse downloaden kannst, interressieren.";
$str[semail] = "Sende E-mail";
$str[msg] .= "Hallo $friend[name],\n";
$str[msg] .= "$email[message]\n\n";
$str[msg] .= "----------\n";
$str[msg] .= "Diese E-Mail wurde von der \"{dbname}\" Datenbank aus versendet. Der webmasters der \"{dbname}\" Download Datenbank übernimmt keine Verantwortung für die E-Mails, welche durch diese Datenbank versendet werden.";
$str[econf] = "Danke schön! Deine E-Mail wurde an die Adresse $friend[name] verschickt.";
$str[editfile] = "Editiere Datei";
$str[deletefile] = "Lösche Datei";
$str[desc] = "Beschreibung";
$str[creator] = "Erstellt von";
$str[version] = "Version";
$str[scrsht] = "Screenshot";
$str[docs] = "Dokumentation";
$str[lastdl] = "Letzter Download";
$str[never] = "Nie";
$str[votes] = "Bewertungen";
$str[download] = "Download!";
$str[rate] = "Bewerte Datei";
$str[license] = "Lizenzvertrag";
$str[licensewarn] = "Du mußt dem Lizenzvertrag zustimmen um diese Datei herunterladen zu können.";
$str[iagree] = "Ich stimme zu";
$str[dontagree] = "Ich stimme nicht zu";
$str[rerror] = "Entschuldige, aber du hast diese Datei schon einmal bewertet.";
$str[rateinfo] = "Du bewertest jetzt die Datei <i>{filename}</i>. Bitte wähle unten die entsprechende Bewertung aus. 1 ist die schlechteste, 10 die beste.";
$str[rconf] = "Du hast <i>{filename}</i> mit {rate} bewertet. Zusammen mit den anderen Bewertungen ändert dies die Gesamtwertung zu $nrating {newrating}/10.";
$str[stats] = "Statistiken";
$str[statstext] .= "Es gibt $num[files] Dateien in insgesamt  $num[cats] Kategorien.<br>";
$str[statstext] .= "Die älteste Datei ist <a href=\"pafiledb.php?action=file&id= $oldest[file_id]\"> $oldest[file_name]</a><br>";
$str[statstext] .= "Die neueste Datei ist <a href=\"pafiledb.php?action=file&id= $newest[file_id]\"> $newest[file_name]</a><br>";
$str[statstext] .= "Die am unbeliebteste Datei basierend auf den Bewertungen ist <a href=\"pafiledb.php?action=file&id= $lpopular[file_id]\"> $lpopular[file_name]</a> with a rating of $least/10<br>";
$str[statstext] .= "Die beliebteste Datei basierend auf den Bewertungen ist <a href=\"pafiledb.php?action=file&id= $popular[file_id]\"> $popular[file_name]</a> with a rating of  $most/10<br>";
$str[statstext] .= "Die am unbeliebteste Datei basierend auf den Downloads ist <a href=\"pafiledb.php?action=file&id= $leastdl[file_id]\"> $leastdl[file_name]</a> with  $leastdl[file_dls] downloads<br>";
$str[statstext] .= "Die beliebteste Datei besierend auf den Downloads ist <a href=\"pafiledb.php?action=file&id= $mostdl[file_id]\"> $mostdl[file_name]</a> with  $mostdl[file_dls] downloads<br>";
$str[statstext] .= "Insgesamt wurden bis jetzt $totaldls[0] Dateien heruntergeladen.<br>";
$str[statstext] .= "Die Durchschnittliche Bewertung ist $avg/10<br>";
$str[statstext] .= "Durchschnittlich wurde jede Datei $avgdls heruntergeladen.<br>";
$str[search] = "Suchen";
$str[results] = "Ergebnisse für ";
$str[nomatches] = "Sorry, keine Einträge wurde gefunden für";
$str[matches] = "Einträge gefunden";
$str[sfor] = "Suche nach";
$str[viewall] = "Zeige alle Dateien";
$str[vainfo] = "Zeige alle Dateien in der Datenbank";
$str[next] = "Vor";
$str[prev] = "Zurück";
$str[pagenums] = "Seiten";
//You have reached Line 100. If you're not tired now, you will be soon.
$str[acinfo] = "Willkommen im paFileDB 3 Admin Center. Du kannst das Admin Center benutzen um deine Downloads zu verwalten, oder um die Einstellungen für selbige zu verändern. Wähle einen der obigen Links um deine Datenbank zu verwalten.";
$str[cmanage] = "Kategorien Verwaltung";
$str[fmanage] = "Dateiverwaltung";
$str[cumanage] = "Eigene Felder verwalten";
$str[lmanage]= "Lizenzen verwalten";
$str[amanage] = "Admin Accounts verwalten";
$str[csettings] = "Ändere Einstellungen";
$str[asettings] = "Dein Account";
$str[utils] = "Utilities";
$str[aminfo] = "In diesem Bereich des Admin Centers kannst du weitere Admin accounts hinzufügen, editieren oder löschen.";
$str[aadmin] = "Füge Admin hinzu";
$str[eadmin] = "Editiere Admin";
$str[dadmin] = "Lösche Admin";
$str[un] = "Benutzername";
$str[uninfo] = "Gebe den Benutzernamen für den neuen Account hier ein";
$str[aemail] = "Admins E-mail Addresse";
$str[aemailinfo] = "Gebe die E-Mail Adresse des Admins hier ein";
$str[apass] = "Passwort";
$str[apassinfo] = "Gib das Passwort für den neuen Admin Account hier ein. Dieses kann jederzeit wieder geändert werden";
$str[aeditperm] = "Ändere Zugriffsrechte";
$str[aeditperminfo] = "Soll der neue Admin in der Lage sein, andere Admins hinzuzufügen, löschen oder editieren ?";
$str[yes] = "Ja";
$str[no] = "Nein";
$str[aadderror] = "Es gibt bereits einen Admin mit dem Benutzernamen $form[username]";
$str[adminadded] = "Der Admin <i>$form[username]</i> wurde hinzugefügt !";
$str[changepass] = "Ändere Passwort";
$str[newpass] = "Neues Passwort";
$str[editerror] = "Du hast keinen Admin zum editieren ausgewählt!";
$str[infochanged] = "Die Infos des Administrators wurden geändert.";
$str[passchanged] = "Das Admin Passwort wurde geändert!";
$str[delerror] = "Du hast keinen Admin zum löschen ausgewählt!";
$str[deleted] = "Die ausgewählten Admins wurden gelöscht.";
$str[cmaninfo] = "In diesem Bereich des Admin Centers kannst du Kategorien hinzufügen, editieren oder löschen.";
$str[acat] = "Neue Kategorie";
$str[ecat] = "Ändere Kategorie";
$str[dcat] = "Lösche Kategorie";
$str[rcat] = "Sortiere Kategorien";
$str[catadded] = "Die Kategorie <i>$form[name]</i> wurde zur Datenbank hinzugefügt.";
$str[catname] = "Kategorie Name";
$str[catnameinfo] = "Der Name der neuen Kategorie.";
$str[catdesc] = "Kategorie Beschreibung";
$str[catdescinfo] = "Eine Beschreibung der Dateien in dieser Kategorie";
$str[catparent] = "Übergeordnete Kategorie";
$str[catparentinfo] = "Wenn du willst das diese Kategorie eine untergeordnete Kategorie wird, wähle eine Kategorie unter der diese hinzugefügt werden soll.";
$str[none] = "Keine";
$str[catedited] = "Die Kategorie <i>$form[name]</i> wurde erfolgreich aktualisiert!";
$str[delfiles] = "Lösche Dateien in Kategorie?";
$str[catsdeleted] = "Die ausgewählten Kategorien wurden gelöscht.";
$str[cdelerror] = "Du hast keine Kategorien zum löschen ausgewählt!";
$str[rcatinfo] = "Du kannst die Kategorien sortieren, um die Reihenfolge, in der sie auf der Startseite angezeigt werden, zu ändern. Um die Kategorien zu sortieren, ändere die Nummern in die Reihenfolge, in der sie erscheinen sollen. 1 wird als erstes angezeigt, 2 als zweites usw. Untergeordnete Kategorien werden nicht beeinträchtigt.";
$str[rcatdone] = "Die Kategorien wurden neu sortiert!";
$str[custominfo] = "In diesem Bereich des Admin Centers kannst du eigene Felder in der Datenbank hinzufügen, verändern und löschen. In einem eigenen Feld kannst du weitere Informationen über die Datei einfügen, wie z.B. Infos über die Dateigröße. Diese Felder werden dann auf den Hinzufügen und Editieren Seiten angezeigt und können verändert werden.";
$str[afield] = "Neues Feld";
$str[efield] = "Ändere Feld";
$str[dfield] = "Lösche Feld";
$str[fieldname] = "Feldname";
$str[fieldnameinfo] = "Dies ist der Name des Feld, z.B. 'Dateigröße'";
$str[fielddesc] = "Feldbeschreibung";
$str[fielddescinfo] = "Dies ist die Beschreibung für das Feld, z.B. 'Dateigröße in MB'";
$str[fieldadded] = "Das neue Feld <i>$form[name]</i> wurde zur Datenbank hinzugefügt!";
$str[fieldedited] = "Das Feld <i>$form[name]</i> wurde erfolgreich verändert!";
$str[dfielderror] = "Du hast keine Felder zum löschen ausgewählt!";
$str[fieldsdel] = "Die ausgewählten Felder wurden gelöscht!";
$str[fmanageinfo] = "In diesem Bereich des Admin Centers können Dateien hinzugeügt, geändert und gelöscht werden.<br><b>Tip:</b> Um schnell und einfach eine Datei zu editieren oder zu löschen, log dich als Admin ein und durchsuche deine Downloaddatenbank wie ein normaler Benutzer. Wenn du die betreffende Informationsseite gefunden hast, wirst du links zum ändern und zum löschen dort vorfinden.";
$str[afile] = "Neue Datei";
$str[efile] = "Ändere Datei";
$str[dfile] = "Lösche Datei";
$str[upload] = "Lade Datei auf Server";
$str[uploadinfo] = "Hochladen";
$str[uploaderror] = "Die Datei $userfile_name existiert bereits auf dem Server. Bitte benenne sie um und versuche es erneut.";
$str[uploaddone] = "Die Datei $userfile_name wurde erfolgreich auf den Server geladen. Die Adresse zu dieser Datei ist";
$str[uploaddone2] = "Klicke hier um diesen Link in das Downloadfeld zu kopieren.";
$str[filename] = "Dateiname";
$str[filenameinfo] = "Dies ist der Name der Datei, die du hinzufügst, z.B. 'paFileDB 3' oder 'Mein Bild'.";
$str[filesd] = "Kurze Beschreibung";
$str[filesdinfo] = "Dies ist eine kurze Beschreibung der Datei. Sie wird auf der Seite, welche alle Dateien der jeweiligen Kategorie auflistet, erscheinen. Deshalb sollte sie möglichst kurz sein";
$str[fileld] = "Lange Beschreibung";
$str[fileldinfo] = "Dies ist die lange Beschreibung der Datei. Sie wird auf der Informationsseite über diese Datei erscheinen, und kann daher beliebig lang sein";
$str[filecreator] = "Programmierer/Autor";
$str[filecreatorinfo] = "Dies ist der Name des Erstellers dieser Datei";
$str[fileversion] = "Version";
$str[fileversioninfo] = "Dies ist die Versionsnummer der Datei, z.B. 3.0 oder 1.3 Beta";
$str[filess] = "Screenshot";
$str[filessinfo] = "Dies ist die Adresse zu einem Screenshot der Datei. Wenn du z.B. einen WinAmp Skin hinzufügst, würde hier die Adresse zu einem Screenshot von eben selbigem hinkommen";
$str[filedocs] = "Dokumentation/Anleitung";
$str[filedocsinfo] = "Dies ist die Adresse zur Dokumentation dieser Datei";
$str[fileurl] = "Download Adresse";
$str[fileurlinfo] = "Dies ist die Adresse zu der Datei die heruntergeladen werden soll. Sie kann entweder von hand eingegeben werden oder sie <a href=\"javascript:NewWindow('pafiledb.php?action=admin&ad=file&file=upload','fileupload','600','450','custom','front');\">direkt auf den Server laden</a>";
$str[filepi] = "Post Symbol";
$str[filepiinfo] = "Du kannst ein Symbol für diese Datei auswählen. Dieses wird in der Liste direkt neben der Datei angezeigt.";
$str[filecat] = "Kategorie";
$str[filecatinfo] = "Dies ist die Kategorie in welche die Datei gehört";
$str[filelicense] = "Lizenz";
$str[filelicenseinfo] = "Dies ist die Lizenz, zu welcher der Benutzer seine Zustimmung geben muß bevor er die Datei herunterladen kann";
$str[filepin] = "Markiere Datei";
$str[filepininfo] = "Wähle hier, ob du die Datei markieren willst oder nicht. Markierte Dateien werden immer an der Spitze der Dateiliste angezeigt";
$str[fileadded] = "Die Datei <i>$form[name]</i> wurde erfolgreich hinzugefügt!";
$str[fileedited] = "Die Datei <i>$form[name]</i> wurde erfolgreich editiert!";
$str[fderror] = "Du hast keine Dateien zum löschen ausgewählt!";
//You have reached Line 200. PHP Arena is not responsible for deaths related to sitting in front of your computer for a long time while translating this file.
$str[filesdeleted] = "Die ausgewählten Dateien wurden erfolgreich entfernt!";
$str[lmanageinfo] = "In diesem Bereich des Admin Centers können Lizenzen hinzugefügt, verändert oder entfernt werden. Wenn eine Datei eine Lizenzbestimmung hat, muß der Benutzer dieser zustimmen bevor er die Datei herunterladen kann.";
$str[alicense] = "Neue Lizenz";
$str[elicense] = "Ändere Lizenz";
$str[dlicense] = "Lösche Lizenz";
$str[lname] = "Lizenzname";
$str[ltext] = "Lizenz Text";
$str[licenseadded] = "Die Lizenz <i>$form[name]</i> wurde erfolgreich hinzugefügt!";
$str[licenseedited] = "Die Lizenz <i>$form[name]</i> wurde erfolgreich verändert!";
$str[lderror] = "Du hast keine Lizenz zum löschen ausgewählt!";
$str[ldeleted] = "Die ausgewählten Lizenzen wurden erfolgreich gelöscht.";
$str[login] = "Login";
$str[username] = "Benutzername";
$str[password] = "Passwort";
$str[loggedin] = "Login erfolgreich. <a href=\"pafiledb.php?action=admin&ad=main\">Klicke hier</a> um zum Admin Center zu kommen.";
$str[loginerror] = "Du hast entweder einen falschen Benutzernamen oder ein falsches Passwort eingegeben!";
$str[loggedout] = "Du wurdest erfolgreich ausgeloggt.";
$str[changeemail] = "Ändere E-Mail Adresse";
$str[emailad] = "E-mail Addresse";
$str[confpass] = "Bestätige Passwort";
$str[nopermission] = "Du hast leider keinen Zugriff zu diesem Bereich des Admin Centers.";
$str[emailchanged] = "Deine E-Mail Adresse wurde geändert!";
$str[changepasserror] = "Das Passwort und die 2. Eingabe stimmen nicht überein. Bitte überprüfe die Eingabe.";
$str[yourpasschanged] = "Das Passwort wurde erfolgreich geändert!";
$str[dbname] = "Datenbank Name";
$str[dbnameinfo] = "Dies ist der Name der Datenbank, z.B. 'Windows Registry Hacks'";
$str[dbdesc] = "Datenbank Beschreibung";
$str[dbdescinfo] = "Dies ist die Beschreibung der Dateien in der Datenbank, z.B. 'Registry hacks die Windows brauchbar machen'";
$str[dburl] = "Datenbank Adresse";
$str[dburlinfo] = "Dies ist die Adresse zu dem Verzeichnis, in welchem paFileDB installiert wurde.";
$str[topnum] = "Anzahl Top Dateien";
$str[topnuminfo] = "Dies ist die Anzahl der Dateien, die auf der Seite mit den beliebtesten Downloads angezeigt wird.";
$str[hpurl] = "Homepage Adresse";
$str[hpurlinfo] = "Die Adresse deiner Homepage";
$str[nfdays] = "'Neue Datei' Dauer";
$str[nfdaysinfo] = "Bezeichnet, Wie viele Tage eine Datei mit dem 'Neue Datei' Symbol angezeigt wird";
$str[timeoffset] = "Zeitzonen Abweichung";
$str[timeoffsetinfo] = "Dies ist die Abweichung der Zeitzonen. Wenn der Server z.B. an der Ostküste steht, du die Zeit aber lieber als 'Central Time' anzeigen willst, müsste in das Feld -1 eingetragen werden.";
$str[tz] = "Zeitzone";
$str[tzinfo] = "Der Name der Zeitzone, die angezeigt wird.";
$str[header] = "Kopfzeile";
$str[headerinfo] = "Die Kopfzeile wird angezeigt, bevor der Inhalt der Datenbank ausgegeben wird";
$str[footer] = "Fußzeile";
$str[footerinfo] = "Die Fußzeile wird angezeigt, nachdem der komplette Inhalt der Datenbank ausgegeben wurde.The footer file is shwon after the paFileDB output is shown.";
$str[styleset] = "Grafikset";
$str[stylesetinfo] = "Wähle das Grafikset das du für die Ausgabe benutzen willst";
$str[stats2] = "Zeige Statistiken";
$str[statsinfo] = "Wähle hier, ob du Statistiken über die Ausführungszeit des Scrips anzeigen willst (Gesamte Anzahl der MySQL queries und wie lange es dauerte diese auszuführen)";
$str[settingschanged] = "Die neuen paFileDB Einstellungen wurden gespeichert!";
$str[lang] = "Sprachdatei";
$str[langinfo] = "Wähle die Sprache, welche du benutzen willst";

//Start Beta 2.1 Language File
$str[settings] = "Einstellungen"; 
$str[pafdbsettings] = "paFileDB Einstellungen"; 

//Start Beta 3 Language File
$str[sortby] = "Sortieren nach"; 
$str[sort] = "Sortieren"; 
$str[name] = "Name"; 
$str[bdb] = "Sichere datenbank"; 
$str[rdb] = "Stelle Datenbank wieder her"; 
$str[rdbinfo] = "Du kannst eine paFileDB, von der du vorher ein Backup gemacht hast wieder herstellen. <b>HINWEIS:</b> Dies wird alles in deiner Datenbank, inklusive den Informationen über den Admin!<p>Wähle eine Datei zum wiederherstellen:"; 
$str[rdbdone] = "Deine Datenbank wurde wieder hergestellt. Wenn die Admin Informationen in dieser Datenbank anders sind als in der alten, dann mußt du dich neu einloggen."; 
$str[home] = "Homepage"; 
?>