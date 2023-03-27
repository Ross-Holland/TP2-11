<!DOCTYPE html>
<html lang="en">

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

            <div class="Contact-box">
                <div class="contact-left">
                    <h3>Send your request</h3>
                    <form onsubmit="sendEmail(); reset(); return false;">
                        <div class="input-row">
                            <div class="input-group">
                                <label>Name:</label>
                                <input type="text" placeholder="John Sm  ith" id="name-box">
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

                        <label>Message</label>
                        <textarea rows="5" placeholder="what would you like to know?" id="message-box"></textarea>

                        <button type="submit" id="submit-button" onclick="sendEmail()">SEND</button>

                    </form>
                </div>

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
                // redirect to home page
                setTimeout(function() {
                    window.location.href = "./homepage.php";
                }, 100);
                
            }
        </script>

    </div>
</body>

</html>

<?php
include('footer.php');
?>