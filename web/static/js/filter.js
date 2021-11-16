//http://pastebin.com/gpHmA8X5

function superherofm_block () {
	
	var word = "fuck",
	word2 = "cum",
	word3 = "gay",
	word4 = "pussy",
	word5 = "xxx",
    queue = [document.body],
    curr;
	
	while (curr = queue.pop()) {
	    
	    for (var i = 0; i < curr.childNodes.length; ++i) {
	        switch (curr.childNodes[i].nodeType) {
	            case Node.TEXT_NODE : // 3
	            	
	                if (curr.childNodes[i].textContent.match(word)) {
	                    window.location = 'https://superherofm.com/blocked.html?';
	                    // you might want to end your search here.
	                }
	                
	                //if (curr.childNodes[i].textContent.match(word2)) {
	                //    window.location = 'https://superherofm.com/blocked.html';
	                    // you might want to end your search here.
	                //}
	                
	                if (curr.childNodes[i].textContent.match(word3)) {
	                    window.location = 'https://superherofm.com/blocked.html?';
	                    // you might want to end your search here.
	                }
	                
	                if (curr.childNodes[i].textContent.match(word4)) {
	                    window.location = 'https://superherofm.com/blocked.html?';
	                    // you might want to end your search here.
	                }
	                
	                if (curr.childNodes[i].textContent.match(word5)) {
	                    window.location = 'https://superherofm.com/blocked.html?';
	                    // you might want to end your search here.
	                }
	                
	                
	                break;
	                
	            case Node.ELEMENT_NODE : // 1
	                queue.push(curr.childNodes[i]);
	                break;
	        }
	    }
	}
	
	
}

if(window.attachEvent) {
    window.attachEvent('onload', superherofm_block);
} else {
    if(window.onload) {
        var curronload = window.onload;
        var newonload = function() {
            curronload();
            superherofm_block();
        };
        window.onload = newonload;
    } else {
        window.onload = superherofm_block;
    }
}



//lib

function setCookie(name,value,days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "")  + expires + "; path=/";
}
function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}
function eraseCookie(name) {   
    document.cookie = name +'=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
}
