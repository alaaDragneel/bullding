$(document).ready(function() {

	//trigger nice scrool
    
    $("html").niceScroll({
      
        cursorcolor: '#337ab7',
        cursorborder: '1px solid #337ab7'
        
    });

    $(".confirm").click(function(){
    	return confirm("Are You Sure To Do This Process");
    });
});