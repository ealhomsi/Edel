// Used to toggle the menu on small screens when clicking on the menu button
var body = 0 ;
var NavBarthing = 0;
var userName = 0;
var actionButtons;
function registerBody() {
    body = document.getElementsByTagName("body")[0];
    NavBarthing = document.getElementById("navbar-background");
    userName = document.getElementById("user-name-id");
    actionButtons = document.getElementsByClassName("action-button");

    NavBarthing.style.borderWidth = '0';
   	NavBarthing.style.backgroundColor = "rgba(255,255,255,0.5)";
    NavBarthing.style.color = "black";
}

function colorBlack() {
	NavBarthing.style.backgroundColor = "black";
    NavBarthing.style.opacity = "0.99";
    NavBarthing.style.color = "white";
    if(userName) {
      userName.style.color = "white";
    }

    NavBarthing.style.borderWidth = '0';
   	for(var count =0; count < actionButtons.length; count++) {
   		colorBorderWhite(actionButtons[count]);
   	}
}

function update() {
    if(body.scrollTop > 355.45452880859375) {
        NavBarthing.style.backgroundColor = "black";
        NavBarthing.style.opacity = "0.99";
        NavBarthing.style.color = "white";
        if(userName) {
          userName.style.color = "white";
        }

    	NavBarthing.style.borderWidth = '0';
       	for(var count =0; count < actionButtons.length; count++) {
       		colorBorderWhite(actionButtons[count]);
       	}
    } else {
      NavBarthing.style.backgroundColor = "rgba(255,255,255,0.5)";
      NavBarthing.style.color = "black";
      if(userName){
        userName.style.color = "black";
      }
    	NavBarthing.style.borderWidth = '0';

		for(var count =0; count < actionButtons.length; count++) {
		    colorBorderBlack(actionButtons[count]);
		 }

    }
}



function colorBorderWhite(item) {
	item.style.borderColor = "white";
}

function colorBorderBlack(item) {
	item.style.borderColor = "black";
}
