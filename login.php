<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="bootstrap.css">
</head>
<body>
    <div class="container">
        <br>
        <h2 align = "center">Welcome to Online Furniture Shopping</h2>
        <hr>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h2>Login</h2>
                <form action="validation.php" method="post">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary">Login</button> 

                </form>
            </div>

            <div class="col-lg-6">
                <h2>Sign up</h2>
                <form action="registration.php" method="post">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Email id</label>
                        <input type="text" name="email" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Mobile no</label>
                        <input type="number" name="mobile_no" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="address1" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Alternate Address(not required)</label>
                        <input type="text" name="address2" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary">Sign up</button> 

                </form>
            </div>

            
            
        </div>
    </div>
</body>
</html>