@if ( session()->has('info'))
    <div class="alert alert-info">
        <button type="button" class="close" data-dismiss="alert">x</button>
        {{ session()->get('info') }}
    </div>
@endif

@if ( session()->has('warning'))
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">x</button>
        {{ session()->get('warning') }}
    </div>
@endif

@if ( session()->has('success'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">x</button>
        {{ session()->get('success') }}
    </div>
@endif

@if ( session('status'))
    <button type="button" class="close" data-dismiss="alert">x</button>
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif