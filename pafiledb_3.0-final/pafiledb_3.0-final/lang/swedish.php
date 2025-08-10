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
  #Swedish/Svenska 
  #Översatt av Jakob Naredi - WannaSurf.to 
  ########## 

  ##########	
  #If you are translating this file, DO NOT translate anything in brackets, such as {something}, any variables ($something) or arrays #($something[somethingelse]), or HTML tags (<something></something>) or else parts of the script will not work
  #Also, do not delete any lines in this script
  ##########

*/

//Start Beta 2 Language File
$str[time] = "Alla tider är";
$str[power] = "Skapat av";
$str[exectime] = "Laddningstid";
$str[numqueries] = "MySQL Queries används";
$str[adminops] = "Admins val";
$str[mainpage] = "Förstasida";
$str[addcat] = "Lägg till kategori";
$str[editcat] = "Ändra kategori";
$str[delcat] = "Ta bort kategori";
$str[ordercat] = "Ändra ordning bland kategorierna";
$str[category] = "Kategori";
$str[files] = "Filer";
$str[jump] = "Kategorimeny";
$str[logged] = "Inloggad som";
$str[admincenter] = "Admin Center";
$str[logout] = "Logga ut";
$str[file] = "Fil";
$str[date] = "Lades till den";
$str[rating] = "Betyg";
$str[dls] = "Nerladdningar";
$str[email] = "E-mail filen till en kompis";
$str[emailinfo] = "Om du tror att din kompis gillar den här filen, kan du fylla i de här fälten så kommer informationen om den att skickas till din kompis!";
$str[yname] = "Ditt namn";
$str[yemail] = "Din E-mail";
$str[fname] = "Din kompis namn";
$str[femail] = "Din kompis E-mail";
$str[esub] = "Rubrik på ditt E-mail";
$str[etext] = " Texten i ditt E-mail";
$str[defaultmail] = "Jag tror att du är intreserad av att ladda ner en fil som finns på";
$str[semail] = "Skicka E-mail";
$str[msg] .= "Hej $friend[name],\n";
$str[msg] .= "$email[message]\n\n";
$str[msg] .= "----------\n";
$str[msg] .= "Det här mailet skickades via \"{dbname}\" fil databas. Webmastern för \"{dbname}\" fil databas tar inget ansvar för mailen skickade därifrån.";
$str[econf] = "Tack! Ditt mail skickades utan problem till $friend[name]'s e-mail addres.";
$str[editfile] = "Ändra fil";
$str[deletefile] = "Ta bort fil";
$str[desc] = "Beskrivning";
$str[creator] = "Skapare";
$str[version] = "Version";
$str[scrsht] = "Screenshot";
$str[docs] = "Dokumentation";
$str[lastdl] = "Last Download";
$str[never] = "Nyare";
$str[votes] = "röster";
$str[download] = "Ladda ner filen";
$str[rate] = "Betygsätt filen";
$str[license] = "License Avtal";
$str[licensewarn] = "Du måste godkänna det här license avtalet innan du kan fortsätta";
$str[iagree] = "Jag godkänner";
$str[dontagree] = "Jag godkänner inte";
$str[rerror] = "Tyvärr, du har redan betygsatt den här filen.";
$str[rateinfo] = "Du kommer att betygsätta <i>{filename}</i>. Fyll bara i vilket betyg du vill ge den. 1 är sämst och 10 är bäst.";
$str[rconf] = "Du har gett filen <i>{filename}</i> ett betyg på {rate}. Det ger den ett nytt betyg på $nrating {newrating}/10.";
$str[stats] = "Statistik";
$str[statstext] .= "Det finns nu  $num[files] filer i  $num[cats] kategorier<br>";
$str[statstext] .= "Den älsta filen är <a href=\"pafiledb.php?action=file&id= $oldest[file_id]\"> $oldest[file_name]</a><br>";
$str[statstext] .= "Den senaste filen är <a href=\"pafiledb.php?action=file&id= $newest[file_id]\"> $newest[file_name]</a><br>";
$str[statstext] .= "Den minst populära filen baserat på betyg är <a href=\"pafiledb.php?action=file&id= $lpopular[file_id]\"> $lpopular[file_name]</a> med ett betyg på $least/10<br>";
$str[statstext] .= "Den mest populära filen baserat på betyg är <a href=\"pafiledb.php?action=file&id= $popular[file_id]\"> $popular[file_name]</a> med ett betyg på  $most/10<br>";
$str[statstext] .= "Den minst populära filen baserat på antalet nedladdningar är <a href=\"pafiledb.php?action=file&id= $leastdl[file_id]\"> $leastdl[file_name]</a> med  $leastdl[file_dls] nedladdningar<br>";
$str[statstext] .= "Den mest populära filen baserat på antalet nedladdningar är <a href=\"pafiledb.php?action=file&id= $mostdl[file_id]\"> $mostdl[file_name]</a> med  $mostdl[file_dls] nedladdningar<br>";
$str[statstext] .= "Den totala mängden nedladdningar är  $totaldls[0] <br>";
$str[statstext] .= "Det genomsnittliga betyget är  $avg/10<br>";
$str[statstext] .= "Det genomsnittliga antalet neddladningar per fil är $avgdls<br>";
$str[search] = "Sök";
$str[results] = "Resultat för";
$str[nomatches] = "Sorry, no matches were found for";
$str[matches] = "matches were found for";
$str[sfor] = "Sök efter";
$str[viewall] = "Se alla filer";
$str[vainfo] = "Se alla filer i databasen";
$str[next] = "Nästa";
$str[prev] = "Förra";
$str[pagenums] = "Sidor";
//You have reached Line 100. If you're not tired now, you will be soon.
$str[acinfo] = "Välkommen till paFileDB 3 Admin Center. Du kan använda Admin Center för att editera fildatabasen och och ändra paFileDB inställningar. Välj en länk nedan för att editera databasen.";
$str[cmanage] = "Kategori editering";
$str[fmanage] = "Fil edtitering";
$str[cumanage] = "Egna fällt editering";
$str[lmanage]= "License editering";
$str[amanage] = "Admin konton editering";
$str[csettings] = "Ändra inställningar";
$str[asettings] = "Ditt kontos inställningar";
$str[utils] = "Användbarhet";
$str[aminfo] = "Du kan använda den här avdelningen av admin center för att lägga till, ändra, eller ta bort extra admin konton.";
$str[aadmin] = "Lägg till Admin";
$str[eadmin] = "Ändra Admin";
$str[dadmin] = "Ta bort Admin";
$str[un] = "Användarnamn";
$str[uninfo] = "Fyll i användarnamnet för det nya kontot här";
$str[aemail] = "E-mail";
$str[aemailinfo] = "Fyll i den admin's e-mail addres här";
$str[apass] = "Lösenord";
$str[apassinfo] = "Fyll i lösenordet för det nya admin kontot här";
$str[aeditperm] = "Ändra Adminkontots rättigheter";
$str[aeditperminfo] = "Välj om du vill att den nya admin kommer att kunna lägga till, ändra eller ta bort andra admin konton.";
$str[yes] = "Ja";
$str[no] = "Nej";
$str[aadderror] = "Det finns redan ett Admin konto med användarnamnet $form[username]";
$str[adminadded] = "Admin kontot <i>$form[username]</i> har lagts till!";
$str[changepass] = "Ändra lösenord";
$str[newpass] = "Nytt lösenord";
$str[editerror] = "Du valde inte något admin konto att ändra!";
$str[infochanged] = "Adminkontots information har ändrats!";
$str[passchanged] = "Adminkontots lösenord har ändrats!";
$str[delerror] = "Du valde inte några konton att ta bort!";
$str[deleted] = "De konton du valde har tagits bort.";
$str[cmaninfo] = "Du kan använda kategori editering i Admin Center för att lägga till, ändra, ta bort och ändra ordning på kategorier. För att kunna lägga till filer i databasen måste du minst ha en kategori. Du kan välja en länk nedan för att editera kategorier.";
$str[acat] = "Lägg till en kategori";
$str[ecat] = "Ändra en kategori";
$str[dcat] = "Ta bort en kategori";
$str[rcat] = "Ändra ordningen på kategorierna";
$str[catadded] = "Din nya kategori, <i>$form[name]</i> har lagts till!";
$str[catname] = "Kategorinamn";
$str[catnameinfo] = "Detta kommer att bli namnet på kategorin.";
$str[catdesc] = "Kategoribeskrivning";
$str[catdescinfo] = "Detta är beskrivningen av kategorin";
$str[catparent] = "Huvudkategori";
$str[catparentinfo] = "Om du vill att den här kategorin ska vara en underkategori, välj vilken kategori som den ska vara en underkategori till.";
$str[none] = "Ingen";
$str[catedited] = "Din kategori, <i>$form[name]</i> har editerats!";
$str[delfiles] = "Ta bort filer i kategori?";
$str[catsdeleted] = "Kategorin du valde har tagits bort.";
$str[cdelerror] = "Du valde inga kategorier att ta bort!";
$str[rcatinfo] = "Du kan ändra ordningen på kategorierna som de visas på förstasidan. För att ändra ordningen på kategorierna, Välj i vilken ordning de ska komma. 1 kommer att visas först, 2 kommer att visas tvåa, ect. Detta har ingen inverkan på underkategorier.";
$str[rcatdone] = "Kategoriernas ordning ändrades!";
$str[custominfo] = "Du kan använda egna fällt avdelningen på paFileDB admin center för att lägga till, ändra och ta bort egna fällt. Du kan använda egna fällt för att få ut mer information om filen. T.ex. kan du lägga till ett fällt där du berättar om filstroleken, du kan skapa ett nytt fällt och sen gå in i Ändra/Lägg till fil och sen skriva i informationen där.";
$str[afield] = "Lägg till fällt";
$str[efield] = "Ändra fällt";
$str[dfield] = "Ta bort fällt";
$str[fieldname] = "Fälltets namn";
$str[fieldnameinfo] = "Det här är namnet för fälltet, t.ex. filstorlek'";
$str[fielddesc] = "Fällt beskrivning";
$str[fielddescinfo] = "Det här är beskrivningen av fältet, t.ex. Filstorlek i mb.'";
$str[fieldadded] = "Ditt nya fällt, <i>$form[name]</i> har lagts till!";
$str[fieldedited] = "Ditt fällt, <i>$form[name]</i> har editerats!";
$str[dfielderror] = "Du har inte valt någpt fällt att ta bort!";
$str[fieldsdel] = "Ditt fält har tagits bort!";
$str[fmanageinfo] = "Du kan använda fil editerings avdelningen på paFileDB admin center För att lägga till, ändra eller ta bort filer.<br><b>Tips:</b> För att enkelt lägga till , ändra eller ta bort en fil, gå till den kategorin där du normalt skulle ha laddat ner filen. Där dyker det då upp länkar.";
$str[afile] = "Lägg till fil";
$str[efile] = "Edit File";
$str[dfile] = "Ta bort fil";
$str[upload] = "Ladda upp fil";
$str[uploadinfo] = "Ladda upp den här filen";
$str[uploaderror] = "Filen $userfile_name finns redan, byt namn och prova igen.";
$str[uploaddone] = "Filen $userfile_name haar laddats upp! UELn till filen är";
$str[uploaddone2] = "Klicka här för att klistra in URLn till lägg till fältet.";
$str[filename] = "Fil namn";
$str[filenameinfo] = "Det här är namnet på filen du lägger till, t.ex 'paFileDB 3' eller 'Bilspelet.'";
$str[filesd] = "Kort beskrivning";
$str[filesdinfo] = "Det här är den korta beskrivningen på spelet. Den kommer att vissas på kategorisidan tillsammans med alla andra filer, så den här beskrivningen ska vara kort";
$str[fileld] = "Lång beskrivning";
$str[fileldinfo] = "Det här är en längr beskrivning av spelet. Den kommer bara att visa på filens egna sida. Så den kan vara längre.";
$str[filecreator] = "Skapare";
$str[filecreatorinfo] = "Det här är namnet på skaparen av filen.";
$str[fileversion] = "Filen version";
$str[fileversioninfo] = "Det här är versionen av filen, t.ex. 3.0 or 1.3 Beta";
$str[filess] = "Screenshot URL";
$str[filessinfo] = "Det här är URLn till en screenshot på filen.";
$str[filedocs] = "Dokumentation/Manual URL";
$str[filedocsinfo] = "Det här är URLn till dockumentationen eller manualen för filen";
$str[fileurl] = "Nerladdnings URL";
$str[fileurlinfo] = "Det här är URLn till stället där filen kan laddas ner, du kan antingen fylla i adressen eller <a href=\"javascript:NewWindow('pafiledb.php?action=admin&ad=file&file=upload','fileupload','600','450','custom','front');\">ladda upp filen till servern</a>";
$str[filepi] = "Ikon";
$str[filepiinfo] = "Du kan välja en ikon som visas bredvid filens namn i kategorin.";
$str[filecat] = "Kategori";
$str[filecatinfo] = "Här väljer du i vilken kategori filen ska listas.";
$str[filelicense] = "License";
$str[filelicenseinfo] = "Här väljer du vilket license avtal som måste godkännas innan filen laddas upp.";
$str[filepin] = "Topp fil";
$str[filepininfo] = "Välj om du vill att filen ska vara en toppfil. Toppfiler visas alltod längst upp.";
$str[fileadded] = "Din nya fil, <i>$form[name]</i> har lagts till!";
$str[fileedited] = "YDin fil, <i>$form[name]</i> har ändrats!";
$str[fderror] = "Du valde ingen fil att ta bort!";
//You have reached Line 200. PHP Arena is not responsible for deaths related to sitting in front of your computer for a long time while translating this file.
$str[filesdeleted] = "The files you selected have been deleted!";
$str[lmanageinfo] = "You can use the license management section of the paFileDB admin center to add, edit, and delete license agreements. You can select a license for a file on the file add or edit page. If a file has a license agreement, a user will have to agree to it before downloading the file.";
$str[alicense] = "Add License";
$str[elicense] = "Edit License";
$str[dlicense] = "Delete License";
$str[lname] = "License Name";
$str[ltext] = "License Text";
$str[licenseadded] = "Your new license agreement, <i>$form[name]</i> has been added!";
$str[licenseedited] = "Din license, <i>$form[name]</i> har ändrats!";
$str[lderror] = "Du valde ingen license att ta bort!";
$str[ldeleted] = "Licenserna som du valde har tagits bort.";
$str[login] = "Logga in";
$str[username] = "Användarnamn";
$str[password] = "Lösenord";
$str[loggedin] = "Du har loggats in. <a href=\"pafiledb.php?action=admin&ad=main\">Klicka här</a> för att komma till admin center.";
$str[loginerror] = "Du har fyllt i ett ogiltigt användarnamn eller lösenord!";
$str[loggedout] = "Du har loggats ut.";
$str[changeemail] = "Ändra E-mail Addres";
$str[emailad] = "E-mail Addres";
$str[confpass] = "Repetera lösenord";
$str[nopermission] = "Tyvärr har du inte tillåtelse att besöka den här avdelningen.";
$str[emailchanged] = "Din e-mail addres har ändrats!";
$str[changepasserror] = "Dina lösenord du fyllde i matchade inte. Gå tillbaka och ändra dem.";
$str[yourpasschanged] = "Ditt lösenord har ändrats!";
$str[dbname] = "Databas  namn";
$str[dbnameinfo] = "Det här är namnet på databasen, t.ex. 'Windows program'";
$str[dbdesc] = "Databas beskrivning";
$str[dbdescinfo] = "Här är beskrivningen över filerna i data basen, t.ex. 'Nyttiga Windows program";
$str[dburl] = "Databas URL";
$str[dburlinfo] = "Det här är URLn stället där paFileDB är instalerat";
$str[topnum] = "Topp Nummer";
$str[topnuminfo] = "Här väljer du hur många filer som ska visas i Topp X nedladdningar listan";
$str[hpurl] = "Hemside URL";
$str[hpurlinfo] = "Här är adressen till din hemsida";
$str[nfdays] = "Nya filer dagar";
$str[nfdaysinfo] = "hur många dagar kommer dina filer att markeras med en NY FIL ikon?";
$str[timeoffset] = "Tidszone";
$str[timeoffsetinfo] = "Om servern är placerad i ett nnat land kan du här ändra tidsinställningarna så att de passar in på din sida.";
$str[tz] = "Tids Zone";
$str[tzinfo] = "Här är tidszonen som kommer att användas";
$str[header] = "Header";
$str[headerinfo] = "Header filen kommer att visas före paFileDB koden visas";
$str[footer] = "Footer";
$str[footerinfo] = "Footer filen kommer att visas efter paFileDB koden visas.";
$str[styleset] = "Style inställning";
$str[stylesetinfo] = "Välj vilken style som du vill använda";
$str[stats2] = "Visa statistik";
$str[statsinfo] = "Välj om du vill visa laddningstiderna förscriptet (Totalt antal MySQL queries och hur lång tid det tog för scriptet att köra)";
$str[settingschanged] = "Dina paFileDB inställningar har ändrats!";
$str[lang] = "Språk fil";
$str[langinfo] = "Välj vilket språk som ska användas.";

//Start Beta 2.1 Language File
$str[settings] = "Inställningar";
$str[pafdbsettings] = "paFileDB inställningar";

//Start Beta 3 Language File
$str[sortby] = "Sortera efter"; 
$str[sort] = "Sort"; 
$str[name] = "Namn"; 
$str[bdb] = "Gör en Backup"; 
$str[rdb] = "Lägg tillbaks databas"; 
$str[rdbinfo] = "Du kan lägga upp en backup som du har gjort tidigare. <b>OBS:</b> Det kommer att ta bort allt som finns nu, inklusive admin sektionen!<p>Välj en filen som backupen ligger på:"; 
$str[rdbdone] = "Din gammla databas har lagts upp igen! Om informationen om admin är annoöunda i den här databasen måste du logga in på nytt."; 
$str[home] = "Hemsida"; 
?>