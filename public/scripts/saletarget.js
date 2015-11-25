$(function() {

	var brand = {};

	$("#frmSaleTarget")
			.submit(
					function(event) {
						event.preventDefault();
						
						
						modal = UIkit.modal
								.blockUI('<div class=\'uk-text-center\'>Processing...<br/><img class=\'uk-margin-top\' src=\'<?php echo base_url()?>public/assets/img/spinners/spinner.gif\' alt=\'\'>');
						$.ajax({
							type : "POST",
							url : SITE_URL + "SaleTarget/addSaleTarget",
							dataType : 'json',
							data : {
								name			   	 : $.trim($("#name").val()),
//								oldname			   	 : $.trim($("#oldname").val()),
								description		     : $.trim($("#description").val()),
								ba_id				 : $.trim($("#ba_id").val()),
								target_achievement   : $.trim($("#target_achievement").val()),
								start_date		     : $.trim($("#start_date").val()),
								end_date		     : $.trim($("#end_date").val())
							},
							success : function(data) {
								console.log(data);
								console.log(data);
								if(data["ERROR"]==true){
									console.log(data["MSG"]);
									modal.hide();
									$("#name").css('border-color','red').focus();
									$("#msgError").fadeIn(2500);
								}else{
									UIkit.modal.alert(data["MSG"]);
									console.log(data["MSG"]);
									setTimeout(function(){ 
										location.href= SITE_URL + "saletarget";
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
			url: SITE_URL+'SaleTarget/update/'+id,
			type: "GET",
			dataType: "JSON",
			success: function(data){
				
				console.log("Success " +data);
				
				var $selectBA = $("#ba_id").selectize();
				var selectBA = $selectBA[0].selectize;
				
				
				$("#name").val(data.name);
				$("#oldname").val(data.name);
				$("#target_achievement").val(data.target_achievement);
				$("#start_date").val(data.start_date);
				$("#end_date").val(data.end_date);
				selectBA.setValue(data.ba_id); 
				$("#description").val(data.description);
				
				
				modal.hide();
				$("#btnSave").hide();
				$("#btnUpdateSave").attr('data',data.id);
				$("#btnUpdateSave").show();
				
				var modalPopup = UIkit.modal("#modalSaleTarget");
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
			url: SITE_URL+'SaleTarget/updateSaleTarget/'+id,
			type: "POST",
			dataType: "JSON",
			data : {
				name			   	 : $.trim($("#name").val()),
				oldname			   	 : $.trim($("#oldname").val()),
				description		     : $.trim($("#description").val()),
				ba_id				 : $.trim($("#ba_id").val()),
				target_achievement   : $.trim($("#target_achievement").val()),
				start_date		     : $.trim($("#start_date").val()),
				end_date		     : $.trim($("#end_date").val())
			},
			success : function(data) {
				console.log(data);
				console.log(data);
				if(data["ERROR"]==true){
					console.log(data["MSG"]);
					modal.hide();
					$("#name").css('border-color','red').focus();
					$("#msgError").fadeIn(2500);
				}else{
					UIkit.modal.alert(data["MSG"]);
					console.log(data["MSG"]);
					setTimeout(function(){ 
						location.href= SITE_URL + "saletarget";
		 			}, 1000);
				}
				
				
			},
			error : function(data) {
				modal.hide();
				console.log("ERROR" + data);
			}
		});
	});
	
	
	
	
});