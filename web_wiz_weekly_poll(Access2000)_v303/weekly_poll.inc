<%
'****************************************************************************************
'**  Copyright Notice    
'**
'**  Web Wiz Guide ASP Weekly Poll
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
<!--#include file="common.inc" -->
<%
'Dimension variables
Dim rsWeeklyPoll 		'Database Recordset Variable to hold the eweekly poll recordset
Dim strPollQuestion 		'Holds the poll question
Dim intPollIDNum		'Holds the Poll ID Num
Dim intSelectionLoopCounter	'Loop counter to display the poll selections
Dim intVotedIDNo		'Holds the ID Number the last vote the user voted in if there is one
Dim blnCheckForPoll		'Set to false if there are no weekly polls in the database
Dim blnAlreadyVoted		'Set to true if the user has voted in this weeks poll


'Intilaise variables
blnCheckForPoll = True
blnAlreadyVoted = False
intPollIDNum = 1


'Create a recordset object
Set rsWeeklyPoll = Server.CreateObject("ADODB.Recordset")

'Initalise the strSQL variable with an SQL statement to query the database
strSQL = "SELECT TOP 1 tblPolls.* FROM tblPolls ORDER By tblPolls.id_no DESC;"

'Set the cursor type property of the record set to Dynamic so we can navigate through the record set
rsWeeklyPoll.CursorType = 2
	
'Set the Lock Type for the records so that the record set is only locked when it is deleteed
rsWeeklyPoll.LockType = 3

'Query the database
rsWeeklyPoll.Open strSQL, strCon



'Check there is a weekly poll to display
If rsWeeklyPoll.EOF Then

	'If there is no weekly poll in the database chenge the blnCheckForPoll variable to false
	blnCheckForPoll = False	

Else 
	
	'Read in the polling question from the database
	strPollQuestion = rsWeeklyPoll("Question")	
	
	'Read in the Weekly Poll ID number
	intPollIDNum = CInt(rsWeeklyPoll("id_no"))
	
	'Loop round to read in the number of votes cast
	For intReadInVotesLoopCounter = 1 To 7
		
		'Read in the total number of votes cast
		intToatalPollVotes = intToatalPollVotes + CInt(rsWeeklyPoll("Votes_" & intReadInVotesLoopCounter & ""))
	Next
	
	'Check the user has not already voted by reading in a cookie from there system
	'Read in the Poll ID number of the last poll the user has voted in
	intVotedIDNo = CInt(Request.Cookies("Poll")("PollID"))
	
	'If the user has already voted then redirect them to the results page
	If intVotedIDNo = intPollIDNum Then blnAlreadyVoted = True
	
End If
%>
<script  language="JavaScript">
<!-- Hide from older browsers...

//Function to open pop up window
function openWin(theURL,winName,features) {
  	window.open(theURL,winName,features);
}

// -->
</script>

<style type="Text/css">
<!--
.pollText {font-family: <% = strTextType %>; font-size: <% = intTextSize %>px; color: <% = strTextColour %>}
.smPollText {font-family: <% = strTextType %>; font-size: <% = intSmTextSize %>px; color: <% = strTextColour %>;}
a.Poll {font-family: <% = strTextType %>; font-size: <% = intSmTextSize %>px; color: <% = strLinkColour %>}
a.Poll:hover {font-family: <% = strTextType %>; font-size: <% = intSmTextSize %>px; color: <% = strHoverLinkColour %>}
a.Poll:visited {font-family: <% = strTextType %>; font-size: <% = intSmTextSize %>px; color: <% = strVisitedLinkColour %>}
a.Poll:visited:hover {font-family: <% = strTextType %>; font-size: <% = intSmTextSize %>px; color: <% = strHoverLinkColour %>}
-->
</style>
<table width="145" border="0" cellspacing="0" cellpadding="1" bgcolor="<% = strTableBorderColour %>">
  <tr> 
    <td> 
      <table width="100%" border="0" cellspacing="0" cellpadding="2" bgcolor="<% = strTableColour %>">
        <form method="post" action="<% = strRootPath %>weekly_poll.asp" target="poll" onSubmit="window.open('', 'poll', 'toolbar=0,location=0,status=0,menubar=0,scrollbars=1,resizable=1,width=505,height=400')">
        <tr> 
          <td> 
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr align="center"> 
                <td colspan="2"> 
                  <table width="100%" border="0" cellspacing="0" cellpadding="3">
                    <tr> 
                      <td align="center" class="pollText" style="font-weight: bold;">Weekly Poll</td>
                    </tr>
                  </table>
                </td>
              </tr>
              <tr> 
                <td colspan="2"><span class="smPollText" style="font-size: <% = intSmTextSize + 1 %>;"><% = strPollQuestion %></span></td>
              </tr>
              <%
