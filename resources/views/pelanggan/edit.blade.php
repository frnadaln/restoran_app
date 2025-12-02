{{-- resources/views/pelanggan/edit.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pelanggan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-sans">

<div class="max-w-4xl mx-auto px-4 py-12">

    {{-- Header --}}
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-purple-600">Edit Pelanggan</h1>
        <a href="{{ route('pelanggan.index') }}" 
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
        <form action="{{ route('pelanggan.update', $pelanggan->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            {{-- Nama --}}
            <div>
                <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                <input type="text" name="nama" id="nama" 
                       value="{{ $pelanggan->nama }}"
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500" 
                       placeholder="Masukkan nama pelanggan" required>
            </div>

            {{-- Nomor Telepon --}}
            <div>
                <label for="nomor_telepon" class="block text-sm font-medium text-gray-700">Nomor Telepon</label>
                <input type="text" name="nomor_telepon" id="nomor_telepon" 
                       value="{{ $pelanggan->nomor_telepon }}"
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500" 
                       placeholder="Masukkan nomor telepon" required>
            </div>

            {{-- Submit --}}
            <div class="flex justify-end">
                <button type="submit" 
                        class="px-6 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition font-medium">
                        Update
                </button>
            </div>
        </form>
    </div>

</div>

</body>
</html>
