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
Dim rsDateTimeFormat		'Holds the date a time data
Dim saryDateTimeData(19)	'Holds the info for converting the date and time
Dim intLoopCounter		'loop counter


'Craete a recordset to get the date and time format data
Set rsDateTimeFormat = Server.CreateObject("ADODB.Recordset")
	
'Initalise the strSQL variable with an SQL statement to query the database
If strDatabaseType = "SQLServer" Then
	strSQL = "EXECUTE wwfSpTimeAndDateSettings"
Else
	strSQL = "SELECT tblDateTimeFormat.* FROM tblDateTimeFormat;"
End If
	
'Query the database
rsDateTimeFormat.Open strSQL, strCon


'All the data is feed into an array from the recordset to be used later, this is done
'as some versions of MDAC will report an error if the recordset is opened in the functions
'below, if called a large number of times.

'If there are records returned then enter the data returned into an array
If NOT rsDateTimeFormat.EOF Then 
	
	'Initilise the array
	saryDateTimeData(0) = rsDateTimeFormat("Date_format")
	saryDateTimeData(1) = rsDateTimeFormat("Year_format")
	saryDateTimeData(2) = rsDateTimeFormat("Seporator")
	'Initialise the mounth part of the array in a loop to save writing it 12 times
	For intLoopCounter = 1 to 12
		saryDateTimeData((intLoopCounter + 2)) = rsDateTimeFormat("Month" & (intLoopCounter))
	Next
	saryDateTimeData(15) = rsDateTimeFormat("Time_format")
	saryDateTimeData(16) = rsDateTimeFormat("Server_offset")
	saryDateTimeData(17) = rsDateTimeFormat("Server_offset_hours")
	saryDateTimeData(18) = rsDateTimeFormat("am")
	saryDateTimeData(19) = rsDateTimeFormat("pm")
End If


'Relese server objects
rsDateTimeFormat.Close
Set rsDateTimeFormat = Nothing



'Function to format date
Private Function DateFormat(dtmDate, saryDateTimeData)

	Dim strNewDate		'Holds the new date format
	Dim intDay		'Holds the integer number for the day
	Dim intMonth		'Holds a integer number from 1 to 12 for the month
	Dim strMonth		'Holds the month in it's final format which may be a number or a string so it is set to a sring value
	Dim intYear		'Holds the year
	Dim dtmTempDate		'Temprary storage area for date
	
	
	'If the array is empty set the date as UK
	If isNull(saryDateTimeData) Then
		
		'Set the date as orginal
		DateFormat = dtmDate
		
	'If there is a data in the array then format the date
	Else
		'Place the server time off set onto the recorded database time
		If saryDateTimeData(16) = "+" Then
			dtmTempDate = DateAdd("h", + CInt(saryDateTimeData(17)), dtmDate)
		ElseIf saryDateTimeData(16) = "-" Then
			dtmTempDate = DateAdd("h", - CInt(saryDateTimeData(17)), dtmDate)
		End If
		
		'Seprate the date into differnet strings
		intDay = CInt(Day(dtmTempDate))
		intMonth = CInt(Month(dtmTempDate))
		intYear = CInt(Year(dtmTempDate))
		
		'Place 0 infront of days under 10
		If intDay < 10 then intDay = "0" & intDay
	
		'If the year is two digits then sorten the year string
		If saryDateTimeData(1) = "short" Then intYear = Right(intYear, 2)
		
		'Format the month
		strMonth = saryDateTimeData((intMonth + 2))
		
		'Format the date
		Select Case saryDateTimeData(0)
			
			'Format dd/mm/yy
			Case "dd/mm/yy"
				DateFormat = intDay & saryDateTimeData(2) & strMonth & saryDateTimeData(2) & intYear
			
			'Format mm/dd/yy
			Case "mm/dd/yy"
				DateFormat = strMonth & saryDateTimeData(2) & intDay & saryDateTimeData(2) & intYear	
		
			'Format yy/dd/mm
			Case "yy/dd/mm"
				DateFormat = intYear & saryDateTimeData(2) & intDay & saryDateTimeData(2) & strMonth
			
			'Format yy/mm/dd
			Case "yy/mm/dd"
				DateFormat = intYear & saryDateTimeData(2) & strMonth & saryDateTimeData(2) & intDay		
		End Select	
	
	End If
	
End Function


'Function to format time
Function TimeFormat(dtmTime, saryDateTimeData)

	Dim strNewDate		'Holds the new date format
	Dim intHour		'Holds the integer number for the hours
	Dim intMinute		'Holds a integer number for the mintes
	Dim strPeriod		'Holds wether it is am or pm
	Dim dtmTempTime		'Temporary storage area for the time

	
	'If the array is empty then return tyhe original time
	If isNull(saryDateTimeData) Then
		
		'Set the date as UK
		TimeFormat = dtmTime
		
	'If there is a data in the array then format the date
	Else
	
		'Place the server time off set onto the recorded database time
		If saryDateTimeData(16) = "+" Then
			dtmTempTime = DateAdd("h", + CInt(saryDateTimeData(17)), dtmTime)
		ElseIf saryDateTimeData(16) = "-" Then
			dtmTempTime = DateAdd("h", - CInt(saryDateTimeData(17)), dtmTime)
		End If
		
		'Seprate the time into differnet strings
		intHour = CInt(Hour(dtmTempTime))
		intMinute = CInt(Minute(dtmTempTime))
		
		'Place 0 infront of minutes under 10
		If intMinute < 10 then intMinute = "0" & intMinute
	
		'If the time is 12 hours then change the time to 12 hour clock
		If CInt(saryDateTimeData(15)) = 12 Then
			
			'Set the time period
			If intHour >= 12 then 
				strPeriod = saryDateTimeData(19)
			Else 
				strPeriod = saryDateTimeData(18)
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
	
End Function
%>