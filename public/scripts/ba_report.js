$(function(){
	
	var dmsCode = false;
/*	var begin = moment().isoWeekday(1).startOf('week');
var begin2 = moment().startOf('week');
// could check to see if day 1 = Sunday  then add 1 day
// my mac on bst still treats day 1 as sunday    

var firstDay = moment().startOf('week').format('dddd') === 'Sunday' ?     
moment().startOf('week').add('d',1).format('dddd DD-MM-YYYY') : 
moment().startOf('week').format('dddd DD-MM-YYYY');
alert(moment().add('week', 1).date(1).format('YYYY-MM-DD') + moment().add('week', 1).date(7).format('YYYY-MM-DD'));

document.body.innerHTML = '<b>could be monday or sunday depending on client: </b><br />' + 
begin.format('dddd DD-MM-YYYY') + 
'<br /><br /> <b>should be monday:</b> <br>' + firstDay + 
'<br><br> <b>could also be sunday or monday </b><br> ' + 
begin2.format('dddd DD-MM-YYYY');*/

/*var date = moment('2016-01-06'),
begin = moment(date).add('week',1).startOf('week').isoWeekday(1);
var str = [];
for (var i=0; i<7; i++) {
	var data = {};
	data["date"] = begin.format('YYYY-MM-DD');
	data["name"] = begin.format('dddd');
    str.push(data); //+ '<br>';
    begin.add('d', 1);
}
$("#duration").val(JSON.stringify(str));

function submitFormToIFrame(){
    //IE
    if( document.myform ){
        document.myform.setAttribute('target','frame_x');
        document.myform.submit();
    //FF
    } else {
        var form=document.getElementById('myform');
        form.setAttribute('target', 'frame_x');
        form.submit();
    }
}
submitFormToIFrame();*/
//alert(JSON.stringify(str));

/*$.ajax({
	url: SITE_URL+'outletexcel/weekly',
	type: "POST",
	dataType: "JSON",
	data: {
		'duration' : str,
		'outlet_id' : 1
	},
	success: function(data){
		console.log(data);
	},
	error: function(data){
		console.log(data);
	}
});*/

//document.body.innerHTML = str;
	// TODO: ON CHANGE ON BA 
	$("#selectedBA").change(function(){
		modal = UIkit.modal.blockUI("<div class='uk-text-center'>Processing...<br/><img class='uk-margin-top' src='"+SITE_URL+"public/assets/img/spinners/spinner.gif' alt=''"); 
		$.ajax({
			url: SITE_URL+'report/selectedBA',
			type: "POST",
			dataType: "JSON",
			data: {
				'ba_id' : $("#selectedBA").val(),
			},
			success: function(data){
				console.log(data);
				modal.hide();
				if(data.outlets){
					$("#selectOutletName").html("<option value=''>Select Outlet Name</option>");
					if(data.outlets.length>0){
						for(var i=0; i<data.outlets.length;i++){
							console.log($("#selectOutletName").html());
							$("#selectOutletName").append("<option value='"+data.outlets[i].id+"'>"+data.outlets[i].outlet_name+"</option>");
						}
						$("#selectOutletName").attr('data-md-selectize','');
						$("#selectOutletName").attr('data-md-data-md-selectize-bottom','');
		
					}                      
				}
			},
			error: function(data){
				modal.hide();
				console.log(data);
			}
		});
	});

	// TODO: ON CHANGE ON OUTLET NAME
	$("#selectOutletName").change(function(){
		var start_date = moment().date(1).format('YYYY-MM-DD');
		var end_date = moment().add('months', 1).date(0).format('YYYY-MM-DD');
		if(dmsCode==true){
			dmsCode = false;
			return false;
		}
		modal = UIkit.modal.blockUI("<div class='uk-text-center'>Processing...<br/><img class='uk-margin-top' src='"+SITE_URL+"public/assets/img/spinners/spinner.gif' alt=''"); 
		$.ajax({
			url: SITE_URL+'report/changeba',
			type: "POST",
			dataType: "JSON",
			data: {
				'ba_id' : $("#selectedBA").val(),
				'outlet_id' : $("#selectOutletName").val(),
				'start_date' : start_date,
				'end_date' : end_date
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
					//$("#txtOutletName").val(data.user.outlet_name);
					$("#txtDMSCode").val(data.user.dms_code);
					$("#txtDT").val(data.user.distributor);
					$("#txtCustomerType").val(data.user.customer_type);
					$("#txtChannel").val(data.user.channel);
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

	// TODO: ON CHANGE ON BA 
	$("#txtDMSCode").keyup(function(e){
		var code = (e.keyCode ? e.keyCode : e.which);
    	if (code==13) {
			var start_date = moment().date(1).format('YYYY-MM-DD');
			var end_date = moment().add('months', 1).date(0).format('YYYY-MM-DD');
			modal = UIkit.modal.blockUI("<div class='uk-text-center'>Processing...<br/><img class='uk-margin-top' src='"+SITE_URL+"public/assets/img/spinners/spinner.gif' alt=''"); 
			$.ajax({
				url: SITE_URL+'report/changedmsCode',
				type: "POST",
				dataType: "JSON",
				data: {
					'dms_code' : $("#txtDMSCode").val(),
					'start_date' : start_date,
					'end_date' : end_date
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
					}else{
						$("#txtPhoto").attr('src',"");
						$("#txtSupervisorName").val("");
						$("#txtBAExecutive").val("");
						$("#txtMarketName").val("");
						$("#txtOutletName").val("");
						$("#txtDT").val("");
						$("#txtCustomerType").val("");
						$("#txtChannel").val("");
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
    	}
	});

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
			url: SITE_URL+'report/changeba',
			type: "POST",
			dataType: "JSON",
			data: {
				'ba_id' : $("#selectedBA").val(),
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