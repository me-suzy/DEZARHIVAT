<?

if( strstr($HTTP_USER_AGENT,'IE') || strstr($HTTP_USER_AGENT,'MS') || strstr($HTTP_USER_AGENT,'EXPLORER') )
{
	$sBrowserID = "IE";
}
else
{
	$sBrowserID = "NS";
}

function browser_adapt_string($sSituation,$sEditorName,$property,$value)
{
	global $sBrowserID;

	if( !strcmp($sSituation,"Get") ) 
	{
		if( !strcmp($sBrowserID,"IE") )
		{
			$sResult = $sEditorName . "." . $property ;
		}
		else
		{
			$sResult = "PropertyAccessor.Get(".$sEditorName.",\"".$property."\");";
		}
	}

	if( !strcmp($sSituation,"Set") ) 
	{
		if( !strcmp($sBrowserID,"IE") )
		{
			$sResult = $sEditorName . "." . $property . " = " . $value ;
		}
		else
		{
			$sResult = "PropertyAccessor.Set(".$sEditorName.",\"".$property."\",".$value.");";
		}
	}

	return $sResult;
}

?>
	<script language=javascript >
	
	var obj_editor = 0 ;
	
	function image_toggle(nom_img,graf)
	{
		document.images[nom_img].src = graf;
		return true;
	} 
	
	<?
	
	
	eregi("<img[^<>\n]+>", $content_inicial, $tags);
	
	
	$images_toshow .= "image=new Array()\n";
	
	for($loopvar=0; $loopvar<count($tags); $loopvar++)
	{
		$ind_tag=$tags[$loopvar];
		$ind_tag=ereg_replace("<", "", $ind_tag);
		$ind_tag=ereg_replace(">", "", $ind_tag);
		
		$parameters=explode(" ", $ind_tag);
		$ind_tag=$parameters[0];
		
		$ind_tag=strtoupper($ind_tag);
		
		if($ind_tag=="IMG")
		{
			for($imgpars=1; $imgpars<sizeof($parameters); $imgpars++)
			{
				if(eregi("SRC=", $parameters[$imgpars]) )
				{
					$mypath=eregi_replace('SRC=', '', $parameters[$imgpars]);
					$mypath=eregi_replace('"', '', $mypath);
					$mypath=eregi_replace("'", '', $mypath);
					
					
					$myfullpath=$imagesURL . $mypath;
					$content_inicial=eregi_replace("$mypath", "$myfullpath", $content_inicial );
					$mypath=$myfullpath;
					
					$images_toshow .="image[$loopvar]=new Image\nimage[$loopvar].src='$mypath'\n";
				}			
			}
		}
	}
	?>
	
	function MakeArray(n)
	{
		this.length=n 
		for(var j=1; j<=n; j++)
		{
			this[n]=0
		}
		return this
	}
	
	
	colors= new MakeArray(140);
	colors[0]='aliceblue';			colors[1]='antiquewhite';	colors[2]='aqua';
	colors[3]='aquamarine';			colors[4]='azure'; 		colors[5]='beige'; 
	colors[6]='bisque';			colors[7]='black';		colors[8]='blanchedalmond';
	colors[9]='blue';			colors[10]='blueviolet';	colors[11]='brown';
	colors[12]='burlywood';			colors[13]='cadetblue';		colors[14]='chartreuse';
	colors[15]='chocolate';			colors[16]='coral';		colors[17]='cornflower';
	colors[18]='cornsilk';			colors[19]='crimson';		colors[20]='cyan';
	colors[21]='darkblue';			colors[22]='darkcyan';		colors[23]='darkgoldenrod';
	colors[24]='darkgray';			colors[25]='darkgreen';		colors[26]='darkkhaki';
	colors[27]='darkmagenta';		colors[28]='darkolivegreen';	colors[29]='darkorange';
	colors[30]='darkorchid';		colors[31]='darkred';		colors[32]='darksalmon';
	colors[33]='darkseagreen';		colors[34]='darkslateblue';	colors[35]='darkslategray';
	colors[36]='darkturquoise';		colors[37]='darkviolet';	colors[38]='deeppink';
	colors[39]='deepskyblue';		colors[40]='dimgray';		colors[41]='dodgerblue';
	colors[42]='firebrick';			colors[43]='floralwhite';	colors[44]='forestgreen';
	colors[45]='fuchia';			colors[46]='gainsboro';		colors[47]='ghostwhite';
	colors[48]='gold';			colors[49]='goldenrod';		colors[50]='gray';
	colors[51]='green';			colors[52]='greenyellow';	colors[53]='honeydew';
	colors[54]='hotpink';			colors[55]='indianred';		colors[56]='indigo';
	colors[57]='ivory';			colors[58]='khaki';		colors[59]='lavender';
	colors[60]='lavenderblush';		colors[61]='lawngreen';		colors[62]='lemonchiffon';
	colors[63]='lightblue';			colors[64]='lightcoral';	colors[65]='lightcyan';
	colors[66]='lightgoldenrodyellow';	colors[67]='lightgreen';	colors[68]='lightgrey';
	colors[69]='lightpink';			colors[70]='lightsalmon';	colors[71]='lightseagreen';
	colors[72]='lightskyblue';		colors[73]='lightslategray';	colors[74]='lightsteelblue';
	colors[75]='lightyellow';		colors[76]='lime';		colors[77]='limegreen';
	colors[78]='linen';			colors[79]='magenta';		colors[80]='maroon';
	colors[81]='mediumaquamarine';		colors[82]='mediumblue';	colors[83]='mediumorchid';
	colors[84]='mediumpurple';		colors[85]='mediumseagreen';	colors[86]='mediumslateblue';
	colors[87]='mediumspringgreen';		colors[88]='mediumturquoise';	colors[89]='mediumvioletred';
	colors[90]='midnightblue';		colors[91]='mintcream';		colors[92]='mistyrose';
	colors[93]='moccasin';			colors[94]='navajowhite';	colors[95]='navy';
	colors[96]='oldlace';			colors[97]='olive';		colors[98]='olivedrab';
	colors[99]='orange';			colors[100]='orangered';	colors[101]='orchid';
	colors[102]='palegoldenrod';		colors[103]='palegreen';	colors[104]='paleturquoise';
	colors[105]='palevioletred';		colors[106]='papayawhip';	colors[107]='peachpuff';
	colors[108]='peru';			colors[109]='pink';		colors[110]='plum';
	colors[111]='powderblue';		colors[112]='purple';		colors[113]='red';
	colors[114]='rosybrown';		colors[115]='royalblue';	colors[116]='saddlebrown';
	colors[117]='salmon';			colors[118]='sandybrown';	colors[119]='seagreen';
	colors[120]='seashell';			colors[121]='sienna';		colors[122]='silver';
	colors[123]='skyblue';			colors[124]='slateblue';	colors[125]='slategray';
	colors[126]='snow';			colors[127]='springgreen';	colors[128]='steelblue';
	colors[129]='tan';			colors[130]='teal';		colors[131]='thistle'
	colors[132]='tomato';			colors[133]='turquoise';	colors[134]='violet';
	colors[135]='wheat';			colors[136]='white';		colors[137]='whitesmoke';
	colors[138]='yellow';			colors[139]='yellowgreen';
	
	function show_colors()
	{
		var looper=0
		var selection

		selection='<center><table border=1 cellspacing=0 cellpadding=0>';
		while(looper<140)
		{
			if(looper%16==0)
			{
				if(looper!=0)
				{
					selection+='</tr>'
				}
				selection+='<tr>'
			}
			selection+='<td bgcolor="'+colors[looper]+'" ><a href=javascript:canvi("'+colors[looper]+'"); ><img src="imagesbo/ve/trans.gif" border=0 width=18 height=18 alt="'+colors[looper]+'"></a></td>';
			looper++
		}
		selection+='</tr></table></center>'
		return selection
	}
	
	function color_selection(ruta_funct)
	{
		var pal_col, k, tc
		pal_col=window.open("","color_selection","screenX=80,screenY=80,width=360,height=220")
		pal_col.document.open()
		k=pal_col.document;
		k.writeln("<html><head><title><? print $strVEmsg2;?></title><style> td,body { font-family:Arial; font-size:8pt; } </style> <script> function canvi(hexa) { "+ruta_funct+"(hexa); window.close(); }</"+"script></head><body bgcolor=white ><center>")
		tc=show_colors()
		k.writeln(tc)
		k.writeln("</center></body></html>")
		k.close()
		pal_col.focus()
	}
	
	
	function content_html(field_name) 
	{
		<?	if( !strcmp($sBrowserID,"NS") ){ ?>
			var obj_ed = eval(field_name);
			<?	}else{	?>
			var obj_ed = eval("document." + field_name);
		<?	} ?>
		var cont = <? print browser_adapt_string("Get","obj_ed","DocumentHTML","0"); ?>;
		var texto = "" + cont
		texto = strip_body(texto);
		return texto
	}
	
	
	function change_content_html(field_name,content) 
	{
		<?    	if( !strcmp($sBrowserID,"NS") ){ ?>
			var obj_ed = eval(field_name);
			<?    	}else{ ?>
			var obj_ed = eval("document." + field_name);
		<?	} ?>
		<? browser_adapt_string("Set","obj_ed","DocumentHTML","content"); ?>;
	}
	
	function strip_body(cont)
	{
		var  ini_cos = cont.search(/<BODY/i);
		if( ini_cos == -1 )
		{
			return cont;
		}
		
		var  lon = cont.length
		var  fi = false
		var prob = false
		var  i = ini_cos + 5
		while( !fi )
		{
			car = cont.charAt(i);
			if( car == '>' )
			{
				ini_cos = i + 1
				fi = true
			}
			
			if( car == '"' || car == "'" )
			{
				fi_com = false
				i++
				if( i >= lon )
				{
					fi = true;
					prob = true;
					fi_com = true;
				}
				while( !fi_com )
				{
					car_aux = cont.charAt(i);
					if( car_aux == car )
					{
						fi_com = true
					}
					else
					{
						i++;
					}
					if( i >= lon )
					{
						fi = true;
						prob = true;
						fi_com = true;
					}
				}
			}
			i++;
			
			if( i >= lon )
			{
				fi = true;
				prob = true;
			}
		}
		
		if( prob == true )
		{
			alert('".$strVEmsg3."');
		}
		else
		{
			var fi_cos = cont.search(/<\/BODY/i);
			var aux = cont.substring(ini_cos,fi_cos)
			cont = aux
		}
		return cont;
	}
	
		
	function show_table() 
	{
		<?	if( !strcmp($sBrowserID,"NS") ){	?>
			var pVar = ObjTableInfo;
			<?	}else{ ?>
			var pVar = document.ObjTableInfo;
		<?	} ?>
		
		var NR = <? print browser_adapt_string("Get","pVar","NumRows","0"); ?>;
		var NC = <? print browser_adapt_string("Get","pVar","NumCols","0"); ?>;
		var TA = <? print browser_adapt_string("Get","pVar","TableAttrs","0");?>;
		var CA = <? print browser_adapt_string("Get","pVar","CellAttrs","0");?>;
		
		var funct = 'opener.insert_table' 
		var par_tab, k, tc
		par_tab=window.open("","param_tables","screenX=80,screenY=80,width=400,height=215")
		par_tab.document.open()
		k=par_tab.document
		k.writeln('<HTML><HEAD><TITLE>TABLE</TITLE>')
		k.writeln('<STYLE TYPE="text/css">')
		k.writeln(" td,body { font-family:Arial; font-size:9pt; font-weight:bold; } ")
		k.writeln('</STYLE>')
		k.writeln("<script> function check_values() {")
			k.writeln("           var nf, nc, at, ac, tit, nerr=0 , avis")
			k.writeln("           avis = '\\n<? print $strVEmsg4;?>' ")
			k.writeln("           nf = document.info_table.NumRows.value")
			k.writeln("           nc = document.info_table.NumCols.value")
			k.writeln("           at = document.info_table.TableAttrs.value")
			k.writeln("           ac = document.info_table.CellAttrs.value")
			k.writeln("           tit = document.info_table.Caption.value")
			k.writeln("           if( nf != parseInt(nf) || nf < 0 ){ ")
				k.writeln("               nerr++")
				k.writeln("               avis += '\\n\\n-<? print $strVEmsg5;?>'")
			k.writeln("           }")
			k.writeln("           if( nc != parseInt(nc) || nc < 0 ){ ")
				k.writeln("               nerr++")
				k.writeln("               avis += '\\n\\n-<?print $strVEmsg6;?>'")
			k.writeln("           }")
			k.writeln("           if( nerr == 0){ ")
				k.writeln("               "+funct+"(nf,nc,at,ac,tit) ")
				k.writeln("               window.close(); ") 
			k.writeln("           }")
			k.writeln("           else")
			k.writeln("           {")
				k.writeln("             alert(avis)")
			k.writeln("           }")
			k.writeln("           return true ")
		k.writeln("         }</"+"script>") 
		k.writeln('</HEAD><BODY bgcolor=white ><center>')
		k.writeln('<form name=info_table onsubmit="check_values()" >'); 
		k.writeln("<font color=black face=arial size=-1 ><b> <? print $strVEmsg7; ?></b></font>")
		k.writeln('<TABLE CELLSPACING=10><TR><TD valign=absmiddle >Files:&nbsp;&nbsp;&nbsp;<INPUT TYPE=TEXT SIZE=3  maxlength=2 NAME=NumRows value='+NR+' ></TD>')
		k.writeln('<TD valign=absmiddle >Columns:&nbsp;&nbsp;&nbsp;<INPUT TYPE=TEXT SIZE=3 maxlength=2 NAME=NumCols value='+NC+'></TD></TR>') 
		k.writeln('<TR><TD>align:</TD><TD valign=absmiddle ><INPUT TYPE=TEXT SIZE=20 NAME=TableAttrs maxlength=120 value='+TA+'></TD></TR>')
		k.writeln('<TR><TD>Cell:</TD><TD><INPUT TYPE=TEXT SIZE=20 NAME=CellAttrs value='+CA+'></TD></TR>') 
		k.writeln('<TR><TD>Title:</TD><TD><INPUT TYPE=TEXT SIZE=20 NAME=Caption ></TD></TR></TABLE>')
		k.writeln('<TR><TD valign=absmiddle colspan=2 align=center ><INPUT TYPE=BUTTON NAME=OK VALUE=OK onclick="check_values()" ></TD></TR></TABLE></form>')
		k.writeln('</center></BODY></HTML>')
		k.close()
		par_tab.focus()
		return true
	}
	
	function insert_table(nf,nc,at,ac,tit) 
	{
		<?	if( !strcmp($sBrowserID,"NS") ){	?>
			var pVar = ObjTableInfo;
			<?	}else{	?>
			var pVar = document.ObjTableInfo;
		<?	}	?>
		<?	print browser_adapt_string("Set","pVar","NumRows","nf");?>;
		<?	print browser_adapt_string("Set","pVar","NumCols","nc");?>;
		<?	print browser_adapt_string("Set","pVar","TableAttrs","at");?>;
		<?	print browser_adapt_string("Set","pVar","CellAttrs","ac");?>;
		obj_editor.ExecCommand(5022,0, pVar);
		return true;
	}
	
	
	function FontName_onchange(sel_obj) 
	{
		var ty = sel_obj.options[sel_obj.selectedIndex].value;
		if( ty != 0 )
		{
			obj_editor.ExecCommand(5044, 0, ty);
		}
		sel_obj.options[0].selected = true
	}
	
	function FontSize_onchange(sel_obj) 
	{
		var sz = sel_obj.options[sel_obj.selectedIndex].value;
		if( sz != 0 )
		{
			obj_editor.ExecCommand(5045, 0, sz);
		}
		sel_obj.options[0].selected = true
	}
	
	function fg_color_change(arr) 
	{
		if (arr != null) 
		{
			obj_editor.ExecCommand(5046, 0, arr);
		}
	} 
	
	function bg_color_change(arr) 
	{
		if (arr != null) 
		{
			obj_editor.ExecCommand(5042, 0, arr);
		}
	}

