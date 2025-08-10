<%
'****************************************************************************************
'**  Copyright Notice    
'**
'**  Web Wiz Guide ASP Discussion Forum
'**                                                              
'**  Copyright 2001 Bruce Corkhill All Rights Reserved.                                
'**
'**  This program is free software; you can redistribute it and/or modify
'**  it under the terms of the GNU General Public License as published by
'**  the Free Software Foundation; either version 2 of the License, or
'**  any later version.
'**
'**  All copyright notices must remain intacked in the scripts and the 
'**  outputted HTML.
'**
'**  You may not pass the whole or any part of this application off as your own work.
'**   
'**  All links to Web Wiz Guide must remain in place and the powered by
'**  logo with link back to Web Wiz Guide must remain visiable when the pages
'**  are viewed.
'**
'**  This program is distributed in the hope that it will be useful,
'**  but WITHOUT ANY WARRANTY; without even the implied warranty of
'**  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
'**  GNU General Public License for more details.
'**    
'**  You should have received a copy of the GNU General Public License
'**  along with this program; if not, write to the Free Software
'**  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA	
'** 
'**
'**  No official support is available for this program but you may post support questions at: -
'**  http://www.webwizguide.com/forum
'**
'**  Support questions are NOT answered by e-mail ever!
'**
'**  For correspondence or non support questions contact: -
'**  asp@webwizguide.com
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


'Change the path to the emotion symbols back into the emotion codes
strMessage = Replace(strMessage, "<img src=""forum_images/smiley1.gif"" border=""0"">", "[:)]", 1, -1, 1)
strMessage = Replace(strMessage, "<img src=""forum_images/smiley2.gif"" border=""0"">", "[;)]", 1, -1, 1)
strMessage = Replace(strMessage, "<img src=""forum_images/smiley3.gif"" border=""0"">", "[:o]", 1, -1, 1)
strMessage = Replace(strMessage, "<img src=""forum_images/smiley4.gif"" border=""0"">", "[:D]", 1, -1, 1)
strMessage = Replace(strMessage, "<img src=""forum_images/smiley5.gif"" border=""0"">", "[:errr:]", 1, -1, 1)
strMessage = Replace(strMessage, "<img src=""forum_images/smiley6.gif"" border=""0"">", "[:(]", 1, -1, 1)
strMessage = Replace(strMessage, "<img src=""forum_images/smiley7.gif"" border=""0"">", "[:x]", 1, -1, 1)
strMessage = Replace(strMessage, "<img src=""forum_images/smiley8.gif"" border=""0"">", "[:o)]", 1, -1, 1)
strMessage = Replace(strMessage, "<img src=""forum_images/smiley9.gif"" border=""0"">", "[:oops:]", 1, -1, 1)
strMessage = Replace(strMessage, "<img src=""forum_images/smiley10.gif"" border=""0"">", "[:star:]", 1, -1, 1)
strMessage = Replace(strMessage, "<img src=""forum_images/smiley11.gif"" border=""0"">", "[xx(]", 1, -1, 1)
strMessage = Replace(strMessage, "<img src=""forum_images/smiley12.gif"" border=""0"">", "[|)]", 1, -1, 1)
strMessage = Replace(strMessage, "<img src=""forum_images/smiley13.gif"" border=""0"">", "[:V:]", 1, -1, 1)
strMessage = Replace(strMessage, "<img src=""forum_images/smiley14.gif"" border=""0"">", "[:^:]", 1, -1, 1)
strMessage = Replace(strMessage, "<img src=""forum_images/smiley15.gif"" border=""0"">", "[}:)]", 1, -1, 1)
strMessage = Replace(strMessage, "<img src=""forum_images/smiley16.gif"" border=""0"">", "[8D]", 1, -1, 1)

strMessage = Replace(strMessage, "<img src=""forum_images/smiley1.gif"" border=""0"" target=""_blank"">", "[:)]", 1, -1, 1)
strMessage = Replace(strMessage, "<img src=""forum_images/smiley2.gif"" border=""0"" target=""_blank"">", "[;)]", 1, -1, 1)
strMessage = Replace(strMessage, "<img src=""forum_images/smiley3.gif"" border=""0"" target=""_blank"">", "[:o]", 1, -1, 1)
strMessage = Replace(strMessage, "<img src=""forum_images/smiley4.gif"" border=""0"" target=""_blank"">", "[:D]", 1, -1, 1)
strMessage = Replace(strMessage, "<img src=""forum_images/smiley5.gif"" border=""0"" target=""_blank"">", "[:errr:]", 1, -1, 1)
strMessage = Replace(strMessage, "<img src=""forum_images/smiley6.gif"" border=""0"" target=""_blank"">", "[:(]", 1, -1, 1)
strMessage = Replace(strMessage, "<img src=""forum_images/smiley7.gif"" border=""0"" target=""_blank"">", "[:x]", 1, -1, 1)
strMessage = Replace(strMessage, "<img src=""forum_images/smiley8.gif"" border=""0"" target=""_blank"">", "[:o)]", 1, -1, 1)
strMessage = Replace(strMessage, "<img src=""forum_images/smiley9.gif"" border=""0"" target=""_blank"">", "[:oops:]", 1, -1, 1)
strMessage = Replace(strMessage, "<img src=""forum_images/smiley10.gif"" border=""0"" target=""_blank"">", "[:star:]", 1, -1, 1)
strMessage = Replace(strMessage, "<img src=""forum_images/smiley11.gif"" border=""0"" target=""_blank"">", "[xx(]", 1, -1, 1)
strMessage = Replace(strMessage, "<img src=""forum_images/smiley12.gif"" border=""0"" target=""_blank"">", "[|)]", 1, -1, 1)
strMessage = Replace(strMessage, "<img src=""forum_images/smiley13.gif"" border=""0"" target=""_blank"">", "[:V:]", 1, -1, 1)
strMessage = Replace(strMessage, "<img src=""forum_images/smiley14.gif"" border=""0"" target=""_blank"">", "[:^:]", 1, -1, 1)
strMessage = Replace(strMessage, "<img src=""forum_images/smiley15.gif"" border=""0"" target=""_blank"">", "[}:)]", 1, -1, 1)
strMessage = Replace(strMessage, "<img src=""forum_images/smiley16.gif"" border=""0"" target=""_blank"">", "[8D]", 1, -1, 1)	

