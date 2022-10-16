@extends('layouts.apps')

@section('content')
    <div class="container">
    <div class="row">
        <div class="main-header">
            <h4>Nasabah</h4>
        </div>
    </div>
    <div class="row p-5">
        <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                    <h5 class="card-header-text">Input Nasabah</h5>
                    </div>
                    <div class="card-block">
                    <div>
                         <form method="POST" action="{{ route('admin.registerStore') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="nik" class="col-md-4 col-form-label text-md-end">{{ __('NIK') }}</label>

                            <div class="col-md-6">
                                <input id="nik" name="nik" type="text" maxlength="16" class="form-control @error('nik') is-invalid @enderror" value="{{ old('nik') }}" required autocomplete="nik" autofocus>

                                @error('nik')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="jk" class="col-md-4 col-form-label text-md-end">{{ __('Jenis Kelamin') }}</label>

                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jk" id="jk1" value="Laki-laki">
                                    <label class="form-check-label" for="jk1">
                                        Laki-laki
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jk" id="jk2" value="Perempuan">
                                    <label class="form-check-label" for="jk2">
                                        Perempuan
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="hp" class="col-md-4 col-form-label text-md-end">{{ __('No. Hp') }}</label>

                            <div class="col-md-6">
                                <input id="hp" name="hp" type="text" maxlength="12" class="form-control @error('hp') is-invalid @enderror" value="{{ old('hp') }}" required>

                                @error('nik')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="alamat" class="col-md-4 col-form-label text-md-end">{{ __('Alamat')}}</label>

                            <div class="col-md-6">
                                <textarea name="alamat" id="alamat" cols="30" rows="6" class="form-control" @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat') }}" ></textarea>

                                @error('alamat')
                                    <span class="invalid-feedbac" role="alert">
                                        <strong>{{ $message }}</strong></span> 
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label for="image" class="col-md-4 col-form-label text-md-end">{{ __('Upload KTP') }}</label>
                            
                            <div class="col-md-6">
                                <input id="image" type="file" placeholder="Max 2 MB" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" required>
                                <span class="small secondary" style="color: blue">Image Max 2 MB</span>
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0 mt-3">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    </div>
                    </div>
                </div>
            </div>
    </div>
</div>
@endsection