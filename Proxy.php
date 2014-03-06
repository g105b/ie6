<?php
$ua = "Mozilla/5.0 (Windows; U; MSIE 6.0; "
	. "Windows NT 5.1; SV1; .NET CLR 2.0.50727)";
$url = $_GET["iurl"];

$ch = curl_init();
curl_setopt_array($ch, [
	CURLOPT_URL => $url,
	CURLOPT_USERAGENT => $ua,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_RETURNTRANSFER => true,
]);

$domain = parse_url($url, PHP_URL_HOST);
$scheme = parse_url($url, PHP_URL_SCHEME);

$html = curl_exec($ch);
if(empty($html)) {
	require("Death.html");
}

$dom = new DomDocument("1.0", "utf-8");
libxml_use_internal_errors(true);
$dom->strictErrorChecking = false;
$dom->loadHTML($html);

$anchorList = $dom->getElementsByTagName("a");
foreach ($anchorList as $anchor) {
	$href = $anchor->getAttribute("href");
	if(!strstr($href, "://")) {
		$href = "$scheme://$domain/$href";
	}

	$href = "/?iurl=$href";
	$anchor->setAttribute("href", $href);
}

$scriptList = $dom->getElementsByTagName("script");
foreach ($scriptList as $script) {
	$script->parentNode->removeChild($script);
}
foreach ($scriptList as $script) {
	$script->parentNode->removeChild($script);
}

$linkList = $dom->getElementsByTagName("link");
foreach ($linkList as $link) {
	if(!$link->hasAttribute("href")) {
		continue;
	}
	$href = $link->getAttribute("href");
	if(!strstr($href, "://")) {
		$href = "$scheme://$domain/$href";
	}

	$link->setAttribute("href", $href);
}

$imgList = $dom->getElementsByTagName("img");
foreach ($imgList as $img) {
	$src = $img->getAttribute("src");
	if(strstr($src, "://")) {
		continue;
	}
	$src = "$scheme://$domain/$src";
	$img->setAttribute("src", $src);
}

$formList = $dom->getElementsByTagName("form");
foreach ($formList as $form) {
	if(!$form->hasAttribute("action")) {
		continue;
	}
	$action = $form->getAttribute("action");
	if(!strstr($action, "://")) {
		$action = "$scheme://$domain/$action";
	}

	$form->setAttribute("action", $action);
}

$head = $dom->getElementsByTagName("head")->item(0);
$link = $dom->createElement("link");
$link->setAttribute("rel", "stylesheet");
$link->setAttribute("href", "/FuckUp.css");
$head->appendChild($link);

echo $dom->saveHTML();