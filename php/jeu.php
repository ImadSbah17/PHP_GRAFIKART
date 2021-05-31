<!-- 1. la logique doit toujour etre en haut afin de ne pas se perdre dans code ! -->
<?php
require 'header.php';
$aDeviner = 150;
$error = null;
$succes = null;
$value = null;

if (isset($_GET['chiffre'])) {
    if ($_GET['chiffre'] >  $aDeviner) {
        $error = "votre chiffre est trop grand";
    }elseif($_GET['chiffre'] < $aDeviner){
        $error = "votre chiffre est trops petit";
    }else{
        $succes = "Bravo ! vous avez deviner le chiffre <strong>$aDeviner</stong>";
    }
    $value = (int)$_GET['chiffre'];
}
?> 

 
<pre class="container w-50 text-center">
   <?php var_dump($_GET);?>
</pre>
 
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
