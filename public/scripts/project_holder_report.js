$(function(){

	$("#startDate").val(moment().date(1).format('DD-MMMM-YYYY'));
	$("#endDate").val(moment().add('years', 1).date(0).format('DD-MMMM-YYYY'));

	var report = {};
	
	report.getProjectHolderReport = function(){
		modal = UIkit.modal.blockUI("<div class='uk-text-center'>Processing...<br/><img class='uk-margin-top' src='"+SITE_URL+"public/assets/img/spinners/spinner.gif' alt=''"); 
		$.ajax({
			url: SITE_URL+'projectholder/dailypmreport',
			type: "POST",
			dataType: "JSON",
			data: {
				'start_date' : moment($("#startDate").val()).format("YYYY-MM-DD"),
				'end_date' :  moment($("#endDate").val()).format("YYYY-MM-DD")
			},
			success: function(data){
				//$('.md-input-wrapper').find('.md-input').val('');
				$('.md-input-wrapper').removeClass('md-input-filled');
				$("#txtNumberOfWorking").val(26);
				console.log(data);
				if(data.user){
					$("#txtMonthlyTarget").val('$ '+ data.user.sumtarget);
					$("#txtTodayTarget").val('$ ' + data.user.todaytarget);
					$("#txtTodayAchievement").val('$ ' + data.user.dayachievement);
					$("#txtMonthToDateAchievement").val('$ ' + data.user.monthachievement);
					$("#txtYearToDateAchievement").val('$ ' + data.user.yearachievement);
					$("#txtTodayAchievementPercent").val('% ' + data.user.dayachievement_percent);
					$("#txtMonthToDateAchievementPercent").val('% ' + data.user.monthachievement_percent);
					$("#txtYearToDateAchievementPercent").val('% ' + data.user.yearachievement_percent);
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
				$('.md-input-wrapper').find('.md-input').val('');
				$('.md-input-wrapper').removeClass('md-input-filled');
				$("#txtNumberOfWorking").val(26);
				modal.hide();
				console.log(data);
			}
		});
	};

	report.getProjectHolderReport();

	// TODO: ON CHANGE ON STARTE DATE 
	$("#startDate, #endDate").change(function(e){
		if($("#startDate").val()=="" || $("#endDate").val()==""){
			return false;
		}
		if(moment($("#startDate").val()).format('YYYY-MM-DD') > moment($("#endDate").val()).format('YYYY-MM-DD')){
			return false;
		}
		modal = UIkit.modal.blockUI("<div class='uk-text-center'>Processing...<br/><img class='uk-margin-top' src='"+SITE_URL+"public/assets/img/spinners/spinner.gif' alt=''"); 
		$.ajax({
			url: SITE_URL+'projectholder/dailypmreport',
			type: "POST",
			dataType: "JSON",
			data: {
				'start_date' : moment($("#startDate").val()).format("YYYY-MM-DD"),
				'end_date' :  moment($("#endDate").val()).format("YYYY-MM-DD")
			},
			success: function(data){
				//$('.md-input-wrapper').find('.md-input').val('');
				$('.md-input-wrapper').removeClass('md-input-filled');
				$("#txtNumberOfWorking").val(26);
				console.log(data);
				if(data.user){
					$("#txtMonthlyTarget").val('$ '+ data.user.sumtarget);
					$("#txtTodayTarget").val('$ ' + data.user.todaytarget);
					$("#txtTodayAchievement").val('$ ' + data.user.dayachievement);
					$("#txtMonthToDateAchievement").val('$ ' + data.user.monthachievement);
					$("#txtYearToDateAchievement").val('$ ' + data.user.yearachievement);
					$("#txtTodayAchievementPercent").val('% ' + data.user.dayachievement_percent);
					$("#txtMonthToDateAchievementPercent").val('% ' + data.user.monthachievement_percent);
					$("#txtYearToDateAchievementPercent").val('% ' + data.user.yearachievement_percent);
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
				$('.md-input-wrapper').find('.md-input').val('');
				$('.md-input-wrapper').removeClass('md-input-filled');
				$("#txtNumberOfWorking").val(26);
				modal.hide();
				console.log(data);
			}
		});
	});

});