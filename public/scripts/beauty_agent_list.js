$(function(){
	// TODO: ADD USER
	$("#frmAddNewBeautyAgent").submit(function(e){
		e.preventDefault();
		modal = UIkit.modal.blockUI("<div class='uk-text-center'>Processing...<br/><img class='uk-margin-top' src='"+SITE_URL+"public/assets/img/spinners/spinner.gif' alt=''"); 
		$.ajax({
			url: SITE_URL+'user/registernewba',
			type: "POST",
			dataType: "JSON",
			data:{
				'code'     : $("#txtCode").val(),
				'lastname' : $("#txtLastName").val(),
				'firstname': $("#txtFirstName").val(),
				'gender'   : $("#selectGender").val(),
				'phone'    : $("#txtTelephone").val(),
				'supervisor' : $("#selectSupervisor").val(),
				'email'    : $("#txtEmail").val(),
				'password' : $("#txtPassword").val(),
				'confirmpassword' : $("#txtConfirmationPassword").val(),
				'startworking' : $("#startWorking").val(),
				'remark'   : $("#txtRemark").val(),
				'company'  : 'UNILEVER',
				'photo'    : $("#photo").attr('src')
			},
			success: function(data){
				console.log(data);
				modal.hide();
				if(data.status==true){
					UIkit.modal.alert(data.message);
					var modalPopup = UIkit.modal("#modalRegisterNewBA");
					if ( modalPopup.isActive() ) {
					    modalPopup.hide();
					} else {
					    modalPopup.show();
					}
				}else{
					UIkit.modal.alert(data.message);
				}
				location.href=SITE_URL + "user/bainformation";
			},
			error: function(data){
				modal.hide();
				UIkit.modal.alert(data);
			}
		});
	});

	// TODO: VIEW USER TO UPDATE USER
	$(document).on('click','#btnUpdate', function(){
		var id = $(this).attr("data");
		modal = UIkit.modal.blockUI("<div class='uk-text-center'>Processing...<br/><img class='uk-margin-top' src='"+SITE_URL+"public/assets/img/spinners/spinner.gif' alt=''"); 
		$.ajax({
			url: SITE_URL+'user/getuser/'+id,
			type: "GET",
			dataType: "JSON",
			success: function(data){
				console.log(data);
				$("#txtCode").focus().val(data.code);
				$("#txtLastName").focus().val(data.last_name);
				$("#txtFirstName").focus().val(data.first_name);
				$("#selectGender").focus().val(data.gender);
				$("#txtTelephone").focus().val(data.phone);
				$("#selectSupervisort").focus().val(data.parent_id);
				$("#txtEmail").focus().val(data.email);
				$("#startWorking").focus().val(data.starting_date)
				$("#txtRemark").focus().val(data.remark);
				modal.hide();
				$("#btnSave").hide();
				$("#btnUpdateSave").attr('data',data.id);
				$("#btnUpdateSave").show();
				var modalPopup = UIkit.modal("#modalRegisterNewBA");
				if ( modalPopup.isActive() ) {
				    modalPopup.hide();
				} else {
				    modalPopup.show();
				}
			},
			error: function(data){
				console.log(data);
				modal.hide();
				UIkit.modal.alert(data.message);
			}
		});
	});

	// TODO: UPDATE USER
	$("#btnUpdateSave").click(function(){
		modal = UIkit.modal.blockUI("<div class='uk-text-center'>Processing...<br/><img class='uk-margin-top' src='"+SITE_URL+"public/assets/img/spinners/spinner.gif' alt=''"); 
		var id = $(this).attr('data');
		$.ajax({
			url: SITE_URL+'user/updateuser/'+id,
			type: "POST",
			dataType: "JSON",
			data:{
				'code'     : $("#txtCode").val(),
				'lastname' : $("#txtLastName").val(),
				'firstname': $("#txtFirstName").val(),
				'gender'   : $("#selectGender").val(),
				'phone'    : $("#txtTelephone").val(),
				'supervisor' : $("#selectSupervisor").val(),
				'email'    : $("#txtEmail").val(),
				'password' : $("#txtPassword").val(),
				'confirmpassword' : $("#txtConfirmationPassword").val(),
				'startworking' : $("#startWorking").val(),
				'remark'   : $("#txtRemark").val(),
				'company'  : 'UNILEVER',
				'photo'    : $("#photo").attr('src')
			},
			success: function(data){
				console.log(data);
				modal.hide();
				console.log(data);
				if(data.status==true){
					UIkit.modal.alert(data.message);
					var modalPopup = UIkit.modal("#modalRegisterNewBA");
					if ( modalPopup.isActive() ) {
					    modalPopup.hide();
					} else {
					    modalPopup.show();
					}
				}else{
					UIkit.modal.alert(data.message);
				}
				location.href=SITE_URL + "user/bainformation";
			},
			error: function(data){
				console.log(data);
				modal.hide();
				UIkit.modal.alert(data);
			}
		});
	});

	// TODO: UPDATE STATUS
	$(document).on('change','#btnStatus', function(){
		var id = $(this).attr('data');
		var value = ($(this).val()=="on") ? 0 : 1 ;
		$(this).val(($(this).val()=="on") ? "off" : "on")
		UIkit.modal.confirm('Are you sure?', 
			function(){ 
				modal = UIkit.modal.blockUI("<div class='uk-text-center'>Processing...<br/><img class='uk-margin-top' src='"+SITE_URL+"public/assets/img/spinners/spinner.gif' alt=''"); 
				$.ajax({
					url: SITE_URL+'user/changestatus/'+id,
					type: "POST",
					dataType: "JSON",
					data:{
						'active' : value
					},
					success: function(data){
						modal.hide();
						console.log(data);
						if(data){
							UIkit.modal.alert('You have been changed successfully!'); 	
						}else{
							UIkit.modal.alert('You have an error when changing the status. Please try again!'); 	
						}
					},
					error: function(data){
						modal.hide();
						console.log(data);
					}
				});
			}
		);		
	});


	// TODO: DELETE USER
});