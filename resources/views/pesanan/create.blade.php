{{-- resources/views/pesanan/create.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pesanan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-sans">

<div class="max-w-5xl mx-auto px-4 py-12">

    {{-- Header --}}
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-purple-600">Tambah Pesanan</h1>
        <a href="{{ route('pesanan.index') }}" 
           class="bg-gray-200 text-gray-800 px-4 py-2 rounded-lg hover:bg-gray-300 transition">
           Kembali
        </a>
    </div>

    {{-- Notifikasi error --}}
    @if ($errors->any())
        <div class="mb-6 p-4 bg-red-100 text-red-800 rounded-lg">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form Card --}}
    <div class="bg-white rounded-xl shadow-lg p-8">
        <form action="{{ route('pesanan.store') }}" method="POST" class="space-y-6">
            @csrf

            {{-- Pilih Pelanggan --}}
            <div>
                <label for="pelanggan_id" class="block text-sm font-medium text-gray-700">Pelanggan</label>
                <select name="pelanggan_id" id="pelanggan_id"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500" required>
                    <option value="">-- Pilih Pelanggan --</option>
                    @foreach($pelanggans as $p)
                        <option value="{{ $p->id }}">{{ $p->nama }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Pilih Meja --}}
            <div>
                <label for="meja_id" class="block text-sm font-medium text-gray-700">Meja</label>
                <select name="meja_id" id="meja_id"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500" required>
                    <option value="">-- Pilih Meja --</option>
                    @foreach($mejas as $m)
                        <option value="{{ $m->id }}">Meja {{ $m->nomor_meja }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Tanggal Pesan --}}
            <div>
                <label for="tanggal_pesan" class="block text-sm font-medium text-gray-700">Tanggal Pesan</label>
                <input type="datetime-local" name="tanggal_pesan" id="tanggal_pesan"
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500" required>
            </div>

            {{-- Total DP --}}
            <div>
                <label for="total_dp" class="block text-sm font-medium text-gray-700">Total DP</label>
                <select name="total_dp" id="total_dp"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500" required>
                    <option value="50000">50.000</option>
                    <option value="100000">100.000</option>
                    <option value="150000">150.000</option>
                    <option value="200000">200.000</option>
                </select>
            </div>

            {{-- Submit --}}
            <div class="flex justify-end">
                <button type="submit" 
                        class="px-6 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition font-medium">
                        Simpan
                </button>
            </div>
        </form>
    </div>

</div>

</body>
</html>
