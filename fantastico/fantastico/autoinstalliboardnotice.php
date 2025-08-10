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

<form action="autoinstalliboard.php" onSubmit="YY_checkform('form1','agreed','#q','1','You must accept the License Agreement in order to proceed!');return document.MM_returnValue">
  <p align="center"><img src="images/iboard.jpg" width="150" height="44">
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
		<p>The software <b>Invision Board</b> may be used freely but you may not remove the copyright notice unless you purchase authorisation to do so. Before you proceed with the installation you must read the <b>License Agreement</b> and agree with it.</p>
		<p>
<span class="TableMiddleHead">License Agreement</span><br><br>
It is highly suggested you read all sections of this license agreement. It contains information on what you can and cannot do with the software. Many questions are answered in the body of this document, please read it carefully.
<HR><BR>
Invision Power Services<BR>
Invision Board Software<BR>
End User License Agreement <BR> 
<BR>
<B>PRICING</B><BR>
Personal and Non-Profit Users: $0.00
<BR>
Corporate Users: $0.00
<BR> <Blockquote>
  <p><B>OPTIONAL SERVICES</B><BR>
	Priority Support: $65.00 per year [<a href="http://www.invisionboard.com/?services">info</a>] 
	<BR>
	Copyright Output Removal: $99.00 [<a href="http://www.invisionboard.com/?licenseinfo#labels">info</a>] 
	<BR>
	Installation Service: $35.00 [<a href="http://www.invisionboard.com/?services">info</a>]<BR>
	Convert from another product: $50.00 [<a href="http://www.invisionboard.com/?services">info</a>] 
	<BR>
  </p>
  <p> (Notice: When using <strong>Fantastico</strong>, you will not need the Installation 
	Services) </p>
  <p><BR>
	Purchase our managed care service package and receive priority technical support 
	by email or phone, intallation on your servers, conversion service, copyright 
	ouput removal and updates installed on your server all for a low fee of $175 
	per year. </p>
</blockquote> <BR> 
<b>LICENSE</b><BR> 
Invision Power Services (IPS) grants you a non-exclusive license to use the Software if you follow all restrictions in all sections of this Agreement.<BR> 
<blockquote>
<B>Important:</B> Invision Board is <B>NOT</B> an open source software product. You must follow the limitations in this software agreement. We offer specific permission to customise the code for your own needs later in this agreement.
</blockquote> 
Technical support and related services are available to those following this Agreement with no charge on www.invisionboard.com and its related partner sites. IPS reserves the right to limit or refuse free technical support and related services in any form for any reason.
<BR> <BR>
If you do not wish to be under the free support limitations, you must purchase a priority support service agreement. Priority support can be purchased through the member center on the Invision Board web site under the advanced services section.
<BR> <BR> 
<B>SCOPE OF GRANT</b><BR>You may:
<ul> 
<li> use the Software on one or more computers
<li> copy the Software for archival purposes, provided any copy must contain all of the original Software's proprietary notices
<li> customise the software's design and operation to suit the internal needs of your web site [<a href="http://www.invisionboard.com/?licenseinfo#custom">info</a>]
<li> produce and distribute modification instructions, Skin packs, or Language packs provided that they contain notification that the Skin and Language packs were exported from and originally created by Invision Board and/or IPS. The modifications instructions you personally create are not owned by IPS so long as they contain no proprietary coding from Invision Board. [<a href="http://www.invisionboard.com/?licenseinfo#custom">info</a>]
<li> create applications which interface with the operation of the Software provided said application is an original work [<a href="http://www.invisionboard.com/?licenseinfo#apps">info</a>]
</ul>
You may not:
<ul> 
<li> permit other individuals to use the Software except under the terms listed above
<li> reverse engineer, disassemble, or create derivative works based on the Software for distribution or usage outside your web site excluding those applications described above [<a href="http://www.invisionboard.com/?licenseinfo#derive">info</a>]
<li> use the Software in such as way as to condone or encourage terrorism, promote or provide pirated software, or any other form of illegal or damaging activity
<li> modify and/or remove any copyright notices or labels on the Software on each page and in the header of each script source file  [<a href="http://www.invisionboard.com/?licenseinfo#labels">info</a>]
<li> distribute the software without written consent from IPS [<a href="http://www.invisionboard.com/?licenseinfo#distro">info</a>]
<li> distribute or modify proprietary graphics, HTML, or CSS packaged with the Software for use in other Software applications or web sites without written permission from IPS
</ul> <BR>
<b>DISCLAIMER OF WARRANTY</b><BR>The Software is provided on an "AS IS" basis, without warranty of any kind, including without limitation the warranties of merchantability, fitness for a particular purpose and non-infringement. The entire risk as to the quality and performance of the Software is borne by you. Should the Software prove defective, you and not IPS assume the entire cost of any service and repair. In addition, the security mechanisms implemented by IPS software have inherent limitations, and you must determine that the Software sufficiently meets your requirements. This disclaimer of warranty constitutes an essential part of the agreement.
<BR> <BR>  
<B>TITLE</B><BR>Title, ownership rights, and intellectual property rights in the Software shall remain with IPS. The Software is protected by copyright laws and treaties. Title and related rights in the content accessed through the Software is the property of the applicable content owner and may be protected by applicable law. This License gives you no rights to such content.
<BR> <BR> 
<B>TERMINATION</B><BR> This Agreement will terminate automatically if you fail to comply with the limitations described herein. On termination, you must destroy all copies of the Software within 48 hours.
<BR> <BR> 
<B>MISCELLANEOUS</B><BR> IPS reserves the right to publish a selected list of users of the Software. IPS reserves the right to change the terms of this Agreement at any time however those changes are not retroactive to past releases. Changes to the Agreement will be announced via email using the IPS email notification list. Failure to receive notification of a change does not make those changes invalid. A current copy of this Agreement will be available on the Invision Board web site.
<BR> <BR>
Skin packs and Language packs are defined as the group of code, text, and graphics that are exported from the Software using the Administration Control Panel or otherwise obtained from the Software.
<BR> <BR> 
Technical support will not be provided for third-party modifications to the Software including modifications to code, Skin packs, and Language packs to any license holder. If the Software is modified using a third-party modification instruction or otherwise, technical support may be refused to any license holder. [<a href="http://www.invisionboard.com/?licenseinfo#support">info</a>]
<BR> <BR> 
<B>PROPRIETARY LABELS</B><BR> Authorisation to remove copyright notices can be obtained from IPS for a one time fee of $149. This fee authorises you to remove the output of copyright notices, it does not give you authorisation to remove any copyright notices in the script source header files nor any other rights. [<a href="http://www.invisionboard.com/?licenseinfo#labels">info</a>]
<BR> <BR>
<B>MANUFACTURER</B><BR> Invision Power Services, P.O. Box 24, Evergreen, VA 23939. For questions, write to the above address, email license@invisionboard.com, or call 434-352-9311.
<BR> <BR>
Donations to support continued development are appreciated. Donations are not tax deductible.

<BR> <BR> 
  		<p align="center">
		<input type="checkbox" name="agreed" value="checkbox">
		I accept the above License Agreement</p>
		<p align="center">
		  <input type="submit" name="submit" value="Continue with the installation">
		</p>
	  </td>
	</tr>
  </table>
</form>
<center>
  <a href="index.php">Fantastico Auto-installer overview</a>
</center>
<cpanel include="fantasticofooter.php">
