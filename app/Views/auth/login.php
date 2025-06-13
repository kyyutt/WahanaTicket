<?= $this->extend('layouts/auth') ?>

<?= $this->section('content') ?>
<main class="main-container">
    <section class="image-side" aria-label="Scenic Landscape"></section>
    <section class="form-side" aria-label="User Login Form">
        <form class="login-card" action="<?= base_url('auth/login') ?>" method="post">
            <?= csrf_field() ?>
            <h2>Login</h2>
            <p class="subtitle">Sign into your account</p>
            <div class="input-group-with-icon mb-3">
                <span class="material-icons input-icon">email</span>
                <input type="text" name="username" class="form-control" placeholder="Username" required />
            </div>
            <div class="input-group-with-icon mb-3">
                <span class="material-icons input-icon">lock</span>
                <input type="password" name="password" class="form-control" placeholder="Password" required />
            </div>
            <div class="options-row">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="rememberMe" />
                    <label class="form-check-label" for="rememberMe">Remember me</label>
                </div>
                <a href="#">Forgot password?</a>
            </div>
            <button type="submit" class="btn btn-primary-custom text-white">Sign In</button>
        </form>
    </section>
</main>
<?= $this->endSection() ?>