<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IT Request Hub</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #5072A7;
            margin: 0;
            padding: 0;
        }

        header {
            text-align: center;
            background-color: black;
            color: white;
            padding: 20px 0;
        }

        h1 {
            margin: 0;
            font-size: 2.5em;
        }

        main {
            display: flex;
            margin: 20px;
            gap: 20px;
        }

        /* Login Form */
        .login-section {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .login-form-container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .login-form-container h2 {
            margin: 0 0 10px 0;
            font-size: 1.2em;
            color: #333;
        }

        label {
            display: block;
            font-size: 14px;
            margin: 10px 0 5px 0;
        }

        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        select {
            width: 100%;
            padding: 8px;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        button {
            background-color: #5072A7;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background-color: #5b3fdb;
        }

        /* Sign-Up Section */
        .signup-box {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        a {
            display: inline-block;
            color: #5072A7;
            text-decoration: none;
            font-weight: bold;
            margin-top: 15px;
        }

        a:hover {
            text-decoration: underline;
        }

        /* Image Section */
        .image-container {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .image-container img {
            max-width: 100%;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        /* Footer */
        footer {
            text-align: center;
            padding: 15px;
            background-color: black;
            color: white;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <header>
        <h1>WELCOME TO IT REQUEST HUB</h1>
    </header>

    <main>
        <!-- Left Section -->
        <div class="login-section">
            <div class="login-form-container">
                <h2>Login</h2>
                <form action="log.php" method="POST">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required>

                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>

                    <label for="role">Role</label>
                    <select name="role" id="role" required>
                        <option value="student">Student</option>
                        <option value="teacher">Teacher</option>
                        <option value="non_teaching_staff">Non-Teaching Staff</option>
                        <option value="it_manager">IT Manager</option>
                    </select>

                    <button type="submit">Login</button>
                </form>
            </div>

            <div class="signup-box">
                <h2>New Here? Sign Up Now!</h2>
                <p>Join the IT Request Hub and get started with your role.</p>
                <a href="signup.php">Sign Up</a>
            </div>
        </div>

        <!-- Right Section: Image -->
        <div class="image-container">
            <img src="./images/image3.jpg" alt="Placeholder image representing IT services">
        </div>
    </main>

    <footer>
        <p>&copy; 2024 IT Request Hub. All rights reserved.</p>
    </footer>
</body>
</html>
