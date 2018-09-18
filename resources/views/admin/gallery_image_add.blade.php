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
                      <li class="breadcrumb-item active">Galeri Foto</li>
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
                  <h3 class="card-title">Form Tambah Foto</h3>

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
                              <form action="{{ url('admin/padd_image_gallery') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                                {{csrf_field()}}
                              <div class="form-group">
                                  <label for="image_title" class="col-sm-2 control-label">Judul</label>
                                  <div class="col-sm-10">
                                      <input type="text" class="form-control" name="image_title" value="{{ old('image_title') }}">
                                      @if ($errors->has('image_title'))
                                        <span class="help-block text-danger">{{ $errors->first('image_title') }}</span>
                                      @endif
                                   </div>
                              </div>
                              <div class="form-group">
                                  <label for="image_path" class="col-sm-2 control-label">Gambar</label>
                                  <div class="col-sm-4">
                                      <input type="file" class="form-control" name="image_path">
                                      @if ($errors->has('image_path'))
                                        <span class="help-block text-danger">{{ $errors->first('image_path') }}</span>
                                      @endif
                                   </div>
                              </div>
                              <div class="form-group">
                                  <label for="publish" class="col-sm-2 control-label">Publish</label>
                                  <div class="col-sm-4">
                                      <select name="publish" class="form-control select2">
                                        <option value="">Pilih</option>
                                        <option value="1">Ya</option>
                                        <option value="0">Tidak</option>
                                      </select>
                                      @if ($errors->has('publish'))
                                        <span class="help-block text-danger">{{ $errors->first('publish') }}</span>
                                      @endif
                                   </div>
                              </div>
                              <div class="row xs-pt-15">
                                  <div class="col-xs-6">
                                    
                                  </div>
                                  <div class="col-xs-6">
                                    <p class="text-right">
                                      <button type="submit" class="btn btn-space btn-primary">Simpan</button>
                                      <a href="{{ url('admin/image_gallery') }}" class="btn btn-space btn-success">Kembali</a>
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
                });
            </script>
          @endsection
        @stop