<?php
    $current_page = basename($_SERVER['PHP_SELF']);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = htmlspecialchars($_POST['firstname']);
    $lastname = htmlspecialchars($_POST['lastname']);
    $email = htmlspecialchars($_POST['username']);
    $country = $_POST['country'];
    $subject = $_POST['subject'];
    $message = htmlspecialchars($_POST['message']);

    // Process the data here (e.g., store in database, send email, etc.)
    echo "Thank you, $firstname, for your message!";
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beauty Insider</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/3875d6bd45.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="styles.css">
</head>
<body style="margin: 0px;">
    
        <nav >
            <div style="margin-left: 10px;">
                <img src="images/lotus.png" alt="lotus" class="lotus">
                <span>Beauty Insider</span> 
            </div>
  
            <div class="pages">
                <a href="login.php" class="<?= ($current_page == 'login.php') ? 'active-index' : ''; ?>">Login</a>
                <a href="index.php" class="<?= ($current_page == 'index.php') ? 'active-index' : ''; ?>">Home</a>
                <a href="contact.php" class="<?= ($current_page == 'contact.php') ? 'active-index' : ''; ?>">Contact</a>
            </div>
           
        </nav>
        <nav class="navbar-ms">
            <div class="pages-ms">
                <a href="index.php" class="active">Home</a> 
                <a href="make-up.php" class="active">Make-up Products</a> 
                <a href="skincare.php" class="active">Skincare Products</a> 
                <a href="contact.php" class="active">Contact</a>
            </div>
        </nav>
        <div class="contact-container">
            <form action="action_page.php">
          
            <label class="text-contact" for="fname">First Name</label>
            <div class="detail-box">
                <input class="form-box" type="text" id="fname" name="firstname" placeholder="Your name..">  
            </div>
              
            <label class="text-contact" for="lname">Last Name</label>
            <div class="detail-box">
                <input class="form-box" type="text" id="lname" name="lastname" placeholder="Your last name..">  
            </div>
             
            <label class="text-contact" for="email">Email</label>
            <div class="detail-box">
                <input class="form-box" type="text" name="username" placeholder="Username or Email" required>
            </div>
              
            <label class="text-contact" for="country">Country</label>
           
            <div class="detail-box">
                <select class="form-box" id="country" name="country">
                  <option value="australia">Australia</option>
                  <option value="canada">Canada</option>
                  <option value="usa">USA</option>
                </select>
            </div>
            <label class="text-contact" for="subject">Subject</label>
            <div class="detail-box">
                <select class="form-box" id="subject" name="subject">
                    <option value="order">Order</option>
                    <option value="payment">Payment</option>
                    <option value="Technical Problems">Technical Problem</option>
                    <option value="return">Return</option>
                  </select>
            </div>

            <label class="text-contact" for="message">Message</label>
            <div>
                <textarea class="form-box" id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>
            </div>
              
            <div>
                <button type="submit" class="contact-btn">Submit</button>
            </div>
            </form>
          </div>

        <footer class="white-section" id="footer">
            <i class="footer-icon fa-brands fa-twitter"></i> <i class="footer-icon fa-brands fa-facebook"></i> <i class="footer-icon fa-brands fa-instagram"></i> <i class="footer-icon fa-solid fa-envelope"></i>
               <p>© Copyright 2024 Denisa&Silvia</p>
         
       </footer>
       
</body>
</html>