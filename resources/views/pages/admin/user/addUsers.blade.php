@extends('../../../layouts.app')

@section('content')

<div class="bg-white p-6 rounded-lg shadow-md max-w-lg mx-auto">
    <h2 class="text-2xl font-bold mb-4">Tambah User</h2>
    @if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
        <strong>Error!</strong> Harap periksa kembali input Anda.
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


    <!-- Form -->
    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        @method('POST')

        <div class="mb-4">
            <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
            <input type="text" id="nama" name="nama" required
                class="mt-1 p-2 w-full border rounded-md focus:ring focus:ring-blue-300">
        </div>

        <div class="mb-4">
            <label for="kode" class="block text-sm font-medium text-gray-700">Kode</label>
            <input type="text" id="kode" name="kode" required
                class="mt-1 p-2 w-full border rounded-md focus:ring focus:ring-blue-300">
        </div>

        <label for="id_jurusan">Jurusan</label>
<select id="id_jurusan" name="id_jurusan" required
    class="mt-1 p-2 w-full border rounded-md focus:ring focus:ring-blue-300">
    <option value="">-- Pilih Jurusan --</option>
    @foreach ($jurusans as $jurusan)
        <option value="{{ $jurusan->id_jurusan }}" 
            {{ old('id_jurusan') == $jurusan->id_jurusan ? 'selected' : '' }}>
            {{ $jurusan->nama }}
        </option>
    @endforeach
</select>





        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" id="email" name="email" required
                class="mt-1 p-2 w-full border rounded-md focus:ring focus:ring-blue-300">
        </div>

        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <input type="password" id="password" name="password" required
                class="mt-1 p-2 w-full border rounded-md focus:ring focus:ring-blue-300">
        </div>

        <div class="mb-4">
            <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
            <select id="role" name="role" required
                class="mt-1 p-2 w-full border rounded-md focus:ring focus:ring-blue-300">
                <option value="admin">Admin</option>
                <option value="user">User</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="no_telp" class="block text-sm font-medium text-gray-700">No. Telepon</label>
            <input type="text" id="no_telp" name="no_telp" required
                class="mt-1 p-2 w-full border rounded-md focus:ring focus:ring-blue-300">
        </div>

        <div class="mb-4">
            <label for="no_ktp" class="block text-sm font-medium text-gray-700">No. KTP</label>
            <input type="text" id="no_ktp" name="no_ktp" required
                class="mt-1 p-2 w-full border rounded-md focus:ring focus:ring-blue-300">
        </div>

        <div class="flex justify-between">
            <a href="{{ route('users.index') }}" class="text-gray-600 hover:text-gray-800">Batal</a>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                Simpan
            </button>
        </div>

    </form>
</div>

@endsection
@section('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const form = document.querySelector("form");
        const jurusanSelect = document.getElementById("id_jurusan");

        form.addEventListener("submit", function(event) {
            if (!jurusanSelect.value) {
                event.preventDefault();
                Swal.fire({
                    title: "Error!",
                    text: "Harap pilih jurusan sebelum menyimpan.",
                    icon: "error"
                });
            }
        });
    });
</script>
@endsection

