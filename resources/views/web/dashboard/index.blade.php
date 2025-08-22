@extends('web.layout.main')

@section('content')
<!-- Info boxes -->
<div class="row" style="margin-top: 3rem">
    <form id="form_print" method="post" action="{{route('web.dashboard.print')}}" target="_blank">
        {{csrf_field()}}
        <div class="row">
            <div class="col-sm-4 col-sm-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="size">Type/Size</label>
                            <input type="email" name="size" class="form-control" id="size" value="AVSS 2.0 SQ 37/0.260" readonly>
                        </div>
                        <div id="label_length" class="form-group">
                            <label for="length">Length (meter)</label>
                            <input type="number" name="length" class="form-control" id="length" placeholder="Length">
                        </div>
                        <div id="label_weight" class="form-group">
                            <label for="weight">Weight (Kg)</label>
                            <input type="number" name="weight" class="form-control" id="weight" placeholder="Weight">
                        </div>
                        <div id="label_date" class="form-group">
                            <label for="date">Date</label>
                            <select id="date" name="shift_date" class="form-control">                            
                            </select>
                        </div>
						<div id="label_lot_not" class="form-group">
                            <label for="lot_not">Lot No</label>
                            <input type="number" name="lot_not" value="" class="form-control" id="lot_not" placeholder="Lot No (ex: 001)">
                        </div>
                        <div id="label_shift" class="form-group">
                            <label for="shift">Shift</label>
                            <select name="shift" id="shift" class="form-control">
                                <option value="1" selected>1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </div>
                        <div id="label_machine_no" class="form-group">
                            <label for="machine_no">Machine No</label>
                            <select name="machine_number" id="machine_no" class="form-control">
                                <option value="221" selected>221</option>
                                <option value="222">222</option>
                                <option value="223">223</option>
                                <option value="224">224</option>
                                <option value="225">225</option>
								<option value="226">226</option>
                                <option value="227">227</option>
                                <option value="228">228</option>
                                <option value="229">229</option>
								<option value="230">230</option>
                                <option value="231">231</option>
                                <option value="217">217</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div id="label_pitch" class="form-group">
                            <label for="pitch">Pitch</label>
                            <div class="radio">
                                <label>
                                    <input name="pitch" value="20.25" type="radio" checked> 20.25
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input name="pitch" value="22.50" type="radio"> 22.50
                                </label>
                            </div>
                        </div>
                        <div class="form-group">                        
                            <label for="direction">Direction</label>
                            <div class="radio">
                                <label>
                                    <input name="direction" value="S" type="radio" checked> S
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input name="direction" value="Z" type="radio"> Z
                                </label>
                            </div>
                        </div>        
                        <div class="form-group">
                            <label for="visual">Visual</label>
                            <div class="radio">
                                <label>
                                    <input name="visual" value="OK" type="radio" checked> OK
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input name="visual" value="NG" type="radio"> NG
                                </label>
                            </div>
                        </div>
                        <div id="label_remark" class="form-group">
                            <label for="remark">Remark</label>
                            <input type="text" name="remark" class="form-control" id="remark" placeholder="Remark">
                        </div>
                        
                        <div id="label_bobin_no" class="form-group">
                            <label for="bobin_no">No Bobin</label>
                            <input type="number" name="bobin_no" value="" class="form-control" id="bobin_no" placeholder="No Bobin">
                        </div>
                    </div>
                </div>
            </div>    
        </div>
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <button type="submit" class="btn btn-primary btn-block">Print</button>
            </div>
        </div>
    </form>
</div>

