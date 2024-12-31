<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IT Request Hub</title>
    <style>
     
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-color:#5072A7; 
        }

     
        header {
            text-align: center;
            background-color: black;
            color: white;
            padding: 20px 0;
            animation: fadeIn 1s ease-in-out;
        }

        h1 {
            margin: 0;
            font-size: 2.5em;
        }

        /* Main Content Styling */
        main {
            display: flex;
            flex: 1; 
            flex-wrap: wrap;
            padding: 20px;
            justify-content: center;
        }

        
        .content-box {
            background: rgba(19, 19, 19, 0.9); 
            padding: 30px;
            max-width: 45%; 
            border-radius: 10px;
            box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.25);
            margin-right: 20px; /* Space between content and image */
            display: flex;
            flex-direction: column;
            justify-content: center; /* Centers items vertically */
            align-items: center; /* Centers items horizontally */
            animation: fadeInLeft 1.5s ease-in-out;
            height: 400px; /* Increased height of the box */
            text-align: center; /* Center text inside links */
        }

        .links {
            display: flex;
            flex-direction: column; /* Stack links vertically */
            justify-content: center;
            gap: 15px; /* Space between the links */
        }

        a {
            display: inline-block;
            color: white;
            text-decoration: none;
            font-weight: bold;
            padding: 12px 25px;
            background-color: #5072A7;
            border-radius: 5px;
            transition: background 0.3s ease, transform 0.3s ease;
            text-align: center;
        }

        a:hover {
            background-color: white;
            color: #5072A7;
            transform: scale(1.1);
        }

        /* Image on the Right */
        .image-box {
            flex: 1; /* Fills remaining space */
            background: url('./images/image3.jpg') no-repeat center center / cover; /* Replace this with your image path */
            border-radius: 10px;
            animation: fadeInRight 1.5s ease-in-out;
        }

        /* Footer Styling */
        footer {
            text-align: center;
            padding: 15px 0;
            background-color: black;
            color: white;
            animation: slideUp 1s ease-in-out;
        }

        /* Animations */
        @keyframes fadeInLeft {
            from {
                transform: translateX(-20px);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @keyframes fadeInRight {
            from {
                transform: translateX(20px);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @keyframes slideUp {
            from {
                transform: translateY(20px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        
        @media screen and (max-width: 768px) {
            .content-box {
                max-width: 100%; /* White box spans full width */
                margin: 0 0 20px 0;
                height: auto; /* Let height adjust dynamically */
            }

            .image-box {
                max-height: 300px; /* Limit image height */
                flex-basis: 100%; /* Spans full width */
            }

            main {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <header>
        <h1>WELCOME TO IT REQUEST HUB</h1>
    </header>
    <main>
        <!-- White Box Section -->
        <div class="content-box">
            <div class="links">
                <a href="students.php">STUDENTS</a>
                <a href="teachers.php">TEACHERS</a>
                <a href="non_teaching_staff.php">NON-TEACHING STAFF</a>
                <a href="it_managers.php">IT MANAGERS</a>
                <a href="support_tickets.php">SUPPORT TICKETS</a>
            </div>
        </div>
        
        <!-- Image Section -->
        <div class="image-box"></div>
    </main>
    <footer>
        <p>&copy; 2024 IT Request Hub. All rights reserved.</p>
    </footer>
</body>
</html>
