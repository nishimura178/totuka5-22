@extends('template')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card mb-3">


            <nav aria-label="breadcrumb" role="navigation" class="px-3 pt-3">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">ホーム</a></li>
                    <li class="breadcrumb-item"><a href="#">{{$group->getFormattedTypeName()}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$group->name}}</li>
                </ol>
            </nav>


            <div class="card-body">

            @include('group.show.header.'.$group->getTypeName(), ['group'=>$group,'bases'=>$bases])
            
            @if(Auth::user()->hasGroup($group->id))
            @if($group->getType()->need_location)
            <div class="text-left mt-4 mb-3">
                <a class="btn btn-outline-primary btn-round btn-sm" href="{{route('group_location.edit',[$group->id])}}"><i class="material-icons">location_on</i> 座標変更</a>
            </div>
            @endif
            <div class="row">
                <a class="btn btn-primary btn-block" href="{{route('group.edit',[$group->id])}}"><i class="material-icons">edit</i> 変更</a>
            </div>
            @endif

            </div>
        </div>
        <div class="card mt-0 mb-2">
            <div class="card-body">
                <ul class="nav nav-pills nav-pills-primary">
                    @foreach ($bases as $base)
                    <li class="nav-item mx-auto">
                        <a class="nav-link @if($base->index==$index) active @endif" href="#pill{{$base->index}}" data-toggle="tab">{{$base->name}}</a>
                    </li>
                    @endforeach
                </ul>

                <div class="tab-content tab-space pb-0">
                    @foreach ($bases as $base)
                    <div class="tab-pane @if($base->index==$index) active @endif" id="pill{{$base->index}}">
                        @include('info.info.show.'.$base->getTemplate()->id, ['base'=>$base,'info'=>$base->info()])
                        @can('update-group-info',[$group,$base->index])
                        <div class="row">
                            <a class="btn btn-outline-primary btn-block mx-auto" href="{{route('group.info.edit',[$group->id,$base->index])}}"><i class="material-icons">edit</i> 変更</a>
                        </div>
                        @endcan
                    </div>
                    @endforeach
                </div>
                @can('viewAny-group-info-bases', $group)
                <div class="row">
                    <a class="btn btn-primary btn-block" href="{{route('group.info_base.index',[$group->id])}}"><i class="material-icons">list</i> 情報編集</a>
                </div>
                @endcan
            </div>
            
        </div>
        
    </div>
</div>
@endsection