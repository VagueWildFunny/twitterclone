

@if ($message = Session::get('success'))

<div class=" alert card-header bg-success">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>

@endif