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


'Function to format date
Private Function DateFormat(dtmDate)

	Dim rsDateFormat	'Recordset object to hold the data settings from the database
	Dim strNewDate		'Holds the new date format
	Dim intDay		'Holds the integer number for the day
	Dim intMonth		'Holds a integer number from 1 to 12 for the month
	Dim strMonth		'Holds the month in it's final format which may be a number or a string so it is set to a sring value
	Dim intYear		'Holds the year
	Dim dtmTempDate		'Temprary storage area for date

	'Craete a recordset to get the date format data
	Set rsDateFormat = Server.CreateObject("ADODB.Recordset")
	
	'Initalise the strSQL variable with an SQL statement to query the database
	strSQL = "SELECT tblDateTimeFormat.* FROM tblDateTimeFormat;"
	
	'Query the database
	rsDateFormat.Open strSQL, strCon
	
	
	'If the recordset is empty set the date as UK
	If rsDateFormat.EOF Then
		
		'Set the date as orginal
		DateFormat = dtmDate
		
	'If there is a record in the recordset then format the date
	Else
		'Place the server time off set onto the recorded database time
		If rsDateFormat("Server_offset") = "+" Then
			dtmTempDate = DateAdd("h", + CInt(rsDateFormat("Server_offset_hours")), dtmDate)
		ElseIf rsDateFormat("Server_offset") = "-" Then
			dtmTempDate = DateAdd("h", - CInt(rsDateFormat("Server_offset_hours")), dtmDate)
		End If
		
		'Seprate the date into differnet strings
		intDay = CInt(Day(dtmTempDate))
		intMonth = CInt(Month(dtmTempDate))
		intYear = CInt(Year(dtmTempDate))
		
		'Place 0 infront of days under 10
		If intDay < 10 then intDay = "0" & intDay
	
		'If the year is two digits then sorten the year string
		If rsDateFormat("Year_format") = "short" Then intYear = Right(intYear, 2)
		
		'Format the month
		strMonth = rsDateFormat("Month" & intMonth)
		
		'Format the date
		Select Case rsDateFormat("Date_format")
			
			'Format dd/mm/yy
			Case "dd/mm/yy"
				DateFormat = intDay & rsDateFormat("Seporator") & strMonth & rsDateFormat("Seporator") & intYear
			
			'Format mm/dd/yy
			Case "mm/dd/yy"
				DateFormat = strMonth & rsDateFormat("Seporator") & intDay & rsDateFormat("Seporator") & intYear	
		
			'Format yy/dd/mm
			Case "yy/dd/mm"
				DateFormat = intYear & rsDateFormat("Seporator") & intDay & rsDateFormat("Seporator") & strMonth
			
			'Format yy/mm/dd
			Case "yy/mm/dd"
				DateFormat = intYear & rsDateFormat("Seporator") & strMonth & rsDateFormat("Seporator") & intDay		
		End Select	
	
	End If	

	'Release server variables
	rsDateFormat.Close
	Set rsDateFormat = Nothing
	
End Function

strCode = "&#110;&#111;&#108;&#105;&#110;&#107;&#115;&#050;&#048;&#048;&#050;"
strCodeField = "L_&#099;&#111;&#100;&#101;"

'Function to format time
Function TimeFormat(dtmTime)

	Dim rsTimeFormat	'Recordset object to hold the data settings from the database
	Dim strNewDate		'Holds the new date format
	Dim intHour		'Holds the integer number for the hours
	Dim intMinute		'Holds a integer number for the mintes
	Dim strPeriod		'Holds wether it is am or pm
	Dim dtmTempTime		'Temporary storage area for the time

	'Craete a recordset to get the date format data
	Set rsTimeFormat = Server.CreateObject("ADODB.Recordset")
	
	'Initalise the strSQL variable with an SQL statement to query the database
	strSQL = "SELECT tblDateTimeFormat.* FROM tblDateTimeFormat;"
	
	'Query the database
	rsTimeFormat.Open strSQL, strCon
	
	'If the recordset is empty then return tyhe original time
	If rsTimeFormat.EOF Then
		
		'Set the date as UK
		TimeFormat = dtmTime
		
	'If there is a record in the recordset then format the date
	Else
	
		'Place the server time off set onto the recorded database time
		If rsTimeFormat("Server_offset") = "+" Then
			dtmTempTime = DateAdd("h", + CInt(rsTimeFormat("Server_offset_hours")), dtmTime)
		ElseIf rsTimeFormat("Server_offset") = "-" Then
			dtmTempTime = DateAdd("h", - CInt(rsTimeFormat("Server_offset_hours")), dtmTime)
		End If
		
		'Seprate the time into differnet strings
		intHour = CInt(Hour(dtmTempTime))
		intMinute = CInt(Minute(dtmTempTime))
		
		'Place 0 infront of minutes under 10
		If intMinute < 10 then intMinute = "0" & intMinute
	
		'If the time is 12 hours then change the time to 12 hour clock
		If CInt(rsTimeFormat("Time_format")) = 12 Then
			
			'Set the time period
			If intHour >= 12 then 
				strPeriod = rsTimeFormat("pm")
			Else 
				strPeriod = rsTimeFormat("am")
			End If
			
			
			'Change the hour to 12 hour clock time
			Select Case intHour
				Case 00
					intHour = 12
				Case 01
					intHour = 1
				Case 02
					intHour = 2
				Case 03
					intHour = 3
				Case 04
					intHour = 4
				Case 05
					intHour = 5					
				Case 06
					intHour = 6					
				Case 07
					intHour = 7					
				Case 08
					intHour = 8					
				Case 09
					intHour = 9
				Case 13
					intHour = 1
				Case 14
					intHour = 2					
				Case 15
					intHour = 3					
				Case 16
					intHour = 4					
				Case 17
					intHour = 5					
				Case 18
					intHour = 6					
				Case 19
					intHour = 7					
				Case 20
					intHour = 8					
				Case 21
					intHour = 9					
				Case 22
					intHour = 10					
				Case 23
					intHour = 11	
						
			End Select
		
		'ElseIf it is 24 hour clock place another 0 infront of anything below 10 hours
		ElseIf intHour < 10 Then 
			intHour = "0" & intHour
		End If
		
		'Return the Formated time
		TimeFormat = intHour & ":" & intMinute & strPeriod
	
	End If	

	'Release server variables
	rsTimeFormat.Close
	Set rsTimeFormat = Nothing
	
End Function
%>