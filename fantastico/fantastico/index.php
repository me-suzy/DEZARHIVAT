<cpanel include="fantasticoheader.php">
<?

$DEPOT_PATH="/var/autoinstall/english/";

$DBMAX=<cpanel print="$CPDATA{'MAXSQL'}">;
$DBS=$DBMAX - <cpanel Mysql="countdbs()">;
if ($DBS == 0 && is_integer($DBMAX))
	{
	echo "<cpanel include="upgrade.php">";
	}
?>

<!-- Begin Portals routine -->

<?
$IS_PORTALS=0;
$DEPOT_PORTALS[]=$DEPOT_PATH."community";
$DEPOT_PORTALS[]=$DEPOT_PATH."postnuke";
$DEPOT_PORTALS[]=$DEPOT_PATH."xoops";
$DEPOT_PORTALS[]=$DEPOT_PATH."website";
foreach($DEPOT_PORTALS AS $ROOT_PORTALS)
	{
	if(is_dir($ROOT_PORTALS))
		{
		$IS_PORTALS=1;
		}
	}
if($IS_PORTALS)
	{
	echo "<p class=MainCategoriesTop>Portals/CMS</p>";
	}
?>

<!-- Begin PHP-Nuke routine -->
<?

$OLD_NUKE="<cpanel print="$homedir">/public_html/community/config.php";
if(is_file($OLD_NUKE))
	{
	include("$OLD_NUKE");
	}
?>


<?

$DEPOT_NUKE[]=$DEPOT_PATH."community";
foreach($DEPOT_NUKE AS $ROOT_NUKE)
	{
	if(is_dir($ROOT_NUKE))
		{
		$USER_ROOT_NUKE[]="<cpanel print="$homedir">/public_html/community";
		foreach($USER_ROOT_NUKE AS $EXISTROOTNUKE)
			{
				if(is_dir($EXISTROOTNUKE))
				{
					echo "<p>PHP-Nuke is installed";
					if($Version_Num == "5.6")
						{
							echo " (<a href='autoinstallnukeupgrade.php' class='Hint'>Upgrade to version 6.0 now!</a>)";
						}

					echo "<br><a href='autoinstallnukehome.php'>Overview</a>";
				}
			else
				{
					echo "<p><a href='autoinstallnuke.php'>PHP-Nuke</a>";
				}
			}
		}
	}
?>

<!-- End PHP-Nuke routine -->

<!-- Begin Post-Nuke routine -->

<?

$DEPOT_PNUKE[]=$DEPOT_PATH."postnuke";
foreach($DEPOT_PNUKE AS $ROOT_PNUKE)
	{
	if(is_dir($ROOT_PNUKE))
		{
		$USER_ROOT_PNUKE[]="<cpanel print="$homedir">/public_html/postnuke";
		foreach($USER_ROOT_PNUKE AS $EXISTROOTPNUKE)
			{
				if(is_dir($EXISTROOTPNUKE))
				{
					echo "<p>Post-Nuke is installed<br><a href='autoinstallpostnukehome.php'>Overview</a>";
				}
			else
				{
					echo "<p><a href='autoinstallpostnuke.php'>Post-Nuke</a>";
				}
			}
		}
	}
?>

<!-- End Post-Nuke routine -->

<!-- Begin PHP-Website routine -->

<?

$DEPOT_WEBSITE[]=$DEPOT_PATH."website";
foreach($DEPOT_WEBSITE AS $ROOT_WEBSITE)
	{
	if(is_dir($ROOT_WEBSITE))
		{
		$USER_ROOT_WEBSITE[]="<cpanel print="$homedir">/public_html/website";
		foreach($USER_ROOT_WEBSITE AS $EXISTROOTWEBSITE)
			{
				if(is_dir($EXISTROOTWEBSITE))
				{
					echo "<p>phpWebSite is installed<br><a href='autoinstallwebsitehome.php'>Overview</a>";
				}
			else
				{
					echo "<p><a href='autoinstallwebsite.php'>phpWebSite</a>";
				}
			}
		}
	}
?>

<!-- End PHP-Website routine -->

<!-- Begin Xoops routine -->

<?

