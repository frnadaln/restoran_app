{{-- resources/views/meja/create.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Meja</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-sans">

<div class="max-w-4xl mx-auto px-4 py-12">

    {{-- Header --}}
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-purple-600">Tambah Meja</h1>
        <a href="{{ route('meja.index') }}" 
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
        <form action="{{ route('meja.store') }}" method="POST" class="space-y-6">
            @csrf

            {{-- Nomor Meja --}}
            <div>
                <label for="nomor_meja" class="block text-sm font-medium text-gray-700">Nomor Meja</label>
                <input type="number" name="nomor_meja" id="nomor_meja"
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500" 
                       placeholder="Masukkan nomor meja" required>
            </div>

            {{-- Kapasitas --}}
            <div>
                <label for="kapasitas" class="block text-sm font-medium text-gray-700">Kapasitas</label>
                <input type="number" name="kapasitas" id="kapasitas"
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500" 
                       placeholder="Masukkan kapasitas" required>
            </div>

            {{-- Minimum Spent --}}
            <div>
                <label for="minimum_spent" class="block text-sm font-medium text-gray-700">Minimum Spent</label>
                <select name="minimum_spent" id="minimum_spent"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500">
                    <option value="100000">Rp 100.000</option>
                    <option value="200000">Rp 200.000</option>
                    <option value="300000">Rp 300.000</option>
                    <option value="400000">Rp 400.000</option>
                </select>
            </div>

            {{-- Status --}}
            <div>
                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                <select name="status" id="status"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500">
                    <option value="tersedia">Tersedia</option>
                    <option value="terisi">Terisi</option>
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
