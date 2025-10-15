@extends('layouts.app');


@section('content')

<div class="cart" >
    <h2>{{ $title }}</h2>
    <form action="" method="post">
        @csrf
            <div>
                <label for="">Full name</label><br>
                <input type="text" placeholder="Mehdy .." >
            </div>

            <div>
                <label for="">Email</label><br>
                <input type="email" placeholder="exemple@gmail.com">
            </div>

            <div>
                <label for="">Message</label><br>
                <textarea type="text" rows="5" placeholder="write a message"></textarea>
            </div>

            <button type="submit">Send</button>
    </form>
</div>  

@endsection





























