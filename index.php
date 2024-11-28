<?php
session_start(); // -> Harus ditambahkan ketika menggunakan session

if(!isset($_SESSION['login'])) {
    header('location: auth/login.php');
    exit;
}

require('connect.php');

// if (!$conn) {
//      echo "Koneksi gagal";
// } else {
//      echo "Koneksi berhasil";
// }

$query = mysqli_query($conn, 'SELECT * FROM pengaduan');

$i = 1;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaduan Masyarakat</title>

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

.navbar .create,
.navbar form {
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

.navbar .create:hover,
.navbar form:hover {
    background-color: white; /* Change background on hover */
    color: black; /* Change text color on hover */
    transform: translateY(-2px); /* Slight lift effect */
}

.navbar form button {
    color: white;
    background-color: transparent;
    border: none;
    text-decoration: none;
    text-align: center;
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
}

table {
    padding: 30px 30px;
    border: 2px solid black;
    border-radius: 30px;
    margin-top: 5vh;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    background-color: white; /* White background for the table */
    box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2); /* Added shadow for depth */
}

thead {
    padding: 0 0 15px 0;
    margin-bottom: 20px;
    border-bottom: 2px solid black;
}

thead tr {
    gap: 10px;
    display: flex;
    justify-content: center;
    align-items: center;
}

thead tr th {
    border: none;
    width: 15vw;
    text-align: center;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #007BFF; /* Blue background for header */
    color: white; /* White text for header */
    padding: 10px; /* Added padding for better spacing */
    border-radius: 10px; /* Rounded corners */
}

tbody tr {
    gap: 10px;
    display: flex;
    justify-content: center;
    align-items: flex-start;
}

tbody tr td {
    border: none;
    width: 15vw;
    margin-bottom: 20px;
    text-align: center;
    display: flex;
    justify-content: center;
    align-items: center;
}

tbody tr td a {
    width: 30%;
    padding: 5px 0;
    margin-right: 10px;
    border-radius: 30px;
    font-size: 1rem;
    text-decoration: none;
    text-align: center;
    color: white;
    background-color: #007BFF; /* Blue background for links */
    transition: background-color 0.3s, transform 0.2s; /* Smooth transition */
}

tbody tr td a:hover {
    background-color: #0056b3; /* Darker blue on hover */
    transform: translateY(-2px); /* Slight lift effect */
    </style>
    
</head>
<body>
    <nav>
        <h1>PENGADUAN MASYARAKAT</h1>
        <div class="navbar">
            <a class="create" href="create.php">Isi Report</a>
            <form action="auth/logout.php" method="post">
                <button type="submit">Log Out</button>
            </form>
        </div>
    </nav>
    <table border="1" cellpadding="3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Lengkap</th>
                <th>Pesan</th>
                <th>Kode Pos</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            <?php while ($baris = mysqli_fetch_assoc($query)) { ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $baris['nama_lengkap']; ?></td>
                <td><?php echo $baris['pesan']; ?></td>
                <td><?php echo $baris['kode_pos']; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $baris['id']; ?>">EDIT</a>
                    <!-- Menggunakan POST agar ID yang dikirim tidak terlihat -->
                    <form action="delete.php" method="post">
                        <!-- Input tidak telihat dan tidak bisa diubah, hanya untuk mengirim ID -->
                        <input readonly type="hidden" name="id" value="<?= $baris['id']; ?>">
                        <button style="font-size: 1rem; background-color: transparent; border: none; cursor:pointer" type="submit" name="delete">Delete</button>
                    </form>
                </td>
            </tr>
            <?php $i++; } ?>
        </tbody>
    </table>
</body>
</html>