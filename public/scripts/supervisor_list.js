$(function(){
	
	$("#startWorking").val(moment().format('DD-MMMM-YYYY'));
	$("#startworking").parent('.md-input-wrapper').addClass('md-input-filled');
	// TODO: CREATE USERS OBJECT
	var users = {};

	// TODO: LIST ALL USERS
	users.getAllUsers = function(URL){
		modal = UIkit.modal.blockUI("<div class='uk-text-center'>Processing...<br/><img class='uk-margin-top' src='"+SITE_URL+"public/assets/img/spinners/spinner.gif' alt=''"); 
		$.ajax({
			url: URL,
			type: "POST",
			dataType: "JSON",
			success: function(data){
				if(data.users.length>0){
					$("tbody#CONTENTS").html('');
					$("#PAGINATION").html(data.page_links);
					for(var i=0;i<data.users.length;i++){
                        data.users[i]['check']='';
                        users.formatData(data.users[i]);
                    }
					$("#CONTENT_TEMPLATE").tmpl(data.users).appendTo("tbody#CONTENTS");
				}else{
					$("tbody#CONTENTS").html('<tr>NO CONTENTS</tr>');
				}
				modal.hide();
			},
			error: function(data){
				modal.hide();
				console.log(data);
			}
		});
	};

	// TODO: USER FORMART DATA
	users.formatData = function(val){
        val['check'] = (val["active"] == 1) ? 'Check' : '';
        val['remark'] = ($.trim(val["remark"]) == "") ? 'No Remark' : val["remark"];
    }

	// TODO: ADD NEW USER
	$("#frmAddNewSupervisor").submit(function(e){
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
				'startworking' : moment($("#startWorking").val()).format('YYYY-MM-DD'),
				'remark'   : $("#txtRemark").val(),
				'company'  : 'UNILEVER',
				'photo'    : $("#photo").attr('src'),
				'group'    : 2
			},
			success: function(data){
				console.log(data);
				modal.hide();
				if(data.status==true){
					UIkit.modal.alert(data.message);
					var modalPopup = UIkit.modal("#modalRegisterNewSupervisor");
					if ( modalPopup.isActive() ) {
					    modalPopup.hide();
					} else {
					    modalPopup.show();
					}
				}else{
					UIkit.modal.alert(data.message);
				}
				location.href=SITE_URL + "user/supervisorinformation";
			},
			error: function(data){
				modal.hide();
				UIkit.modal.alert(data);
			}
		});
	});

	// TODO: VIEW USER INFORMATION
	$(document).on('click',"#btnView", function(){
		var id = $(this).attr("data");
		modal = UIkit.modal.blockUI("<div class='uk-text-center'>Processing...<br/><img class='uk-margin-top' src='"+SITE_URL+"public/assets/img/spinners/spinner.gif' alt=''"); 
		$.ajax({
			url: SITE_URL+'user/getuser/'+id,
			type: "GET",
			dataType: "JSON",
			success: function(data){
				var $select = $("#selectGender").selectize();
				var selectize = $select[0].selectize;
				var $selectSupervisor = $("#selectSupervisor").selectize();
				var selectSupervisor = $selectSupervisor[0].selectize;
				console.log(data);
				$("#txtCode").val(data.code);
				$("#txtLastName").val(data.last_name);
				$("#txtFirstName").val(data.first_name);
				selectize.setValue(data.gender); 
				$("#txtTelephone").val(data.phone);
				selectSupervisor.setValue(data.parent_id);
				$("#txtEmail").val(data.email);
				$("#startWorking").val(moment(data.starting_date).format('DD-MMMM-YYYY'));
				$("#txtRemark").val(data.remark);
				modal.hide();
				$("#btnSave").hide();
				$("#btnUpdateSave").hide();
				var modalPopup = UIkit.modal("#modalRegisterNewSupervisor");
				if ( modalPopup.isActive() ) {
				    modalPopup.hide();
				} else {
				    modalPopup.show();
				}
				$('.md-input-wrapper').addClass('md-input-filled');
			},
			error: function(data){
				console.log(data);
				modal.hide();
				UIkit.modal.alert(data.message);
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
				var $select = $("#selectGender").selectize();
				var selectize = $select[0].selectize;
				var $selectSupervisor = $("#selectSupervisor").selectize();
				var selectSupervisor = $selectSupervisor[0].selectize;
				console.log(data);
				$("#txtCode").val(data.code);
				$("#txtLastName").val(data.last_name);
				$("#txtFirstName").val(data.first_name);
				selectize.setValue(data.gender); 
				$("#txtTelephone").val(data.phone);
				selectSupervisor.setValue(data.parent_id);
				$("#txtEmail").val(data.email);
				$("#startWorking").val(moment(data.starting_date).format('DD-MMMM-YYYY'));
				$("#txtRemark").val(data.remark);
				modal.hide();
				$("#btnSave").hide();
				$("#btnUpdateSave").attr('data',data.id);
				$("#btnUpdateSave").show();
				var modalPopup = UIkit.modal("#modalRegisterNewSupervisor");
				if ( modalPopup.isActive() ) {
				    modalPopup.hide();
				} else {
				    modalPopup.show();
				}
				$('.md-input-wrapper').addClass('md-input-filled');
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
				'startworking' : moment($("#startWorking").val()).format('YYYY-MM-DD'),
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
					var modalPopup = UIkit.modal("#modalRegisterNewSupervisor");
					if ( modalPopup.isActive() ) {
					    modalPopup.hide();
					} else {
					    modalPopup.show();
					}
					location.href=SITE_URL + "user/supervisorinformation";
				}else{
					UIkit.modal.alert(data.message);
				}
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
		var value = ($(this).val()=="on") ? 1 : 0 ;
		var _this = $(this);
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
							_this.val((_this.val()=="on") ? "off" : "on")
							UIkit.modal.alert('You have been changed successfully!'); 	
						}else{
							_this.val((_this.val()=="on") ? "on" : "off")
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

	// TODO: PAGINATION ON USER
	$('body').on('click', '.uk-pagination a', function(e){
		e.preventDefault();
		var URL = $(this).attr('href');
		users.getAllUsers(URL);
		return false;
	});

	// TODO: OPEN ADD NEW FORM
	$("#btnOpenAddNew").click(function(){
		$("#btnUpdateSave").hide();
		$("#btnSave").show();
		$('.md-input-wrapper').find('.md-input').val('');
		$('.md-input-wrapper').removeClass('md-input-filled');
		$("#startWorking").val(moment().format('DD-MMMM-YYYY'));
		$("#startworking").parent('.md-input-wrapper').addClass('md-input-filled');
	});
});