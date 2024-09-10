<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="{{ asset('frontendcss/company.css') }}"/>
    <title>company details</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.7.8/lottie.min.js"></script>
</head>
<body>

<div class="layout-wrapper">
    <div class="form-container">
        <label for="company-details" style="color: #050505; font: italic small-caps bold 16px/2 cursive;">List Your Company</label>
        <form action="{{ route('listcompanypost') }}" method="POST" class="form">
            @csrf
            <input type="hidden" name="seller_id" value="{{ auth()->user()->id }}" />
            
            <div class="form-group">
                <div class="input-row">
                    <div class="input-col">
                        <label for="email">Company Email</label>
                        <input type="email" value="{{ $email?? '' }}" readonly />
                    </div>
                    <div class="input-col">
                        <label for="company-name">Company Name</label>
                        <input type="text" name="company_name" placeholder="Enter company name" required />
                    </div>
                </div>
                <div class="input-row">
                    <div class="input-col">
                        <label for="gstin">GSTIN</label>
                        <input type="text" name="gstin" placeholder="Enter valid GSTIN" required />
                    </div>
                    <div class="input-col">
                        <label for="website">Website Link</label>
                        <input type="url" name="website_link" placeholder="Enter valid website link" />
                    </div>
                </div>

                <!-- Add more.input-row divs as needed -->
                <div class="input-row">
                    <div class="input-col1">
                        <label for="gstin">City</label>
                        <input type="text" name="city" placeholder="Enter your city" required />
                    </div>
                    <div class="input-col1">
                        <label for="website">Region</label>
                        <input type="text" name="region" placeholder="Enter your region" required />
                    </div>
                    <div class="input-col1">
                        <label for="website">Pincode</label>
                        <input type="text" name="pincode" placeholder="Enter postal code" required />
                    </div>
                    <div class="input-col1">
                        <label for="website">Country</label>
                        <input type="text" name="country" placeholder="Enter country " required />
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <label for="address">Address</label>
                <textarea name="address" id="address" rows="10" cols="50" required=""></textarea>
            </div>
            
            <button class="form-submit-btn" type="submit">Submit</button>
        </form>
    </div>

    <div class="container" id="company" style="width: 100vw; height: 80vh;">
        <script>
            // Initialize Lottie animation
            const animation = lottie.loadAnimation({
                container: document.getElementById('company'),
                renderer: 'svg',
                loop: true,
                autoplay: true,
                path: 'js/company1.json'
            });

            // Optional: Control playback programmatically
            // For example, start the animation when a button is clicked
            document.getElementById('playAnimationButton').addEventListener('click', function() {
                animation.play();
            });
        </script>
    </div>
</div>
</body>
</html>
