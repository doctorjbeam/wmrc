// JavaScript Document
	function writeEmailAddress(username, hostname, linktext) {
		document.write("<a href=" + "mail" + "to:" + username + "@" + hostname + ">" + linktext + "</a>");
	}
	
    function makeRequest(url, target) {
        var httpRequest;

        if (window.XMLHttpRequest) { // Mozilla, Safari, ...
            httpRequest = new XMLHttpRequest();
            if (httpRequest.overrideMimeType) {
                httpRequest.overrideMimeType('text/xml');
                // See note below about this line
            }
		} else if (window.ActiveXObject) { // IE
			try {
                httpRequest = new ActiveXObject("Msxml2.XMLHTTP");
			} catch (e) {
				try {
					httpRequest = new ActiveXObject("Microsoft.XMLHTTP");
				} catch (e) {
				
				}
			}
		}

        if (!httpRequest) {
            alert('Giving up :( Cannot create an XMLHTTP instance');
            return false;
        }
        httpRequest.onreadystatechange = function() { alertContents(httpRequest); };
        httpRequest.open('GET', url, true);
        httpRequest.send(null);

    }

    function alertContents(httpRequest) {

        if (httpRequest.readyState == 4) {
            if (httpRequest.status == 200) {
                alert(httpRequest.responseText);
//				document.getElementById("galleryimg").src
            } else {
                alert('There was a problem with the request.');
            }
        }

    }
	
	function changeImage(image, element) {
		document.getElementById(element).src = image;
	}
	
	function toggleElement(element) {
		var newelement = document.getElementById(element);
		
		if (newelement.style.display == "none") {
			newelement.style.display = "block";
		} else {
			newelement.style.display = "none";
		}
	}
	
	function setElementVisibility(element, mode) {
		document.getElementById(element).style.display = mode;
	}
	
	function loadingImage() {
		document.getElementById("imgplaceholder").style.display	= "none";
		document.getElementById("galleryimg").style.display = "none";
		document.getElementById("loadingimage").style.display = "block";
		
		setTimeout("document.getElementById('loadingimage').style.display = 'none'", 5000);
		setTimeout("document.getElementById('galleryimg').style.display = 'block'", 5000);
	}
	