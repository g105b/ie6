(function() {
var 
	addr = document.getElementById("ie6-addressbar"),
	iframe = document.getElementById("output"),

	props = {
		"display": ["block", "inline", "table-cell"],
	},
$;

/**
 * Randomly change `display`, `position`, `padding`, `margin` values of all
 * elements on the page.
 */
function fuckUp(doc) {
	var 
		all = doc.getElementsByTagName("*"),
		allLen = all.length,
		i = 0,
		el,
		p,
		m,
		dis,
		pos,
	$;

	for(; i < allLen; i++) {
		el = all[i];
		if(el.tagName == "STYLE"
		|| el.tagName == "SCRIPT") {
			continue;
		}

		el.style.display = props.display[
			Math.floor(Math.random() * props.display.length)
		];
	}
};

iframe.addEventListener("load", function(e) {
	var 
		loc = this.contentWindow.location.href,
		qs = "?iurl=",
		url = loc.substr(loc.indexOf(qs) + qs.length),
	$;
	addr.querySelector("input").value = decodeURIComponent(url);
	this.style.visibility = "visible";
	fuckUp(this.contentWindow.document);
});

})();