function tinyplugin() {
	
	// Retrun plugin value to tinyMCE
    return "[pinterestpro-plugin]";
	
}

// Start Tiny MCE plugin
(function() {

    tinymce.create('tinymce.plugins.pinterestproplugin', {

		// When initiated:
        init : function(ed, url){
			
			// Create dialog command
			ed.addCommand('pinterestpro-shortcode', function() {
				ed.windowManager.open({
				  file : url + '/mce_button_dialog.php',
				  width : 450,
				  height : 455,
				  inline : 1
				}, {
				  plugin_url : url
				});
			});
			
			// Add the like locker button to the toolbar
            ed.addButton('pinterestproplugin', {
                title : 'Pinterest Pro',
				cmd : 'pinterestpro-shortcode',				
                image: url + "/tinymce.png"
            }); // end addbutton
			
        },

		// Set MCE plugin info
        getInfo : function() {
			
            return {
				
                longname : 'Pinterest Pro for WordPress',
                author : 'Tyler Colwell',
                authorurl : 'http://tyler.tc',
                infourl : 'http://tyler.tc',
                version : "1.0"
				
            };
			
        } // end set info
		
    }); // End main plugin init

	// Finally add functionality to toolbar
    tinymce.PluginManager.add('pinterestproplugin', tinymce.plugins.pinterestproplugin);
    
})(); // end plugin