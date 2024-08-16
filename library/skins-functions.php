<?php

 function get_folders_name( $directory )
 {

 	$avaible_skins = array();

 	$directory .= "/magicraft/library/skins";

 	//echo "</br> Directory: ". $directory;

	//get all files in specified directory
	$files = glob($directory . "*");

	$directories = glob($directory.'/*' , GLOB_ONLYDIR);

	foreach ($directories as $folder){

		$file = $folder."/skin-settings.txt";

		if ( file_exists($file) )
		{

			$fh = fopen($file, 'r');

			$line = array();
			$skin_data = array();

			// Dont want first line
			$line = fgets($fh);
			// Need to load one line before while, so we wont save last (bad) line.
			$line = fscanf($fh, "%s\t%s\n");

			$sentinel = 1;
			while ( $sentinel == 1) {
				$skin_data[ $line[0] ] = $line[1];

				$line = fscanf($fh, "%s\t%s\n");

				// Checks if end of styles;
				if( $line[0] ==  'end;' ){
					$sentinel = 0;
				} 

			}
			fclose($fh);
			//print_r($skin_data);

			if ( array_key_exists('skin', $skin_data)  && array_key_exists('slug', $skin_data)){
			//	$nextarray['skin'] = $skin_data['skin'];
			//	$nextarray['slug'] = $skin_data['slug']; 
				$avaible_skins[ $skin_data['slug'] ] = $skin_data;
			} 

		}else{

		}
	}

	return $avaible_skins;
}

// Return currentlz avaible skins
function get_avaible_skins()
{
	$skins = get_folders_name( get_theme_root() );
	return $skins;
}

?>