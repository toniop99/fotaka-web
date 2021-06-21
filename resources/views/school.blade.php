@extends('layout')

@section('content')
    <div class="container" style="padding-bottom: 11vh">
        <div class="card mt-3">
            <div class="row g-0">
                <div class="col-md-8">
                    <div class="card-body">
                        <h3 class="card-title">{{$school['name']}}</h3>
                        @if(!empty($school['description']))
                            <p class="card-header">{{$school['description']}}</p>
                        @endif

                        <div class="card-text">
                            @foreach($school['classes'] as $date => $promotion)
                                <div class="accordion" id="accordionPromotion">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading-{{$date}}">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$date}}" aria-expanded="false" aria-controls="collapse{{$date}}">
                                                Promoción: {{$date}}
                                            </button>
                                        </h2>
                                        <div id="collapse{{$date}}" class="accordion-collapse collapse" aria-labelledby="heading-{{$date}}" data-bs-parent="#accordionPromotion">
                                            <div class="accordion-body">
                                                <ul class="list-group">
                                                    @foreach($promotion as $index => $class)
                                                        <a href="{{route('orlas_watcher', ['schoolName' => $school['name'], 'promotion' => $date, 'id' => $class['id']])}}" class="page-link mb-1">
                                                            <li class="list-group-item">
                                                                <strong>{{$class['education_period']}} ➟ </strong>{{$class['name']}}
                                                            </li>
                                                        </a>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <img src="{{asset('orlas/'.$school['image_path'])}}" alt="School Image"
                         style="width: 100%; height:100%;object-fit: cover">
                </div>
            </div>
        </div>
    </div>
@endsection