'If there is a weekly poll to display then write the HTML to display it
If blnCheckForPoll = True Then

	'Loop to display each of the selection choices for the poll
	For intSelectionLoopCounter = 1 To 7
		
		'If there is a Selection choice then display the HTML to show it
		If NOT rsWeeklyPoll("Selection_" & intSelectionLoopCounter) = "" Then
		
			If blnAlreadyVoted = False Then		
				'Display a radio button for the selection choice
				Response.Write vbCrLf & "	<tr><td colspan=""2""><span class=""smPollText""><input type=""radio"" name=""PollVote"" value=""Votes_" & intSelectionLoopCounter & """>"
					
				'Display the selection choice
				Response.Write vbCrLf & "	" & rsWeeklyPoll("Selection_" & intSelectionLoopCounter) & "</span></td></tr>"
				
			Else
			
				'If there are no votes yet then format the percent by 0 otherwise the sums corse problems
				If intToatalPollVotes = 0 Then 
					dblPollVotePercentage = FormatPercent(0, 0)
					
				Else
					'Read in the the percentage of votes cast for the vote choice
					dblPollVotePercentage = FormatPercent((rsWeeklyPoll("Votes_" & intSelectionLoopCounter) / intToatalPollVotes), 0)
				End If
				
				'Display the selection choice results
				Response.Write vbCrLf & "  	     <tr>"
				Response.Write vbCrLf & "  	       <td colspan=""2""><span  class=""smPollText"">" & rsWeeklyPoll("Selection_" & intSelectionLoopCounter) & "</span></td>"
				Response.Write vbCrLf & "  	     </tr>"
				Response.Write vbCrLf & "  	     <tr>"
				Response.Write vbCrLf & "  	     <td width=""110""><img src=""" & strRootPath & "bar_graph_image.gif"" width=""" & dblPollVotePercentage & """ height=""11""></td>"
				Response.Write vbCrLf & "  	     <td width=""25"" align=""right""><span class=""smPollText"">" & dblPollVotePercentage & "</span></td>"
				Response.Write vbCrLf & "  	     </tr>"
			
			End If
		End If
	Next	
			
	%>
              <tr align="center"> 
                <td colspan="2"> 
                  <%
        'If the user has not voted then display a vote button
        If blnAlreadyVoted = False Then	
        %>
                  <input type="hidden" name="id" value="<% = intPollIDNum %>">
                  <input type="submit" value="Vote" name="submit">
                  <%
        'Display the totla number of votes
        Else
	        'Display the total votes cast    
		Response.Write vbCrLf & "		<span  class=""smPollText"">Total Votes: " & intToatalPollVotes & "</span>"
	End If

'Else if there is no weekly poll display the appropriate message
Else	
	Response.Write vbCrLf & "<tr><td><span class=""pollText"">There is no Weekly Poll to display</span></td></tr>"
End If	


'Reset Server Objects
Set adoWeeklyPollConnection = Nothing
rsWeeklyPoll.Close
Set rsWeeklyPoll = Nothing 
      
%>
                </td>
              </tr>
              <tr align="center"> 
                <td colspan="2"><a href="JavaScript:openWin('<% = strRootPath %>weekly_poll.asp?ID=<% = intPollIDNum %>','poll','toolbar=0,location=0,status=0,menubar=0,scrollbars=1,resizable=1,width=505,height=400')" class="Poll" style="font-size: 10px; pollText-decoration: none;">View Results</a></td>
              </tr>
            </table>
          </td>
        </tr>
        </form>
      </table>
    </td>
  </tr>
</table>

