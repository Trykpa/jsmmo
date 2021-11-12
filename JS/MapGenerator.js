    generatormapy();
function generatormapy(){
window.onload = function() {
drawStuff();
}}


function clearcanvas(){
            const c = document.getElementById("canvas");
            const ctxx = c.getContext("2d");
            ctxx.clearRect(0, 0, canvas.width, canvas.height);
}

function drawStuff() { ////Rysuje całą mape na nowo
  window.requestAnimationFrame(drawStuff);
  var c = document.getElementById("canvas");
  var ctx = c.getContext("2d");
  var ctxTransformation = ctx.translate(CtxTranslate[0].x, CtxTranslate[0].y);
  var BushImg = document.getElementById("bush1");
  var PlayerImg = document.getElementById("player");
  var WolfImg = document.getElementById("wolf");
  ctx.drawImage(PlayerImg, player[0].x, player[0].y);
  ctx.drawImage(WolfImg, 705, 125);
  ctx.drawImage(BushImg, 75, 85);
  ctx.drawImage(BushImg, 795, 285);
  ctx.drawImage(BushImg, 825, 335);
  ctx.drawImage(BushImg, 695, 425);
  ctx.drawImage(BushImg, 755, 365);
  ctx.drawImage(BushImg, 955, 365);
  CtxTranslate[0].x = 0;
  CtxTranslate[0].y = 0;

}
window.requestAnimationFrame(drawStuff);