<html>
    <head>
        <title>Oops! System Encountered some error(s)</title>
        <style type="text/css">
            * {
                margin: 0;
                padding: 0;
            }
            .wrapper {
                text-align: center;
                padding: 0;
                margin: 0 auto;
                width: 600px;
                border-radius: 5px;
                margin-top: 15%;
                padding: 10px;
                text-shadow: 1px 1px 1px rgba(78, 78, 80, 1);
                -webkit-box-shadow: 2px 5px 7px rgba(50, 50, 50, 0.75);
                -moz-box-shadow: 2px 5px 7px rgba(50, 50, 50, 0.75);
                box-shadow: 2px 5px 7px rgba(50, 50, 50, 0.75);
                font-family: Consolas, "Andale Mono", "Lucida Console", "Lucida Sans Typewriter", Monaco, "Courier New", monospace;
                background: rgb(217, 217, 219);
                background: -moz-linear-gradient(89deg, rgb(217, 217, 219) 30%, rgb(152, 161, 163) 100%);
                background: -webkit-linear-gradient(89deg, rgb(217, 217, 219) 30%, rgb(152, 161, 163) 100%);
                background: -o-linear-gradient(89deg, rgb(217, 217, 219) 30%, rgb(152, 161, 163) 100%);
                background: -ms-linear-gradient(89deg, rgb(217, 217, 219) 30%, rgb(152, 161, 163) 100%);
                background: linear-gradient(179deg, rgb(217, 217, 219) 30%, rgb(152, 161, 163) 100%);

            }
            .header {
                text-align: center;
                font-weight: bold;
                border-bottom: 2px solid #575757;
                padding-top: 10px;
             
            }
            .desc{
                text-align: center;
                border:2px dashed #575757 ;
                margin-top:10px;
                padding:5px;
                color:red;
               
            }
        </style>
    </head>
    <body class="login">
        <?php
        if (isset($error_name) && isset($folder)) {
            echo '<div class="wrapper">Please Fix the Following Errors
  <div class="desc">' . $error_name . ' File not found in ' . $folder . '</div>
</div>';
        } elseif ($custom_error_name) {
            echo '<div class="wrapper">Please Fix the Following Errors
  <div class="desc">' . $custom_error_name . ' in ' . $folder . '</div>
</div>';
        }
        ?>
    </body>
</html>