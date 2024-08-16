<?php 

	echo $before_widget;

if ( $display_title == 1){

	echo $before_title . $title . $after_title;	
}

?>
	<?php if ( $display_title == 1){ //If display title is off, set Online status as H4; ?>

		<?php if( !$server_stats['error'] ){ ?>
			<p class="mcserver-solo-online">Online</p>
		<?php }else{ // server offline ?>
			<p class="mcserver-solo-offline">Offline</p>
		<?php } ?>

	<?php }else{ ?>

		<?php if( !$server_stats['error'] ){ ?>		
			<h4 class="mcserver-solo-online">Online</h4>
		<?php }else{ // server offline ?>
			<h4 class="mcserver-solo-offline">Offline</h4>
		<?php } ?>

	<?php } ?>
	<?php if( !$server_stats['error'] ){ ?>		
		<p class="mcplayers-solo"><strong><?php echo $server_stats['players']['online']; ?></strong>/<?php echo  $server_stats['players']['max']; ?> <span>online</span></p>
		<p class="mcip-solo"><?php creepy_print_server_ip($users_ip, $server_info['server_ip']); ?></p>
		<p class="mcversion-solo">Version: <strong>
			<?php if ($server_version != '' && isset($server_version) ) {
				echo $server_version;
			}else{
				echo $server_stats['version']['name'];
			}?></strong>
		</p>
		<p class="mcsolo-shortdescription" >
			<?php echo $server_description; ?>
		</p>
	<?php }else{ // server offline ?>
		<p class="mcplayers-solo">Generating creepers</p>
		<p class="mcip-solo"><?php creepy_print_server_ip($users_ip, $server_info['server_ip']); ?></p>
		<p class="mcversion-solo">
			<?php if ($server_version != '' && isset($server_version) ) {
				echo "Version: <strong> ".$server_version."</strong>";
			}else{
				echo "We will be back soon";
			}?>
		</p>
		<p class="mcsolo-shortdescription" >
			<?php echo $server_description; ?>
		</p>
	<?php } ?>

<?php
	echo $after_widget;

?>