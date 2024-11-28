<?php

include('function.php');

if(isset($_POST['register'])) {
    register($_POST);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>

    <style>
        * {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    font-family: 'Arial', sans-serif; /* Changed to a more modern font */
}

body {
    padding: 20px 30px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    background: linear-gradient(135deg, #f5f7fa, #c3cfe2); /* Light gradient background */
}

h1 {
    width: 100%;
    height: auto;
    padding: 20px 0;
    border-radius: 15px;
    background-color: rgba(0, 0, 0, 0.8); /* Semi-transparent black */
    color: white;
    text-align: center;
    text-decoration: none;
    font-weight: 600;
    font-size: 2rem;
    box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.3); /* Added shadow for depth */
}

form {
    width: 100%;
    height: auto;
    margin-top: 5vh;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}

form ul {
    padding: 50px 100px;
    box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.2); /* Enhanced shadow */
    border-radius: 20px;
    width: max-content;
    height: max-content;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    background: white; /* White background for the form */
}

h2 {
    color: #333; /* Darker text color */
    text-align: center;
    text-decoration: none;
    font-weight: 800;
    font-size: 2rem;
    margin-bottom: 15px;
}

form ul .teksbox div {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: flex-start;
}

form ul .teksbox div label {
    color: #333; /* Darker label color */
    font-weight: 600;
    font-size: 1.3rem;
    margin-bottom: 5px;
}

form ul .teksbox div input {
    width: 20vw;
    height: 6vh;
    padding: 0 10px;
    color: #333; /* Darker input text color */
    font-weight: 500;
    font-size: 1rem;
    margin-bottom: 10px;
    border: 2px solid #ccc; /* Light border */
    border-radius: 5px; /* Rounded corners */
    transition: border-color 0.3s; /* Smooth transition */
}

form ul .teksbox div input:focus {
    border-color: #007BFF; /* Change border color on focus */
    outline: none; /* Remove default outline */
}

.teksbox {
    margin-bottom: 20px;
}

button {
    width: 20vw;
    padding: 10px 0;
    font-size: 1rem;
    font-weight: 600;
    border: 2px solid #007BFF; /* Blue border */
    border-radius: 30px;
    background-color: #007BFF; /* Blue background */
    color: white; /* White text */
    cursor: pointer;
    margin-bottom: 10px;
    transition: background-color 0.3s, transform 0.2s; /* Smooth transition */
}

button:hover {
    background-color: #0056b3; /* Darker blue on hover */
    transform: translateY(-2px); /* Slight lift effect */
}

p a {
    color: #007BFF; /* Blue link color */
    text-decoration: none; /* Remove underline */
}

p a:hover {
    text-decoration: underline; /* Underline on hover */
}
    </style>

</head>
<body>
    <h1>PENGADUAN MASYARAKAT</h1>
    <form action="" method="post">
        <ul>
            <h2>SIGN IN</h2>
            <div class="teksbox">
                <div>
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="Enter your email" required>
                </div>
                <div>
                    <label for="password">Pasword</label>
                    <input type="password" name="pw" id="pw" placeholder="Enter your password" required>
                </div>
                <div>
                    <label for="password">Confirm Pasword</label>
                    <input type="password" name="pw2" id="pw2" placeholder="Confirm password" required>
                </div>
            </div>
            <button type="submit" name="register">Sign In</button>
            <p>Already Have Account? <a href="login.php">Log In</a></p>
        </ul>
    </form>
</body>
</html>