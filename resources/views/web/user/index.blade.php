@extends('web.layout.main')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title v-align-middle">Data Pengguna</h3>

                <a href="{{route('web.user.create')}}" class="btn btn-primary btn-sm pull-right">Tambah</a href="#">
                <!-- <a href="{{route('web.user.bulk_import')}}" style="margin-right: 7px;" class="btn btn-success btn-sm pull-right">Import</a href="#"> -->
            </div>
            <div class="box-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12 col-md-2">
                            <form class="form-inline">
                                <div class="form-group">
                                    <label class="sr-only" for="search">Pencarian</label>
                                    <input type="text" placeholder="Masukan No. ID" class="form-control input-sm" name="search" id="search">
                                </div>
                                <button type="submit" class="btn btn-primary btn-sm">Cari</button>
                            </form>
                        </div>

                        <div class="col-sm-12 col-md-10">
                            <form class="form-inline">
                                <div class="form-group">
                                    <label class="sr-only" for="role">Role</label>
                                    <select class="form-control input-sm" name="role" id="role">
                                        <option value="" selected="">Semua Role</option>
                                        @foreach(\App\Constans\UserRole::LIST as $i => $role)
                                            <option value="{{$i}}" {{!is_null(\Request::get('role')) && \Request::get('role') == $i ? 'selected':''}}>{{ucfirst($role)}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary btn-sm">Filter</button>
                                <a href="{{route('web.user.index')}}" class="btn btn-default btn-sm">Reset</a>
                            </form>
                        </div>
                    </div>
                    <div class="row table-responsive">
                        <table class="table table-striped table-hovered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>NSK</th>
                                    <th>Registrasi</th>
                                    <th>Role</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $i => $user)
                                    <tr>
                                        <td>{{($i+1)}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->nsk}}</td>
                                        <td>{{date('d F Y', strtotime($user->created_at))}}</td>
                                        <td>{{\App\Constans\UserRole::getString($user->role)}}</td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Button action">
                                                <a title="Edit" href="{{route('web.user.edit', [$user->id])}}" class="btn btn-warning btn-sm">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <button title="Hapus" data-action="delete" data-href="{{route('web.user.delete', [$user->id])}}" class="btn btn-danger btn-sm">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="7">{{$users->appends(request()->except('page'))->links()}}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script>
    $('button[data-action=delete]').click(function() {
        var url = $(this).data('href');
        Swal.fire({
            title: 'Anda yakin akan menghapus data ?',
            text: "Hal ini tidak dapat di urungkan",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if(result.value)
                window.location.assign(url);
        });
    });
</script>
@endpush