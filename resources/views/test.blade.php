<!DOCTYPE html>
<html>
  <head>
    <title>Hello, world!</title>
    <title>Page Title</title>
  </head>

  <body>
    <p>Hi {{ $user->name }},</p>
    <p>We've received a request to set a new password for this  {{ $user->email }}</p>
    {{-- In href there will be get request / {{ $token }} --}}
    <button onclick="window.location.href='{{ $token }}'">
      Reset password
    </button>    
  </body>
</html>
