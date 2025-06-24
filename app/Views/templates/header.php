<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->renderSection('title') ?? 'My Costume' ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-sans">

    <header class="bg-white shadow-sm sticky top-0 z-50">
        <nav class="container mx-auto px-6 py-3 flex justify-between items-center">
            
            <div class="flex-shrink-0">
                <a href="<?= base_url('/') ?>" class="text-2xl font-bold text-gray-800">My Costume</a>
            </div>

            <div class="hidden md:flex flex-grow items-center justify-center space-x-6">
                <div class="w-full max-w-xs">
                    <form action="<?= base_url('search') ?>" method="get" class="w-full">
                        <div class="relative">
                            <input 
                                type="search" 
                                name="keyword" 
                                placeholder="Cari kostum..." 
                                class="w-full bg-gray-100 border border-gray-200 rounded-full py-2 px-4 focus:outline-none focus:border-yellow-500 text-sm"
                                value="<?= esc(request()->getGet('keyword')) ?>"
                            >
                            <button type="submit" class="absolute right-0 top-0 mt-2.5 mr-4">
                                <svg class="w-4 h-4 text-gray-500" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                            </button>
                        </div>
                    </form>
                </div>
                <a href="<?= base_url('/') ?>" class="text-gray-600 hover:text-yellow-500 font-semibold">Home</a>
                <a href="<?= base_url('pesanan') ?>" class="text-gray-600 hover:text-yellow-500 font-semibold">Pesanan</a>
                <a href="<?= base_url('tentang-kami') ?>" class="text-gray-600 hover:text-yellow-500 font-semibold">Tentang Kami</a>
                
    
            </div>

            <div class="hidden md:flex items-center space-x-4 flex-shrink-0">
                <?php if (session()->get('isLoggedIn')): ?>
                    <span class="text-gray-700">Halo, <?= esc(session()->get('nama')) ?></span>
                    <a href="<?= base_url('logout') ?>" class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600 text-sm font-semibold">Logout</a>
                <?php else: ?>
                    <a href="<?= base_url('login') ?>" class="px-4 py-2 bg-yellow-500 text-white rounded-md hover:bg-yellow-600 text-sm font-semibold">Login</a>
                    <a href="<?= base_url('register') ?>" class="px-4 py-2 bg-gray-700 text-white rounded-md hover:bg-gray-800 text-sm font-semibold">Register</a>
                <?php endif; ?>
            </div>

            <div class="md:hidden">
                <button id="mobile-menu-button">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
                </button>
            </div>
        </nav>

        <div id="mobile-menu" class="hidden md:hidden px-4 pt-2 pb-4 space-y-2">
            <a href="<?= base_url('/') ?>" class="block text-gray-600 hover:text-yellow-500 font-semibold">Home</a>
            <a href="<?= base_url('pesanan') ?>" class="block text-gray-600 hover:text-yellow-500 font-semibold">Pesanan</a>
            <a href="<?= base_url('tentang-kami') ?>" class="block text-gray-600 hover:text-yellow-500 font-semibold">Tentang Kami</a>
            <hr>
            <?php if (session()->get('isLoggedIn')): ?>
                <a href="<?= base_url('logout') ?>" class="block text-red-500 font-semibold">Logout</a>
            <?php else: ?>
                <a href="<?= base_url('login') ?>" class="block text-yellow-500 font-semibold">Login</a>
                <a href="<?= base_url('register') ?>" class="block text-gray-700 font-semibold">Register</a>
            <?php endif; ?>
        </div>
    </header>
    <?= $this->renderSection('content') ?>

    <footer class="bg-white mt-12 py-6">
        <div class="container mx-auto text-center text-gray-600">
            &copy; <?= date('Y') ?> My Costume
        </div>
    </footer>
    
    <script>
        // Script sederhana untuk toggle menu mobile
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>

</body>
</html>