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
%>

<script  language="JavaScript">
<!-- Hide from older browsers...


//Have the propmt box turned on by default
var promptOn = true;


//Function to turn on or off the prompt box
function PromptMode(selectMode){
	
	if (selectMode.options[selectMode.selectedIndex].value == 0){
		promptOn = false;
	}
	else{
		promptOn = true;
	}
}


// Function to add the code for bold italic centre and underline, to the message
function AddMessageCode(code, promptText, InsertText) {

	if (code != "") {
		if (promptOn == true){
			insertCode = prompt(promptText + "\n[" + code + "]xxx[/" + code + "]", InsertText);
				if ((insertCode != null) && (insertCode != "")){
					document.frmAddMessage.message.value += "[" + code + "]" + insertCode + "[/" + code + "]";
				}
		}
		else{
			document.frmAddMessage.message.value += "[" + code + "][/" + code + "]";
		}
	}
				
	document.frmAddMessage.message.focus();
}

// Function to add the font colours to the message, to the message
function AddColourCode(code) {

	if (code != "") {
		if (promptOn == true){
			insertCode = prompt("Enter the text that you would like in " + code + "\n[" + code + "]xxx[/" + code + "]", '');
				if ((insertCode != null) && (insertCode != "")){
					document.frmAddMessage.message.value += "[" + code + "]" + insertCode + "[/FONT]";
				}
		}
		else{
			document.frmAddMessage.message.value += "[" + code + "][/FONT]";
		}
	}
	document.frmAddMessage.selectColour.options[0].selected = true;		
	document.frmAddMessage.message.focus();
}


//Function to add the URL, indent, list, and Email code to the message
function AddCode(code) {

	//For the URL code
	if ((code != "") && (code == "URL")) {
		insertText = prompt("Enter the on screen display text for the Hyperlink", "");
			
			if ((insertText != null) && (insertText != "") && (code == "URL")){
				insertCode = prompt("Enter the URL address to create Hyperlink to", "http://");
					
					if ((insertCode != null) && (insertCode != "") && (insertCode != "http://")){					
						document.frmAddMessage.message.value += "[" + code + "=" + insertCode + "]" + insertText + "[/" + code + "]";
					}
			}
	}
	
	
	//For the email code
	if ((code != "") && (code == "EMAIL")) {
		insertText = prompt("Enter the on screen display text for the E-mail address", "");
			
			if ((insertText != null) && (insertText != "")){
				insertCode = prompt("Enter the E-mail address to link to", "");
					
					if ((insertCode != null) && (insertCode != "")){					
					document.frmAddMessage.message.value += "[" + code + "=" + insertCode + "]" + insertText + "[/" + code + "]";
				}
			}
	}
	
	//For the image code
	if ((code != "") && (code == "IMAGE")) {	
		insertCode = prompt("Enter the web address of the image", "http://");
					
			if ((insertCode != null) && (insertCode != "")){					
			document.frmAddMessage.message.value += "[" + code + "]" + insertCode + "[/" + code + "]";
		}			
	}
	
	//For the list code
	if ((code != "") && (code == "LIST")) {
		if (promptOn == true){
			listType = prompt("Type of list \nEnter \'1\' for numbered or leave blank for bulleted", "");
			
			while ((listType != null) && (listType != "") && (listType != "1")) {
				listType = prompt("ERROR! Please enter \'1\' for numbered or leave blank for bulleted","");               
			}
			
			if (listType != null) {			
				var listItem = "1";
				var insertCode = "";
				
				while ((listItem != "") && (listItem != null)) {
					listItem = prompt("List item Leave blank to end list",""); 
					if (listItem != "") {             
						insertCode += "[LI]" + listItem + "[/LI]"; 
					}                   
				} 
				
				if (listType == "") {
					document.frmAddMessage.message.value += "[" + code + "]" + insertCode + "[/" + code + "]";
				} else {
					document.frmAddMessage.message.value += "[" + code + "=" + listType + "]" + insertCode + "[/" + code + "=" + listType + "]";
				} 
				
			}
		}
		else{
			document.frmAddMessage.message.value += "[" + code + "][LI] [/LI][LI] [/LI][LI] [/LI][/" + code + "]";
		}			
	}
	
	
	//For the indent
	if ((code != "") && (code == "INDENT")) {
						
			document.frmAddMessage.message.value += "      ";				
	}
				
	document.frmAddMessage.message.focus();
}

//Function to add the code to the message for the special characters
function AddCharacter(chrCode) {	
	document.frmAddMessage.message.value += chrCode;
	document.frmAddMessage.selectCharacter.options[0].selected = true
	document.frmAddMessage.message.focus();
}

