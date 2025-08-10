Absolute Live Support
Include Libraries
=====================================================
Absolute Live Support is compatible with a wide range
of third party components for sending e-mails from within
he application.

In order for Absolute Live Support to work with your
server's installed components you must set and configure
their corresponding include library.

An include library is a piece of code that tells Absolute
Live Support which component it needs to use in order to
accomplish the e-mailing task.

This include libraries have a name convention in the form
of incEmail.COMPONENT where COMPONENT is the name of the
component the library is intended for.

To configure these libraries all you need to do is know
which components your hosting provider currently has
on their servers installed and then rename its corresponding
include library file extension to .asp and then move this
file to the Absolute Live Support Root Directory.


Below is a list of components supported by Absolute Live Support
and their corresponding include libraries.



=====================================================
  E-Mail Components Supported  : 
=====================================================

- ASPEmail : from Persits (http://www.persits.com)
  incEmail.ASPEmail


- ASPMail : from ServerObjects (http://www.serverobjects.com)
  incEmail.ASPMail


- AspSmartMail : from ASPSmart (http://www.aspsmart.com)
  incEmail.AspSmartMail


- JMail : from Dimac (http://www.dimac.net)
  incEmail.JMail


- SASMTPMail : from SoftArtisans (http://www.softartisans.com)
  incEmail.SASMTPMail


- CDONTS : In case that no e-mail component is installed
  on the server, CDONTS should work
  incEmail.CDONTS


Configuration :
To Set any of this libraries once you know which component
is installed on your server, rename its corresponding file
to incEmail.asp and move it to the Absolute Live Support
Root directory:   absolutels

If no e-mail component is installed, the incUpload.CDONTS
library should work as CDONTS is highly supported among
hosting providers, otherwise the options to send article
by e-mail won't be available.




=====================================================
  Configuration Samples 
=====================================================
A) Suppose that your hosting provider currently has
installed the JMail e-mail component :

You'll have to use the incEmail.JMail library.

Move this library to the Absolute Live Support root
directory and rename the file to :

incEmail.asp

and everything should work!



For more information please refer to the Absolute Live
Support documentation, if your library doesn't seem to
work, please let us know at:

http://www.xigla.com/absolutels

