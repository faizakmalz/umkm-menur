<x-layouts.app :title="'Kelola Toko'">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-xl font-bold">Daftar UMKM</h1>
        <div class="flex gap-4 items-center">
            <input
                type="text"
                id="searchInput"
                placeholder="Cari toko..."
                class="px-3 py-2 border rounded text-sm"
            />
            <a href="{{ route('admin.tokos.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded">+ Tambah Toko</a>
        </div>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">{{ session('success') }}</div>
    @endif

    <div class="space-y-4 grid grid-cols-2 gap-4" id="tokoList">
        @foreach($tokos as $toko)
            <div class="toko-card p-4 bg-white border border-[bg-zinc-800] dark:bg-zinc-800 rounded-lg shadow flex justify-between items-center"
                data-name="{{ strtolower($toko->nama_toko) }}">
                <div class="flex gap-5">
                    <div class="rounded-lg">
                        @if($toko->logo)
                            <img src="{{ asset('storage/' . $toko->logo) }}" alt="Logo {{ $toko->nama_toko }}" class="h-32 mx-auto rounded-lg shadow object-cover mb-2" />
                        @else
                            <img src="{{ asset('default-toko-logo.webp') }}" alt="Default Logo" class="h-32 w-full mx-auto rounded-lg shadow object-cover mb-2" />
                        @endif
                    </div>
                    <div>
                        <h2 class="font-semibold">{{ $toko->nama_toko }}</h2>
                        <p class="text-sm text-gray-500">{{ $toko->alamat }}</p>
                        <p class="text-sm text-gray-500">{{ $toko->no_telepon }}</p>
                    </div>
                </div>
                <div class="flex gap-2">
                    <a href="{{ route('admin.tokos.edit', $toko) }}" class="px-4 py-2 bg-blue-600 text-white rounded">Edit</a>
                    <form method="POST" action="{{ route('admin.tokos.destroy', $toko) }}">
                        @csrf @method('DELETE')
                        <button onclick="return confirm('Yakin?')" class="px-4 py-2 bg-red-600 text-white rounded">Hapus</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
    <script>
        document.getElementById('searchInput').addEventListener('input', function () {
            const keyword = this.value.toLowerCase();
            const cards = document.querySelectorAll('.toko-card');

            cards.forEach(card => {
                const name = card.getAttribute('data-name');
                card.style.display = name.includes(keyword) ? 'flex' : 'none';
            });
        });
    </script>
</x-layouts.app>