<?
	
echo "\n function ".$field_name."_guardar() { ";
	if( $funcio_save == "" && $action_submit == "" )
	{
		echo "\n alert('".$strVEmsg8."'); ";
	}
	else
	{
		echo "\n var cont = content_html('".$field_name."'); ";
		echo "\n document.".$field_name."_doc_html.".$field_name."_content_html.value = cont; ";	
		
		if( $funcio_save != '' )
		{
			$funcio_save_aux = explode('(',$funcio_save);
			echo "\n ".$funcio_save_aux[0]."(cont);";
		}
		elseif( $action_submit != '' )
		{
			echo "\n document.".$field_name."_doc_html.submit();";
		}
	}
echo "\n } ";
?>
</script>

<table cellspacing=2 cellpadding=0 border=1 bgcolor=silver ><tr><td>
<? 
echo "<FORM NAME=\"".$field_name."_doc_html\" METHOD=\"Post\" ACTION=\"".$action_submit."\" > ";
echo "<input type=hidden name=\"veid\" value=\"$id\" >"; 
echo "<input type=hidden name=\"vefield\" value=\"$field\" >"; 
echo "<input type=hidden name=\"".$field_name."_content_html\" value=\"\" >"; 
?>
<table cellspacing=0 cellpadding=0 border=0 hspace=3 >
<tr>
<td valign=middle>
<? echo "\n	<a href=\"\"  onclick=\"obj_editor=".$field_name."; image_toggle('".$field_name."_nou','"."imagesbo/ve/newdoc.gif');obj_editor.NewDocument(); return false;\"  onmouseover=\"image_toggle('".$field_name."_nou','"."imagesbo/ve/newdoc_focus.gif');\" onmouseout=\"image_toggle('".$field_name."_nou','"."imagesbo/ve/newdoc.gif');\" ><img src='"."imagesbo/ve/newdoc.gif' alt='".$strVEmsg9."' border=0 align=absmiddle name='".$field_name."_nou' ></a> "; ?>
</td>
<td valign=middle>
<? echo "\n	<a href=''  onclick=\"obj_editor=".$field_name."; image_toggle('".$field_name."_guard','"."imagesbo/ve/save.gif'); ".$field_name."_guardar(); return false;\" onmouseover=\"image_toggle('".$field_name."_guard','"."imagesbo/ve/save_focus.gif');\" onmouseout=\"image_toggle('".$field_name."_guard','"."imagesbo/ve/save.gif')\" ><img name='".$field_name."_guard' src='"."imagesbo/ve/save.gif' alt='".$strVEmsg10."' border=0 align=absmiddle ></a> "; ?>
</td>
<td valign=middle>
	<img src='imagesbo/ve/separator.gif' border=0 align=absmiddle>
