<div class="form-group row {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-sm-2 col-form-label">Name *</label>
    <div class="col-sm-10">
        <input type="text" class="form-control flat" name="name" id="name" value="{{ $details->name }}" autofocus>
        @if($errors->has('name'))
            <h5 class="err">{{ $errors->first('name') }}</h5>
        @endIf
    </div>
</div>
<div class="form-group row {{ $errors->has('email') ? 'has-error' : '' }}">
    <label for="email" class="col-sm-2 col-form-label">Email *</label>
    <div class="col-sm-10">
        <input type="email" class="form-control flat" name="email" id="email" value="{{ $details->email }}" >
        @if($errors->has('email'))
            <h5 class="err">{{ $errors->first('email') }}</h5>
        @endIf
    </div>
</div>
@if(request()->route()->named($route . 'create'))
<div class="form-group row {{ $errors->has('password') ? 'has-error' : '' }}">
    <label for="password" class="col-sm-2 col-form-label">Password *</label>
    <div class="col-sm-10">
        <input type="password" class="form-control flat" name="password" id="password" value="{{ old('password') }}" >
        @if($errors->has('password'))
            <h5 class="err">{{ $errors->first('password') }}</h5>
        @endIf
    </div>
</div>
<div class="form-group row {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
    <label for="password_confirmation" class="col-sm-2 col-form-label">Password Confirmation *</label>
    <div class="col-sm-10">
        <input type="password" class="form-control flat" name="password_confirmation" id="password_confirmation" value="{{ old('password_confirmation') }}" >
        @if($errors->has('password_confirmation'))
            <h5 class="err">{{ $errors->first('password_confirmation') }}</h5>
        @endIf
    </div>
</div>
@endIf
<div class="form-group row {{ $errors->has('role_id') ? 'has-error' : '' }}">
    <label for="role_id" class="col-sm-2 col-form-label">Role *</label>
    <div class="col-sm-10">
        <select name="role_id" id="role_id" class="form-control flat">
            @foreach($roles as $k=>$v)
                <option value="{{ $k }}" @if($details->role_id == $k) select="selected" @endif>{{ $v }}</option>
            @endforeach
        </select>
        @if($errors->has('role_id'))
            <h5 class="err">{{ $errors->first('role_id') }}</h5>
        @endIf
    </div>
</div>