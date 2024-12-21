<!-- resources/views/components/application-logo.blade.php -->
@props(['dark' => false])

<img src="{{ asset($dark ? 'images/darknavbarlogo.webp' : 'images/lightnavbarlogo.webp') }}" id="navbarlogo" width="150"
    height="150" class="align-middle me-1 img-fluid" alt="My Website" {{ $attributes }}>
