$(function(){
	
	var dmsCode = false;
	$("#txtTransactionOf").val(moment().format('DD-MMMM-YYYY'));
	// TODO: ON CHANGE ON BA 
	$("#selectedBA").change(function(){
		var start_date = moment().date(1).format('YYYY-MM-DD');
		var end_date = moment().add('months', 1).date(0).format('YYYY-MM-DD');
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
				'start_date' : start_date,
				'end_date' : end_date
			},
			success: function(data){
				console.log(data);
				$('.md-input-wrapper').find('.md-input').not("#txtTransactionOf,#txtNumberOfWorking").val('');
				$('.md-input-wrapper').removeClass('md-input-filled');
				if(data.outlets){
					$("#selectOutletName").html("<option value=''>Outlet Name</option>");
					if(data.outlets.length>0){
						for(var i=0; i<data.outlets.length;i++){
							console.log($("#selectOutletName").html());
							$("#selectOutletName").append("<option value='"+data.outlets[i].id+"'>"+data.outlets[i].outlet_name+"</option>");
						}
						$("#selectOutletName").attr('data-md-selectize','');
						$("#selectOutletName").attr('data-md-data-md-selectize-bottom','');
		
					}

					 /*$("#selectOutletName").kendoDropDownList({
                          dataTextField: "outlet_name",
                          dataValueField: "id",
                          dataSource: data.outlets,
                          height: 100,
                          select: function(e){
                          	console.log(e).item;
                          }
                      });*/
                      
				}
				if(data.user){
					$("#txtPhoto").attr('src',data.user.photo);
					$("#txtSupervisorName").val(data.user.supervisor);
					$("#txtBAExecutive").val(data.user.executive);

/*					$("#txtMarketName").val(data.user.outlet_address);
					$("#txtOutletName").val(data.user.outlet_name);
					$("#txtDMSCode").val(data.user.dms_code);
					$("#txtDT").val(data.user.distributor);
					$("#txtCustomerType").val(data.user.customer_type);
					$("#txtChannel").val(data.user.channel);*/
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
					if(data.products.length>0){
						$("tbody#CONTENTS").html('');
						/*for(var i=0;i<data.products.length;i++){
		                    data.products[i]['check']='';
		                    products.formatData(data.products[i]);
		                }*/
						$("#CONTENT_TEMPLATE").tmpl(data.products).appendTo("tbody#CONTENTS");
						var dataSource = new kendo.data.DataSource({
				           /*pageSize: 20,*/
				           //data: data.products,
				           change: function(e) {
						      if (e.action == "itemchange")  {
						        if (e.field == "quantity" || e.field == "price") {
						       
						          var item=  e.items[0];
						         	item.trigger("change", {field: "amount"})
						        } 
						      }

						    },
				           transport: {
                                read:  {
                                    url: SITE_URL + "supervisor/products",
                                    dataType: "json"
                                },
                                update: {
                                    url: SITE_URL + "supervisor/products_update",
                                    type: "POST",
                                    data: {
                                    	"ba_id" : 1,
                                    	"outlet_id" : 1
                                    },
                                    dataType: "json",
                                    beforeSend: function(){
                             			modal = UIkit.modal.blockUI("<div class='uk-text-center'>Processing...<br/><img class='uk-margin-top' src='"+SITE_URL+"public/assets/img/spinners/spinner.gif' alt=''"); 
                                    },
                                    complete: function(data){
                                    	modal.hide();
                                    	console.log(data.responseText.message);
                                    	$("#grid").data("kendoGrid").dataSource.read(); 
                                    }
                                },
                                /*destroy: {
                                    url: SITE_URL + "/Products/Destroy",
                                    dataType: "jsonp"
                                },
                                create: {
                                    url: SITE_URL + "/Products/Create",
                                    dataType: "jsonp"
                                },*/
                                parameterMap: function(options, operation) {
                                    if (operation !== "read" && options.models) {
                                        return { 
                                        	models: kendo.stringify(options.models),
                                        	//models: options.models,
                                        	ba_id : $("#selectedBA").val(),
                                        	outlet_id : $("#selectOutletName").val()

                                        };
                                    }
                                }
                            },
                           batch: true,
				           /*autoSync: true,*/
				           schema: {
				           		
				               model: {
				               	 Total:function() {
				                  return this.get("price") * this.get("quantity");
				                 },
				                 id: "product_id",
				                 fields: {
				                    code: { editable: false, nullable: false },
				                    name: { editable: false },
				                    price: { editable: false, nullable: false},
				                    quantity: { type: "number", editable: true, validation: { required: true, min: 0}},
				                    amount: { 
				                    	editable: false
				                    },
				                    promotion: { },
				                    promotiontype: { editable: true}
				                 },

				               }
				               
				           }
				        });

						dataSource.fetch(function(){
						  var view = dataSource.view();
						  console.log(view.length); // displays "2"
						  console.log(view[0].name); // displays "Tea"
						  console.log(view[1].name); // displays "Ham"
						});

			        	var _promotionTypeDataSource = new kendo.data.DataSource({
						    data: [
						        { id: 1, promotiontype: "BUY 1 FREE 1" },
						        { id: 2, promotiontype: "BUY 2 FREE 2" }
						    ]
						});
				        var _grid = $("#grid").kendoGrid({
			        		dataSource: dataSource,
			                sortable: true,
			                /*pageable: true,*/
			                /*height: 550,*/
			                toolbar: ["save"],
			                editable: true,
			                selectable: true,
			                columns: [
	                            { field:"product_id",title:"Id", hidden: true},
	                            { field: "code", title: "Code", width:"10%"},
	                            { field: "name", title:"Product Name", },
	                            { field: "price", title: "Unit Price", format: "{0:c}", width: "10%"},
	                            { field: "quantity", title: "Quantity", width: "10%"},
	                            { field: "amount", title: "Amount", format: "{0:c}", width: "10%", template: "#=Total()#" },
	                            { field: "promotion", title: "Promotion", width: "15%"}, 
	                            { field: "promotiontype", title: "Promotion Type", width: "15%", 
                            		editor: function(container, options) {
						                $("<input data-bind='value:promotiontype' />")
					                    .attr("id", "ddl_roleTitle")
					                    .appendTo(container)
					                    .kendoDropDownList({
					                        dataSource: _promotionTypeDataSource,
					                        dataTextField: "promotiontype",
					                        dataValueField: "id",
					                        template: "<span data-id='${data.id}'>${data.promotiontype}</span>",
					                        select: function(e) {
					                            var id = e.item.find("span").attr("data-id");
					                            console.log(e.item);
					                            console.log(id);
					                            /*var person =_grid.dataItem($(e.sender.element).closest("tr"));
					                            person.promotiontype = id;
					                            
					                            setTimeout(function() {
					                                $("#log")
					                                    .prepend($("<div/>")
					                                        .text(
					                                            JSON.stringify(_grid.dataSource.data().toJSON())
					                                         ).append("<br/><br/>")
					                                    );
					                                });*/
					                        }
					                    });
									}
							    }
	                        ]
					    });
					}else{
						$("tbody#CONTENTS").html('<tr>NO CONTENTS</tr>');
					}
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
				url: SITE_URL+'supervisor/changedmsCode',
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
						$('.md-input-wrapper').find('.md-input').not("#txtTransactionOf,#txtNumberOfWorking").val('');
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
			url: SITE_URL+'supervisor/changeba',
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

	$(document).on('click','.td-editable', function(e){
		e.stopPropagation();
		$(this).html("<input type='text' style='width:90%; padding:0; margin:0; border:none;' class='table-input' value='"+$(this).html()+"'/>");
		$(".table-input").focus();

		var currentElement = $(this);
		var parent = $(this).parent("tr");
        $(".table-input").keyup(function (event) {
            if (event.keyCode == 13 || event.keyCode == 40) {
                currentElement.html($(".table-input").val().trim());
            }
            if(currentElement.attr('id')=="quantitySold"){
            	parent.find("#amount").html(currentElement.html() * parent.find("#price").html());
            }
        });
        /*$(document).click(function () {
            currentElement.html($.trim($(".table-input").val()));
	    });
*/
	    $(".table-input").on('blur', function(event){
			currentElement.html($.trim($(".table-input").val()));
			if(currentElement.attr('id')=="quantitySold"){
            	parent.find("#amount").html(currentElement.html() * parent.find("#price").html());
            }
	    });


	});

	$("#selectOutletName").change(function(){
		modal = UIkit.modal.blockUI("<div class='uk-text-center'>Processing...<br/><img class='uk-margin-top' src='"+SITE_URL+"public/assets/img/spinners/spinner.gif' alt=''"); 
		$.ajax({
			url: SITE_URL+'supervisor/outlet/'+$(this).val(),
			type: "POST",
			dataType: "JSON",
			success: function(data){
				if(data.outlet){
					$("#txtMarketName").val(data.outlet.outlet_address);
					/*$("#txtOutletName").val(data.outlet.outlet_name);*/
					$("#txtDMSCode").val(data.outlet.dms_code);
					$("#txtDT").val(data.outlet.distributor);
					$("#txtCustomerType").val(data.outlet.customer_type);
					$("#txtChannel").val(data.outlet.channel);
				}
				modal.hide();
			},
			error: function(data){
				modal.hide();
				console.log(data);
			}
		});
	});

});