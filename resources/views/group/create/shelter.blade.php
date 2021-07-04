<input type="hidden" name="type" value="{{$type}}">

<div class="form-group row">
    <label for="name">避難所名</label>
    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus>
    @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="form-group row">
    <label for="password">パスワード</label>
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
</div>

<div class="form-group row">
    <label for="password-confirm">パスワードを再入力</label>
    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
</div>

<div class="form-group row mb-0">
    <button type="submit" class="btn btn-primary btn-block">
    グループ登録
    </button>
</div>
                    