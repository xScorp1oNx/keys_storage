var cookies = function (cookieQuery) {
    "user select";
    var cookie = document.querySelector(cookieQuery);
    var cookieExitBt = cookie.querySelector("#cookiesClose");
    var getCookie = function (name) {
        var value = "; " + document.cookie;
        var parts = value.split("; " + name + "=");
        if (parts.length == 2) return parts.pop().split(";").shift();
    };
    if (navigator.cookieEnabled) {
        if (typeof getCookie("isCookieAccepted") == 'undefined') {
            cookie.style.display = "block";
        }
    }
    cookieExitBt.onclick = function () {
        document.cookie = "isCookieAccepted=true;expires=0;path=/";
        cookie.classList.add("hideCookie");
    };
    
    
}("#cookies");
