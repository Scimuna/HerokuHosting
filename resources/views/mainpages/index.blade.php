<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('mystyle/style.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body id="background-image">
        <div class="container mt-5">

                <div class="row">
                        
                               

                                
                        <div class="col-md-6 col-sm-6 form-div">
                                @if ($errors->any())
                                @foreach ( $errors->all() as $error)
                                <p class="alert alert-danger">  {{ $error}}</p>
                                @endforeach
                                @endif
                                @if (isset($msg))
                                <p class="alert alert-success">{{$msg}}</p>
                                @endif  

                                @if (isset($emptymsg))
                                <p class="alert alert-danger">{{$emptymsg}}</p>
                                @endif  

                                
                                <form  action="{{ route('create') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                                <label  for="content" class="form-label">YOUR CONTENT:<textarea id="content" name="content" class="form-control" cols="90" rows="5">@if (isset($info)) {{$info }}@endif</textarea></label>
                                        </div>

                                        <div class="form-group">
                                                <label  for="image" class="form-label">IF YOU HAVE A FILE TO ATTACH:<input  class="form-control" type="file" name="file" id="image"></label>
                                        </div>

                                        <div class="form-group">
                                                <button class="btn btn-success" type="submit">SEND</button>
                                        </div>
                                </form>
                        </div>

                        <div class="col-md-6 col-sm-6 mt-5">
                                @if (isset($errormsg))
                                <p class="alert alert-danger">{{$errormsg}}</p>
                                @endif 
                                 @if (isset($msgret) && isset($file))
                                <p class="alert alert-success" style="width:50%">{{$msgret}}</p>
                                
                                <form method="POST" action="{{ route('download') }}">
                                        @csrf
                                        <input type="hidden" name="file" value="{{ $file }}" />
                                        <button class="btn btn-warning" type="submit">Click Here To Download The File Attached</button>
                                </form>
                                @endif 
                                <form method="post" action="{{ route('retrieve.otp', @$otp) }}">
                                        @csrf
                                        <div class="form-group">
                                                <label  for="image" class="form-label">TOKEN:<input type="text"  name="token" class="form-control" value="@if (@$otp){{ $otp }}@endif"></label>
                                        </div>

                                        <div class="form-group">
                                                <button class="btn btn-success" type="submit">RETRIEVE</button>
                                        </div>
                                </form>
                        </div>
                </div>

        </div>

        <div class="container-fluid">
                <div class="row">
                        <div class="col" id="klipboard">
                                                <p id="writeup" class="animate__animated animate__swing">KLIPPBOARD</p>
                        </div>
                </div>
        </div>
</body>
</html>