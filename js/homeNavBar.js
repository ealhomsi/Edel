
var body = 0 ;
var NavBarShit = 0;
function registerBody() {
    body = document.getElementsByTagName("body")[0];
    NavBarShit = document.getElementById("NavBarShit");
}

function update() {
    if(body.scrollTop > 355.45452880859375) {
        NavBarShit.style.backgroundColor = "black";
        NavBarShit.style.opacity = "0.99";
    } else { 
        NavBarShit.style.backgroundColor = "";
    }
}


