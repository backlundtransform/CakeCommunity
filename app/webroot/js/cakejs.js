// Page menu
$(document).ready(function() { 
    $('input[name=viewmenu]').click(function(){
  $(this).next("div.viewmenu").toggle();
 

 if ($(this).css("background-image") == 'url("http://localhost/CakeCommunity/img/c_p.png")' || $(this).css("background-image") == 'url(http://localhost/CakeCommunity/img/c_p.png)') {
 $(this).css("background-image", "url(http://localhost/CakeCommunity/img/c_m.png)");

 }
 else {
 $(this).css("background-image", "url(http://localhost/CakeCommunity/img/c_p.png)");
 } 
 });
  });

 // quote
 $(document).ready(function() {

  $("div.threadquote").click(function () {
    

                           var insertText = $(this).prevUntil(".cinfo").text();
                            var username = $(this).prevUntil('cMessage').first().prev().prev().prev().text();


        CKEDITOR.instances.ThreadanswerContent.setData('Quote('+username +')<div class="quoteMessage">'+insertText+'</div>');

   });


   });
   
   $(document).ready(function() {

  $("div.quote").click(function () {
    

                           var insertText = $(this).prevUntil(".cinfo").text();
                             var username = $(this).prevUntil('cMessage').first().prev().prev().prev().text();


        CKEDITOR.instances.CommentContent.setData('Quote('+username +')<div class="quoteMessage">'+insertText+'</div>');

   });


   });

// view more button
 $(document).ready(function() {
    $('input[name="view"]').click(function(){

  $(this).prev("div.view").toggle();
    var value = $(this).attr('value');

   if (value =='View more') {

  $(this).attr('value', 'View less');
  }else if (value =='View less'){
  $(this).attr('value', 'View more');
}});
     });
//view spoiler

$('input[name=spoiler]').click(function(){
var value = $(this).attr('value');
$('div.spoiler').toggle('fast');
if (value =='Open spoiler') {

$(this).attr('value', 'Close spoiler');
}else if (value =='Close spoiler'){
$(this).attr('value', 'Open spoiler');
}

});


//navigate up

$(document).ready(function(){
 var pxShow = 350;
 var fadeInTime = 1000;
 var fadeOutTime = 1000;
 var scrollSpeed = 1000;
 $(window).scroll(function(){
 if($(window).scrollTop() >= pxShow){
 $("#backtotop").fadeIn(fadeInTime);
 }else{
 $("#backtotop").fadeOut(fadeOutTime);
 }
 });
 
 $('#backtotop a').click(function(){
 $('html, body').animate({scrollTop:0}, scrollSpeed); 
 return false; 
 }); 
 });
 
 


 

 
	
 $(document).ready(function(){
$("#dialog").dialog({ autoOpen: false });


$('a.dialog').click(function() {

$(".hidden").toggle();
$('#dialog').dialog('open');

});
});

