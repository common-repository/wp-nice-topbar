jQuery(document).ready(function(){
	var $ = jQuery;
    
    $('.multipleSelect').fastselect();

    var topbarBox = $('.topbar-box');
    var elemBox = $('.components-box');
    
    topbarBox.droppable({
        accept: ".components-box div",
        drop: function(event, ui) {
            addComponent(ui.draggable);
        }
    });

    elemBox.droppable({
        accept: ".topbar-box div",
        drop: function(event, ui) {
            recycleComponent(ui.draggable);
        }
    });

    function addComponent($item)
    {
        $item.fadeOut(function(){
            $item.appendTo(topbarBox).fadeIn();
        });
    }

    function recycleComponent($item)
    {
        $item.fadeOut(function(){
            $item.appendTo(elemBox).fadeIn();
        });
    }

    topbarBox.sortable();
    elemBox.sortable();

    // range slider
    $('.wpnt-slider').each(function(){
        var $slider = $(this);
        var handle = $slider.next('.wpnt-slider-target');
        var sliderNum = $slider.find('.custom-handle');
        var beginVal = $slider.next('.wpnt-slider-target').val();
        var range = $slider.attr('data-range');

        if (range == '') {
        	range = 100;
        }
        
        $slider.slider({
        	range: "max",
        	max: range,
            value: beginVal,
            create: function() {
                var value = $(this).slider('value');
                handle.val(value);
                sliderNum.text(value);
            },
            slide: function( event, ui ) {
                var handle = $(this).next('.wpnt-slider-target');
                var sliderNum = $(this).find('.custom-handle');
                handle.val(ui.value);
                sliderNum.text(ui.value);
            }
        });
    });

    // button actions checkbox
    var chkOnclick = $('#wpnt_button_open');
    var chkScript = $('#wpnt_button_script');
    chkOnclick.click(function(){
        chkScript.attr('checked', false);
    });
    chkScript.click(function(){
        chkOnclick.attr('checked', false);
    });

    // button disable/all display checkbox
    var chkDisable = $('#wpnt_place_none');
    var chkAllDisplay = $('#wpnt_place_everywhere');
    chkDisable.click(function(){
        chkAllDisplay.attr('checked', false);
    });
    chkAllDisplay.click(function(){
        chkDisable.attr('checked', false);
    });

	/**
	 * Upload topbar background
	 */
    var uploader_bg;
    $('#wpnt_upload_bg').click(function(e) {
        e.preventDefault();
        //If the uploader object has already been created, reopen the dialog
        if (uploader_bg) {
            uploader_bg.open();
            return;
        }
        //Extend the wp.media object
        uploader_bg = wp.media.frames.file_frame = wp.media({
            title: 'Choose Image',
            button: {
                text: 'Choose Image'
            },
            multiple: false
        });
        //When a file is selected, grab the URL and set it as the text field's value
        uploader_bg.on('select', function() {
            attachment = uploader_bg.state().get('selection').first().toJSON();
            $('#wpnt_bg_img').attr('value', attachment.url).show();
            $('#wpnt_remove_bg').show();
            $('#wpnt_upload_bg').hide();
        });
        //Open the uploader dialog
        uploader_bg.open();
    });
    $('#wpnt_remove_bg').click(function(){
    	$('#wpnt_bg_img').attr('value', '');
    	$('#wpnt_upload_bg').show();
    	$(this).hide();
    });
    if ($('#wpnt_bg_img').attr('value') != '') {
        $('#wpnt_remove_bg').show();
        $('#wpnt_upload_bg').hide();
    }
	    
    /**
	 * Upload topbar logo
     */
    var custom_uploader;
    $('#wpnt_upload_logo').click(function(e) {
        e.preventDefault();
        //If the uploader object has already been created, reopen the dialog
        if (custom_uploader) {
            custom_uploader.open();
            return;
        }
        //Extend the wp.media object
        custom_uploader = wp.media.frames.file_frame = wp.media({
            title: 'Choose Image',
            button: {
                text: 'Choose Image'
            },
            multiple: false
        });
        //When a file is selected, grab the URL and set it as the text field's value
        custom_uploader.on('select', function() {
            attachment = custom_uploader.state().get('selection').first().toJSON();
            $('#wpnt_logo_url').attr('value', attachment.url).show();
            $('#wpnt_remove_logo').show();
            $('#wpnt_upload_logo').hide();
        });
        //Open the uploader dialog
        custom_uploader.open();
    });
    $('#wpnt_remove_logo').click(function(){
    	$('#wpnt_logo_url').attr('value', '');
    	$('#wpnt_upload_logo').show();
    	$(this).hide();
    });
    if ($('#wpnt_logo_url').attr('value') != '') {
        $('#wpnt_remove_logo').show();
        $('#wpnt_upload_logo').hide();
    }

    $('.wpnt-icon-cursor').hover(function(){
    	$(this).siblings().show();
    }, function(){
    	$(this).siblings().hide();
    });

    // TABS JS
    $('.wpnt-tabs li').click(function(){
    	var tab_id = $(this).attr('id');
    	$('.wpnt-tabs li').removeClass('wpnt-tab-active');
    	$(this).addClass('wpnt-tab-active');
    	$('.wpnt-pane').each(function(){
    		var pane_id = '#' + $(this).attr('id');
    		if (pane_id == tab_id) {
    			$('.wpnt-pane').removeClass('wpnt-pane-active');
    			$(this).addClass('wpnt-pane-active');
    		}
    	});
    });

    // vertical tab
    var verticalTab = $('.wpnt-vertical-tab li');
    verticalTab.click(function(){
        var tab_id = $(this).attr('id');
        verticalTab.removeClass('wpnt-tab-active');
        $(this).addClass('wpnt-tab-active');
        $('.wpnt-pane').each(function(){
            var pane_id = '#' + $(this).attr('id');
            if (pane_id == tab_id) {
                $('.wpnt-pane').removeClass('wpnt-pane-active');
                $(this).addClass('wpnt-pane-active');
            }
        });
    });

    // color picker
    $('.color-picker').each( function() {
        //
        // Dear reader, it's actually very easy to initialize MiniColors. For example:
        //
        //  $(selector).minicolors();
        //
        // The way I've done it below is just for the demo, so don't get confused
        // by it. Also, data- attributes aren't supported at this time. Again,
        // they're only used for the purposes of this demo.
        //
        $(this).minicolors({
            control: $(this).attr('data-control') || 'hue',
            defaultValue: $(this).attr('data-defaultValue') || '',
            inline: $(this).attr('data-inline') === 'true',
            letterCase: $(this).attr('data-letterCase') || 'lowercase',
            opacity: $(this).attr('data-opacity'),
            position: $(this).attr('data-position') || 'bottom left',
            change: function(hex, opacity) {
                var log;
                try {
                    log = hex ? hex : 'transparent';
                    if( opacity ) log += ', ' + opacity;
                    console.log(log);
                } catch(e) {}
            },
            theme: 'default'
        });

    });

    // subcribe form ajax
    var form = $('.newletter-subscribe-form');
    var notify = $('.wpnt-notification');
    if ( form.length > 0 ) {
        $('.btn-subscribe').bind( 'click', function(event) {
            processing_img = $('#processing_img');
            processing_img.fadeIn(300);
            if ( event ) {
                event.preventDefault();
            }
            subcribe_form( form, notify );
        });
    }


});

function subcribe_form($form, notify) {
    var $ = jQuery;
    $.ajax({
        type: $form.attr('method'),
        url: $form.attr('action'),
        data: $form.serialize(),
        cache       : false,
        dataType    : 'json',
        contentType: "application/json; charset=utf-8",
        error       : function(err) { alert("Could not connect to the registration server. Please try again later."); },
        success     : function(data) {
            var message = '';
            if (data.result != "success") {
                // Something went wrong, do something to notify the user. maybe alert(data.msg);
                notify.empty();
                message += '<div class="wpnt-message wpnt-error">' + data.msg + '</div>';
                notify.append( message );
            } else {
                // It worked, carry on...
                processing_img.fadeOut(300);
                notify.empty();
                message += '<div class="wpnt-message wpnt-success">' + data.msg + '</div>';
                notify.append( message );
                setTimeout(function(){
                    notify.fadeOut(300);
                }, 1000);
                $form.find('input[type="email"]').attr('value','');
            }
        }
    });
}