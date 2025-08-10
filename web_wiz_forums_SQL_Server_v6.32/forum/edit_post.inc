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


Dim strMessage			'Holds the message to be edited
Dim strTempMessageQuote		'Temporary word hold for the first line of a quote
Dim strMessageQuote		'Holds the new first line of a quote
Dim lngQuoteStartPos		'Holds the start position for a quote
Dim lngQuoteEndPos		'Holds the end position of a quote
Dim strTempMessageLink		'Temporary word hold for e-mail and url words
Dim strMessageLink		'Holds the new mesage link that needs converting back into code
Dim lngLinkStartPos		'Holds the start position for a link
Dim lngLinkEndPos		'Holds the end position for a word


strMessage = Replace(strMessage, " target=""_blank""", "", 1, -1, 1)
strMessage = Replace(strMessage, " border=""0""", "", 1, -1, 1)
strMessage = Replace(strMessage, "<img src= """, "<img src=""", 1, -1, 1)
strMessage = Replace(strMessage, "<a href= """, "<a href=""", 1, -1, 1)

'Change the path to the emotion symbols back into the emotion codes
strMessage = Replace(strMessage, "<img src=""smileys/smiley1.gif"">", "[:)]", 1, -1, 1)
strMessage = Replace(strMessage, "<img src=""smileys/smiley2.gif"">", "[;)]", 1, -1, 1)
strMessage = Replace(strMessage, "<img src=""smileys/smiley3.gif"">", "[:o]", 1, -1, 1)
strMessage = Replace(strMessage, "<img src=""smileys/smiley4.gif"">", "[:D]", 1, -1, 1)
strMessage = Replace(strMessage, "<img src=""smileys/smiley5.gif"">", "[:errr:]", 1, -1, 1)
strMessage = Replace(strMessage, "<img src=""smileys/smiley6.gif"">", "[:(]", 1, -1, 1)
strMessage = Replace(strMessage, "<img src=""smileys/smiley7.gif"">", "[:x]", 1, -1, 1)
strMessage = Replace(strMessage, "<img src=""smileys/smiley8.gif"">", "[:o)]", 1, -1, 1)
strMessage = Replace(strMessage, "<img src=""smileys/smiley9.gif"">", "[:oops:]", 1, -1, 1)
strMessage = Replace(strMessage, "<img src=""smileys/smiley10.gif"">", "[:star:]", 1, -1, 1)
strMessage = Replace(strMessage, "<img src=""smileys/smiley11.gif"">", "[xx(]", 1, -1, 1)
strMessage = Replace(strMessage, "<img src=""smileys/smiley12.gif"">", "[|)]", 1, -1, 1)
strMessage = Replace(strMessage, "<img src=""smileys/smiley13.gif"">", "[:V:]", 1, -1, 1)
strMessage = Replace(strMessage, "<img src=""smileys/smiley14.gif"">", "[:^:]", 1, -1, 1)
strMessage = Replace(strMessage, "<img src=""smileys/smiley15.gif"">", "[}:)]", 1, -1, 1)
strMessage = Replace(strMessage, "<img src=""smileys/smiley16.gif"">", "[8D]", 1, -1, 1)

'Reformat a quoted message
Do While NOT InStr(1, strMessage, "<blockquote><b>Quote: </b><i>", 1) = 0

	'Find the start position in the message of the [QUOTE] code
	lngQuoteStartPos = InStr(1, strMessage, "<blockquote><b>Quote: </b><i>", 1)
																
	'Find the end of the first line of the quote which contains the original post name and date
	lngQuoteEndPos = InStr(lngQuoteStartPos, strMessage, "<hr>", 1) + 4
	
	'Make sure the end position is not in error
	If lngQuoteEndPos - lngQuoteStartPos =< 29 Then lngQuoteEndPos = lngLinkStartPos + 29
					
	'Read in the first line of the quote which contains the original post name and date
	strMessageQuote = Trim(Mid(strMessage, lngQuoteStartPos, (lngQuoteEndPos - lngQuoteStartPos)))	
	
	'Place the first line of the quote which contains the original post name and date tempoary message variable
	strTempMessageQuote = strMessageQuote
		
	'Format the first line of quote
	strTempMessageQuote = Replace(strTempMessageQuote, "<blockquote><b>Quote: </b><i>", "[QUOTE]", 1, -1, 1)
	strTempMessageQuote = Replace(strTempMessageQuote, "</i><hr>", "<br>", 1, -1, 1)
	strTempMessageQuote = Replace(strTempMessageQuote, "</i>" & vbCrLf & "<hr>", "<br>", 1, -1, 1)
		
	'Place the new fromatted first line of the quote back into the message body
	strMessage = Replace(strMessage, strMessageQuote, strTempMessageQuote, 1, -1, 1)	
	strMessage = Replace(strMessage, "<hr></blockquote>", vbCrLf & "<br>[/QUOTE]<br>" & vbCrLf, 1, -1, 1)
	strMessage = Replace(strMessage, "<hr>" & vbCrLf & "</blockquote>", "<br>[/QUOTE]<br>", 1, -1, 1)
