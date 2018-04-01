<?php
    require_once("support.php");

    $topPart = <<<EOBODY
        <nav class="navbar-default navbar stuff" id="bar">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <a class="navbar-brand" href="toxic.php">Toxicity Calculator<span class="glyphicon glyphicon-alert"></span></a>
                        </div>
                        <ul class="nav navbar-nav">
                        <li><a href="toxic.php">Toxicity Calculator</a></li>
                            <li><a href="main.html">About</a></li>
                            <li class="active"><a href="faq.php">FAQ</a></li>
                            <li><a href="review.php">Reviews</a></li>
                            <li><a href="contact.php">Contact Us</a></li>

                        </ul>
                    </div>
                </nav>

                <h2 class = "title">FAQ <span class="glyphicon glyphicon-bullhorn"></span>
</h2>
                <div id= "faqDiv">
                <strong>Are you guys students?</strong>
                <br>
                <p>Yes.</p>
                <strong>What class is this for?</strong>
                                                <br>
                                                <p>CMSC389N.</p>
                <strong>Who is your professor?</strong>
                <br>
                <p>Nelson Padua-Perez.</p>
                <strong>Who are the members in your group?</strong>
                                <br>
                                <p>Fiori, Mahdi, Terry, Zack.</p>
                <strong>Can I file a complaint?</strong>
                <br>
                <p>Yes, click on the &quot;Contact Us &quot; button on the navigation bar above.</p>
                <strong>Can I ask a question that has not been answered here?</strong>
                <br>
                <p>Yes, click on the &quot;Contact Us &quot; button on the navigation bar above.</p>
                <strong>Does this work for websites other than Twitter?</strong>
                <br>
                <p>No, currently our website only evaluates tweets from Twitter. We may expand and work
                with other social media sites in the future.</p>
                <strong>Wow your website is so cool. You guys deserve an A on this project.</strong>
                                <br>
                                <p>Yeah we know.</p>
                                <strong>Do I have to pay in order to use the Toxicity Calculator?</strong>
                                                                <br>
                                                                <p>Nope. It is completely free.</p>
                                                                <strong>When will this project be due?</strong>
                                                                <br>
                                                                <p>Good question. Tuesday, May 1st at 9:30 am.</p>
                                                                </div>
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