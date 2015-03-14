$(document).ready(function() {
	var list = $('ul.nav.nav-tabs.admin li');
	
	list.each(function(){
		$(this).click(function(event){
			event.preventDefault();
			list.each(function(){
				$(this).removeClass("active");
			});
			var classe = $(this).attr("class");
			$(this).addClass("active");
			
			$('div.list-group').each(function(){
				$(this).css("display","none");
			});
			
			$('div.'+classe+'.list-group').css("display","block")
			
		})
	});
	
});
