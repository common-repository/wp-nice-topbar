jQuery(document).ready(function(){
	var $ = jQuery;

	// apply topbar
	$(topbar).insertBefore('body');

	// close button
	$('.close-icon').click(function(){
		var openBtn = $(this).siblings('.open-btn');
		var nametp = $(this).parent().attr('id');
		var moveDistance = $(this).parent().attr('data-height');
		var moveTime = $(this).parent().attr('data-move-time');
		var moveActive = $(this).parent().attr('data-smooth-close');
		var position = $(this).parent().attr('data-position');

		openBtn.removeClass('close-active');
		openBtn.addClass('open-active');

		// This is code for top bar on top
		if (moveActive == 'on') {
			if (position == 'top') {
				$('#' + nametp).css({'top' : '-' + moveDistance + 'px'});
			} else {
				$('#' + nametp).css({'bottom' : '-' + moveDistance + 'px'});
			}
			$('#' + nametp).css({'transition' : 'all ' + moveTime + 's'});
		} else {
			if (position == 'top') {
				$('#' + nametp).css({
					'top' : '-' + moveDistance + 'px',
				});
			} else {
				$('#' + nametp).css({
					'bottom' : '-' + moveDistance + 'px',
				});
			}
		}

	});

	// Re-Open button click
	$('.open-btn').click(function(){
		var nametp = $(this).parent().attr('id');
		var moveDistance = $(this).parent().attr('data-height');
		var moveTime = $(this).parent().attr('data-move-time');
		var moveActive = $(this).parent().attr('data-smooth-close');
		var position = $(this).parent().attr('data-position');

		if (moveActive == 'on') {
			if (position == 'top') {
				$('#' + nametp).css({
					'top' : '0',
					'transition' : 'all ' + moveTime + 's',
				});
			} else {
				$('#' + nametp).css({
					'bottom' : '0',
					'transition' : 'all ' + moveTime + 's',
				});
			}
		} else {
			if (position == 'top') {
				$('#' + nametp).css({
					'top' :  '0px',
				});
			} else {
				$('#' + nametp).css({
					'bottom' : '0px',
				});
			}
		}

		$(this).removeClass('open-active');
		$(this).addClass('close-active');

	});

	// mailchimp subscribe form
    // subcribe form ajax
    var form = $('.wpnt-subscribe-form');
    var notify = $('.wpnt-notification');
    if ( form.length > 0 ) {
        $('.btn-subscribe').bind( 'click', function(event) {
        	$(this).find('span').remove();
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
            $form.hide();
            if (data.result != "success") {
                // Something went wrong, do something to notify the user. maybe alert(data.msg);
                notify.empty();
                message += '<span class="wpnt-message wpnt-error">' + data.msg + '</span>';
                notify.append( message );
            } else {
                // It worked, carry on...
                processing_img.fadeOut(300);
                notify.empty();
                var text = $form.find('input[name="wpnt-success-message"]').val();
                message += '<span class="wpnt-message wpnt-success">' + text + '</span>';
                notify.append( message );
            }
        }
    });
}