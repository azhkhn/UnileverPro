$(function() {

	$("#btnOpenAddNew").click(function(){
		$("#frmSalePromotion")[0].reset();
	});

	$("#frmSalePromotion")
			.submit(
					function(event) {
						event.preventDefault();
						modal = UIkit.modal.blockUI("<div class='uk-text-center'>Processing...<br/><img class='uk-margin-top' src='"+SITE_URL+"public/assets/img/spinners/spinner.gif' alt=''"); 
						$.ajax({
							type : "POST",
							url : SITE_URL + "salepromotion/addsalepromotion",
							dataType : 'json',
							data : {
								code			   	 : $.trim($("#code").val()),
								name			   	 : $.trim($("#name").val()),
								description		     : $.trim($("#description").val()),
								//type				 : $.trim($("#type").val()),
								/*start_date		     : $.trim($("#start_date").val()),
								end_date		     : $.trim($("#end_date").val())*/
							},success: function(data){
								console.log(data);
								if(data["ERROR"]==true){
									console.log(data["MSG"]);
									modal.hide();
									if(data["FIELD"] == "CODE"){
										$("#msg").text("Code has already existed.");
										$("#code").css('border-color','red').focus();
									}else if(data["FIELD"] == "NAME"){
										$("#msg").text("Name has already existed.");
										$("#name").css('border-color','red').focus();
									}else{
										$("#msg").text("Name and code have already existed.");
										$("#name").css('border-color','red').focus();
										$("#code").css('border-color','red').focus();
									}
									$("#msgError").fadeIn(2500);
								}else{
									UIkit.modal.alert(data["MSG"]);
									console.log(data["MSG"]);
									setTimeout(function(){ 
										location.href= SITE_URL + "salepromotion";
						 			}, 1000);
								}
							},
							error: function(data){
								modal.hide();
								console.log("ERROR" + data );
							}
						});

					});
	
	
	$(document).on('click','#btnUpdate', function(){
		var id = $(this).attr("data");
		modal = UIkit.modal.blockUI("<div class='uk-text-center'>Processing...<br/><img class='uk-margin-top' src='"+SITE_URL+"public/assets/img/spinners/spinner.gif' alt=''"); 
		$.ajax({
			url: SITE_URL+'salepromotion/update/'+id,
			type: "GET",
			dataType: "JSON",
			success: function(data){
				
				console.log("Success " +data.code);
				
				/*var $selectType = $("#type").selectize();
				var selectType = $selectType[0].selectize;*/
				
				
				$("#code").val(data.code);
				$("#oldcode").val(data.code);
				$("#name").val(data.name);
				$("#oldname").val(data.name);
				//selectType.setValue(data.type); 
				/*$("#start_date").val(data.start_date);
				$("#end_date").val(data.end_date);*/
				$("#description").val(data.description);
				
				modal.hide();
				$("#btnSave").hide();
				$("#btnUpdateSave").attr('data',data.id);
				$("#btnUpdateSave").show();
				
				var modalPopup = UIkit.modal("#modalSalePromotion");
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
			url: SITE_URL+'salepromotion/updatesalepromotion/'+id,
			type: "POST",
			dataType: "JSON",
			data : {
				code			   	 : $.trim($("#code").val()),
				name			   	 : $.trim($("#name").val()),
				oldname			   	 : $.trim($("#oldname").val()),
				oldcode			   	 : $.trim($("#oldcode").val()),
				description		     : $.trim($("#description").val())
				//type				 : $.trim($("#type").val()),
				/*start_date		     : $.trim($("#start_date").val()),
				end_date		     : $.trim($("#end_date").val())*/
				},
				success: function(data){
					console.log(data);
					if(data["ERROR"]==true){
						console.log(data["MSG"]);
						modal.hide();
						if(data["FIELD"] == "CODE"){
							$("#msg").text("Code has already existed.");
							$("#code").css('border-color','red').focus();
						}else if(data["FIELD"] == "NAME"){
							$("#msg").text("Name has already existed.");
							$("#name").css('border-color','red').focus();
						}else{
							$("#msg").text("Name and code have already existed.");
							$("#name").css('border-color','red').focus();
							$("#code").css('border-color','red').focus();
						}
						$("#msgError").fadeIn(2500);
					}else{
						UIkit.modal.alert(data["MSG"]);
						console.log(data);
						setTimeout(function(){ 
							location.href= SITE_URL + "salepromotion";
			 			}, 1000);
					}
				},
				error: function(data){
					modal.hide();
					console.log("ERROR" + data );
				}
		});
	});
	
});