Loop



'Change the HTML codes back into my own codes for bold and italic
strMessage = Replace(strMessage, "<b>", "[B]", 1, -1, 1)
strMessage = Replace(strMessage, "</b>", "[/B]", 1, -1, 1)
strMessage = Replace(strMessage, "<i>", "[I]", 1, -1, 1)
strMessage = Replace(strMessage, "</i>", "[/I]", 1, -1, 1)
strMessage = Replace(strMessage, "<u>", "[U]", 1, -1, 1)
strMessage = Replace(strMessage, "</u>", "[/U]", 1, -1, 1)

strMessage = Replace(strMessage, "<hr>", "[HR]", 1, -1, 1)
strMessage = Replace(strMessage, "</hr>", "[HR]", 1, -1, 1)
strMessage = Replace(strMessage, "<ol>", "[LIST=1]", 1, -1, 1)
strMessage = Replace(strMessage, "</ol>", "[/LIST=1]", 1, -1, 1)
strMessage = Replace(strMessage, "<ul>", "[LIST]", 1, -1, 1)
strMessage = Replace(strMessage, "</ul>", "[/LIST]", 1, -1, 1)
strMessage = Replace(strMessage, "<li>", "[LI]", 1, -1, 1)
strMessage = Replace(strMessage, "</li>", "[/LI]", 1, -1, 1)
strMessage = Replace(strMessage, "<center>", "[CENTER]", 1, -1, 1)
strMessage = Replace(strMessage, "</center>", "[/CENTER]", 1, -1, 1)

strMessage = Replace(strMessage, "<strong>", "[B]", 1, -1, 1)
strMessage = Replace(strMessage, "</strong>", "[/B]", 1, -1, 1)
strMessage = Replace(strMessage, "<em>", "[I]", 1, -1, 1)
strMessage = Replace(strMessage, "</em>", "[/I]", 1, -1, 1)

strMessage = Replace(strMessage, "<P align=center>", "[P ALIGN=CENTER]", 1, -1, 1)
strMessage = Replace(strMessage, "<P align=left>", "[P ALIGN=LEFT]", 1, -1, 1)
strMessage = Replace(strMessage, "<P align=right>", "[P ALIGN=RIGHT]", 1, -1, 1)
strMessage = Replace(strMessage, "<P>", "[P]", 1, -1, 1)
strMessage = Replace(strMessage, "</P>", "[/P]", 1, -1, 1)
strMessage = Replace(strMessage, "<div align=center>", "[DIV ALIGN=CENTER]", 1, -1, 1)
strMessage = Replace(strMessage, "<div align=left>", "[DIV ALIGN=LEFT]", 1, -1, 1)
strMessage = Replace(strMessage, "<div align=right>", "[DIV ALIGN=RIGHT]", 1, -1, 1)
strMessage = Replace(strMessage, "<div>", "[DIV]", 1, -1, 1)
strMessage = Replace(strMessage, "</div>", "[/DIV]", 1, -1, 1)


strMessage = Replace(strMessage, "<blockquote>", "[BLOCKQUOTE]", 1, -1, 1)
strMessage = Replace(strMessage, "</blockquote>", "[/BLOCKQUOTE]", 1, -1, 1)

