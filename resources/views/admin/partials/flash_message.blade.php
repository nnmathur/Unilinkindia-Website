@if(Session::has('message'))
@php $message = Session::get('message') @endphp

<div class="alert {{ $message['flag'] }}" style="width: 100%;">
    <a href="#" class="close" data-dismiss="alert">&times;</a>
    {{ $message['message'] }}
</div>

@endif

@if($errors->any())
	<div class="alert alert-danger" style="width: 100%;"> 
        @foreach ($errors->all() as $error)
            <li style="list-style-type: none;">{{ $error }}</li>
        @endforeach
    </div>
@endif 