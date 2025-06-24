<?= $this->extend('templates/header') ?>

<?= $this->section('title') ?><?= esc($title) ?><?= $this->endSection() ?>

<?= $this->section('content') ?>
<main class="container mx-auto px-6 py-8">
    <section>
        <h2 class="text-2xl font-bold text-gray-800 mb-6">
            Hasil Pencarian untuk: "<?= esc($keyword) ?>"
        </h2>

        <?php if (!empty($costumes)): ?>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                <?php foreach ($costumes as $costume): ?>
                    <a href="<?= base_url('produk/' . $costume['id']) ?>" class="block bg-white rounded-lg shadow-md overflow-hidden transform hover:-translate-y-1 transition-transform duration-300">
                        <img src="<?= base_url('assets/images/' . esc($costume['image_url'])) ?>" alt="<?= esc($costume['name']) ?>" class="w-full h-64 object-cover">
                        <div class="p-4">
                            <h3 class="font-bold text-lg mb-2 truncate"><?= esc($costume['name']) ?></h3>
                            <p class="text-yellow-600 font-semibold mb-2">
                                Rp <?= number_format($costume['price'], 0, ',', '.') ?> / <?= esc($costume['rental_duration_days']) ?> hari
                            </p>
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-yellow-500" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                <span class="text-gray-600 font-bold ml-1"><?= esc($costume['rating']) ?></span>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="text-center py-16">
                <p class="text-gray-600 text-lg">Maaf, tidak ada kostum yang cocok dengan kata kunci "<?= esc($keyword) ?>".</p>
                <p class="text-gray-500 mt-2">Coba gunakan kata kunci lain.</p>
            </div>
        <?php endif; ?>

    </section>
</main>
<?= $this->endSection() ?>