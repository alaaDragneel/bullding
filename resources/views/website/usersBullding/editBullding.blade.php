<div class="box-body">
     <div class="panel panel-primary">
          <div class="panel-heading">Bullding Create</div>
          <div class="panel-body">
               {!! Form::model($bulldingInfo, ['method' => 'post', 'route' => ['user.update.bullding.unappreved'], 'class' => 'form-horizontal', 'files' => 'true']) !!}
               <input type="hidden" name="id" value="{{ $bulldingInfo->id }}">

               <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-4 control-label">Name</label>
                    <div class="col-md-6">
                         {!! Form::text('name', isset($bulldingInfo) ? $bulldingInfo->name  : old('name'), ['id'=>'name', 'class'=>'form-control']) !!}

                         @if ($errors->has('name'))
                              <span class="help-block">
                                   <strong>{{ $errors->first('name') }}</strong>
                              </span>
                         @endif
                    </div>
               </div>
               {{-- bullding_rooms --}}
               <div class="form-group{{ $errors->has('rooms') ? ' has-error' : '' }}">
                    <label for="rooms" class="col-md-4 control-label">bullding rooms</label>

                    <div class="col-md-6">
                         {!! Form::text('rooms', isset($bulldingInfo) ? $bulldingInfo->rooms  : old('rooms'), ['id'=>'rooms', 'class'=>'form-control']) !!}
                         @if ($errors->has('rooms'))
                              <span class="help-block">
                                   <strong>{{ $errors->first('rooms') }}</strong>
                              </span>
                         @endif
                    </div>
               </div>
               {{-- bullding_price --}}
               <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                    <label for="price" class="col-md-4 control-label">bullding price</label>

                    <div class="col-md-6">
                         {!! Form::text('price', isset($bulldingInfo) ? $bulldingInfo->price  : old('price'), ['id'=>'price', 'class'=>'form-control']) !!}

                         @if ($errors->has('price'))
                              <span class="help-block">
                                   <strong>{{ $errors->first('price') }}</strong>
                              </span>
                         @endif
                    </div>
               </div>
               {{-- bullding_rent --}}
               <div class="form-group{{ $errors->has('rent') ? ' has-error' : '' }}">
                    <label for="rent" class="col-md-4 control-label">bullding rent</label>

                    <div class="col-md-6">
                         {!! Form::select('rent', rent(), null, ['class' => 'form-control', 'id' => 'rent']); !!}
                         @if ($errors->has('rent'))
                              <span class="help-block">
                                   <strong>{{ $errors->first('rent') }}</strong>
                              </span>
                         @endif
                    </div>
               </div>
               {{-- bullding_square --}}
               <div class="form-group{{ $errors->has('square') ? ' has-error' : '' }}">
                    <label for="square" class="col-md-4 control-label">bullding square</label>

                    <div class="col-md-6">
                         {!! Form::text('square', isset($bulldingInfo) ? $bulldingInfo->square  : old('square'), ['id'=>'square', 'class'=>'form-control']) !!}

                         @if ($errors->has('square'))
                              <span class="help-block">
                                   <strong>{{ $errors->first('square') }}</strong>
                              </span>
                         @endif
                    </div>
               </div>
               {{-- bullding_type --}}
               <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                    <label for="type" class="col-md-4 control-label">bullding type</label>

                    <div class="col-md-6">
                         {!! Form::select('type', type(), null, ['class' => 'form-control', 'id' => 'type']); !!}
                         @if ($errors->has('type'))
                              <span class="help-block">
                                   <strong>{{ $errors->first('type') }}</strong>
                              </span>
                         @endif
                    </div>
               </div>
               {{-- bullding_place --}}
               <div class="form-group{{ $errors->has('place') ? ' has-error' : '' }}">
                    <label for="place" class="col-md-4 control-label">bullding place</label>

                    <div class="col-md-6">
                         {!! Form::select('place', place(), null, ['class' => 'form-control', 'id' => 'place']) !!}
                         @if ($errors->has('place'))
                              <span class="help-block">
                                   <strong>{{ $errors->first('place') }}</strong>
                              </span>
                         @endif
                    </div>
               </div>
               {{-- bullding_meta --}}
               <div class="form-group{{ $errors->has('meta') ? ' has-error' : '' }}">
                    <label for="meta" class="col-md-4 control-label">bullding meta</label>

                    <div class="col-md-6">
                         {!! Form::text('meta', isset($bulldingInfo) ? $bulldingInfo->meta  : old('meta'), ['id'=>'meta', 'class'=>'form-control']) !!}

                         @if ($errors->has('meta'))
                              <span class="help-block">
                                   <strong>{{ $errors->first('meta') }}</strong>
                              </span>
                         @endif
                    </div>
               </div>
               {{-- bullding_langtuide --}}
               <div class="form-group{{ $errors->has('langtuide') ? ' has-error' : '' }}">
                    <label for="langtuide" class="col-md-4 control-label">bullding langtuide</label>

                    <div class="col-md-6">
                         {!! Form::text('langtuide', isset($bulldingInfo) ? $bulldingInfo->langtuide  : old('langtuide'), ['id'=>'langtuide', 'class'=>'form-control']) !!}

                         @if ($errors->has('langtuide'))
                              <span class="help-block">
                                   <strong>{{ $errors->first('langtuide') }}</strong>
                              </span>
                         @endif
                    </div>
               </div>
               {{-- bullding_latitiute --}}
               <div class="form-group{{ $errors->has('latitiute') ? ' has-error' : '' }}">
                    <label for="latitiute" class="col-md-4 control-label">bullding latitiute</label>

                    <div class="col-md-6">
                         {!! Form::text('latitiute', isset($bulldingInfo) ? $bulldingInfo->latitiute  : old('latitiute'), ['id'=>'latitiute', 'class'=>'form-control']) !!}

                         @if ($errors->has('latitiute'))
                              <span class="help-block">
                                   <strong>{{ $errors->first('latitiute') }}</strong>
                              </span>
                         @endif
                    </div>
               </div>
               {{-- bullding_large_disc --}}
               <div class="form-group{{ $errors->has('decription') ? ' has-error' : '' }}">
                    <label for="decription" class="col-md-4 control-label">bullding  decription</label>

                    <div class="col-md-6">
                         {!! Form::textarea('decription', isset($bulldingInfo) ? $bulldingInfo->decription  : old('decription'), ['id'=>'decription', 'class'=>'form-control', 'rows' => '5']) !!}

                         @if ($errors->has('decription'))
                              <span class="help-block">
                                   <strong>{{ $errors->first('decription') }}</strong>
                              </span>
                         @endif
                    </div>
               </div>
               {{-- image --}}
               <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                    <label for="image" class="col-md-4 control-label">bullding  image</label>

                    <div class="col-md-6">
                         {!! Form::file('image') !!}

                         @if ($errors->has('image'))
                              <span class="help-block">
                                   <strong>{{ $errors->first('image') }}</strong>
                              </span>
                         @endif
                    </div>
                    <br>
                    <div class="col-md-4">
                         @if (isset($bulldingInfo))
                              @if ($bulldingInfo->image !== '')
                                   <img src="{{ asset($bulldingInfo->image) }}" class="img-responsive img-thumbnail">
                              @endif
                         @endif
                    </div>
               </div>

               <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                         <button type="submit" class="btn btn-info">
                              <i class="fa fa-btn fa-edit"></i> update
                         </button>
                         <a href="{{ route('admin.bulldings.destroy', ['id' => $bulldingInfo->id]) }}" class="btn btn-danger">
                              <i class="fa fa-close"></i> Delete
                         </a>
                    </div>
               </div>

               {!! Form::close() !!}
          </div>
     </div>
</div>
