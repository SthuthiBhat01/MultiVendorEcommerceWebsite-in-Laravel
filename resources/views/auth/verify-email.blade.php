<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
<style>
  html{
    font-size: 16px;
  }
  body{
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-color: black;
  }
  .row{
    padding:1rem;
    color: rgb(238, 245, 238);
  }
  .mycont{
    width: 30rem;
    height: 20rem;
    background: rgba(64,62,62,0.5);
-webkit-backdrop-filter: blur(10px);
backdrop-filter: blur(10px);
border-radius: 1rem;
  }
  .btn{
    transition: 0.5s all;
  }
  .btn:hover{
    transform: scale(1.1);
  }
  
</style>
</head>
<body>
  <div class="mycont border p-5 flex-column justify-content-center align-items-center">
    <div class=" row ">
      {{ __('Thanks for signing up! verify your email address by clicking on the link
      we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
    </div>
  
    @if (session('status') == 'verification-link-sent')
    <div class=" row mb-4 font-medium text-sm text-green-600 dark:text-green-400">
      {{ __('A new verification link has been sent') }}
    </div>
    @endif
    <div class="col d-flex align-item-start m-4">
      <form method="POST" action="{{ route('verification.send') }}">
        @csrf
  
        <div>
          <button class="btn btn-primary m-1">
            {{ __('Resend') }}
          </button>
        </div>
      </form>
  
      <form method="POST" action="{{ route('logout') }}">
        @csrf
  
        <button type="submit" class="btn btn-danger m-1">
          {{ __('Log Out') }}
        </button>
      </form>
    </div>
  
  
  
  
  </div>

</body>
</html>