</td>
<td valign=middle>
<? echo "\n	<a href=''  onclick=\"obj_editor=".$field_name."; obj_editor.ExecCommand(5003,0); return false;\" onmouseover=\"image_toggle('".$field_name."_cort','"."imagesbo/ve/cut_focus.gif');\" onmouseout=\"image_toggle('".$field_name."_cort','"."imagesbo/ve/cut.gif')\" ><img name='".$field_name."_cort' src='"."imagesbo/ve/cut.gif' alt='".$strVEmsg11."' border=0 align=absmiddle ></a> "; ?>
</td>
<td valign=middle>
<? echo "\n	<a href=''  onclick=\"obj_editor=".$field_name."; obj_editor.ExecCommand(5002,0); return false;\" onmouseover=\"image_toggle('".$field_name."_cop','"."imagesbo/ve/copy_focus.gif');\" onmouseout=\"image_toggle('".$field_name."_cop','"."imagesbo/ve/copy.gif')\" ><img name='".$field_name."_cop' src='"."imagesbo/ve/copy.gif' alt='".$strVEmsg12."' border=0 align=absmiddle ></a> "; ?>
</td>
<td valign=middle>
<? echo "\n	<a href='' onclick=\"obj_editor=".$field_name."; obj_editor.ExecCommand(5032,0); return false;\" onmouseover=\"image_toggle('".$field_name."_paster','"."imagesbo/ve/paste_focus.gif');\" onmouseout=\"image_toggle('".$field_name."_paster','"."imagesbo/ve/paste.gif')\" ><img name='".$field_name."_paster' src='"."imagesbo/ve/paste.gif' alt='".$strVEmsg13."' border=0 align=absmiddle ></a> "; ?>
</td>
<td valign=middle>
	<img src='imagesbo/ve/separator.gif' border=0 align=absmiddle>
