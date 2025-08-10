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


'If emoticons are on then change the emotion symbols for the path to the relative smiley icon
If blnEmoticons = True Then
	strMessage = Replace(strMessage, "[:)]", "<img border=""0"" src=""smileys/smiley1.gif"">", 1, -1, 1)
	strMessage = Replace(strMessage, "[;)]", "<img border=""0"" src=""smileys/smiley2.gif"">", 1, -1, 1)
	strMessage = Replace(strMessage, "[:o]", "<img border=""0"" src=""smileys/smiley3.gif"">", 1, -1, 1)
	strMessage = Replace(strMessage, "[:D]", "<img border=""0"" src=""smileys/smiley4.gif"">", 1, -1, 1)
	strMessage = Replace(strMessage, "[:errr:]", "<img border=""0"" src=""smileys/smiley5.gif"">", 1, -1, 1)
	strMessage = Replace(strMessage, "[:(]", "<img border=""0"" src=""smileys/smiley6.gif"">", 1, -1, 1)
	strMessage = Replace(strMessage, "[:x]", "<img border=""0"" src=""smileys/smiley7.gif"">", 1, -1, 1)
	strMessage = Replace(strMessage, "[:o)]", "<img border=""0"" src=""smileys/smiley8.gif"">", 1, -1, 1)
	strMessage = Replace(strMessage, "[:oops:]", "<img border=""0"" src=""smileys/smiley9.gif"">", 1, -1, 1)
	strMessage = Replace(strMessage, "[:star:]", "<img border=""0"" src=""smileys/smiley10.gif"">", 1, -1, 1)
	strMessage = Replace(strMessage, "[xx(]", "<img border=""0"" src=""smileys/smiley11.gif"">", 1, -1, 1)
	strMessage = Replace(strMessage, "[|)]", "<img border=""0"" src=""smileys/smiley12.gif"">", 1, -1, 1)
	strMessage = Replace(strMessage, "[:V:]", "<img border=""0"" src=""smileys/smiley13.gif"">", 1, -1, 1)
	strMessage = Replace(strMessage, "[:^:]", "<img border=""0"" src=""smileys/smiley14.gif"">", 1, -1, 1)
	strMessage = Replace(strMessage, "[}:)]", "<img border=""0"" src=""smileys/smiley15.gif"">", 1, -1, 1)
	strMessage = Replace(strMessage, "[8D]", "<img border=""0"" src=""smileys/smiley16.gif"">", 1, -1, 1)
End If


'Change my own codes for bold and italic HTML tags back to the normal satandard HTML tags
strMessage = Replace(strMessage, "[B]", "<b>", 1, -1, 1)
strMessage = Replace(strMessage, "[/B]", "</b>", 1, -1, 1)
strMessage = Replace(strMessage, "[I]", "<i>", 1, -1, 1)
strMessage = Replace(strMessage, "[/I]", "</i>", 1, -1, 1)
strMessage = Replace(strMessage, "[U]", "<u>", 1, -1, 1)
strMessage = Replace(strMessage, "[/U]", "</u>", 1, -1, 1)
strMessage = Replace(strMessage, "[HR]", "<hr>", 1, -1, 1)
strMessage = Replace(strMessage, "[HR]", "</hr>", 1, -1, 1)
strMessage = Replace(strMessage, "[LIST=1]", "<ol>", 1, -1, 1)
strMessage = Replace(strMessage, "[/LIST=1]", "</ol>", 1, -1, 1)
strMessage = Replace(strMessage, "[LIST]", "<ul>", 1, -1, 1)
strMessage = Replace(strMessage, "[/LIST]", "</ul>", 1, -1, 1)
strMessage = Replace(strMessage, "[LI]", "<li>", 1, -1, 1)
strMessage = Replace(strMessage, "[/LI]", "</li>", 1, -1, 1)
strMessage = Replace(strMessage, "[CENTER]", "<center>", 1, -1, 1)
strMessage = Replace(strMessage, "[/CENTER]", "</center>", 1, -1, 1)
strMessage = Replace(strMessage, "[P ALIGN=CENTER]", "<p align=center>", 1, -1, 1)
strMessage = Replace(strMessage, "[P ALIGN=LEFT]", "<p align=left>", 1, -1, 1)
strMessage = Replace(strMessage, "[P ALIGN=RIGHT]", "<p align=right>", 1, -1, 1)
strMessage = Replace(strMessage, "[DIV ALIGN=CENTER]", "<div align=center>", 1, -1, 1)
strMessage = Replace(strMessage, "[DIV ALIGN=LEFT]", "<div align=left>", 1, -1, 1)
strMessage = Replace(strMessage, "[DIV ALIGN=RIGHT]", "<div align=right>", 1, -1, 1)
strMessage = Replace(strMessage, "[DIV]", "<div>", 1, -1, 1)
strMessage = Replace(strMessage, "[/DIV]", "</div>", 1, -1, 1)
strMessage = Replace(strMessage, "[P]", "<p>", 1, -1, 1)
strMessage = Replace(strMessage, "[/P]", "</p>", 1, -1, 1)
strMessage = Replace(strMessage, "[blockquote]", "<BLOCKQUOTE>", 1, -1, 1)
strMessage = Replace(strMessage, "[/blockquote]", "</BLOCKQUOTE>", 1, -1, 1)

