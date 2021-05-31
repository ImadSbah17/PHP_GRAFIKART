<!-- 1. la logique doit toujour etre en haut afin de ne pas se perdre dans code ! -->
<?php
require 'header.php';
$aDeviner = 150;
$error = null;
$succes = null;
$value = null;

if (isset($_GET['chiffre'])) {
    $value = (int)$_GET['chiffre'];
    if ($value > $aDeviner) {
        $error = "votre chiffre est trop grand";
    }elseif($value < $aDeviner){
        $error = "votre chiffre est trops petit";
    }else{
        $succes = "Bravo ! vous avez deviner le chiffre <strong>$aDeviner</stong>";
    }
}
?> 

<div class="container w-50">
    <h2 class="text-center pb-2">Méthode GET</h2>
    <p class="border border-danger">Pour que les donnée mis dans le forms se retrouve sur l'url utile éventuellement pour les recherches</p>
    <pre>
        <?php var_dump($_GET);?>
    </pre>
</div>

<div class="container w-50">
    <h2 class="text-center pb-2">Méthode POST</h2>
    <p class="border border-danger">Pour que les données mis dans mon forms ne s'affiche pas dans l'url (code,donnée sensible,etc...)</p>
    <pre>
        <?php var_dump($_POST);?>
    </pre>
</div>
 
 
<!-- 2. ce que je veux afficher  -->
<div class="container w-50">

    <?php if ($error) : ?>
    <div class="alert alert-danger">
        <?= $error ?>
    </div>
    <?php elseif($succes) : ?>
    <div class="alert alert-success">
        <?= $succes ?>
    </div>
    <?php endif ?>

</div>

 

 

<form action="/jeu.php" method="GET" class="container w-50 text-center pb-4">
    <div class="form-group">
        <input type="number" class ="form-control" name="chiffre" placeholder="entre 0 et 1000" value= <?= $value?>>
    </div>
    <button type="submit" class=" btn btn-primary">Deviner</button>
</form>

<?php require 'footer.php'?>
