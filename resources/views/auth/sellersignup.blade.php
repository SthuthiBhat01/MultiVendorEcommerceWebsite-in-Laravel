<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="{{ url('adminsignup.css') }}">
</head>
<style>
  .win-logo{
    margin-top: -550px;
    margin-left: -590px;
  }
</style>
<body>

  
<div class="container bg-primary">
  <div class="win-logo">
    <a href="{{ url('/') }}">
        <img src="{{ asset('images/logowin.png') }}" alt="Win Logo">
    </a>
</div>

    <form method="POST" action="{{ route('sellerregister') }}">
    @csrf
    <div class="form-group">
      <label for="name"><p class="para" style="color:rgb(5, 5, 5)">Name</p></label>
      <input type="text" class="form-control" id="email" name='name'>
      <span class="text-danger">
        @error('name')
          {{ $message }}
        @enderror
      </span>
    </div>
    <div class="form-group">
      <label for="email"><p class="para" style="color:rgb(0, 0, 0)">Email</p></label>
      <input type="email" class="form-control" id="email" name='email'>
      <span class="text-danger">
        @error('email')
          {{ $message }}
        @enderror
      </span>
    </div>
    <div class="form-group">
      <label for="phone_number"><p class="para" style="color:rgb(9, 9, 9)">Phone number</p></label>
      <input type="text" class="form-control" id="phone_number" name='phone_number' value="{{ old('phone_number') }}" required autofocus>
      <span class="text-danger">
        @error('phone_number')
          {{ $message }}
        @enderror
      </span>
    </div>
    <div class="form-group">
      <label for="pwd"><p class="para" style="color:rgb(6, 5, 5)">Password</p></label>
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
    <button type="submit" id="btnn">signup</button>
    <p class="para"><a href="{{ url('/sellerlogin') }}" class="anchor" style="color:black">Already have an account?</a></p>
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
