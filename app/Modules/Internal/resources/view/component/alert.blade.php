@if($type != null && $message != null)
    <div class="alert alert-{{$type}} alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        {{ $message }}
    </div>
@endif