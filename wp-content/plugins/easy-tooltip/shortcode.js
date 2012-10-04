(function() {
    tinymce.create('tinymce.plugins.easy_tooltip', {
        init : function(ed, url) {
        	ed.addCommand('easy_tooltip_cmd', function() {
				ed.windowManager.open({
					file : url + '/button-tooltip.php',
					width : 340 + parseInt(ed.getLang('button.delta_width', 0)),
					height : 350 + parseInt(ed.getLang('button.delta_height', 0)),
					inline : 1
					}, {
					plugin_url : url
				});
			});
    
            ed.addButton('easy_tooltip', {
                title : 'Add a Tooltip',
                image : url + '/img/button-tooltip.png',
                cmd: 'easy_tooltip_cmd'
            });
        },
		getInfo : function() {
			return {
				longname : 'Insert a Tooltip',
				author : 'Franz Viaud-Murat',
				authorurl : 'http://intelliant.fr',
				infourl : 'http://intelliant.fr',
				version : tinymce.majorVersion + '.' + tinymce.minorVersion
			};
		}
    });
    tinymce.PluginManager.add('easy_tooltip', tinymce.plugins.easy_tooltip);
})();