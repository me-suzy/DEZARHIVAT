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

//Function to format text in the text box
function FormatText(command, option){
	
  	frames.message.document.execCommand(command, true, option);
  	frames.message.focus();
}

//Function to add image
function AddImage(){	
	imagePath = prompt('Enter the web address of the image', 'http://');				
	
	if ((imagePath != null) && (imagePath != "")){					
		frames.message.document.execCommand('InsertImage', false, imagePath);
  		frames.message.focus();
	}
	frames.message.focus();			
}

//Function to clear form
function ResetForm(){

	if (window.confirm('Are you sure you want to clear the message you have entered?')){
	 	frames.message.document.body.innerHTML = ''; 
	 	return true;
	 } 
	 return false;		
}

//Function to open pop up window
function openWin(theURL,winName,features) {
  	window.open(theURL,winName,features);
}

// -->
</script>
<form method=post name="frmAddMessage" action="post_message.asp?PagePosition=<% = CInt(Request.QueryString("PagePosition")) %>" onSubmit="return CheckForm();" onReset="return ResetForm();">
  <table width="660" border="0" cellspacing="0" cellpadding="1" bgcolor="<% = strTableBorderColour %>" height="230" align="center">
    <tr> 
      <td height="66" width="967"> 
        <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="<% = strTableColour %>" height="201">
          <tr> 
            <td height="199"> 
              <table width="100%" border="0" align="center" height="233">
                <tr> 
                  <td colspan="2" height="30" class="text" align="left">*Indicates 
                    required fields</td>
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
                <tr> 
                  <td valign="bottom" align="right" height="22" width="15%"><span class="text">Text 
                    Format:</span></td>
                  <td height="22" width="85%" valign="bottom"> 
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr> 
                        <td>
<select name="selectColour" onChange="FormatText('ForeColor', selectColour.options[selectColour.selectedIndex].value);document.frmAddMessage.selectColour.options[0].selected = true;" >
                            <option value="0" selected>-- Font Colour --</option>
                            <option value="black">Black</option>
                            <option value="white">White</option>
                            <option value="blue">Blue</option>
                            <option value="red">Red</option>
                            <option value="green">Green</option>
                            <option value="yellow">Yellow</option>
                            <option value="orange">Orange</option>
                            <option value="brown">Brown</option>
                            <option value="magenta">Magenta</option>
                            <option value="cyan">Cyan</option>
                            <option value="limegreen">Lime Green</option>
                          </select>
                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<select name="selectCharacter" onChange="FormatText('paste', selectCharacter.options[selectCharacter.selectedIndex].value);document.frmAddMessage.selectCharacter.options[0].selected = true;">
                            <option value="0" selected>-- Special Characters --</option>
                            <option value="&#091;">[ Left Bracket</option>
                            <option value="&#093;">] Right Bracket</option>
                            <option value="&nbsp;">Non breaking Space</option>
                            <option value="&#149;">&#149; Bullet</option>
                            <option value="&pound;">&pound; Pound</option>
                            <option value="&euro;">&euro; Euro</option>
                            <option value="&yen;">&yen; Yen</option>
                            <option value="&curren;">&curren; General Currency</option>
                            <option value="&times;">&times; Times</option>
                            <option value="&divide;">&divide; Division</option>
                            <option value="&plusmn;">&plusmn; Plus or Minus</option>
                            <option value="&deg;">&deg; Degee Sign</option>
                            <option value="&micro;">&micro; Micro Sign</option>
                            <option value="&frac14;">&frac14; Quater Fraction</option>
                            <option value="&frac12;">&frac12; Half Fraction</option>
                            <option value="&frac34;">&frac34; Third Fraction</option>
                            <option value="&egrave;">&egrave; e, Grave Accent</option>
                            <option value="&ugrave; ">&ugrave; u, Grave Accent</option>
                            <option value="&laquo;">&laquo; Left Angle Quote</option>
                            <option value="&raquo;">&raquo; Right Angle Quote</option>
                            <option value="&copy;">&copy; Copyright</option>
                            <option value="&reg;">&reg; Registered</option>
                          </select>
                          <br>
                          <img src="forum_images/post_button_cut.gif" width="25" height="24" align="absmiddle" OnClick="FormatText('cut')" style="cursor: hand;" alt="Cut"> 
                          <img src="forum_images/post_button_copy.gif" width="25" height="24" align="absmiddle" OnClick="FormatText('copy')" style="cursor: hand;" alt="Copy"> 
                          <img src="forum_images/post_button_paste.gif" width="25" height="24" align="absmiddle" OnClick="FormatText('paste')" style="cursor: hand;" alt="Paste"> 
                          <img src="forum_images/post_button_bold.gif" width="25" height="24" align="absmiddle" alt="Bold" OnClick="FormatText('bold', '')" style="cursor: hand;"> 
                          <img src="forum_images/post_button_italic.gif" width="25" height="24"  align="absmiddle" alt="Italic" OnClick="FormatText('italic', '')" style="cursor: hand;"> 
                          <img src="forum_images/post_button_underline.gif" width="25" height="24" align="absmiddle" alt="Underline" OnClick="FormatText('underline', '')" style="cursor: hand;"> 
                          <img src="forum_images/post_button_left_just.gif" width="25" height="24" align="absmiddle" OnClick="FormatText('JustifyLeft', '')" style="cursor: hand;" alt="Left Justify"> 
                          <img src="forum_images/post_button_centre.gif" width="25" height="24" align="absmiddle" border="0" alt="Centre Justify" OnClick="FormatText('JustifyCenter', '')" style="cursor: hand;"> 
                          <img src="forum_images/post_button_right_just.gif" width="25" height="24" align="absmiddle" OnClick="FormatText('JustifyRight', '')" style="cursor: hand;" alt="Right Justify"> 
                          <img src="forum_images/post_button_list.gif" width="25" height="24" align="absmiddle" border="0" alt="Unordered List" OnClick="FormatText('InsertUnorderedList', '')" style="cursor: hand;"> 
                          <img src="forum_images/post_button_outdent.gif" width="25" height="24" align="absmiddle" OnClick="FormatText('Outdent', '')" style="cursor: hand;" alt="Outdent"> 
                          <img src="forum_images/post_button_indent.gif" width="25" height="24" align="absmiddle" border="0" alt="Indent" OnClick="FormatText('indent', '')" style="cursor: hand;"> 
                          <img src="forum_images/post_button_hyperlink.gif" width="25" height="24" align="absmiddle" border="0" alt="Add Hyperlink" OnClick="FormatText('createLink')" style="cursor: hand;"> 
                          <img src="forum_images/post_button_image.gif" width="25" height="24" align="absmiddle" border="0" alt="Add Image" OnClick="AddImage()" style="cursor: hand;"> 
                          <%
