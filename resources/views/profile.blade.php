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
        margin: 0 auto 20px;
        overflow: hidden;
    }

    .profile-img img {
        object-fit: cover;
        /* Ensures image fits inside the circle without distortion */
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

    .photo-display img {
        object-fit: cover;
        /* Ensures image fits nicely */
    }
    </style>
</head>

<body>
    <div class="profile-card">
        <div class="profile-img">
            <img src="{{ asset('storage/uploads/'.$user->foto ?? "Foto tidak ditemukan") }}" alt="Profile Image" width="100">
        </div>

        <table class="profile-info">
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td>{{ $nama }}</td>
            </tr>
            <tr>
                <td>Kelas</td>
                <td>:</td>
                <td>{{ $nama_kelas ?? 'Kelas tidak ditemukan'}}</td>
            </tr>
            <tr>
                <td>NPM</td>
                <td>:</td>
                <td>{{ $npm }}</td>
            </tr>
        </table>
    </div>
</body>

</html>