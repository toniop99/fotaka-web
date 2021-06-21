@extends('layout')
@push('styles')
    <link rel="stylesheet" href="{{asset($data['class']['orla']['path'])}}/main.css">
    <script type="text/javascript" src="{{asset($data['class']['orla']['path'])}}/jpgscripts.js"></script>
    <script type="text/javascript" src="{{asset($data['class']['orla']['path'])}}/mainscript.js"></script>
    <script type="text/javascript" src="{{asset($data['class']['orla']['path'])}}/screenfuncs.js"></script>
    <script type="text/javascript" src="{{asset($data['class']['orla']['path'])}}/videofuncs.js"></script>
    <script type="text/javascript" src="{{asset($data['class']['orla']['path'])}}/assets/videodata.js"></script>
@endpush
@section('content')
    <div id=lxcontainer>
        <canvas id="lxspread_canvas" width="100%" height="100%" style="padding:10px;"></canvas>
    </div>
    <a id="back-button" href="{{ url('orlas/school/' . $data['name'])}}" role="button" class="btn btn-primary">Atrás</a>
@endsection

@push('page-script')
    <script src="{{asset('js/manifests/orlasManifest.js')}}"></script>

    <script type="text/javascript">
        if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)){
            // true for mobile device

        }else{
            // false for not mobile device
            document.querySelector('#back-button').style.display = 'none';
        }

        window.onload = function () {
            document.querySelector('#footer').style.display = 'none';
            document.querySelector('.navbar').style.display = 'none';
            loaddata();

            let deferredPrompt;

            window.addEventListener('beforeinstallprompt', (e) => {
                // Prevent Chrome 67 and earlier from automatically showing the prompt
                e.preventDefault();
                // Stash the event so it can be triggered later.
                deferredPrompt = e;
            });

            if(deferredPrompt) {
                // Update UI to notify the user they can add to home screen
                deferredPrompt.prompt();

                deferredPrompt.userChoice.then((choiceResult) => {
                    if (choiceResult.outcome === 'accepted') {
                        console.log('User accepted the A2HS prompt');
                    } else {
                        console.log('User dismissed the A2HS prompt');
                    }
                    deferredPrompt = null;
                });
            }
        };
    </script>
@endpush
