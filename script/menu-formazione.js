/*$(document).ready(function() {
    $("#accordion > li").click(function(){
        if(false == $("ul",this).is(':visible')) {
            $('#accordion ul').slideUp(300);
        }
        $("ul",this).slideToggle(300);
    });
});*/
$(document).ready(function () {
      $('#nav li').hover(
        function () {
            //mostra sottomenu
            $('ul', this).stop(true, true).delay(50).slideDown(100);
 
        }, 
        function () {
            //nascondi sottomenu
            $('ul', this).stop(true, true).slideUp(200);        
        }
    );
});


