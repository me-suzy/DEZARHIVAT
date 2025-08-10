<%
'****************************************************************************************
'**  Copyright Notice    
'**
'**  Web Wiz Guide ASP Mailing List
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
%>

<!--#include file="common.inc" -->

<!-- The Web Wiz Guide ASP Mailing List is written and produced by Bruce Corkhill ©2001
     	If you want your own ASP Mailing List then goto http://www.webwizguide.com -->

<style type="text/css">
<!--
.text {font-family: <% = strTextType %>; font-size: <% = intTextSize %>px; color: <% = strTextColour %>}
-->
</style>

<form name="frmMailingList" method="post" action="mailing_list.asp" target="mailingList" onSubmit="window.open('', 'mailingList', 'toolbar=0,location=0,status=0,menubar=0,scrollbars=0,resizable=1,width=400,height=200')">
  <table width="143" border="0" cellspacing="0" cellpadding="0" align="center">
    <tr> 
      <td class="text">Your E-mail Address:</td>
    </tr>
    <tr> 
      <td><a href="http://www.webwizguide.com"></a> 
        <input type="text" name="email" maxlength="35">
      </td>
    </tr>
    <tr> 
      <td align="left" class="text"> 
        <input type="radio" name="mode" value="add" checked>
        Subscribe<br>
        <input type="radio" name="mode" value="delete">
        Un-Subscribe </td>
    </tr>
    <tr>
      <td align="center">
        <input type="submit" name="Submit" value="Submit">
      </td>
    </tr>
    <tr> 
      <td align="center" height="15"><%
'***** START WARNING - REMOVAL OR MODIFICATION OF THIS CODE WILL VIOLATE THE LICENSE AGREEMENT ****** 
Response.Write("	<a href=""http://www.webwizguide.com"" style=""font-family: Arial, Helvetica, sans-serif; font-size: 9px;"" target=""_blank""> Powered by Web Wiz Guide</a>")
'***** END WARNING - REMOVAL OR MODIFICATION OF THIS CODE WILL VIOLATE THE LICENSE AGREEMENT ******
		%></td>
    </tr>
  </table>
</form>