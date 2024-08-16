jQuery(document).ready(function() {
	var sever = '<div class="one-server"><div class="server-name"><label for="tablecell">Server Name</label><input name="server_name[]" type="text" value="Name" class="all-options" /></div> <div class="server-ip"><label for="tablecell">Server IP</label><input name="server_ip[]" type="text" value="" class="all-options" /></div> <div class="server-port"><label>Port</label><input name="server_port[]" type="text" value="25565" class="all-options" /></div> <div class="server-remove"><input type="button" value="Remove" class="creepymc_remove_server button-secondary"></div></div>';
	//jQuery('#creepymc_servers').append(sever);

    jQuery(".creepymc_add_server").live("click",function() {
        jQuery('#creepymc_servers').append(sever);
    });


    jQuery(".creepymc_remove_server").live("click",function() {
        var delserver = jQuery(this).closest('.one-server');
        delserver.remove();
       // console.log('remove');
    });

});
