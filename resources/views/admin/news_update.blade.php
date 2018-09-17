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
                      <li class="breadcrumb-item active">Berita</li>
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
                  <h3 class="card-title">Form Update Berita</h3>

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
                              <form action="{{ url('admin/pupdate_news/'.$data->id) }}" method="post" class="form-horizontal">
                                {{csrf_field()}}
                                <input type="hidden" name="_method" value="PATCH">
                              <div class="form-group">
                                  <label for="news_title" class="col-sm-2 control-label">Judul</label>
                                  <div class="col-sm-10">
                                      <input type="text" class="form-control" name="news_title" value="{{ $data->news_title }}">
                                      @if ($errors->has('news_title'))
                                        <span class="help-block text-danger">{{ $errors->first('news_title') }}</span>
                                      @endif
                                   </div>
                              </div>
                              <div class="form-group">
                                  <label for="news_content" class="col-sm-2 control-label">Konten</label>
                                  <div class="col-sm-10">
                                      <textarea class="form-control textarea" name="news_content">{{ $data->news_content }}</textarea>
                                      @if ($errors->has('news_content'))
                                        <span class="help-block text-danger">{{ $errors->first('news_content') }}</span>
                                      @endif
                                   </div>
                              </div>
                              <div class="form-group">
                                  <label for="news_publish" class="col-sm-2 control-label">Publish</label>
                                  <div class="col-sm-4">
                                      <select name="news_publish" class="form-control select2">
                                        <option value="">Pilih</option>
                                        <option value="1" <?php echo $data->news_publish == 1 ? 'selected' : '';?>>Ya</option>
                                        <option value="0" <?php echo $data->news_publish == 0 ? 'selected' : '';?>>Tidak</option>
                                      </select>
                                      @if ($errors->has('news_publish'))
                                        <span class="help-block text-danger">{{ $errors->first('news_publish') }}</span>
                                      @endif
                                   </div>
                              </div>
                             
                              <div class="row xs-pt-15">
                                  <div class="col-xs-6">
                                    
                                  </div>
                                  <div class="col-xs-6">
                                    <p class="text-right">
                                      <button type="submit" class="btn btn-space btn-primary">Simpan</button>
                                      <a href="{{ url('admin/news') }}" class="btn btn-space btn-success">Kembali</a>
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
                  $('.textarea').wysihtml5({
                    toolbar: { fa: true }
                  });
              });
            </script>
          @endsection
        @stop