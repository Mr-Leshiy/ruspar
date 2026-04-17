nn4 = (document.layers)? true : false;
ie4 = (document.all)? true : false;
dom = (document.createTextNode)? true : false;

function getDims(winWidth, winHeight) {
	var dims = new Object();
	if (winWidth) {
		dims.width = winWidth;
		dims.scrollbars = false;
		if (screen.width < dims.width + 50) {
			dims.width = screen.width - 50;
			dims.scrollbars = true;
		}
	}
	dims.widthStr = (winWidth)? ',width=' + dims.width : '';
	if (winHeight) {
		dims.height = winHeight;
		if (screen.height < dims.height + 100) {
			dims.height = screen.height - 100;
			dims.scrollbars = true;
		}
	}
	dims.heightStr = (winHeight)? ',height=' + dims.height : '';
	dims.scrollbarsStr = (dims.scrollbars)? ',scrollbars=yes' : ',scrollbars=no';
	dims.posX = Math.round((screen.width - dims.width) / 2);
	dims.posY = Math.round((screen.height - winHeight) / 2);
	dims.posCode = (document.all)? ',left=' + dims.posX + ',top=' + dims.posY : ',screenX=' + dims.posX + ',screenY=' + dims.posY;
	return dims;
}

function popupImg(imgSrc, winName, imgWidth, imgHeight, winTitle) {
	winWidth = (imgWidth)? imgWidth +0 : null;
	winHeight = (imgHeight)? imgHeight + 0 : null;
	var dims = getDims(winWidth, winHeight);
	var popupWin = window.open('', winName, 'menubar=no,toolbar=no,resizable=no,status=no' + dims.scrollbarsStr + dims.widthStr + dims.heightStr + dims.posCode);
	if (popupWin) {
		popupWin.document.open();
		popupWin.document.write('<html><head><title>' + winTitle + '</title></head><body bgcolor="white" style="margin: 0px 0px; padding: 0px;">')
		popupWin.document.write('<img src="' + imgSrc + '" width="' + imgWidth + '" height="' + imgHeight + '" />')
		popupWin.document.write('</body></html>')
		popupWin.document.close();
	}
	return false;
}

function openWnd(url,wnd_name,width,height,scrollbars){
	var stScrollBar = (scrollbars ? 'no' : 'no');
	if (top[wnd_name]!=null && typeof(top[wnd_name])=='object' && !top[wnd_name].closed && top[wnd_name].load_flag==1) {
	if (top[wnd_name].document.location.href!=url) top[wnd_name].document.location.href=url;
		top[wnd_name].focus();
	} else {
		top[wnd_name]=window.open(url,wnd_name,'width='+width+',height='+height+',status=no,menubar=no,resizable=no,scrollbars='+stScrollBar+',left='+String((screen.width-width)/2)+',top='+String((screen.height-height)/2));
	}
}