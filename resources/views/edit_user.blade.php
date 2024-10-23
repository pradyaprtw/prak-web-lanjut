@extends('layouts.app')

@section('content')
<style>
* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

body {
    font-family: 'Poppins', sans-serif;
    background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}

.form-container {
    background-color: white;
    padding: 40px;
    border-radius: 12px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    max-width: 400px;
    width: 100%;
}

h2 {
    text-align: center;
    margin-bottom: 20px;
    font-size: 24px;
    color: #333;
}

label {
    font-size: 14px;
    color: #666;
    display: block;
    margin-bottom: 8px;
}

input[type="text"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 2px solid #ddd;
    border-radius: 8px;
    font-size: 14px;
    transition: border-color 0.3s;
}

input[type="text"]:focus {
    border-color: #f5576c;
    outline: none;
}

button {
    width: 100%;
    padding: 12px;
    background-color: #f5576c;
    color: white;
    font-size: 16px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: background-color 0.3s;
}

button:hover {
    background-color: #d94556;
}

button:active {
    background-color: #bf3d4a;
}

@media (max-width: 480px) {
    .form-container {
        padding: 30px;
    }

    h2 {
        font-size: 22px;
    }
}
</style>
<div class="form-container">
    <h2>Form</h2>

    <form action="{{ route('user.update', $user['id']) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label for="nama">Nama</label>
        <input type="text" class="form-control" name="nama" id="nama" value="{{old('nama', $user->nama)}}"
            placeholder="Masukan nama anda" required>
            
            <label for="id_kelas">Kelas</label>
            <select name="kelas_id" id="kelas_id" required>
                @foreach ($kelas as $kelasItem)
                <option value="{{ $kelasItem->id }}">
                    {{ $kelasItem->id == $user->kelas_id ? 'selected' : '' }}
                    {{ $kelasItem->nama_kelas }}
                </option>
                @endforeach
            </select>
            
            <label for="foto">Foto:</label>
            <input type="file" id="foto" class="form-control" name="foto"><br><br>
            @if($user->foto)
            <img src="{{ asset('storage/uploads/' . $user->foto) }}" alt="User Photo" width="100">
            @endif

            <label for="ipk">IPK</label>
            <input type="text" class="form-control" name="ipk" id="ipk" value="{{old('ipk', $user->ipk)}}"
                placeholder="Masukan ipk anda" required>
            <button type="submit">Kirim</button>
    </form>

</div>
@endsection