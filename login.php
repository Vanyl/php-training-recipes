<?php
$postData = $_POST;

if (isset($postData['email']) && isset($postData['password'])) {
    if(!filter_var($postData['email'], FILTER_VALIDATE_EMAIL)) {
        $errorMessage  = 'L\'email doit être valide.';
    } else {
        foreach ($users as $user)  {
            if(
                $user['email'] === $postData['email']
                && $user['password'] === $postData['password']
            ) {
                // $isLogged = true;
                // $loggedUser = $postData['email']; //['email' => $user['email']];
                $_SESSION['LOGGED_USER'] = $user['email'];
            } // else {
            //     $errorMessage = 'Email ou mot de passe incorrect.';
            // }
        }

        if(!isset($SESSION['LOGGED_USER'])){
            $errorMessage = sprintf(
                'Aucun utilisateur trouvé avec les informations envoyées : (%s%s)',
                $postData['email'],
                strip_tags($postData['password'])
            );
        }
    }
}
?>


<?php if(!isset($SESSION['LOGGED_USER'])): ?> <!-- if(!isset($loggedUser)) or !$isLogged -->
    <form action="index.php" method="POST">
<!-- if not logged succesfully show error message -->
        <?php if(isset($errorMessage)) : ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $errorMessage; ?>
            </div>
        <?php endif ?>

        <div class="mb-3">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="exemple@exemple.com"/>
        </div>
        <div class="mb-3">
            <label>Password</label>
            <input type="password" id="password" name="password" />
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
<!--if logged successfuly show success message  -->
<?php else : ?>
    <div class="alert alert-success" role="alert">
        <p>Hello <?php echo $SESSION['LOGGED_USER']; ?> and welcome!</p>
    </div>
<?php endif ?>


