jQuery(document).ready(function(){
	var $ = jQuery;
	var loading = $('.saving-img');
	var updated = $('.updated-box');
	// save individual topbar data
	//var settings = new Array();
	$('#wpnt_btn_save').click(function(){
		loading.fadeIn();
		// general
		var settings = {};
		settings['wpnt_place'] = [];
		settings['wpnt_topbar_content'] = '';
		$('.wpnt-options').each(function(){
			var $this = $(this);
			var wid = $(this).attr('id');
			var wval = $(this).attr('value');
			var fieldType = $(this).attr('data-type');

			settings[wid] = wval;
			switch (fieldType) {
				case 'checkbox':
					if ($('#'+wid).is(':checked') == false) {
						settings[wid] = 'off';
					} else {
						settings[wid] = 'on';
					}
					break;
				case 'slplace':

					var typePlace, isChecked;
					var placeValue = [];
					//var places = [];
					typePlace = $(this).attr('data-place');
					if (typePlace == 'none' || typePlace == 'all') {
						if ($this.is(':checked') == false) {
							isChecked = 'off';
						} else {
							isChecked = 'on';
						}
						settings['wpnt_place'].push({
							place: typePlace,
							value: isChecked
						});
					} else {
						$('#'+wid+' option:selected').each(function(){
							placeValue.push($(this).val());
						});
						settings['wpnt_place'].push({
							place: typePlace,
							value: placeValue
						});
					}
					break;
				case 'cpn':
					var orders = [];
					var eleIndex;
					var content = '';
					if ($(this).has('#topbar_logo')) {
						eleIndex = $(this).children('#topbar_logo').index();
						if (eleIndex != -1) {
							orders[eleIndex] = '[logo]';	
						}
					}
					if ($(this).has('#topbar_text')) {
						eleIndex = $(this).children('#topbar_text').index();
						if (eleIndex != -1) {
							orders[eleIndex] = '[text]';	
						}
					}
					if ($(this).has('#topbar_button')) {
						eleIndex = $(this).children('#topbar_button').index();
						if (eleIndex != -1) {
							orders[eleIndex] = '[button]';
						}
					}
					if ($(this).has('#topbar_mailchimp')) {
						eleIndex = $(this).children('#topbar_mailchimp').index();
						if (eleIndex != -1) {
							orders[eleIndex] = '[mailchimp]';
						}
					}
					if (orders.length != 0) {
						for (var i = 0; i < orders.length; i++) {
							content += orders[i];
						}
					}
					//console.log(content);
					settings['wpnt_topbar_content'] = content;
					break;
			};
		});

		var data = {
			'action': 'save_topbar',
			'settings': settings,
		};

		$.post(ajaxurl, data, function(response) {
			//console.log(response);
			loading.fadeOut(300, function(){
				var updated = $('.updated-box');
				updated.fadeIn(500);
				setTimeout(function(){
					updated.fadeOut(500);
				}, 1000);				
			});
		});

	});

	// save plugin settings
	var pluginSettings = {};
	var inputSettings = $('.wpnt-options');
	var btnSaveSettings = $('#wpnt_btn_save_settings');
	btnSaveSettings.click(function(){
		loading.fadeIn();
		inputSettings.each(function(){
			var settingId = $(this).attr('id');
			var settingValue = $(this).val();
			var inputType = $(this).attr('data-type');
			console.log(settingValue);
			if (inputType == 'checkbox') {
				if ($(this).is(':checked') == false) {
					settingValue = 'off';
				} else {
					settingValue = 'on';
				}
			}
			pluginSettings[settingId] = settingValue;
		});

		var data = {
			action: 'save_settings',
			pluginSettings: pluginSettings
		}
		$.post(ajaxurl, data, function(response){
			loading.fadeOut(300, function(){
				updated.fadeIn(500);
				setTimeout(function(){
					updated.fadeOut(500);
				}, 1000);				
			});
		});
	});

	// connect mailchimp api
	var connectBtn = $('#wpnt_btn_connect');
	connectBtn.click(function(){
		var key;
		key = $('#wpnt_mailchimp_api').val();
		var data = {
			action: 'sync_mailchimp',
			key: key
		};
		$.post(ajaxurl, data, function(response){
			var syncStatus = $('.wpnt-mc-label');
			var syncInput = $('#wpnt_mailchimp_status');
			if (response == 'success') {
				syncStatus.text('CONNECTED').addClass('wpnt-connect');
				syncInput.val('connect');
			} else {
				syncStatus.text('NOT CONNECTED').removeClass('wpnt-connect');
				syncInput.val('disconnect');
			}
		});
	});

	// select
	$('.multipleSelect').change(function(){
		$('#wpnt_place_none').attr('checked', false);
		$('#wpnt_place_everywhere').attr('checked', false);
	});

	// add new button
	$('#wpnt_btn_add').click(function(){
		var topbar_name = $('#wpnt_topbar_name').attr('value');

		$('.ajax-loading-img').fadeIn();

		var data = {
			'action' : 'add_new',
			'name' : topbar_name,
		}

		$.post(ajaxurl, data, function(response){
			//console.log(response);
			if (response != 'The topbar name should be alphanumeric string.' && response != 'This name has existed. Please try other.') {
				var loading = $('.ajax-loading-img');
				loading.fadeOut();
				window.location.replace(response);
			} else {
				alert(response);
			}
		});
	});

	// delete a topbar in list topbar
	$('.wpnt-delete').each(function(){
		$(this).click(function(){
		    if (!confirm("Do you want to delete this topbar?")) {
		    	return false;
		    } else {
		    	var id = $(this).attr('data-id');
		    	$('#row_' + id).remove();
		    	
				var name_topbar = $(this).attr('data-name');		    	
				var data = {
					'action' : 'delete_topbar',
					'name_topbar' : name_topbar,
				}
				$.post(ajaxurl, data, function(response) {

				});
		    }			
		});
	});

	// Delete a topbar in single topbar
	$('#wpnt_single_remove').click(function(){
	    if (!confirm("Do you want to delete this topbar?")) {
	    	return false;
	    } else {
			var topbar_name = $('#wpnt_topbar_name').attr('value');
			var data = {
				'action' : 'single_delete_topbar',
				'topbar_name' : topbar_name
			}
			$.post(ajaxurl, data, function(response) {
				window.location.replace(response);
			});
		}
	});

	// edit a topbar
	$('.wpnt-edit').each(function(){
		$(this).click(function(){
			var name_topbar = $(this).attr('data-name');

			var data = {
				'action' : 'edit_topbar',
				'name_topbar' : name_topbar,
			}
			$.post(ajaxurl, data, function(response){
				//alert(response);
				window.location.replace(response);
			});
		});
	});

    // reset button
    $('#wpnt_btn_reset').click(function(){
		// general
		if (!confirm("Do you want to reset all options of this topbar?")) {
	    	return false;
	    } else {
	    	loading.fadeIn();
	    	var topbar_label = $('#wpnt_topbar_label').attr('value');
	    	var topbar_name = $('#wpnt_topbar_name').attr('value');

			var data = {
				'action': 'reset_topbar',
				'topbar_label': topbar_label,
				'topbar_name' : topbar_name,
			};

			$.post(ajaxurl, data, function(response) {
				loading.fadeOut(300, function(){
					var updated = $('.updated-box');
					updated.fadeIn(500);
					setTimeout(function(){
						updated.fadeOut(500);
						window.location.replace(response);
					}, 1000);				
				});
			});

	    }
    });

});