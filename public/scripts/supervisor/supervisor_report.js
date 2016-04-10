$(function(){
	
	var supervisors = {}

	// TODO: ON CHANGE ON BA 
	supervisors.getInformation = function (){
		var start_date = moment().date(1).format('YYYY-MM-DD');
		var end_date = moment().add('months', 1).date(0).format('YYYY-MM-DD')
		modal = UIkit.modal.blockUI("<div class='uk-text-center'>Processing...<br/><img class='uk-margin-top' src='"+SITE_URL+"public/assets/img/spinners/spinner.gif' alt=''"); 
		$.ajax({
			url: SITE_URL+'supervisor/info',
			type: "POST",
			dataType: "JSON",
			data: {
				'start_date' : start_date,
				'end_date' : end_date
			},
			success: function(data){
				console.log(data);
				$('.md-input-wrapper').find('.md-input').val('');
				$('.md-input-wrapper').removeClass('md-input-filled');
				$("#txtNumberOfWorking").val(26);
				if(data.ba_users.length>0){
					$("tbody#CONTENTS").html('');
					var j=1;
					for(var i=0;i<data.ba_users.length;i++){
						data.ba_users[i]["no"] = j;
						j++;
					}
					$("#CONTENT_TEMPLATE").tmpl(data.ba_users).appendTo("tbody#CONTENTS");
				}else{
					$("tbody#CONTENTS").html('<tr>NO CONTENTS</tr>');
				}
				if(data.user){
					$("#txtSupervisorName").val(data.user.supervisor);
					$("#txtPhoto").attr('src',data.user.photo);
					$("#txtBAExecutive").val(data.user.executive);
					$("#txtMonthlyTarget").val('$ '+ data.user.sumtarget);
					$("#txtTodayTarget").val('$ ' + data.user.sumtodaytarget);
					$("#startDate").val(moment(start_date).format('DD-MMMM-YYYY'));
					$("#endDate").val(moment(end_date).format('DD-MMMM-YYYY'));
					$("#txtTodayAchievement").val('$ ' + data.user.today_achievement);
					$("#txtMonthToDateAchievement").val('$ ' + data.user.month_achievement);
					$("#txtYearToDateAchievement").val('$ ' + data.user.year_achievement);
					$("#txtTodayAchievementPercent").val('% ' + data.user.today_achievement_percent);
					$("#txtMonthToDateAchievementPercent").val('% ' + data.user.month_achievement_percent);
					$("#txtYearToDateAchievementPercent").val('% ' + data.user.year_achievement_percent);
					$('.md-input-wrapper').addClass('md-input-filled');
				}
				modal.hide();
			},
			error: function(data){
				$('.md-input-wrapper').find('.md-input').val('');
				$('.md-input-wrapper').removeClass('md-input-filled');
				$("#txtNumberOfWorking").val(26);
				modal.hide();
				console.log(data);
			}
		});
	};

	supervisors.getInformation();

	// TODO: ON CHANGE ON START DATE 
	$("#startDate, #endDate").change(function(e){
		if($("#startDate").val()=="" || $("#endDate").val()==""){
			return false;
		}
		if(moment($("#startDate").val()).format('YYYY-MM-DD') > moment($("#endDate").val()).format('YYYY-MM-DD')){
			return false;
		}
		modal = UIkit.modal.blockUI("<div class='uk-text-center'>Processing...<br/><img class='uk-margin-top' src='"+SITE_URL+"public/assets/img/spinners/spinner.gif' alt=''"); 
		$.ajax({
			url: SITE_URL+'report/changesupervisor',
			type: "POST",
			dataType: "JSON",
			data: {
				'supervisor_id' : $("#selectedSupervisor").val(),
				'start_date' : moment($("#startDate").val()).format("YYYY-MM-DD"),
				'end_date' :  moment($("#endDate").val()).format("YYYY-MM-DD")
			},
			success: function(data){
				console.log(data);
				if(data.user){
					$("#txtMonthlyTarget").val('$ '+ data.user.sumtarget);
					$("#txtTodayTarget").val('$ ' + data.user.sumtodaytarget);
					$("#txtTodayAchievement").val('$ ' + data.user.today_achievement);
					$("#txtMonthToDateAchievement").val('$ ' + data.user.month_achievement);
					$("#txtYearToDateAchievement").val('$ ' + data.user.year_achievement);
					$("#txtTodayAchievementPercent").val('% ' + data.user.today_achievement_percent);
					$("#txtMonthToDateAchievementPercent").val('% ' + data.user.month_achievement_percent);
					$("#txtYearToDateAchievementPercent").val('% ' + data.user.year_achievement_percent);
					$('.md-input-wrapper').addClass('md-input-filled');
				}else{
					$("#txtMonthlyTarget").val('$ 0.00');
					$("#txtTodayTarget").val('$ 0.00');
					$("#txtTodayAchievement").val('$ 0.00');
					$("#txtMonthToDateAchievement").val('$ 0.00');
					$("#txtYearToDateAchievement").val('$ 0.00');
					$("#txtTodayAchievementPercent").val('% 0');
					$("#txtMonthToDateAchievementPercent").val('% 0');
					$("#txtYearToDateAchievementPercent").val('% 0');
					$('.md-input-wrapper').addClass('md-input-filled');
				}
				modal.hide();
			},
			error: function(data){
				$("#txtNumberOfWorking").val(26);
				modal.hide();
				console.log(data);
			}
		});
	});
	
	// TODO: VIEW USER INFORMATION DETAILS
	$(document).on('click','#btnViewInfo', function(){
		var id = $(this).attr("data");
		modal = UIkit.modal.blockUI("<div class='uk-text-center'>Processing...<br/><img class='uk-margin-top' src='"+SITE_URL+"public/assets/img/spinners/spinner.gif' alt=''"); 
		$.ajax({
			url: SITE_URL+'supervisor/getuser/'+id,
			type: "GET",
			dataType: "JSON",
			success: function(data){
				var $select = $("#selectGender").selectize();
				var selectize = $select[0].selectize;
				console.log(data);
				$("#txtCode").val(data.code);
				$("#txtLastName").val(data.last_name);
				$("#txtFirstName").val(data.first_name);
				selectize.setValue(data.gender); 
				$("#txtTelephone").val(data.phone);
				$("#txtSupervisor").val(data.supervisor);
				$("#txtEmail").val(data.email);
				$("#startWorking").val(data.starting_date)
				$("#txtRemark").val(data.remark);
				$('#txtPassword').val('');
				$('#txtConfirmationPassword').val('');
				modal.hide();
				$("#btnSave").hide();
				$("#btnUpdateSave").hide();
				var modalPopup = UIkit.modal("#modalRegisterNewBA");
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
	
	// TODO: VIEW USER BA DAILY REPORT
	$(document).on('click','#btnView', function(){
		var id = $(this).attr("data");
		location.href=SITE_URL+"supervisor/dailybareport/"+id;
	});
});