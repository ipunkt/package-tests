@foreach($errors->all() as $error)
    {{ $error }}
@endforeach

<h1>Register</h1>
{{ Form::open(['url' => '/register'])  }} 
<div>
{{ Form::label('email', 'Email') }}
{{ Form::text('email') }}
</div>
<div>
    {{ Form::label('password', 'Password') }}
    {{ Form::password('password') }}
</div>
{{ Form::submit()  }}
{{ Form::close() }}
