$(function(){
	
	// TODO: ON CHANGE ON BA 
	$("#selectedSupervisor").change(function(){
		var start_date = moment().date(1).format('YYYY-MM-DD');
		var end_date = moment().add('months', 1).date(0).format('YYYY-MM-DD')
		modal = UIkit.modal.blockUI("<div class='uk-text-center'>Processing...<br/><img class='uk-margin-top' src='"+SITE_URL+"public/assets/img/spinners/spinner.gif' alt=''"); 
		$.ajax({
			url: SITE_URL+'report/changesupervisor',
			type: "POST",
			dataType: "JSON",
			data: {
				'supervisor_id' : $("#selectedSupervisor").val(),
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
					$("#CONTENT_TEMPLATE").tmpl(data.ba_users).appendTo("tbody#CONTENTS");
				}else{
					$("tbody#CONTENTS").html('<tr>NO CONTENTS</tr>');
				}
				if(data.user){
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
	});

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
});