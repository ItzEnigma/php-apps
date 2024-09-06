<?php

if($_SERVER["REQUEST_METHOD"] == "GET")
{
    $data = filter_input(INPUT_GET, "data", FILTER_SANITIZE_STRING);
    // output the $data result to the display area
    $data = eval("return $data;");  // has security issues allowing code injection 

    echo $data;

    /* Redirection will be done using JavaScript instead of PHP to
        write the result to the display area */
}

?>