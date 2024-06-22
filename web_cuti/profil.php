<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Saya</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
        }
        .profile-container, .leave-history {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 80%;
            max-width: 800px;
            margin-bottom: 20px;
        }
        .profile-container img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }
        .profile-container h2, .leave-history h2 {
            color: #ff7f00;
            margin: 10px 0;
        }
        .profile-container label {
            display: block;
            text-align: left;
            margin: 10px 0 5px;
        }
        .profile-container input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .profile-container button {
            margin-top: 10px;
            padding: 10px 20px;
            border: none;
            background-color: #ff7f00;
            color: white;
            cursor: pointer;
            border-radius: 4px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2a63c;
            color: white;
        }
    </style>
</head>
<body>

<div class="profile-container">
    <img src="images/user.png" alt="User Icon">
    <h2>Profil Pengguna</h2>
    <form action="" method="post">
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" value="Budi" required>
        
        <label for="nik">NIK:</label>
        <input type="text" id="nik" name="nik" value="12345" required>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="budi@gmail.com" required>
        
        <button type="submit">Simpan</button>
    </form>
</div>
