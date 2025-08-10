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


'Declare varibles
Dim rsSecurityLevel		'Holds the recordset for the security setting
Dim intMemberSecurityLevel	'Holds the security level of the forum
Dim strMemberStatus		'Holds the string version of thye members status level


'Turn the members status number returned from the database into a string value
Select Case intMemberStatus
	'Guest status
	Case 0
		strMemberStatus = "Guest"
	'Standard member status
	Case 1
		strMemberStatus = "Standard"
	'Super member status
	Case 2
		strMemberStatus = "Super"
	'Power member status
	Case 3
		strMemberStatus = "Power"
End select


'Get the security level for the member within this forum
If Request.QueryString("ForumID") <> "" Then
		
	'Intialise the ADO recordset object
	Set rsSecurityLevel = Server.CreateObject("ADODB.Recordset")
	
	'Initlise the sql statement
	If strDatabaseType = "SQLServer" Then
		strSQL = "EXECUTE wwfSpForumsAllWhereForumIs @intForumID = " & CInt(Request("ForumID"))
	Else
		strSQL = "SELECT tblForum." & strMemberStatus & " FROM tblForum WHERE tblForum.Forum_ID=" & CInt(Request("ForumID")) & "; "
	End If
	
	'Query the database
	rsSecurityLevel.Open strSQL, strCon
				
	'If theres a record returned then get the security level of the user on this forum
	If NOT rsSecurityLevel.EOF Then 
		intMemberSecurityLevel = CInt(rsSecurityLevel(strMemberStatus))
	End If
				
	'Get rid of them objects
	rsSecurityLevel.Close
	Set rsSecurityLevel = Nothing	
End If

'If the user is the forum admin or moderator then set there security level to 1 (read and write)
If lngLoggedInUserID = 1 OR blnModerator = True Then intMemberSecurityLevel = 1

'If the security level for this user on this forum is 3 they don't have permission to view this forum so send them elsewhere
If intMemberSecurityLevel = 3 Then
	
	'Reset Server Objects
	Set adoCon = Nothing
	Set strCon = Nothing
	
	'Redirect to no permission page
	Response.Redirect("insufficient_permission.asp?" & Request.ServerVariables("QUERY_STRING"))
End If
%>