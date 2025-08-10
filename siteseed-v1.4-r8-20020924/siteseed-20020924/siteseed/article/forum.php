<?
require_once "include/db_connect.php";
require_once "include/box.php";
require_once "include/users.php";
require_once "config.php";
require "include/strings.php";

global $$DATE_FORMAT;

$FORUM_FONT=addslashes($FORUM_FONT);

if($pub_query = mysql_query ("SELECT forum,debate FROM ARTICLEbase WHERE serial=$article"))
{
                $row=mysql_fetch_object($pub_query);
                $forum_serial=$row->forum;
		$debate=$row->debate;
}

if($debate==2)
{
}
else
{


	if($session_id)
	{
		$user_karma=get_user_data ($param="karma");
		
		if(!$user_karma)
       	 {
       	      $user_karma+=0;
       	 }

		$current_user=get_user_data($param="login");
		$pub_query = mysql_query ("SELECT id FROM users WHERE session_id='$session_id'");
		$row=mysql_fetch_object($pub_query);
		$user_id=$row->id;
	}



$pub_query = mysql_query ("SELECT max_points,min_points,archive,max_class,min_class,expiration_time,disappear FROM ARTICLEforum 
WHERE serial=$forum_serial");
        if ($row=mysql_fetch_object($pub_query))
        {
		$archive=$row->archive;
                $max_points=$row->max_points;
                $min_points=$row->min_points;
                $max_class=$row->max_class;
                $min_class=$row->min_class;
                $expiration_time=$row->expiration_time;
                $disappear=$row->disappear;

        }


#
# Update the classification of the post
#

        if($classification)
        {
		mysql_query ("INSERT into history (comment,user) values ($myself,$user_id)");

		$pub_query = mysql_query ("SELECT max_points FROM ARTICLEforum WHERE serial=$forum_serial");
		$row=mysql_fetch_object($pub_query);
		$max_points=$row->max_points;

                $pub_query = mysql_query ("SELECT class FROM ARTICLEpubcom WHERE serial=$myself");
                if($row=mysql_fetch_object($pub_query))
                {
                        $classification+=0;
                        $class_temp=$row->class;
                        $class_temp+=$classification;
                        
			if($class_temp>$max_points)
                        {
                                $class_temp=$max_points;
                        }
                        
			if($class_temp<$min_points)
			{
				$class_temp=$min_points;
			}			

			mysql_query ("UPDATE ARTICLEpubcom SET class=$class_temp WHERE serial=$myself");
                }


                $classification+=0;
                $classification=abs($classification);
                $user_karma-=$classification;
                mysql_query ("UPDATE users SET karma=$user_karma WHERE login='$current_user'");


        }

	$pub_query = mysql_query("SELECT * FROM ARTICLEpubcom WHERE nome='$current_user' AND serial=$myself");

        if($row=@mysql_fetch_object($pub_query))
        {
         $own_comment=1;
        }


	$pub_query = mysql_query("SELECT * FROM history WHERE (user=$user_id AND comment=$myself)");

	if(!$row=@mysql_fetch_object($pub_query))
	{
       	 $first_class=1;
	}


if($myself && $user_karma && $first_class && !$archive && $base_debate!=2 && !$own_comment)
{



	$pub_query = mysql_query ("SELECT class,submission_on FROM ARTICLEpubcom WHERE serial=$myself");
        if($row=mysql_fetch_object($pub_query))
	{
		$current_class=$row->class;
		$submission_on=$row->submission_on;


		$need_class1=$max_points-$current_class;
		$need_class2=$min_points-$current_class;

		if($need_class2>$min_class )
        	{
               		 $min_class=$need_class2;
        	}
	

		if($need_class1<$max_class)
		{
			$max_class=$need_class1;
		}
	}


	if($user_karma<$max_class)
	{
		$max_class=$user_karma;
	}

	if($user_karma<abs($min_class))
	{
		$min_class="-$user_karma";
	}


#
# Form to send the classification
#

	
		$form_class="<form method=post action=index.php>
		<input type=hidden name=visual value=$visual>
		<input type=hidden name=id value=$area_id>
		<input type=hidden name=article value=$article>
		<input type=hidden name=myself value=$myself>
		$FORUM_FONT$strClassify_post</font><select name=classification>";
		$counter=$max_class;
		while($counter>=$min_class)
		{
			if($counter==0)
			{
				$form_class.="<option selected>0</option>";
			}
			else
			{
				$form_class.="<option>$counter</option>";
			}
		
			$counter--;
		}

		$form_class.="</select> <input type=submit name=class value=Submit></form>";
		print"$form_class";


	


	}

}
	if($myself)
	{
		print" <a href=index.php?article=$article&visual=$visual&id=$area_id>../</a><br><br>";
	}






print_comments_list(0,$myself,$article,$visual,$area_id,$disappear,$expiration_time,$DELETE_COMMENTS_TIME,$FORUM_FONT,$PUBCOMRESTRICT,$debate,$DEFAULT_LANGUAGE);
	
	


#
# Function to make the tree of posts
#


function print_comments_list ($parent=0,$exclude="",$forum=0,$visual,$area_id,$disappear=-1,$expiration_time,$DELETE_COMMENTS_TIME,$FORUM_FONT,$PUBCOMRESTRICT,$debate,$DEFAULT_LANGUAGE) 
{

	require "include/strings.php";

	if($PUBCOMRESTRICT && $debate==2)
	{
		$sql_aprooved=" AND aprovado=1";
	}
	else
	{
		$sql_aprooved="";
	}

	$thread_array = mysql_query ("SELECT serial,nome,submission_on,title,class FROM ARTICLEpubcom
	WHERE parent=$parent AND article=$forum $sql_aprooved ORDER BY submission_on DESC");
	
	
	if (mysql_num_rows($thread_array)) 
	{	
		print "\n<ul>";
		
		while (list($id, $name, $submission_on,$title,$class)=mysql_fetch_row($thread_array)) 
		{
			$name=stripslashes($name);
			$title=stripslashes($title);

			if($class>$disappear && (strtotime($submission_on) + $expiration_time > time()  || !$expiration_time) )
			{
				$date_submission=strtotime($submission_on);
				$date_submission=date($DATE_FORMAT,$date_submission);


				if ($exclude != $id)
				{ 
					print "<li><a href=\"index.php?visual=$visual&id=$area_id&myself=$id&article=$forum\">$title</a>$FORUM_FONT $strBy <b>$name</b> $strOn <b>$date_submission</b></font></li>";
				}
				else 
				{
					print "<li>$FORUM_FONT<b>$title</b> $strBy  <b>$name</b> $strOn <b> $date_submission</b></font></li>";
				}				
			
			
				print_comments_list ($id,$exclude,$forum,$visual,$area_id,$disappear,$expiration_time,$DELETE_COMMENTS_TIME,$FORUM_FONT,$PUBCOMRESTRICT,$debate,$DEFAULT_LANGUAGE);
			}
		

			if( $DELETE_COMMENTS_TIME && ( ( strtotime($submission_on) + $expiration_time + $DELETE_COMMENTS_TIME) > time() ) && $expiration_time )
			{
				
				mysql_query("DELETE FROM ARTICLEpubcom WHERE serial = $myself || parent=$myself");
			}

		}
		
		print "</ul>";
	}
}





?>

