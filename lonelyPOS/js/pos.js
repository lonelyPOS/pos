$(document).ready(function() {
	var delay = (function() {
		var timer = 0;
		return function(callback, ms) {
			clearTimeout(timer);
			timer = setTimeout(callback, ms);
		};
	})();

	$("#b_code").keyup(function() {
		delay(function() {
			var code = $('#b_code').val();
			if (code != '') {
				$.ajax({
					type : "POST",
					url : "system/pos_additem.php",
					data : {
						b_code : code
					},
					success : function(data) {
						$("#cart").html(data);
						$("#total").load('system/total.php')
					}
				});
			}
		}, 500);
	});
	
	$("#amount").on('propertychange input', function (e) {
		delay(function() {
			var amount = $('#amount').val();
			if (amount != '') {
				$.ajax({
					type : "POST",
					url : "system/update_payment.php",
					data : {
						amount : amount
					},
					success : function(data) {
						$("#total_full").html(data);
					}
				});
			}
		}, 500);
	});

	$("#member_code").keyup(function() {
		delay(function() {
			var code = $('#member_code').val();
			if (code != '') {
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
			}
		}, 1000);
	});

	$('#clear_cart_con').click(function() {
		window.location = 'system/clear_cart.php';
	});
	
	$('#clear_member').click(function() {
		window.location = 'system/clear_member.php';
	});

	$('#clear_code').click(function() {
		$('#b_code').val('');
	});
	
	$('#payment_btn').click(function() {
		$("#info_payment").load('system/update_info.php');
		$("#total_full").load('system/update_payment.php');
	});
	
	$('#guest_select').click(function() {
		var code = '00001';
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
	});
	
	$("#pos").click(function() {
		$("#nonti_member_corr").attr("hidden", "hidden");
		$("#nonti_member_not").attr("hidden", "hidden");
		$("#nonti_barcode_succ").attr("hidden", "hidden");
		$("#nonti_barcode_not").attr("hidden", "hidden");
	});
	
	$("#cart").on('click', 'a.remove-item', function(e) {
		e.preventDefault(); 
		var code = $(this).attr('data-code');
		$.ajax({
			type : "POST",
			url : "system/remove_item.php",
			data : {
				b_code : code
			},
			success : function(data) {
				$("#cart").html(data);
				$("#total").load('system/total.php')
			}
		});
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

function showMemberCorr() {
	$('#nonti_member_corr').removeAttr("hidden");
	$('#nonti_member_not').attr("hidden", "hidden");
}

function showMemberNot() {
	$('#nonti_member_not').removeAttr("hidden");
	$('#nonti_member_corr').attr("hidden", "hidden");
}

function showItemAdd() {
	$('#nonti_barcode_succ').removeAttr("hidden");
	$('#nonti_barcode_not').attr("hidden", "hidden");
}

function showItemNot() {
	$('#nonti_barcode_not').removeAttr("hidden");
	$('#nonti_barcode_succ').attr("hidden", "hidden");
}
