<?php
	$hostname = "oniddb.cws.oregonstate.edu";
        $user = "";
        $pass = "";
        $database = "leweyk-db";
        
	if( !mysql_connect( $hostname, $user, $pass ) ) {
            die("Connection to database server failed.");
        }

        if( !mysql_selectdb( $database ) ) {
            die("Unable to select " . $database . " database" );
        }
?>
