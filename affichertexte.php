<?php
$recipes = [
    [
        'title' => 'Cassoulet',
        'recipe' => 'Etape 1 : des flageolets !',
        'author' => 'mickael.andrieu@exemple.com',
        'is_enabled' => true,
    ],
    [
        'title' => 'Couscous',
        'recipe' => 'Etape 1 : de la semoule',
        'author' => 'mickael.andrieu@exemple.com',
        'is_enabled' => false,
    ],
    [
        'title' => 'Escalope milanaise',
        'recipe' => 'Etape 1 : prenez une belle escalope',
        'author' => 'mathieu.nebra@exemple.com',
        'is_enabled' => true,
    ],
];


?>

<!DOCTYPE html>
<html>
    <head>
        <title>Recettes</title>
    </head>
    <body>
        <h1>Affichage des recettes</h1>
        <?php foreach ($recipes as $recipe) : ?>
            <?php if (array_key_exists('is_enabled', $recipe) && $recipe['is_enabled']) : ?>
                <h1><?php echo $recipe['title'] ?></h1>
                <p><?php echo $recipe['recipe'] ?></p>
                <p><em><?php echo $recipe['author'] ?></em></p>
            <?php endif ?>
        <?php endforeach ?>
    </body>
</html>