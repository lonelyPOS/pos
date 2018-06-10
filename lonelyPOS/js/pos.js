$(document).ready(function() {
	$("#b_code").keyup(function(e) {
		var code = $('#b_code').val();
		$.ajax({
			type : "POST",
			url : "system/pos_additem.php",
			data : {
				b_code : code
			},
			success : function(html) {
				$("#cart").html(html).show();
			}
		});
	});

	$('#clear_cart_con').click(function() {
		window.location = 'system/clear_cart.php';
	});
});

function clearBCODE() {
	$('#b_code').val('');
}
