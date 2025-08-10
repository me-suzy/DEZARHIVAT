<%
'****************************************************************************************
'**  Copyright Notice    
'**
'**  Web Wiz Guide ASP Mailing List
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


'Send CDONTS E-mail component Function
Private Function CDONTSSendMail(strEmailAddress)

	Dim objCDOMail			'Holds the CDONTS e-mail object

	'Create the e-mail server object
	Set objCDOMail = Server.CreateObject("CDONTS.NewMail")
		
	'Who the e-mail is from
	objCDOMail.From = strWebsiteName & " <" & strWebsiteEmailAddress & ">"
		
	'Who the e-mail is sent to
	objCDOMail.To = strEmailAddress
		
	'The subject of the e-mail
	objCDOMail.Subject = strSubject
				
	'The main body of the e-amil
	objCDOMail.Body = strEmailBody & strAppendToEmail
							
	'Set the e-mail body format (0=HTML 1=Text)
	If Request.Form("format") = "HTML" OR Request.Form("format") = "advHTML" Then
		objCDOMail.BodyFormat = 0
	Else
		objCDOMail.BodyFormat = 1
	End If
				
	'Set the mail format (0=MIME 1=Text)
	objCDOMail.MailFormat = 0
							
	'Importance of the e-mail (0=Low, 1=Normal, 2=High)
	objCDOMail.Importance = 1 
							
	'Send the e-mail
	objCDOMail.Send			
							
	'Close the server mail object
	Set objCDOMail = Nothing
			
	'Return the function as true
	CDONTSSendMail = True

End Function 


'Send JMail E-mail component Function
Private Function JMailSendMail(strEmailAddress)

	Dim objJMail			'Holds the JMail e-mail object

	'Create the e-mail server object
	Set objJMail = Server.CreateOBject("JMail.SMTPMail")
	
	'Out going SMTP mail server address
	objJMail.ServerAddress = strMailServer
		
	'Who the e-mail is from
	objJMail.Sender = strWebsiteEmailAddress
	objJMail.SenderName = strWebsiteName
		
	'Who the e-mail is sent to
	objJMail.AddRecipient strEmailAddress
										
	'The subject of the e-mail
	objJMail.Subject = strSubject 
							
	'The main body of the e-mail
	'Set the e-mail body format (BodyHTML=HTML Body=Text)
	If Request.Form("format") = "HTML" OR Request.Form("format") = "advHTML" Then
		objJMail.HTMLBody = strEmailBody & strAppendToEmail
	Else
		objJMail.Body = strEmailBody & strAppendToEmail
	End If
							
	'Importance of the e-mail
	objJMail.Priority = 3 
							
	'Send the e-mail
	If NOT strMailServer = "" Then objJMail.Execute			
				
	'Close the server mail object
	Set objJMail = Nothing
	
	'Return the function as true
	JMailSendMail = True
End Function 


'Send Persists E-mail component Function
Private Function ASPEmailSendMail(strEmailAddress)

	Dim objAspEmail			'Holds the Persits AspEmail e-mail object

	'Create the e-mail server object
	Set objAspEmail = Server.CreateObject("Persits.MailSender")
	
	'Out going SMTP mail server address
	objAspEmail.Host = strMailServer
		
	'Who the e-mail is from
	objAspEmail.From = strWebsiteEmailAddress
	objAspEmail.FromName = strWebsiteName
		
	'Who the e-mail is sent to
	objAspEmail.AddAddress strEmailAddress
										
	'The subject of the e-mail
	objAspEmail.Subject = strSubject 
							
	
	'Set the e-mail body format (BodyHTML=HTML Body=Text)
	If Request.Form("format") = "HTML" OR Request.Form("format") = "advHTML" Then
		objAspEmail.IsHTML = True
	End If
	
	'The main body of the e-mail
	objAspEmail.Body = strEmailBody & strAppendToEmail
							
	'Send the e-mail
	If NOT strMailServer = "" Then objAspEmail.Send			
				
	'Close the server mail object
	Set objAspEmail = Nothing
	
	'Return the function as true
	ASPEmailSendMail = True
End Function 
%>