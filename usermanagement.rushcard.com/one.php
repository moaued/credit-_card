<?php

// The blacklisted ips.
$denied_ips = array(
    '1.2.3.4',
    '2.3.*',
    );
    
    // The function to get the visitor's IP.
    function getUserIP(){
        //check ip from share internet
        if (!empty($_SERVER['HTTP_CLIENT_IP'])){
          $ip=$_SERVER['HTTP_CLIENT_IP'];
        }
        //to check ip is pass from proxy
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
          $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
          $ip=$_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }
    //The user
    $visitorIp = getUserIP();
    
    // Now let's search if this IP is blackliated
    $status = array_search($visitorIp, $denied_ips);
    
    // Let's check if $status has a true OR false value.
    if($status !== false){
        echo '<div class="error">Your IP has been banned! Stop spamming us!</div>';
        // header("Location: http://zombo.com");
        // exit; 
    }
    ?>