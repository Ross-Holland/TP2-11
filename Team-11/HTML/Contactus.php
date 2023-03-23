<!DOCTYPE html>
<html lang="en">
<<<<<<< HEAD

=======
    
>>>>>>> 44e46c5b6a2fe394b2bef5dca83e8fc44c989862
<head>
    <?php
    include_once 'header.php';
    ?>

    <link rel="stylesheet" type="text/css" href="../CSS/contact.css" />
</head>


<body>
    <div class="content">
        <div class="container">
            <h1>Connect with us</h1>
            <p>We would love to hear about any quesries you may be having.
                <br>Feel free to get in touch.
            </p>

<<<<<<< HEAD
            <div class="Contact-box">
                <div class="contact-left">
                    <h3>Send your request</h3>
                    <form onsubmit="sendEmail(); reset(); return false;">
                        <div class="input-row">
                            <div class="input-group">
                                <label>Name:</label>
                                <input type="text" placeholder="John Smith" id="name-box">
                            </div>
                            <div class="input-group">
                                <label>Phone:</label>
                                <input type="text" placeholder="+44 1234 567890" id="phone-box">
                            </div>

                        </div>
                        <div class="input-row">
                            <div class="input-group">
                                <label>Email:</label>
                                <input type="email" placeholder="JohnSmith@gmail.com" id="email-box">
                            </div>
                            <div class="input-group">
                                <label>Subject:</label>
                                <input type="text" placeholder="product problems" id="subject-box">
                            </div>
                        </div>
=======
            <div style="margin-left: 1em; margin: right 1em;">
>>>>>>> 44e46c5b6a2fe394b2bef5dca83e8fc44c989862

                        <label>Message</label>
                        <textarea rows="5" placeholder="what would you like to know?" id="message-box"></textarea>

                        <button type="submit" id="submit-button" onclick="sendEmail()">SEND</button>

<<<<<<< HEAD
                    </form>
                </div>
=======
                    <input type="text" name="name" id="name" required>

                    <label for="email">Email:</label>

                    <input type="email" name="email" id="email" required>

                    <label for="subject">Subject:</label>

                    <input type="text" name="subject" id="subject" required>

                    <label for="message">Message</label>

                    <textarea name="message" cols="30" rows="5" ></textarea>

                    <input type="submit" value="Send" required>

                </form>

            </div>
>>>>>>> 44e46c5b6a2fe394b2bef5dca83e8fc44c989862

                <div class="contact-right">
                    <h3>How to Reach Us:</h3>

                    <table>
                        <tr>
                            <td>Email:</td>
                            <td>stepcorrect@example.com</td>
                        </tr>
                        <tr>
                            <td>Phone number:</td>
                            <td>0121 384 2864</td>
                        </tr>
                        <tr>
                            <td>Address:</td>
                            <td>Aston University, 2nd floor <br>
                                room 204, Team 11</td>
                        </tr>

                    </table>


                </div>


            </div>
        </div>
        <!-- <script src="https://smtpjs.com/v3/smtp.js"></script> -->
        <script>
            function sendEmail() {
                alert("Your email has been sent, thank you!");
<<<<<<< HEAD
                location.href = "./";
=======
                location.href = "localhost/Team-11/HTML/ContactUs.php";
>>>>>>> 44e46c5b6a2fe394b2bef5dca83e8fc44c989862
            }
        </script>

    </div>
</body>

</html>

<?php
include('footer.php');
<<<<<<< HEAD
?>
=======
?>
>>>>>>> 44e46c5b6a2fe394b2bef5dca83e8fc44c989862
