<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Meja</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-sans">

    <div class="max-w-7xl mx-auto px-4 py-12">

        {{-- Header dan tombol tambah --}}
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-purple-600">Data Meja</h1>
            <a href="{{ route('meja.create') }}" 
               class="bg-purple-600 text-white px-5 py-2 rounded-lg hover:bg-purple-700 transition">
               + Tambah Meja
            </a>
        </div>

        {{-- Notifikasi sukses --}}
        @if(session('success'))
        <div class="bg-green-100 text-green-700 px-4 py-2 rounded-lg mb-4">
            {{ session('success') }}
        </div>
        @endif

        {{-- Tabel daftar meja --}}
        <div class="overflow-x-auto bg-white rounded-xl shadow-lg">
            <table class="min-w-full table-auto divide-y divide-gray-200">
                <thead class="bg-purple-600 text-white">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-medium uppercase">ID</th>
                        <th class="px-6 py-3 text-left text-sm font-medium uppercase">Nomor Meja</th>
                        <th class="px-6 py-3 text-left text-sm font-medium uppercase">Kapasitas</th>
                        <th class="px-6 py-3 text-left text-sm font-medium uppercase">Minimum Spent</th>
                        <th class="px-6 py-3 text-left text-sm font-medium uppercase">Status</th>
                        <th class="px-6 py-3 text-left text-sm font-medium uppercase">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    {{-- Looping tiap meja --}}
                    @foreach($meja as $m)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 text-gray-700">{{ $m->id }}</td>
                        <td class="px-6 py-4 text-gray-700">{{ $m->nomor_meja }}</td>
                        <td class="px-6 py-4 text-gray-700">{{ $m->kapasitas }}</td>
                        <td class="px-6 py-4 text-gray-700">Rp {{ number_format($m->minimum_spent, 0, ',', '.') }}</td>
                        <td class="px-6 py-4">
                            @if($m->status === 'tersedia')
                                <span class="px-3 py-1 rounded-full bg-green-100 text-green-800 text-sm font-semibold">Tersedia</span>
                            @else
                                <span class="px-3 py-1 rounded-full bg-red-100 text-red-800 text-sm font-semibold">Terisi</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 flex space-x-2">
                            {{-- Tombol edit --}}
                            <a href="{{ route('meja.edit', $m->id) }}" 
                               class="px-3 py-1 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition text-sm">
                               Edit
                            </a>

                            {{-- Tombol hapus --}}
                            <form action="{{ route('meja.destroy', $m->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        onclick="return confirm('Yakin ingin menghapus?')" 
                                        class="px-3 py-1 bg-red-600 text-white rounded-lg hover:bg-red-700 transition text-sm">
                                        Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

</body>
</html>
