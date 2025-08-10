<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td align="center"><% 
'If there is a Guestbook image then dsiplay it
If NOT strTitleImage = "" Then
    Response.Write("<img src=""" & strTitleImage) & """></td>"
End If
%>   </tr>
</table>