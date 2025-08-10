
/**************************************

Project: Siteseed (copyright MrNet 2001 - All right reserved)
Filename: include/layers.js 
Last modified: 20020220

***************************************/



// browser detection

IE4 = (document.all) ? 1 : 0;      
NS4 = (document.layers) ? 1 : 0;   
NG = (document.getElementById) ? 1 : 0;


// show/hide layer functions

function showlayer(whichlayer) {
	mylayer = getmylayer(whichlayer);
	if (NS4) mylayer.visibility = "show"; else mylayer.style.visibility="visible";
}

function hidelayer(whichlayer) {
	mylayer = getmylayer(whichlayer);
	if (NS4) mylayer.visibility = "hide"; else mylayer.style.visibility="hidden";
}


function getmylayer(whichlayer, d) {
	if (document.layers) {
		var i,l;
		if (!d) d=document;
		if (!(l=d[whichlayer])) { 	
			for (i=0; !l && d.layers && i<d.layers.length; i++) { l = getmylayer(whichlayer, d.layers[i].document);}
		}
	}
	if (document.all) { l = document.all.whichlayer; }
	if (document.getElementById) { l = document.getElementById(whichlayer);}
	return l;
}


// page ticker control functions 

function RollTickers()
{
	for (i=0; i<Tickers.length; i++)
	{
		clearTimeout(TimerId['ticker' + Tickers[i]]);
		TimerId['ticker' + Tickers[i]] = setTimeout("next('ticker" + Tickers[i] + "')",TimerDelay['ticker' + Tickers[i]]);
	}
}
	

function next(tickername)
{
	LayerName = tickername + 'page' + shownLayer[tickername];
	if (pause[tickername] == false)
	{
		if (((shownLayer[tickername]+1) > numLayers[tickername]) && (Loop[tickername]=="no")) return false;
		hidelayer(LayerName);
		if (++shownLayer[tickername] > numLayers[tickername])  shownLayer[tickername] = 1;
		LayerName = tickername + 'page' + shownLayer[tickername];
		showlayer(LayerName);
	}
	if (TimerId[tickername] != 0)	clearTimeout(TimerId[tickername]);
	TimerId[tickername] = setTimeout("next('"+tickername+"')",TimerDelay[tickername]);
}


function pauseLayer(tickername)
{
	pause[tickername] = !pause[tickername];
}


function prev(tickername)
{
	LayerName = tickername + 'page' + shownLayer[tickername];
	if (pause[tickername] == false)
	{
		if (((shownLayer[tickername]-1) <1) && (Loop[tickername]=="no")) return false;
		hidelayer(LayerName);
		if (--shownLayer[tickername] <1) shownLayer[tickername] = numLayers[tickername];
		LayerName = tickername + 'page' + shownLayer[tickername];
		showlayer(LayerName);
	}
	if (TimerId[tickername] != 0) clearTimeout(TimerId[tickername]);
	TimerId[tickername] = setTimeout("next('"+tickername+"')",TimerDelay[tickername]);
}


// ScrollMarquee functions

function StartMarquee(marqueename)
{
	if(NS4)
	{
		setTimeout("window.onresize=window.location.reload();",450);
		FarLeft[marqueename]=document.marqueename.document.width * (-1);
		ScrollerTimeout = setTimeout("ScrollMarquee('"+marqueename+"')", 100);
	}
	else if(NG && !IE4)
	{
		var Marquee=getmylayer(marqueename);
		CurrPos[marqueename] = MarqueeWidth[marqueename];
		FarLeft[marqueename] = Marquee.firstChild.firstChild.offsetLeft * (-1);
		alert (Marquee.firstChild.firstChild.offsetWidth);
		ScrollerTimeout = setTimeout("ScrollMarquee('"+marqueename+"')", 100);
	}
}


function ScrollMarquee(marqueename)
{ 
	if(NS4)
	{
		document.marqueename.left -= MarqueeSpeed[marqueename];
		if (document.marqueename.left<FarLeft[marqueename]) document.marqueename.left = MarqueeWidth[marqueename];
		ScrollerTimeout = setTimeout("ScrollMarquee('"+marqueename+"')", 100);
	}
	else if(NG && !IE4)
	{ 
		var Marquee=getmylayer(marqueename);
		CurrPos[marqueename] -= MarqueeSpeed[marqueename];
		if (CurrPos[marqueename] < FarLeft[marqueename]) CurrPos[marqueename] = MarqueeWidth[marqueename];
		Marquee.firstChild.style.left = CurrPos[marqueename];
		ScrollerTimeout = setTimeout("ScrollMarquee('"+marqueename+"')", 100);
	}
}
