<?php


function repondre_oui_non(string $phrase):bool {
    while(true){
        $reponse = readline("$phrase - (o)ui/(n)on : ");
        if ($reponse === "o") {
            return true;
        }elseif($reponse === "n"){
            break;
        }
    }
}


function demander_creneau( string $phrase = "Veuillez entrer un créneau"):array{
     echo $phrase . "\n";
 
     while (true) {
        $ouverture = (int)readline("Veuillez rentrer un heure d'ouverture: ");
        if ($ouverture >= 0 && $ouverture <= 23) {  
            break;
        } 
    }
     
    
    while (true) {
        $fermeture = (int)readline("Veuillez rentre une heure de fermeture: ");
        if ($fermeture >= 0 && $fermeture <=23 && $fermeture > $ouverture) {
            break;
        } 
    }
    return [$ouverture,$fermeture];
      

}



function demander_creneaux(){
    $creneaux = [];
    $continuer = true;
    while($continuer) {
        $creneaux[] = demander_creneau();
        $continuer = repondre_oui_non('Voulez vous continuer ?');
    }
    return $creneaux;
}


$creneaux = demander_creneaux();
var_dump($creneaux);

// $creneau1 = demander_creneau();

?>