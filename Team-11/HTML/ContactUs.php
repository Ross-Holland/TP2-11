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

 

            <div style="margin-left: 1em; margin: right 1em;">

                <form target = _blank action="https://formsubmit.co/m.muzaffarali2001@gmail.com" method="POST">

                    <label for="name">Name:</label>

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

                location.href = "./";

            }

        </script>

 

    </div>

</body>

 

</html>

 

<?php

include('footer.php');

?>
