@if(Session::has('message'))
    <p class="message js--message" data-type="success">
        {{ Session::get('message') }}
    </p>
@endif
@if(isset($errors) && $errors->any())
    <ul class="message js--message" data-type="warning">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
