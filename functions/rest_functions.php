<?php
function callAPI($method, $title, $data){
   $curl = curl_init();
   $url = 'http://127.0.0.1:5000/recitem?title='.$title;
   $url = str_replace(" ", '%20', $url);
// Set some options - we are passing in a useragent too here
curl_setopt_array($curl, [
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => ($url),
]);
// Send the request & save response to $resp

$resp = curl_exec($curl);

// Close request to clear up some resources
curl_close($curl);

   return $resp;
}
?>