strMessage = Replace(strMessage, "<font size=""1"">", "[SIZE=1]", 1, -1, 1)
strMessage = Replace(strMessage, "<font size=""2"">", "[SIZE=2]", 1, -1, 1)
strMessage = Replace(strMessage, "<font size=""3"">", "[SIZE=3]", 1, -1, 1)
strMessage = Replace(strMessage, "<font size=""4"">", "[SIZE=4]", 1, -1, 1)
strMessage = Replace(strMessage, "<font size=""5"">", "[SIZE=5]", 1, -1, 1)
strMessage = Replace(strMessage, "<font size=""6"">", "[SIZE=6]", 1, -1, 1)
strMessage = Replace(strMessage, "<font size=6>", "[SIZE=6]", 1, -1, 1)
strMessage = Replace(strMessage, "<font size=1>", "[SIZE=1]", 1, -1, 1)
strMessage = Replace(strMessage, "<font size=2>", "[SIZE=2]", 1, -1, 1)
strMessage = Replace(strMessage, "<font size=3>", "[SIZE=3]", 1, -1, 1)
strMessage = Replace(strMessage, "<font size=4>", "[SIZE=4]", 1, -1, 1)
strMessage = Replace(strMessage, "<font size=5>", "[SIZE=5]", 1, -1, 1)
strMessage = Replace(strMessage, "<font size=6>", "[SIZE=6]", 1, -1, 1)
strMessage = Replace(strMessage, "<font face=""Arial, Helvetica, sans-serif"">", "[FONT=Arial]", 1, -1, 1)
strMessage = Replace(strMessage, "<font face=""Courier New, Courier, mono"">", "[FONT=Courier]", 1, -1, 1)
strMessage = Replace(strMessage, "<font face=""Times New Roman, Times, serif"">", "[FONT=Times]", 1, -1, 1)
strMessage = Replace(strMessage, "<font face=""Verdana, Arial, Helvetica, sans-serif"">", "[FONT=Verdana]", 1, -1, 1)

strMessage = Replace(strMessage, "<font color=""black"">", "[BLACK]", 1, -1, 1)
strMessage = Replace(strMessage, "<font color=""white"">", "[WHITE]", 1, -1, 1)
strMessage = Replace(strMessage, "<font color=""blue"">", "[BLUE]", 1, -1, 1)
strMessage = Replace(strMessage, "<font color=""red"">", "[RED]", 1, -1, 1)
strMessage = Replace(strMessage, "<font color=""green"">", "[GREEN]", 1, -1, 1)
strMessage = Replace(strMessage, "<font color=""yellow"">", "[YELLOW]", 1, -1, 1)
strMessage = Replace(strMessage, "<font color=""orange"">", "[ORANGE]", 1, -1, 1)
strMessage = Replace(strMessage, "<font color=""brown"">", "[BROWN]", 1, -1, 1)
strMessage = Replace(strMessage, "<font color=""magenta"">", "[MAGENTA]", 1, -1, 1)
strMessage = Replace(strMessage, "<font color=""cyan"">", "[CYAN]", 1, -1, 1)
strMessage = Replace(strMessage, "<font color=""limegreen"">", "[LIME GREEN]", 1, -1, 1)
strMessage = Replace(strMessage, "<font color=black>", "[BLACK]", 1, -1, 1)
strMessage = Replace(strMessage, "<font color=white>", "[WHITE]", 1, -1, 1)
strMessage = Replace(strMessage, "<font color=blue>", "[BLUE]", 1, -1, 1)
strMessage = Replace(strMessage, "<font color=red>", "[RED]", 1, -1, 1)
strMessage = Replace(strMessage, "<font color=green>", "[GREEN]", 1, -1, 1)
strMessage = Replace(strMessage, "<font color=yellow>", "[YELLOW]", 1, -1, 1)
strMessage = Replace(strMessage, "<font color=orange>", "[ORANGE]", 1, -1, 1)
strMessage = Replace(strMessage, "<font color=brown>", "[BROWN]", 1, -1, 1)
strMessage = Replace(strMessage, "<font color=magenta>", "[MAGENTA]", 1, -1, 1)
strMessage = Replace(strMessage, "<font color=cyan>", "[CYAN]", 1, -1, 1)
strMessage = Replace(strMessage, "<font color=limegreen>", "[LIME GREEN]", 1, -1, 1)
strMessage = Replace(strMessage, "</font>", "[/FONT]", 1, -1, 1)