//Function to open preview post window
function OpenPreviewWindow(){

	strMessage = escape(document.frmAddMessage.message.value);
   	document.cookie = "Message=" + strMessage
   	
   	openWin('post_preview.asp','preview','toolbar=0,location=0,status=0,menubar=0,scrollbars=1,resizable=1,width=680,height=400')
}

//Function to open pop up window
function openWin(theURL,winName,features) {
  	window.open(theURL,winName,features);
}
	
// -->
</script>


<form method=post name="frmAddMessage" action="post_message.asp?PagePosition=<% = CInt(Request.QueryString("PagePosition")) %>" onSubmit="return CheckForm();" onReset="return confirm('Are you sure you want to clear the post message you have entered?');">
  <table width="660" border="0" cellspacing="0" cellpadding="1" bgcolor="<% = strTableBorderColour %>" height="230" align="center">
    <tr> 
      <td height="66" width="967"> 
        <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="<% = strTableColour %>" height="201">
          <tr> 
            <td height="199"> 
              <table width="100%" border="0" align="center" height="233">
                <tr align="left"> 
                  <td colspan="2" height="30" class="text">*Indicates required 
                    fields</td>
                </tr>
                <%
If strMode = "new" Then
%>
                <tr > 
                  <td align="right" width="15%" height="12"><span class="text">Subject*:</span></td>
                  <td height="12" width="85%"> 
                    <input type="text" name="subject" size="30" maxlength="50">
                  </td>
                </tr>
                <%
End If
 %>
                <tr > 
                  <td valign="bottom" align="right" height="22" width="15%"><span class="text">Text 
                    Format:</span></td>
                  <td height="22" width="85%" valign="bottom"> 
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr> 
                        <td> <span class="text">Mode:</span> 
                          <select name="selectMode" onChange=PromptMode(this)>
                            <option value="1" selected>Prompt</option>
                            <option value="0">Basic</option>
                          </select>
                          &nbsp;&nbsp;&nbsp; 
                          <select name="selectCharacter" onChange="AddCharacter(selectCharacter.options[selectCharacter.selectedIndex].value)">
                            <option value="0" selected>-- Special Characters --</option>
                            <option value="&amp;#091;">[ Left Bracket</option>
                            <option value="&amp;#093;">] Right Bracket</option>
                            <option value="&amp;nbsp;">Non breaking Space</option>
                            <option value="&amp;#149;">&#149; Bullet</option>
                            <option value="&amp;pound;">&pound; Pound</option>
                            <option value="&amp;euro;">&euro; Euro</option>
                            <option value="&amp;yen;">&yen; Yen</option>
                            <option value="&amp;curren;">&curren; General Currency</option>
                            <option value="&amp;times;">&times; Times</option>
                            <option value="&amp;divide;">&divide; Division</option>
                            <option value="&amp;plusmn;">&plusmn; Plus or Minus</option>
                            <option value="&amp;deg;">&deg; Degee Sign</option>
                            <option value="&amp;micro;">&micro; Micro Sign</option>
                            <option value="&amp;frac14;">&frac14; Quater Fraction</option>
                            <option value="&amp;frac12;">&frac12; Half Fraction</option>
                            <option value="&amp;frac34;">&frac34; Third Fraction</option>
                            <option value="&amp;egrave;">&egrave; e, Grave Accent</option>
                            <option value="&amp;ugrave; ">&ugrave; u, Grave Accent</option>
                            <option value="&amp;laquo;">&laquo; Left Angle Quote</option>
                            <option value="&amp;raquo;">&raquo; Right Angle Quote</option>
                            <option value="&amp;copy;">&copy; Copyright</option>
                            <option value="&amp;reg;">&reg; Registered</option>
                          </select>
                          <br>
                          <a href="JavaScript:AddMessageCode('B','Enter text you want formatted in Bold', '')"><img src="forum_images/post_button_bold.gif" width="25" height="24" align="absmiddle" border="0" alt="Bold"></a> 
                          <a href="JavaScript:AddMessageCode('I','Enter text you want formatted in Italic', '')"><img src="forum_images/post_button_italic.gif" width="25" height="24" align="absmiddle" border="0" alt="Italic"></a> 
                          <a href="JavaScript:AddMessageCode('U','Enter text you want Underlined', '')"><img src="forum_images/post_button_underline.gif" width="25" height="24" align="absmiddle" border="0" alt="Underline"></a> 
                          <a href="JavaScript:AddCode('URL')"><img src="forum_images/post_button_hyperlink.gif" width="25" height="24" align="absmiddle" border="0" alt="Add Hyperlink"></a> 
                          <a href="JavaScript:AddCode('EMAIL')"><img src="forum_images/post_button_email.gif" width="25" height="24" align="absmiddle" border="0" alt="Add E-mail Link"></a> 
                          <a href="JavaScript:AddMessageCode('CENTER','Enter text you want Centred', '')"><img src="forum_images/post_button_centre.gif" width="25" height="24" align="absmiddle" border="0" alt="Centre"></a> 
                          <a href="JavaScript:AddCode('LIST', '')"><img src="forum_images/post_button_list.gif" width="25" height="24" align="absmiddle" border="0" alt="List"></a> 
                          <a href="JavaScript:AddCode('INDENT', '')"><img src="forum_images/post_button_indent.gif" width="25" height="24" align="absmiddle" border="0" alt="Indent"></a> 
                          <a href="JavaScript:AddCode('IMAGE')"><img src="forum_images/post_button_image.gif" width="25" height="24" align="absmiddle" border="0" alt="Add Image"></a> 
                          <%
