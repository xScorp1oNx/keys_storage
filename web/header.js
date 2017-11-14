var HeaderShorter = function (HeaderQuery, margin) {
    "use strict";
    var header = document.querySelector(HeaderQuery);
    window.addEventListener("scroll", 
    function (header, margin) {
         return function () {
            if (window.scrollY>margin) {
                header.classList.add("minimized");
            } else {
                header.classList.remove("minimized");
            }
        }
    }(header, margin));
}("header", 50);