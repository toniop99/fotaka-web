@extends('layout')

@section('content')
    <div class="container" style="margin-bottom: 15vh">
        <div class="row">
            <div class="col-sm">
                <div class="card map-container">
                    <iframe
                        class="card-img-top"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3145.2695516807157!2d-1.213662384819741!3d37.97083827972422!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd637fffc2c99885%3A0x4f7eda98c4047701!2sFOTAKA!5e0!3m2!1ses!2ses!4v1624270585036!5m2!1ses!2ses"
                        style="border:0; height: 50vh" loading="lazy"></iframe>
                    <div class="card-body">
                        <h5 class="card-title">Fotaka Alcantarilla</h5>
                        <div class="card-text container">
                            <p class="contact-text"><i class="fas fa-phone contact-icon"></i><a class="contact-link" href="tel:968801332">968-80-13-32</a></p>
                            <p class="contact-text"><i class="fas fa-map-marker contact-icon"></i>Calle Mayor Nº61, 30820 Alcantarilla, Murcia</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm">
                <div class="card map-container">
                    <iframe
                        class="card-img-top"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3141.8359758484385!2d-1.0825934848172551!3d38.05090807971015!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd63836c37c1b62b%3A0x8385c0390a3fa9db!2sFOTAKA!5e0!3m2!1ses!2ses!4v1624270806856!5m2!1ses!2ses"
                        style="border:0; height: 50vh" loading="lazy"></iframe>
                    <div class="card-body">
                        <h5 class="card-title">Fotaka Cobatillas</h5>
                        <div class="card-text container">
                            <p class="contact-text"><i class="fas fa-phone contact-icon"></i><a class="contact-link" href="tel:968864845">968-86-48-45</a></p>
                            <p class="contact-text"><i class="fas fa-map-marker contact-icon"></i>Calle Mayor Nº61, 30820 Alcantarilla, Murcia</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
