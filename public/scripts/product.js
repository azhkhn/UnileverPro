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
	
	
						
						
						
						
	$(document).on('click', '#btnAddPromotion, #btnCloseAddNewPromotion', function(){
		var id = $(this).attr("data");
		$("#btnAddNewPromotion").attr("data",id);
		modal = UIkit.modal.blockUI("<div class='uk-text-center'>Processing...<br/><img class='uk-margin-top' src='"+SITE_URL+"public/assets/img/spinners/spinner.gif' alt=''"); 
		$.ajax({
			type : "POST",
			url : SITE_URL + "product/getallpromotions/"+id,
			dataType : 'json',
			success : function(data) {
				console.log(data);
				if(data.length>0){
					$("tbody#PROMOTIONS").html('');
					$("#CONTENT_TEMPLATE").tmpl(data).appendTo("tbody#PROMOTIONS");
				}else{
					$("tbody#PROMOTIONS").html('<tr>NO CONTENTS</tr>');
				}
				var modalPopup = UIkit.modal("#modalPromotion");
				if ( modalPopup.isActive() ) {
				    modalPopup.hide();
				} else {
				    modalPopup.show();
				    
				}
				modal.hide();
			},
			error : function(data) {
				modal.hide();
				console.log("ERROR" + data);
			}
		});
	});			
	
	$(document).on('click', '#btnAddNewPromotion', function(){
		var id = $(this).attr("data");
		$("#btnSaveNewPromotion").attr("data",id);
		$("#btnCloseAddNewPromotion").attr("data",id);
		modal = UIkit.modal.blockUI("<div class='uk-text-center'>Processing...<br/><img class='uk-margin-top' src='"+SITE_URL+"public/assets/img/spinners/spinner.gif' alt=''"); 
		$.ajax({
			type : "POST",
			url : SITE_URL + "product/promotions",
			dataType : 'json',
			data: {
				product_id : $.trim(id),
			},
			success : function(data) {
				console.log(data);
				$('.md-input-wrapper').find('.md-input').val('');
				$('.md-input-wrapper').removeClass('md-input-filled');
				var modalPopup = UIkit.modal("#modalAddNewPromotion");
				if ( modalPopup.isActive() ) {
				    modalPopup.hide();
				} else {
				    modalPopup.show();
				}
				modal.hide();
			},
			error : function(data) {
				modal.hide();
				console.log("ERROR" + data);
			}
		});
		
	});
	
	$(document).on('click', '#btnSaveNewPromotion', function(e){
		e.preventDefault();
		var id = $(this).attr("data");
		$("#btnSaveNewPromotion").attr("data",id);
		$("#btnUpdatePromotion").attr("data",id);
		modal = UIkit.modal.blockUI("<div class='uk-text-center'>Processing...<br/><img class='uk-margin-top' src='"+SITE_URL+"public/assets/img/spinners/spinner.gif' alt=''"); 
		//var $selectPromotion = $("#selectPromotions").selectize();
		//var selectPromotion = $selectPromotion[0].selectize;
		$.ajax({
			type : "POST",
			url : SITE_URL + "product/addpromotion",
			dataType : 'json',
			data: {
				product_id : id,
				promotion_id : $("#selectPromotions").val(),
				buy : $("#BUY").val(),
				free : $("#FREE").val(),
				start_date : $("#start_date").val(),
				end_date :$("#end_date").val()
			},
			success : function(data) {
				console.log(data);
				UIkit.modal.alert(data["MSG"]);
				modal.hide();
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
				
				/*var $selectPromotion = $("#promotion").selectize();
				var selectPromotion = $selectPromotion[0].selectize;*/
				var $selectBrand = $("#brand").selectize();
				var selectBrand = $selectBrand[0].selectize;
				
			
				$("#code").val(data.code);
				$("#size").val(data.size);
				
				/*selectPromotion.setValue(data.promotion);*/ 
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
				$("#getPrice").text(data.price);
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
				console.log("Error", data);
				modal.hide();
				UIkit.modal.alert(data.message);
			}
		});
	});
	
	var promotions = {};
	promotions.getAllPromotions = function(){
		var id =$("#btnAddNewPromotion").attr("data");
		modal = UIkit.modal.blockUI("<div class='uk-text-center'>Processing...<br/><img class='uk-margin-top' src='"+SITE_URL+"public/assets/img/spinners/spinner.gif' alt=''"); 
		$.ajax({
			type : "POST",
			url : SITE_URL + "product/getallpromotions/"+id,
			dataType : 'json',
			success : function(data) {
				console.log(data);
				if(data.length>0){
					$("tbody#PROMOTIONS").html('');
					$("#CONTENT_TEMPLATE").tmpl(data).appendTo("tbody#PROMOTIONS");
				}else{
					$("tbody#PROMOTIONS").html('<tr>NO CONTENTS</tr>');
				}
				modal.hide();
			},
			error : function(data) {
				modal.hide();
				console.log("ERROR" + data);
			}
		});
	};
	
	$(document).on('click', "#btnDeletePromotion", function(e){
		e.preventDefault();
		var promotion_id= $(this).data("promotionid");
		var product_id = $(this).data("productid");
		var id = $(this).data("id");
		modal = UIkit.modal.blockUI("<div class='uk-text-center'>Processing...<br/><img class='uk-margin-top' src='"+SITE_URL+"public/assets/img/spinners/spinner.gif' alt=''"); 
		$.ajax({
			url: SITE_URL+'product/deletepromotion/',
			type: "POST",
			dataType: "JSON",
			data: {
				product_id : product_id,
				promotion_id : promotion_id,
				id : id
			},
			success: function(data){
				console.log(data);
				//UIkit.modal.alert(data.MSG);
				modal.hide();
				promotions.getAllPromotions();
				//$("#btnCloseAddNewPromotion").trigger("click");
			},
			error: function(data){
				console.log("Error", data);
				modal.hide();
				UIkit.modal.alert(data.message);
			}
		});
	});
	
	$(document).on('click', '#btnUpdatePromotion', function(e){
		e.preventDefault();
		var promotion_id= $(this).data("promotionid");
		var product_id = $(this).data("productid");
		var id = $(this).data("id");
		$("#btnSaveNewPromotion").attr("data",product_id);
		$("#btnCloseAddNewPromotion").attr("data",product_id);
		$("#btnSaveNewPromotion").hide();
		$("#btnUpdateSavePromotion").show();
		$("#btnUpdateSavePromotion").data("productid",product_id);
		$("#btnUpdateSavePromotion").data("id",id);
		modal = UIkit.modal.blockUI("<div class='uk-text-center'>Processing...<br/><img class='uk-margin-top' src='"+SITE_URL+"public/assets/img/spinners/spinner.gif' alt=''"); 
		$.ajax({
			url: SITE_URL+'product/getpromotion/',
			type: "POST",
			dataType: "JSON",
			data: {
				product_id : product_id,
				promotion_id : promotion_id,
				id : id
			},
			success: function(data){
				console.log(data);
				//UIkit.modal.alert(data.MSG);
				$('.md-input-wrapper').removeClass('md-input-filled');
				$("#FREE").val(data.free);
				$("#BUY").val(data.buy);
				$("#start_date").val(data.start_date);
				$("#end_date").val(data.end_date);
				var $selectPromotion = $("#selectPromotions").selectize();
				var selectPromotion = $selectPromotion[0].selectize;
				selectPromotion.setValue(data.promotion_id);
				$("#selectPromotions").attr('readonly','readonly');
				$("#btnSaveNewPromotion").data("product_id", data.product_id);
				$("#btnSaveNewPromotion").data("promotion_id", data.promotion_id);
				$('.md-input-wrapper').addClass('md-input-filled');
				var modalPopup = UIkit.modal("#modalAddNewPromotion");
				if ( modalPopup.isActive() ) {
				    modalPopup.hide();
				} else {
				    modalPopup.show();
				}
				modal.hide();
			},
			error: function(data){
				console.log("Error", data);
				modal.hide();
				UIkit.modal.alert(data.message);
			}
		});	
	});
	
	$(document).on('click', "#btnUpdateSavePromotion", function(e){
		e.preventDefault();
		var promotion_id= $(this).data("promotionid");
		var product_id = $(this).data("productid");
		var id = $(this).data("id");
		modal = UIkit.modal.blockUI("<div class='uk-text-center'>Processing...<br/><img class='uk-margin-top' src='"+SITE_URL+"public/assets/img/spinners/spinner.gif' alt=''"); 
		$.ajax({
			url: SITE_URL+'product/updatepromotion/',
			type: "POST",
			dataType: "JSON",
			data: {
				product_id : product_id,
				promotion_id : $("#selectPromotions").val(),
				id : id,
				buy : $("#BUY").val(),
				free : $("#FREE").val(),
				start_date : $("#start_date").val(),
				end_date :$("#end_date").val()
			},
			success: function(data){
				console.log(data);
				UIkit.modal.alert(data.MSG);
				modal.hide();
			},
			error: function(data){
				console.log("Error", data);
				modal.hide();
				UIkit.modal.alert(data.message);
			}
		});	
	});
});