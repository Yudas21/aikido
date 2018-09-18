        @extends('admin.layout')
        @section('content')
        <!-- Content Wrapper. Contains page content -->
          <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
              <div class="container-fluid">
                <div class="row mb-2">
                  
                  <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                      <li class="breadcrumb-item"><a href="#">Website Management</a></li>
                      <li class="breadcrumb-item active">Jadwal</li>
                    </ol>
                  </div>
                </div>
              </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

              <!-- Default box -->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Form Update Jadwal</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                      <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                      <i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="card-body">
                     <div class="row">
                        <div class="col-sm-12">  
                              <form action="{{ url('admin/pupdate_schedule/'.$data->id) }}" method="post" class="form-horizontal">
                                {{csrf_field()}}
                                <input name="_method" type="hidden" value="PATCH">
                              <div class="form-group">
                                  <label for="from_day" class="col-sm-2 control-label">Hari</label>
                                  <div class="col-sm-3">
                                      <select name="from_day" class="form-control select2">
                                        <option value="">Pilih</option>
                                        <option value="Senin" <?php echo $data->from_day == 'Senin' ? 'selected' : '';?>>Senin</option>
                                        <option value="Selasa" <?php echo $data->from_day == 'Selasa' ? 'selected' : '';?>>Selasa</option>
                                        <option value="Rabu" <?php echo $data->from_day == 'Rabu' ? 'selected' : '';?>>Rabu</option>
                                        <option value="Kamis" <?php echo $data->from_day == 'Kamis' ? 'selected' : '';?>>Kamis</option>
                                        <option value="Jumat" <?php echo $data->from_day == 'Jumat' ? 'selected' : '';?>>Jumat</option>
                                        <option value="Sabtu" <?php echo $data->from_day == 'Sabtu' ? 'selected' : '';?>>Sabtu</option>
                                        <option value="Minggu" <?php echo $data->from_day == 'Minggu' ? 'selected' : '';?>>Minggu</option>
                                      </select>
                                      @if ($errors->has('from_day'))
                                        <span class="help-block text-danger">{{ $errors->first('from_day') }}</span>
                                      @endif
                                   </div>
                              </div>
                              <div class="form-group bootstrap-timepicker">
                                  <label for="from_time" class="col-sm-3">Dari</label>
                                  <div class="col-sm-3">
                                      <input type="text" name="from_time" value="{{ $data->from_time }}" class="form-control timepicker">
                                      @if ($errors->has('from_time'))
                                        <span class="help-block text-danger">{{ $errors->first('from_time') }}</span>
                                      @endif
                                   </div>
                                   <label for="to_time" class="col-sm-3">Sampai Dari</label>
                                   <div class="col-sm-3">
                                      <input type="text" name="to_time" value="{{ $data->to_time }}" class="form-control timepicker">
                                      @if ($errors->has('to_time'))
                                        <span class="help-block text-danger">{{ $errors->first('to_time') }}</span>
                                      @endif
                                   </div>
                              </div>
                             
                              <div class="row xs-pt-15">
                                  <div class="col-xs-6">
                                    
                                  </div>
                                  <div class="col-xs-6">
                                    <p class="text-right">
                                      <button type="submit" class="btn btn-space btn-primary">Simpan</button>
                                      <a href="{{ url('admin/schedule') }}" class="btn btn-space btn-success">Kembali</a>
                                    </p>
                                  </div>
                                </div>
                            </form>
                        </div>
                     </div>     
                </div>
              </div>
            </section>
          </div>
          @section('myjsfile')
            <script type="text/javascript">
              $(function () {
                  $('.select2').select2();
                  $('.timepicker').timepicker({
                    showMeridian: false,
                    minuteStep: 5
                  });
              });
            </script>
          @endsection
        @stop