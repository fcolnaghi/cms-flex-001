<?php
$path = "C:\workspace\projeto\images\icons\small";

function getDirectory( $path = '.', $level = 0 ){

    $ignore = array( 'cgi-bin', '.', '..' );

    $dh = @opendir( $path );
   
    $i = 267;
    
    while( false !== ( $file = readdir( $dh ) ) )
    {
    	
        if( !in_array( $file, $ignore ) )
        {
            rename($path."\\".$file, $path."\\".$i++.".png");
        }  
    }
    closedir( $dh );
}

getDirectory( $path , 0 )

?>