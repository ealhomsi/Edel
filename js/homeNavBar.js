// Used to toggle the menu on small screens when clicking on the menu button
var body = 0 ;
var NavBarthing = 0;
var userName = 0;
var selectedMenuButton = 0;
var actionButtons;
function registerBody() {
    body = document.getElementsByTagName("body")[0];
    NavBarthing = document.getElementById("navbar-background");
    userName = document.getElementById("user-name-id");
    selectedMenuButton = document.getElementsByClassName("selectedMenu")[0];
    actionButtons = document.getElementsByClassName("action-button");

    NavBarthing.style.borderWidth = '0';
   	NavBarthing.style.backgroundColor = "rgba(54, 83, 46, 0.1)";
    NavBarthing.style.color = "white";
}

function colorBlack() {
  if(selectedMenuButton)
    selectedMenuButton.style.color = "#eeeeee";
	NavBarthing.style.backgroundColor = "#7f3ec2";
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
        NavBarthing.style.backgroundColor = "#7f3ec2";
        NavBarthing.style.opacity = "0.99";
        NavBarthing.style.color = "white";
        if(userName) {
          userName.style.color = "white";
        }
        if(selectedMenuButton) {
          selectedMenuButton.style.color= "#eeeeee";
        }

    	NavBarthing.style.borderWidth = '0em';
       	for(var count =0; count < actionButtons.length; count++) {
       		colorBorderWhite(actionButtons[count]);
       	}
    } else {
      NavBarthing.style.backgroundColor = null;
      NavBarthing.style.color = null;
      if(userName){
        userName.style.color = null;
      }
      if(selectedMenuButton) {
        selectedMenuButton.style.color = "white";
      }
    	NavBarthing.style.borderWidth = '0';

		for(var count =0; count < actionButtons.length; count++) {
		    colorBorderBlack(actionButtons[count]);
		 }

    }
}



function colorBorderWhite(item) {
  item.style.borderWidth = "0px";
	item.style.borderColor = "white";
}

function colorBorderBlack(item) {
  item.style.borderWidth = "0px";
	item.style.borderColor = "white";
}
