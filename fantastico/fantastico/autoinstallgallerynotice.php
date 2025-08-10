<cpanel include="fantasticoheader.php">
<script language="JavaScript">
<!--
function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function YY_checkform() { //v4.66
//copyright (c)1998,2002 Yaromat.com
  var args = YY_checkform.arguments; var myDot=true; var myV=''; var myErr='';var addErr=false;var myReq;
  for (var i=1; i<args.length;i=i+4){
    if (args[i+1].charAt(0)=='#'){myReq=true; args[i+1]=args[i+1].substring(1);}else{myReq=false}
    var myObj = MM_findObj(args[i].replace(/\[\d+\]/ig,""));
    myV=myObj.value;
    if (myObj.type=='text'||myObj.type=='password'||myObj.type=='hidden'){
      if (myReq&&myObj.value.length==0){addErr=true}
      if ((myV.length>0)&&(args[i+2]==1)){ //fromto
        var myMa=args[i+1].split('_');if(isNaN(myV)||myV<myMa[0]/1||myV > myMa[1]/1){addErr=true}
      } else if ((myV.length>0)&&(args[i+2]==2)){
          var rx=new RegExp("^[\\w\.=-]+@[\\w\\.-]+\\.[a-z]{2,4}$");if(!rx.test(myV))addErr=true;
      } else if ((myV.length>0)&&(args[i+2]==3)){ // date
        var myMa=args[i+1].split("#"); var myAt=myV.match(myMa[0]);
        if(myAt){
          var myD=(myAt[myMa[1]])?myAt[myMa[1]]:1; var myM=myAt[myMa[2]]-1; var myY=myAt[myMa[3]];
          var myDate=new Date(myY,myM,myD);
          if(myDate.getFullYear()!=myY||myDate.getDate()!=myD||myDate.getMonth()!=myM){addErr=true};
        }else{addErr=true}
      } else if ((myV.length>0)&&(args[i+2]==4)){ // time
        var myMa=args[i+1].split("#"); var myAt=myV.match(myMa[0]);if(!myAt){addErr=true}
      } else if (myV.length>0&&args[i+2]==5){ // check this 2
            var myObj1 = MM_findObj(args[i+1].replace(/\[\d+\]/ig,""));
            if(myObj1.length)myObj1=myObj1[args[i+1].replace(/(.*\[)|(\].*)/ig,"")];
            if(!myObj1.checked){addErr=true}
      } else if (myV.length>0&&args[i+2]==6){ // the same
            var myObj1 = MM_findObj(args[i+1]);
            if(myV!=myObj1.value){addErr=true}
      }
    } else
    if (!myObj.type&&myObj.length>0&&myObj[0].type=='radio'){
          var myTest = args[i].match(/(.*)\[(\d+)\].*/i);
          var myObj1=(myObj.length>1)?myObj[myTest[2]]:myObj;
      if (args[i+2]==1&&myObj1&&myObj1.checked&&MM_findObj(args[i+1]).value.length/1==0){addErr=true}
      if (args[i+2]==2){
        var myDot=false;
        for(var j=0;j<myObj.length;j++){myDot=myDot||myObj[j].checked}
        if(!myDot){myErr+=args[i+3]+'\n'}
      }
    } else if (myObj.type=='checkbox'){
      if(args[i+2]==1&&myObj.checked==false){addErr=true}
      if(args[i+2]==2&&myObj.checked&&MM_findObj(args[i+1]).value.length/1==0){addErr=true}
    } else if (myObj.type=='select-one'||myObj.type=='select-multiple'){
      if(args[i+2]==1&&myObj.selectedIndex/1==0){addErr=true}
    }else if (myObj.type=='textarea'){
      if(myV.length<args[i+1]){addErr=true}
    }
    if (addErr){myErr+=args[i+3]+'\n'; addErr=false}
  }
  if (myErr!=''){alert(myErr)}
  document.MM_returnValue = (myErr=='');
}
//-->
</script>

<form action="autoinstallgallery.php" onSubmit="YY_checkform('form1','agreed','#q','1','You must accept the Terms of Use in order to proceed!');return document.MM_returnValue">
  <p align="center"><img src="images/4images_logo.gif" width="198" height="52">
  <p>
  <table width=100% class='TableMiddle'>
	<tr> 
	  <td>
		<p class="TableMiddleHead">Please notice:</p>
	  </td>
	</tr>
	<tr>
	  <td>&nbsp;</td>
	</tr>
	<tr>
	  <td>
		<p>The software <b>4images Gallery</b> may be used freely only for personal and non-profit websites. Before you proceed with the installation you must read the <b>Terms of Use </b>and agree with them.</p>
		<p>You need a license in order to use this software on commercial or profit oriented websites. We advise our clients to purchase a license if they want to use this software for commercial or profit purposes. Purchasing a license will grant you not only legal rights to use the software but you will also be able to get support.</p>
		<p>This is not free software, even if you may use it freely for personal and non-profit websites. <b>You must read the Terms of Use and accept them  even if you will use 4images Gallery for a personal or non-profit website only.</b></p>
		<p>&nbsp;</p>
		<p align="center">
		  <textarea name="license" wrap="VIRTUAL" readonly cols="60" rows="20" class=body>NOTE: This is only a short translation of the license agreement to give an overview in English language. If you use 4images you agree also to the German version of the licence agreement.

After reading this agreement carefully, if you do not agree to all of the terms of this agreement, you may not use this software.

This software is owned by Dots United, Schroko & Sorgalla GbR and is protected by national copyright laws and international copyright treaties.
4images may be used and modified free of charge for personal and non-profit use.
Commercial use must purchase a Licence.

Selling or redistributing the code or parts of the code of 4images without prior written consent is expressly forbidden.

All copyright notices including the hyperlinks, and headers remain intact and unmodified in the source. 
If you wish to remove the visible copyright notice you have to purchase a Copyright-Removal-Licence. 

You are free to modify the code for your own personal use at your own risk.

THIS SOFTWARE AND THE ACCOMPANYING FILES ARE OFFERED "AS IS" AND WITHOUT WARRANTIES AS TO PERFORMANCE OR MERCHANTABILITY OR ANY OTHER WARRANTIES WHETHER EXPRESSED OR IMPLIED. NO WARRANTY OF FITNESS FOR A PARTICULAR PURPOSE IS OFFERED.

The user assumes the entire risk of using the program.

From time to time, Dots United may inspect the adherence of this License Agreement. This will be done without collecting any information whatsoever about yourself, your server or your users. The only information verified will be the adherence of this License Agreement and the domain on which the software is run. 
Should we discover discrepancies in the software usage, we are entitled to initiate appropriate steps. 

By using 4images the first time, you agree with this terms of use.</textarea>
							</p>
		<p align="center">
		<input type="checkbox" name="agreed" value="checkbox">
		I accept the above Terms of Use</p>
		<p align="center">
		  <input type="submit" name="submit" value="Continue with the installation">
		</p>
		<p align="center"><a href="http://shareit1.element5.com/product.html?cart=1&productid=157569&languageid=1&currency=all" target="_blank">Purchase a license for commercial/profit use</a></p>
	  </td>
	</tr>
  </table>
</form>
<center>
  <a href="index.php">Fantastico Auto-installer overview</a>
</center>
<cpanel include="fantasticofooter.php">
