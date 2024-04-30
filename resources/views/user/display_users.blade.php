@foreach($users as $user)
    <div class="d-flex justify-content-between align-items-center w-100">
        <a href="/user?id={{$user['id']}}">{{$user['login']}}</a>
        <img src="{{asset('storage/'.$user['avatar'])}}" alt="avatar" style="width: 2.5rem">
    </div>
@endforeach