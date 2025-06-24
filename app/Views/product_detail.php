<?= $this->extend('templates/header') ?>

<?= $this->section('title') ?><?= esc($title) ?><?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        
        <div x-data="{ mainImage: '<?= !empty($images) ? base_url('assets/images/' . esc($images[0]['image_url'])) : base_url('assets/images/' . esc($costume['image_url'])) ?>' }">
            <div class="mb-4">
                <img :src="mainImage" alt="Produk Utama" class="w-full h-auto max-h-[500px] object-contain rounded-lg shadow-lg">
            </div>
            <div class="flex space-x-2">
                <?php if (!empty($images)): ?>
                    <?php foreach($images as $img): ?>
                        <img @click="mainImage = '<?= base_url('assets/images/' . esc($img['image_url'])) ?>'" src="<?= base_url('assets/images/' . esc($img['image_url'])) ?>" alt="Thumbnail" class="w-20 h-20 object-cover rounded-md cursor-pointer border-2 hover:border-yellow-500">
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <div class="flex space-x-4 mt-6">
                <button class="w-full py-3 bg-yellow-400 text-gray-800 font-bold rounded-lg hover:bg-yellow-500 transition">Simpan</button>
                <button class="w-full py-3 bg-gray-200 text-gray-800 font-bold rounded-lg hover:bg-gray-300 transition">Bagikan</button>
            </div>
        </div>

        <div>
            <h1 class="text-3xl font-bold text-gray-900"><?= esc($costume['name']) ?></h1>
            <p class="text-md text-gray-600 mb-2">Kategori: <?= esc($costume['category_name']) ?></p>
            <div class="flex items-center mb-4">
                <div class="flex text-yellow-500">
                    <?php for($i = 0; $i < 5; $i++): ?>
                        <svg class="w-5 h-5" fill="<?= $i < round($costume['rating']) ? 'currentColor' : 'none' ?>" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.846 5.651a1 1 0 00.95.69h5.932c.969 0 1.371 1.24.588 1.81l-4.8 3.51a1 1 0 00-.364 1.118l1.846 5.651c.3.921-.755 1.688-1.54 1.118l-4.8-3.51a1 1 0 00-1.175 0l-4.8 3.51c-.784.57-1.838-.197-1.539-1.118l1.846-5.651a1 1 0 00-.364-1.118l-4.8-3.51c-.783-.57-.38-1.81.588-1.81h5.932a1 1 0 00.95-.69l1.846-5.651z" /></svg>
                    <?php endfor; ?>
                </div>
                <span class="ml-2 text-gray-700 font-semibold"><?= esc($costume['rating']) ?> (<?= count($reviews) ?> Ulasan)</span>
            </div>
            
            <p class="text-4xl font-extrabold text-gray-900 mb-4">Rp <?= number_format($costume['price'], 0, ',', '.') ?> / <?= esc($costume['rental_duration_days']) ?> Hari</p>
            
            <h3 class="font-bold text-lg mb-2">Deskripsi Produk</h3>
            <p class="text-gray-600 mb-6"><?= esc($costume['description'] ?? 'Tidak ada deskripsi untuk produk ini.') ?></p>

            <div class="mb-6">
                <h3 class="font-bold text-lg mb-2">Pilih Ukuran</h3>
                <div class="flex flex-wrap gap-2">
                    <?php foreach($sizes as $index => $size): ?>
                        <button class="px-4 py-2 border rounded-lg <?= $index == 0 ? 'bg-yellow-500 text-white border-yellow-500' : 'bg-white text-gray-700 border-gray-300' ?> hover:border-yellow-500"><?= esc($size['size']) ?></button>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="mb-6">
                <h3 class="font-bold text-lg mb-2">Durasi Sewa</h3>
                <div class="flex flex-wrap gap-2">
                     <?php foreach($pricing as $index => $price_option): ?>
                        <button class="px-4 py-2 border rounded-lg <?= $price_option['duration_days'] == $costume['rental_duration_days'] ? 'bg-yellow-500 text-white border-yellow-500' : 'bg-white text-gray-700 border-gray-300' ?> hover:border-yellow-500">
                            <span class="block font-bold"><?= esc($price_option['duration_days']) ?> Hari</span>
                            <span class="block text-xs">Rp <?= number_format($price_option['price'], 0, ',', '.') ?></span>
                        </button>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="flex items-center space-x-4 mb-6">
                <h3 class="font-bold text-lg">Jumlah</h3>
                <div class="flex items-center border rounded-lg">
                    <button class="px-3 py-1 text-lg">-</button>
                    <input type="text" value="1" class="w-12 text-center border-l border-r">
                    <button class="px-3 py-1 text-lg">+</button>
                </div>
                <p class="text-gray-600">Stok Tersedia: <?= esc($costume['stock']) ?></p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <button class="w-full py-3 bg-yellow-100 text-yellow-800 font-bold rounded-lg border border-yellow-500 hover:bg-yellow-200 transition">Tambah Keranjang</button>
                <button class="w-full py-3 bg-green-500 text-white font-bold rounded-lg hover:bg-green-600 transition">Sewa Sekarang</button>
            </div>
        </div>
    </div>

    <div class="mt-12 pt-8 border-t">
        <h2 class="text-2xl font-bold text-gray-900 mb-6">Ulasan dan Rating</h2>
        <div class="space-y-6">
            <?php if (!empty($reviews)): ?>
                <?php foreach($reviews as $review): ?>
                    <div class="flex space-x-4">
                        <div class="w-12 h-12 bg-gray-200 rounded-full flex-shrink-0"></div>
                        <div>
                            <p class="font-bold text-gray-800"><?= esc($review['user_name']) ?></p>
                            <p class="text-sm text-gray-500"><?= date('d F Y', strtotime($review['created_at'])) ?></p>
                            <div class="flex text-yellow-500 my-1">
                                <?php for($i = 0; $i < 5; $i++): echo $i < $review['rating'] ? '<svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>' : ''; endfor; ?>
                            </div>
                            <p class="text-gray-700"><?= esc($review['comment']) ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="text-gray-600">Belum ada ulasan untuk produk ini.</p>
            <?php endif; ?>
        </div>
    </div>
</div>
<?= $this->endSection() ?>