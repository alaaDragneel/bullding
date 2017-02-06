@if (count($bulldings) > 0)
     @foreach ($bulldings->chunk(3) as $bulldingChunk)
          <div class="row text-capitalize">
               @foreach ($bulldingChunk as $bullding)
                    <div class="col-md-4">
                         <div class="productbox">
                              <img src="{{ asset(checkImage($bullding->image)) }}" class="img-responsive" style="width: 220px; height: 239px;">
                              <div class="producttitle">{{ $bullding->name }}</div>
                              <p class="text-justify">{{ str_limit($bullding->small_dis, 70) }}</p>
                              <div class="productprice">
                                   <span class="pull-left">square: {{ $bullding->square }}</span>
                                   <span class="pull-right">Operation: {{ rent()[$bullding->rent] }}</span>
                                   <div class="clearfix"></div>
                                   <span class="pull-right">Type: {{ type()[$bullding->type] }}</span>
                                   <span class="pull-left">Place: {{ place()[$bullding->place] }}</span>
                                   <div class="clearfix"></div>
                                   <hr/>
                                   <div class="pull-right">
                                        @if ($bullding->status == 0)
                                             <span class="btn btn-danger btn-sm"> UnApproved
                                                  <i class="fa fa-clock-o"></i>
                                             </span>
                                        @else
                                             <a href="{{ route('show.single.bullding', ['id' => $bullding->id]) }}" class="btn btn-primary btn-sm" role="button">Show Details
                                                  <span class="glyphicon glyphicon-info-sign"></span>
                                             </a>
                                        @endif
                                   </div>
                                   <div class="pricetext">{{ $bullding->price }}</div>
                              </div>
                              </div>
                         </div>
                    @endforeach
               </div>
          @endforeach
          <div class="clearfix"></div>
     @else
          <div class="alert alert-danger">No Bullding Now</div>
     @endif
