<?php
// Start the session
session_start();

// Check if the success message is set
if (isset($_SESSION['success_message'])) {
    echo '<script>alert("' . $_SESSION['success_message'] . '");</script>';

    // Unset the session variable to clear the message
    unset($_SESSION['success_message']);
}

// Check if the success parameter is set
if (isset($_GET['inquiry_success'])) {
    echo '<script>alert("Inquiry submitted successfully!");</script>';
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Hand Aid</title>
        <style>
            body {
                font-family: monospace;
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                margin-top: -10px; /* Add margin to prevent content from being hidden behind the fixed header */
                transition: font-size 0.5s;
            }
            .fixed-font-size {
                position: fixed;
                top: 10px; /* Adjust the positioning as needed */
                left: 10px; /* Adjust the positioning as needed */
            }
   
            header {
                background-color: #1929bc;
                color: #fff;
                padding: 13px;
                display: flex;
                justify-content: space-between;
                align-items: center;
                position: fixed;
                width: 99%;
                z-index: 5;
            }
            footer {
                background-color: #1929bc;
                color: white;
                text-align: center;
                padding: 10px;
                position: relative;
            }
            .logo {
                font-size: 24px;
                font-weight: bold;
                position: relative;
                display: flex;
                align-items: center;
            }
   
            .menu-icon {
                font-size: 24px;
                cursor: pointer;
                padding: 5px;
                margin-right: 10px; /* Add margin to separate the menu icon from the logo */
            }
   
            .navigation {
                display: flex;
                gap: 90px;
            }
   
            .navigation a {
                text-decoration: none;
                color: #fff;
                font-weight: bold;
                font-size: 18px;
                transition: color 0.3s;
            }
   
            .navigation a:hover {
                color: #ddd;
            }
   
            .sidebar {
                height: 100vh;
                width: 250px;
                background-color: #5d6cf5;
                position: fixed;
                left: -250px;
                top: 56px;
                padding-top: 20px;
                color: #fff;
                transition: left 0.3s;
                overflow-y: auto;
            }
   
            .sidebar a {
                display: block;
                padding: 15px;
                text-decoration: none;
                color: #fff;
                transition: background 0.3s;
            }
   
            .sidebar a:hover {
                background-color: #555;
            }
   
            /* Media query for smaller screens */
            @media screen and (max-width: 768px) {
                .sidebar {
                    left: -100%;
                }
   
                .menu-icon {
                    left: 10px;
                }
            }
           
            .apply {
                text-align: center;
                font-size: 42px;
            }
            .apply button{
                width: 200px;
                border-radius: 10px;
                background-color: #1929bc;
                transition: background 0.5s;
                color: white;
                cursor: pointer;
            }
            .apply button:hover {
                background-color:  rgb(107, 228, 59);
            }
            .image1{
                position: relative;
                display: flex;
                justify-content: center;
                align-items: center;
            }
            .image1 img{
                width: 1450px;
                z-index: -1;
            }
            .quote{
                font-size: 50px;
                position: absolute;
                text-align: center;
                background-color: rgba(15, 221, 42, 0.458);
                width: 1450px;
                height: 150px;
                color: white;
                z-index: -1;
            }
            .quote p{
                text-align: left;
            }
            .about{
                text-align: center;
                font-size: 25px;
            }
   
            /* Style for a custom scrollbar */
            .sidebar::-webkit-scrollbar {
                width: 12px;
            }
   
            .sidebar::-webkit-scrollbar-thumb {
                background-color: #555;
                border-radius: 10px;
            }
   
            .sidebar::-webkit-scrollbar-track {
                background-color: #1929bc;
            }
            .applypopup{
            margin: 0px;
            padding: 0px;
            box-sizing: border-box;
            position: absolute;
            top:-150%;
            left:50%;
            opacity: 0;
            transform:translate(-50%,-50%) scale(1.25);
            width:480px;
            padding:20px 30px ;
            background: white;
            box-shadow: 2px 2px 5px 5px rgba(0,0,0,0.15);
            border-radius: 10px;
            transition: top 0ms ease-in-out 200ms,
                        top 200ms ease-in-out 0ms,
                        top 20ms ease-in-out 0ms;
            }
            .applypopup.active{
            top:50%;
            opacity:1;
            position: fixed;
            z-index: 1;
            transform:translate(-50%,-50%) scale(1.25);
            transition: top 0ms ease-in-out 0ms,
                        top 200ms ease-in-out 0ms,
                        top 20ms ease-in-out 0ms;
            }
            .applypopup .close-btn{
            position: absolute;
            top:10px;
            right:10px;
            width:30px;
            height:30px;
            background: red;
            color: #eee;
            text-align: center;
            line-height:15px;
            border-radius:15px;
            cursor:pointer;
            font-size:25px;
            }
            .applypopup .formm input{
            margin:3px 0px;
            }
            .applypopup .formm label{
            font-size:14px;
            }
            .applypopup .formm button{
            margin:15px 0px;
            width:100%;
            height:40px;
            border:none;
            outline:none;
            font-size:18px;
            background: rgb(107, 228, 59);
            color: #1929bc;
            border-radius: 10px;
            cursor: pointer;
            transition: background 0.5s;
            }
            .applypopup .formm button:hover{
                background-color: #1929bc;
                color: rgb(107, 228, 59);
            }
            .applypopup .formm input[type="text"],
            .applypopup .formm input[type="email"],
            .applypopup .formm input[type="tel"]{
            margin-top:3px;
            display:block;
            width: 95%;
            padding:10px;
            outline: none;
            border: 1px solid #aaa;
            border-radius: 5px;
            }
            /*---------------------------------------------------*/
            .inqpopup{
            margin: 0px;
            padding: 0px;
            box-sizing: border-box;
            position: absolute;
            top:-150%;
            left:50%;
            opacity: 0;
            transform:translate(-50%,-50%) scale(1.25);
            width:480px;
            padding:20px 30px ;
            background: white;
            box-shadow: 2px 2px 5px 5px rgba(0,0,0,0.15);
            border-radius: 10px;
            transition: top 0ms ease-in-out 200ms,
                        top 200ms ease-in-out 0ms,
                        top 20ms ease-in-out 0ms;
            }
            .inqpopup.active{
            top:50%;
            opacity:1;
            position: fixed;
            z-index: 1;
            transform:translate(-50%,-50%) scale(1.25);
            transition: top 0ms ease-in-out 0ms,
                        top 200ms ease-in-out 0ms,
                        top 20ms ease-in-out 0ms;
            }
            .inqpopup .close-btn2{
            position: absolute;
            top:10px;
            right:10px;
            width:30px;
            height:30px;
            background: red;
            color: #eee;
            text-align: center;
            line-height:15px;
            border-radius:15px;
            cursor:pointer;
            font-size:25px;
            }
            .inqpopup .formm2 input{
            margin:3px 0px;
            }
            .inqpopup .formm2 label{
            font-size:14px;
            }
            .inqpopup .formm2 button{
            margin:15px 0px;
            width:100%;
            height:40px;
            border:none;
            outline:none;
            font-size:18px;
            background: rgb(107, 228, 59);
            color: #1929bc;
            border-radius: 10px;
            cursor: pointer;
            transition: background 0.5s;
            }
            .inqpopup .formm2 button:hover{
                background-color: #1929bc;
                color: rgb(107, 228, 59);
            }
            .inqpopup .formm2 input[type="text"],
            .inqpopup .formm2 input[type="email"],
            .inqpopup .formm2 input[type="tel"]{
            margin-top:3px;
            display:block;
            width: 95%;
            padding:10px;
            outline: none;
            border: 1px solid #aaa;
            border-radius: 5px;
            }
            .inqpopup textarea {
                height: 50px;
                box-sizing: border-box;
                width: 100%;
            }
            .about {
                position: relative;
                left: 10%;
                width: 80%;
                text-align: center;
                background: linear-gradient(to right, rgba(107, 228, 59, 0.7), #0078d4, rgba(107, 228, 59, 0.7));
                padding: 20px;
                border-radius: 30px;
                color: #333; /* Adjust the text color for better contrast */
            }

           
            .abt{
                position: relative;
                top: 10%;
                left: 50%;
                transform: translate(-50%, -50%);
                width: 650px;
                height: 150px;
                text-align: center;
                font-size: 25px;
            }
            .abt p{
                top: 50%;
                left: 50%;
                position: relative;
                transform: translate(-50%, -50%);
            }
            .side-by-side-p {
                flex: 1;
                text-align: justify;
                text-justify: inter-word;
                max-width: 650px; /* Adjust the maximum width as needed */
                letter-spacing: .5px;
                word-spacing: .5px;
                margin: 0 auto;
                padding: 15px;
                border-radius: 30px;
                color: #333;
            }
            .q1{
                position: inherit;
                top: 89%;
                left: 15%;
                width: 50px;
                height: 35px;
                transform: translate(-50%, -50%);
            }
            .q2{
                position: inherit;
                top: 20%;
                left: -7.5%;
                width: 56px;
                height: 38px;
                transform: translate(-50%, -50%);
            }
            .locateUs{
                text-align: center;
                font-size: 25px;
            }
            .locateUs img{
                width: 80%;
            }
            .callUs{
                text-align: center;
                font-size: 25px;
            }
            .divisor {
                width: 70%;
                margin: 0 auto;
                display: flex;
                justify-content: center;
                padding: 5px 5px;
            }

            .leftt, .centerr, .rightt {
                width: 30%; /* Set the width of each column */
                text-align: center;
                margin: 1%;
               
            }

            /* Clearfix for the container to ensure proper clearing of floats */
            .divisor::after {
                content: "";
                display: table;
                clear: both;
            }
            .leftt b, .centerr b, .rightt b {
                font-size: 35px;
            }

            .scale-down{
                font-size: 1.2vw;
            }
            .textt{
                display: flex;
                justify-content: space-between;
                position: relative;
                font-size: 25px;
            }
        </style>
    </head>
    <body>
       
   
    <header>
        <div class="logo">
            <div class="menu-icon" onclick="toggleSidebar()">☰</div>
            Hand Aide
        </div>
        <div class="navigation">
            <a href="#applyNoww">Apply Now</a>
            <a href="#aboutUss">About Us</a>
            <a href="#callUss">Call Us</a>
        </div>
    </header>
   
    <div class="sidebar">
        <a href="https://maps.app.goo.gl/usD4U6b7X4mfCCza7" target="_blank">&emsp;Give Feedback Here</a>
        <a href="#locateUss">&emsp;Locate Us</a>
        <a onclick="openPopup()" class="showForm2">&emsp;Inquiries</a>
    </div>
   
    <section id="applyNoww"></section>
        <br><br><br>
        <div class="apply">
            <h1>We are hiring!</h1>
            <button class="showForm"><h2>Apply now!</h2></button>
        </div>
       
        <br>
       
        <div class="applypopup">
            <button class="close-btn">&times;</button>
            <div class="formm">
                <form action="receiveAppli.php" method="post" enctype="multipart/form-data">
                    <h2>Application Form</h2>
                    <label for="firstname">Firstname</label>
                    <input type="text" id="firstname" name="firstname" placeholder="Enter your firstname" required><br>
                    <label for="lastname">Lastname</label>
                    <input type="text" id="lastname" name="lastname" placeholder="Enter your lastname" required><br>
                    <label for="middlename">Middle name</label>
                    <input type="text" id="middlename" name="middlename" placeholder="Enter your middle name" required><br>
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required><br>
                    <label for="phone">Phone #</label>
                    <input type="tel" id="phone" name="phone" placeholder="Enter your phone number" required><br>
                    <label for="yourfile">Attach your biodata/resume image here:</label>
                    <br><input type="file" id="yourfile"  name="yourfile" required><br>
                    <button type="submit" name="submit">Submit now</button>
                </form>
            </div>
        </div>

    </section>

   
    <br>
    <div class="inqpopup">
        <button class="close-btn2" onclick="closePopup()">&times;</button>
        <div class="formm2">
            <form action="receiveInq.php" method="post">
                <h2>Inquiry Form</h2>
                <label for="Name">Name</label>
                <input type="text" id="name" name="name" placeholder="Enter your name" required><br>
                <label for="Email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required><br>
                <label for="Phonenum">Phone#</label>
                <input type="tel" id="Phonenum" name="Phonenum" placeholder="Ex. 09..." required><br>
                <label for="Inquiry">Inquiry:</label>
                <textarea id="inquiry" name="inquiry" rows="4" cols="50" required></textarea><br>
                <button type="submit" name="submit2">Submit</button>
            </form>
        </div>
    </div>


    <br><br><br>
    <div class="image1">
        <img src="https://images.ctfassets.net/xsotn7jngs35/2kCMLmMA9HGfmE3jPBWtrs/7cf789ead71da63a210e3a7bef2548a8/DT-Effective_Floor_Care_Cleaning_and_Maintenance_Methods-banner_2x.jpg?fm=webp">
        <div class="quote"><p>&nbsp;&nbsp;&nbsp;&nbsp;Be a part of the team</p></div>
    </div>
    <section id="aboutUss">
        <br><br><br><br><br><br><br><br><br><br><br><br><br>
        <div class="about">
            <div class="abt">
                <img src="q1-preview.png" class="q1">
                <p>About us</p>
                <img src="q2-preview.png" class="q2">
            </div>
            <div class="textt">
                <p class="side-by-side-p">We are a janitorial staffing agency that is a specialized service provider that connects
                businesses and organizations with qualified and skilled janitorial staff and we play a crucial role
                in the recruitment, placement, and management of cleaning personnel, ensuring that our clients have access to reliable and trained
                individuals for various cleaning and maintenance tasks.</p>

                <p class="side-by-side-p">Typically, we handle the sourcing, screening,
                and onboarding of janitorial staff, allowing businesses to focus on their core operations while
                maintaining a clean and well-managed environment.
                Whether for short-term or long-term placements, we contribute
                to the smooth operation of facilities by providing staffing solutions tailored
                to the unique needs of our clients.</p>
            </div>
        </div>
        <br><br><br><br><br><br><br><br>
    </section>
    <section id="locateUss">
        <br><br><br><br><br>
        <div class="locateUs">
            <p>Locate us</p>
            <a href="https://maps.app.goo.gl/usD4U6b7X4mfCCza7" target="_blank">
            <img src="mapa.png" class="mapa"></a>
        </div>
    </section>

    <section id="callUss">
        <br><br><br><br><br>
        <div class="callUs">
            <p>Call us</p>
            <div class="divisor">
                <div class="leftt"><b>Contact</b><br>+63 (32) 266 2423<br>+63 (32) 412 1430<br><br><b>Email</b><br>caloalberto@yahoo.com</div>
                <div class="centerr"><b>Business Hours</b><br>Monday - Friday<br>7:00 AM - 4:00 PM</div>
                <div class="rightt"><b>Location</b><br>611 P. Zamora<br>Street</div>
            </div>
        </div>
    </section>

    <footer>
        © 2024 Hand Aid General Services. All rights reserved.
    </footer>
   
    <script>
        var lastScrollTop = 0;

        function toggleSidebar() {
            var sidebar = document.querySelector('.sidebar');
            sidebar.style.left = sidebar.style.left === '0px' ? '-250px' : '0px';
        }

        window.addEventListener('scroll', function() {
            var st = window.scrollY || document.documentElement.scrollTop;
           
            if (st > lastScrollTop) {
                // Scrolling down, close the sidebar
                document.querySelector('.sidebar').style.left = '-250px';
            }
           
            lastScrollTop = st;
        });

        document.addEventListener("DOMContentLoaded", function() {
                var showFormButton = document.querySelector(".showForm");
                var applyPopup = document.querySelector(".applypopup");
                var closeButton = document.querySelector(".applypopup .close-btn");
       
        showFormButton.addEventListener("click", function() {
        applyPopup.classList.toggle("active");
        });

        closeButton.addEventListener("click", function() {
        applyPopup.classList.remove("active");
        });
        });

        var inqPopup = document.querySelector(".inqpopup");
        var closeButton2 = document.querySelector(".inqpopup .close-btn2");

        function openPopup() {
            inqPopup.classList.toggle("active");
        }

        function closePopup(){
            inqPopup.classList.remove("active");
        }

        function redirectAfterSubmit() {
        // Your form processing logic here, if needed
       
        }


        // zoom in zoom out handling
        var lastScrollTop = 0;

        function scaleFontOnScroll() {
            var st = window.scrollY || document.documentElement.scrollTop;
            var body = document.body;

            if (st > lastScrollTop) {
                // Scrolling down
                body.classList.add('scale-down');
            } else {
                // Scrolling up
                body.classList.remove('scale-down');
            }

            lastScrollTop = st;
        }

        window.addEventListener('scroll', scaleFontOnScroll);

        // Handle zoom event
        window.addEventListener('wheel', function (event) {
            if (event.deltaY < 0) {
                // Zooming out
                document.body.classList.remove('scale-down');
            } else {
                // Zooming in
                document.body.classList.add('scale-down');
            }
        });
    </script>
       
    </body>

</body>
</html>