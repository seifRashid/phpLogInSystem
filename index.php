<?php include 'header.php' ?>

<!-- Login Form -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4 mx-2">
            <h2 class="text-center mt-5">Sign Up</h2>
            <form action="includes/signUp.inc.php" method="post">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter name">
                </div>
                <div class="form-group">
                    <label for="userName">User Name</label>
                    <input type="text" class="form-control" name="uid" id="email" placeholder="Enter User Name">
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="pwd" id="password" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="passwordRepeat">Password Repeat</label>
                    <input type="password" class="form-control" name="pwdRepeat" id="password" placeholder="Password">
                </div>
                <button type="submit" name="submit" class="btn btn-primary btn-block">Sign Up</button>
            </form>
        </div>
        <div class="col-md-4 mx-2">
            <h2 class="text-center mt-5">Login</h2>
            <form action="includes/logIn.inc.php" method="post">
                <div class="form-group">
                    <label for="email">User Name</label>
                    <input type="text" class="form-control" name="uid" id="email" placeholder="Enter User Name">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="pwd" id="password" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Login</button>
            </form>
        </div>
    </div>
</div>

<?php include 'footer.php' ?>