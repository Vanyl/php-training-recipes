<?php if(!isset($_SESSION['LOGGED_USER'])): ?>
    <form action="submit_login.php" method="POST">
<!-- if not logged succesfully show error message -->
        <?php if(isset($_SESSION['LOGIN_ERROR_MESSAGE'])) : ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $_SESSION['LOGIN_ERROR_MESSAGE']; 
                unset($_SESSION['LOGIN_ERROR_MESSAGE']); ?>
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
        <p>Hello <?php echo $_SESSION['LOGGED_USER']['email']; ?> and welcome!</p>
    </div>
<?php endif ?>


