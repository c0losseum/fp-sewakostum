<?= view('templates/header', ['title' => 'Register']) ?>

<div class="flex items-center justify-center min-h-screen">
    <div class="bg-white rounded-lg shadow-lg p-10 w-96">
        <h1 class="text-3xl font-bold text-yellow-600 text-center mb-4">REGISTER</h1>
        <p class="text-center mb-6">Daftarkan akun anda disini</p>

        <?php if(isset($validation)): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <?= $validation->listErrors() ?>
            </div>
        <?php endif; ?>

        <?= form_open('register') ?>
            <?= csrf_field() ?>
            <label class="block text-gray-700 mb-2">Nama</label>
            <input type="text" name="nama" placeholder="Masukkan Nama" class="w-full p-2 border rounded mb-4 bg-gray-100" value="<?= set_value('nama') ?>">
            
            <label class="block text-gray-700 mb-2">Email</label>
            <input type="email" name="email" placeholder="Masukkan Email" class="w-full p-2 border rounded mb-4 bg-gray-100" value="<?= set_value('email') ?>">
            
            <label class="block text-gray-700 mb-2">Password</label>
            <input type="password" name="password" placeholder="Masukkan Password" class="w-full p-2 border rounded mb-4 bg-gray-100">
            
            <label class="block text-gray-700 mb-2">No Telp</label>
            <input type="tel" name="no_telp" placeholder="Masukkan NO Telepon" class="w-full p-2 border rounded mb-6 bg-gray-100" value="<?= set_value('no_telp') ?>">
            
            <button type="submit" class="w-full bg-yellow-500 text-white py-2 rounded hover:bg-yellow-600 transition">REGISTER</button>
            
            <p class="mt-4 text-center text-sm">Sudah punya akun? <a href="<?= url_to('AuthController::login') ?>" class="text-blue-500">Login disini</a></p>
        <?= form_close() ?>
    </div>
</div>

<?= view('templates/footer') ?>