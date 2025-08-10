<!--#include file="skin_file.inc" -->
</head>
<body bgcolor="<% = strBgColour %>" text="<% = strTextColour %>" background="<% = strBgImage %>" marginheight="0" marginwidth="0" topmargin="0" leftmargin="0">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
 <tr> 
  <td colspan="2">
<table width="90%" border="0" cellspacing="7" cellpadding="0" align="center">
  <tr> 
    <td width="14%" valign="top"><%
'If the user is admin display a link to the admin memnu
If lngLoggedInUserID = 1 Then Response.Write("<a href=""admin/admin_menu.asp"">" & strTxtAdmin & "</a>") %>&nbsp;
    <td align="center" width="72%"> 
      <% 
'If there is a forum image then dsiplay it
If NOT strTitleImage = "" Then
    Response.Write("<img src=""" & strTitleImage) & """></td>"
End If
%>
    <td align="center" width="14%"><img src="<% = strImagePath %>homepage_icon.gif" alt="<% = strWebsiteName & " " & strTxtHomepage %>"> <a href="<% = strHomepagePath %>" target="_self" style="font-size: 11px;"> <% = strWebsiteName & " " & strTxtHomepage %></a> 
  </tr>
</table>
</td>
 </tr>
 <tr> 
  <td width="0%" valign="top"><!-- #include file="side_bar.inc" --></td>
  <td width="100%" valign="top">