<?php
require_once("support.php");

if(isset($_POST["messageSubmit"])){
    header("Location: submitted.php");
}
if(isset($_POST["goBack"])){
        header("Location: contactFix.php");
}
    session_start();
    $firstName = $_SESSION['firstName'];
    $lastName = $_SESSION['lastName'];
    $email = $_SESSION['email'];
    $phoneNumber = $_SESSION['phoneNumber'];
    $contact = $_SESSION['contact'];
    $message = $_SESSION['message'];

$topPart = <<<EOBODY
        <nav class="navbar-default navbar stuff" id="bar">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="toxic.php">Toxicity Calculator<span class="glyphicon glyphicon-alert"></span></a>
                </div>
                <ul class="nav navbar-nav">
                    <li><a href="toxic.php">Toxicity Calculator</a></li>
                    <li><a href="main.html">About</a></li>
                    <li><a href="faq.php">FAQ</a></li>
                    <li><a href="review.php">Reviews</a></li>
                    <li class="active"><a href="contact.php">Contact Us</a></li>

                </ul>
            </div>
        </nav>

        <h2 class = "title">Contact Us <span class="glyphicon glyphicon-envelope"></span></h2>
            <h4 class ="title"> You are about to send us the following message:</h4>
                <br>

                <form action="{$_SERVER["PHP_SELF"]}" method="post">
                <div id = "contactDiv1" class = "form-group control-label col-sm-8">
                    <strong>First Name: </strong> $firstName
                    <br>
                    <strong>Last Name: </strong> $lastName
                    <br>
                    <strong>Your Email: </strong> $email
                    <br>
                    <strong>Your Phone Number: </strong> $phoneNumber <br>
                    <strong>Your Preferred Method of Contact: </strong> $contact <br>
                     <strong>Your Message: </strong>
                     <pre>$message</pre>
                    <br>
                       <input type="submit" class="btn btn-primary btn-lg btn-block" name ="messageSubmit" value= "Confirm Submission">
                    <input type="submit" class="btn btn-primary btn-lg btn-block" name ="goBack" value= "Go Back And Edit">

                    </div>
                </form>

                 <br><br><br><br><br><br><br>
                               <br><br><br><br><br><br><br><br><br>
                               <br><br><br><br><br><br><br><br><br>
                               <br><br><br><br><br><br><br><br>

                                                <footer class="myFooter">
                                                   <p class = "footerPara2">Created by: Fiori, Mahdi, Terry, Zack</p>
                                                   <p class = "footerPara2">Contact information: <a href="mailto:fake@email.com">
                                                     fake@email.com</a>.</p>
                                                </footer>

EOBODY;



$page = generatePage($topPart);
    echo $page;
?>