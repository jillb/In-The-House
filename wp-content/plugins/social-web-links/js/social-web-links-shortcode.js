/* Social Web Links Shortcode JavaScript */

(function() {
    tinymce.create('tinymce.plugins.social_web_link', {
        init : function(ed, url) {
            ed.addButton('social_web_link', {
                title : 'Social Web Link',
                image : url+'/swl_button.gif',
                onclick : function() {
                     ed.selection.setContent('[social_web_link]' + ed.selection.getContent() + '[/social_web_link]');
                }
            });
        },
        createControl : function(n, cm) {
            return null;
        }
    });
    tinymce.PluginManager.add('social_web_link', tinymce.plugins.social_web_link);
})();