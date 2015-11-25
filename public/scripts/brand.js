$(function() {

	var brand = {};

	$("#frmAddBrand")
			.submit(
					function(event) {
						event.preventDefault();
						
						
						modal = UIkit.modal
								.blockUI('<div class=\'uk-text-center\'>Processing...<br/><img class=\'uk-margin-top\' src=\'<?php echo base_url()?>public/assets/img/spinners/spinner.gif\' alt=\'\'>');
						$.ajax({
							type : "POST",
							url : SITE_URL + "brand/addBrand",
							dataType : 'json',
							data : {
								name : $.trim($("#name").val()),
								parent_brand : $("#parentid").val(),
								description : $.trim($("#description").val())
							},
							success : function(data) {
								console.log(data);
								if (data["ERROR"] == true) {
									console.log(data["ERR_MSG"]);
									modal.hide();
									$("#name").css('border-color', 'red').focus();
									$("#msgError").fadeIn(2500);
								} else {
									UIkit.modal.alert(data["ERR_MSG"]);
									console.log(data["ERR_MSG"]);
									setTimeout(function(){ 
										location.href= SITE_URL + "brand";
						 			}, 1000);
								}
							},
							error : function(data) {
								modal.hide();
								console.log("ERROR" + data);
							}
						});

					});
	
	
	$(document).on('click','#btnUpdate', function(){
		var id = $(this).attr("data");
		modal = UIkit.modal.blockUI("<div class='uk-text-center'>Processing...<br/><img class='uk-margin-top' src='"+SITE_URL+"public/assets/img/spinners/spinner.gif' alt=''"); 
		$.ajax({
			url: SITE_URL+'brand/update/'+id,
			type: "GET",
			dataType: "JSON",
			success: function(data){
				
				console.log("Success " +data);
				
				var $selectBrand = $("#parentid").selectize();
				var selecttBrand = $selectBrand[0].selectize;
				
				
				$("#name").val(data.name);
				$("#oldname").val(data.name);
				selecttBrand.setValue(data.parent_brand); 
				$("#description").val(data.description);
				$("#oldname").val(data.name);
				
				
				modal.hide();
				$("#btnSave").hide();
				$("#btnUpdateSave").attr('data',data.id);
				$("#btnUpdateSave").show();
				
				var modalPopup = UIkit.modal("#modalBrand");
				if ( modalPopup.isActive() ) {
				    modalPopup.hide();
				} else {
				    modalPopup.show();
				}

				$('.md-input-wrapper').addClass('md-input-filled');
			},
			error: function(data){
				console.log("Error" + data);
				modal.hide();
				UIkit.modal.alert(data.message);
			}
		});
	});
	
	
	$("#btnUpdateSave").click(function(){
		modal = UIkit.modal.blockUI("<div class='uk-text-center'>Processing...<br/><img class='uk-margin-top' src='"+SITE_URL+"public/assets/img/spinners/spinner.gif' alt=''"); 
		var id = $(this).attr('data');
		$.ajax({
			url: SITE_URL+'brand/updatebrand/'+id,
			type: "POST",
			dataType: "JSON",
			data : {
				name : $.trim($("#name").val()),
				parent_brand : $.trim($("#parentid").val()),
				description : $.trim($("#description").val()),
				oldname :  $.trim($("#oldname").val())
			},
			success : function(data) {
				console.log(data);
				if (data["ERROR"] == true) {
					console.log(data["ERR_MSG"]);
					modal.hide();
					$("#name").css('border-color', 'red').focus();
					$("#msgError").fadeIn(2500);
				} else {
					UIkit.modal.alert(data["ERR_MSG"]);
					console.log(data["ERR_MSG"]);
					setTimeout(function(){ 
						location.href= SITE_URL + "brand";
		 			}, 2000);
				}
			},
			error : function(data) {
				modal.hide();
				console.log("ERROR" + data);
			}
		});
	});
	
	
	
	
});