/**
 * plugin.js
 *
 * Copyright, VMLab.IT
 * Released under GPL License.
 *
 */

/**
 * youtube_alpha plugin that adds a toolbar button for adding youtube video.
 */
tinymce.PluginManager.add('youtube', function(editor, url) {
	// Add a button that opens a window
	editor.addButton('youtube', {
		text: 'Add YouTube video',
		icon: false,
		onclick: function() {
			// Open window
			editor.windowManager.open({
				title: 'YouTube plugin',
				body: [
					{type: 'textbox', name: 'code', label: 'Video code'}
				],
				onsubmit: function(e) {
					// Insert content when the window form is submitted
					if(e.data.code)
						editor.insertContent('<iframe width="420" height="315" src="http://www.youtube.com/embed/'+e.data.code+'" frameborder="0" allowfullscreen></iframe>');
					else
						tinyMCE.activeEditor.windowManager.alert('Please fill the code field to use YouTube plugin.');
						
				}
			});
		}
	});


	// Adds a menu item to the tools menu
	editor.addMenuItem('youtube', {
		text: 'YouTube plugin',
		context: 'tools',
		onclick: function() {
			// Open window with a specific url
			editor.windowManager.open({
				title: 'YouTube plugin',
				url: 'http://www.vmlab.it/project/downloads/viewdownload/10-tinymce/13-youtube-plugin-for-tinymce',
				width: 800,
				height: 600,
				buttons: [{
					text: 'Close',
					onclick: 'close'
				}]
			});
		}
	});
});