@extends('template')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">

                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">ホーム</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{$type->formatted_name}}</li>
                    </ol>
                </nav>
                <h3 class="text-center mb-4">{{$type->formatted_name}}の利用者安否確認システム</h3>

                <h2>使い方</h2>
                <a class="btn btn-success btn-lg text-white btn-block" href="{{route('group.create',$type)}}"><i class="material-icons">add_circle_outline</i> 新しく登録する</a>
            </div>
        </div>
    </div>
</div>
@endsection
