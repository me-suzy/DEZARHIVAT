
<table width="90%" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr> 
    <td align="center" width="14%">&nbsp; 
    <td align="center" width="72%"> 
      <% 
'If there is a forum image then dsiplay it
If NOT strTitleImage = "" Then
    Response.Write("<img src=""" & strTitleImage) & """></td>"
End If
%>
    <td align="center" width="14%"><img src="forum_images/homepage_icon.gif" width="14" height="14" alt="<% = strWebsiteName %>'s Homepage"> <a href="<% = strHomepagePath %>" target="_self" style="font-size: 11px;"> <% = strWebsiteName %>'s Home</a> 
  </tr>
</table>
