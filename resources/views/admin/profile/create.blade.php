@extends('layouts.profile')

@section('title','プロフィールの新規作成')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>Myプロフィール作成画面</h2>
                <h3>※全て必須項目です</h3>
                <form action="{{ action('Admin\ProfileController@create') }}" method="post" enctype="multipart/form-data">
                @if (count($errors) > 0)
                    <ul>
                        @foreach($errors->all() as $e)
                            <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                @endif
                <div class="form-group row">
                        <label class="col-md-2" for="title">名前</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                        </div>
                </div>
                <div class="form-group row">
                        <label class="col-md-2" for="title">性別</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="gender" value="{{ old('gender') }}">
                        </div>
                </div>
                <div class="form-group row">
                        <label class="col-md-2" for="title">趣味</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="hobby" value="{{ old('hobby') }}">
                        </div>
                </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="body">自己紹介欄</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="introduction" rows="20">{{ old('introduction') }}</textarea>
                        </div>
                    </div>
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="更新">
                </form>
            </div>
            
                <!--<form action = "{{action('Admin\ProfileController@create')}}" method="post" enctype="multipart/form-data">-->
                <!--    <p>名前：<input type="text" name="name"/></p>-->
                <!--    <p>性別：<input type="text" name="gender"/></P>-->
                            
                <!--    <p>趣味：<input type="text" name="hobby"/></p>-->
                <!--    <p>自己紹介欄</p>-->
                <!--    <textarea name="introduction"></textarea>-->
                    
                        
                <!--    {{ csrf_field() }}-->
                <!--    <input type="submit" class="btn btn-primary" value="更新">-->
                <!--</form>-->
                
        </div>
    </div>
@endsection
