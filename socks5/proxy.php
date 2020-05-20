<?php
session_start();
$p = explode(":", $_GET['proxy']);
$portcheck = @fsockopen($p[0], $p[1], $errno, $errstr, 5);
if(is_resource($portcheck)){
fclose($portcheck);
if(isset($_GET['proxy'])){
}else{
exit();
}
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/tokens');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_PROXY, trim($_GET['proxy']));
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS5);
curl_setopt($ch, CURLOPT_POSTFIELDS, "card[number]=4242424242424242&card[exp_month]=12&card[exp_year]=2020&card[cvc]=314");
curl_setopt($ch, CURLOPT_USERPWD, 'sk_test_0MToxCsK7Hlg5BAo455ttDRy00A7CbWaz6' . ':' . '');
curl_setopt($ch, CURLOPT_TIMEOUT, 5);
$s = json_decode(curl_exec($ch), true);
}else{
echo '<tr><td><span class="badge badge-danger">DEAD</span></td><td>'.$_GET['proxy'].'</td><td>The <span class="badge badge-success"></span> Port was closed</td></tr>';
}
if(isset($s["id"])){
if(!substr_count(file_get_contents('proxies.txt'), $_GET['proxy']) > 0){
  fwrite(fopen("proxies.txt", 'a'), $_GET['proxy']."\n");
  }
echo '<tr><td><span class="badge badge-success">LIVE</span></td><td>'.$_GET['proxy'].'</td><td>The Host <span class="badge badge-success"></span> returned a status of 200 OK</td></tr>';

}else{
echo '<tr><td><span class="badge badge-danger">DEAD</span></td><td>'.$_GET['proxy'].'</td><td>The Host <span class="badge badge-danger"></span> returned an error</td></tr>';
}
var_dump($s);
?>