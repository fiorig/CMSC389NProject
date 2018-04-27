<?php
require_once("support.php");

 $topPart = <<<EOBODY
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

<label> Enter a Username: </label> <input type = "text" id = "usernameInput">

<div id = "resultDiv"> Result:  </div>



         <br><br>

                          <footer class="myFooter">
                             <p class = "footerPara2">Created by: Fiori, Mahdi, Terry, Zack</p>
                             <p class = "footerPara2">Contact information: <a href="mailto:fake@email.com">
                               fake@email.com</a>.</p>
                          </footer>
EOBODY;

 $page = generatePage($topPart);
     echo $page;
 ?>
 <script src = "bundle.js"> </script>
