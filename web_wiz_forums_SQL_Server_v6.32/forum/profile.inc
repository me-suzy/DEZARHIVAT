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

'Dimension variables
Dim rsModerators		'Holds the recordset object for the moderators
Dim rsProfile 			'Holds the Database Recordset for the author profile
Dim lngProfileNum		'Holds the user's number to get the profile on
Dim strUsername			'Holds the new users username
Dim strPassword			'Holds the new users password
Dim strEmail			'Holds the new users e-mail address
Dim blnShowEmail		'Boolean set to true if the user wishes there e-mail address to be shown
Dim strLocation			'Holds the new users location
Dim strHomepage			'Holds the new users homepage if they have one
Dim strCheckUsername		'Holds the usernames from the database recordset to check against the new users requested username
Dim lngUserID			'Holds the new users ID number
Dim lngNumOfPosts		'Holds the number of posts the user has made
Dim dtmRegisteredDate		'Holds the date the usre registered
Dim blnProfileReturned		'Boolean set to false if the user's profile is not found in the database
Dim blnGuestUser		'Set to True if the user is a guest or not logged in
Dim intStatus			'Holds integer status of the member
Dim strStatus			'Holds string status of member
Dim blnAModerator		'set to true if the user is a moderator on any forum
Dim blnActive			'Set to true if the forum membership is active
Dim strAuthorAvatar		'Holds the users avatar


'Initalise variables
blnProfileReturned = True
blnGuestUser = False
blnShowEmail = False
blnAModerator = False



'Read in the profile number to get the details on
lngProfileNum = CLng(Request.QueryString("profile"))

