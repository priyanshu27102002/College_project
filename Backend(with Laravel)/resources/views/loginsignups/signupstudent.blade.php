@extends('loginsignups.layout_signup')
@section('content')

<div class="container right-panel-active" id="container">
    <div class="form-container sign-up-container">
      
    <!-- error manager -->
     
    <form method="POST" action="{{ route('signupstudent.post') }}">
    @csrf
    <h1>Sign Up</h1>
    <div class="social-container">
        <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
        <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
        <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
        <h4>OR</h4>
        @if(session()->has("success"))
            <div class="alert alert-success">
                {{ session()->get("success") }}
            </div>
        @endif
        @if(session()->has("error"))
            <div class="alert alert-danger">
                {{ session()->get("error") }}
            </div>
        @endif
    </div>
    <input type="text" placeholder="Name" name="studentname" required autofocus />
    <!-- Error message starts -->
    @if($errors->has('studentname'))
        <span class="text-danger">
            {{ $errors->first('studentname') }}
        </span>
    @endif
    <input type="email" placeholder="Email" name="studentemail" required />
    <!-- Error message starts -->
    @if($errors->has('studentemail'))
        <span class="text-danger">
            {{ $errors->first('studentemail') }}
        </span>
    @endif
    <input type="password" placeholder="Password" name="studentpassword" required />
    @if($errors->has('studentpassword'))
        <span class="text-danger">
            {{ $errors->first('studentpassword') }}
        </span>
    @endif
    <input type="password" placeholder="Confirm Password" name="studentpassword_confirmation" required />
    <button type="submit">Sign Up</button>
</form>


    </div>
    <!-- <div class="form-container sign-in-container">
      <form action="#">
        <h1>Sign In</h1>
        <span>or use your email account</span>
        <input type="email" placeholder="Email" />
        <input type="password" placeholder="Password" />
        <a href="#">Forgot your password?</a>
        <button>Sign In</button>

      </form>
    </div> -->
    <div class="overlay-container">
      <div class="overlay">
        <div class="overlay-panel overlay-left">
          <h1>Welcome Back!</h1>
          <p>please login with your personal info</p>
          <button class="ghost" id="SignIn" onclick="window.location.href='{{ route('loginstudent')}}'">Sign In</button>
        </div>
        
      </div>

    </div>
  </div>


  <!-- Javascript code -->
<script>
  document.addEventListener("DOMContentLoaded", () => {
  const form = document.querySelector("form");
  const password = form.querySelector("input[name='studentpassword']");
  const confirmPassword = form.querySelector("input[placeholder='Confirm Password']");
  let errorSpan = confirmPassword.nextElementSibling;

  // Check if an error span already exists; otherwise, create one
  if (!errorSpan || !errorSpan.classList.contains("text-danger")) {
    errorSpan = document.createElement("span");
    errorSpan.classList.add("text-danger");
    errorSpan.style.fontSize = "12px";
    errorSpan.style.marginTop = "5px";
    confirmPassword.after(errorSpan);
  }

  // Add real-time validation for the confirm password field
  confirmPassword.addEventListener("input", () => {
    if (confirmPassword.value === password.value || confirmPassword.value === "") {
      errorSpan.textContent = ""; // Clear error message
      confirmPassword.style.borderColor = "green"; // Highlight valid input
    } else {
      errorSpan.textContent = "Passwords do not match.";
      confirmPassword.style.borderColor = "red"; // Highlight invalid input
    }
  });

  // Validate on form submission
  form.addEventListener("submit", (e) => {
    if (confirmPassword.value !== password.value) {
      e.preventDefault(); // Prevent form submission
      errorSpan.textContent = "Passwords do not match.";
      confirmPassword.style.borderColor = "red";

      // Optional: Scroll to the error field
      confirmPassword.scrollIntoView({ behavior: "smooth", block: "center" });
    }
  });
});

</script>

@endsection