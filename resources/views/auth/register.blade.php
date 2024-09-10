<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="{{ url('signup.css') }}">
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
  <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="name"></label>
     
    </div>
    <div class="form-group">
      <label for="name"></label>
     
    </div>
    <div class="form-group">
      <label for="name"><p class="para">Name</p></label>
      <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" >
      <span class="text-danger">@error('name') {{ $message }} @enderror</span>
    </div>
    <div class="form-group">
      <label for="email"><p class="para">Email</p></label>
      <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
      <span class="text-danger">@error('email') {{ $message }} @enderror</span>
    </div>
    <div class="form-group">
      <label for="phone_number"><p class="para">Phone number</p></label>
      <input type="number" class="form-control" id="phone_number" name="phone_number" value="{{ old('phone_number') }}" required >
      <span class="text-danger">@error('phone_number') {{ $message }} @enderror</span>
    </div>
    <div class="form-group">
      <label for="pwd"><p class="para">Password</p></label>
      <div class="input-group">
        <input type="password" class="form-control" id="pwd" name="password" required>
        <span class="input-group-addon">
          <i class="fas fa-eye toggle-password"></i>
        </span>
      </div>
      <span class="text-danger">@error('password') {{ $message }} @enderror</span>
    </div>
    <div class="form-group">
      <label for="user_type"><p class="para">Are you registering as:</p></label>
      <div>
        <label class="radio-inline">
          <input type="radio" name="user_type" value="individual" checked> Individual
        </label>
        <label class="radio-inline">
          <input type="radio" name="user_type" value="business"> Business
        </label>
      </div>
    </div>
    <div id="business-fields-wrapper" style="display: none;">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="company_name"><p class="para">Company Name</p></label>
            <input type="text" class="form-control" id="company_name" name="company_name" value="{{ old('company_name') }}">
            <span class="text-danger">@error('company_name') {{ $message }} @enderror</span>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="company_email"><p class="para">Company Email</p></label>
            <input type="email" class="form-control" id="company_email" name="company_email" value="{{ old('company_email') }}">
            <span class="text-danger">@error('company_email') {{ $message }} @enderror</span>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="company_phone_number"><p class="para">Company Phone Number</p></label>
            <input type="text" class="form-control" id="company_phone_number" name="company_phone_number" value="{{ old('company_phone_number') }}">
            <span class="text-danger">@error('company_phone_number') {{ $message }} @enderror</span>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="gstin"><p class="para">GSTIN</p></label>
            <input type="text" class="form-control" id="gstin" name="gstin" value="{{ old('gstin') }}">
            <span class="text-danger">@error('gstin') {{ $message }} @enderror</span>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="company_logo"><p class="para">Company Logo</p></label>
            <input type="file" class="form-control" id="company_logo" name="company_logo">
            <span class="text-danger">@error('company_logo') {{ $message }} @enderror</span>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="company_pincode"><p class="para">Company Pincode</p></label>
            <input type="text" class="form-control" id="company_pincode" name="company_pincode" value="{{ old('company_pincode') }}">
            <span class="text-danger">@error('company_pincode') {{ $message }} @enderror</span>
          </div>
        </div>
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Sign Up</button>
    <p><a href="{{ url('login') }}" class="anchor" style="color:black">Already have an account?</a></p>
  </form>
</div>

<script>
  $(document).ready(function() {
    $('input[name="user_type"]').change(function() {
      if ($(this).val() === 'business') {
        $('#business-fields-wrapper').show(); 
      } else {
        $('#business-fields-wrapper').hide(); 
      }
    });

    // Trigger change event on page load to show/hide fields based on initial value
    $('input[name="user_type"]:checked').trigger('change');

    // Toggle password visibility
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