'If the user has logged in then the Logged In User ID number will be more than 0
If NOT lngLoggedInUserID = 0 Then

	'Intialise the ADO recordset object
	Set rsProfile = Server.CreateObject("ADODB.Recordset")
	
	'Initalise the strSQL variable with an SQL statement to query the database
	strSQL = "SELECT tblAuthor.* "
	strSQL = strSQL & "FROM tblAuthor "
	strSQL = strSQL & "WHERE tblAuthor.Author_ID = " & lngProfileNum
	
	'Set the cursor and locktype so the recordset can be updated
	rsProfile.CursorType = 2
	rsProfile.LockType = 3
		
	'Query the database
	rsProfile.Open strSQL, strCon
	
	'If there is a matching profile returned by the recordset then read in the details
	If NOT rsProfile.EOF Then
		
		'Intialise the ADO recordset object
		Set rsModerators = Server.CreateObject("ADODB.Recordset")
		
		'If the moderator admin has admin rights then see if they are a moderator or not
		If blnModeratorAdmin = True Then 
			
			'Now we need to see if the user is a moderator as if they are they will have edit options
			'Initalise the strSQL variable with an SQL statement to query the database to get the email address of the moderator(s) for this forum
			strSQL = "SELECT tblModerator.Moderator_ID FROM tblModerator "
			strSQL = strSQL & "WHERE tblModerator.Author_ID=" & CLng(lngLoggedInUserID) & ";"
				
			'Query the database
			rsModerators.Open strSQL, strCon
			
			'If a record is returned then the ueser is a moderator
			If NOT rsModerators.EOF then blnAModerator = True
			
			'Close recordset
			rsModerators.Close
		End If
		
		'If the profile is updated then update the recordset
		If Request.Form("postBack") = "doIt" AND (lngLoggedInUserID = 1 or blnAModerator = True) Then

			'Update the database
			rsProfile("Status") = CLng(Request.Form("memLevel"))
			rsProfile("Active") = CBool(Request.Form("memActive"))
			
			'If the admin has selected to remove the signature remove it
			If CBool(Request.Form("signature")) = True Then
				rsProfile("Signature") = ""
			End If
			
			'If the admin has selected to remove the avatar remove it
			If CBool(Request.Form("avatar")) = True Then
				rsProfile("Avatar") = ""
			End If
			
			rsProfile.Update
			
			'Requiry db to get updated recordset
			rsProfile.Requery
		End If
		
		
		'Read in the profile from the recordset
		lngUserID = CLng(rsProfile("Author_ID"))
		strUsername = rsProfile("Username")
		strEmail = rsProfile("Author_email")
		blnShowEmail = CBool(rsProfile("Show_email"))
		strHomepage = rsProfile("Homepage")
		strLocation = rsProfile("Location")
		lngNumOfPosts = CLng(rsProfile("No_of_posts"))
		dtmRegisteredDate = CDate(rsProfile("Join_date"))
		intStatus = CLng(rsProfile("Status"))
		blnActive = CBool(rsProfile("Active"))
		strAuthorAvatar = rsProfile("Avatar")
		
		'Close the recordset
		rsProfile.Close
		
		'If the users account is not active make there account level guest
		If blnActive = False Then intStatus = 0
		
		'Turn the members status number returned from the database into a string value
		Select Case intStatus
			'Guest status
			Case 0
				strStatus = strTxtGuest & "&nbsp;<img src=""" & strImagePath & "0_star_rating.gif"" alt=""" & strTxtGuest & """>"  
			'Standard member status
			Case 1
				strStatus = strTxtStandardMember & "&nbsp;<img src=""" & strImagePath & "1_star_rating.gif"" alt=""" & strTxtStandardMember & """>" 
			'Super member status
			Case 2
				strStatus = strTxtGoldMember & "&nbsp;<img src=""" & strImagePath & "2_star_rating.gif"" alt=""" & strTxtGoldMember & """>" 
			'Power member status
			Case 3
				strStatus = strTxtPlatinumMember & "&nbsp;<img src=""" & strImagePath & "3_star_rating.gif"" alt=""" & strTxtPlatinumMember & """>" 
		End select
		
		
			
		'Now we need to see if the profile is a moderator as if they are they will have edit options
		'Initalise the strSQL variable with an SQL statement to query the database to get the email address of the moderator(s) for this forum
		strSQL = "SELECT TOP 1 tblModerator.Moderator_ID FROM tblModerator "
		strSQL = strSQL & "WHERE tblModerator.Author_ID=" & CLng(lngUserID) & " AND (tblModerator.Forum_ID=" & CLng(Request.QueryString("ForumID")) & " OR tblModerator.Forum_ID=0);"
			
		'Query the database
		rsModerators.Open strSQL, strCon
		
		'If theres a record returened then this member is a moderator of this forum
		If NOT rsModerators.EOF Then strStatus = strTxtForumModerator & "&nbsp;<img src=""" & strImagePath & "4_star_rating.gif"" alt=""" & strTxtForumModerator & """>" 
					'Close the recordset
		rsModerators.Close
		
			
			
		'Clear up objects
		Set rsModerators = Nothing
		
		'If the profile is the administrator then display forum admin
		If lngUserID = 1 Then strStatus = strTxtForumAdministrator & "&nbsp;<img src=""" & strImagePath & "5_star_rating.gif"" alt=""" & strTxtForumAdministrator & """>" 
	
	'If there is no profile returned by the recorset then set the ProfileReturned boolean to False
	Else
		blnProfileReturned = False
	End If

'Else the user is not logged in
Else
	'Set the Guest User boolean to true as the user must be a guest
	blnGuestUser = True

End If

'Reset server objects
Set rsProfile = Nothing
Set adoCon = Nothing
Set strCon = Nothing


'If no profile can be found then display the appropriate message
If blnProfileReturned = False Then
	
	Response.Write vbCrLf & "<span class=""text"">" & strTxtNoUserProfileFound & "</span>"

'If the user is a guest then tell them they must register or login before they can view other users profiles
ElseIf blnGuestUser = True Then

	Response.Write vbCrLf & "<span class=""text"">" & strTxtRegisteredToViewProfile & "</span><br><br>"

Else
 	
 	'If the user is a moderator or the forum admin then they can change the profile
     	If lngLoggedInUserID = 1 or (blnAModerator = True AND (lngUserID > 3)) Then %>
 <form action="<% = strReturnProfilePage %>?profile=<% = lngProfileNum %>" name="frmProfile" method="post">
  <% 	End If 
%>
 <table width="330" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="<% = strTableBorderColour %>">
  <tr> 
   <td> 
    <table width="100%" border="0" cellspacing="1" cellpadding="1">
     <tr> 
      <td bgcolor="<% = strProfileBgColour %>" background="<% = strProfileBgImage %>"> 
       <table width="100%" border="0" cellspacing="0" cellpadding="1">
        <tr background="<% = strProfileBgImage %>"> 
         <td width="86%" valign="top" class="heading"><% 
        
        'Display the profile username   	
      	Response.Write(strUsername)
        
      	'If the user is a moderator or the forum admin then they can change the profile
     	If (lngLoggedInUserID = 1 or blnAModerator = True) AND lngUserID > 2 Then %>
          <select name="memLevel">
           <option value="0"<% If intStatus = 0 Then Response.Write(" selected") %>><% = strTxtGuest %></option>
           <option value="1"<% If intStatus = 1 Then Response.Write(" selected") %>><% = strTxtStandardMember %></option>
           <option value="2"<% If intStatus = 2 Then Response.Write(" selected") %>><% = strTxtGoldMember %></option>
           <option value="3"<% If intStatus = 3 Then Response.Write(" selected") %>><% = strTxtPlatinumMember %></option>
          </select>
          <% End If 
         %></td>
         <td width="14%" rowspan="2"><%
        'If the user has an avatar then display it
        If blnAvatar = True AND NOT strAuthorAvatar = "" Then 
        	Response.Write("<img src=""" & strAuthorAvatar & """ width=""" & intAvatarWidth & """ height=""" & intAvatarHeight & """ alt=""" & strTxtAvatar & """ OnError=""this.src='avatars/blank.gif', height='0';"">")
       	End If
        %></td>
        </tr>
        <tr> 
         <td width="86%" valign="top" class="text"><% = strStatus %></td>
        </tr>
       </table>
      </td>
     </tr>
     <tr> 
      <td bgcolor="<% = strTableColour %>" background="<% = strTableBgImage %>"> 
       <table width="350" border="0" align="center" cellpadding="2" cellspacing="0">
        <tr> 
         <td align="right" width="87" class="bold"><% = strTxtLocation %></td>
         <td width="252" valign="top" class="text"><%
         'If no location given then display none given
         If strLocation = "" Then
         	Response.Write(strTxtNotGiven) 
         Else
         	Response.Write(strLocation)
         End If
         %></td>
        </tr>
        <tr> 
         <td align="right" width="87" class="bold"><% = strTxtEmail %></td>
         <td width="252" valign="top" class="text"><%  
          
        'If the user has choosen not to display there e-mail then this field will show private
	If blnShowEmail = False AND NOT lngLoggedInUserID = 1 Then
        	Response.Write(strTxtPrivate)
        'If no password then display not given	
        ElseIf strEmail = "" Then
            	Response.Write(strTxtNotGiven) 
        'Else the user allows there e-mail address to be shown so show there e-mail address
        Else
            	Response.Write "<a href=""mailto:" & strEmail & """>" & strEmail & "</a>"
        End If           
            
           
    %></td>
        </tr>
        <tr> 
         <td align="right" width="87" class="bold"><% = strTxtHomepage %></td>
         <td width="252" valign="top" class="text"><%
         
         'If no homepage given then display none given
         If strHomepage = "" Then
         	Response.Write(strTxtNotGiven) 
         Else
         	Response.Write("<a href=""" & strHomepage & """ target=""_blank"">" & strHomepage & "</a>")
         End If
         %></td>
        </tr>
        <tr> 
         <td align="right" width="87" class="bold"><% = strTxtJoined %></td>
         <td width="252" valign="top" class="text"><% = DateFormat(dtmRegisteredDate, saryDateTimeData) %></td>
        </tr>
        <tr> 
         <td align="right" width="87" class="bold"><% = strTxtPosts %></td>
         <td width="252" valign="top" class="text"><% = lngNumOfPosts %>&nbsp;</td>
        </tr>
        <tr> 
         <td align="right" width="87" class="bold"><% = strTxtMembership %></td>
         <td width="252" class="text"><% 
         
        'If the profile account is active then display active if not display not active
   	If blnActive = True Then
   		Response.Write(strTxtActive) 
   	Else
   		Response.Write(strNotActive)
   	End If
   	
   	'If the user is a moderator or the forum admin then let them suspend the user, unless it's admin account
     	If (lngLoggedInUserID = 1 or blnAModerator = True) AND lngUserID > 2 Then %>
          <select name="memActive">
           <option value="true"<% If blnActive = True Then Response.Write(" selected") %>><% = strTxtActive %></option>
           <option value="false"<% If blnActive = False Then Response.Write(" selected") %>><% = strTxtSuspended %></option>
          </select>
          <%
        End If
        %>
         </td>
        </tr>
       </table>
      </td>
     </tr>
    </table>
   </td>
  </tr>
 </table><% 
	'If the user is a moderator or the forum admin then they can change the profile
	If lngLoggedInUserID = 1 or (blnAModerator = True AND (lngUserID > 2)) Then 

%>
 <table width="349" border="0" cellspacing="0" cellpadding="1" align="center" height="14">
  <tr>
   <td>
    <input type="checkbox" name="avatar" value="true"> <span class="text"><% = strTxtRemoveAvatar %></span></td>
   <td align="right">
    <input type="checkbox" name="signature" value="true"> <span class="text"><% = strTxtRemoveSignature %></span></td>
  </tr>
 </table><%
	End If
%>
 <br>
<% 
	'If the user is a moderator or the forum admin then they can change the profile
	If lngLoggedInUserID = 1 or (blnAModerator = True AND (lngUserID > 3)) Then 

%>  <table width="349" border="0" cellspacing="0" cellpadding="1" align="center" height="14">
  <tr>
   <td align="center">
    <input type="hidden" name="postBack" value="doIt">
    <input type="submit" name="Submit" value="<% = strTxtUpdateAccount %>"><%
    		'If this is the admin give them the option to delete the account
    		If lngLoggedInUserID = 1 AND lngUserID > 3 Then
    		%>
    <td align="center">
    <input type="button" name="Submit" value="<% = strTxtDeleteMember %>" OnClick="if (window.confirm('<% = strTxtDeleteMemberCheck %>')) window.open('delete_member.asp?ID=<% = lngUserID %>','_self');">
    </tr><%
		End If
%>
 </table>	
  </form>
   <%
   	End If 
End If 
   
%>