@extends('../../../layouts.app')

@section('content')

<div class="bg-white p-6 rounded-lg shadow-md max-w-lg mx-auto">
    <h2 class="text-2xl font-bold mb-4">Edit User</h2>
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

    <!-- Form Edit User -->
    <form action="{{ route('users.update', $data->id_user) }}" method="POST">
    @csrf
    @method('PUT')

        <div class="mb-4">
            <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
            <input type="text" id="nama" name="nama" value="{{ old('nama', $data->nama ?? '') }}" required
                class="mt-1 p-2 w-full border rounded-md focus:ring focus:ring-blue-300">
            @error('nama')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="kode" class="block text-sm font-medium text-gray-700">Kode</label>
            <input type="text" id="kode" name="kode" value="{{ old('kode', $data->kode ?? '') }}" required
                class="mt-1 p-2 w-full border rounded-md focus:ring focus:ring-blue-300">
            @error('kode')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="id_jurusan" class="block text-sm font-medium text-gray-700">Jurusan</label>
            <select id="id_jurusan" name="id_jurusan" required
                class="mt-1 p-2 w-full border rounded-md focus:ring focus:ring-blue-300">
                <option value="">-- Pilih Jurusan --</option>
                @foreach ($jurusans as $jurusan)
                    <option value="{{ $jurusan->id_jurusan }}" 
                        {{ old('id_jurusan', $data->id_jurusan ?? '') == $jurusan->id_jurusan ? 'selected' : '' }}>
                        {{ $jurusan->nama }}
                    </option>
                @endforeach
            </select>
            @error('id_jurusan')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email', $data->email ?? '') }}" required
                class="mt-1 p-2 w-full border rounded-md focus:ring focus:ring-blue-300">
            @error('email')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-700">Password (Kosongkan jika tidak ingin mengubah)</label>
            <input type="password" id="password" name="password"
                class="mt-1 p-2 w-full border rounded-md focus:ring focus:ring-blue-300" placeholder="Masukkan password baru jika ingin mengubah">
            @error('password')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
            <select id="role" name="role" required
                class="mt-1 p-2 w-full border rounded-md focus:ring focus:ring-blue-300">
                <option value="admin" {{ old('role', $data->role ?? '') == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="user" {{ old('role', $data->role ?? '') == 'user' ? 'selected' : '' }}>User</option>
            </select>
            @error('role')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="no_telp" class="block text-sm font-medium text-gray-700">No. Telepon</label>
            <input type="text" id="no_telp" name="no_telp" value="{{ old('no_telp', $data->no_telp ?? '') }}" required
                class="mt-1 p-2 w-full border rounded-md focus:ring focus:ring-blue-300">
            @error('no_telp')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="no_ktp" class="block text-sm font-medium text-gray-700">No. KTP</label>
            <input type="text" id="no_ktp" name="no_ktp" value="{{ old('no_ktp', $data->no_ktp ?? '') }}" required
                class="mt-1 p-2 w-full border rounded-md focus:ring focus:ring-blue-300">
            @error('no_ktp')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-between">
            <a href="{{ route('users.index') }}" class="text-gray-600 hover:text-gray-800">Batal</a>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                Update
            </button>
        </div>

    </form>
</div>

@endsection
