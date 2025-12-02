<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pesanan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-sans">

<div class="max-w-7xl mx-auto px-4 py-12">

    {{-- Header dan tombol tambah --}}
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-3xl font-bold text-purple-600">Daftar Pesanan</h2>
        <a href="{{ route('pesanan.create') }}" 
           class="bg-purple-600 text-white px-5 py-2 rounded-lg hover:bg-purple-700 transition">
           + Tambah Pesanan
        </a>
    </div>

    {{-- Notifikasi sukses --}}
    @if(session('success'))
    <div class="bg-green-100 text-green-700 px-4 py-2 rounded-lg mb-4">
        {{ session('success') }}
    </div>
    @endif

    {{-- Tabel daftar pesanan --}}
    <div class="overflow-x-auto bg-white rounded-xl shadow-lg">
        <table class="min-w-full table-auto divide-y divide-gray-200">
            <thead class="bg-purple-600 text-white">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-medium uppercase">ID</th>
                    <th class="px-6 py-3 text-left text-sm font-medium uppercase">Pelanggan</th>
                    <th class="px-6 py-3 text-left text-sm font-medium uppercase">Meja</th>
                    <th class="px-6 py-3 text-left text-sm font-medium uppercase">Tanggal Pesan</th>
                    <th class="px-6 py-3 text-left text-sm font-medium uppercase">Total DP</th>
                    <th class="px-6 py-3 text-left text-sm font-medium uppercase">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                {{-- Looping tiap pesanan --}}
                @foreach($pesanans as $p)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 text-gray-700">{{ $p->id }}</td>
                    <td class="px-6 py-4 text-gray-700">{{ $p->pelanggan->nama }}</td>
                    <td class="px-6 py-4 text-gray-700">{{ $p->meja->nomor_meja }}</td>
                    <td class="px-6 py-4 text-gray-700">{{ $p->tanggal_pesan }}</td>
                    <td class="px-6 py-4 text-gray-700">Rp {{ number_format($p->total_dp, 0, ',', '.') }}</td>
                    <td class="px-6 py-4 flex space-x-2">
                        {{-- Tombol edit --}}
                        <a href="{{ route('pesanan.edit', $p->id) }}" 
                           class="px-3 py-1 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition text-sm">
                           Edit
                        </a>

                        {{-- Tombol hapus --}}
                        <form action="{{ route('pesanan.destroy', $p->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    onclick="return confirm('Hapus pesanan?')" 
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
    