<!-- Name -->
<div class="form-group {{ $errors->has('code') ? ' has-error' : '' }}">
    <label for="code" class="col-md-3 control-label">Code</label>
    <div class="col-md-3 col-sm-12{{  (Helper::checkIfRequired($item, 'code')) ? ' required' : '' }}">
        <input class="form-control" type="text" name="code" aria-label="code" id="code" value="{{ old('code', $item->code) }}"{!!  (Helper::checkIfRequired($item, 'code')) ? ' data-validation="required" required' : '' !!} minlength="3" maxlength="3" />
        {!! $errors->first('code', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>') !!}
    </div>
</div>