</td>
<td valign=middle>
<? echo "\n	<a href=''  onclick=\"obj_editor=".$field_name."; obj_editor.ExecCommand(5049,0); return false;\" onmouseover=\"image_toggle('".$field_name."_ud','"."imagesbo/ve/undo_focus.gif');\" onmouseout=\"image_toggle('".$field_name."_ud','"."imagesbo/ve/undo.gif')\" ><img name='".$field_name."_ud' src='"."imagesbo/ve/undo.gif' alt='".$strVEmsg14."' border=0 align=absmiddle ></a> "; ?>
</td>
<td valign=middle>
<? echo "\n	<a href='' onclick=\"obj_editor=".$field_name."; obj_editor.ExecCommand(5033,0); return false;\" onmouseover=\"image_toggle('".$field_name."_rd','"."imagesbo/ve/redo_focus.gif');\" onmouseout=\"image_toggle('".$field_name."_rd','"."imagesbo/ve/redo.gif')\" ><img name='".$field_name."_rd' src='"."imagesbo/ve/redo.gif' alt='".$strVEmsg15."' border=0 align=absmiddle ></a> "; ?>
</td>
<td valign=middle>
<? echo "\n	<img src='"."imagesbo/ve/separator.gif' border=0 align=absmiddle > "; ?>
</td>
<td valign=middle>
<? echo "\n	<a href=''  onclick=\"obj_editor=".$field_name."; image_toggle('".$field_name."_fi','"."imagesbo/ve/find.gif'); obj_editor.ExecCommand(5008,1); return false;\" onmouseover=\"image_toggle('".$field_name."_fi','"."imagesbo/ve/find_focus.gif');\" onmouseout=\"image_toggle('".$field_name."_fi','"."imagesbo/ve/find.gif')\" ><img name='".$field_name."_fi' src='"."imagesbo/ve/find.gif' alt='".$strVEmsg16."' border=0 align=absmiddle ></a> "; ?>
</td>
<td valign=middle>
	<img src='imagesbo/ve/separator.gif' border=0 align=absmiddle>
