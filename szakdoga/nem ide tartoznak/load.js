function load(url,place) {
document.getElementById(place).innerHTML = "<div style=\"text-align:center; font-family: Calibri; font-size:12px; font-weight:bold; margin-top:100px;;\">";
var req = null;
if (window.XMLHttpRequest)
req = new XMLHttpRequest()
else
if (window.ActiveXObject) req = new ActiveXObject("Microsoft.XMLHTTP");

req.onreadystatechange = function() {
if (req.readyState == 4)
if (req.status == 200)
document.getElementById(place).innerHTML = req.responseText;
else
document.getElementById(place).innerHTML = "AJAX hiba.";
} 
req.open("GET", url, true); 
req.send(null);
}
