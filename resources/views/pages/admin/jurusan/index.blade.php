@extends('../../../layouts.app')

@section('content')
<div class="container mx-auto p-6 bg-white rounded shadow-md">
    <h2 class="text-2xl font-bold mb-4">Daftar Jurusan</h2>
    
    <!-- Pencarian -->
    <div class="mb-4">
        <a href="{{ route('jurusan.create') }}" class="bg-green-500 hover:bg-green-700 text-white py-2 px-4 rounded">
            Tambah
        </a>
    </div>

    <!-- Tabel Jurusan -->
    <table class="w-full border-collapse border border-gray-200 rounded-lg shadow-md">
        <thead>
            <tr class="bg-gray-100">
                <th class="border border-gray-300 px-4 py-2 text-left">No</th>
                <th class="border border-gray-300 px-4 py-2 text-left">Nama Jurusan</th>
                <th class="border border-gray-300 px-4 py-2 text-left">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jurusans as $index => $jurusan)
            <tr>
                <td class="border border-gray-300 px-4 py-2 text-left">{{ $index + 1 }}</td>
                <td class="border border-gray-300 px-4 py-2 text-left">{{ $jurusan->nama }}</td>
                <td class="border border-gray-300 px-4 py-2 text-left flex space-x-2">
                    <a href="{{ route('jurusan.edit', $jurusan->id_jurusan) }}" class="px-3 py-1 text-white bg-blue-500 rounded-sm cursor-pointer">
                        <i class="fas fa-pen"></i>
                    </a>
                    <form id="delete-form-{{ $jurusan->id_jurusan }}" action="{{ route('jurusan.destroy', $jurusan->id_jurusan) }}" method="POST" onsubmit="event.preventDefault(); confirmDelete({{ $jurusan->id_jurusan }});">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-white px-3 p-1 bg-red-500 rounded-sm cursor-pointer">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination -->
    <div class="mt-4">
        {{ $jurusans->links() }}
    </div>
</div>
@endsection

@section('scripts')
<script>
    function confirmDelete(jurusanId) {
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
                document.getElementById("delete-form-" + jurusanId).submit();
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
            timer: 2000, // Auto close dalam 3 detik
            showConfirmButton: false
        });
    </script>
@endif


@endsection