</td>
<td valign=middle>
<? echo "\n	<a href=\"\"  onclick=\"obj_editor=".$field_name."; obj_editor.ExecCommand(5000,0); return false;\"  onmouseover=\"image_toggle('".$field_name."_negr','"."imagesbo/ve/bold_focus.gif');\" onmouseout=\"image_toggle('".$field_name."_negr','"."imagesbo/ve/bold.gif')\" ><img src='"."imagesbo/ve/bold.gif' alt='".$strVEmsg29."' border=0 align=absmiddle name='".$field_name."_negr' ></a> "; ?>
</td>
<td valign=middle>
<? echo "\n	<a href=''  onclick=\"obj_editor=".$field_name."; obj_editor.ExecCommand(5023,0); return false;\" onmouseover=\"image_toggle('".$field_name."_curs','"."imagesbo/ve/italic_focus.gif');\" onmouseout=\"image_toggle('".$field_name."_curs','"."imagesbo/ve/italic.gif')\" ><img name='".$field_name."_curs' src='"."imagesbo/ve/italic.gif' alt='".$strVEmsg30."' border=0 align=absmiddle ></a> "; ?>
</td>
<td valign=middle>
<? echo "\n	<a href=''  onclick=\"obj_editor=".$field_name."; obj_editor.ExecCommand(5048,0); return false;\" onmouseover=\"image_toggle('".$field_name."_subr','"."imagesbo/ve//under_focus.gif');\" onmouseout=\"image_toggle('".$field_name."_subr','"."imagesbo/ve/under.gif')\" ><img name='".$field_name."_subr' src='"."imagesbo/ve/under.gif' alt='".$strVEmsg31."' border=0 align=absmiddle ></a> "; ?>
</td>
<td valign=middle>
	<img src='imagesbo/ve/separator.gif' border=0 align=absmiddle>
