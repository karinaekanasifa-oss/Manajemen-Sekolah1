<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Login Pure HTML & CSS</title>
    <!-- Google Fonts (Poppins) -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* ==========================================
           RESET & BASIC STYLES
           ========================================== */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #0f172a 0%, #1e1b4b 50%, #311042 100%);
            padding: 20px;
            overflow-x: hidden;
            position: relative;
        }

        /* Ambient Decorative Glowing Orbs */
        body::before,
        body::after {
            content: '';
            position: absolute;
            width: 280px;
            height: 280px;
            border-radius: 50%;
            filter: blur(90px);
            z-index: 0;
        }

        body::before {
            background: #6366f1;
            top: 15%;
            left: 20%;
        }

        body::after {
            background: #a855f7;
            bottom: 15%;
            right: 20%;
        }

        /* ==========================================
           CARD CONTAINER (GLASSMORPHISM)
           ========================================== */
        .login-card {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 420px;
            background: rgba(255, 255, 255, 0.07);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 24px;
            padding: 40px 32px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            color: #ffffff;
        }

        /* Header Form */
        .login-header {
            text-align: center;
            margin-bottom: 32px;
        }

        .login-header h2 {
            font-size: 28px;
            font-weight: 700;
            letter-spacing: -0.5px;
            margin-bottom: 6px;
        }

        .login-header p {
            font-size: 13px;
            color: #cbd5e1;
        }

        /* ==========================================
           FLOATING LABELS & INPUT GROUPS
           ========================================== */
        .input-group {
            position: relative;
            margin-bottom: 24px;
        }

        .input-control {
            width: 100%;
            padding: 16px;
            background: rgba(15, 23, 42, 0.5);
            border: 1.5px solid rgba(255, 255, 255, 0.15);
            border-radius: 14px;
            outline: none;
            color: #ffffff;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        /* Floating Label Text */
        .floating-label {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 14px;
            color: #94a3b8;
            pointer-events: none;
            transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
            background: transparent;
            padding: 0 4px;
        }

        /* CSS Animation ketika Input Di-focus atau Terisi */
        .input-control:focus ~ .floating-label,
        .input-control:not(:placeholder-shown) ~ .floating-label {
            top: 0;
            transform: translateY(-50%) scale(0.85);
            color: #818cf8;
            font-weight: 500;
            background: #1e1b4b;
            border-radius: 4px;
        }

        /* Visual Feedback untuk Validation State */
        .input-control:focus {
            border-color: #6366f1;
            box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.2);
        }

        .input-control:not(:placeholder-shown):valid {
            border-color: #10b981;
        }

        .input-control:not(:placeholder-shown):invalid {
            border-color: #f43f5e;
        }

        /* ==========================================
           PURE CSS SHOW/HIDE PASSWORD TRICK
           ========================================== */
        .password-wrapper {
            position: relative;
        }

        /* Sembunyikan Checkbox Asli */
        .toggle-password-checkbox {
            display: none;
        }

        /* Style Icon Toggle Password */
        .toggle-password-btn {
            position: absolute;
            right: 14px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #94a3b8;
            user-select: none;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 4px;
            transition: color 0.2s;
            z-index: 2;
        }

        .toggle-password-btn:hover {
            color: #ffffff;
        }

        /* SVG Icon Display Logic */
        .eye-icon { display: block; }
        .eye-off-icon { display: none; }

        /* Ketika checkbox di-check: tampilkan password & ganti icon */
        .toggle-password-checkbox:checked ~ .password-wrapper .input-control {
            -webkit-text-security: none !important;
        }

        /* Trik Mengubah Tipe Visual Password melalui Text Security */
        .password-control {
            -webkit-text-security: disc;
        }

        .toggle-password-checkbox:checked ~ .password-wrapper .toggle-password-btn .eye-icon {
            display: none;
        }
        .toggle-password-checkbox:checked ~ .password-wrapper .toggle-password-btn .eye-off-icon {
            display: block;
        }

        /* ==========================================
           REMEMBER ME & FORGOT PASSWORD
           ========================================== */
        .form-options {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 28px;
            font-size: 13px;
        }

        .remember-me {
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            color: #cbd5e1;
            user-select: none;
        }

        .remember-me input[type="checkbox"] {
            appearance: none;
            -webkit-appearance: none;
            width: 18px;
            height: 18px;
            border: 1.5px solid rgba(255, 255, 255, 0.3);
            border-radius: 6px;
            background: rgba(15, 23, 42, 0.4);
            cursor: pointer;
            position: relative;
            transition: all 0.2s;
        }

        .remember-me input[type="checkbox"]:checked {
            background-color: #6366f1;
            border-color: #6366f1;
        }

        .remember-me input[type="checkbox"]:checked::after {
            content: '';
            position: absolute;
            left: 5px;
            top: 2px;
            width: 5px;
            height: 9px;
            border: solid white;
            border-width: 0 2px 2px 0;
            transform: rotate(45deg);
        }

        .forgot-link {
            color: #818cf8;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.2s;
        }

        .forgot-link:hover {
            color: #a5b4fc;
            text-decoration: underline;
        }

        /* ==========================================
           SUBMIT BUTTON
           ========================================== */
        .btn-submit {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #6366f1 0%, #4f46e5 100%);
            color: #ffffff;
            border: none;
            border-radius: 14px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            box-shadow: 0 10px 20px -5px rgba(99, 102, 241, 0.5);
            transition: all 0.3s ease;
        }

        .btn-submit:hover {
            background: linear-gradient(135deg, #4f46e5 0%, #4338ca 100%);
            box-shadow: 0 15px 25px -5px rgba(99, 102, 241, 0.7);
            transform: translateY(-2px);
        }

        .btn-submit:active {
            transform: translateY(0);
        }

        /* Footer Link */
        .login-footer {
            text-align: center;
            margin-top: 24px;
            font-size: 13px;
            color: #94a3b8;
        }

        .login-footer a {
            color: #818cf8;
            text-decoration: none;
            font-weight: 600;
            margin-left: 4px;
        }

        .login-footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <!-- Card Main Wrapper -->
    <div class="login-card">

        <!-- Header -->
        <div class="login-header">
            <h2>Selamat Datang</h2>
            <p>Masukkan kredensial Anda untuk masuk</p>
        </div>

        <!-- Form Login -->
        <form action="" method="POST" autocomplete="off">
            @csrf


            <!-- Email Input Group -->
            <div class="input-group">
                <input
                    type="email"
                    id="email"
                    name="email"
                    class="input-control"
                    placeholder=" "
                    required
                />
                <label for="email" class="floating-label">Alamat Email</label>
            </div>

            <!-- CSS Password Toggle Checkbox Controller -->
            <input type="checkbox" id="toggle-pwd" class="toggle-password-checkbox">

            <!-- Password Input Group -->
            <div class="input-group password-wrapper">
                <input
                    type="text"
                    id="password"
                    name="password"
                    class="input-control password-control"
                    placeholder=" "
                    required
                />
                <label for="password" class="floating-label">Kata Sandi</label>

                <!-- Label penutup yang berfungsi sebagai saklar toggle CSS -->
                <label for="toggle-pwd" class="toggle-password-btn" title="Tampilkan/Sembunyikan Kata Sandi">
                    <!-- Icon Eye (Tampil) -->
                    <svg class="eye-icon" width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                    </svg>
                    <!-- Icon Eye Off (Sembunyi) -->
                    <svg class="eye-off-icon" width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858-5.908a8.962 8.962 0 013.682-.763c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m-1.874 1.874a3 3 0 01-4.243-4.243m4.243 4.243L3 3l18 18"></path>
                    </svg>
                </label>
            </div>

            <!-- Options: Remember Me & Forgot Password -->
            <div class="form-options">
                <label class="remember-me">
                    <input type="checkbox" name="remember">
                    <span>Ingat Saya</span>
                </label>
                <a href="#" class="forgot-link">Lupa Password?</a>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn-submit">Masuk</button>
        </form>

        <!-- Footer -->
        <div class="login-footer">
            Belum punya akun? <a href="#">Daftar sekarang</a>
        </div>

    </div>

</body>
</html>
