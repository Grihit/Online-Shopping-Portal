<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="bootstrap.css">
</head>
<body float="left">
<div class = "container">
    <a href="logout.php"> LOGOUT </a> 
</div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h2>Payment info</h2>
                <form action="payment.php" method="post">
                    <div class="form-group">
                        <label>First name</label>
                        <input type="text" name="first_name" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Last name</label>
                        <input type="text" name="last_name" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Card number</label>
                        <input type="text" name="card_no" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Bank name</label>
                        <input type="text" name="bank_name" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>IFSC code</label>
                        <input type="text" name="IFSC_code" class="form-control">
                    </div>
                <button type="submit" class="btn btn-primary">Make payment</button> 

                </form>
            </div>
        </div>
    </div>
</body>
</html>