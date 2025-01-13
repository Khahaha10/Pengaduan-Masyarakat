<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/global.css') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/logo.png') }}" alt="ikon">
    <title>Login</title>
</head>
<body>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="{{ route('register.post') }}" method="post">
                @csrf
                <h1 class="sign-up">Sign Up</h1><br><br>
                <input type="text" name="nik" placeholder="NIK" required />
                <input type="text" name="nama_masyarakat" placeholder="Nama Lengkap" required />
                <input type="email" name="email" placeholder="Email" required />
                <div class="password-wrapper">
                    <input type="password" name="password" id="registerPassword" placeholder="Password" required />
                    <span class="toggle-password" onclick="togglePasswordVisibility('registerPassword', this)">
                        <svg class="show-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M12 4.5C7.305 4.5 3.263 7.138 1.5 12c1.763 4.862 5.805 7.5 10.5 7.5s8.737-2.638 10.5-7.5C20.737 7.138 16.695 4.5 12 4.5zm0 12a4.5 4.5 0 110-9 4.5 4.5 0 010 9zm0-6.5a2 2 0 100 4 2 2 0 000-4z"/>
                        </svg>
                        <svg class="hide-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="display: none;">
                            <path d="M12 4.5C7.305 4.5 3.263 7.138 1.5 12c.5 1.379 1.269 2.615 2.23 3.666L2 17.394l1.606 1.606 2.032-2.032C8.058 18.171 9.945 18.5 12 18.5c4.695 0 8.737-2.638 10.5-7.5-.478-1.318-1.134-2.546-1.936-3.643l2.041-2.042L20 4.606l-2.224 2.224C15.834 5.171 13.992 4.5 12 4.5zm0 2c.95 0 1.847.191 2.675.512l-1.548 1.548a4.5 4.5 0 00-5.567 5.567L5.884 15.4C4.769 14.673 3.874 13.634 3.252 12c1.763-4.862 5.805-7.5 10.5-7.5zm4.726 2.158l-2.032 2.032c.21.447.356.948.356 1.31a2 2 0 01-2 2c-.362 0-.864-.146-1.31-.356l-2.032 2.032A4.487 4.487 0 0012 15.5a4.5 4.5 0 004.5-4.5c0-.582-.314-1.663-.774-2.342z"/>
                        </svg>
                    </span>
                </div>
                <br>
                <button type="submit" name="sign-up">Register</button>
            </form>
        </div>

        <div class="form-container sign-in-container">
            <form action="{{ route('login.post') }}" method="post">
                @csrf
                <h1 class="sign-in">Sign In</h1><br><br>
                <input type="email" name="email" placeholder="Email" required />
                <div class="password-wrapper">
                    <input type="password" name="password" id="loginPassword" placeholder="Password" required />
                    <span class="toggle-password" onclick="togglePasswordVisibility('loginPassword', this)">
                        <svg class="show-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M12 4.5C7.305 4.5 3.263 7.138 1.5 12c1.763 4.862 5.805 7.5 10.5 7.5s8.737-2.638 10.5-7.5C20.737 7.138 16.695 4.5 12 4.5zm0 12a4.5 4.5 0 110-9 4.5 4.5 0 010 9zm0-6.5a2 2 0 100 4 2 2 0 000-4z"/>
                        </svg>
                        <svg class="hide-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="display: none;">
                          <path d="M12 4.5C7.305 4.5 3.263 7.138 1.5 12c.5 1.379 1.269 2.615 2.23 3.666L2 17.394l1.606 1.606 2.032-2.032C8.058 18.171 9.945 18.5 12 18.5c4.695 0 8.737-2.638 10.5-7.5-.478-1.318-1.134-2.546-1.936-3.643l2.041-2.042L20 4.606l-2.224 2.224C15.834 5.171 13.992 4.5 12 4.5zm0 2c.95 0 1.847.191 2.675.512l-1.548 1.548a4.5 4.5 0 00-5.567 5.567L5.884 15.4C4.769 14.673 3.874 13.634 3.252 12c1.763-4.862 5.805-7.5 10.5-7.5zm4.726 2.158l-2.032 2.032c.21.447.356.948.356 1.31a2 2 0 01-2 2c-.362 0-.864-.146-1.31-.356l-2.032 2.032A4.487 4.487 0 0012 15.5a4.5 4.5 0 004.5-4.5c0-.582-.314-1.663-.774-2.342z"/>
                        </svg>
                    </span>
                </div>
                <br><br>
                <button type="submit" name="sign-in">Sign In</button>
            </form>
        </div>

        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <p class="left">Sudah punya akun? Sign in untuk lanjut</p>
                    <button style="margin-top: -20px" class="ghost" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <p class="right">Belum punya akun?<br>Daftar sekarang</p>
                    <button style="margin-top: -20px" class="ghost" id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        const signUpButton = document.getElementById('signUp');
        const signInButton = document.getElementById('signIn');
        const container = document.getElementById('container');

        signUpButton.addEventListener('click', () => {
            container.classList.add("right-panel-active");
        });

        signInButton.addEventListener('click', () => {
            container.classList.remove("right-panel-active");
        });

        function togglePasswordVisibility(inputId, iconElement) {
            const input = document.getElementById(inputId);
            const showIcon = iconElement.querySelector('.show-icon');
            const hideIcon = iconElement.querySelector('.hide-icon');

            if (input.type === "password") {
                input.type = "text";
                showIcon.style.display = "none";
                hideIcon.style.display = "block";
            } else {
                input.type = "password";
                showIcon.style.display = "block";
                hideIcon.style.display = "none";
            }
        }

        function showToast(message, type) {
            const toast = document.createElement('div');
            toast.classList.add('toast');
            if (type === 'error') {
                toast.classList.add('toast-error');
            }
            toast.innerText = message;
            document.body.appendChild(toast);
            
            setTimeout(() => {
                toast.style.opacity = 0;
                setTimeout(() => {
                    toast.remove();
                }, 500); 
            }, 3000); 
        }

        @if(session('success'))
            showToast("{{ session('success') }}", 'success');
        @elseif(session('error'))
            showToast("{{ session('error') }}", 'error');
        @endif
    </script>
</body>
</html>
