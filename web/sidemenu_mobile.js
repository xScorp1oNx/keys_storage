var Sidemenu_mobile = function (buttonDivQuery, menuDivQuery) {
    var buttonDiv = document.querySelector(buttonDivQuery);
    var menuDiv = document.querySelectorAll(menuDivQuery);
    
    buttonDiv.addEventListener("click", function (mObj) {
        return function () {
            mObj.switchMenu();
        }
    }(this));
    this.switchMenu = function () {
        buttonDiv.classList.toggle("opened");
        menuDiv.forEach(function (elem) {
            elem.classList.toggle("opened");
        });
    };
    
}("#sideMenuOpener", "#sideMenu");