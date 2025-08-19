@extends('web.layout.main')


@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title v-align-middle">Tambah Pengguna Baru</h3>
            </div>
            <div class="box-body">
                @if($errors->any())
                    <div class="alert alert-danger" role="alert">{{$errors->first()}}</div>
                @endif
                <form method="POST" enctype="multipart/form-data" action="{{ route('web.user.insert') }}">
                    <div class="row">
                        <div class="col-sm-12 col-md-4 pr-1">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" value="{{old('name')?old('name'):''}}" name="name" id="name" placeholder="Ex: Fulan" required>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 pr-1">
                            <div class="form-group">
                                <label for="nsk">NSK</label>
                                <input type="text" class="form-control" value="{{old('nsk')?old('nsk'):''}}" name="nsk" id="nsk" placeholder="Ex: 12345678" required>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 pr-1">
                            <div class="form-group">
                                <label for="role">Role Pengguna</label>
                                <select class="form-control" name="role" id="role" required>
                                    <option value="" selected disabled>Pilih Role</option>
                                    @foreach(\App\Constans\UserRole::LIST as $i => $status)
                                        <option value="{{$i}}" {{$i == \App\Constans\UserRole::ADMIN ? 'selected':''}}>{{ucfirst($status)}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-6 pr-1">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" value="{{old('password')?old('password'):''}}" name="password" id="password" autocomplete="off" required>
                                <small class="help-text">Password ter-isi otomatis sama seperti username, silahkan di ganti jika diperlukan</small>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 pr-1">
                            <div class="form-group">
                                <label for="password_confirmation">Konfimasi Password</label>
                                <input type="password" class="form-control" value="{{old('password_confirmation')?old('password_confirmation'):''}}" name="password_confirmation" id="password_confirmation" autocomplete="off" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-primary btn-round pull-right">Simpan</button>
                            <button type="reset" style="margin-right: 10px;" class="btn btn-warning btn-round pull-right">Batal</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{asset('css/bootstrap-datepicker3.min.css')}}">
@endpush

@push('scripts')
<script src="{{asset('js/bootstrap-datepicker.min.js')}}"></script>
<script>
    $('#email').on('change', function() {
        var val = $(this).val();

        $('#password_confirmation').val(val);
        $('#password').val(val);
    });
    $('[data-type=date]').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        zIndexOffset: 1500
    });
</script>
@endpush