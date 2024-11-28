<?php
session_start(); // -> Harus ditambahkan ketika menggunakan session

if(!isset($_SESSION['login'])) {
    header('location: auth/login.php');
    exit;
}
    include('connect.php');
    
    if(isset($_GET['submit'])) {
        $id = '';
        $nama = $_GET['nama'];
        $pesan = $_GET['pesan'];
        $pos = $_GET['pos'];

    $query = mysqli_query($conn, "INSERT INTO pengaduan(id, nama_lengkap, pesan, kode_pos) VALUES ('$id', '$nama', '$pesan', '$pos')");

        if($query) {
            header('location: index.php');
        };
    };

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PENGADUAN MASYARAKAT</title>

    <style>
        * {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    font-family: 'Arial', sans-serif; /* Changed to a more modern font */
}

body {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    background: linear-gradient(135deg, #f5f7fa, #c3cfe2); /* Light gradient background */
    min-height: 100vh; /* Ensure full height */
}

nav {
    width: 95%;
    height: auto;
    padding: 20px 30px;
    margin-top: 10px;
    border-radius: 10px;
    background-color: rgba(0, 0, 0, 0.8); /* Semi-transparent black */
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.3); /* Added shadow for depth */
}

nav h1 {
    color: white;
    font-size: 2rem;
    margin-bottom: 10px; /* Added margin for spacing */
}

.navbar {
    gap: 20px; /* Adjusted gap for better spacing */
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
}

.navbar a {
    width: 15vw;
    padding: 10px 0;
    color: white;
    text-decoration: none;
    text-align: center;
    font-size: 1rem;
    font-weight: 600;
    border: 2px solid white;
    border-radius: 30px;
    transition: background-color 0.3s, transform 0.2s; /* Smooth transition */
}

.navbar a:hover {
    background-color: white; /* Change background on hover */
    color: black; /* Change text color on hover */
    transform: translateY(-2px); /* Slight lift effect */
}

form {
    margin-top: 3%;
    border: 2px solid #007BFF; /* Blue border */
    border-radius: 30px;
    padding: 30px 60px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    background-color: rgba(255, 255, 255, 0.9); /* Semi-transparent white */
    box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2); /* Added shadow for depth */
}

form .label {
    width: max-content;
    gap: 5px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: flex-start;
}

.container {
    gap: 30px;
    display: flex;
    justify-content: center;
    align-items: center;
    margin-bottom: 20px;
}

.container input {
    font-size: 1rem;
    padding: 10px; /* Added padding for better input appearance */
    border: 2px solid #ccc; /* Light border */
    border-radius: 5px; /* Rounded corners */
    transition: border-color 0.3s; /* Smooth transition */
}

.container input:focus {
    border-color: #007BFF; /* Change border color on focus */
    outline: none; /* Remove default outline */
}

.pesan {
    width: max-content;
    gap: 5px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: flex-start;
    margin-bottom: 20px;
}

.pesan input {
    width: 25vw;
    height: 20vh;
    font-size: 1rem;
    padding: 10px; /* Added padding for better input appearance */
    border: 2px solid #ccc; /* Light border */
    border-radius: 5px; /* Rounded corners */
    transition: border-color 0.3s; /* Smooth transition */
}

.pesan input:focus {
    border-color: #007BFF; /* Change border color on focus */
    outline: none; /* Remove default outline */
}

button {
    width: 20vw;
    padding: 10px 0;
    font-size: 1rem;
    font-weight: 600;
    border: 2px solid #007BFF; /* Blue border */
    border-radius: 30px;
    background-color: #007BFF; /* Blue background */
    color:
    </style>

</head>
<body>

    <nav>
        <h1>PENGADUAN MASYARAKAT</h1>
        <div class="navbar">
            <a href="index.php">Report Saya</a>
            <a href="#">Log Out</a>
        </div>
    </nav>

    <form action="create.php" method="get">
        <div class="container">
            <div class="lable">
                <label for="">Nama Lengkap:</label>
                <input type="text" name="nama" id="nama">
            </div>
            <div class="lable">
                <label for="">Kode Pos:</label>
                <input type="number" name="pos" id="pos">
            </div>
        </div>

        <div class="pesan">
            <label for="">Pesan:</label>
            <input type="teks" name="pesan" id="pesan">
        </div>

        <button type="submit" name="submit">Kirim</button>
    </form>

</body>
</html>