/* Theme Options JavaScript */

jQuery(document).ready(function() {
    
    jQuery('.settings-error').prependTo('.settings_content');
    
    //Loading current tab using cookie
    if(getCookie("currtab") != "" && getCookie("currtab") != null) {
        jQuery('.settings_tab').removeClass('current_tab');
        var currtab = getCookie("currtab");
        jQuery('#' + currtab).addClass('current_tab');
        var currsection = currtab.replace('settings_tab','settings_section');
        jQuery('.settings_section').hide();
        jQuery('#' + currsection).show();
    }
    
    jQuery('.settings_tab').click(function() {        
        var clickedTab = jQuery(this).attr("id");
        var currentTab = jQuery('.current_tab').attr("id");
        if(clickedTab != currentTab) {
            jQuery('.settings-error').hide();
            var showSection = clickedTab.replace("settings_tab","settings_section");
            jQuery('.settings_tab').removeClass('current_tab');
            jQuery('#' + clickedTab).addClass('current_tab');
            jQuery('.settings_section').hide();
            jQuery('#' + showSection).fadeIn(500);
        }
    });
    
    //Upload image script
    var formfieldID;
    jQuery('.image_upload').click(function() {
        var btnId = jQuery(this).attr("id");
        formfieldID = btnId.replace("_upload","");
        tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
        return false;
    });
    window.send_to_editor = function(html) {
        imgurl = jQuery('img',html).attr('src');
        jQuery('#' + formfieldID).val(imgurl);
        tb_remove();
    }
    
    //Setting cookie to remember last tab
    jQuery('#settings_submit').click(function() {
        var currentTabId = jQuery('.current_tab').attr("id");
        setCookie("currtab",currentTabId,3);
    });
});

function confirmAction() {
    var confirmation = confirm("Do you want to delete your settings and restore to default settings ?");
    return confirmation;
}

function setCookie(name,value,secs) {
    if (secs) {
	var date = new Date();
	date.setTime(date.getTime()+(secs*1000));
	var expires = "; expires="+date.toGMTString();
    }
    else var expires = "";
    document.cookie = name+"="+value+expires+"; path=/";
}

function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}