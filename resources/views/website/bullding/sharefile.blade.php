@if (count($bulldings) > 0)
     @foreach ($bulldings->chunk(3) as $bulldingChunk)
          <div class="row text-capitalize">
               @foreach ($bulldingChunk as $bullding)

                    <div class="col-md-4">
                         <div class="productbox">
                              <img src="{{ asset('src/images/'.rand(1,6).'.jpg') }}" class="img-responsive" style="width: 220px; height: 239px;">
                              <div class="producttitle">{{ $bullding->name }}</div>
                              <p class="text-justify">{{ str_limit($bullding->small_dis, 70) }}</p>
                              <div class="productprice">
                                   <span class="pull-left">square: {{ $bullding->square }}</span>
                                   <span class="pull-right">type: {{ rent()[$bullding->rent] }}</span>
                                   <div class="clearfix"></div>
                                   <hr/>
                                   <div class="pull-right">
                                        <a href="#" class="btn btn-primary btm-sm" role="button">Show Details
                                             <span class="glyphicon glyphicon-info-sign"></span>
                                        </a>
                                   </div>
                                   <div class="pricetext">{{ $bullding->price }}</div></div>
                              </div>
                         </div>
                    @endforeach
               </div>
          @endforeach
          <div class="clearfix"></div>
     @else
          <div class="alert alert-danger">No Bullding Now</div>
     @endif