'Loop through the message till all or any IMAGE links are converted back into codes
Do While NOT InStr(1, strMessage, "<img src=""", 1) = 0
					    	
	'Find the start position in the image tag
	lngLinkStartPos = InStr(1, strMessage, "<img src=""", 1)
														
	'Find the position in the message for the image closing tag
	lngLinkEndPos = InStr(lngLinkStartPos, strMessage, """>", 1) + 3
	
	'Make sure the end position is not in error
	If lngLinkEndPos - lngLinkStartPos =< 10 Then lngLinkEndPos = lngLinkStartPos + 10
					
	'Read in the code to be converted back into the forum codes
	strMessageLink = Trim(Mid(strMessage, lngLinkStartPos, (lngLinkEndPos - lngLinkStartPos)))	
	
	'Place the image tag into the tempoary message variable
	strTempMessageLink = strMessageLink
	
	'Format the HTML image tag back into forum codes
	strTempMessageLink = Replace(strTempMessageLink, "<img src=""", "[IMG]", 1, -1, 1)
	strTempMessageLink = Replace(strTempMessageLink, """>", "[/IMG]", 1, -1, 1)
	
	'Place the new fromatted codes into the message string body
	strMessage = Replace(strMessage, strMessageLink, strTempMessageLink, 1, -1, 1)		
Loop


'Loop through the message till all or any HTML email links are converted back into codes
Do While NOT InStr(1, strMessage, "<a href=""mailto:", 1) = 0 AND NOT InStr(1, strMessage, "</a>", 1) = 0
					    	
	'Find the start position in the message of the HTML e-mail mailto tag
	lngLinkStartPos = InStr(1, strMessage, "<a href=""mailto:", 1)
								
								
	'Find the position in the message for the </a> closing code
	lngLinkEndPos = InStr(lngLinkStartPos, strMessage, "</a>", 1) + 4
	
	'Make sure the end position is not in error
	If lngLinkEndPos - lngLinkStartPos =< 16 Then lngLinkEndPos = lngLinkStartPos + 16
					
	'Read in the code to be converted back into the forum codes
	strMessageLink = Trim(Mid(strMessage, lngLinkStartPos, (lngLinkEndPos - lngLinkStartPos)))	
	
	'Place the message link into the tempoary message variable
	strTempMessageLink = strMessageLink
	
	'Format the HTML mailto link back into forum codes
	strTempMessageLink = Replace(strTempMessageLink, "<a href=""mailto:", "[EMAIL=", 1, -1, 1)
	strTempMessageLink = Replace(strTempMessageLink, "</a>", "[/EMAIL]", 1, -1, 1)
	strTempMessageLink = Replace(strTempMessageLink, """>", "]", 1, -1, 1)
	
	'Place the new fromatted codes into the message string body
	strMessage = Replace(strMessage, strMessageLink, strTempMessageLink, 1, -1, 1)		
Loop


'Loop through the message till all or any hyperlinks are turned into back into froum codes
Do While NOT InStr(1, strMessage, "<a href=""", 1) = 0 AND NOT InStr(1, strMessage, "</a>", 1) = 0
					    	
	'Find the start position in the message of the HTML hyperlink
	lngLinkStartPos = InStr(1, strMessage, "<a href=""", 1)
																
	'Find the position in the message for the </a> closing code
	lngLinkEndPos = InStr(lngLinkStartPos, strMessage, "</a>", 1) + 4
	
	'Make sure the end position is not in error
	If lngLinkEndPos - lngLinkStartPos =< 9 Then lngLinkEndPos = lngLinkStartPos + 9
					
	'Read in the code to be converted back into forum codes from the message
	strMessageLink = Trim(Mid(strMessage, lngLinkStartPos, (lngLinkEndPos - lngLinkStartPos)))	
	
	'Place the message link into the tempoary message variable
	strTempMessageLink = strMessageLink
	
	'Format the HTML hyperlink back into forum codes
	strTempMessageLink = Replace(strTempMessageLink, "<a href=""", "[URL=", 1, -1, 1)
	strTempMessageLink = Replace(strTempMessageLink, "</a>", "[/URL]", 1, -1, 1)
	strTempMessageLink = Replace(strTempMessageLink, """>", "]", 1, -1, 1)
	
	'Place the new fromatted codes into the message string body
	strMessage = Replace(strMessage, strMessageLink, strTempMessageLink, 1, -1, 1)		
Loop


'Turn the HTML back into the charcaters entred by the user
strMessage = Replace(strMessage, "&lt;", "<", 1, -1, 1)
strMessage = Replace(strMessage, "&gt;", ">", 1, -1, 1)
strMessage = Replace(strMessage, "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;", "       ", 1, -1, 1)
strMessage = Replace(strMessage, "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;", "      ", 1, -1, 1)
strMessage = Replace(strMessage, "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;", "     ", 1, -1, 1)
strMessage = Replace(strMessage, "&nbsp;&nbsp;&nbsp;&nbsp;", "    ", 1, -1, 1)
strMessage = Replace(strMessage, "&nbsp;&nbsp;&nbsp;", "   ", 1, -1, 1)
strMessage = Replace(strMessage, "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;", vbTab, 1, -1, 1)
strMessage = Replace(strMessage, vbCrLf, "", 1, -1, 1)
strMessage = Replace(strMessage, "<br>" & vbCrLf, vbCrLf, 1, -1, 1)
strMessage = Replace(strMessage, "<br>", vbCrLf, 1, -1, 1)

%>