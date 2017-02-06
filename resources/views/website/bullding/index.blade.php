@extends('layouts.app')

@section('title')
     All Bullding
@endsection

@section('styles')
     {!! Html::style('src/global/bulldingAll.css') !!}
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
                    <ol class="breadcrumb" style="margin-bottom: 5px; background-color: #fff;">
                         <li><a href="{{ url('/') }}">Home</a></li>
                         @if (isset($array))
                              @if (!empty($array))
                                   @foreach($array as $key => $value)
                                        <li>
                                             <a href="{{ url('/bullding/Search?'. $key . '=' . $value) }}">{{ str_replace('_', ' ', $key) }} ->
                                                  @if ($key == 'type')
                                                       {{ type()[$value] }}
                                                  @elseif($key == 'rent')
                                                       {{ rent()[$value] }}
                                                  @elseif($key == 'place')
                                                       {{ place()[$value] }}
                                                  @else
                                                       {{ $value }}
                                                  @endif
                                             </a>
                                        </li>
                                   @endforeach
                              @endif
                         @endif
                    </ol>
                    <div class="profile-content">
                         @include('website.bullding.sharefile', ['bulldings' => $bulldingAll])
                         <div class="pagination col-md-6 col-md-offset-3">
                              {{ $bulldingAll->appends(Request::query())->render() }}
                         </div>
                    </div>
               </div>
          </div>
     </div>
@endsection
