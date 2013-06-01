<?php

     //This file should be placed in private_html directory  (i.e. outside web folder) to keep passwords secure

    if (!isset($g_link)) {
        $g_link = false;
    }
    
    function GetMyConnection()
    {
        global $g_link;
        if( $g_link )
            return $g_link;
        $g_link = mysql_connect( 'localhost', 'mjlh', 'vacovEwCol') or die('Could not connect to server.' );
        mysql_select_db('mjlh', $g_link) or die('Could not select database.');
        return $g_link;
    }
    
    function CloseMyConnection()
    {
        global $g_link;
        if( $g_link != false )
            mysql_close($g_link);
        $g_link = false;
    }
    
    //AES encryption string for backend passwords
    $AES_key = "'breer-key'";
?>
