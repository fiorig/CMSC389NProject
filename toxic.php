<?php

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
      <form action="result.php" method="post" id="query">

      <fieldset >
      <h1>Test the user or users for toxicity; use their twitter username</h1><br/>
      <input type="text" size="80" name="user" id="user" placeholder="username, user1, user2"><br/>
      <input type="submit" name="submit" value="See if a user or a group of users are toxic!">
       <br><br>
      <input class="toxicButtons" type="button" value="Calculate Toxicity" id="calcButton"/>
      <input class="toxicButtons" type="button" value="Negative Tweets" id="negButton"/>
      <input class="toxicButtons" type="button" value="Positive Tweets" id="posButton"/>
      <br><br> 
      </fieldset>
      </form>

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

     echo $page;
 ?>