strMessage = Replace(strMessage, "[SIZE=1]", "<font size=""1"">", 1, -1, 1)
strMessage = Replace(strMessage, "[SIZE=2]", "<font size=""2"">", 1, -1, 1)
strMessage = Replace(strMessage, "[SIZE=3]", "<font size=""3"">", 1, -1, 1)
strMessage = Replace(strMessage, "[SIZE=4]", "<font size=""4"">", 1, -1, 1)
strMessage = Replace(strMessage, "[SIZE=5]", "<font size=""5"">", 1, -1, 1)
strMessage = Replace(strMessage, "[SIZE=6]", "<font size=""6"">", 1, -1, 1)
strMessage = Replace(strMessage, "[FONT=Arial]", "<font face=""Arial, Helvetica, sans-serif"">", 1, -1, 1)
strMessage = Replace(strMessage, "[FONT=Courier]", "<font face=""Courier New, Courier, mono"">", 1, -1, 1)
strMessage = Replace(strMessage, "[FONT=Times]", "<font face=""Times New Roman, Times, serif"">", 1, -1, 1)
strMessage = Replace(strMessage, "[FONT=Verdana]", "<font face=""Verdana, Arial, Helvetica, sans-serif"">", 1, -1, 1)

strMessage = Replace(strMessage, "[BLACK]", "<font color=""black"">", 1, -1, 1)
strMessage = Replace(strMessage, "[WHITE]", "<font color=""white"">", 1, -1, 1)
strMessage = Replace(strMessage, "[BLUE]", "<font color=""blue"">", 1, -1, 1)
strMessage = Replace(strMessage, "[RED]", "<font color=""red"">", 1, -1, 1)
strMessage = Replace(strMessage, "[GREEN]", "<font color=""green"">", 1, -1, 1)
strMessage = Replace(strMessage, "[YELLOW]", "<font color=""yellow"">", 1, -1, 1)
strMessage = Replace(strMessage, "[ORANGE]", "<font color=""orange"">", 1, -1, 1)
strMessage = Replace(strMessage, "[BROWN]", "<font color=""brown"">", 1, -1, 1)
strMessage = Replace(strMessage, "[MAGENTA]", "<font color=""magenta"">", 1, -1, 1)
strMessage = Replace(strMessage, "[CYAN]", "<font color=""cyan"">", 1, -1, 1)
strMessage = Replace(strMessage, "[LIME GREEN]", "<font color=""limegreen"">", 1, -1, 1)
strMessage = Replace(strMessage, "[/FONT]", "</font>", 1, -1, 1)



