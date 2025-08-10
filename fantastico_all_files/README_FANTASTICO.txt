FANTASTICO installation guide and copyright notice

---

Telnet to your server

Execute following commands:

root@name> cd /var
root@name> wget http://cpanelthemes.com/autoinstall.tgz

(the open source applications will be transferred to your server -- you NEED this tarball as the original config files and the MySQL data have been modified so we can make an autoinstaller using placeholders for the variables of interest)

Untar:
root@name> tar -xzf autoinstall.tgz

Now you have a directory called "autoinstaller" and within this directory you have a directory called "english". This is where fantastico will look for the apps. 

Now change to the directory where you uploaded fantastico.tgz to

root@name> cd /home/user_name_here/path

Now we want to untar and move fantastico.tgz to /usr/local/cpanel/base/frontend/name_of_theme_here

Untar:
root@name> tar -xzf fantastico.tgz

Move:
root@name> mv fantastico /usr/local/cpanel/base/frontend/name_of_theme_here
Replace name_of_theme_here with the theme you want to use.

You are done with installation. 

You now need to add a link in your theme's index.html file to Fantastico's index.php. Link to:

fantastico/index.php


Q: Why not deliver an index.html with an integrated link?

A: Because I don't know which theme you prefer to work with. And I can't deliver my skin with an integrated link as not all skin purchaser will buy Fantastico (maybe!)
On the other hand, if you rename the fantastico directory to "asjfui7hgaaf2" your clients will never find it (I suppose) but you will know where it is, so you may want to offer installation services for a low fee. Many people will be happy to pay 10$ and have PHProjekt or PHP-Nuke installed. It will costs you 30 seconds to do it.


Q: How do I remove an Application off the fantastico menu?

A: Just remove or rename the application's directory located at

/var/autoinstall/english/

Following directories contain following applications:

auction  ->  PHPauction
community  ->  PHP-Nuke
forum  ->  phpBB 2.0
links  ->  phpLinks
office  ->  PHProjekt
postnuke  ->  PostNuke
shop  ->  OS Commerce
website  ->  phpWebSite
gallery -> 4images Gallery


COPYRIGHT NOTICE: Please notice that while the Open Source applications are free, the Fantastico installer is a commercial copyrighted software.

If you install it on more than 1 servers, then you need additional licenses. Please support the development of software by using it legally.  



I wish you fun with Fantastico AND success with your business!

Ilias Moisidis
CPanelthemes