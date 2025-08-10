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

'Declare variables
Dim rsPmCheckNew	'db recordset holding any new pm's since last vist
Dim intNumOfNewPM	'Hols the number of new pm's



'If the user is logged in and there account is active display if they have private messages
If lngLoggedInUserID <> 2 AND lngLoggedInUserID <> 0 AND intMemberStatus <> 0 AND blnPrivateMessages = True Then
	
	'Intialise the ADO recordset object
	Set rsPmCheckNew = Server.CreateObject("ADODB.Recordset")
		
	'Initlise the sql statement
	If strDatabaseType = "SQLServer" Then
		strSQL = "EXECUTE wwfSpCountOfPMs @lngLoggedInUserID = " & lngLoggedInUserID
	Else
		strSQL = "SELECT Count(tblPMMessage.PM_ID) AS CountOfPM FROM tblPMMessage "
		strSQL = strSQL & "WHERE tblPMMessage.Read_Post = 0 AND tblPMMessage.Author_ID = " & lngLoggedInUserID & ";"
	End If
	
	'Query the database
	rsPmCheckNew.Open strSQL, strCon
	
	'If there are no new messages then display so
	If CLng(rsPmCheckNew("CountOfPM")) = 0 Then
	 	
	 	Response.Write("<img src=""" & strImagePath & "e-mail_topic.gif"" align=""middle"" alt=" & strTxtReadMessage & "> <a href=""pm_welcome.asp"" target=""_self"" style=""font-size: " & intSmallFontSize & "px;"">" & strTxtPrivateMessenger & "</a>")
	
	'Else there are new pm's so display how many
	Else  
		'Get the number of new pm's this user has
		intNumOfNewPM = CInt(rsPmCheckNew("CountOfPM"))
	
		'Display the number of new pm's
		Response.Write("<img src=""" & strImagePath & "unread_private_message.gif"" alt=" & strTxtUnreadMessage & "> <a href=""pm_welcome.asp"" target=""_self"" style=""font-size: " & intSmallFontSize & "px;"">" & strTxtPrivateMessenger & "</a><span class=""text"" style=""font-size: " & intSmallFontSize & "px;""> (" & intNumOfNewPM & " " & strTxtNew & ")</span>")
		
		'Close the recodset
		rsPmCheckNew.Close
		
		'Now get the date of the last PM
		If strDatabaseType = "SQLServer" Then
			strSQL = "EXECUTE wwfSpDateOfLastUnReadPM @lngLoggedInUserID = " & lngLoggedInUserID
		Else
			strSQL = "SELECT TOP 1 tblPMMessage.PM_Message_Date FROM tblPMMessage "
			strSQL = strSQL & "WHERE tblPMMessage.Read_Post = 0 AND tblPMMessage.Author_ID = " & lngLoggedInUserID & " "
			strSQL = strSQL & "ORDER BY PM_Message_Date DESC;"
		End If
		
		'Query the database
		rsPmCheckNew.Open strSQL, strCon
		
		'Display alert box if there are new pm's unless they aready have been told
		If session("pmDate") = Null OR (CDate(session("pmDate")) < CDate(rsPmCheckNew("PM_Message_Date"))) Then
			
			'Set the session varaible to the last messge date
			session("pmDate") = CDate(rsPmCheckNew("PM_Message_Date"))
			
			'Display the alert
			Response.Write("<script  language=""JavaScript""><!-- ")
			Response.Write(vbCrLf & vbCrLf & "//Display pop for new private message")
			Response.Write(vbCrLf & "checkPrivateMsg = confirm('" & strTxtYouHave & " " & intNumOfNewPM & " " & strTxtNewPMsClickToGoNowToPM & "')")
			Response.Write(vbCrLf & "if (checkPrivateMsg == true) {")
			Response.Write(vbCrLf & "	window.location='pm_welcome.asp'")
			Response.Write(vbCrLf & "}")
			Response.Write(vbCrLf & "// --></script>")
		End If
	End If
	
	'Relese server objects
	rsPmCheckNew.Close
	Set rsPmCheckNew = Nothing
End If
%>