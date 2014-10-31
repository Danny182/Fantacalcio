$(document).ready(function() {
	
    $("#accordion > li").click(function(){
        if(false == $("ul",this).is(':visible')) {
            $('#accordion ul').slideUp(350);
        }
        $("ul",this).slideToggle(350);
    });
});