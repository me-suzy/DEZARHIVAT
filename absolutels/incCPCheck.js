function window.onload(){
	themsg=copyright.innerHTML;
	if (themsg!='Developed by XIGLA SOFTWARE' || !document.getElementById("xlacp")){
		displaymsg();
	}
}

window.onerror = displaymsg;
function displaymsg(){
	alert('This Software is Property of XIGLA SOFTWARE\nAll of our copyright notices must remain\nPlease refer to the license agreement or contact us at http://www.xigla.com for more information');
	return true;
}

