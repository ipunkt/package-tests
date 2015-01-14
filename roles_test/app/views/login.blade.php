@foreach($errors->all() as $error)
    {{ $error }}
@endforeach

<h1>Login</h1>
{{ Form::open()  }} 
<div>
{{ Form::label('email', 'Email') }}
{{ Form::text('email') }}
</div>
<div>
    {{ Form::label('password', 'Password') }}
    {{ Form::password('password') }}
</div>
{{ Form::submit() }}
{{ Form::close() }}
{{ link_to('/register', 'Register') }}