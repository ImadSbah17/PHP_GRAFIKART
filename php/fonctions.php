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
    <a class="$linkClass " href="$lien"> $titre</a>
 </li>
HTML;
}

function nav_menu(string $linkClass = ''):string {
    return 
        nav_item('/index.php','Accueil', $linkClass) .    
        nav_item('/contact.php','Contact', $linkClass);
}

?>
