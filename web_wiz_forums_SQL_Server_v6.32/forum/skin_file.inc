<%
'Default White/Silver Skin

'****************************************************************************************
'**  Copyright Notice    
'**
'**  Web Wiz Guide - Web Wiz Forums
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


'Global on Each Page
'---------------------------------------------------------------------------------
Const strBgColour = "#FFFFFF"
Const strBgImage = ""
Const strTextColour = "#000000"
Const intSmallFontSize = 10


'Table colours
'---------------------------------------------------------------------------------
Const strTableColour = "#FBFBF6"
Const strTableBgImage = ""
Const strTableBorderColour = "#666666"
Const strTableVariableWidth = "98%"

Const strTableTitleColour = "#CCCCCC"
Const strTableTitleBgImage = "forum_images/table_bg_image.gif"

Const strTableTitleColour2 = "#E7E7E7"
Const strTableTitleBgImage2 = ""

Const strTableEvenRowColour = "#FEFEFC"
Const strTableOddRowColour = "#F8F7EF"



'Misc
'---------------------------------------------------------------------------------
Const strProfileBgColour = "#CCCCCC"
Const strIETextBoxColour = "#FFFFFF"
Const strImagePath = "forum_images/"



'Posts and Private Msg display box
'---------------------------------------------------------------------------------
Const strTopBarColour = "#E7E7E7"
Const strTopBarBgImage = ""
Const strSideBarColour = "#E7E7E7"
Const strSideBarImage = ""
Const strDisplayPostBoxColour = "#FFFFFF"
Const strDisplayPostBoxImage = ""
Const strBehindBgColour = "#666666"




'Buttons and Images
'---------------------------------------------------------------------------------
Const intButtonHeight = 24
Const intButtonWidth = 88
Const intAvatarHeight = 32
Const intAvatarWidth = 32
Const strProfileBgImage = ""



'Cascading Style Sheet
'---------------------------------------------------------------------------------
Response.Write(VbCrLf & "<style type=""text/css"">")
Response.Write(VbCrLf & "<!--")

'Main text
Response.Write(VbCrLf & ".text {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12px; color: #000000;}")

'Main text in bold
Response.Write(VbCrLf & ".bold {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12px; color: #000000; font-weight: bold;}")

'Page titles and headings
Response.Write(VbCrLf & ".heading {font-family: Arial, Helvetica, sans-serif; font-size: 18px; color: #000000;}")

'Page warnings and large text
Response.Write(VbCrLf & ".lgText {font-family: Arial, Helvetica, sans-serif; font-size: 15px; color: #000000; font-weight: bold;}")

'Table titles and headings
Response.Write(VbCrLf & ".tHeading {font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: #000000; font-weight: bold;}")

'Table titles and headings 2
Response.Write(VbCrLf & ".tiHeading {font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: #000000; font-weight: bold;}")

'Links
Response.Write(VbCrLf & "a {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12px; color: #0000CC;}")

'On Mouse over mouse links
Response.Write(VbCrLf & "a:hover {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12px; color: #0000CC;}")

'Visited links
Response.Write(VbCrLf & "a:visited {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12px; color: #0000CC;}")

'On Mouse over visited links
Response.Write(VbCrLf & "a:visited:hover {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12px; color: #FF0000;}")

'Scroll Bar Colours for IE5.5+ Users
'Response.Write("body {scrollbar-face-color: #CCCCCC; scrollbar-shadow-color: #666666; scrollbar-highlight-color: #FFFFFF; scrollbar-track-color: #E7E7E7; scrollbar-arrow-color: #FFFFFF; scrollbar-3dlight-color: #000000; scrollbar-darkshadow-color: #000000;}")

Response.Write(VbCrLf & "-->")
Response.Write(VbCrLf & "</style>")
%>