</td>
<td valign=middle>
<? echo "\n	<a href=''  onclick=\"obj_editor=".$field_name."; image_toggle('".$field_name."_fg','"."imagesbo/ve/fgcolor.gif'); color_selection('opener.fg_color_change'); return false;\" onmouseover=\"image_toggle('".$field_name."_fg','"."imagesbo/ve/fgcolor_focus.gif');\" onmouseout=\"image_toggle('".$field_name."_fg','"."imagesbo/ve/fgcolor.gif')\" ><img name='".$field_name."_fg' src='"."imagesbo/ve/fgcolor.gif' alt='".$strVEmsg32."' border=0 align=absmiddle ></a> "; ?>
</td>
<td valign=middle>
<? echo "\n	<a href=''  onclick=\"obj_editor=".$field_name."; image_toggle('".$field_name."_bg','"."imagesbo/ve/bgcolor.gif'); color_selection('opener.bg_color_change'); return false;\" onmouseover=\"image_toggle('".$field_name."_bg','"."imagesbo/ve/bgcolor_focus.gif');\" onmouseout=\"image_toggle('".$field_name."_bg','"."imagesbo/ve/bgcolor.gif')\" ><img name='".$field_name."_bg' src='"."imagesbo/ve/bgcolor.gif' alt='".$strVEmsg33."' border=0 align=absmiddle ></a> "; ?>
</td>
<td valign=middle>
	<img src='imagesbo/ve/separator.gif' border=0 align=absmiddle>
</td>
<td valign=middle>
<? echo "\n	<a href=''  onclick=\"obj_editor=".$field_name."; obj_editor.ExecCommand(5025,0); return false;\" onmouseover=\"image_toggle('".$field_name."_ae','"."imagesbo/ve/left_focus.gif');\" onmouseout=\"image_toggle('".$field_name."_ae','"."imagesbo/ve/left.gif')\" ><img name='".$field_name."_ae' src='"."imagesbo/ve/left.gif' alt='".$strVEmsg34."' border=0 align=absmiddle ></a> "; ?>
</td>
<td valign=middle>
<? echo "\n	<a href=''  onclick=\"obj_editor=".$field_name."; obj_editor.ExecCommand(5024,0); return false;\" onmouseover=\"image_toggle('".$field_name."_center','"."imagesbo/ve/center_focus.gif');\" onmouseout=\"image_toggle('".$field_name."_center','"."imagesbo/ve/center.gif')\" ><img name='".$field_name."_center' src='"."imagesbo/ve/center.gif' alt='".$strVEmsg35."' border=0 align=absmiddle ></a> "; ?>
</td>
<td valign=middle>
<? echo "\n	<a href='' onclick=\"obj_editor=".$field_name."; obj_editor.ExecCommand(5026,0); return false;\" onmouseover=\"image_toggle('".$field_name."_ad','"."imagesbo/ve/right_focus.gif');\" onmouseout=\"image_toggle('".$field_name."_ad','"."imagesbo/ve/right.gif')\" ><img name='".$field_name."_ad' src='"."imagesbo/ve/right.gif' alt='".$strVEmsg36."' border=0 align=absmiddle ></a> "; ?>
</td>
<td valign=middle>
	<img src='imagesbo/ve/separator.gif' border=0 align=absmiddle>
</td>
<td valign=middle>
<? echo "\n	<a href=''  onclick=\"obj_editor=".$field_name."; obj_editor.ExecCommand(5030,0); return false;\" onmouseover=\"image_toggle('".$field_name."_nl','"."imagesbo/ve/numlist_focus.gif');\" onmouseout=\"image_toggle('".$field_name."_nl','"."imagesbo/ve/numlist.gif')\" ><img name='".$field_name."_nl' src='"."imagesbo/ve/numlist.gif' alt='".$strVEmsg37."' border=0 align=absmiddle ></a> "; ?>
</td>
<td valign=middle>
<? echo "\n	<a href='' onclick= \"obj_editor=".$field_name."; obj_editor.ExecCommand(5051,0); return false;\" onmouseover=\"image_toggle('".$field_name."_ul','"."imagesbo/ve/bullist_focus.gif');\" onmouseout=\"image_toggle('".$field_name."_ul','"."imagesbo/ve/bullist.gif')\" ><img name='".$field_name."_ul' src='"."imagesbo/ve/bullist.gif' alt='".$strVEmsg38."' border=0 align=absmiddle ></a> "; ?>
</td>
<td valign=middle>
<img src='imagesbo/ve/separator.gif' border=0 align=absmiddle> 
</td>
<td valign=middle>
<? echo "\n	<a href=''  onclick=\"obj_editor=".$field_name."; obj_editor.ExecCommand(5031,0); return false;\" onmouseover=\"image_toggle('".$field_name."_deind','"."imagesbo/ve/deindent_focus.gif');\" onmouseout=\"image_toggle('".$field_name."_deind','"."imagesbo/ve/deindent.gif')\" ><img name='".$field_name."_deind' src='"."imagesbo/ve/deindent.gif' alt='".$strVEmsg39."' border=0 align=absmiddle ></a> "; ?>
</td>
<td valign=middle>
<? echo "\n	<a href=''  onclick=\"obj_editor=".$field_name."; obj_editor.ExecCommand(5018,0); return false;\" onmouseover=\"image_toggle('".$field_name."_ind','"."imagesbo/ve/inindent_focus.gif');\" onmouseout=\"image_toggle('".$field_name."_ind','"."imagesbo/ve/inindent.gif')\" ><img name='".$field_name."_ind' src='"."imagesbo/ve/inindent.gif' alt='".$strVEmsg40."' border=0 align=absmiddle ></a> "; ?>
</td>
<td>

