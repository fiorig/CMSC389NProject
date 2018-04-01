<?php
    function generatePage($body, $title="Project3") {
        $page = <<<EOPAGE
            <!doctype html>
            <html>
                <head>
                    <meta charset="utf-8" />
                    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
                    <link rel="stylesheet" type="text/css" href="groupProj.css">
                    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

                    <title>$title</title>
                </head>
            
                <body>
                    $body
                    <script src="bootstrap/jquery-3.2.1.min.js"></script>
                    <script src="bootstrap/js/bootstrap.min.js"></script>
                </body>
            </html>
EOPAGE;
        return $page;
    }
?>