If blnEmoticons = True Then
 %>                        
                          <a href="javascript:openWin('emoticons_smilies.asp','smilies','toolbar=0,location=0,status=0,menubar=0,scrollbars=0,resizable=1,width=400,height=400')"><img src="forum_images/post_button_smiley.gif" width="25" height="24" align="absmiddle" alt="Emoticon Smilies" border="0"></a> 
                          <%
End If
%>
                          <select name="selectColour" onChange=AddColourCode(selectColour.options[selectColour.selectedIndex].value) >
                            <option value="0" selected>-- Font Colour --</option>
                            <option value="BLACK">Black</option>
                            <option value="WHITE">White</option>
                            <option value="BLUE">Blue</option>
                            <option value="RED">Red</option>
                            <option value="GREEN">Green</option>
                            <option value="YELLOW">Yellow</option>
                            <option value="ORANGE">Orange</option>
                            <option value="BROWN">Brown</option>
                            <option value="MAGENTA">Magenta</option>
                            <option value="CYAN">Cyan</option>
                            <option value="LIME GREEN">Lime Green</option>
                          </select>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr > 
                  <td valign="top" align="right" height="61" width="15%" ><span class="text">Message*:</span></td>
                  <td height="61" width="85%" valign="top"> 
                    <textarea name="message" cols="57" rows="12"><% If strMode="edit" OR strMode = "quote" Then Response.Write strMessage %></textarea>
                  </td>
                </tr>
<%
'If the user has a signature offer them the chance to show it
If blnLoggedInUserSignature = True Then %>
                <tr>
                  <td align="right" height="7" width="15%" ><span class="text">Show 
                    Signature:</span></td>
                  <td height="7" width="85%" class="text">Yes 
                    <input type="radio" name="signature" value="True" checked>
                    &nbsp;&nbsp;No 
                    <input type="radio" name="signature" value="False">
                  </td>
                </tr>
                <%
End If

If strMode = "new" AND blnEmail = True AND blnLoggedInUserEmail = True Then
%>
                <tr> 
                  <td align="right" height="7" width="15%" ><span class="text">E-mail 
                    Notify:</span></td>
                  <td height="7" width="85%" class="text">Yes 
                    <input type="radio" name="email" value="True" checked>
                    &nbsp;&nbsp;No 
                    <input type="radio" name="email" value="False">
                  </td>
                </tr>
                <%
End If
 %>
                  <td valign="top" align="right" height="2" width="15%" > 
                    <input type="hidden" name="mode" value="<% = strMode %>">
                  <input type="hidden" name="ForumID" value="<% = intForumID %>">
                  <input type="hidden" name="TopicID" value="<% = lngTopicID %>">
                  <input type="hidden" name="MessageID" value="<% = lngMessageID %>">
                  &nbsp; </td>
                  <td height="2" width="85%" align="left"> 
                    <p> 
                    <%
                            If strMode="edit" Then
                            %>
                    <input type="submit" name="Submit" value="Update Post">
                    <%
                            ElseIf strMode = "new" Then
                            %>
                      <input type="submit" name="Submit" value="Post New Topic">
                    <%
                            Else
                            %>
                    <input type="submit" name="Submit" value="Post Reply">
                    <%
                            End If
                            %>
                    <input type="button" name="Preview" value="Preview Post" onClick="OpenPreviewWindow()">
                    <input type="reset" name="Reset" value="Reset Form">
                  </p>
                </td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</form>