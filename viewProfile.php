<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Wholesale Manager Account">
    <title>My Account</title>
    <link rel="icon" type="image/png" href="images/caricon.png">
    <link rel="stylesheet" type=text/css href="styles/main.css">
    <link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="styles/util.css">
    <link rel="stylesheet" type="text/css" href="styles/style.css">
</head>

<body>
    <?php session_start(); ?>

    <header>
        <div id="logo"><a><img src="images/logo.png"></a></div>
        <nav>
            <ul>
                <?php
                    if(isset($_SESSION['customer']) || isset($_SESSION['name']))
                    {
                        echo '<li><a href="logout.php">Logout</a></li>';
                        echo '<li><a href="custAccount.html" style=text-decoration:none;>Welcome ' . $_SESSION['fname'] . '</a></li>';
                    } else if(isset($_SESSION['wsmanager']) || isset($_SESSION['ldmanager1']) || isset($_SESSION['ldmanager2']) ||                    isset($_SESSION['salesrep1']) || isset($_SESSION['salesrep2']))
                    {
                        echo '<li><a href="logout.php">Logout</a></li>';
                        echo '<li><a href="empAccount.html" style=text-decoration:none;>Welcome ' . $_SESSION['fname'] . '</a></li>';
                    } else
                    {
                        echo '<li>';
                            echo '<a style=color:red;>Sign In</a>';
                                echo '<ul class="dropdown">';
                                    echo '<li><a href="signIn.html">Customers</a></li>';
                                    echo '<li><a href="empSignin.html">Employees</a></li>';
                                echo '</ul>';
                        echo '</li>';
                        echo '<li><a href="registerPage.html">Register</a></li>';
                    }
                ?>
                <li><a>|</a></li>
                <li><a href="contactUs.html">Contact Us</a></li>
                <li><a href="findDealer.html">Find Dealer</a></li>
                <li><a href="vehicles.html">Vehicles</a></li>
                <li><a href="index.html">Home</a></li>
            </ul>
        </nav>

        <section>
            <div>
                <img class="center-top" src="images/dealership2.jpg" style="display: block; width: 100%; height: 500px; border-top: red 6px solid;">
            </div>
        </section>
    </header>
    
    <?php
        if(isset($_SESSION['salesrep1'])) 
        {
            $dbconnect = mysqli_connect("127.0.0.1", "root", "csci318project", "dealer_one");
            #$name = $_SESSION['fname'];
            $repPin = $_SESSION['emp_no'];
            
        } 
        else if (isset($_SESSION['salesrep2']))
        {
            $dbconnect = mysqli_connect("127.0.0.1", "root", "csci318project", "dealer_two");
            #$name = $_SESSION['fname'];
            $repPin = $_SESSION['emp_no'];
        }
            $query1 = "SELECT * FROM representative WHERE rep_no = '$repPin'";
            $output1 = $dbconnect->query($query1);
    
            $query2 = "SELECT * FROM sales_person WHERE sale_no = '$repPin'";
            $output2 = $dbconnect->query($query2);  
    ?>
    
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
                <form class="login100-form validate-form">
                    <?php if(($output1)){
                            while($result = mysqli_fetch_assoc($output1)) { ?>
                                <span class="login100-form-title p-b-33" style="text-decoration:underline">My Information</span>

                                <div class="wrap-input100" style="text-align:center;font-family:Montserrat;font-size:18px;font-weight:500;"> Your ID: <?php echo $result['rep_no']?></div>
                                <span class="login100-form-title p-b-33"> </span>
                                <div class="wrap-input100" style="text-align:center;font-family:Montserrat;font-size:18px;font-weight:500;"> Name: <?php echo $result['name']?> </div> 
                                <span class="login100-form-title p-b-33"> </span>
                                <div class="wrap-input100" style="text-align:center;font-family:Montserrat;font-size:18px;font-weight:500;">Address: <?php echo $result['address']?> </div>
                                <span class="login100-form-title p-b-33"> </span>
                                <div class="wrap-input100" style="text-align:center;font-family:Montserrat;font-size:18px;font-weight:500;">Phone Number: <?php echo $result['phone']?> </div>
                                <span class="login100-form-title p-b-33"> </span>
                                <div class="wrap-input100" style="text-align:center;font-family:Montserrat;font-size:18px;font-weight:500;">Base Salary: <?php echo $result['base_salary']?> </div>
                                <span class="login100-form-title p-b-33"> </span>
                                <div class="wrap-input100" style="text-align:center;font-family:Montserrat;font-size:18px;font-weight:500;">Year To Date Sales: <?php echo $result['ytd_sales']?> years</div>
                                <span class="login100-form-title p-b-33"> </span>
                                <div class="wrap-input100" style="text-align:center;font-family:Montserrat;font-size:18px;font-weight:500;">Commissions: <?php echo $result['comm']?></div>
                    
                    <?php  } } else if(($output2)){ 
                            while($result = mysqli_fetch_assoc($output2)) {?>
                                <span class="login100-form-title p-b-33" style="text-decoration:underline">My Information</span>

                                <div class="wrap-input100" style="text-align:center;font-family:Montserrat;font-size:18px;font-weight:500;"> Your ID: <?php echo $result['sale_no']?></div>
                                <span class="login100-form-title p-b-33"> </span>
                                <div class="wrap-input100" style="text-align:center;font-family:Montserrat;font-size:18px;font-weight:500;"> Name: <?php echo $result['name']?> </div> 
                                <span class="login100-form-title p-b-33"> </span>
                                <div class="wrap-input100" style="text-align:center;font-family:Montserrat;font-size:18px;font-weight:500;">Address: <?php echo $result['address']?> </div>
                                <span class="login100-form-title p-b-33"> </span>
                                <div class="wrap-input100" style="text-align:center;font-family:Montserrat;font-size:18px;font-weight:500;">Phone Number: <?php echo $result['phone']?> </div>
                                <span class="login100-form-title p-b-33"> </span>
                                <div class="wrap-input100" style="text-align:center;font-family:Montserrat;font-size:18px;font-weight:500;">Base Salary: <?php echo $result['base_salary']?> </div>
                                <span class="login100-form-title p-b-33"> </span>
                                <div class="wrap-input100" style="text-align:center;font-family:Montserrat;font-size:18px;font-weight:500;">Year To Date Sales: <?php echo $result['ytdsales']?> years</div>
                                <span class="login100-form-title p-b-33"> </span>
                                <div class="wrap-input100" style="text-align:center;font-family:Montserrat;font-size:18px;font-weight:500;">Commissions: <?php echo $result['comm']?></div>

                    <?php } } else { echo '<span class=login100-form-title p-b-33>Record Not Available </span><br><br>'; }?>
                </form>
                
            </div>
        </div>
    </div>
    
    </body>
</html>