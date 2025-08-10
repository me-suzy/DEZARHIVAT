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
Dim rsActiveUsers	'RS to hold the active users
Dim strIPAddress 	'Holds the uesrs IP address to keep track of em with
Dim dtmLoggedIn		'Holds the date/time the user logged in
Dim dtmLastActive	'Holds the date/time the user was last active
Dim strUserAgent	'Holds info on the users browser and os
Dim strOS		'Holds the users OS	
Dim strBrowserUserType	'Holds the users browser type
Dim intActiveUsers	'Holds the number of active users
Dim intActiveGuests	'Holds the number of active guests
Dim intActiveMembers	'Holds the number of logged in active members
Dim blnHideActiveUser 	'Holds if the user wants to be shown in the active users list
Dim lngActiveUsersID	'Hols the active users ID number

'Get the users details
strIPAddress = Request.ServerVariables("REMOTE_ADDR")
strUserAgent = Request.ServerVariables("HTTP_USER_AGENT")


'Get if the user wants to be shown in the active users list
If Request.Cookies("Forum")("Hide") = "True" Then
	blnHideActiveUser = 1
Else
	blnHideActiveUser = 0
End If

'Calculate the active users ID number
lngActiveUsersID = lngLoggedInUserID

'Set a non logged in person to the Guest account for the acitive users profile
If lngActiveUsersID = 0 Then lngActiveUsersID = 2

'Get the uesrs web browser
If InStr(1, strUserAgent, "Opera 3", 1) Then
	strBrowserUserType = "Opera 3"
ElseIf InStr(1, strUserAgent, "Opera 4", 1) Then
	strBrowserUserType = "Opera 4"
ElseIf InStr(1, strUserAgent, "Opera 5", 1) Then
	strBrowserUserType = "Opera 5"
ElseIf InStr(1, strUserAgent, "Opera 6", 1) Then
	strBrowserUserType = "Opera 6"
ElseIf InStr(1, strUserAgent, "Opera", 1) Then
	strBrowserUserType = "Opera"
	
ElseIf inStr(1, strUserAgent, "MSIE 6", 1) Then
	strBrowserUserType = "Microsoft IE 6"
ElseIf inStr(1, strUserAgent, "MSIE 5", 1) Then
	strBrowserUserType = "Microsoft IE 5"
ElseIf inStr(1, strUserAgent, "MSIE 4", 1) Then
	strBrowserUserType = "Microsoft IE 4"
ElseIf inStr(1, strUserAgent, "MSIE 3", 1) Then
	strBrowserUserType = "Microsoft IE 3"
	
ElseIf inStr(1, strUserAgent, "Mozilla/5", 1) OR inStr(1, strUserAgent, "Netscape6", 1) Then
	strBrowserUserType = "Netscape 6"
ElseIf inStr(1, strUserAgent, "Mozilla/4", 1) Then
	strBrowserUserType = "Netscape 4"
ElseIf inStr(1, strUserAgent, "Mozilla/3", 1) Then
	strBrowserUserType = "Netscape 3"
Else
	strBrowserUserType = "Unknown"
End If


'Get users OS
If inStr(1, strUserAgent, "NT 5.1", 1) Or inStr(1, strUserAgent, "Windows XP", 1) Then
	strOS = "Windows XP"
ElseIf inStr(1, strUserAgent, "NT 5", 1) Or inStr(1, strUserAgent, "Windows 2000", 1) Then
	strOS = "Windows 2000"
ElseIf inStr(1, strUserAgent, "NT", 1) Or inStr(1, strUserAgent, "WinNT", 1) Then
	strOS = "Windows  NT 4"
ElseIf inStr(1, strUserAgent, "95", 1) Or inStr(1, strUserAgent, "Win95", 1) Then
	strOS = "Windows 95"
ElseIf inStr(1, strUserAgent, "Win 9x 4.90", 1) Then
	strOS = "Windows ME"	
ElseIf inStr(1, strUserAgent, "98", 1) Or inStr(1, strUserAgent, "Win98", 1) Then
	strOS = "Windows 98"
ElseIf Instr(1, strUserAgent, "Windows 3.1", 1) or Instr(1, strUserAgent, "Win16", 1) Then
	strOS = "Windows 3.x"
ElseIf inStr(1, strUserAgent, "Macintosh", 1) OR inStr(1, strUserAgent, "Mac", 1) OR inStr(1, strUserAgent, "Macintosh;", 1) Then
	strOS = "Macintosh"
