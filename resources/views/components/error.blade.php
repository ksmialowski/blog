@props(['name'])

@error($name)
    <div class="alert alert-danger small mt-3" role="alert">
        {{ $message }}
    </div>
@enderror
