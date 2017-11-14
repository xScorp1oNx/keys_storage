var fontSizer = function (Query) {
    if (localStorage.getItem("fontSize") === null) {
        localStorage.setItem("fontSize", "16px");
    }
    var Elements = [].slice.call(document.querySelectorAll(Query));
    for (var i = 0; i < Elements.length; i++) {
        Elements[i].fontSize = window.getComputedStyle(Elements[i]).fontSize;
        Elements[i].addEventListener("click", function (mObj) {
            return function () {
                mObj.setFont(this.fontSize);
            };
        }(this));
    }
    this.setFont = function (size) {
        localStorage.setItem("fontSize", size);
        document.querySelector(":root").style.fontSize = size;
        Elements.forEach(function (obj) {
            if (obj.fontSize === size) {
                obj.classList.add("amenitiesButtonChecked");
            } else {
                obj.classList.remove("amenitiesButtonChecked");
            }
        });
    };
    this.setFont(localStorage.getItem("fontSize"));
    
}("div#amenitiesTextSize span.amenitiesContent a");

var fontSizer = function (Query) {
    var element = document.querySelector(Query);
    element.addEventListener("click", function (mObj) {
        return function (e) {
            mObj.switchContrast();
        };
    }(this));
    if (localStorage.getItem("contrastMode") === null) {
        localStorage.setItem("contrastMode", "false");
    }
    this.setContrast = function (contrastMode) {
        localStorage.setItem("contrastMode", contrastMode);
        if (contrastMode) {
            document.body.classList.add("contrastMode");
        } else {
            document.body.classList.remove("contrastMode");
        }
        element.checked=contrastMode;
    };
    this.switchContrast = function () {
        if (localStorage.getItem("contrastMode")==="true") {
            this.setContrast(false);
        } else {
            this.setContrast(true);
        }
    };
    this.setContrast(localStorage.getItem("contrastMode")==="true");
    
}("div#amenitiesContrast #contrastMode");
