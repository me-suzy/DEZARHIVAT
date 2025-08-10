<%
'****************************************************************************************
'**  Copyright Notice    
'**
'**  Web Wiz Guide - Web Wiz Forums
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


'Function to send an e-mail
Function SendMail(strEmailBody, strUserName, strUserEmail, strWebsiteName, strForumEmailAddress, strSubject, strMailComponent, blnHTML)

	'Dimension variables
	Dim objCDOSYSMail	'Holds the CDOSYS mail object
	Dim objCDOMail		'Holds the CDONTS mail object
	Dim objJMail		'Holds the Jmail object
	Dim objAspEmail		'Holds the Persits AspEmail email object
	Dim objAspMail		'Holds the Server Objects AspMail email object
	
	
	'Check the email body doesn't already have Web Wiz Forums
	If blnLCode = True AND Instr(strEmailBody, "Web Wiz Forums") = False Then
	
		'If HTML format then make an HTML link
		If blnHTML = True Then
			strEmailBody = strEmailBody & "<br><br><hr>Powered by <a href=""http://www.webwizforums.com"">Web Wiz Forums</a><br>Free ASP Bulletin Board System"
		'Else do a text link
		Else
			strEmailBody = strEmailBody & VbCrLf & VbCrLf & "---------------------------------------------------------------------------------------"
			strEmailBody = strEmailBody & VbCrLf & "Powered by Web Wiz Forums - http://www.webwizforums.com"
			strEmailBody = strEmailBody & VbCrLf & "Free ASP Bulletin Board System"
		End If
	End If

	'Select which email component to use
	Select Case strMailComponent
	
		'CDOSYS mail component
		Case "CDOSYS"
			
			'Dimension variables
			Dim objCDOSYSCon
			
			'Create the e-mail server object
			Set objCDOSYSMail = Server.CreateObject("CDO.Message")
		    	Set objCDOSYSCon = Server.CreateObject ("CDO.Configuration")
		    	
		    	'Set and update fields properties
		    	With objCDOSYSCon
		        	'Out going SMTP server
		        	.Fields("http://schemas.microsoft.com/cdo/configuration/smtpserver") = strIncomingMailServer
		        	'SMTP port
		        	.Fields("http://schemas.microsoft.com/cdo/configuration/smtpserverport")  = 25
		        	'CDO Port
		        	.Fields("http://schemas.microsoft.com/cdo/configuration/sendusing") = 2
		        	'Timeout
		        	.Fields("http://schemas.microsoft.com/cdo/configuration/smtpconnectiontimeout") = 60
	        		.Fields.Update 
	        	End With
			
				'Update the CDOSYS Configuration
				Set objCDOSYSMail.Configuration = objCDOSYSCon
				
			With objCDOSYSMail	
				'Who the e-mail is from
				.From = strWebsiteName & " <" & strForumEmailAddress & ">"
							
				'Who the e-mail is sent to
				.To = strUserName & " <" & strUserEmail & ">"
									
				'The subject of the e-mail
				.Subject = strSubject
							
				'Set the e-mail body format (HTMLBody=HTML TextBody=Plain)
				If blnHTML = True Then
				 	.HTMLBody = strEmailBody
				Else
					.TextBody = strEmailBody
				End If
							
				'Send the e-mail
				If NOT strIncomingMailServer = "" Then .Send
			End with				
							
			'Close the server mail object
			Set objCDOSYSMail = Nothing
		
		'CDONTS mail component
		Case "CDONTS"
		
			'Create the e-mail server object
			Set objCDOMail = Server.CreateObject("CDONTS.NewMail")
		
			With objCDOMail
				'Who the e-mail is from
				.From = strWebsiteName & " <" & strForumEmailAddress & ">"
							
				'Who the e-mail is sent to
				.To = strUserName & " <" & strUserEmail & ">"
									
				'The subject of the e-mail
				.Subject = strSubject
							
				'The main body of the e-amil
				.Body = strEmailBody
							
				'Set the e-mail body format (0=HTML 1=Text)
				If blnHTML = True Then
					.BodyFormat = 0
				Else
					.BodyFormat = 1
				End If
				
				'Set the mail format (0=MIME 1=Text)
				.MailFormat = 0
							
				'Importance of the e-mail (0=Low, 1=Normal, 2=High)
				.Importance = 1 
							
				'Send the e-mail
				.Send	
			End With			
							
			'Close the server mail object
			Set objCDOMail = Nothing
					
		
		'JMail component
		Case "Jmail"
	
			'Create the e-mail server object
			Set objJMail = Server.CreateObject("JMail.SMTPMail")
			
			With objJMail
				'Out going SMTP mail server address
				.ServerAddress = strIncomingMailServer
			
				'Who the e-mail is from
				.Sender = strForumEmailAddress
				.SenderName = strWebsiteName
							
				'Who the e-mail is sent to
				.AddRecipient strUserEmail
										
				'The subject of the e-mail
				.Subject = strSubject
				
				'Set the e-mail body format (BodyHTML=HTML Body=Text)
				If blnHTML = True Then
					.HTMLBody = strEmailBody
				Else
					.Body = strEmailBody
				End If
							
				'Importance of the e-mail
				.Priority = 3 
							
				'Send the e-mail
				If NOT strIncomingMailServer = "" Then .Execute	
			End With			
							
			'Close the server mail object
			Set objJMail = Nothing
	
	
		'AspEmail component
		Case "AspEmail"
	
			'Create the e-mail server object
			Set objAspEmail = Server.CreateObject("Persits.MailSender")
			
			With objAspEmail
				'Out going SMTP mail server address
				.Host = strIncomingMailServer
					
				'Who the e-mail is from
				.From = strForumEmailAddress
				.FromName = strWebsiteName
					
				'Who the e-mail is sent to
				.AddAddress strUserEmail
													
				'The subject of the e-mail
				.Subject = strSubject 
				
				'Set the e-mail body format (BodyHTML=HTML Body=Text)
				If blnHTML = True Then
					.IsHTML = True
				End If
				
				'The main body of the e-mail
				.Body = strEmailBody
										
				'Send the e-mail
				If NOT strIncomingMailServer = "" Then .Send	
			End With		
						
			'Close the server mail object
			Set objAspEmail = Nothing
			
		'AspMail component
		Case "AspMail"
		 
		   	'Create the e-mail server object
		   	Set objAspMail = Server.CreateObject("SMTPsvg.Mailer")
		   
		   	With objAspMail
			   	'Out going SMTP mail server address
			   	.RemoteHost = strIncomingMailServer
			    
			   	'Who the e-mail is from
			   	.FromAddress = strForumEmailAddress
			   	.FromName = strWebsiteName
			    
			   	'Who the e-mail is sent to
			   	.AddRecipient " ", strUserEmail
			            
			   	'The subject of the e-mail
			   	.Subject = strSubject 
			   
			   	'Set the e-mail body format (BodyHTML=HTML Body=Text)
			   	If blnHTML = True Then
			    		.ContentType = "text/HTML"
			   	End If
			   
			   	'The main body of the e-mail
			   	.BodyText = strEmailBody
			         
			   	'Send the e-mail
			   	If NOT strIncomingMailServer = "" Then .SendMail 
			   End With  
		      
		   	'Close the server mail object
		   	Set objAspMail = Nothing
	End Select	
	
	'Set the returned value of the function to true
	SendMail = True
End Function
%>