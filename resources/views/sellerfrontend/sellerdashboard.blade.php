@extends('sellerfrontend.layouts.main')

@section('main-container')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.7.13/lottie.min.js"></script>

<main id="listar-main" class="listar-main listar-innerspeace listar-haslayout">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div id="listar-content" class="listar-content">
                    <h2>Welcome, {{ Auth::user()->name }}</h2>

                    @if(session('newEnquiries'))
                        <div class="lisatr-alert alert alert-success fade in alert-dismissable">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                            <strong>Notification!</strong> You have new enquiries! Please check your mail for details.
                            <a class="listar-btnaction" id="close-popup" href="javascript:void(0);">Dismiss</a>
                        </div>
                        <script>
                            document.getElementById('close-popup').addEventListener('click', function() {
                                document.querySelector('.lisatr-alert').style.display = 'none';
                                // Make an AJAX call to mark the enquiries as seen
                                fetch('{{ route("enquiries.markAsSeen") }}', {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/json',
                                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                    },
                                    body: JSON.stringify({})
                                })
                                .then(response => response.json())
                                .then(data => {
                                    if(data.status === 'success') {
                                        console.log('Enquiries marked as seen');
                                    }
                                });
                            });
                        </script>
                    @endif

                    <form class="listar-formtheme listar-formaddlisting listar-formdashboard">
                        <div class="row">
                            <fieldset class="listar-statisticsarea">
                                <ul class="listar-statistics">
                                    <li class="listar-activelists">
                                        <div class="listar-couterholder">
                                            <h3 data-from="0" data-to="{{ $activeListingsCount }}" data-speed="8000" data-refresh-interval="50">{{ $activeListingsCount }}</h3>
                                            <h4>Active Listings</h4>
                                            <div class="listar-statisticicon"><i class="icon-map3"></i></div>
                                        </div>
                                    </li>
                                    <li class="listar-newuser">
                                        <div class="listar-couterholder">
                                            <h3 data-from="0" data-to="{{ $totalUsersCount }}" data-speed="8000" data-refresh-interval="50">{{ $totalUsersCount }}</h3>
                                            <h4>Total Users</h4>
                                            <div class="listar-statisticicon"><i class="icon-user2"></i></div>
                                        </div>
                                    </li>
                                    <li class="listar-weeksviews">
                                        <div class="listar-couterholder">
                                            <h3 data-from="0" data-to="{{ $receivedEnquiriesCount }}" data-speed="8000" data-refresh-interval="50">{{ $receivedEnquiriesCount }}</h3>
                                            <h4>Received Enquiries</h4>
                                            <div class="listar-statisticicon"><i class="icon-linegraph"></i></div>
                                        </div>
                                    </li>
                                </ul>
                            </fieldset>
                            <div class="selleranime" style="background-color: rgb(251, 248, 248);width:170rem; height:60rem;">
                                <div class="container" id="sellerdashanimation" style="width: 90rem; height: 50rem;">
                                    
                                </div>
                                <script>
                                    // Initialize Lottie animation
                                    const animation = lottie.loadAnimation({
                                        container: document.getElementById('sellerdashanimation'),
                                        renderer: 'svg',
                                        loop: true,
                                        autoplay: true,
                                        path: '{{ asset('sellerdashanimation.json') }}' // Adjust the path to match where your JSON file is hosted
                                    });
                                </script>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
