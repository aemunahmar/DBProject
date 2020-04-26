<!DOCTYPE html>
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

    <!-------- dowload table's pretty design here https://colorlib.com/wp/template/fixed-header-table/-->

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

        <div class="services">
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                        <div class="section_title">Add Sales Personnel</div>
                        <div class="section_subtitle">Use the form</div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Cars in the database for dealer -->
    <div class="limiter">
        <div class="container-table100">
            <div class="wrap-table100">
                <div class="table100 ver2 m-b-110">
                    <div class="table100-head">
                        <table>
                            <thead>
                                <?php if (isset($_SESSION['ldmanager1']) || isset($_SESSION['ldmanager2'])) { ?>
                                    <tr class="row100 head">
                                        <th class="cell100 column1">Serial No.</th>
                                        <th class="cell100 column2">Model</th>
                                        <th class="cell100 column3">Color</th>
                                        <th class="cell100 column4">Autotrans</th>
                                        <th class="cell100 column5">Warehouse</th>
                                    </tr>
                                <?php } else if(isset($_SESSION['wsmanager'])) { ?>
                                    <tr class="row100 head">
                                        <th class="cell100 column1">Serial No.</th>
                                        <th class="cell100 column2">Model</th>
                                        <th class="cell100 column3">Color</th>
                                    </tr>
                                <?php } ?>
                            </thead>
                        </table>
                    </div>
                    <div class="table100-body js-pscroll">
                        <table>
                            <tbody>

                                <?php
                                    if(isset($_SESSION['ldmanager1']))
                                    {
                                        $dbconnect = mysqli_connect("127.0.0.1", "root", "csci318project", "dealer_one");
                                    }
                                    else if(isset($_SESSION['ldmanager2']))       
                                    {
                                        $dbconnect = mysqli_connect("127.0.0.1", "root", "csci318project", "dealer_two");
                                    }
                                    else if(isset($_SESSION['wsmanager']))       
                                    {
                                        $dbconnect = mysqli_connect("127.0.0.1", "root", "csci318project", "globalviews");
                                    }
                                
                                    $query1 = "SELECT * FROM cars";
                                    $output1 = $dbconnect->query($query1);
                                
                                    $query2 = "SELECT * FROM autos";    
                                    $output2 = $dbconnect->query($query2);
                                
                                    $query3 = "SELECT * FROM available_auto";    
                                    $output3 = $dbconnect->query($query3);
                                ?>

                                <?php if(($output1)){
                                        while($result = mysqli_fetch_assoc($output1)) {?>
                                        <form method=POST>
                                            <tr class="row100 body">
                                                <td class="cell100 column1"><?php echo "<input style=text-align:center; type=text name=serial_no value='".$result['serial_no']."'>"?></td>

                                                <td class="cell100 column2"><?php echo "<input style=text-align:center;type=text name=model
                                                value='".$result['model']."'>"?></td>

                                                <td class="cell100 column3"><?php echo "<input style=text-align:center;type=text name=color
                                                value='".$result['color']."'>"?></td>

                                                <td class="cell100 column4"><?php echo "<input style=text-align:center;type=text name=autotrans value='".$result['autotrans']."'>"?></td>

                                                <td class="cell100 column5"><?php echo "<input style=text-align:center; type=text name=warehouse
                                                value='".$result['warehouse']."'>"?>\</td>
                                            </tr>
                                        </form>

                                <?php  } } else if(($output2)){ 
                                        while($result = mysqli_fetch_assoc($output2)) {?>
                                        <form method=POST>
                                            <tr class="row100 body">
                                                <td class="cell100 column1"><?php echo "<input style=text-align:center; type=text name=vehicle_no value='".$result['vehicle_no']."'>"?></td>

                                                <td class="cell100 column2"><?php echo "<input style=text-align:center;type=text name=model
                                                value='".$result['model']."'>"?></td>

                                                <td class="cell100 column3"><?php echo "<input style=text-align:center;type=text name=color
                                                value='".$result['color']."'>"?></td>

                                                <td class="cell100 column4"><?php echo "<input style=text-align:center;type=text name=autotrans value='".$result['autotrans']."'>"?></td>

                                                <td class="cell100 column5"><?php echo "<input style=text-align:center; type=text name=warehouse
                                                value='".$result['warehouse']."'>"?>\</td>
                                            </tr>
                                        </form>
                                
                                <?php  } } else if(($output3)){ 
                                        while($result = mysqli_fetch_assoc($output3)) {?>
                                        <form method=POST>
                                            <tr class="row100 body">
                                                <td class="cell100 column1"><?php echo "<input style=text-align:center; type=text name=vehicle_no value='".$result['serial_no']."'>"?></td>
                                                
                                                <td class="cell100 column2"><?php echo "<input style=text-align:center;type=text name=model
                                                value='".$result['model']."'>"?></td>

                                                <td class="cell100 column3"><?php echo "<input style=text-align:center;type=text name=color
                                                value='".$result['color']."'>"?></td>
                                            </tr>
                                        </form>
                                <?php } } else { echo '<span class="login100-form-title p-b-33">No cars</span>';}?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>                   
    <footer>
        <h3>All Rights Reserved, Copyright &copy; 2020</h3>
    </footer>
</body>

</html>
