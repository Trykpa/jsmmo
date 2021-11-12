window.addEventListener("keydown", onKeyDown, false);

function onKeyDown(event) {

  var keyCode = event.keyCode;
  switch (keyCode) {
    case 68: //d
      		player[0].x = player[0].x + 10;
     		CtxTranslate[0].x = CtxTranslate[0].x - 10;
      		clearcanvas();
      break;
    case 83: //s
            player[0].y = player[0].y + 10;
      		CtxTranslate[0].y = CtxTranslate[0].y - 10;
    		clearcanvas();
      break;
    case 65: //a
            player[0].x = player[0].x - 10;
            CtxTranslate[0].x = CtxTranslate[0].x + 10;
      		clearcanvas();
      break;
    case 87: //w
            player[0].y = player[0].y - 10;
            CtxTranslate[0].y = CtxTranslate[0].y + 10;
      		clearcanvas(); 
      break;
  }
}