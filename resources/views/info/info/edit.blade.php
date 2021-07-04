@extends('template')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('info_base.info.update',[$base->id]) }}">
                    @csrf
                    @method('PUT')
                    @include('info.info.edit.'.$base->getTemplate()->id, ['info' => $info])
                </form>
            </div>
        </div>
    </div>
</div>
@endsection