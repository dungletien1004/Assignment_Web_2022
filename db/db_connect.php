<?php
function connect(){
    $config = parse_ini_file('db.ini');
    $DB = mysqli_connect($config['servername'],$config['username'],$config['password'],$config['db']);
    if(!$DB){
        die("Failed to connect to database!"); 
    }
   
    return $DB;
}
?>