function ctmfeAccept() {
	if (document.querySelector('.click__map iframe')) {
		var mapIframe = document.querySelector('.click__map iframe');
		var mapInfo = document.querySelector('.click__map .click__map__text');
		var mapUrl = mapIframe.attributes["data-url"].value;
		if (mapUrl != "") {
			mapIframe.src = mapUrl;
		} else {
			mapIframe.style.opacity = 0;
			console.warn("iframe source is empty");
		}
		mapInfo.remove();
	}
}
