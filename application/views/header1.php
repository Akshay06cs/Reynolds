
<style>
#menu{font-size:20px;}
#content{font-size:30px;}
</style>
<script language="javascript" src="<?php echo base_url("assets/js/jquery-1.4.4.min.js");?>"></script>
<script>
$(function(){
	$("a[rel='tab']").click(function(e){
		//e.preventDefault(); 
		/*	
		if uncomment the above line, html5 nonsupported browers won't change the url but will display the ajax content;
		if commented, html5 nonsupported browers will reload the page to the specified link. 
		*/
		
		//get the link location that was clicked
		pageurl = $(this).attr('href');
		
		//to get the ajax content and display in div with id 'content'
		$.ajax({url:pageurl+'?rel=tab',success: function(data){
			$('#content').html(data);
		}});
		
		//to change the browser URL to 'pageurl'
		if(pageurl!=window.location){
			window.history.pushState({path:pageurl},'',pageurl);	
		}
		return false;  
	});
});

/* the below code is to override back button to get the ajax content without reload*/
$(window).bind('popstate', function() {
	$.ajax({url:location.pathname+'?rel=tab',success: function(data){
		$('#content').html(data);
	}});
});
</script>
