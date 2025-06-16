<?php 
    session_start();
    require_once(__DIR__ . '/config/mysql.php');
    require_once(__DIR__ . '/databaseconnect.php');
    require_once(__DIR__ . '/variables.php'); 
    require_once(__DIR__ . '/functions.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipes from the Middle-Earth</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="d-flex flex-column min-vh-100">
    <div class="container">    
        <?php require_once(__DIR__ . '/header.php'); ?>
        <h1>Recipes from the Middle-Earth</h1>

        <?php require_once(__DIR__ . '/login.php'); ?>

        <?php foreach(getRecipes($recipes) as $recipe) : ?>
            <article>
                <h3><?php echo $recipe['title']; ?></h3>
                <div><?php echo $recipe['recipe']; ?></div>
                <span><?php echo displayAuthor($recipe['author'], $users); ?></span>
                <?php if(isset($_SESSION['LOGGED_USER'])): ?>
                    <ul class="list-group list-group-horizontal">
                        <li class="list-group-item"><a class="link-warning" href="recipes_update.php?id=<?php echo($recipe['recipe_id']); ?>">Edit</a></li>
                        <li class="list-group-item"><a class="link-danger" href="recipes_delete.php?id=<?php echo($recipe['recipe_id']); ?>">Delete</a></li>
                    </ul>
                <?php endif; ?>
            </article>
        <?php endforeach ?>

    </div>
    <?php require_once(__DIR__ . '/footer.php'); ?>
</body>

</html>