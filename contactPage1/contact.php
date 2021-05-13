<?php include 'contactForm.php'; ?>
<!DOCTYPE html>
    <html>
        <head>
          <meta charset="utf-8">
            <title>Contact Form</title>
            <link rel="stylesheet" href="styles.css">
        </head>
    <body>

	<?php echo $alert; ?>
	
        <div>

	
            <p>SEND E-MAIL</p>
                <form class ="contact-form" action="" method="post">
                    <input type="text" name="name" placeholder="Full name">
                    <input type="text" name="mail" placeholder="Your E-mail">
                    <input type="text" name="subject" placeholder="Subject">
                    <textarea name="message" rows="5" placeholder="Message"></textarea>
                   <input type="submit" name="submit" class="send-btn" value="Send">
                </form>
        </div>

      <script type="text/javascript">
        if(window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>

    </body>
</html>
