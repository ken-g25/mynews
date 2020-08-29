
<!---->課題4
@extends('layouts.profile')

@section('title','プロフィールの新規作成')

@section('content')
    <div class="container">
        <div class="row">
            <body>
                <h1>Myプロフィール作成画面</h1>
                
                @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
            
                <form action = "{{action('Admin\ProfileController@create')}}" method="post" enctype="multipart/form-data">
                <p>名前：<input type="text" name="name"/></p>
                <p>性別：<input type="text" name="gender"/></P>
                        
                <p>趣味：<input type="text" name="hobby"/></p>
                <p>自己紹介欄</p>
                <textarea name="introduction"></textarea>
                
                </form>
            </body>
        </div>
    </div>
@endsection
