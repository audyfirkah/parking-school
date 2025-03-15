@extends('../../../layouts.app')

@section('content')

<div class="bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-4">Daftar User</h2>
    <div class="mb-4">
        <a href="{{ route('kendaraan.create') }}" class="bg-green-500 hover:bg-green-700 text-white py-2 px-4 rounded">
            Tambah
        </a>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="w-full border-collapse border border-gray-200 rounded-lg shadow-md">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border border-gray-300 px-4 py-2 text-left">No</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Tipe</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Plat Nomor</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Pemilik</th>
                    <th class="border border-gray-300 px-4 py-2 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <? $no = 1; ?>
                @foreach ($kendaraans as $kendaraan)
                <tr class="hover:bg-gray-50 transition">
                    <td class="border border-gray-300 px-4 py-2">{{ $no++ }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $kendaraan->tipe }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $kendaraan->plat_nomor }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $kendaraan->user->nama }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-center">
                        <a href="{{ route('kendaraan.edit', $kendaraan->id_kendaraan) }}" class="px-3 py-1 bg-blue-500 text-white text-center rounded-sm hover:bg-blue-700 mx-1">
                            <i class="fa-solid fa-pen"></i>
                        </a>
                        <form id="delete-form-{{ $kendaraan->id_kendaraan }}" action="{{ route('kendaraan.destroy', $kendaraan->id_kendaraan) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="px-3 py-1 bg-red-500 text-center text-white rounded-sm hover:bg-red-700 mx-1"
                                onclick="confirmDelete({{ $kendaraan->id_kendaraan }})">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function confirmDelete(kendaraanId) {
        Swal.fire({
            title: "Apakah Anda yakin?",
            text: "Data tidak dapat dikembalikan setelah dihapus!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Ya, hapus!",
            cancelButtonText: "Batal"
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById("delete-form-" + kendaraanId).submit();
            }
        });
    }
</script>

@if(session('success'))
    <script>
        Swal.fire({
            title: "Berhasil!",
            text: "{{ session('success') }}",
            icon: "success",
            timer: 3000, // Auto close dalam 3 detik
            showConfirmButton: false
        });
    </script>
@endif
@endsection
