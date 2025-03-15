@extends('../../../layouts.app')

@section('content')
<div class="mt-10 w-1/3 mx-auto p-6 bg-white rounded shadow-md">
    <h2 class="text-2xl font-bold mb-4">Tambah Jurusan</h2>

    <form action="{{ route('jurusan.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="nama" class="block text-sm font-medium text-gray-700">Nama Jurusan</label>
            <input type="text" id="nama" name="nama" required
                class="mt-1 p-2 w-full border rounded-md focus:ring focus:ring-blue-300">
            @error('nama')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-between">
            <a href="{{ route('jurusan.index') }}" class="text-gray-600 hover:text-gray-800">Batal</a>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection
