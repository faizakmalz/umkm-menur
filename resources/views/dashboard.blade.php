<x-layouts.app :title="__('Dashboard')">
    <div class="flex flex-col gap-6">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-white">Admin UMKM Menur</h1>

        {{-- Stats --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="p-4 bg-white dark:bg-zinc-800 rounded-lg shadow">
                <h2 class="text-sm text-gray-500">Total Toko</h2>
                <p class="text-2xl font-semibold">{{ \App\Models\Toko::count() }}</p>
            </div>
            <div class="p-4 bg-white dark:bg-zinc-800 rounded-lg shadow">
                <h2 class="text-sm text-gray-500">Total Menu</h2>
                <p class="text-2xl font-semibold">{{ \App\Models\Menu::count() }}</p>
            </div>
            <div class="p-4 bg-white dark:bg-zinc-800 rounded-lg shadow">
                <h2 class="text-sm text-gray-500">Kategori Produk</h2>
                <p class="text-2xl font-semibold">{{ \App\Models\Category::count() }}</p>
            </div>
        </div>

        {{-- Recent Toko --}}
        <div class="bg-white dark:bg-zinc-800 rounded-lg shadow p-4">
            <h2 class="text-lg font-semibold mb-4">Toko Terbaru</h2>
            <div class="space-y-4">
                @foreach(\App\Models\Toko::latest()->take(5)->get() as $toko)
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="font-medium">{{ $toko->nama_toko }}</p>
                            <p class="text-sm text-gray-500">{{ \Illuminate\Support\Str::limit($toko->deskripsi, 60) }}</p>
                        </div>
                        <a href="{{ route('toko.detail', $toko->id) }}" class="text-blue-500 text-sm">Lihat</a>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Recent Menu --}}
        <div class="bg-white dark:bg-zinc-800 rounded-lg shadow p-4">
            <h2 class="text-lg font-semibold mb-4">Menu Terbaru</h2>
            <div class="space-y-4">
                @foreach(\App\Models\Menu::latest()->take(5)->get() as $menu)
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="font-medium">{{ $menu->nama_menu }}</p>
                            <p class="text-sm text-gray-500">Rp {{ number_format($menu->harga, 0, ',', '.') }}</p>
                        </div>
                        <p class="text-sm text-gray-400">{{ $menu->toko->nama_toko ?? '-' }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-layouts.app>
