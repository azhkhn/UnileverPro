$(function(){
	
	var dmsCode = false;

	// TODO: ON CHANGE ON BA 
	$("#selectedBA").change(function(){
		if(dmsCode==true){
			dmsCode = false;
			return false;
		}
		modal = UIkit.modal.blockUI("<div class='uk-text-center'>Processing...<br/><img class='uk-margin-top' src='"+SITE_URL+"public/assets/img/spinners/spinner.gif' alt=''"); 
		$.ajax({
			url: SITE_URL+'supervisor/changeba',
			type: "POST",
			dataType: "JSON",
			data: {
				'ba_id' : $("#selectedBA").val(),
			},
			success: function(data){
				console.log(data);
				$('.md-input-wrapper').find('.md-input').val('');
				$('.md-input-wrapper').removeClass('md-input-filled');
				$("#txtNumberOfWorking").val(26);
				if(data.user){
					$("#txtPhoto").attr('src',data.user.photo);
					$("#txtSupervisorName").val(data.user.supervisor);
					$("#txtBAExecutive").val(data.user.executive);
					$("#txtMarketName").val(data.user.outlet_address);
					$("#txtOutletName").val(data.user.outlet_name);
					$("#txtDMSCode").val(data.user.dms_code);
					$("#txtDT").val(data.user.distributor);
					$("#txtCustomerType").val(data.user.customer_type);
					$("#txtChannel").val(data.user.channel);
					$("#txtMonthlyTarget").val('$ '+ data.user.monthly_target);
					$("#txtTodayTarget").val('$ ' + data.user.monthly_target/26);
					$("#startDate").val(data.user.start_date);
					$("#endDate").val(data.user.end_date);
					$("#txtTodayAchievement").val('$ ' + data.today_achievement);
					$("#txtMonthToDateAchievement").val('$ ' + data.month_achievement);
					$("#txtYearToDateAchievement").val('$ ' + data.year_achievement);
					$("#txtTodayAchievementPercent").val('% ' + data.today_achievement_percent);
					$("#txtMonthToDateAchievementPercent").val('% ' + data.month_achievement_percent);
					$("#txtYearToDateAchievementPercent").val('% ' + data.year_achievement_percent);
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

	// TODO: ON CHANGE ON BA 
	$("#txtDMSCode").keyup(function(e){
		var code = (e.keyCode ? e.keyCode : e.which);
    	if (code==13) {
			modal = UIkit.modal.blockUI("<div class='uk-text-center'>Processing...<br/><img class='uk-margin-top' src='"+SITE_URL+"public/assets/img/spinners/spinner.gif' alt=''"); 
			$.ajax({
				url: SITE_URL+'supervisor/changedmsCode',
				type: "POST",
				dataType: "JSON",
				data: {
					'dms_code' : $("#txtDMSCode").val(),
				},
				success: function(data){
					console.log(data);
					$("#txtNumberOfWorking").val(26);
					if(data.user){
						dmsCode = true;
						$('.md-input-wrapper').find('.md-input').val('');
						$('.md-input-wrapper').removeClass('md-input-filled');
						$("#txtNumberOfWorking").val(26);
						var $selectedBA = $("#selectedBA").selectize();
						var selectedBA = $selectedBA[0].selectize;
						selectedBA.setValue(data.user.id);
						$("#txtPhoto").attr('src',data.user.photo);
						$("#txtSupervisorName").val(data.user.supervisor);
						$("#txtBAExecutive").val(data.user.executive);
						$("#txtMarketName").val(data.user.outlet_address);
						$("#txtOutletName").val(data.user.outlet_name);
						$("#txtDMSCode").val(data.user.dms_code);
						$("#txtDT").val(data.user.distributor);
						$("#txtCustomerType").val(data.user.customer_type);
						$("#txtChannel").val(data.user.channel);
						$("#txtMonthlyTarget").val('$ '+ data.user.monthly_target);
						$("#txtTodayTarget").val('$ ' + data.user.monthly_target/26);
						$("#startDate").val(data.user.start_date);
						$("#endDate").val(data.user.end_date);
						$("#txtTodayAchievement").val('$ ' + data.today_achievement);
						$("#txtMonthToDateAchievement").val('$ ' + data.month_achievement);
						$("#txtYearToDateAchievement").val('$ ' + data.year_achievement);
						$("#txtTodayAchievementPercent").val('% ' + data.today_achievement_percent);
						$("#txtMonthToDateAchievementPercent").val('% ' + data.month_achievement_percent);
						$("#txtYearToDateAchievementPercent").val('% ' + data.year_achievement_percent);
						$('.md-input-wrapper').addClass('md-input-filled');
					}else{
						var $selectedBA = $("#selectedBA").selectize();
						var selectedBA = $selectedBA[0].selectize;
						selectedBA.setValue("");
						$("#txtSupervisorName").val("");
						$("#txtBAExecutive").val("");
						$("#txtMarketName").val("");
						$("#txtOutletName").val("");
						$("#txtDT").val("");
						$("#txtCustomerType").val("");
						$("#txtChannel").val("");
						$("#txtMonthlyTarget").val('$ 0.00');
						$("#txtTodayTarget").val('$ 0.00');
						$("#startDate").val("");
						$("#endDate").val("");
						$("#txtTodayAchievement").val('$ 0.00');
						$("#txtMonthToDateAchievement").val('$ 0.00');
						$("#txtYearToDateAchievement").val('$ 0.00');
						$("#txtTodayAchievementPercent").val('% 0');
						$("#txtMonthToDateAchievementPercent").val('% 0');
						$("#txtYearToDateAchievementPercent").val('% 0');
					}
					modal.hide();
				},
				error: function(data){
					//$('.md-input-wrapper').find('.md-input').val('');
					//$('.md-input-wrapper').removeClass('md-input-filled');
					$("#txtNumberOfWorking").val(26);
					modal.hide();
					console.log(data);
				}
			});
    	}
	});
});