ElseIf inStr(1, strUserAgent, "Linux", 1) Then
	strOS = "Linux"
ElseIf inStr(1, strUserAgent, "Unix", 1) OR inStr(1, strUserAgent, "sunos", 1) OR inStr(1, strUserAgent, "X11", 1) Then
	strOS = "Unix"
ElseIf inStr(1, strUserAgent, "WebTV", 1) OR inStr(1, strUserAgent, "AOL_TV", 1) Then
	strOS = "Web TV"
Else
	strOS = "Unknown"
End If


'Intialise the ADO recordset object
Set rsActiveUsers = Server.CreateObject("ADODB.Recordset")

'Initialise the SQL variable with an SQL statement to get the active users details
If strDatabaseType = "SQLServer" Then
	strSQL = "EXECUTE wwfSpActiveUsersWhereIPis @strIPAddress = '" & strIPAddress & "'"
Else
	strSQL = "SELECT tblActiveUser.* From tblActiveUser WHERE IP='" & strIPAddress & "';"
End If

'Set the cursor type property of the record set to Dynamic so we can navigate through the record set
rsActiveUsers.CursorType = 2
	
'Set the Lock Type for the records so that the record set is only locked when it is updated
rsActiveUsers.LockType = 3

'Query the database
rsActiveUsers.Open strSQL, strCon

'If there are no records for this user then add them to the datatbase
If rsActiveUsers.EOF Then
	
	'Initilse sql statement
	If strDatabaseType = "SQLServer" Then
		strSQL = "EXECUTE wwfSpAddNewActiveUser @strIPAddress = '" & strIPAddress & "', @lngActiveUsersID = '" & lngActiveUsersID & "', @strOS = '" & strOS  & "', @strBrowserUserType = '" & strBrowserUserType & "', @blnHideActiveUser = '" & blnHideActiveUser & "'"
	Else
		strSQL = "INSERT INTO tblActiveUser (IP, Author_ID, OS, Browser, Hide) VALUES ('" & strIPAddress & "','" & lngActiveUsersID & "','" & strOS  & "','" & strBrowserUserType & "','" & blnHideActiveUser & "');"
	End If

	'Write to database
	adoCon.Execute(strSQL)
	
'Else if there's records returned then update them
Else
 	'Initilse sql statement
 	If strDatabaseType = "SQLServer" Then
		strSQL = "EXECUTE wwfSpUpdateActiveUser @lngActiveUsersID = '" & lngActiveUsersID & "', @blnHideActiveUser = '" & blnHideActiveUser & "', @strIPAddress = '" & strIPAddress & "'"
	Else
		strSQL = "UPDATE tblActiveUser SET tblActiveUser.Author_ID=" & lngActiveUsersID & ", tblActiveUser.Active=Now(), tblActiveUser.Hide=" & blnHideActiveUser & " WHERE IP='" & strIPAddress & "';"
	End If

	'Write to database
	adoCon.Execute(strSQL)	
End If

'Clean up old users
'Initilse sql statement
If strDatabaseType = "SQLServer" Then
	strSQL = "EXECUTE wwfSpDeleteActiveUser"
Else
	strSQL = "DELETE FROM tblActiveUser WHERE tblActiveUser.Active < Now() - 0.0070;"
End If

'Detlete from database
adoCon.Execute(strSQL)

'Delete older second entries if the uesr has returned in under 10 minutes with a new IP
If lngActiveUsersID <> 2 Then
	If strDatabaseType = "SQLServer" Then
		strSQL = "EXECUTE wwfSpDeleteActiveUserDoubleEntry @lngActiveUsersID = " & lngActiveUsersID & ", @strIPAddress = '" & strIPAddress & "'"
	Else
		strSQL = "DELETE FROM tblActiveUser WHERE tblActiveUser.Author_ID=" & lngActiveUsersID & " AND tblActiveUser.IP <> '" & strIPAddress & "';"
	End If

	'Detlete from database
	adoCon.Execute(strSQL)
End If

'Requery the database to allow access to catch up
rsActiveUsers.Requery

'Close the recordset
rsActiveUsers.Close
Set rsActiveUsers = Nothing

'To save another database hit we can get the number of members online by taking the number of guest away from the total active users
intActiveMembers = intActiveUsers - intActiveGuests
%>