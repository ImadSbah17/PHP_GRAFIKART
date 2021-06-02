<!-- 1. la logique doit toujour etre en haut afin de ne pas se perdre dans code ! -->
<?php
require_once "../php/fonctions.php";
// checkbox
$parfums = [
    'fraise' => 4,
    'Chocolat' => 5,
    'Vanille' => 3
];
// radio
$cornets = [
    'Pot' => 2,
    'Cornet' => 3
];

// checkbox
$supplements = [
    'Pépite de chocolat' => 1,
    'mars' => 5
];

$ingredients = [];
$total = 0;

if (isset($_GET['parfum'])) {
    foreach ($_GET['parfum'] as $parfum) {
        if (isset($parfums[$parfum])) {
            $ingredients[] = $parfum;
            $total += $parfums[$parfum];
             
        }
    }
}
/******* Explication *******/

// 1. Si supplement est défini (isset) alors tu rentres 
if (isset($_GET['supplement'])) {
    // 2. Pour chaque élément se trouvant dans le tableau de supplement en tant que supplement
    foreach ($_GET['supplement'] as $supplement) {
        // 3. Si dans le tableau suppléments se trouve supplement "sécurity for my url"
        if (isset($supplements[$supplement])) {
            // 4. Les supplément se mettent donc dans le tableau d'ingrédients 
            $ingredients[] = $supplement;
            // 5. Me permet d'incrémenter le montant dans le total
            $total += $supplements[$supplement];

        }
    }
}

if (isset($_GET['cornet'])) {
    $cornet = $_GET['cornet'];
    if (isset($cornets[$cornet])) {
        $ingredients[] = $cornet;
        $total += $cornets[$cornet];
             
    }
}


require 'header.php';

?> 

<h2 class="pb-3 text-center">Composer votre glace</h2>
<hr>

 
 
<div class="row">
    <div class="col-md-4">
        <h2>Votre glace</h2>
        <ul>
            <?php foreach ($ingredients as $ingredient): ?>
            <li><?= $ingredient?></li>
            <?php endforeach ?>
            <p> 
               <strong>Prix: </strong> <?= $total ?> $
            </p>
        </ul>
    
    </div>
    <div class="col-md-8">
        <form action="/jeu.php" method="GET" class="pb-4">
            <div class="form-group">
                <h2>Choississez votre parfums</h2>
                <?php foreach ($parfums as $parfum => $prix):?>
                    <div class="checkbox">
                        <label >
                            <?= checkbox('parfum',$parfum,$_GET); ?> 
                            <?= $parfum ?> - <?= $prix ?>   
                        </label>
                    </div>
                <?php endforeach;?>


                <h2> Choississez vos suppléments</h2>
                <?php foreach($supplements as $supplement => $prix): ?>
                    <div class="checkbox">
                        <label>
                            <?= checkbox('supplement',$supplement,$_GET);?>
                            <?= $supplement ?> - <?= $prix ?>
                        </label>
                    </div>  
                <?php endforeach ?>

                <h2>Choississez votre contenant</h2>

                <?php foreach ($cornets as $cornet => $prix):?>
                    <div class="checkbox">
                        <label>
                            <?= radio("cornet",$cornet,$_GET);?>
                            <?= $cornet ?> - <?= $prix ?>
                        </label>
                    
                    </div>
                <?php endforeach;?>
            </div>
            <button type="submit" class=" btn btn-primary">Composer ma glace</button>
        </form>
    </div>
</div>




<h1>$_GET</h1>
<pre>
    <?php var_dump($_GET) ?>
</pre>

<h1>$_POST</h1>
<pre>
    <?php var_dump($_POST) ?>
</pre>



<?php require 'footer.php'?>
