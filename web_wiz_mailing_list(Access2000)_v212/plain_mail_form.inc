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

<div align="center"> 
  <form method=post name="frmSendmail" action="send_mail.asp?Format=Plain" onSubmit="return CheckForm();" onReset="return confirm('Are you sure you want to clear the E-mail you have entered?');">
    <table width="660" border="0" cellspacing="0" cellpadding="1" height="230" align="center" bgcolor="#000000">
    <tr> 
        <td height="224" width="967"> 
          <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" height="201">
          <tr> 
              <td height="248"> 
                <table width="100%" border="0" align="center" height="233" cellpadding="2" cellspacing="0">
                  <tr align="left" bgcolor="#FFFFFF"> 
                    <td colspan="2" height="30">*Indicates required fields</td>
                  </tr>
                  <tr bgcolor="#FFFFFF" > 
                    <td align="right" width="16%" height="12">E-mail Subject*:</td>
                    <td height="12" width="84%"> 
                      <input type="text" name="subject" size="30" maxlength="40" value="<% = Request.Form("subject") %>">
                    </td>
                  </tr>
                  <tr bgcolor="#FFFFFF" > 
                    <td valign="top" align="right" height="61" width="16%" >E-mail Body*:</td>
                    <td height="61" width="84%" valign="top"> 
                      <textarea name="body" cols="57" rows="12"><% = Request.Form("body") %></textarea>
                    </td>
                  </tr>
                  <tr bgcolor="#FFFFFF"> 
                    <td valign="top" align="right" height="2" width="16%" >
                      <input type="hidden" name="format" value="plain">
                    </td>
                    <td height="2" width="84%" align="left"> 
                      <input type="submit" name="Submit" value="Send Preview to Myself">
                      <input type="submit" name="Submit" value="Send to All Members">
                      <input type="reset" name="Reset" value="Reset Form">
                    </td>
                  </tr>
                </table>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</form></div>