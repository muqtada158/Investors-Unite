<html lang="en">
    <head >
        <title>Investors Unite | Login / Register</title>
        <meta name="author" content="TheWebGateway">
        <meta descryption content="Investors Unite ">
        <meta name="keywords" content="investors, buyers, sellers, property">
        <meta http-equiv="refresh" content="100">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">
        <link rel="stylesheet" href="{{asset('user/css/login-register.css')}}">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
		<link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

    </head>
    <body>

		<div class="container" id="container" >
				<div class="form-container  sign-up-container">
                <form method="POST" action="{{ route('member.register') }}">@csrf
					<div class="header">Sign Up</div>

					<div class="button-input-group">
						<div class="group input-group">
						<input type="text" name="name" placeholder="Name" required>
                        @error('name')
                            <span class="invalid-feedback " role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>
					<div class="group input-group mt-2">
						<input type="email" name="email" class="form-control  @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Email" required>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>
					<div class="group input-group mt-2">
						<input type="password" name="password" class="form-control  @error('password') is-invalid @enderror" placeholder="Password" required>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>
                    <div class="group input-group mt-2">
						<input type="password" name="password_confirmation"  class="form-control  @error('password_confirmation') is-invalid @enderror" placeholder="Confirmed Password" required>
                        @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>

					<div class="group button-group">
						<button class="signup-btn" type="submit">Sign Up</button>
					</div>
                    <div class="group text-center">
                        <p>Or, Signup as a <a href="{{route('member.signup_money_lender')}}"> Private Money Lender </a></p>
                    </div>
					</div>

				</form>
			</div>


			<div class="form-container  sign-in-container">
				<form method="POST" action="{{ route('member.login') }}">@csrf
					<div class="header">Sign In</div>

				<div class="button-input-group">
					<div class="group input-group">
						<input id="email" type="email" class="form-control"  name="email" placeholder="Email" required>
					</div>

					<div class="group input-group">
						<input id="password" type="password" class="form-control"  name="password" placeholder="Password" required >
					</div>
					<div class="form-link forgot">
						<a href="#" class="login-link">Forgot your password?</a>
					</div>
					<div class="group button-group">
						<button class="signin-btn" type="submit">Sign in</button>
					</div>
				</div>
				</form>
			</div>



			<div class="overlay-container">
				<div class="overlay">
					<div class="overlay-panel overlay-left">
						<h1>Welcome Back!</h1>
						<p>Please login your personal info</p>

					<div class="group button-group">
						<button class="ghost" id="signIn">Sign in</button>
					</div>
						<footer>

						</footer>
					</div>

					<div class="overlay-panel overlay-right">
						<h1>Hello, Friend!</h1>
            <p>Enter your personal details and start your journey with us</p>

					<div class="group button-group">
						<button class="ghost" id="signUp">Sign up</button>
					</div>
                        <footer>

                        </footer>
					</div>
				</div>
			</div>


		</div>
		<script src="testt_login10.js"></script>
        <script>
            @if ($errors->any())
                @if(!$errors->has('login'))
                    container.classList.add("right-panel-active");
                @endif
            @endif
        </script>
        <script>
            const signUpButton = document.getElementById("signUp");
            const signInButton = document.getElementById("signIn");
            const container = document.getElementById("container");

            signUpButton.addEventListener("click", () => {
            container.classList.add("right-panel-active");
            });

            signInButton.addEventListener("click", () => {
            container.classList.remove("right-panel-active");
            });
        </script>
        {{-- sweet alert --}}
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 5000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })
            @if ($errors->has('login'))
                Toast.fire({
                    icon: 'error',
                    title: '{{ $errors->first('login') }}'
                })
            @endif
        </script>
    </body>
</html>
