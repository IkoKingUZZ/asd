<p>
  <label>Title</label> 
  <input class="widefat" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
</p>
<p>
  <label>Display widget Title?</label> 
  <input type="checkbox" name="<?php echo $this->get_field_name('display_title'); ?>" value="1" <?php checked( $display_title, 1 ); ?> />
</p>
<p>
<label>Select server</label>
<select name="<?php echo $this->get_field_name('server'); ?>" >
	<?php
		$count = 0;
		foreach ($server_info as $server) {
			?>
			<option <?php echo $chosen_server == $count ? 'selected' : ''; ?> value="<?php echo $count; ?>"><?php echo $server['server_name']; ?></option>
		<?php $count++;
		} 
	?>
</select>
</p>
<p>
  <label>Show different IP for users [Blank if they match]</label> 
  <input class="widefat" name="<?php echo $this->get_field_name('users_ip'); ?>" type="text" value="<?php echo $users_ip; ?>" />
</p>
<p>
  <label>Hardtype Server Version [Leave blank for auto]</label> 
  <input class="widefat" name="<?php echo $this->get_field_name('server_version'); ?>" type="text" value="<?php echo $server_version; ?>" />
</p>
<p>
  <label>Server description</label> 
  <input class="widefat" name="<?php echo $this->get_field_name('server_description'); ?>" type="text" value="<?php echo $server_description; ?>" />
</p>