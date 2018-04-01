<?php
require_once("support.php");

if(isset($_POST["messageSubmit"])){
    session_start();
    $_SESSION['firstName'] = $_POST["firstName"];
    $_SESSION['lastName'] = $_POST["lastName"];
    $_SESSION['email'] = $_POST["email"];
    $_SESSION['phoneNumber'] = $_POST["phoneNumber"];
    $_SESSION['contact'] = $_POST["contact"];
    $_SESSION['message'] = $_POST["message"];
    header("Location: confirm.php");
}

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
        <div>
            <p id = "questionParagraph">Do you have a question that needs to be answered? Check our FAQ page!
            If your question has not been answered or you would like to file a complaint, feel free to contact us using the form below.</p>
        </div>
                <br>

                <form action="{$_SERVER["PHP_SELF"]}" method="post">
                <div id = "contactDiv" class = "form-group control-label col-sm-8">
                    <strong>First Name: </strong><input type="text" name="firstName" class="form-control" required placeholder="First Name">
                    <br>
                    <strong>Last Name: </strong><input type="text" name="lastName" class="form-control" required placeholder="Last Name">
                    <br>
                    <strong>Your Email: </strong><input type="email" name="email" class="form-control" placeholder="example@notreal.notreal" required>
                    <br>
                    <strong>Your Phone Number: </strong><input type="text" name="phoneNumber" class="form-control" placeholder="(555)555-5555" pattern="\([0-9]{3}\)[0-9]{3}-[0-9]{4}"><br>
                    <strong>Your Preferred Method of Contact: </strong>
                    <input type="radio" name="contact" value="email" checked> Email
                      <input type="radio" name="contact" value="phone"> Phone <br><br>
                     <strong>Your Message: </strong>
                     <textarea rows="6" cols="59" name="message"></textarea>
                     <br><br>
                     <input type="submit" class="btn btn-primary btn-lg btn-block" name ="messageSubmit" value= "Submit Message">
                     <input type="reset" class="btn btn-primary btn-lg btn-block" value= "Reset">
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