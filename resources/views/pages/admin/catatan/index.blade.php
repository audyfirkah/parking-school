@extends('../../../layouts.app')

@section('content')


<div class="bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-4">Daftar User</h2>
    {{-- <div class="mb-4">
        <a href="{{ route('areas.create') }}" class="bg-green-500 hover:bg-green-700 text-white py-2 px-4 rounded">
            Tambah
        </a>
    </div> --}}

    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="w-full border-collapse border border-gray-200 rounded-lg shadow-md">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border border-gray-300 px-4 py-2 text-left">No</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Nama User</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Nama Area</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Tipe Kendaraan</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Jam Masuk</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Jam keluar</th>
                    <th class="border border-gray-300 px-4 py-2 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <? $no = 1; ?>
                @foreach ($catatans as $catatan)
                <tr class="hover:bg-gray-50 transition">
                    <td class="border border-gray-300 px-4 py-2">{{ $no++ }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $catatan->user->nama }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $catatan->area->nama }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $catatan->kendaraan->tipe }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $catatan->jam_masuk }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $catatan->jam_keluar }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-center">
                        {{-- <a href="{{ route('areas.edit', $area->id_area) }}" class="px-3 py-1 bg-blue-500 text-white text-center rounded-sm hover:bg-blue-700 mx-1"> --}}
                        <a href="#" class="px-3 py-1 bg-blue-500 text-white text-center rounded-sm hover:bg-blue-700 mx-1">
                            <i class="fa-solid fa-pen"></i>
                        </a>
                        {{-- <form id="delete-form-{{ $area->id_area }}" action="{{ route('areas.destroy', $area->id_area) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE') --}}
                            <button type="button" class="px-3 py-1 bg-red-500 text-center text-white rounded-sm hover:bg-red-700 mx-1"
                                {{-- onclick="confirmDelete({{ $area->id_area }})"> --}}
                                >
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        {{-- </form> --}}
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
    function confirmDelete(areaId) {
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
                document.getElementById("delete-form-" + areaId).submit();
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