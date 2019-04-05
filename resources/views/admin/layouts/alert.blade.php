@if(count($errors) > 0)
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Invalid!</strong>
        {{ $errors }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@isset($message)
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Message: </strong>
        {{ $message }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endisset