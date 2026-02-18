@extends('loginsignups.layout_signup')
@section('content')

<div class="container" id="container">
    <div class="form-container sign-up-container">

      <!-- <form action="#">
        <h1>Sign Up</h1>
        <div class="social-container">
          <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
          <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
          <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
          <h4>OR</h4>
        </div>
        <input type="text" placeholder="Name"/>
        <input type="email" placeholder="Email"/>
        <input type="password" placeholder="Password"/>
        <input type="password" placeholder="Confirm Password"/>
        <button>Sign Up</button>
      </form> -->

    </div>
    <div class="form-container sign-in-container">
      <form method="POST" action="{{route('loginalumini.post')}}">
        @csrf
        <h1>Sign In as Alumni</h1>
        @if(session()->has("success"))
          <div class="alert alert-success">
            {{session()->get("success")}}
          </div>
          @endif
          @if(session()->has("error"))
          <div class="alert alert-success">
            {{session()->get("error")}}
          </div>
          @endif
        <input type="email" placeholder="Email" name="aluminiemail" required autofocus/>

        <!-- error message  starts-->
        @if($errors->has('aluminiemail'))
        <span class="text-danger">
          {{errors->first('aluminiemail')}}</span>
        @endif  
        <input type="password" placeholder="Password" name="aluminipassword" required/>
        @if($errors->has('aluminipassword'))
        <span class="text-danger">
          {{errors->first('aluminipassword')}}</span>
        @endif 
        <a href="{{route('forgetPasswordalumini')}}">Forgot your password?</a>
        <button type="submit">Sign In</button>

      </form>
    </div>
    <div class="overlay-container">
      <div class="overlay">
        <div class="overlay-panel overlay-left">
          <h1>Welcome Back!</h1>
          <p>please login with your personal info</p>
          <button class="ghost" id="SignIn">Sign In</button>
        </div>
        <div class="overlay-panel overlay-right">
          <h1>Hello, Friend!</h1>
          <p>Enter your personal details and start your journey </p>
          <button class="ghost" id="SignUp" onclick="window.location.href='{{ route('signupalumini')}}'">Sign Up</button>
        </div>
      </div>

    </div>
  </div>

<!-- 
<script>
  const SignUpButton = document.getElementById("SignUp");
  const SignInButton = document.getElementById("SignIn");
  const container = document.getElementById("container");

  SignUpButton.addEventListener('click', () => {
      container.classList.add("right-panel-active")
  });

  SignInButton.addEventListener('click', () => {
      container.classList.remove("right-panel-active")
  });
</script> -->

@endsection