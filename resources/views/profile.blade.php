<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile Card</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f48fb1;
        }

        .profile-card {
            background-color: #90caf9;
            border-radius: 15px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
            width: 320px;
            text-align: center;
            padding: 25px;
        }

        .profile-img {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            background-color: #ddd;
            margin: 0 auto 20px;
        }

        .profile-img img {
            width: 100%;
            height: 100%;
            border-radius: 50%;
        }

        .profile-info {
            margin-top: 15px;
        }

        .profile-info td {
            padding: 10px 0;
        }

        .profile-info td:first-child {
            font-weight: bold;
            color: #2e3c62;
        }

        .profile-info td:nth-child(2) {
            padding: 0 12px;
        }

        .profile-info td:last-child {
            color: #3c4858;
        }
    </style>
</head>
<body>
    <div class="profile-card">
        <div class="profile-img">
            <img src="https://cdn-icons-png.flaticon.com/512/6997/6997662.png" alt="Profile Image">
        </div>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><?= $nama ?></td>
            </tr><br>
            <tr>
                <td>Kelas</td>
                <td>:</td>
                <td><?= $kelas ?></td>
            </tr><br>
            <tr>
                <td>NPM</td>
                <td>:</td>
                <td><?= $npm ?></td>
            </tr><br>
        </table>
    </div>
</body>
</html>