$DEPOT_XOOPS[]=$DEPOT_PATH."xoops";
foreach($DEPOT_XOOPS AS $ROOT_XOOPS)
	{
	if(is_dir($ROOT_XOOPS))
		{
		$USER_ROOT_XOOPS[]="<cpanel print="$homedir">/public_html/xoops";
		foreach($USER_ROOT_XOOPS AS $EXISTROOTXOOPS)
			{
				if(is_dir($EXISTROOTXOOPS))
				{
					echo "<p>Xoops is installed<br><a href='autoinstallxoopshome.php'>Overview</a>";
				}
			else
				{
					echo "<p><a href='autoinstallxoops.php'>Xoops</a>";
				}
			}
		}
	}
?>

<!-- End Xoops routine -->

<!-- End Portals routine -->



<!-- Begin Boards routine -->

<?
$IS_BOARDS=0;
$DEPOT_BOARDS[]=$DEPOT_PATH."forum";
$DEPOT_BOARDS[]=$DEPOT_PATH."iboard";
foreach($DEPOT_BOARDS AS $ROOT_BOARDS)
	{
	if(is_dir($ROOT_BOARDS))
		{
		$IS_BOARDS=1;
		}
	}
if($IS_BOARDS)
	{
	echo "<p class=MainCategories>Discussion Boards</p>";
	}
?>

<!-- Begin phpBB2 routine -->

<?

$DEPOT_FORUM[]=$DEPOT_PATH."forum";
foreach($DEPOT_FORUM AS $ROOT_FORUM)
	{
	if(is_dir($ROOT_FORUM))
		{
		$USER_ROOT_FORUM[]="<cpanel print="$homedir">/public_html/forum";
		foreach($USER_ROOT_FORUM AS $EXISTROOTFORUM)
			{
				if(is_dir($EXISTROOTFORUM))
				{
					echo "<p>phpBB2 is installed<br><a href='autoinstallphpbb2home.php'>Overview</a>";
				}
			else
				{
					echo "<p><a href='autoinstallphpbb2.php'>phpBB2</a>";
				}
			}
		}
	}
?>

<!-- End phpBB2 routine -->

<!-- Begin Invision Board routine -->

<?

$DEPOT_IBOARD[]=$DEPOT_PATH."iboard";
foreach($DEPOT_IBOARD AS $ROOT_IBOARD)
	{
	if(is_dir($ROOT_IBOARD))
		{
		$USER_ROOT_IBOARD[]="<cpanel print="$homedir">/public_html/iboard";
		foreach($USER_ROOT_IBOARD AS $EXISTROOTIBOARD)
			{
				if(is_dir($EXISTROOTIBOARD))
				{
					echo "<p>Invision Board is installed<br><a href='autoinstalliboardhome.php'>Overview</a>";
				}
			else
				{
					echo "<p><a href='autoinstalliboardnotice.php'>Invision Board</a>";
				}
			}
		}
	}
?>

<!-- End Invision Board routine -->

<!-- End Boards routine -->



<!-- Begin Other routine -->

<?
$IS_OTHER=0;
$DEPOT_OTHER[]=$DEPOT_PATH."shop";
$DEPOT_OTHER[]=$DEPOT_PATH."gallery";
$DEPOT_OTHER[]=$DEPOT_PATH."auction";
$DEPOT_OTHER[]=$DEPOT_PATH."office";
$DEPOT_OTHER[]=$DEPOT_PATH."links";
$DEPOT_OTHER[]=$DEPOT_PATH."blog";
foreach($DEPOT_OTHER AS $ROOT_OTHER)
	{
	if(is_dir($ROOT_OTHER))
		{
		$IS_OTHER=1;
		}
	}
if($IS_OTHER)
	{
	echo "<p class=MainCategories>Other scripts</p>";
	}
?>

<!-- Begin OS Commerce routine -->

<?

$DEPOT_PATH="/var/autoinstall/english/";

$DEPOT_SHOP[]=$DEPOT_PATH."shop";
foreach($DEPOT_SHOP AS $ROOT_SHOP)
	{
	if(is_dir($ROOT_SHOP))
		{
		$USER_ROOT_SHOP[]="<cpanel print="$homedir">/public_html/shop";
		foreach($USER_ROOT_SHOP AS $EXISTROOTSHOP)
			{
				if(is_dir($EXISTROOTSHOP))
				{
					echo "<p>OS Commerce is installed<br><a href='autoinstallshophome.php'>Overview</a>";
				}
			else
				{
					echo "<p><a href='autoinstallshop.php'>OS Commerce (e-Commerce)</a>";
				}
			}
		}
	}
