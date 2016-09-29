
//-------------------------------------------------------
function CanvasImageCrop_draw(id, img, sourceX, sourceY, sourceWidth, sourceHeight)
{
  //console.log(id);
  var imageObj = new Image();
  imageObj.src = img;

  var canvas = document.getElementById(id);
  var context = canvas.getContext("2d");

  //------
  imageObj.onload = function() {
    //console.log(this.width + '-' + this.height);
    // var img_width  = this.width;
    // var img_height = this.height;

    var destWidth  = sourceWidth;
    var destHeight = sourceHeight;
    var destX = canvas.width  / 2 - destWidth  / 2;
    var destY = canvas.height / 2 - destHeight / 2;

    context.drawImage(imageObj, sourceX, sourceY, sourceWidth, sourceHeight, destX, destY, destWidth, destHeight);
  };
}
//-------------------------------------------------------