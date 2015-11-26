$(function() {

	

	$("#btnOpenAddNew").click(function(){
		$("#frmGroup")[0].reset();
	});
	
	$("#frmGroup")
			.submit(
					function(event) {
						event.preventDefault();
						
						
						modal = UIkit.modal
								.blockUI('<div class=\'uk-text-center\'>Processing...<br/><img class=\'uk-margin-top\' src=\'<?php echo base_url()?>public/assets/img/spinners/spinner.gif\' alt=\'\'>');
						$.ajax({
							type : "POST",
							url : SITE_URL + "group/addgroup",
							dataType : 'json',
							data: {
								name			   	 : $.trim($("#name").val()),
								description		     : $.trim($("#description").val())
							},
							success : function(data) {
								console.log(data);
									UIkit.modal.alert(data["MSG"]);
									console.log(data["MSG"]);
									setTimeout(function(){ 
										location.href= SITE_URL + "group";
						 			}, 1000);
								
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
			url: SITE_URL+'group/update/'+id,
			type: "GET",
			dataType: "JSON",
			success: function(data){
				
				console.log("Success " +data);
				
				$("#name").val(data.name);
				$("#description").val(data.description);
				
				
				
				modal.hide();
				$("#btnSave").hide();
				$("#btnUpdateSave").attr('data',data.id);
				$("#btnUpdateSave").show();
				
				var modalPopup = UIkit.modal("#modalGroup");
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
			url: SITE_URL+'group/updategroup/'+id,
			type: "POST",
			dataType: "JSON",
			data : {
				name			   	 : $.trim($("#name").val()),
				description		     : $.trim($("#description").val())
			},
			success : function(data) {
				console.log(data);
					UIkit.modal.alert(data["MSG"]);
					console.log(data["MSG"]);
					setTimeout(function(){ 
						location.href= SITE_URL + "group";
		 			}, 1000);
				
			},
			error : function(data) {
				modal.hide();
				console.log("ERROR" + data);
			}
		});
	});
	
	
	
	
});