?>

<!-- End OS Commerce routine -->

<!-- Begin 4images routine -->

<?

$DEPOT_GALLERY[]=$DEPOT_PATH."gallery";
foreach($DEPOT_GALLERY AS $ROOT_GALLERY)
	{
	if(is_dir($ROOT_GALLERY))
		{
		$USER_ROOT_GALLERY[]="<cpanel print="$homedir">/public_html/gallery";
		foreach($USER_ROOT_GALLERY AS $EXISTROOTGALLERY)
			{
				if(is_dir($EXISTROOTGALLERY))
				{
					echo "<p>4images Gallery is installed<br><a href='autoinstallgalleryhome.php'>Overview</a>";
				}
			else
				{
					echo "<p><a href='autoinstallgallerynotice.php'>4images Gallery</a>";
				}
			}
		}
	}
?>

<!-- End 4images routine -->

<!-- Begin PHP Auction routine -->

<?

$DEPOT_AUCTION[]=$DEPOT_PATH."auction";
foreach($DEPOT_AUCTION AS $ROOT_AUCTION)
	{
	if(is_dir($ROOT_AUCTION))
		{
		$USER_ROOT_AUCTION[]="<cpanel print="$homedir">/public_html/auction";
		foreach($USER_ROOT_AUCTION AS $EXISTROOTAUCTION)
			{
				if(is_dir($EXISTROOTAUCTION))
				{
					echo "<p>PHPauction is installed<br><a href='autoinstallauctionhome.php'>Overview</a>";
				}
			else
				{
					echo "<p><a href='autoinstallauction.php'>PHPauction </a>";
				}
			}
		}
	}
?>

<!-- End PHP Auction routine -->

<!-- Begin PHProjekt routine -->

<?

$DEPOT_OFFICE[]=$DEPOT_PATH."office";
foreach($DEPOT_OFFICE AS $ROOT_OFFICE)
	{
	if(is_dir($ROOT_OFFICE))
		{
		$USER_ROOT_OFFICE[]="<cpanel print="$homedir">/public_html/office";
		foreach($USER_ROOT_OFFICE AS $EXISTROOTOFFICE)
			{
				if(is_dir($EXISTROOTOFFICE))
				{
					echo "<p>PHProjekt is installed<br><a href='autoinstallprojekthome.php'>Overview</a>";
				}
			else
				{
					echo "<p><a href='autoinstallprojekt.php'>PHProjekt (Groupware)</a>";
				}
			}
		}
	}
?>

<!-- End PHProjekt routine -->

<!-- Begin phpLinks routine -->

<?

$DEPOT_LINKS[]=$DEPOT_PATH."links";
foreach($DEPOT_LINKS AS $ROOT_LINKS)
	{
	if(is_dir($ROOT_LINKS))
		{
		$USER_ROOT_LINKS[]="<cpanel print="$homedir">/public_html/links";
		foreach($USER_ROOT_LINKS AS $EXISTROOTLINKS)
			{
				if(is_dir($EXISTROOTLINKS))
				{
					echo "<p>phpLinks is installed<br><a href='autoinstalllinkshome.php'>Overview</a>";
				}
			else
				{
					echo "<p><a href='autoinstalllinks.php'>phpLinks (Web catalog)</a>";
				}
			}
		}
	}
?>

<!-- End phpLinks routine -->

<!-- Begin b2 routine -->

<?

$DEPOT_BLOG[]=$DEPOT_PATH."blog";
foreach($DEPOT_BLOG AS $ROOT_BLOG)
	{
	if(is_dir($ROOT_BLOG))
		{
		$USER_ROOT_BLOG[]="<cpanel print="$homedir">/public_html/blog";
		foreach($USER_ROOT_BLOG AS $EXISTROOTBLOG)
			{
				if(is_dir($EXISTROOTBLOG))
				{
					echo "<p>b2 is installed<br><a href='autoinstallbloghome.php'>Overview</a>";
				}
			else
				{
					echo "<p><a href='autoinstallblog.php'>b2 (Weblog)</a>";
				}
			}
		}
	}
?>

<!-- End b2 routine -->

<!-- End Other routine -->


<cpanel include="fantasticofooter.php">