<? if( !strcmp($sBrowserID,"NS")){ ?>
	<EMBED type="application/x-eskerplus" id=PropertyAccessor  classid="clsid:BB356E70-A100-11D4-8AF1-00104B4228F5" codebase="accessor.ocx#Version=1,0,0,1" width=2 height=2>
	<EMBED type="application/x-eskerplus" id="ObjTableInfo" CLASSID="clsid:47B0DFC7-B7A3-11D1-ADC5-006008A5848C" width=2 height=2 VIEWASTEXT>
<? }else{ ?>
	<object ID="ObjTableInfo" CLASSID="clsid:47B0DFC7-B7A3-11D1-ADC5-006008A5848C" width=2 height=2 VIEWASTEXT>
	</object>
<? } ?>

</td>
<td valign=middle>
	<img src='imagesbo/ve/separator.gif' border=0 align=absmiddle>
</td>
<td valign=middle>
<? echo "\n	<a href=''  onclick=\"obj_editor=".$field_name."; image_toggle('".$field_name."_lnk','"."imagesbo/ve/link.gif'); obj_editor.ExecCommand(5016,1); return false;\" onmouseover=\"image_toggle('".$field_name."_lnk','"."imagesbo/ve/link_focus.gif');\" onmouseout=\"image_toggle('".$field_name."_lnk','"."imagesbo/ve/link.gif')\" ><img name='".$field_name."_lnk' src='"."imagesbo/ve/link.gif' alt='".$strVEmsg17."' border=0 align=absmiddle ></a> "; ?>
</td>
<td valign=middle>
	<img src='imagesbo/ve/separator.gif' border=0 align=absmiddle>
</td>
<td valign=middle>
<? echo "\n	<a href=''  onclick=\"obj_editor=".$field_name."; image_toggle('".$field_name."_table','"."imagesbo/ve/instable.gif');  show_table(); return false;\" onmouseover=\"image_toggle('".$field_name."_table','"."imagesbo/ve/instable_focus.gif');\" onmouseout=\"image_toggle('".$field_name."_table','"."imagesbo/ve/instable.gif')\" ><img name='".$field_name."_table' src='"."imagesbo/ve/instable.gif' alt='".$strVEmsg20."' border=0 align=absmiddle ></a> "; ?>
</td>
<td valign=middle>
<? echo "\n	<a href=''  onclick=\"obj_editor=".$field_name."; obj_editor.ExecCommand(5021,0); return false;\" onmouseover=\"image_toggle('".$field_name."_ir','"."imagesbo/ve/insrow_focus.gif');\" onmouseout=\"image_toggle('".$field_name."_ir','"."imagesbo/ve/insrow.gif')\" ><img name='".$field_name."_ir' src='"."imagesbo/ve/insrow.gif' alt='".$strVEmsg21."' border=0 align=absmiddle ></a> "; ?>
</td>
<td valign=middle>
<? echo "\n	<a href=''  onclick=\"obj_editor=".$field_name."; obj_editor.ExecCommand(DECMD_DELETEROWS,0); return false;\" onmouseover=\"image_toggle('".$field_name."_dr','"."imagesbo/ve/delrow_focus.gif');\" onmouseout=\"image_toggle('".$field_name."_dr','"."imagesbo/ve/delrow.gif')\" ><img name='".$field_name."_dr' src='"."imagesbo/ve/delrow.gif' alt='".$strVEmsg22."' border=0 align=absmiddle ></a> "; ?>
</td>
<td valign=middle>
<? echo "\n	<a href=''  onclick=\"obj_editor=".$field_name."; obj_editor.ExecCommand(5020,0); return false;\" onmouseover=\"image_toggle('".$field_name."_ic','"."imagesbo/ve/inscol_focus.gif');\" onmouseout=\"image_toggle('".$field_name."_ic','"."imagesbo/ve/inscol.gif')\" ><img name='".$field_name."_ic' src='"."imagesbo/ve/inscol.gif' alt='".$strVEmsg23."' border=0 align=absmiddle ></a> "; ?>
</td>
<td valign=middle>
<? echo "\n	<a href=''  onclick=\"obj_editor=".$field_name."; obj_editor.ExecCommand(5006,0); return false;\" onmouseover=\"image_toggle('".$field_name."_dc','"."imagesbo/ve/delcol_focus.gif');\" onmouseout=\"image_toggle('".$field_name."_dc','"."imagesbo/ve/delcol.gif')\" ><img name='".$field_name."_dc' src='"."imagesbo/ve/delcol.gif' alt='".$strVEmsg24."' border=0 align=absmiddle ></a> "; ?>
</td>
<td valign=middle>
	<img src='imagesbo/ve/separator.gif' border=0 align=absmiddle>
