<div class="wrap" id="creepy-server-settings">
	
	<div id="icon-options-general" class="icon32"></div>
	<h2>Servers settings</h2>
	
	<div id="poststuff">
	
		<div id="post-body" class="metabox-holder columns-2">
		
			<!-- main content -->
			<div id="post-body-content">
				
				<div class="meta-box-sortables ui-sortable">
					
					<div class="postbox">
					
						<h3><span>Add your servers</span></h3>
						<div class="inside">
							<p>You need to have query enabled for proper functionality. Check your server.properties and look for following line. </p>
							<code>
								enable-query=true ; 						
							</code>
							<p>Also it is verry recommended to set query.port=25565. </p>
							<p>Most hostings have it set that by default but if it's not working you can check <a href="http://magicraft.creepy.cz/?post_type=knowledge_base&p=95" target="_blank">tutorial</a> and set it yourself.</p>
							<p>If the <strong>web server is on the same network</strong> with your MINECRAFT server you HAVE TO use local IP address. You may still want to display different IP to users, that you can set in <strong>widgets</strong>.</p>

						
							<form name="creepymc_form" method="post" action="">

								<h2>Your Minecraft Servers</h2>

								<div id="creepymc_servers">
								<?php if ( !isset( $server_stats ) || $server_stats == '' || $server_stats[0] == '') { ?>

									<div class="one-server">
										<div class="server-name"><label>Server Name</label><input name="server_name[]" type="text" value="" /></div>
										<div class="server-ip"><label>Server IP</label><input name="server_ip[]" type="text" value="" /></div>
										<div class="server-port"><label>Port</label><input name="server_port[]" type="text" value="25565" /></div>									
									</div>

								<?php }else{ ?>

									<?php
									$count = 0;
									foreach ($server_info as $server) { ?>
									<div class="one-server">
										<div class="server-name"><label for="tablecell">Server Name</label><input name="server_name[]" type="text" value="<?php echo $server['server_name'];?>" /></div>
										<div class="server-ip"><label for="tablecell">Server IP</label><input name="server_ip[]" type="text" value="<?php echo $server['server_ip']; ?>" /></div>
										<div class="server-port"><label>Port</label><input name="server_port[]" type="text" value="<?php echo $server['server_port']; ?>" /></div>																			
										<?php if ($count > 0) {?>
											<div class="server-remove"><input type="button" value="Remove" class="creepymc_remove_server button-secondary"></div>
										<?php } else { $count++; } ?>

									</div>
									<?php }

								} ?>
							</div>
							
							<input class="button-primary mcserver-save" type="submit" name="save" value="Save" />
							<input class="button-secondary creepymc_add_server" type="button" value="Add Server" />

							</form>

						</div> <!-- .inside -->
					
					</div> <!-- .postbox -->

					<?php if( $debug ){ ?>
					<div class="postbox">
					
						<h3><span>code test</span></h3>
						<div class="inside">

						<code>
							<?php 
							echo 'info';
							var_dump($server_info);

							echo "list";
								var_dump($server_list);
								echo count($server_list);
								echo "stats";
								//var_dump($server_stats);

							foreach ($server_info as $server) {

								$server = mccreepy_get_server_stats( $server['server_ip']);
								var_dump($server);
								# code...
							}


							?>
						</code>


						</div> <!-- .inside -->
					
					</div> <!-- .postbox -->

					<?php } //end debug ?>
					
				</div> <!-- .meta-box-sortables .ui-sortable -->
				
			</div> <!-- post-body-content -->
			
			<!-- sidebar -->
			<div id="postbox-container-1" class="postbox-container">
				
				<div class="meta-box-sortables">
					

					<?php 
					if (count($server_stats) > 1){ ?>

					<div class="server-list">

						<?php
						$onlinePlayers = 0;
						$totalPlayers = 0;
						$offline = 1;

						foreach ($server_stats as $server) {

							if ( !$server['error']) {

								$onlinePlayers += $server['players']['online'];
								$totalPlayers += $server['players']['max'];
								// Atleast one server online
								if ($offline) {
										$offline = 0;
								}	
							}

						}
						// any server online
						if( $offline ){ ?>
							<h3 class="mcserver-offline">Currently offline</h3>
						<?php
						}else{ ?>
							<h3 class="mcserver-online">Currently Online <span class="mcplayers-header"><?php echo $onlinePlayers.'/'.$totalPlayers; ?></span></h3>
						<?php 
						}	?>

							<div class="inside">
								<ul>
								<?php $count = 0;
								foreach ($server_stats as $server) {
									?>
									<li>
										<h4><?php echo $server_info[$count]['server_name']; ?></h4>
										<?php if (  $server['error'] ){
										?>
											<p class="mcserver-small-offline">
												Offline
											</p>

										<?php
										}else{ ?>

											<p class="mcserver-small-online">Players online 
												<span class="players"><strong><?php echo $server['players']['online']; ?></strong>/<?php echo $server['players']['max']; ?></span>
											</p>

										<?php 
										} ?>
									</li>

								<?php $count++;
								} ?>

								</ul>
							</div> <!-- .inside -->

					</div> <!-- .server-list -->

						<?php
					}else{

					 ?>

					<div class="single-server">

						<h3 class="<?php echo $server_stats[0]['error'] ? 'mcserver-solo-offline' : 'mcserver-solo-online' ;?>"><?php echo $server_stats[0]['error'] ? 'Offline' : 'Online' ;?></h3>
						<div class="inside">

							<p class="mcplayers-solo"><strong><?php echo $server_stats[0]['players']['online']; ?></strong>/<?php echo $server_stats[0]['players']['max']; ?> <span>online</span></p>
							<p class="mcip-solo"><?php echo $server_info[0]['server_ip']; ?></p>
							<p class="mcversion-solo">Version of server: <strong><?php echo $server_stats[0]['version']['name']; ?></strong></p>
						</div> <!-- .inside -->

					</div> <!-- .single-server -->



					<?php
					}	?>
						
					
				</div> <!-- .meta-box-sortables -->
				
			</div> <!-- #postbox-container-1 .postbox-container -->
			
		</div> <!-- #post-body .metabox-holder .columns-2 -->
		
		<br class="clear">
	</div> <!-- #poststuff -->
	
</div> <!-- .wrap -->
