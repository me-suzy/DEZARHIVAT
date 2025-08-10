<%
'****************************************************************************************
'**  Copyright Notice    
'**
'**  Web Wiz Guide ASP Discussion Forum
'**                                                              
'**  Copyright 2001-2002 Bruce Corkhill All Rights Reserved.                                
'**
'**  This program is free software; you can modify (at your own risk) any part of it 
'**  under the terms of the License that accompanies this software and use it both 
'**  privately and commercially.
'**
'**  All copyright notices must remain in tacked in the scripts and the 
'**  outputted HTML.
'**
'**  You may use parts of this program in your own private work, but you may NOT
'**  redistribute, repackage, or sell the whole or any part of this program even 
'**  if it is modified or reverse engineered in whole or in part without express 
'**  permission from the author.
'**
'**  You may not pass the whole or any part of this application off as your own work.
'**   
'**  All links to Web Wiz Guide and powered by logo's must remain unchanged and in place
'**  and must remain visible when the pages are viewed unless permission is first granted
'**  by the copyright holder.
'**
'**  This program is distributed in the hope that it will be useful,
'**  but WITHOUT ANY WARRANTY; without even the implied warranty of
'**  MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE OR ANY OTHER 
'**  WARRANTIES WHETHER EXPRESSED OR IMPLIED.
'**
'**  You should have received a copy of the License along with this program; 
'**  if not, write to:- Web Wiz Guide, PO Box 4982, Bournemouth, BH8 8XP, United Kingdom.
'**    
'**
'**  No official support is available for this program but you may post support questions at: -
'**  http://www.webwizguide.info/forum
'**
'**  Support questions are NOT answered by e-mail ever!
'**
'**  For correspondence or non support questions contact: -
'**  info@webwizguide.com
'**
'**  or at: -
'**
'**  Web Wiz Guide, PO Box 4982, Bournemouth, BH8 8XP, United Kingdom
'**
'****************************************************************************************



'Function to romove icons and colurs to just leave plain text
Function ConvertToText(strMessage)

	'Remove the font colours, smilley graphics, images, hyperlinks
	strMessage = Replace(strMessage, " target=""_blank""", "", 1, -1, 1)
	strMessage = Replace(strMessage, " border=""0""", "", 1, -1, 1)
	strMessage = Replace(strMessage, "<font color=""black"">", "", 1, -1, 1)
	strMessage = Replace(strMessage, "<font color=""white"">", "", 1, -1, 1)
	strMessage = Replace(strMessage, "<font color=""blue"">", "", 1, -1, 1)
	strMessage = Replace(strMessage, "<font color=""red"">", "", 1, -1, 1)
	strMessage = Replace(strMessage, "<font color=""green"">", "", 1, -1, 1)
	strMessage = Replace(strMessage, "<font color=""yellow"">", "", 1, -1, 1)
	strMessage = Replace(strMessage, "<font color=""orange"">", "", 1, -1, 1)
	strMessage = Replace(strMessage, "<font color=""brown"">", "", 1, -1, 1)
	strMessage = Replace(strMessage, "<font color=""magenta"">", "", 1, -1, 1)
	strMessage = Replace(strMessage, "<font color=""cyan"">", "", 1, -1, 1)
	strMessage = Replace(strMessage, "<font color=""limegreen"">", "", 1, -1, 1)
	strMessage = Replace(strMessage, "<font color=black>", "", 1, -1, 1)
	strMessage = Replace(strMessage, "<font color=white>", "", 1, -1, 1)
	strMessage = Replace(strMessage, "<font color=blue>", "", 1, -1, 1)
	strMessage = Replace(strMessage, "<font color=red>", "", 1, -1, 1)
	strMessage = Replace(strMessage, "<font color=green>", "", 1, -1, 1)
	strMessage = Replace(strMessage, "<font color=yellow>", "", 1, -1, 1)
	strMessage = Replace(strMessage, "<font color=orange>", "", 1, -1, 1)
	strMessage = Replace(strMessage, "<font color=brown>", "", 1, -1, 1)
	strMessage = Replace(strMessage, "<font color=magenta>", "", 1, -1, 1)
	strMessage = Replace(strMessage, "<font color=cyan>", "", 1, -1, 1)
	strMessage = Replace(strMessage, "<font color=limegreen>", "", 1, -1, 1)
	strMessage = Replace(strMessage, "</font>", "", 1, -1, 1)	
	strMessage = Replace(strMessage, "<img src=""smileys/smiley1.gif"">", " :) ", 1, -1, 1)
	strMessage = Replace(strMessage, "<img src=""smileys/smiley2.gif"">", " ;) ", 1, -1, 1)
	strMessage = Replace(strMessage, "<img src=""smileys/smiley3.gif"">", " :o ", 1, -1, 1)
	strMessage = Replace(strMessage, "<img src=""smileys/smiley4.gif"">", " :D ", 1, -1, 1)
	strMessage = Replace(strMessage, "<img src=""smileys/smiley5.gif"">", " ", 1, -1, 1)
	strMessage = Replace(strMessage, "<img src=""smileys/smiley6.gif"">", " :( ", 1, -1, 1)
	strMessage = Replace(strMessage, "<img src=""smileys/smiley7.gif"">", " X( ", 1, -1, 1)
	strMessage = Replace(strMessage, "<img src=""smileys/smiley8.gif"">", " :o) ", 1, -1, 1)
	strMessage = Replace(strMessage, "<img src=""smileys/smiley9.gif"">", " :oops: ", 1, -1, 1)
	strMessage = Replace(strMessage, "<img src=""smileys/smiley10.gif"">", " :star: ", 1, -1, 1)
	strMessage = Replace(strMessage, "<img src=""smileys/smiley11.gif"">", " xx( ", 1, -1, 1)
	strMessage = Replace(strMessage, "<img src=""smileys/smiley12.gif"">", " |) ", 1, -1, 1)
	strMessage = Replace(strMessage, "<img src=""smileys/smiley13.gif"">", " :V: ", 1, -1, 1)
	strMessage = Replace(strMessage, "<img src=""smileys/smiley14.gif"">", " :^: ", 1, -1, 1)
	strMessage = Replace(strMessage, "<img src=""smileys/smiley15.gif"">", " }:) ", 1, -1, 1)
	strMessage = Replace(strMessage, "<img src=""smileys/smiley16.gif"">", " 8D ", 1, -1, 1)
	strMessage = Replace(strMessage, "<img src=""", " image: - ", 1, -1, 1)
	strMessage = Replace(strMessage, "<img src= """, " image: - ", 1, -1, 1)
	strMessage = Replace(strMessage, """>", "", 1, -1, 1)
	strMessage = Replace(strMessage, "<a href=""", "", 1, -1, 1)
	strMessage = Replace(strMessage, "<a href= """, "", 1, -1, 1)
	strMessage = Replace(strMessage, "</a>", "", 1, -1, 1)

	'Return the message with the icons and text colours removed
	ConvertToText = strMessage

End Function
%>