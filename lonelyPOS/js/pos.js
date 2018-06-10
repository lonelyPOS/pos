
$(document).ready(function() {
	var delay = (function(){
		var timer = 0;
		return function(callback, ms){
			clearTimeout (timer);
			timer = setTimeout(callback, ms);
		};
	})();
	
	$("#b_code").keyup(function() {
		delay(function(){
			var code = $('#b_code').val();
			$.ajax({
				type : "POST",
				url : "system/pos_additem.php",
				data : {
					b_code : code
				},
				success : function(data) {
					$("#cart").html(data);
				}
			});
		}, 500 );
	});

	$("#member_code").keyup(function() {
		delay(function(){
			var code = $('#member_code').val();
			$.ajax({
				type : "POST",
				url : "system/pos_get_member.php",
				data : {
					member_code : code
				},
				success : function(data) {
					$("#member_code").html(data);
				}
			});
		}, 1000 );
	});
	
	$('#clear_cart_con').click(function() {
		window.location = 'system/clear_cart.php';
	});
	
	$('#clear_code').click(function() {
		$('#b_code').val('');
	});
});

function clearBCODE() {
	$('#b_code').val('');
}

function disableMemInput() {
	$('#member_code').attr('disabled', 'disabled');
}

function setMemInput(name) {
	$('#member_code').val(name);
}