<div class="row" style="margin-top: 3rem; padding: 5rem;">
    <div class="col-sm-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title v-align-middle">Data Label</h3>
            </div>
            
            <div class="box-body">
                <div class="container-fluid">
                    
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <form class="form-inline">
                                <div class="form-group">
                                    <label class="sr-only" for="search">Pencarian</label>
                                    <input type="text" 
                                           value="{{ request('search') ?? '' }}" 
                                           placeholder="Masukan Lot No." 
                                           class="form-control input-sm" 
                                           name="search" 
                                           id="search" style="display: inline-block; width: auto; vertical-align: middle;">
                                </div>
                                <button type="submit" class="btn btn-primary btn-sm" style="vertical-align: middle;">Cari</button>
                                <a href="{{ route('web.dashboard.index') }}" 
                                   class="btn btn-success btn-sm" style="vertical-align: middle;">Reset</a>
                            </form>
                        </div>
                        <div class="col-md-6 text-right">
                            <form action="" method="GET" class="form-inline pull-right">
                                <label for="start_date" class="control-label">Dari</label>
                                <input type="date" 
                                    name="start_date" 
                                    id="start_date"
                                    class="form-control input-sm" 
                                    required>
                                <label for="end_date" class="control-label" style="margin-left: 10px;">Sampai</label>
                                <input type="date" 
                                    name="end_date" 
                                    id="end_date"
                                    class="form-control input-sm" 
                                    required>
                                <button formaction="{{ route('web.label.export.excel') }}" 
                                        class="btn btn-success btn-sm ms-2">
                                    <i class="fa fa-file-excel-o"></i> Excel
                                </button>
                                <button formaction="{{ route('web.label.print') }}" 
                                        formtarget="_blank"
                                        class="btn btn-info btn-sm ms-2">
                                    <i class="fa fa-print"></i> Print
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Lot No.</th>
                                            <th>Length</th>
                                            <th>Weight</th>
                                            <th>Date</th>
                                            <th>Shift</th>
                                            <th>Mesin No</th>
                                            <th>Pitch</th>
                                            <th>Direction</th>
                                            <th>Operator</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($labels as $index => $label)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $label->lot_number }}</td>
                                                <td>{{ $label->length }} M</td>
                                                <td>{{ $label->weight }} KG</td>
                                                <td>{{ $label->shift_date }}</td>
                                                <td>{{ $label->shift }}</td>
                                                <td>{{ $label->machine_number }}</td>
                                                <td>{{ $label->pitch }}</td>
                                                <td>{{ $label->direction }}</td>
                                                <td>{{ $label->operator->name }}</td>
                                                <td class="text-center" style="white-space: nowrap;">
                                                    <a href="{{ route('web.label.edit', $label->id) }}" 
                                                       class="btn btn-xs btn-warning" title="Edit">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <button title="Hapus" 
                                                            data-action="delete" 
                                                            data-href="{{ route('web.label.delete', $label->id) }}" 
                                                            class="btn btn-danger btn-xs">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="11" class="text-center">Tidak ada label</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 text-center">
                            {{ $labels->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{asset('css/bootstrap-datepicker3.min.css')}}">
<link rel="stylesheet" href="{{asset('bundle/bootstrap-datetimepicker/css/bdt.css')}}">
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script>
    $('button[data-action=delete]').click(function() {
        var url = $(this).data('href');
        Swal.fire({
            title: 'Anda yakin akan menghapus label ?',
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
<script src="{{asset('js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('bundle/moment/min/moment.min.js')}}"></script>
<script src="{{asset('bundle/bootstrap-datetimepicker/js/bdt.js')}}"></script>
<script>
    function parseMonth(m) {
        if (m < 10) {
            return "0"+m;
        }

        return m;
    }
    $('[data-type=date]').datepicker({
        timePicker: true,
        format: 'yyyy-mm-dd',
        autoclose: true,
        zIndexOffset: 1500
    });

    $('[data-type=datetime]').datetimepicker({
        format: 'YYYY-MM-DD',
    });

    function resetForm() {
        //$("input#weight").val(null);
        //$("input#length").val(null);
        $("select#date").val(null);
        $("select#shift").val(null);
        $("select#machine_no").val(null);
        // $("input[name=pitch]").val(null);
        $("input#remark").val(null);
        $("input#bobin_no").val(null);
    }

    function initForm() {
        $("form#form_print").on('submit', function(e) {
            e.preventDefault();
            var fail = false;
            if($("input#length").val() == "" || $("input#length").val() == null) {
                $("#label_length").addClass("has-error");
                fail = true;
            } else {
                $("#label_length").removeClass("has-error");
            }

            if($("select#date").val() == "" || $("select#date").val() == null) {
                $("#label_date").addClass("has-error");
                fail = true;
            } else {
                $("#label_date").removeClass("has-error");
            }

            if($("select#shift").val() == "" || $("select#shift").val() == null) {
                $("#label_shift").addClass("has-error");
                fail = true;
            } else {
                $("#label_shift").removeClass("has-error");
            }

            if($("select#machine_no").val() == "" || $("select#machine_no").val() == null) {
                $("#label_machine_no").addClass("has-error");
                fail = true;
            } else {
                $("#label_machine_no").removeClass("has-error");
            }

            // if($("input[name=pitch]").val() == "" || $("input[name=pitch]").val() == null) {
            //     $("#label_pitch").addClass("has-error");
            //     fail = true;
            // } else {
            //     $("#label_pitch").removeClass("has-error");
            // }

            if($("input#remark").val() == "" || $("input#remark").val() == null) {
                $("#label_remark").addClass("has-error");
                fail = true;
            } else {
                $("#label_remark").removeClass("has-error");
            }

            if($("input#bobin_no").val() == "" || $("input#bobin_no").val() == null) {
                $("#label_bobin_no").addClass("has-error");
                fail = true;
            } else {
                $("#label_bobin_no").removeClass("has-error");
            }

            if(!fail) {            
                $(this).unbind("submit");
                $(this).submit();
                resetForm();
                initForm();
            }
        });
    }

    initForm();

    
    var now = new Date();
    var now_month = now.getMonth();

    $('select#date').append('<option value="'+ now.getFullYear() +'-'+ parseMonth(now_month + 1) +'-'+ now.getDate() +'">'+ now.getFullYear() +'-'+ parseMonth(now_month + 1) +'-'+ now.getDate() +'</option>');

    var yesterday = new Date();
    yesterday.setDate(yesterday.getDate() - 1);
    var month = yesterday.getMonth();

    $('select#date').append('<option value="'+ yesterday.getFullYear() +'-'+ parseMonth(month + 1) +'-'+ yesterday.getDate() +'">'+ yesterday.getFullYear() +'-'+ parseMonth(month + 1) +'-'+ yesterday.getDate() +'</option>');

    //$('input#length').on('change', function() {
    //    var weight = $(this).val() * 0.0174;
    //    weight = Math.round(weight)
    //    $('input#weight').val(weight);
    //});
</script>
@endpush