If blnEmoticons = True Then
 %>                         
                          <a href="javascript:openWin('IE_emoticons_smilies.asp','smilies','toolbar=0,location=0,status=0,menubar=0,scrollbars=0,resizable=1,width=400,height=400')"><img src="forum_images/post_button_smiley.gif" width="25" height="24" align="absmiddle" alt="Emoticon Smilies" border="0"></a></td>
<%
End If 
%>                      
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr > 
                  <td valign="top" align="right" height="61" width="15%" ><span class="text">Message*:</span></td>
                  <td height="61" width="85%" valign="top"> 
                    <%
'This bit creates a random number to add to the end of the iframe link as IE will cashe the page
'Randomise the system timer
Randomize Timer
%>
                    <script language="javascript">
		    
		    	//Create an iframe and turn on the design mode for it
		    	document.write ('<iframe src="IE_textbox.asp?mode=<% = strMode %>&MessageID=<% = lngMessageID %>&ThreadID=<% = CLng(Request.QueryString("threadID")) %>&ID=<% = CInt(RND * 2000) %>" id="message" width="510" height="200"></iframe>')
                    	frames.message.document.designMode = "On";
                  
                    </script>
                    <!-- Display a message for IE users with JavaScript turned off -->
                    <noscript><span class="bold"><br>
                    <br>
                    JavaScript must be enabled on your web browser for you to 
                    post a message in the forum!</span></noscript> </td>
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
                    <input type="hidden" name="message" value="">
                  <input type="hidden" name="mode" value="<% = strMode %>">
                  <input type="hidden" name="ForumID" value="<% = intForumID %>">
                  <input type="hidden" name="TopicID" value="<% = lngTopicID %>">
                  <input type="hidden" name="MessageID" value="<% = lngMessageID %>">
                  <input type="hidden" name="browser" value="IE">
                  &nbsp; </td>
                  <td height="2" width="85%" align="left"> 
                    <p> 
                    <%
                            If strMode="edit" Then
                            %>
                    <input type="submit" name="Submit" value="Update Post" OnClick="document.frmAddMessage.message.value = frames.message.document.body.innerHTML;" tabindex="30">
                    <%
                            ElseIf strMode = "new" Then
                            %>
                      <input type="submit" name="Submit" value="Post New Topic" OnClick="document.frmAddMessage.message.value = frames.message.document.body.innerHTML;" tabindex="30">
                    <%
                            Else
                            %>
                    <input type="submit" name="Submit" value="Post Reply" OnClick="document.frmAddMessage.message.value = frames.message.document.body.innerHTML;" tabindex="30">
                    <%
                            End If
                            %>
                    <input type="reset" name="Reset" value="Clear Form">
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
