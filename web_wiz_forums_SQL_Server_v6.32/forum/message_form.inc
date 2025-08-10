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

// Function to add the font colours, sizes, type to the message, to the message
function FontCode(code) {

	if (code != "") {
		if (promptOn == true){
			insertCode = prompt("<% = strTxtEnterTextYouWouldLikeIn %> " + code + "\n[" + code + "]xxx[/FONT]", '');
				if ((insertCode != null) && (insertCode != "")){
					document.frmAddMessage.message.value += "[" + code + "]" + insertCode + "[/FONT]";
				}
		}
		else{
			document.frmAddMessage.message.value += "[" + code + "][/FONT]";
		}
	}	
	document.frmAddMessage.message.focus();
}


//Function to add the URL, indent, list, and Email code to the message
function AddCode(code) {

	//For the URL code
	if ((code != "") && (code == "URL")) {
		insertText = prompt("<% = strTxtEnterHyperlinkText %>", "");
			
			if ((insertText != null) && (insertText != "") && (code == "URL")){
				insertCode = prompt("<% = strTxtEnterHeperlinkURL %>", "http://");
					
					if ((insertCode != null) && (insertCode != "") && (insertCode != "http://")){					
						document.frmAddMessage.message.value += "[" + code + "=" + insertCode + "]" + insertText + "[/" + code + "]";
					}
			}
	}
	
	
	//For the email code
	if ((code != "") && (code == "EMAIL")) {
		insertText = prompt("<% = strTxtEnterEmailText %>", "");
			
			if ((insertText != null) && (insertText != "")){
				insertCode = prompt("<% = strTxtEnterEmailMailto %>", "");
					
					if ((insertCode != null) && (insertCode != "")){					
					document.frmAddMessage.message.value += "[" + code + "=" + insertCode + "]" + insertText + "[/" + code + "]";
				}
			}
	}
	
	//For the image code
	if ((code != "") && (code == "IMG")) {	
		insertCode = prompt("<% = strTxtEnterImageURL %>", "http://");
					
			if ((insertCode != null) && (insertCode != "")){					
			document.frmAddMessage.message.value += "[" + code + "]" + insertCode + "[/" + code + "]";
		}			
	}
	
	//For the list code
	if ((code != "") && (code == "LIST")) {
		if (promptOn == true){
			listType = prompt("<% = strTxtEnterTypeOfList %> \n<% = strTxtEnterEnter %> \'1\' <% = strTxtEnterNumOrBlankList %>", "");
			
			while ((listType != null) && (listType != "") && (listType != "1")) {
				listType = prompt("<% = strTxtEnterListError %> \'1\' <% = strTxtEnterNumOrBlankList %>","");               
			}
			
			if (listType != null) {			
				var listItem = "1";
				var insertCode = "";
				
				while ((listItem != "") && (listItem != null)) {
					listItem = prompt("<% = strEnterLeaveBlankForEndList %>",""); 
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

//Function to open preview post window
function OpenPreviewWindow(){
	
	now = new Date
	strMessage = escape(document.frmAddMessage.message.value);
   	document.cookie = "Message=" + strMessage
   		
   	openWin('post_preview.asp?ID=' + now.getTime(),'preview','toolbar=0,location=0,status=0,menubar=0,scrollbars=1,resizable=1,width=680,height=400')
}

//Function to open pop up window
function openWin(theURL,winName,features) {
  	window.open(theURL,winName,features);
}
	
// -->
</script>
<form method="post" name="frmAddMessage" action="<% = strPostPage %>" onSubmit="return CheckForm();" onReset="return confirm('<% = strResetFormConfirm %>');">
 <table width="620" border="0" cellspacing="0" cellpadding="1" bgcolor="<% = strTableBorderColour %>" height="230" align="center">
  <tr> 
   <td height="66" width="967"> 
    <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="<% = strTableColour %>" background="<% = strTableBgImage %>" height="201">
     <tr> 
      <td height="199"> 
       <table width="100%" border="0" align="center" cellpadding="2" cellspacing="0">
        <tr align="left"> 
         <td colspan="2" height="31" class="text">*<% = strTxtRequiredFields %></td>
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
         <td align="right" width="15%"><span class="text"><% = strTxtSubjectFolder %>*:</span></td>
         <td width="85%"> 
          <input type="text" name="subject" size="30" maxlength="41"<% If strMode="editTopic" or strMode="PM" Then Response.Write(" value=""" & strTopicSubject & """") %>>
          <%
        'If this is the forums moderator or forum admim then let them slect the priority level of the post
	If (lngLoggedInUserID = 1 OR blnModerator = True) AND (strMode = "new" or strMode="editTopic") Then
%>
          <span class="text">&nbsp;<% = strTxtPriority %>: <select name="priority">
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
	'Else the priority of the post is normal
	Else
		Response.Write("<input type=""hidden"" name=""priority"" value=""0"">")
	End If
	%>
         </td>
        </tr>
        <%
        
End If
 %>
        <tr> 
         <td align="right" width="15%"><span class="text"> </span></td>
         <td width="85%" valign="bottom"> 
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
           <tr> 
            <td> 
             <table width="477" border="0" cellspacing="0" cellpadding="1">
              <tr> 
               <td width="346"> 
                <select name="selectFont" onChange="FontCode(selectFont.options[selectFont.selectedIndex].value);document.frmAddMessage.selectFont.options[0].selected = true;">
                 <option selected>-- <% = strTxtFont %> --</option>
                 <option value="FONT=Arial">Arial</option>
                 <option value="FONT=Courier">Courier New</option>
                 <option value="FONT=Times">Times New Roman</option>
                 <option value="FONT=Verdana">Verdana</option>
                </select>
                <select name="selectSize" onChange="FontCode(selectSize.options[selectSize.selectedIndex].value);document.frmAddMessage.selectSize.options[0].selected = true;">
                 <option selected>-- <% = strTxtSize %> --</option>
                 <option value="SIZE=1">1</option>
                 <option value="SIZE=2">2</option>
                 <option value="SIZE=3">3</option>
                 <option value="SIZE=4">4</option>
                 <option value="SIZE=5">5</option>
                 <option value="SIZE=6">6</option>
                </select>
                <select name="selectColour" onChange="FontCode(selectColour.options[selectColour.selectedIndex].value);document.frmAddMessage.selectColour.options[0].selected = true;">
                 <option value="0" selected>-- <% = strTxtFontColour %> --</option>
                 <option value="BLACK"><% = strTxtBlack %></option>
                 <option value="WHITE"><% = strTxtWhite %></option>
                 <option value="BLUE"><% = strTxtBlue %></option>
                 <option value="RED"><% = strTxtRed %></option>
                 <option value="GREEN"><% = strTxtGreen %></option>
                 <option value="YELLOW"><% = strTxtYellow %></option>
                 <option value="ORANGE"><% = strTxtOrange %></option>
                 <option value="BROWN"><% = strTxtBrown %></option>
                 <option value="MAGENTA"><% = strTxtMagenta %></option>
                 <option value="CYAN"><% = strTxtCyan %></option>
                 <option value="LIME GREEN"><% = strTxtLimeGreen %></option>
                </select>
               </td>
               <td width="127" align="right"><span class="text"><span style="font-size: <% = intSmallFontSize %>px;"><a href="JavaScript:openWin('forum_codes.asp','codes','toolbar=0,location=0,status=0,menubar=0,scrollbars=1,resizable=1,width=550,height=400')" style="font-size: <% = intSmallFontSize %>px;"><% = strTxtForumCodes %></a></span></span></td>
              </tr>
             </table>
             <table width="477" border="0" cellspacing="0" cellpadding="1">
              <tr> 
               <td width="337"><a href="JavaScript:AddMessageCode('B','<% = strTxtEnterBoldText %>', '')"><img src="<% = strImagePath %>post_button_bold.gif" width="25" height="24" align="absmiddle" border="0" alt="<% = strTxtBold %>"></a> 
                <a href="JavaScript:AddMessageCode('I','<% = strTxtEnterItalicText %>', '')"><img src="<% = strImagePath %>post_button_italic.gif" width="25" height="24" align="absmiddle" border="0" alt="<% = strTxtItalic %>"></a> 
                <a href="JavaScript:AddMessageCode('U','<% = strTxtEnterUnderlineText %>', '')"><img src="<% = strImagePath %>post_button_underline.gif" width="25" height="24" align="absmiddle" border="0" alt="<% = strTxtUnderline %>"></a> 
                <a href="JavaScript:AddCode('URL')"><img src="<% = strImagePath %>post_button_hyperlink.gif" width="25" height="24" align="absmiddle" border="0" alt="<% = strTxtAddHyperlink %>"></a> 
                <a href="JavaScript:AddCode('EMAIL')"><img src="<% = strImagePath %>post_button_email.gif" width="25" height="24" align="absmiddle" border="0" alt="<% = strTxtAddEmailLink %>"></a> 
                <a href="JavaScript:AddMessageCode('CENTER','<% = strTxtEnterCentredText %>', '')"><img src="<% = strImagePath %>post_button_centre.gif" width="25" height="24" align="absmiddle" border="0" alt="<% = strTxtCentre %>"></a> 
                <a href="JavaScript:AddCode('LIST', '')"><img src="<% = strImagePath %>post_button_list.gif" width="25" height="24" align="absmiddle" border="0" alt="<% = strTxtList %>"></a> 
                <a href="JavaScript:AddCode('INDENT', '')"><img src="<% = strImagePath %>post_button_indent.gif" width="25" height="24" align="absmiddle" border="0" alt="<% = strTxtIndent %>"></a> 
                <a href="JavaScript:AddCode('IMG')"><img src="<% = strImagePath %>post_button_image.gif" width="25" height="24" align="absmiddle" border="0" alt="<% = strTxtAddImage %>"></a> 
                <%
If blnEmoticons = True Then
 %>
                <a href="javascript:openWin('emoticons_smilies.asp','smilies','toolbar=0,location=0,status=0,menubar=0,scrollbars=0,resizable=1,width=400,height=400')"><img src="<% = strImagePath %>post_button_smiley.gif" width="25" height="24" align="absmiddle" alt="<% = strTxtEmoticonSmilies %>" border="0"></a> 
                <%
End If
%>
                </td>
               <td width="136" align="right"><span class="text"><% = strTxtMode %>:</span> 
                <select name="selectMode" onChange=PromptMode(this)>
                 <option value="1" selected><% = strTxtPrompt %></option>
                 <option value="0"><% = strTxtBasic %></option>
                </select>
               </td>
              </tr>
             </table>
            </td>
           </tr>
          </table>
         </td>
        </tr>
        <tr > 
         <td valign="top" align="right" width="15%" ><span class="text"><% = strTxtMessage %>*:</span></td>
         <td width="85%" valign="top"> 
          <textarea name="message" cols="57" rows="12"><% If strMode="edit" OR strMode = "quote" or strMode="editTopic" or strMode="PM" Then Response.Write strMessage %></textarea>
         </td>
        </tr>
        <%
        
'If not PM then display another row
If strMode <> "PM" Then 
	'If signature of e-mail notify then display row to show
	If ((blnLoggedInUserEmail = True AND blnEmail = True) AND ((blnModerator = False AND NOT lngLoggedInUserID = 1) OR (blnAdminEmail = False))) OR blnLoggedInUserSignature = True Then

%>
        <tr> 
         <td align="right" width="92">&nbsp;</td>
         <td width="508" valign="bottom" class="text"><%  
          
		'If the user has a signature offer them the chance to show it
		If blnLoggedInUserSignature = True Then %>
          &nbsp;<input type="checkbox" name="signature" value="True" checked><span class="text"><% = strTxtShowSignature %></span>&nbsp; 
          <%
		End If
	
		'Display e-mail notify of replies option
		If blnEmail = True AND blnLoggedInUserEmail = True AND ((blnModerator = False AND lngLoggedInUserID <> 1) OR (blnAdminEmail = False)) Then
%>
          &nbsp;<input type="checkbox" name="email" value="True"><span class="text"><% = strTxtEmailNotify %> </span>&nbsp; 
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
         <td width="508" valign="bottom" class="text">&nbsp;<input type="checkbox" name="email" value="True"><span class="text"><% = strTxtEmailNotifyWhenPMIsRead %></span>
         </td>
        </tr><%
End If
%>
        <td><%
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
         &nbsp;</td>
        <td width="85%" align="left"> 
         <p> 
          <%
If strMode="edit" OR strMode = "editTopic" Then
                            %>
          <input type="submit" name="Submit" value="<% = strTxtUpdatePost %>">
          <%
ElseIf strMode = "new" Then
                            %>
          <input type="submit" name="Submit" value="<% = strTxtNewTopic %>">
          <%
ElseIf strMode = "PM" Then
                            %>
          <input type="submit" name="Submit" value="<% = strTxtPostMessage %>">
          <%
Else
                            %>
          <input type="submit" name="Submit" value="<% = strTxtPostReply %>">
          <%
End If
                            %>
          <input type="button" name="Preview" value="<% = strTxtPreviewPost %>" onClick="OpenPreviewWindow()">
          <input type="reset" name="Reset" value="<% = strTxtResetForm %>">
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