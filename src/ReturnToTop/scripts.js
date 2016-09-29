
// To Top -------------------------------
$(window).scroll(function()
{
  if($(this).scrollTop() >= 280) {
     $('#return-to-top').fadeIn(200);  // fade in the arrow
  } else {
     $('#return-to-top').fadeOut(200); // fade out the arrow
  }
});

// arrow is clicked
$('#return-to-top').click(function()
{
  $('body,html').animate({
     scrollTop : 0   // Scroll to top
  }, 500);
});
//---------------------------------------

// To Bottom ----------------------------
// console.log($(window).height() +' | '+ document.body.scrollHeight);

if(document.body.scrollHeight - $(window).height() > 100) {
    // $('#return-to-bottom').fadeIn(200);
} else {
    $('#return-to-bottom').hide();
}

$(window).scroll(function()
{
    if($(this).scrollTop() > (document.body.scrollHeight - $(window).height() -90)) {
        $('#return-to-bottom').fadeOut(200);
    } else {
        $('#return-to-bottom').fadeIn(200);
    }
});

$('#return-to-bottom').click(function() {
    $('body,html').animate({
       scrollTop : $("body").scrollTop() + $(window).height() - 60
    }, 500);
});
//---------------------------------------
