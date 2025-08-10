Absolute Banner Manager V1.1
Include Libraries
=====================================================
Absolute Banner Manager is compatible with a wide range
of third party components for sending e-mails.

In order for Absolute Banner Manager to work with your
server's installed component you must set and configure
its corresponding include library.

An include library is a piece of code that tells Absolute
Banner Manager which component it needs to use in order to
accomplish the e-mail task.

These include libraries have a name convention in the form
of incEmail.COMPONENT where COMPONENT is the name of the
component the library is intended for.

To configure these libraries all you need to do is know
which e-mail component your hosting provider currently has
installed on their servers and then rename its corresponding
include library file extension to .asp and then move this
file to the Absolute Banner Manager Root Directory.


Below is a list of e-mail components supported
by Absolute Banner Manager and its corresponding include
libraries.


=====================================================
E-Mail Components Supported  : 
=====================================================

- ASPEmail : from Persits (http://www.persits.com)
  incEmail.ASPEmail


- ASPMail : from ServerObjects (http://www.serverobjects.com)
  incEmail.ASPMail


- AspSmartMail : from ASPSmart (http://www.aspsmart.com)
  incEmail.AspSmartMail


- DevMailer : from Geocel (http://www.geocel.com)
  incEmail.DevMailer


- JMail : from Dimac (http://www.dimac.net)
  incEmail.JMail


- SASMTPMail : from SoftArtisans (http://www.softartisans.com)
  incEmail.SASMTPMail


- CDONTS : In case that no e-mail component is installed
  on the server, CDONTS should work
  incEmail.CDONTS


Configuration :
To Set any of this libraries once you know which e-mail component
is installed on your server, rename its corresponding file
to incEmail.asp and move it to the Absolute Banner Manager Root
directory:   absolutebm

If no e-mail component is installed, the incUpload.CDONTS
library should work as CDONTS is highly supported among
hosting providers, otherwise the option to send e-mail
notifications won't be available.




=====================================================
3 .Configuration Sample
=====================================================
Suppose that your hosting provider currently has
installed the JMail e-mail component :

You'll have to use the incEmail.JMail library

Move this library to the Absolute Banner Manager root
directory and rename it :

incEmail.asp

and everything should work!





For more information please refer to the Absolute Banner
Manager documentation, if your library doesn't seem to
work, please let us know at:

http://www.xigla.com/absolutebm



=====================================================
Absolute Banner Manager V1.1
Copyright(c) 2002 - Xigla Software
Check our other applications at
http://www.xigla.com
















