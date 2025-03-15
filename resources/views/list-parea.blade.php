@extends('layouts.app')

@section('content')
    <div class="flex justify-center items-center py-10">
        <div class="w-full max-w-5xl bg-white shadow-lg rounded-2xl p-8">
            <h2 class="text-2xl font-semibold text-gray-700 mb-6">User List</h2>
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr>
                        <th class="border-b-2 py-2 px-4 text-gray-600 font-semibold">Name</th>
                        <th class="border-b-2 py-2 px-4 text-gray-600 font-semibold">Email</th>
                        <th class="border-b-2 py-2 px-4 text-gray-600 font-semibold">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($data as $user)
                        <tr class="hover:bg-gray-100">
                            <td class="py-3 px-4 text-gray-800">{{ $user->name }}</td>
                            <td class="py-3 px-4 text-gray-800">{{ $user->email }}</td>
                            <td class="py-3 px-4 text-gray-800">
                                <div class="flex justify-end space-x-2">
                                    <form action="" method="post">
                                        <button type="submit"
                                            class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 focus:ring focus:ring-blue-300">
                                            <i class="fas fa-edit mr-1"></i> Edit
                                        </button>
                                    </form>
                                    <form action="" method="post">
                                        <button type="submit"
                                            class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 focus:ring focus:ring-red-300">
                                            <i class="fas fa-trash mr-1"></i> Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
