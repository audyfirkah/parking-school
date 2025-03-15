@extends('../../../layouts.app')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md max-w-lg mx-auto">
    <h2 class="text-2xl font-bold mb-4">Tambah Kendaraan</h2>

    <form action="{{ route('kendaraan.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="id_user" class="block text-sm font-medium text-gray-700">Pemilik Kendaraan</label>
            <select id="id_user" name="id_user" required class="mt-1 p-2 w-full border rounded-md">
                <option value="">-- Pilih User --</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id_user }}">{{ $user->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="plat_nomor" class="block text-sm font-medium text-gray-700">Plat Nomor</label>
            <input type="text" id="plat_nomor" name="plat_nomor" required class="mt-1 p-2 w-full border rounded-md">
        </div>

        <div class="mb-4">
            <label for="tipe" class="block text-sm font-medium text-gray-700">Tipe Kendaraan</label>
            <select id="tipe" name="tipe" required class="mt-1 p-2 w-full border rounded-md">
                <option value="motor">Motor</option>
                <option value="mobil">Mobil</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="no_stnk" class="block text-sm font-medium text-gray-700">No STNK</label>
            <input type="text" id="no_stnk" name="no_stnk" required class="mt-1 p-2 w-full border rounded-md">
        </div>

        <div class="flex justify-between">
            <a href="{{ route('kendaraan.index') }}" class="text-gray-600 hover:text-gray-800">Batal</a>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection
