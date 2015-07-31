(function($) {

	if (typeof _wpcf7 == 'undefined' || _wpcf7 === null) {
		_wpcf7 = {};
	}

	$(function() {
		var welcomePanel = $('#welcome-panel');
		var updateWelcomePanel;

		updateWelcomePanel = function( visible ) {
			$.post( ajaxurl, {
				action: 'wpcf7-update-welcome-panel',
				visible: visible,
				welcomepanelnonce: $( '#welcomepanelnonce' ).val()
			});
		};

		$('a.welcome-panel-close', welcomePanel).click(function(event) {
			event.preventDefault();
			welcomePanel.addClass('hidden');
			updateWelcomePanel( 0 );
		});

		$('#contact-form-editor').tabs({
			active: _wpcf7.activeTab,
			activate: function(event, ui) {
				$('#active-tab').val(ui.newTab.index());
			}
		});

		$('#contact-form-editor-tabs').focusin(function(event) {
			$('#contact-form-editor .keyboard-interaction').css(
				'visibility', 'visible');
		}).focusout(function(event) {
			$('#contact-form-editor .keyboard-interaction').css(
				'visibility', 'hidden');
		});

		$('input:checkbox.toggle-form-table').click(function(event) {
			$(this).wpcf7ToggleFormTable();
		}).wpcf7ToggleFormTable();

		if ('' == $('#title').val()) {
			$('#title').focus();
		}

		$.wpcf7TitleHint();

		$('.contact-form-editor-box-mail span.mailtag').click(function(event) {
			var range = document.createRange();
			range.selectNodeContents(this);
			window.getSelection().addRange(range);
		});

		$(window).on('befor