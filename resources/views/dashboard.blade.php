<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restoran Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-sans">

    <!-- Header / Navbar -->
    <header class="bg-purple-600 text-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold">Restoran App</h1>
            <nav>
                <ul class="flex space-x-6">
                    <li><a href="{{ route('pelanggan.index') }}" class="hover:underline">Pelanggan</a></li>
                    <li><a href="{{ route('meja.index') }}" class="hover:underline">Meja</a></li>
                    <li><a href="{{ route('pesanan.index') }}" class="hover:underline">Pesanan</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="bg-cover bg-center h-96 relative" style="background-image: url('https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?auto=format&fit=crop&w=1350&q=80');">
        <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
            <div class="text-center text-white">
                <h2 class="text-4xl md:text-5xl font-bold mb-4 animate-fadeIn">Selamat Datang di Restoran App</h2>
                <p class="text-lg md:text-xl animate-fadeIn delay-200">Kelola pelanggan, meja, dan pesanan dengan mudah</p>
            </div>
        </div>
    </section>

    <!-- Statistik Ringkas -->
    <section class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto px-4 grid grid-cols-1 sm:grid-cols-3 gap-6">
            <div class="bg-white rounded-xl shadow-lg p-6 text-center">
                <h3 class="text-xl font-semibold mb-2">Pelanggan</h3>
                <p class="text-3xl font-bold text-purple-600">{{ \App\Models\Pelanggan::count() }}</p>
            </div>
            <div class="bg-white rounded-xl shadow-lg p-6 text-center">
                <h3 class="text-xl font-semibold mb-2">Meja</h3>
                <p class="text-3xl font-bold text-purple-600">{{ \App\Models\Meja::count() }}</p>
            </div>
            <div class="bg-white rounded-xl shadow-lg p-6 text-center">
                <h3 class="text-xl font-semibold mb-2">Pesanan</h3>
                <p class="text-3xl font-bold text-purple-600">{{ \App\Models\Pesanan::count() }}</p>
            </div>
        </div>
    </section>

    <!-- Menu Navigasi -->
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-4 grid grid-cols-1 sm:grid-cols-3 gap-8">
            <!-- Pelanggan Card -->
            <div class="bg-white rounded-xl shadow-lg p-8 text-center hover:scale-105 transform transition duration-300">
                <img src="https://img.icons8.com/fluency/96/8e44ad/user-group-man-man.png" class="mx-auto mb-4" alt="Pelanggan">
                <h3 class="text-xl font-semibold mb-2">Pelanggan</h3>
                <p class="text-gray-500 mb-4">Kelola semua data pelanggan restoran</p>
                <a href="{{ route('pelanggan.index') }}" class="bg-purple-600 text-white px-6 py-2 rounded-lg hover:bg-purple-700 transition">Masuk</a>
            </div>

            <!-- Meja Card -->
            <div class="bg-white rounded-xl shadow-lg p-8 text-center hover:scale-105 transform transition duration-300">
                <img src="https://img.icons8.com/fluency/96/8e44ad/restaurant-table.png" class="mx-auto mb-4" alt="Meja">
                <h3 class="text-xl font-semibold mb-2">Meja</h3>
                <p class="text-gray-500 mb-4">Atur ketersediaan dan kapasitas meja</p>
                <a href="{{ route('meja.index') }}" class="bg-purple-600 text-white px-6 py-2 rounded-lg hover:bg-purple-700 transition">Masuk</a>
            </div>

            <!-- Pesanan Card -->
            <div class="bg-white rounded-xl shadow-lg p-8 text-center hover:scale-105 transform transition duration-300">
                <img src="https://img.icons8.com/fluency/96/8e44ad/shopping-cart.png" class="mx-auto mb-4" alt="Pesanan">
                <h3 class="text-xl font-semibold mb-2">Pesanan</h3>
                <p class="text-gray-500 mb-4">Lihat dan kelola semua pesanan</p>
                <a href="{{ route('pesanan.index') }}" class="bg-purple-600 text-white px-6 py-2 rounded-lg hover:bg-purple-700 transition">Masuk</a>
            </div>
        </div>
    </section>

    <!-- Pesanan Terbaru -->
    <section class="py-12 max-w-7xl mx-auto px-4">
        <h2 class="text-2xl font-bold mb-6">Pesanan Terbaru</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white shadow-md rounded-lg">
                <thead>
                    <tr class="bg-purple-600 text-white">
                        <th class="py-3 px-6 text-left">ID</th>
                        <th class="py-3 px-6 text-left">Pelanggan</th>
                        <th class="py-3 px-6 text-left">Meja</th>
                        <th class="py-3 px-6 text-left">Tanggal</th>
                        <th class="py-3 px-6 text-left">DP</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(\App\Models\Pesanan::latest()->take(5)->get() as $p)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="py-3 px-6">{{ $p->id }}</td>
                        <td class="py-3 px-6">{{ $p->pelanggan->nama }}</td>
                        <td class="py-3 px-6">Meja {{ $p->meja->nomor_meja }}</td>
                        <td class="py-3 px-6">{{ date('d-m-Y H:i', strtotime($p->tanggal_pesan)) }}</td>
                        <td class="py-3 px-6">Rp {{ number_format($p->total_dp, 0, ',', '.') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-100 py-6 mt-16 text-center text-gray-600">
        &copy; {{ date('Y') }} Restoran App. All rights reserved.
    </footer>

</body>
</html>
