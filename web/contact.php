<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>
    
    <!-- Google Fonts (Classic Style) -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Lora:wght@400;500&display=swap" rel="stylesheet">

    <!-- External CSS -->
    <link rel="stylesheet" href="text.css" type="text/css"/>
    
    <style>
          a {
        color: #e1c699; /* Default color */
        text-decoration: none; /* Remove underline if needed */
        }
    </style>
</head>
<body>
    
    <!-- Marquee Text -->
    <marquee class="marquee" scrollamount="9" behavior="scroll" direction="left"> Welcome to My Portfolio! | Coding | Development | Projects | Contact Me </marquee>

    <!-- Navigation -->
    <div class="top-header">
        <header>
            <nav class="top-header-text">
                <a href="text.html">ABOUT ME</a>
                <a href="gallery.html">GALLERY</a>
                <a href="profile.html">PROJECTS</a>
                <a href="contact.php">CONTACT</a>
            </nav>
        </header>
    </div>

<!-- Contact Section -->
    <div class="contact" id="contact">
        <h2>Contact Me</h2>
        
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $name = htmlspecialchars($_POST['name']);
                $email = htmlspecialchars($_POST['email']);
                $message = htmlspecialchars($_POST['message']);
                
                // Example email setup (replace with your address)
                $to = "vineesh_vuppala@srmap.edu.in";
                $subject = "New Contact Form Submission from $name";
                $body = "Name: $name\nEmail: $email\n\nMessage:\n$message";

                $headers = "From: $email";

                if (mail($to, $subject, $body, $headers)) {
                    echo "<p style='color: green;'>Thank you, $name. Your message has been sent successfully!</p>";
                } else {
                    echo "<p style='color: red;'>Sorry, something went wrong. Please try again later.</p>";
                }
            }
        ?>

        <form method="POST" action="contact.php" id="contactForm">
            <input type="text" name="name" id="name" placeholder="Your Name" required><br>
            <input type="email" name="email" id="email" placeholder="Your Email" required><br>
            <textarea name="message" id="message" placeholder="Your Message" rows="5" required></textarea><br>
            <button type="submit">SUBMIT</button>
        </form>

        <div id="successMessage" style="display:none; color: green; margin-top:10px;">
            Your message has been sent!
        </div>
    </div>

    <footer class="footer">
        <p>&copy; 2025 VINEESH V | Email: <a href="mailto:vineesh_vuppala@srmap.edu.in">vineesh_vuppala@srmap.edu.in</a> | Phone: <a href="tel:9959840279">9959840279</a></p>
    </footer>

    <script>
        document.getElementById('contactForm').addEventListener('submit', function(event) {
            // Remove this if you want PHP to fully handle submissions
            //event.preventDefault(); 

            const name = document.getElementById('name').value.trim();
            const email = document.getElementById('email').value.trim();
            const message = document.getElementById('message').value.trim();
            const successMessage = document.getElementById('successMessage');

            if (name === '') {
                alert('Please enter your name.');
                return;
            }
            if (!validateEmail(email)) {
                alert('Please enter a valid email address.');
                return;
            }
            if (message === '') {
                alert('Please enter your message.');
                return;
            }

            successMessage.style.display = 'block';
        });

        function validateEmail(email) {
            const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return re.test(String(email).toLowerCase());
        }
    </script>
</body>
</html>
