<?php
    // this is contact page .
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical Billing System</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
<?php require("navbar.php"); ?>

    <main class="contact-main">
        <div class="contactUs-contentbox">
            <div class="content">
                <div class="left-side">
                    <div class="address-details" style="padding-left: 80px;">
                        <!-- <i class="fas fa-map-marker-alt"></i> -->
                        <img src="Images/google-maps.png" alt="" width="60px" height="60px">
                        <div class="topic">Address</div>
                        <div class="text-one">Radhe park B-127</div>
                        <div class="text-two">Varachha Main Road,Surat</div>
                    </div>
                    <div class="phone details">
                        <!-- <i class="fas fa-phone-alt"></i> -->
                        <img src="Images/telephone.png" alt="" width="60px" height="60px">
                        <div class="topic">Phone</div>
                        <div class="text-one" >+91 98934 55647</div>
                        <div class="text-two" >+91 93434 56578</div>
                    </div>
                    <div class="email details">
                        <!-- <i class="fas fa-envelope"></i> -->
                        <img src="Images/gmail.png" alt="" width="60px" height="60px">
                        <div class="topic">Email</div>
                        <div class="text-one" >rhythmmedical@gmail.com</div>
                        <div class="text-two" >info.rhythmmedical@gmail.com</div>
                    </div>
                </div>
                <div class="right-side">
                    <div class="topic-text">Send us a message</div>
                    <p>If you have any problem regarding medical service, you can send me message from here. It's my
                        pleasure to help you.</p>
                    <form action="#">
                        <div class="input-box">
                            <input type="text" placeholder="Enter your name" />
                        </div>
                        <div class="input-box">
                            <input type="text" placeholder="Enter your email" />
                        </div>
                        <div class="input-box message-box">
                            <textarea placeholder="Enter your message"></textarea>
                        </div>
                        <div class="button">
                            <input type="button" value="Send Now" />
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </main>

    <?php require("footer.php"); ?>
</body>

</html>