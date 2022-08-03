<?php

session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: index.php");
}

include 'config.php';

if (isset($_POST["submit"])) {
    $full_name = mysqli_real_escape_string($conn, $_POST["full_name"]);
    $password = mysqli_real_escape_string($conn, md5($_POST["password"]));
    $cpassword = mysqli_real_escape_string($conn, md5($_POST["cpassword"]));

    if ($password === $cpassword) {
        $photo_name = mysqli_real_escape_string($conn, $_FILES["photo"]["name"]);
        $photo_tmp_name = $_FILES["photo"]["tmp_name"];
        $photo_size = $_FILES["photo"]["size"];
        $photo_new_name = rand() . $photo_name;

        if ($photo_size > 5242880) {
            echo "<script>alert('Photo is very big. Maximum photo uploading size is 5MB.');</script>";
        } else {
            $sql = "UPDATE users SET full_name='$full_name', password='$password', photo='$photo_new_name' WHERE id='{$_SESSION["user_id"]}'";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo "<script>alert('Profile Updated successfully.');</script>";
                move_uploaded_file($photo_tmp_name, "uploads/" . $photo_new_name);
            } else {
                echo "<script>alert('Profile can not Updated.');</script>";
                echo  $conn->error;
            }
        }
    } else {
        echo "<script>alert('Password not matched. Please try again.');</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Dashboard</title>
    
    <link rel = "stylesheet" href="./css/das.css">
    <!--  Material Icons > -->
   
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp"
      rel="stylesheet">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@48,400,0,0" />
      <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@48,400,1,0" />


</head>
<body> 
    <div class="container">

    <aside>
        <div class="top">
        <div class="logo">
        <img src="./images/logo.png">

        <h2>BAS<span class="danger">WPM</span> </h2>
       </div>

        <div class="close" id="close-btn">
        <span class="material-symbols-sharp">close </span>
        </div>
        </div>
        <div class="sidebar">

            <a href="#" class="active">
            <span class="material-symbols-sharp">dashboard</span>
            <h3>Dashboard</h3>
            </a>

            <a href="#">
            <span class="material-symbols-sharp">group</span>
            <h3>Customers</h3>
            </a>

            <a href="#">
            <span class="material-symbols-sharp">receipt_long</span>
            <h3>Orders</h3>
            </a>

            <a href="#">
            <span class="material-symbols-sharp">auto_graph</span>
            <h3>Analytics</h3>
            </a>

            <a href="#" >
            <span class="material-symbols-sharp">mail_outline</span>
            <h3>Messages</h3>
            <span class="message-count">26</span>
            </a>

            <a href="#">
            <span class="material-symbols-sharp">inventory</span>
            <h3>Products</h3>
            </a>

            <a href="#">
            <span class="material-symbols-sharp">report</span>
            <h3>Reports</h3>
            </a>


            <a href="#">
            <span class="material-symbols-sharp">settings</span>
            <h3>Settings</h3>
            </a>

            <a href="#">
            <span class="material-symbols-sharp">add</span>
            <h3>Add product</h3>
            </a>

            <a href="#">
            <span class="material-symbols-sharp">logout</span>
            <h3>Log Out</h3>
            </a>

        </div>
    </aside>


    <main>
        <h1>Dashboard</h1>
         <div class="date">
            <input type="date">
        </div>

        <div class="insights">
            <div class="sales">
            <span class="material-icons-sharp">analytics</span>
            <div class="middle">
                <div class="left">
                    <h3>Total sales</h3>
                    <h1>$25,024</h1>

                </div>
                
                <div class="progress">
                    <svg>
                        <circle cx='38' cy='38' r='36'></circle>
                    </svg>

      

                <div class="number">
                   <p>81%</p>
                   </div>
                </div>
            </div>
            <small class="text-muted">Last 24 Hours </small>
            </div>
<!----end of sales--------->

<div class="expenses">
            <span class="material-icons-sharp">bar_chart</span>
            <div class="middle">
                <div class="left">
                    <h3>Total expenses</h3>
                    <h1>$13,024</h1>

                </div>
                
                <div class="progress">
                    <svg>
                        <circle cx='38' cy='38' r='36'></circle>
                    </svg>

           

                <div class="number">
                   <p>62%</p>

                </div>     </div>
            </div>
            <small class="text-muted">Last 24 Hours </small>
            </div>
<!----end of Expenses --------->
<div class="income">
            <span class="material-icons-sharp">stacked_line_chart</span>
            <div class="middle">
                <div class="left">
                    <h3>Total sales</h3>
                    <h1>$10,024</h1>

                </div>
                
                <div class="progress">
                    <svg>
                        <circle cx='38' cy='38' r='36'></circle>
                    </svg>

               

                <div class="number">
                   <p>20%</p>

                </div>
                </div>
            </div>
            <small class="text-muted">Last 24 Hours </small>
            </div>
<!----end of income--------->
        </div>
          <div class="recent-orders">
        <h2>Employee Details </h2>
            <table>
                <thead>
                    <tr>
                        <th>Employee Name</th>
                        <th>Join Date</th>
                        <th>Address</th>
                        <th>Designation</th>
                        <th></th>
                </tr>
                </thead>
        <?php 
    //     $i = 0;

    //     $QRY = "SELECT * FROM ed_employee_setup";
    // $rsREPORT = mysqli_query($conn, $QRY);

    //     while ($ROW = mysqli_fetch_assoc($rsREPORT)) { 
    //     $i = $i + 1; 

    // $EMPLOYEE_NAME = $ROW['edesc'];
    // $GENDER=$ROW['gender_code'];
    // $JOIN_DATE=$ROW['join_date'];
    // $DESIGNATION_CODE = $ROW['ed_designation_code1'];
    // $ADDRESS=$ROW['address'];
    ?>
                <tbody>
                    <tr>

                    <td> <?php //print $EMPLOYEE_NAME; ?></td>
                    <td> <?php //print $JOIN_DATE; ?></td>
                     <td> <?php //print $ADDRESS; ?></td>
                    <td class="warning"> <?php //print $DESIGNATION_CODE; ?></td>
                    <td class="primary"> Details</td> 
                    </tr>
                <?php // } ?>
        

                </tbody>
            </table>
           <a href="#">Show All</a>
        </div>
    </main>

<!-- End of main -->

<div class="right">
    <div class="top">
        <button id="menu-btn"> 
        <span class="material-symbols-sharp">
menu_open
</span> </button>
        <div class="theme-toggler">
        <span class="material-symbols-sharp active">light_mode</span>
        <span class="material-symbols-sharp">dark_mode</span>
        </div>

        <div class="profile">
            <div class="info">
                <p>Hey, <b>Dipak </b></p>
                <small class="text-muted">Admin</small>
            </div>
            <div class="profile-photo">
                <img src="./images/dip.jpg">
            </div>
        </div>
    </div>
    <!-- End of Top -->
    <div class="recent-updates">
        <h2>Recent Updates</h2>
        <div class="updates">
            <div class="update">
                <div class="profile-photo">
                    <img src="./images/profile-2.jpg">
                </div>
                <div class="message">
                    <p><b>Kushal</b> Received his order</p>
                    <small class="text-muted">1 Minutes Ago</small>
                </div>
            </div>
        

      
            <div class="update">
                <div class="profile-photo">
                    <img src="./images/profile-3.jpg">
                </div>
                <div class="message">
                    <p><b>Janam</b> Received his order</p>
                    <small class="text-muted">5 Minutes Ago</small>
                </div>
            </div>
   

        
            <div class="update">
                <div class="profile-photo">
                    <img src="./images/profile-4.jpg">
                </div>
                <div class="message">
                    <p><b>Aasish</b> Received his order</p>
                    <small class="text-muted">7 Minutes Ago</small>
                </div>
            </div>
        </div>

        
    </div>




<!-- End of Recent Updates -->
<div class="sales-analytics">
    <h2>Sales Analytics</h2>
    <div class="item online">
        <div class="icon">
    <span class="material-symbols-sharp">
shopping_cart
</span>
</div>
    <div class="right">
        <div class="info">
            <h3>Online Orders</h3>
            <small class="text-muted">Last 24  Hours</small>
        </div>
        <h5 class="success">39%</h5>
        <h3>3849</h3>    

    </div> 
</div>


    <div class="item offline">
    <div class="icon">
    <span class="material-symbols-sharp">local_mall
</span>
        </div>
    <div class="right">
        <div class="info">
            <h3>Offline Orders</h3>
            <small class="text-muted">Last 24  Hours</small>
        </div>
        <h5 class="danger">-10%</h5>
        <h3>1110</h3>    

    </div> 
</div>

    <div class="item customers">
    <div class="icon">
    <span class="material-symbols-sharp">person
</span>
        </div>
    <div class="right">
        <div class="info">
            <h3>New Customers</h3>
            <small class="text-muted">Last 24  Hours</small>
        </div>
        <h5 class="success">20%</h5>
        <h3>800</h3>    
    </div>
    </div>
 <div class="item add-product">
    <div>
    <span class="material-symbols-sharp">add
</span>
<h3>Add Product</h3>
    </div>
 </div>    


</div>
</div>
    </div>
</body>
</html>