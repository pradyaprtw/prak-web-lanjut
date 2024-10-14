<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>
<body>
   @yield('content') 
   
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <script>
    function confirmDelete(userId) {
        // Pastikan SweetAlert baru memproses setelah tombol "Ya, Hapus!" ditekan
        Swal.fire({
            title: "Apakah anda yakin ingin menghapus?",
            text: "Anda tidak bisa mengembalikannya!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, hapus!"
        }).then((result) => {
            if (result.isConfirmed) {
                // Lakukan permintaan DELETE hanya jika dikonfirmasi
                fetch(`/user/${userId}`, { 
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}' // Tambahkan CSRF jika diperlukan
                    }
                })
                .then(response => response.json())
                .then(data => {
                    // Jika berhasil, tampilkan pesan sukses
                    Swal.fire({
                        title: "Terhapus!",
                        text: "Pengguna berhasil dihapus.",
                        icon: "success"
                    });
                })
                .catch(error => console.error('Error:', error));
            }
        });
    }
</script>

</body>
</html>