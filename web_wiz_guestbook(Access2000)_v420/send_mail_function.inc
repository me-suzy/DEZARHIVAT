<%
'****************************************************************************************
'**  Copyright Notice    
'**
'**  Web Wiz Guide Guestbook
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


'Function to send an e-mail
Function SendMail(strEmailBody, strEmailAddress, strSubject, strMailComponent)

	'Dimension variables
	Dim objCDOMail		'Holds the CDONTS mail object
	Dim objJMail		'Holds the Jmail object
	Dim objAspEmail		'Holds the Persits AspEmail e-mail object

	'Select which email component to use
	Select Case strMailComponent
		
		'CDONTS mail component
		Case "CDONTS"
		
			'Create the e-mail server object
			Set objCDOMail = Server.CreateObject("CDONTS.NewMail")
		
			'Who the e-mail is from
			objCDOMail.From = "<" & strEmailAddress & ">"
						
			'Who the e-mail is sent to
			objCDOMail.To = "<" & strEmailAddress & ">"
								
			'The subject of the e-mail
			objCDOMail.Subject = strSubject
						
			'The main body of the e-amil
			objCDOMail.Body = strEmailBody
						
			'Set the e-mail body format (0=HTML 1=Text)
			objCDOMail.BodyFormat = 0
			
			'Set the mail format (0=MIME 1=Text)
			objCDOMail.MailFormat = 0
						
			'Importance of the e-mail (0=Low, 1=Normal, 2=High)
			objCDOMail.Importance = 1 
						
			'Send the e-mail
			objCDOMail.Send				
							
			'Close the server mail object
			Set objCDOMail = Nothing
		
		
		'JMail component
		Case "Jmail"
	
			'Create the e-mail server object
			Set objJMail = Server.CreateObject("JMail.SMTPMail")
		
			'Out going SMTP mail server address
			objJMail.ServerAddress = strSMTPServer
		
			'Who the e-mail is from
			objJMail.Sender = strEmailAddress
						
			'Who the e-mail is sent to
			objJMail.AddRecipient strEmailAddress
									
			'The subject of the e-mail
			objJMail.Subject = strSubject
						
			'The main body of the e-amil
			objJMail.HTMLBody = strEmailBody
						
			'Importance of the e-mail
			objJMail.Priority = 3 
						
			'Send the e-mail
			If NOT strSMTPServer = "" Then objJMail.Execute				
							
			'Close the server mail object
			Set objJMail = Nothing
			
		'AspEmail component
		Case "AspEmail"
	
			'Create the e-mail server object
			Set objAspEmail = Server.CreateObject("Persits.MailSender")
			
			'Out going SMTP mail server address
			objAspEmail.Host = strSMTPServer
				
			'Who the e-mail is from
			objAspEmail.From = strEmailAddress
				
			'Who the e-mail is sent to
			objAspEmail.AddAddress strEmailAddress
												
			'The subject of the e-mail
			objAspEmail.Subject = strSubject
			
			'Set the e-mail body to HTML
			objAspEmail.IsHTML = True 
			
			'The main body of the e-mail
			objAspEmail.Body = strEmailBody
									
			'Send the e-mail
			If NOT strSMTPServer = "" Then objAspEmail.Send			
						
			'Close the server mail object
			Set objAspEmail = Nothing
	End Select	
	
	'Set the returned value of the function to true
	SendMail = True
End Function
%>