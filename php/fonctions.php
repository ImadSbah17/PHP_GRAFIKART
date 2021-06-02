<?php

function nav_item(string $lien, string $titre, string $linkClass =''): string
{
  $classe = 'nav-item';
  $classeForLinks = 'nav-link';

  if ($_SERVER['SCRIPT_NAME'] === $lien) {

    $classe .= " active";
    $classeForLinks .= " text-danger";
  }

  return <<<HTML
  <li class="$classe">
    <a class="$linkClass ml-3  " href="$lien"> $titre</a>
 </li>
HTML;
}

function nav_menu(string $linkClass = ''):string {
    return 
        nav_item('/index.php','Accueil', $linkClass) .    
        nav_item('/contact.php','Contact', $linkClass).
        nav_item('/jeu.php','Jeu', $linkClass);
 };


//  checkbox('parfum',$parfum,$_GET); 


 function checkbox (string $name,string $value, array $data):string {
  $attribute = "";
  if (isset($data[$name]) && in_array($value,$data[$name])) {
    $attribute .= 'checked';   
  }
  return <<<HTML
  <input type="checkbox" name="{$name}[]" value="$value" $attribute> 
HTML;
}

function radio (string $name,string $value, array $data):string {
  $attribute = "";
  if (isset($data[$name]) &&  $value === $data[$name]) {
    $attribute .= 'checked';   
  }
  return <<<HTML
  <input type="radio" name="{$name}" value="$value" $attribute> 
HTML;
}

 
 
