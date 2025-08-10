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


'If emoticons are on then change the emotion symbols for the path to the relative smiley icon
If blnEmoticons = True Then
	strMessage = Replace(strMessage, "[:)]", "<img src=""forum_images/smiley1.gif"" border=""0"">", 1, -1, 1)
	strMessage = Replace(strMessage, "[;)]", "<img src=""forum_images/smiley2.gif"" border=""0"">", 1, -1, 1)
	strMessage = Replace(strMessage, "[:o]", "<img src=""forum_images/smiley3.gif"" border=""0"">", 1, -1, 1)
	strMessage = Replace(strMessage, "[:D]", "<img src=""forum_images/smiley4.gif"" border=""0"">", 1, -1, 1)
	strMessage = Replace(strMessage, "[:errr:]", "<img src=""forum_images/smiley5.gif"" border=""0"">", 1, -1, 1)
	strMessage = Replace(strMessage, "[:(]", "<img src=""forum_images/smiley6.gif"" border=""0"">", 1, -1, 1)
	strMessage = Replace(strMessage, "[:x]", "<img src=""forum_images/smiley7.gif"" border=""0"">", 1, -1, 1)
	strMessage = Replace(strMessage, "[:o)]", "<img src=""forum_images/smiley8.gif"" border=""0"">", 1, -1, 1)
	strMessage = Replace(strMessage, "[:oops:]", "<img src=""forum_images/smiley9.gif"" border=""0"">", 1, -1, 1)
	strMessage = Replace(strMessage, "[:star:]", "<img src=""forum_images/smiley10.gif"" border=""0"">", 1, -1, 1)
	strMessage = Replace(strMessage, "[xx(]", "<img src=""forum_images/smiley11.gif"" border=""0"">", 1, -1, 1)
	strMessage = Replace(strMessage, "[|)]", "<img src=""forum_images/smiley12.gif"" border=""0"">", 1, -1, 1)
	strMessage = Replace(strMessage, "[:V:]", "<img src=""forum_images/smiley13.gif"" border=""0"">", 1, -1, 1)
	strMessage = Replace(strMessage, "[:^:]", "<img src=""forum_images/smiley14.gif"" border=""0"">", 1, -1, 1)
	strMessage = Replace(strMessage, "[}:)]", "<img src=""forum_images/smiley15.gif"" border=""0"">", 1, -1, 1)
	strMessage = Replace(strMessage, "[8D]", "<img src=""forum_images/smiley16.gif"" border=""0"">", 1, -1, 1)
End If


'Change my own codes for bold and italic HTML tags back to the normal satandard HTML tags
strMessage = Replace(strMessage, "[B]", "<b>", 1, -1, 1)
strMessage = Replace(strMessage, "[/B]", "</b>", 1, -1, 1)
strMessage = Replace(strMessage, "[I]", "<i>", 1, -1, 1)
strMessage = Replace(strMessage, "[/I]", "</i>", 1, -1, 1)
strMessage = Replace(strMessage, "[U]", "<u>", 1, -1, 1)
strMessage = Replace(strMessage, "[/U]", "</u>", 1, -1, 1)
strMessage = Replace(strMessage, "[IMAGE]", "<img src=""", 1, -1, 1)
strMessage = Replace(strMessage, "[/IMAGE]", """ border=""0"">", 1, -1, 1)
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
strMessage = Replace(strMessage, "[/DIV]", "</div>", 1, -1, 1)
strMessage = Replace(strMessage, "[P]", "<p>", 1, -1, 1)
strMessage = Replace(strMessage, "[/P]", "</p>", 1, -1, 1)
strMessage = Replace(strMessage, "[blockquote]", "<BLOCKQUOTE>", 1, -1, 1)
strMessage = Replace(strMessage, "[/blockquote]", "</BLOCKQUOTE>", 1, -1, 1)
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



'Format the quoted message
Do While NOT InStr(1, strMessage, "[QUOTE]", 1) = 0

	'Find the start position in the message of the [QUOTE] code
	lngQuoteStartPos = InStr(1, strMessage, "[QUOTE]", 1)
																
	'Find the end of the first line of the quote which contains the original post name and date
	lngQuoteEndPos = InStr(lngQuoteStartPos, strMessage, "<br>", 1) + 4
					
	'Read in the first line of the quote which contains the original post name and date
	strMessageQuote = Trim(Mid(strMessage, lngQuoteStartPos, (lngQuoteEndPos - lngQuoteStartPos)))	
	
	'Place the first line of the quote which contains the original post name and date tempoary message variable
	strTempMessageQuote = strMessageQuote
		
	'Format the first line of quote
	strTempMessageQuote = Replace(strTempMessageQuote, "[QUOTE]", "<blockquote><b>Quote: </b><i>", 1, -1, 1)
	strTempMessageQuote = Replace(strTempMessageQuote, "<br>", "</i><hr>", 1, -1, 1)
		
	'Place the new fromatted first line of the quote back into the message body
	strMessage = Replace(strMessage, strMessageQuote, strTempMessageQuote, 1, -1, 1)	
	strMessage = Replace(strMessage, "[/QUOTE]<br>", "<hr></blockquote>", 1, -1, 1)
Loop


'Loop through the message till all or any hyperlinks are turned into HTML hyperlinks
Do While NOT InStr(1, strMessage, "[URL=", 1) = 0 AND NOT InStr(1, strMessage, "[/URL]", 1) = 0

					    	
	'Find the start position in the message of the [URL= code
	lngLinkStartPos = InStr(1, strMessage, "[URL=", 1)
																
	'Find the position in the message for the [/URL] closing code
	lngLinkEndPos = InStr(lngLinkStartPos, strMessage, "[/URL]", 1) + 6
					
	'Read in the code to be converted into a hyperlink from the message
	strMessageLink = Trim(Mid(strMessage, lngLinkStartPos, (lngLinkEndPos - lngLinkStartPos)))	
	
	'Place the message link into the tempoary message variable
	strTempMessageLink = strMessageLink
		
	'Format the link into an HTML hyperlink
	strTempMessageLink = Replace(strTempMessageLink, "[URL=", "<a href=""", 1, -1, 1)
	strTempMessageLink = Replace(strTempMessageLink, "[/URL]", "</a>", 1, -1, 1)
	strTempMessageLink = Replace(strTempMessageLink, "]", """ target=""_blank"">", 1, -1, 1)
		
	'Place the new fromatted hyperlink into the message string body
	strMessage = Replace(strMessage, strMessageLink, strTempMessageLink, 1, -1, 1)		
Loop



'Loop through the message till all or any email links are turned into HTML mailto links
Do While NOT InStr(1, strMessage, "[EMAIL=", 1) = 0 AND NOT InStr(1, strMessage, "[/EMAIL]", 1) = 0
					    	
	'Find the start position in the message of the [EMAIL= code
	lngLinkStartPos = InStr(1, strMessage, "[EMAIL=", 1)
								
								
	'Find the position in the message for the [/EMAIL] closing code
	lngLinkEndPos = InStr(lngLinkStartPos, strMessage, "[/EMAIL]", 1) + 8
					
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