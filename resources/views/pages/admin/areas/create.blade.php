@extends('../../../layouts.app')

@section('content')
<div class="w-1/3 mt-10 mx-auto p-6 bg-white rounded shadow-md">
    <h2 class="text-2xl font-bold mb-4">Tambah Area</h2>

    <form action="{{ route('areas.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="nama" class="block text-sm font-medium text-gray-700">Nama Area</label>
            <input type="text" id="nama" name="nama" value="{{ old('nama') }}" required
                class="mt-1 p-2 w-full border rounded-md focus:ring focus:ring-blue-300">
            @error('nama')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="kapasitas" class="block text-sm font-medium text-gray-700">Kapasitas</label>
            <input type="number" id="kapasitas" name="kapasitas" value="{{ old('kapasitas') }}" required min="1"
                class="mt-1 p-2 w-full border rounded-md focus:ring focus:ring-blue-300">
            @error('kapasitas')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-between">
            <a href="{{ route('areas.index') }}" class="text-gray-600 hover:text-gray-800">Batal</a>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection

@section('scripts')
@if(session('success'))
    <script>
        Swal.fire({
            title: "Berhasil!",
            text: "{{ session('success') }}",
            icon: "success",
            timer: 3000,
            showConfirmButton: false
        });
    </script>
@endif
@endsection
