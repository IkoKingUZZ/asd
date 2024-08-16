<p>
  <label>Title</label> 
  <input class="widefat" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
</p>
<p>
  <label>Display widget Title?</label> 
  <input type="checkbox" name="<?php echo $this->get_field_name('display_title'); ?>" value="1" <?php checked( $display_title, 1 ); ?> />
</p>
<p>
<fieldset>
	<legend><span>Select Servers to Show</span></legend>
	<?php $count = 0;
	foreach ($server_info as $server) { ?>

	<p>
		<label for="<?php echo $this->get_field_name('server'.$count); ?>">
			<input name="<?php echo $this->get_field_name('server'.$count); ?>" type="checkbox" id="users_can_register" value="1" <?php echo in_array( $count, $chosen_servers ) ? 'checked' : ''; ?> />
			<?php echo $server['server_name']; ?>		
		</label>
	</p>
	<p>
	  <label>Show different IP for users [Blank if they match]</label> 
	  <input class="widefat" name="<?php echo $this->get_field_name('custom_ip'.$count); ?>" type="text" value="<?php echo $custom_ips[$count]; ?>" />
	</p>

	<?php $count++; } ?>
</fieldset>

