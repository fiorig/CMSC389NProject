<?php
require_once("support.php");
require_once("TwitterAPIExchange.php");
require_once("keys.php");
/* Authorization header setup */
$settings = array(
  'oauth_access_token' => $YOUR_ACCESS_TOKEN2,
  'oauth_access_token_secret' => $YOUR_ACCESS_SECRET2,
  'consumer_key' => $YOUR_CONSUMER_KEY2,
  'consumer_secret' => $YOUR_CONSUMER_SECRET2
);

$url = "https://api.twitter.com/1.1/search/tweets.json";
$tweets = array();
$requestMethod = 'GET';

/* Determine if user is looking for a single search or multiple people */
$user = $_POST['user'];
$array_users = explode(", ", $user);
foreach ($array_users as $k) {
    $getfield = '?q=from:';
    $getfield .= $k;

    $twitter = new TwitterAPIExchange($settings);
    $resultJSON = $twitter->setGetfield($getfield)
        ->buildOauth($url, $requestMethod)
        ->performRequest();

    $result = json_decode($resultJSON);
    foreach($result->statuses as $tweet) {
        //echo $tweet->text;
        $tweets[] = $tweet->text;
    }
}



$page = <<<EOBODY
<h1> Result  </h1>
<div id = "resultDiv"> Result </div>
EOBODY;
echo $page;
?>
<script type = "text/javascript">  var stringArray = <?php echo  json_encode($tweets); ?>;
</script>

<script src = "bundle.js"> </script>
