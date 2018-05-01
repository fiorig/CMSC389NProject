<?php
require_once("support.php");

 $page = <<<EOBODY
 <!doctype html>
 <html>
     <head>
         <meta charset="utf-8" />
         <meta name="viewport" content="width=device-width, initial-scale=1.0" />
         <link rel="stylesheet" type="text/css" href="groupProj.css">
         <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
         <script src="toxicVal.js"></script>
         <title>Toxic Twits</title>
     </head>

     <body>
     <nav class="navbar-default navbar stuff" id="bar">
          <div class="container-fluid">
              <div class="navbar-header">
                  <a class="navbar-brand" href="toxic.php">Toxicity Calculator<span class="glyphicon glyphicon-alert"></span></a>
              </div>
              <ul class="nav navbar-nav">
                  <li class="active"><a href="toxic.php">Toxicity Calculator</a></li>
                  <li><a href="main.html">About</a></li>
                  <li><a href="faq.php">FAQ</a></li>
                  <li><a href="review.php">Reviews</a></li>
                  <li><a href="contact.php">Contact Us</a></li>
              </ul>
          </div>
      </nav>

      <br><br>
      <form action="" method="post" id="query">

      <fieldset >
 <h1 style = 'text-align: center'>Toxicity Calculator</h1>
 <div style = 'text-align: center'>
       <input type="text" size="50" name="user" id="user" placeholder="@username, user1, user2"><br/>       <br>

      <input type="submit" name="submit" value="Calculate Account(s) Toxicity">
      </div>
       <br>
      </fieldset>
      </form>
      <h3 style = 'text-align: center'> Result </h3>
      <div id = "resultDiv">  </div>


     <footer class="myFooter">
          <p class = "footerPara2">Created by: Fiori, Mahdi, Terry, Zack</p>
          <p class = "footerPara2">Contact information: <a href="mailto:fake@email.com">
                fake@email.com</a>.</p>
     </footer>
         <script src="bootstrap/jquery-3.2.1.min.js"></script>
         <script src="bootstrap/js/bootstrap.min.js"></script>
     </body>
 </html>
EOBODY;
if(isset($_POST['submit'])) {
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
  ?>

  <script type = "text/javascript">  var stringArray = <?php echo  json_encode($tweets); ?>;
  </script>

  <script src = "bundle.js"> </script>
  <?php
  //$page = <<<EOBODY
  //<h1> Result  </h1>
  //<div id = "resultDiv"> Result </div>
  //EOBODY;
}

echo $page;

 ?>
