@extends('layouts.app')

@section('title')
     Contact Us
@endsection

@section('styles')
     {!! Html::style('src/global/bulldingAll.css') !!}
@endsection

@section('content')
     <div class="container" style="margin-top: 20px;">
          <div class="row">
               <div class="col-md-8">
                    <div class="well well-sm">
                         {!! Form::open(['route' => 'send.contact', 'method' => 'post']) !!}
                              <div class="row">
                                   <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('contactName') ? ' has-error' : '' }}">
                                             <label for="name"> Name</label>
                                             <input type="text" name="contactName" class="form-control" id="name" placeholder="Enter name" required="required" />
                                             @if ($errors->has('contactName'))
                                                  <span class="help-block">
                                                       <strong>{{ $errors->first('contactName') }}</strong>
                                                  </span>
                                             @endif
                                        </div>
                                        <div class="form-group{{ $errors->has('contactEmail') ? ' has-error' : '' }}">
                                             <label for="email"> Email Address</label>
                                             <div class="input-group">
                                                  <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                             </span>
                                             <input type="email"
                                             name="contactEmail"
                                             class="form-control"
                                             id="email"
                                             placeholder="Enter email"
                                             required="required"
                                             value="{{ Auth::user() ? Auth::user()->email : '' }}"/>
                                             @if ($errors->has('contactEmail'))
                                                  <span class="help-block">
                                                       <strong>{{ $errors->first('contactEmail') }}</strong>
                                                  </span>
                                             @endif
                                        </div>
                                        </div>
                                        <div class="form-group{{ $errors->has('contactType') ? ' has-error' : '' }}">
                                             <label for="subject"> Type</label>
                                             <select id="subject" name="contactType" class="form-control" required="required">
                                                  @foreach (contact() as $key => $value)
                                                       <option value="{{ $key }}">{{ $value }}</option>
                                                  @endforeach
                                             </select>
                                             @if ($errors->has('contactType'))
                                                  <span class="help-block">
                                                       <strong>{{ $errors->first('contactType') }}</strong>
                                                  </span>
                                             @endif
                                        </div>
                                   </div>
                                   <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('contactMessage') ? ' has-error' : '' }}">
                                             <label for="name"> Message</label>
                                             <textarea name="contactMessage" id="message" class="form-control" rows="9" cols="25" required="required"
                                             placeholder="Message"></textarea>
                                             @if ($errors->has('contactMessage'))
                                                  <span class="help-block">
                                                       <strong>{{ $errors->first('contactMessage') }}</strong>
                                                  </span>
                                             @endif
                                        </div>
                                   </div>
                                   <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary pull-right" id="btnContactUs">
                                             Send Message
                                        </button>
                                   </div>
                              </div>
                         {!! Form::close() !!}
                    </div>
               </div>
               <div class="col-md-4">
                    <form>
                         <legend><i class="fa fa-outdent"></i> Our office</legend>
                         <address>
                              {!! nl2br(getSetting('address')) !!}
                              <br>
                              <abbr title="Phone">P:</abbr>
                              {!! nl2br(getSetting('sitePhone')) !!}
                         </address>
                         <address>
                              <strong>{{ getSetting() }}</strong><br>
                              <a href="mailto:#">{!! nl2br(getSetting('email')) !!}</a>
                         </address>
                    </form>
               </div>
          </div>
     </div>
@endsection
