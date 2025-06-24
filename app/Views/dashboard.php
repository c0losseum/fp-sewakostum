<?= $this->extend('templates/header') ?>

<?= $this->section('title') ?>
    Selamat Datang di My Costume
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<main class="container mx-auto px-6 py-8">
    
    <section class="mb-12">
        <div 
            x-data="{ 
                slide: 0, 
                maxSlides: <?= count($carouselImages) ?>,
                autoplay() {
                    setInterval(() => { this.slide = (this.slide + 1) % this.maxSlides }, 5000)
                }
            }" 
            x-init="autoplay()"
            class="relative w-full h-56 md:h-80 rounded-lg shadow-lg overflow-hidden"
        >
            <?php foreach ($carouselImages as $index => $image): ?>
                <div 
                    x-show="slide === <?= $index ?>" 
                    class="absolute inset-0 transition-opacity duration-1000 ease-in-out"
                    x-transition:enter="opacity-0"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    x-transition:leave="opacity-100"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                >
                    <img 
                        src="<?= base_url('public/img/image.png' . esc($image['src'])) ?>" 
                        alt="<?= esc($image['alt']) ?>" 
                        class="w-full h-full object-cover"
                    >
                </div>
            <?php endforeach; ?>

            <div class="absolute bottom-4 left-1/2 -translate-x-1/2 flex space-x-2">
                <?php foreach ($carouselImages as $index => $image): ?>
                    <button 
                        @click="slide = <?= $index ?>"
                        :class="{'bg-white': slide === <?= $index ?>, 'bg-white/50': slide !== <?= $index ?>}"
                        class="w-3 h-3 rounded-full hover:bg-white transition"
                    ></button>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="mb-12">
        <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Kategori Populer</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
            <?php if (!empty($categories)): ?>
                <?php foreach ($categories as $category): ?>
                    <div class="flex flex-col items-center p-4 rounded-lg hover:bg-gray-100 transition">
                        <img src="<?= esc($category['image_url']) ?>" alt="<?= esc($category['name']) ?>" class="w-24 h-24 object-cover rounded-full shadow-md mb-2">
                        <span class="font-semibold text-gray-700 mt-2"><?= esc($category['name']) ?></span>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </section>

    <section>
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Rekomendasi Untukmu</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            <?php if (!empty($costumes)): ?>
                <?php foreach ($costumes as $costume): ?>
                    <a href="<?= base_url('produk/' . $costume['id']) ?>" class="block bg-white rounded-lg shadow-md overflow-hidden transform hover:-translate-y-1 transition-transform duration-300">
                        <img src="<?= base_url('public/assets/image/' . esc($costume['image_url'])) ?>" alt="<?= esc($costume['name']) ?>" class="w-full h-64 object-cover">
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
            <?php endif; ?>
        </div>
    </section>

</main>
<?= $this->endSection() ?>