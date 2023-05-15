<?php

    
    $errorName="";
    $errorMail="";
   

    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $mail = $_POST['mail'];
        $subject = $_POST['subject'];
		$sendCard = $_POST['sendCard'];
        $message = htmlspecialchars($_POST['message']);
        $connection = mysqli_connect('shareddb-l.hosting.stackcp.net', 'kate', 'montezuma*', 'sunnyandkate-39390eac');

        $name = mysqli_real_escape_string($connection, $name);
        $mail = mysqli_real_escape_string($connection, $mail);


        if(empty($_POST['name'])){
            $errorName= 'name is required';
        }
        else if(empty($_POST['mail'])){
            $errorMail = 'email is required';

        }else{
        

        $mailTo = $sendCard;
        $headers = "From: " .$mail;
        
       
        mail($mailTo, $subject, $message, $headers);
        header('Location: mail_send.php');
        

        $query = "INSERT INTO contact (name, mail, subject, sendCard, message) ";
        $query .= "VALUES ('$name', '$mail', '$subject', '$sendCard', '$message')";
        $contact_mail = mysqli_query($connection, $query);
        }
    
    }


?>
<?php include "includes/header.php"; ?>
    <img src="images/waterfall.jpg" alt="header-image" class="header-img"/>
  

    <div class="main-container">
        <p class="contact-text">feel free to contact me for business inquries or to just say hello</p>
        <form class="contact-form" action="sendcards.php" method="post">
            <input type="text" name="name" placeholder="your name">
                <span class="red-text"><?php echo $errorName; ?></span>
            <input type="text" name="mail" placeholder="your email">
                <span class="red-text"><?php echo $errorMail; ?></span>
            <input type="text" name="subject" placeholder="subject">
			<input type= "text" name="sendCard" placeholder="send to">
            <textarea name="message" cols="30" rows="10" placeholder="your message"></textarea>
            <div class="agree">
                <input class="check" type="checkbox" required>
                <div class="checkbox">I agree to the <a href="privacypolicy.php">privacy policy</a></div>
            </div>
            <button class="submit-btn" type="submit" name="submit">send mail</button>
        </form>
    </div>

	<button class="logout-btn"><a href="includes/logout.php">logout</a></button>
<
<?php include "includes/footer.php"; ?>