</td>
<td valign=middle>
<? echo "\n	<a href=''  onclick=\"obj_editor=".$field_name."; obj_editor.ExecCommand(5019,0); return false;\" onmouseover=\"image_toggle('".$field_name."_ice','"."imagesbo/ve/inscell_focus.gif');\" onmouseout=\"image_toggle('".$field_name."_ice','"."imagesbo/ve/inscell.gif')\" ><img name='".$field_name."_ice' src='"."imagesbo/ve/inscell.gif' alt='".$strVEmsg25."' border=0 align=absmiddle ></a> "; ?>
</td>
<td valign=middle>
<? echo "\n	<a href=''  onclick=\"obj_editor=".$field_name."; obj_editor.ExecCommand(5005,0); return false;\" onmouseover=\"image_toggle('".$field_name."_dce','"."imagesbo/ve/delcell_focus.gif');\" onmouseout=\"image_toggle('".$field_name."_dce','"."imagesbo/ve/delcell.gif')\" ><img name='".$field_name."_dce' src='"."imagesbo/ve/delcell.gif' alt='".$strVEmsg26."' border=0 align=absmiddle ></a> "; ?>
</td>
<td valign=middle>
<? echo "\n	<a href=''  onclick=\"obj_editor=".$field_name."; obj_editor.ExecCommand(5029,0); return false;\" onmouseover=\"image_toggle('".$field_name."_cc','"."imagesbo/ve/mrgcell_focus.gif');\" onmouseout=\"image_toggle('".$field_name."_cc','"."imagesbo/ve/mrgcell.gif')\" ><img name='".$field_name."_cc' src='"."imagesbo/ve/mrgcell.gif' alt='".$strVEmsg27."' border=0 align=absmiddle ></a> "; ?>
</td>
<td valign=middle>
<? echo "\n	<a href=''  onclick=\"obj_editor=".$field_name."; obj_editor.ExecCommand(5047,0); return false;\" onmouseover=\"image_toggle('".$field_name."_sc','"."imagesbo/ve/spltcell_focus.gif');\" onmouseout=\"image_toggle('".$field_name."_sc','"."imagesbo/ve/spltcell.gif')\" ><img name='".$field_name."_sc' src='"."imagesbo/ve/spltcell.gif' alt='".$strVEmsg28."' border=0 align=absmiddle ></a> "; ?>
</td>
</tr>
</table>

<?
if( !strcmp($sBrowserID,"NS") )
{
	echo "<embed type=\"application/x-eskerplus\" id=\"".$field_name."\" classid=\"clsid:2D360201-FFF5-11d1-8D03-00A0C959BC0A\"  height=".$editor_height." width=".$editor_width." VIEWASTEXT >";
}
else
{
	echo "<object ID=\"".$field_name."\" CLASSID=\"clsid:2D360201-FFF5-11D1-8D03-00A0C959BC0A\" height=".$editor_height." width=".$editor_width." VIEWASTEXT >";
	echo "<param name=Scrollbars value=true>";
	echo "</object>";
}
?>

</td></tr></table>
</FORM>

<script language =javascript >
<?
$content_inicial = str_replace('"',"'",$content_inicial);
$car_aux = "\r\n";
$content_inicial = ereg_replace($car_aux,'',$content_inicial);
$content_inicial_aux = '"'.$content_inicial.'"';

echo "\n ".$field_name."_timerID=setInterval(\"".$field_name."_inicial()\",100);";
echo "\n function ".$field_name."_inicial(){ ";

	if( !strcmp($sBrowserID,"NS") )
	{
		echo "\n if( window[\"PropertyAccessor\"] && window[\"".$field_name."\"]){ ";
			echo "\n obj_editor = ".$field_name.";";
			echo "\n ".browser_adapt_string("Set",$field_name,"DocumentHTML",$content_inicial_aux).";";
	}
	else
	{
		echo "\n if( document[\"".$field_name."\"]){ ";
			echo "\n obj_editor = document.".$field_name.";";
			echo "\n document.".$field_name.".DocumentHTML = ".$content_inicial_aux;
	}
			echo "\n clearInterval(".$field_name."_timerID);";
?>
	}
	return true;
}


if(document.ve.images) 
{
<?	print "\n$images_toshow";	?>
}
</script>
