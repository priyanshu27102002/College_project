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
      <form method="POST" action="{{route('loginstudent.post')}}">
        @csrf
        <h1>Sign In</h1>
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
        <input type="email" placeholder="Email" name="studentemail" required autofocus/>

        <!-- error message  starts-->
        @if($errors->has('studentemail'))
        <span class="text-danger">
          {{errors->first('studentemail')}}</span>
        @endif  
        <input type="password" placeholder="Password" name="studentpassword" required/>
        @if($errors->has('studentpassword'))
        <span class="text-danger">
          {{errors->first('studentpassword')}}</span>
        @endif 
        <a href="{{route('forgetPasswordstudent')}}">Forgot your password?</a>
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
          <button class="ghost" id="SignUp" onclick="window.location.href='{{ route('signupstudent')}}'">Sign Up</button>
        </div>
      </div>

    </div>
  </div>
  <!-- <script>
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