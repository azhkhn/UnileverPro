$(function() {

	
	$("#btnOpenAddNew").click(function(){
		$('form[name="frmProduct"]')[0].reset();
	});
	 

	
	$("#frmProduct").submit(function(event) {
						
						event.preventDefault();
						modal = UIkit.modal
								.blockUI('<div class=\'uk-text-center\'>Processing...<br/><img class=\'uk-margin-top\' src=\'<?php echo base_url()?>public/assets/img/spinners/spinner.gif\' alt=\'\'>');
						$.ajax({
							type : "POST",
							url : SITE_URL + "product/addproduct",
							dataType : 'json',
							data: {
								code			   	 : $.trim($("#code").val()),
								size			   	 : $.trim($("#size").val()),
								promotion			 : $.trim($("#promotion").val()),
								brand			   	 : $.trim($("#brand").val()),
								name		         : $.trim($("#name").val()),
								price				 : $.trim($("#price").val()),
								unit		         : $.trim($("#unit").val()),
								description		     : $.trim($("#description").val())
							},
							success : function(data) {
								console.log(data);
									UIkit.modal.alert(data["MSG"]);
									console.log(data["MSG"]);
									setTimeout(function(){ 
										location.href= SITE_URL + "product";
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
			url: SITE_URL+'product/update/'+id,
			type: "GET",
			dataType: "JSON",
			success: function(data){
				
				console.log("Success " +data);
				
				var $selectPromotion = $("#promotion").selectize();
				var selectPromotion = $selectPromotion[0].selectize;
				var $selectBrand = $("#brand").selectize();
				var selectBrand = $selectBrand[0].selectize;
				
			
				$("#code").val(data.code);
				$("#size").val(data.size);
				
				selectPromotion.setValue(data.promotion); 
				selectBrand.setValue(data.brand); 
				
				$("#name").val(data.name);
				$("#price").val(data.price);
				$("#unit").val(data.unit);
				$("#description").val(data.description);
				
				
				modal.hide();
				$("#btnSave").hide();
				$("#btnUpdateSave").attr('data',data.id);
				$("#btnUpdateSave").show();
				
				var modalPopup = UIkit.modal("#modalProduct");
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
			url: SITE_URL+'product/updateproduct/'+id,
			type: "POST",
			dataType: "JSON",
			data : {
				code			   	 : $.trim($("#code").val()),
				size			   	 : $.trim($("#size").val()),
				promotion			 : $.trim($("#promotion").val()),
				brand			   	 : $.trim($("#brand").val()),
				name		         : $.trim($("#name").val()),
				price				 : $.trim($("#price").val()),
				unit		         : $.trim($("#unit").val()),
				description		     : $.trim($("#description").val())
			},
			success : function(data) {
				console.log(data);
					UIkit.modal.alert(data["MSG"]);
					console.log(data["MSG"]);
					setTimeout(function(){ 
						location.href= SITE_URL + "product";
		 			}, 1000);
				
			},
			error : function(data) {
				modal.hide();
				console.log("ERROR" + data);
			}
		});
	});
	
	$(document).on('click','#btnView', function(){
		var id = $(this).attr("data");
		modal = UIkit.modal.blockUI("<div class='uk-text-center'>Processing...<br/><img class='uk-margin-top' src='"+SITE_URL+"public/assets/img/spinners/spinner.gif' alt=''"); 
		$.ajax({
			url: SITE_URL+'product/getProductDetail/'+id,
			type: "GET",
			dataType: "JSON",
			success: function(data){
				
				console.log("Success " +data);

				$("#getCode").text(data.code);
				$("#getProName").text(data.name);
				$("#getPrice").text(data.size);
				$("#geSize").text(data.size);
				$("#getUnit").text(data.unit);
				$("#getBrand").text(data.brand);
				$("#getPromotion").text(data.promotion);
				$("#getCreateDate").text(data.created_date);
				$("#getCreateBy").text(data.created_by);
				$("#getUpdatedate").text(data.updated_date);
				$("#getUpdateBy").text(data.updated_by);
				$("#getDescription").text(data.description);
				modal.hide();
				
				var modalPopup = UIkit.modal("#modalProductDetail");
				if ( modalPopup.isActive() ) {
				    modalPopup.hide();
				} else {
				    modalPopup.show();
				}

			},
			error: function(data){
				console.log("Error" + data);
				modal.hide();
				UIkit.modal.alert(data.message);
			}
		});
	});
	
	
});