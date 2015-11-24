$(function(){
	
	$("#startDate").val(moment('2015-01-01').format('DD-MMMM-YYYY'));
	$("#endDate").val(moment('2015-12-31').format('DD-MMMM-YYYY'));
	
	// TODO: ON CHANGE ON BA's EXECUTIVE
	$("#selectedBAExecutive").change(function(){
		modal = UIkit.modal.blockUI("<div class='uk-text-center'>Processing...<br/><img class='uk-margin-top' src='"+SITE_URL+"public/assets/img/spinners/spinner.gif' alt=''"); 
		$.ajax({
			url: SITE_URL+'report/changebaexecutive',
			type: "POST",
			dataType: "JSON",
			data: {
				'executive_id' : $("#selectedBAExecutive").val(),
			},
			success: function(data){
				console.log(data);
				$('.md-input-wrapper').find('.md-input').val('');
				$('.md-input-wrapper').removeClass('md-input-filled');
				$("#txtNumberOfWorking").val(26);
				if(data.supervisor_users.length>0){
					$("tbody#CONTENTS").html('');
					$("#CONTENT_TEMPLATE").tmpl(data.supervisor_users).appendTo("tbody#CONTENTS");
				}else{
					$("tbody#CONTENTS").html('<tr>NO CONTENTS</tr>');
				}
				if(data){
					//$("#txtMonthlyTarget").val('$ '+ data.user.monthly_target);
					//$("#txtTodayTarget").val('$ ' + data.user.monthly_target/26);
					//$("#startDate").val(data.user.start_date);
					//$("#endDate").val(data.user.end_date);
					$("#txtTodayAchievement").val('$ ' + data.today_achievement);
					$("#txtMonthToDateAchievement").val('$ ' + data.month_achievement);
					$("#txtYearToDateAchievement").val('$ ' + data.year_achievement);
					//$("#txtTodayAchievementPercent").val('% ' + data.today_achievement_percent);
					//$("#txtMonthToDateAchievementPercent").val('% ' + data.month_achievement_percent);
					//$("#txtYearToDateAchievementPercent").val('% ' + data.year_achievement_percent);*/
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
});