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
%>
	<span class="text"><% = strTxtForumJump %></span>
	 <select onChange="ForumJump(this)" name="SelectJumpForum">
           <option value="" selected>-- <% = strTxtSelectForum %> --</option>
<%
'Declare variables
Dim rsForumJumpCat		'Holds the recordset for the categories
Dim rsForumJumpForum		'Holds the recordset for the forum
Dim strJumpCatName		'Holds the name of the category
Dim intJumpCatID		'Holds the ID number of the category
Dim strJumpForumName		'Holds the name of the forum to jump to
Dim lngJumpForumID		'Holds the forum id to jump to
Dim intSecurityLevel		'Holds the users security level

'Create a recordset to hold the forum name and id number
Set rsForumJumpCat = Server.CreateObject("ADODB.Recordset")

'Create a recordset to hold the forum name and id number
Set rsForumJumpForum = Server.CreateObject("ADODB.Recordset")


'Read in the category name from the database
'Initalise the strSQL variable with an SQL statement to query the database
If strDatabaseType = "SQLServer" Then
	strSQL = "EXECUTE wwfSpCategoryAll"
Else
	strSQL = "SELECT tblCategory.Cat_name, tblCategory.Cat_ID FROM tblCategory ORDER BY tblCategory.Cat_order ASC;"
End If

'Query the database
rsForumJumpCat.Open strSQL, strCon

'Loop through all the categories in the database
Do while NOT rsForumJumpCat.EOF 

	'Read in the deatils for the category
	strJumpCatName = rsForumJumpCat("Cat_name")
	intJumpCatID = Cint(rsForumJumpCat("Cat_ID"))	
	
	'Display a link in the link list to the forum
	Response.Write vbCrLf & "		<option value="""">" & strJumpCatName & "</option>"

	'Read in the forum name from the database
	'Initalise the strSQL variable with an SQL statement to query the database
	If strDatabaseType = "SQLServer" Then
		strSQL = "EXECUTE wwfSpForumsAllWhereCatIs @intCatID = " & intJumpCatID
	Else
		strSQL = "SELECT tblForum.Forum_name, tblForum.Forum_ID, tblForum." &  strMemberStatus & " FROM tblForum WHERE tblForum.Cat_ID = " & intJumpCatID & " ORDER BY tblForum.Forum_Order ASC;"
	End If
	
	'Query the database
	rsForumJumpForum.Open strSQL, strCon
	
	'Loop through all the froum in the database
	Do while NOT rsForumJumpForum.EOF 
	
		'Read in the forum details from the recordset
		strJumpForumName = rsForumJumpForum("Forum_name")
		lngJumpForumID = CLng(rsForumJumpForum("Forum_ID"))
		intSecurityLevel = CInt(rsForumJumpForum(strMemberStatus))
	
		'If the user is the forum admin or moderator then set there security level to 1 (read and write)
		If lngLoggedInUserID = 1 OR blnModerator = True Then intSecurityLevel = 1
		
		'If the user has security clearence for that forum then display it in the forum jump box
		If intSecurityLevel < 3 Then
			'Display a link in the link list to the forum
			Response.Write vbCrLf & "		<option value=""display_forum_topics.asp?ForumID=" & lngJumpForumID & """>&nbsp;&nbsp;-&nbsp;" & strJumpForumName & "</option>"		
		End If
				
		'Move to the next record in the recordset
		rsForumJumpForum.MoveNext
	Loop
	
	'Close the forum recordset so another can be opened
	rsForumJumpForum.Close
	
	'Move to the next record in the recordset
	rsForumJumpCat.MoveNext
Loop

'Reset Server Objects
rsForumJumpCat.Close
Set rsForumJumpCat = Nothing
Set rsForumJumpForum = Nothing
%>
         </select>