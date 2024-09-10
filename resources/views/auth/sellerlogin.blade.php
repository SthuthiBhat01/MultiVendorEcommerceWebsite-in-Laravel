<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="{{ url('login.css') }}">
</head>
<style>
  .win-logo{
    margin-top: -550px;
    margin-left: -590px;
  }
</style>
<body>
  <div class="win-logo">
    <a href="{{ url('/') }}">
        <img src="{{ asset('images/logowin.png') }}" alt="Win Logo">
    </a>
</div>


  <div class="ripple-background">
    <div class="circle xxlarge shade1"></div>
    <div class="circle xlarge shade2"></div>
    <div class="circle large shade3"></div>
    <div class="circle medium shade4"></div>
    <div class="circle small shade5"></div>
</div>
  <div class="container" id="loginAnimation"></div>
  <!-- Other HTML content -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.7.13/lottie.min.js"></script>
  <script>
  // Initialize Lottie animation
const animation = lottie.loadAnimation({
    container: document.getElementById('loginAnimation'),
    renderer: 'svg',
    loop: true,
    autoplay: true,
    path: 'loginanimation.json' // Path to your loginanimation.json file
});
</script>
  <!--<div class="row">
      @if($errors->has('login'))
        <div class="error">
            {{ $errors->first('login') }}
        </div>
    @endif
  </div>-->
<div class="container bg-primary">
    <form method="POST" action="{{ route('sellerlogin') }}">
    @csrf
    <div class="form-group">
      <label for="email"><p class="para">Email</p></label>
      <input type="email" class="form-control" id="email" name='email'>
      <span class="text-danger">
        @error('useremail')
          {{ $message }}
        @enderror
      </span>
    </div>
    <div class="form-group">
      <label for="pwd"><p class="para">Password</p></label>
      <div class="input-group">
        <input type="password" class="form-control" id="pwd" name='password'>
        <span class="input-group-addon">
          <i class="fas fa-eye toggle-password"></i>
        </span>
      </div>
      <span class="text-danger">
        @error('password')
          {{ $message }}
        @enderror
      </span>
    </div>
    <div class="checkbox">
      <label><input type="checkbox"> <p class="para">Remember me</p></label>
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
    <p class="para"><a href="{{ url('/sellerregister') }}" style="color: black;">Dont have account?</a></p>

  </form>
</div>



<script>
  $(document).ready(function() {
  $('.toggle-password').click(function() {
    var passwordInput = $('#pwd');
    var type = passwordInput.attr('type');
    
    if (type === 'password') {
      passwordInput.attr('type', 'text');
      $(this).removeClass('fa-eye').addClass('fa-eye-slash');
    } else {
      passwordInput.attr('type', 'password');
      $(this).removeClass('fa-eye-slash').addClass('fa-eye');
    }
  });
});

</script>
</body> 
</html>
