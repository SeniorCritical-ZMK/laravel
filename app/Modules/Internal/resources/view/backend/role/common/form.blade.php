@push('css')
    <!-- Select2 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@endpush

<div class="form-group row {{ $errors->has('name') ? 'has-error' : '' }}">
        <label for="name" class="col-sm-2 col-form-label">Name *</label>
        <div class="col-sm-10">
            <input type="text" class="form-control flat" name="name" id="name" value="{{ $details->name }}" autofocus>
            @if($errors->has('name'))
                <h5 class="err">{{ $errors->first('name') }}</h5>
            @endIf
        </div>
    </div>
    <div class="form-group row {{ $errors->has('description') ? 'has-error' : '' }}">
        <label for="description" class="col-sm-2 col-form-label">Description *</label>
        <div class="col-sm-10">
            <textarea id="description" name="description" class="form-control flat">{{ $details->description }}</textarea>
            @if($errors->has('description'))
                <h5 class="err">{{ $errors->first('description') }}</h5>
            @endIf
        </div>
    </div>
    <div class="form-group row {{ $errors->has('permissions') ? 'has-error' : '' }}">
        <label for="permissions" class="col-sm-2 col-form-label">Permissions *</label>
        <div class="col-sm-10">
            <select name="permissions[]" id="permissions" class="form-control flat" multiple="multiple">
                @if($details->permissions)
                    @foreach(config('permissions') as $k=>$v)
                        <option value="{{ $k }}"
                            @if($details->permissions->contains($k)) selected="selected" @endif>{{ $v }}</option>
                    @endforeach
                @else
                    @foreach(config('permissions') as $k=>$v)
                        <option value="{{ $k }}">{{ $v }}</option>
                    @endforeach
                @endif
            </select>
            @if($errors->has('permissions'))
                <h5 class="err">{{ $errors->first('permissions') }}</h5>
            @endIf
        </div>
    </div>

@push('scripts')
    <!-- Select2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

    <script type="text/javascript">
        $("select[name='permissions[]']").select2();
    </script>
@endpush
