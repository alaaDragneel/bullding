@extends('layouts.app')

@section('title')
     Bullding | {{ $bulldingInfo->name }}
@endsection

@section('styles')
     {!! Html::style('src/global/bulldingAll.css') !!}
     {!! Html::style('src/global/select2.min.css') !!}
     <style>
     hr {
          margin: 10px 0;
     }
     p.text-justify {
          padding-bottom: 10px;
          margin-bottom: 10px;
     }
     </style>
@endsection

@section('content')
     <div class="container">
          <div class="row profile">
               @include('website.bullding.page')
               <div class="col-md-9">
                    {{-- breadcrumb --}}
                    <ol class="breadcrumb" style="margin-bottom: 5px; background-color: #fff;">
                         <li><a href="{{ url('/') }}">Home</a></li>
                         <li><a href="{{ route('show.all.bullding') }}">Show All Bullding</a></li>
                         <li><a href="{{ route('show.single.bullding', ['id' => $bulldingInfo->id]) }}">{{ $bulldingInfo->name }}</a></li>
                    </ol>
                    {{-- profile-content --}}
                    <div class="profile-content">
                         <h1>{{ $bulldingInfo->name }}</h1>
                         <hr>
                         <div class="btn-group" role="group">
                              <a href="{{url('/bullding/Search?price='.$bulldingInfo->price) }}" class="btn btn-primary">
                                   price: {{ $bulldingInfo->price }}
                              </a>
                              <a href="{{url('/bullding/Search?square='.$bulldingInfo->square) }}" class="btn btn-primary">
                                   square: {{ $bulldingInfo->square }}
                              </a>
                              <a href="{{url('/bullding/Search?place='.$bulldingInfo->place) }}" class="btn btn-primary">
                                   Area: {{ place()[$bulldingInfo->place] }}
                              </a>
                              <a href="{{url('/bullding/Search?rooms='.$bulldingInfo->rooms) }}" class="btn btn-primary">
                                   Rooms: {{ $bulldingInfo->rooms }}
                              </a>
                              <a href="{{url('/bullding/Search?type='.$bulldingInfo->type) }}" class="btn btn-primary">
                                   Operation Type: {{ type()[$bulldingInfo->type] }}
                              </a>
                              <a href="{{url('/bullding/Search?rent='.$bulldingInfo->rent) }}" class="btn btn-primary">
                                   Bullding Type: {{ rent()[$bulldingInfo->rent] }}
                              </a>
                         </div>
                         <p style="margin-top: 10px;">
                              {!! nl2br($bulldingInfo->decription) !!}
                         </p>
                         <br>
                         <div id="map" style="width:100%; height:500px"></div>
                    </div>
                    {{-- similer --}}
                    <div class="profile-content" style="margin-top: 20px;">
                         <h3>others Bullding</h3>
                         <hr>
                         @include('website.bullding.sharefile', ['bulldings' => $sameRent])
                         @include('website.bullding.sharefile', ['bulldings' => $sameType])
                    </div>
               </div>
          </div>
     </div>
@endsection

@section('footer')
     {!! Html::script('src/global/select2.min.js') !!}
     <script type="text/javascript">
          $('select[name=place]').select2();
     </script>
     <script>
          function myMap() {
               var myCenter = new google.maps.LatLng({{ $bulldingInfo->langtuide }}, {{ $bulldingInfo->latitiute }});
               var mapCanvas = document.getElementById("map");
               var mapOptions = {center: myCenter, zoom: 5};
               var map = new google.maps.Map(mapCanvas, mapOptions);
               var marker = new google.maps.Marker({
                    position:myCenter,
                    animation: google.maps.Animation.BOUNCE
               });
               marker.setMap(map);
          }
     </script>

     <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDg7lOBHY9GlZiMr20JdL7wrvbDd3lFqOk&callback=myMap" type="text/javascript"></script>

@endsection
