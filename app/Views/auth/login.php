<?= $this->extend('templates/header') ?>

<?= $this->section('title') ?>
    Login - My Costume
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="flex items-center justify-center py-12 px-6" style="min-height: calc(100vh - 140px);">
    <div class="max-w-md w-full bg-white p-8 rounded-lg shadow-lg">
        <div class="text-center mb-6">
            <svg class="w-16 h-16 mx-auto text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 12c-3.313 0-6-1.343-6-3s2.687-3 6-3 6 1.343 6 3-2.687 3-6 3z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M21 12.7C21 16.194 17.97 19 12 19s-9-2.806-9-6.3m16.6-8.65A10.042 10.042 0 0112 2c-5.524 0-10 4.477-10 10 0 4.608 5.489 8.428 11.6 9.193M12 2c3 0 5 .837 6.4 1.85M8.2 11A8.2 8.2 0 0112 3.8M8 12h1.8c-.36.536-.8 1-1.5 1H8v-1zm8 0h-1.8c.36.536.8 1 1.5 1H16v-1Z" />
            </svg>
            <h1 class="text-3xl font-bold mt-2">My Custom</h1>
            <p class="text-gray-600">Masuk ke akun anda</p>
        </div>

        <?php if(session()->getFlashdata('success')): ?>
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                <p><?= session()->getFlashdata('success') ?></p>
            </div>
        <?php endif; ?>

        <?php if(session()->getFlashdata('error')): ?>
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4" role="alert">
                <p><?= session()->getFlashdata('error') ?></p>
            </div>
        <?php endif; ?>

        <?php if(isset($validation)): ?>
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4" role="alert">
                <?= $validation->listErrors() ?>
            </div>
        <?php endif; ?>

        <?= form_open('login') ?>
            <?= csrf_field() ?>
            <div class="mb-4">
                <label class="block text-gray-700 mb-1" for="email">Email</label>
                <input class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:border-yellow-500" type="email" id="email" name="email" placeholder="contoh@email.com" value="<?= set_value('email') ?>" required>
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 mb-1" for="password">Password</label>
                <input class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:border-yellow-500" type="password" id="password" name="password" placeholder="Masukkan Password" required>
            </div>
            <button class="w-full p-3 bg-yellow-500 text-white font-bold rounded-lg hover:bg-yellow-600 transition duration-200" type="submit">LOGIN</button>
        <?= form_close() ?>
        <p class="mt-6 text-center text-gray-600">
            Jika anda belum memiliki akun? <a href="<?= base_url('register') ?>" class="text-blue-500 hover:underline">Bisa daftar di sini</a>
        </p>
    </div>
</div>
<?= $this->endSection() ?>