'Loop through the message till all or any images are turned into HTML images
Do While NOT InStr(1, strMessage, "[IMG]", 1) = 0 AND NOT InStr(1, strMessage, "[/IMG]", 1) = 0
					    	
	'Find the start position in the message of the [IMG] code
	lngLinkStartPos = InStr(1, strMessage, "[IMG]", 1)
																
	'Find the position in the message for the [/IMG]] closing code
	lngLinkEndPos = InStr(lngLinkStartPos, strMessage, "[/IMG]", 1) + 6
					
	'Read in the code to be converted into a hyperlink from the message
	strMessageLink = Trim(Mid(strMessage, lngLinkStartPos, (lngLinkEndPos - lngLinkStartPos)))	
	
	'Place the message link into the tempoary message variable
	strTempMessageLink = strMessageLink
		
	'Format the IMG tages into an HTML image tag
	strTempMessageLink = Replace(strTempMessageLink, "[IMG]", "<img border=""0"" src=""", 1, -1, 1)
	strTempMessageLink = Replace(strTempMessageLink, "[/IMG]", """>", 1, -1, 1)
		
	'Place the new fromatted hyperlink into the message string body
	strMessage = Replace(strMessage, strMessageLink, strTempMessageLink, 1, -1, 1)		
Loop



'Format the quoted message
Do While NOT InStr(1, strMessage, "[QUOTE]", 1) = 0

	'Find the start position in the message of the [QUOTE] code
	lngQuoteStartPos = InStr(1, strMessage, "[QUOTE]", 1)
																
	'Find the end of the first line of the quote which contains the original post name and date
	lngQuoteEndPos = InStr(lngQuoteStartPos, strMessage, "<br>", 1) + 4
	
	'Make sure the end position is not in error
	If lngQuoteEndPos - lngLinkStartPos =< 7 Then lngQuoteEndPos = lngQuoteStartPos + 7
					
	'Read in the first line of the quote which contains the original post name and date
	strMessageQuote = Trim(Mid(strMessage, lngQuoteStartPos, (lngQuoteEndPos - lngQuoteStartPos)))	
	
	'Place the first line of the quote which contains the original post name and date tempoary message variable
	strTempMessageQuote = strMessageQuote
		
	'Format the first line of quote
	strTempMessageQuote = Replace(strTempMessageQuote, "[QUOTE]", "<blockquote><b>Quote: </b><i>", 1, -1, 1)
	strTempMessageQuote = Replace(strTempMessageQuote, "<br>", "</i><hr>", 1, -1, 1)
		
	'Place the new fromatted first line of the quote back into the message body
	strMessage = Replace(strMessage, strMessageQuote, strTempMessageQuote, 1, -1, 1)	
	strMessage = Replace(strMessage, "[/QUOTE]", "<hr></blockquote>", 1, -1, 1)
Loop


'Loop through the message till all or any hyperlinks are turned into HTML hyperlinks
Do While NOT InStr(1, strMessage, "[URL=", 1) = 0 AND NOT InStr(1, strMessage, "[/URL]", 1) = 0
					    	
	'Find the start position in the message of the [URL= code
	lngLinkStartPos = InStr(1, strMessage, "[URL=", 1)
																
	'Find the position in the message for the [/URL] closing code
	lngLinkEndPos = InStr(lngLinkStartPos, strMessage, "[/URL]", 1) + 6
	
	'Make sure the end position is not in error
	If lngLinkEndPos - lngLinkStartPos =< 5 Then lngLinkEndPos = lngLinkStartPos + 5
					
	'Read in the code to be converted into a hyperlink from the message
	strMessageLink = Trim(Mid(strMessage, lngLinkStartPos, (lngLinkEndPos - lngLinkStartPos)))	
	
	'Place the message link into the tempoary message variable
	strTempMessageLink = strMessageLink
		
	'Format the link into an HTML hyperlink
	strTempMessageLink = Replace(strTempMessageLink, "[URL=", "<a target=""_blank"" href=""", 1, -1, 1)
	strTempMessageLink = Replace(strTempMessageLink, "[/URL]", "</a>", 1, -1, 1)
	strTempMessageLink = Replace(strTempMessageLink, "]", """>", 1, -1, 1)
		
	'Place the new fromatted hyperlink into the message string body
	strMessage = Replace(strMessage, strMessageLink, strTempMessageLink, 1, -1, 1)		
Loop



'Loop through the message till all or any email links are turned into HTML mailto links
Do While NOT InStr(1, strMessage, "[EMAIL=", 1) = 0 AND NOT InStr(1, strMessage, "[/EMAIL]", 1) = 0
					    	
	'Find the start position in the message of the [EMAIL= code
	lngLinkStartPos = InStr(1, strMessage, "[EMAIL=", 1)
														
	'Find the position in the message for the [/EMAIL] closing code
	lngLinkEndPos = InStr(lngLinkStartPos, strMessage, "[/EMAIL]", 1) + 8
	
	'Make sure the end position is not in error
	If lngLinkEndPos - lngLinkStartPos =< 7 Then lngLinkEndPos = lngLinkStartPos + 7
					
	'Read in the code to be converted into a email link from the message
	strMessageLink = Trim(Mid(strMessage, lngLinkStartPos, (lngLinkEndPos - lngLinkStartPos)))	
	
	'Place the message link into the tempoary message variable
	strTempMessageLink = strMessageLink
	
	'Format the link into an HTML mailto link
	strTempMessageLink = Replace(strTempMessageLink, "[EMAIL=", "<a href=""mailto:", 1, -1, 1)
	strTempMessageLink = Replace(strTempMessageLink, "[/EMAIL]", "</a>", 1, -1, 1)
	strTempMessageLink = Replace(strTempMessageLink, "]", """>", 1, -1, 1)
	
	
	'Place the new fromatted HTML mailto into the message string body
	strMessage = Replace(strMessage, strMessageLink, strTempMessageLink, 1, -1, 1)		
Loop

%>