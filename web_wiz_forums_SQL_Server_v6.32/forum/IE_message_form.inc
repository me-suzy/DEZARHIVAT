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


'If a private message go to pm post message page otherwise goto post message page
If strMode = "PM" Then
	strPostPage = "pm_post_message.asp"
Else
	strPostPage = "post_message.asp?PagePosition=" & Request.QueryString("PagePosition")
End If
%>
<script  language="JavaScript">
<!-- Hide from older browsers...

//Function to format text in the text box
function FormatText(command, option){
	frames.message.focus();
  	frames.message.document.execCommand(command, false, option);
  	frames.message.focus();
}

//Function to add image
function AddImage(){	
	imagePath = prompt('<% = strTxtEnterImageURL %>', 'http://');				
	
	if ((imagePath != null) && (imagePath != "")){	
		frames.message.focus(); 				
		frames.message.document.execCommand('InsertImage', false, imagePath);
	}
	frames.message.focus();			
}

//Function to clear form
function ResetForm(){

	if (window.confirm('<% = strResetFormConfirm %>')){
		frames.message.focus();
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
<form method="post" name="frmAddMessage" action="<% = strPostPage %>" onSubmit="return CheckForm();" onReset="return ResetForm();">
 <table width="620" border="0" cellspacing="0" cellpadding="1" bgcolor="<% = strTableBorderColour %>" height="230" align="center">
  <tr> 
   <td height="66" width="967"> 
    <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="<% = strTableColour %>" background="<% = strTableBgImage %>" height="201">
     <tr> 
      <td height="199"> 
       <table width="100%" border="0" align="center" height="233" cellpadding="2" cellspacing="0">
        <tr> 
         <td colspan="2" height="30" class="text" align="left">*<% = strTxtRequiredFields %></td>
        </tr><%
'If this is a private message display the username box
If strMode = "PM" Then 
%>
        <tr>
         <td align="right" width="15%"><span class="text"><% = strTxtToUsername %>:</span></td>
         <td width="85%"><%
         'Get the users buddy list if they have one
	'Intialise the ADO recordset object
	Set rsBuddyList = Server.CreateObject("ADODB.Recordset")
		
	'Initlise the sql statement
	strSQL = "SELECT tblAuthor.Username "
	strSQL = strSQL & "FROM tblAuthor INNER JOIN tblBuddyList ON tblAuthor.Author_ID = tblBuddyList.Buddy_ID "
	strSQL = strSQL & "WHERE tblBuddyList.Author_ID=" & lngLoggedInUserID & " AND tblBuddyList.Buddy_ID <> 2 "
	strSQL = strSQL & "ORDER By tblAuthor.Username ASC;"
	
	'Query the database
	rsBuddyList.Open strSQL, strCon
         
          %><input type="text" name="member" size="15" maxlength="15" value="<% = strBuddyName %>"<% If NOT rsBuddyList.EOF Then Response.Write(" onChange=""document.frmAddMessage.selectMember.options[0].selected = true;""") %>><%
	
	'If there are records returned then display the users buddy list
        If NOT rsBuddyList.EOF Then %>
          <span class="text"> <% = strSelectFormBuddyList %>:</span> 
          <select name="selectMember" onChange="member.value=''">
            <option value="">-- <% = strTxtNoneSelected %> --</option><%
          	'Loop throuhgn and display the buddy list
          	Do While NOT rsBuddyList.EOF 
          	
          		Response.Write("<option value=""" & rsBuddyList("Username") & """>" & rsBuddyList("Username") & "</option>")
        
           		'Move to next record in rs
           		rsBuddyList.MoveNext
           	Loop
           	%>
          </select><%
          
	Else
		Response.Write("<input type=""hidden"" name=""selectMember"" value="""">")
        End If
        
        'Reset server variables
	rsBuddyList.Close
	Set rsBuddyList = Nothing
       %></td>
        </tr>
        <%
End If 
        
'If this is a new post or editing the first thread then display the subject text box
If strMode = "new" or strMode="editTopic" or strMode = "PM" Then
%>
        <tr> 
         <td align="right" width="15%" height="12"><span class="text"><% = strTxtSubjectFolder %>*:</span></td>
         <td height="12" width="85%">
          <input type="text" name="subject" size="30" maxlength="41"<% If strMode="editTopic" or strMode="PM" Then Response.Write(" value=""" & strTopicSubject & """") %>>
          <%
        'If this is the forums moderator or forum admim then let them slect the priority level of the post
	If (lngLoggedInUserID = 1 OR blnModerator = True) AND (strMode = "new" or strMode="editTopic") Then
%>
          <span class="text">&nbsp;<% = strTxtPriority %>: 
          <select name="priority">
           <option value="0"<% If intTopicPriority = 0 Then Response.Write(" selected") %>><% = strTxtNormal %></option>
           <option value="1"<% If intTopicPriority = 1 Then Response.Write(" selected") %>><% = strTopPinned %></option>
           <option value="2"<% If intTopicPriority = 2 Then Response.Write(" selected") %>><% = strTopThisForum %></option>
           <% 	
         	'If this is the forum admin let them post a priority post to all forums
         	If lngLoggedInUserID = 1 Then %>
           <option value="3"<% If intTopicPriority = 3 Then Response.Write(" selected") %>><% = strTxtTopAllForums %></option>
           <%
		End If
        	%>
          </select>
          </span>
          <% 
          
	End If
	%>
         </td>
        </tr>
        <%
        
End If
 %>
        <tr> 
         <td valign="bottom" align="right" height="22" width="15%"><span class="text"> </span></td>
         <td height="22" width="85%" valign="bottom"> 
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
           <tr> 
            <td> 
             <table width="100%" border="0" cellspacing="0" cellpadding="2">
              <tr>
               <td>
                <select name="selectFont" onChange="FormatText('fontname', selectFont.options[selectFont.selectedIndex].value);document.frmAddMessage.selectFont.options[0].selected = true;"  >
                 <option selected>-- <% = strTxtFont %> --</option>
                 <option value="Arial, Helvetica, sans-serif">Arial</option>
                 <option value="Courier New, Courier, mono">Courier New</option>
                 <option value="Times New Roman, Times, serif">Times New Roman</option>
                 <option value="Verdana, Arial, Helvetica, sans-serif">Verdana</option>
                </select>
                <select name="selectSize" onChange="FormatText('fontsize', selectSize.options[selectSize.selectedIndex].value);document.frmAddMessage.selectSize.options[0].selected = true;" >
                 <option selected>-- <% = strTxtSize %> --</option>
                 <option value="1">1</option>
                 <option value="2">2</option>
                 <option value="3">3</option>
                 <option value="4">4</option>
                 <option value="5">5</option>
                 <option value="6">6</option>
                </select>
                <select name="selectColour" onChange="FormatText('ForeColor', selectColour.options[selectColour.selectedIndex].value);document.frmAddMessage.selectColour.options[0].selected = true;" >
                 <option value="0" selected>-- <% = strTxtFontColour %> --</option>
                 <option value="black"><% = strTxtBlack %></option>
                 <option value="white"><% = strTxtWhite %></option>
                 <option value="blue"><% = strTxtBlue %></option>
                 <option value="red"><% = strTxtRed %></option>
                 <option value="green"><% = strTxtGreen %></option>
                 <option value="yellow"><% = strTxtYellow %></option>
                 <option value="orange"><% = strTxtOrange %></option>
                 <option value="brown"><% = strTxtBrown %></option>
                 <option value="magenta"><% = strTxtMagenta %></option>
                 <option value="cyan"><% = strTxtCyan %></option>
                 <option value="limegreen"><% = strTxtLimeGreen %></option>
                </select>
               </td>
              </tr>
              <tr>
               <td><img src="<% = strImagePath %>post_button_cut.gif" width="25" height="24" align="absmiddle" onClick="FormatText('cut')" style="cursor: hand;" alt="<% = strTxtCut %>"> 
                <img src="<% = strImagePath %>post_button_copy.gif" width="25" height="24" align="absmiddle" onClick="FormatText('copy')" style="cursor: hand;" alt="<% = strTxtCopy %>"> 
                <img src="<% = strImagePath %>post_button_paste.gif" width="25" height="24" align="absmiddle" onClick="FormatText('paste')" style="cursor: hand;" alt="<% = strTxtPaste %>"> 
                <img src="<% = strImagePath %>post_button_bold.gif" width="25" height="24" align="absmiddle" alt="<% = strTxtBold %>" onClick="FormatText('bold', '')" style="cursor: hand;"> 
                <img src="<% = strImagePath %>post_button_italic.gif" width="25" height="24"  align="absmiddle" alt="<% = strTxtItalic %>" onClick="FormatText('italic', '')" style="cursor: hand;"> 
                <img src="<% = strImagePath %>post_button_underline.gif" width="25" height="24" align="absmiddle" alt="<% = strTxtUnderline %>" onClick="FormatText('underline', '')" style="cursor: hand;"> 
                <img src="<% = strImagePath %>post_button_left_just.gif" width="25" height="24" align="absmiddle" onClick="FormatText('JustifyLeft', '')" style="cursor: hand;" alt="<% = strTxtLeftJustify %>"> 
                <img src="<% = strImagePath %>post_button_centre.gif" width="25" height="24" align="absmiddle" border="0" alt="<% = strTxtCentreJustify %>" onClick="FormatText('JustifyCenter', '')" style="cursor: hand;"> 
                <img src="<% = strImagePath %>post_button_right_just.gif" width="25" height="24" align="absmiddle" onClick="FormatText('JustifyRight', '')" style="cursor: hand;" alt="<% = strTxtRightJustify %>"> 
                <img src="<% = strImagePath %>post_button_list.gif" width="25" height="24" align="absmiddle" border="0" alt="<% = strTxtUnorderedList %>" onClick="FormatText('InsertUnorderedList', '')" style="cursor: hand;"> 
                <img src="<% = strImagePath %>post_button_outdent.gif" width="25" height="24" align="absmiddle" onClick="FormatText('Outdent', '')" style="cursor: hand;" alt="<% = strTxtOutdent %>"> 
                <img src="<% = strImagePath %>post_button_indent.gif" width="25" height="24" align="absmiddle" border="0" alt="<% = strTxtIndent %>" onClick="FormatText('indent', '')" style="cursor: hand;"> 
                <img src="<% = strImagePath %>post_button_hyperlink.gif" width="25" height="24" align="absmiddle" border="0" alt="<% = strTxtAddHyperlink %>" onClick="FormatText('createLink')" style="cursor: hand;"> 
                <img src="<% = strImagePath %>post_button_image.gif" width="25" height="24" align="absmiddle" border="0" alt="<% = strTxtAddImage %>" onClick="AddImage()" style="cursor: hand;"> 
                <%
If blnEmoticons = True Then
 %>
                <a href="javascript:openWin('IE_emoticons_smilies.asp','smilies','toolbar=0,location=0,status=0,menubar=0,scrollbars=0,resizable=1,width=400,height=400')"><img src="<% = strImagePath %>post_button_smiley.gif" width="25" height="24" align="absmiddle" alt="<% = strTxtEmoticonSmilies %>" border="0"></a><%
End If 
%></td>                
		</tr>
             </table>
            </td>
            
           </tr>
          </table>
         </td>
        </tr>
        <tr > 
         <td valign="top" align="right" height="61" width="15%" ><span class="text"><% = strTxtMessage %>*:</span></td>
         <td height="61" width="85%" valign="top">
          <% 
          
'This bit creates a random number to add to the end of the iframe link as IE will cashe the page
'Randomise the system timer
Randomize Timer
%>
          <script language="javascript">
		    
		    	//Create an iframe and turn on the design mode for it
		    	document.write ('<iframe src="IE_textbox.asp?mode=<% = strMode %>&code=<% = Request.QueryString("code") %>&MessageID=<% = lngMessageID %>&postID=<% = CLng(Request.QueryString("threadID")) %>&ID=<% = CInt(RND * 2000) %>" id="message" width="510" height="200"></iframe>')
                    	frames.message.document.designMode = "On";
                  
                    </script>
          <!-- Display a message for IE users with JavaScript turned off -->
          <noscript><span class="bold"><br><br><% = strTxtJavaScriptEnabled %></span></noscript> </td>
        </tr>
        <%
'If not PM then display another row
If strMode <> "PM" Then 
	'If signature of e-mail notify then display row to show
	If ((blnLoggedInUserEmail = True AND blnEmail = True) AND ((blnModerator = False AND NOT lngLoggedInUserID = 1) OR (blnAdminEmail = False))) OR blnLoggedInUserSignature = True Then
%>
        <tr> 
         <td align="right" height="7" width="92">&nbsp;</td>
         <td height="7" width="508" valign="bottom" class="white">
          <%
           

		'If the user has a signature offer them the chance to show it
		If blnLoggedInUserSignature = True Then %>
          &nbsp;<input type="checkbox" name="signature" value="True" checked><span class="text"><% = strTxtShowSignature %></span>&nbsp;
          <% 
          
		End If

		'Display e-mail notify of replies option
		If blnEmail = True AND blnLoggedInUserEmail = True AND ((blnModerator = False AND lngLoggedInUserID <> 1) OR (blnAdminEmail = False)) Then
%>
          &nbsp;<input type="checkbox" name="email" value="True"><span class="text"><% = strTxtEmailNotify %></span>&nbsp; 
          <%
        	'If the admin is editing post then don't want to accedently turn on or off notification for the post
		ElseIf strMode = "edit" Then
			Response.Write("		<input type=""hidden"" name=""email"" value=""" & blnEmailNotify & """>")
		End If
 		%>
         </td>
        </tr>
        <%
	End If
	
'If this is a private e-mail and e-mail is on and the user gave an e-mail address let them choose to be notified when pm msg is read
ElseIf strMode = "PM" AND blnEmail = True AND blnLoggedInUserEmail Then
	%>
	<tr> 
         <td align="right" width="92">&nbsp;</td>
         <td width="508" valign="bottom" class="text">&nbsp;<input type="checkbox" name="email" value="True"><span class="text"><% = strTxtEmailNotifyWhenPMIsRead %></span></td>
        </tr><%
End If
%>
        <td> 
         <input type="hidden" name="message" value=""><%
If NOT strMode = "PM" Then  %>
         <input type="hidden" name="mode" value="<% = strMode %>">
         <input type="hidden" name="ForumID" value="<% = intForumID %>">
         <input type="hidden" name="TopicID" value="<% = lngTopicID %>">
         <input type="hidden" name="MessageID" value="<% = lngMessageID %>">
         <input type="hidden" name="ThreadPage" value="<% = intRecordPositionPageNum %>"><%
         'If reply get the thread position number in the topic
         If strMode = "reply" OR strMode = "quote" Then %>
         <input type="hidden" name="ThreadPos" value="<% = (intTotalNumOfThreads + 1) %>"><%
	End If
End If %>
         <input type="hidden" name="browser" value="IE">
         &nbsp;</td>
        <td height="2" width="85%" align="left"> 
         <p> 
          <%
If strMode="edit" OR strMode = "editTopic" Then
                            %>
          <input type="submit" name="Submit" value="<% = strTxtUpdatePost %>" OnClick="document.frmAddMessage.message.value = frames.message.document.body.innerHTML;" tabindex="30">
          <%
ElseIf strMode = "new" Then
                            %>
          <input type="submit" name="Submit" value="<% = strTxtNewTopic %>" OnClick="document.frmAddMessage.message.value = frames.message.document.body.innerHTML;" tabindex="30">
         <%
ElseIf strMode = "PM" Then
                            %>
          <input type="submit" name="Submit" value="<% = strTxtPostMessage %>" OnClick="document.frmAddMessage.message.value = frames.message.document.body.innerHTML;" tabindex="30">
          <%
Else
                            %>
          <input type="submit" name="Submit" value="<% = strTxtPostReply %>" OnClick="document.frmAddMessage.message.value = frames.message.document.body.innerHTML;" tabindex="30">
          <%
End If
                            %>
          <input type="reset" name="Reset" value="<% = strTxtClearForm %>">
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