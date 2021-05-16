<?php
$insultes = ["merde","con"];
$phrase = readline("Entrer une phrase ");
$insultes[] = $phrase; 
foreach ($insultes as $instulte ){
    if ($instulte === $phrase) {
        $replace = str_repeat("*",strlen($instulte));
        $phrase =  str_replace($instulte,$replace,$phrase);
        echo $phrase;
    }
};
?>   