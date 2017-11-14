var sidemenuMenager = function (menuQuery) {
    "use strict";
    var menu = [].slice.call(document.querySelectorAll(menuQuery));
    menu.forEach(function (menuVal) {
        [].slice.call(menuVal.getElementsByTagName("a")).forEach(function (buttonVal) {

            var next = buttonVal.nextSibling;
            if (next !== null && next.nodeName === "OL") {
                buttonVal.onclick = function (event) {
                    buttonVal.nextSibling.classList.toggle("opened");
                    buttonVal.classList.toggle("opened");
                };
                buttonVal.onfocus = function (event) {
                    this.onkeyup = function (e) {
                        var code = (e.keyCode ? e.keyCode : e.which);
                        if (code === 9) {
                            if (event.relatedTarget !== null) {
                                buttonVal.nextSibling.classList.add("opened");
                                buttonVal.classList.add("opened");
                            }
                        }
                    };
                    
                    
                };
            }
                
        });
    });
}("section#sideMenu");