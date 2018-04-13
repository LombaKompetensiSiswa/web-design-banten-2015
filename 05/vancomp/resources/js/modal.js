$(function(){
	
	function showmodal(target){
		
		$('<div class="shade"></div>').prependTo('body').fadeIn();
		$('#' + target).animate({
			'top' : '50%'	
		},500);
		
	}
	
	function closemodal(){
		
		$('.shade').fadeOut(function(){$(this.remove())});
		$('.modal').animate({
			'top' : '-50%'	
		},500);
		
	}
	
	$('.modal-btn').on('click', function(e){
		e.preventDefault();
		var target = $(this).data('target');
		showmodal(target);
	})
	
	$('body').on('click','.shade',  function(){
		closemodal();
	})
	
	$('.modal-close').on('click', function(){
		closemodal();
	})
	
	$('#login-btn').on('click', function(e){
		e.preventDefault();
		var user = $('#username').val(),
			pass = $('#password').val();
			
		$.ajax({
			type: 'POST',
			data: {
				"user" : user,
				"pass" : pass
				},
			url  : 'http://localhost/vancomp/resources/ajax/login.php',
			success : function(data){
				if(data == 'gagal'){
					$('#login-alert').slideDown().delay(1500).slideUp();
				}else{
					window.location.reload();	
				}
			}	
		})
	})
	

})