'Reformat a quoted message
Do While NOT InStr(1, strMessage, "<blockquote><b>Quote: </b><i>", 1) = 0

	'Find the start position in the message of the [QUOTE] code
	lngQuoteStartPos = InStr(1, strMessage, "<blockquote><b>Quote: </b><i>", 1)
																
	'Find the end of the first line of the quote which contains the original post name and date
	lngQuoteEndPos = InStr(lngQuoteStartPos, strMessage, "<hr>", 1) + 4
					
	'Read in the first line of the quote which contains the original post name and date
	strMessageQuote = Trim(Mid(strMessage, lngQuoteStartPos, (lngQuoteEndPos - lngQuoteStartPos)))	
	
	'Place the first line of the quote which contains the original post name and date tempoary message variable
	strTempMessageQuote = strMessageQuote
		
	'Format the first line of quote
	strTempMessageQuote = Replace(strTempMessageQuote, "<blockquote><b>Quote: </b><i>", "[QUOTE]", 1, -1, 1)
	strTempMessageQuote = Replace(strTempMessageQuote, "</i><hr>", "", 1, -1, 1)
		
	'Place the new fromatted first line of the quote back into the message body
	strMessage = Replace(strMessage, strMessageQuote, strTempMessageQuote, 1, -1, 1)	
	strMessage = Replace(strMessage, "<hr></blockquote>", "[/QUOTE]", 1, -1, 1)
Loop



'Change the HTML codes back into my own codes for bold and italic
strMessage = Replace(strMessage, "<b>", "[B]", 1, -1, 1)
strMessage = Replace(strMessage, "</b>", "[/B]", 1, -1, 1)
strMessage = Replace(strMessage, "<i>", "[I]", 1, -1, 1)
strMessage = Replace(strMessage, "</i>", "[/I]", 1, -1, 1)
strMessage = Replace(strMessage, "<u>", "[U]", 1, -1, 1)
strMessage = Replace(strMessage, "</u>", "[/U]", 1, -1, 1)
strMessage = Replace(strMessage, "<img src=""", "[IMAGE]", 1, -1, 1)
strMessage = Replace(strMessage, """ border=""0"">", "[/IMAGE]", 1, -1, 1)
strMessage = Replace(strMessage, """ border=""0"" target=""_blank"">", "[/IMAGE]", 1, -1, 1)
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
strMessage = Replace(strMessage, "</div>", "[/DIV]", 1, -1, 1)


strMessage = Replace(strMessage, "<blockquote>", "[BLOCKQUOTE]", 1, -1, 1)
strMessage = Replace(strMessage, "</blockquote>", "[/BLOCKQUOTE]", 1, -1, 1)
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




'Loop through the message till all or any HTML email links are converted back into codes
Do While NOT InStr(1, strMessage, "<a href=""mailto:", 1) = 0 AND NOT InStr(1, strMessage, "</a>", 1) = 0
					    	
	'Find the start position in the message of the HTML e-mail mailto tag
	lngLinkStartPos = InStr(1, strMessage, "<a href=""mailto:", 1)
								
								
	'Find the position in the message for the </a> closing code
	lngLinkEndPos = InStr(lngLinkStartPos, strMessage, "</a>", 1) + 4
					
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
					
	'Read in the code to be converted back into forum codes from the message
	strMessageLink = Trim(Mid(strMessage, lngLinkStartPos, (lngLinkEndPos - lngLinkStartPos)))	
	
	'Place the message link into the tempoary message variable
	strTempMessageLink = strMessageLink
	
	'Format the HTML hyperlink back into forum codes
	strTempMessageLink = Replace(strTempMessageLink, "<a href=""", "[URL=", 1, -1, 1)
	strTempMessageLink = Replace(strTempMessageLink, "</a>", "[/URL]", 1, -1, 1)
	strTempMessageLink = Replace(strTempMessageLink, """ target=""_blank"">", "]", 1, -1, 1)
	
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