{{-- contac name --}}
<div class="form-group{{ $errors->has('contactName') ? ' has-error' : '' }}">
     <label for="contactName" class="col-md-4 control-label"> Contact Name </label>
     <div class="col-md-6">
          {!! Form::text('contactName', null, ['class' => 'form-control', 'id' => 'contactName']) !!}
          @if ($errors->has('contactName'))
               <span class="help-block">
                    <strong>{{ $errors->first('contactName') }}</strong>
               </span>
          @endif
     </div>
</div>
{{-- contact email --}}
<div class="form-group{{ $errors->has('contactEmail') ? ' has-error' : '' }}">
     <label for="contactEmail" class="col-md-4 control-label"> Contact Email </label>
     <div class="col-md-6">
          {!! Form::email('contactEmail', null, ['class' => 'form-control', 'id' => 'contactEmail']) !!}
          @if ($errors->has('contactEmail'))
               <span class="help-block">
                    <strong>{{ $errors->first('contactEmail') }}</strong>
               </span>
          @endif
     </div>
</div>
{{-- contac message --}}
<div class="form-group{{ $errors->has('contactMessage') ? ' has-error' : '' }}">
     <label for="contactMessage" class="col-md-4 control-label"> Contact message </label>
     <div class="col-md-6">
          {!! Form::textarea('contactMessage', null, ['class' => 'form-control', 'id' => 'contactMessage']) !!}
          @if ($errors->has('contactMessage'))
               <span class="help-block">
                    <strong>{{ $errors->first('contactMessage') }}</strong>
               </span>
          @endif
     </div>
</div>
{{-- contac type --}}
<div class="form-group{{ $errors->has('contactType') ? ' has-error' : '' }}">
     <label for="contactType" class="col-md-4 control-label"> Contact message </label>
     <div class="col-md-6">
          {!! Form::select('contactType', contact(), null, ['class' => 'form-control', 'id' => 'contactType']) !!}
          @if ($errors->has('contactType'))
               <span class="help-block">
                    <strong>{{ $errors->first('contactType') }}</strong>
               </span>
          @endif
     </div>
</div>
{{-- submit --}}
<div class="form-group">
     <div class="col-md-6 col-md-offset-4">
          <button type="submit" class="btn btn-info">
               <i class="fa fa-btn fa-edit"></i> update
          </button>
     </div>
</div>
