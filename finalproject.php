<!DOCTYPE html>
<html> 
<body style='background-color:pink'> 
  <head>
    <title>Pig Latin Translator</title>
  </head>


  <body>

    <h1>Translate an english word into Pig Latin</h1>
    <p>Enter ONLY ONE WORD into the following box and hit submit to translate the word into Pig Latin!</p>

    <?php
       // define variables and set to empty values
       $arg1 = $output = $retc = "";
       if ($_SERVER["REQUEST_METHOD"] == "POST") {
         $arg1 = test_input($_POST["arg1"]);
         exec("/usr/lib/cgi-bin/student3/pigL " . $arg1, $output, $retc); 
       }
       function test_input($data) {
         $data = trim($data);
         $data = stripslashes($data);
         $data = htmlspecialchars($data);
         return $data;
       }
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      Arg1: <input type="text" name="arg1"><br><br>
      <input type="submit">
    </form>

    <?php
       echo "<h2>Your Input:</h2>";
       echo $arg1;
       echo "<br>";
       echo "<h2>C Program Output (an array):</h2>";
       foreach ($output as $line) {
         echo $line;
         echo "<br>";
       }
       
       echo "<h2>C Program Return Code:</h2>";
       echo $retc;
      
     ?>
    
  </body>
</html>
