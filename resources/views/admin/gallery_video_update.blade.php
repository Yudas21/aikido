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
                      <li class="breadcrumb-item active">Galeri Video</li>
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
                  <h3 class="card-title">Form Update Video</h3>

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
                              <form action="{{ url('admin/pupdate_video_gallery/'.$data->id) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <input type="hidden" name="_method" value="PATCH">
                              <div class="form-group">
                                  <label for="video_title" class="col-sm-2 control-label">Judul</label>
                                  <div class="col-sm-10">
                                      <input type="text" class="form-control" name="video_title" value="{{ $data->video_title }}">
                                      @if ($errors->has('video_title'))
                                        <span class="help-block text-danger">{{ $errors->first('video_title') }}</span>
                                      @endif
                                   </div>
                              </div>
                              <div class="form-group">
                                  <label for="video_path" class="col-sm-2 control-label">Video</label>
                                  <div class="col-sm-4">
                                      @if($data->video_path!='' || $data->video_path!=  NULL)
                                      <a href="#" data-toggle="modal" data-target="#look-update-video">Lihat video</a>
                                      @endif
                                      <input type="file" class="form-control" name="video_path">
                                      @if ($errors->has('video_path'))
                                        <span class="help-block text-danger">{{ $errors->first('video_path') }}</span>
                                      @endif
                                   </div>
                              </div>
                              <div class="form-group">
                                  <label for="video_url" class="col-sm-2 control-label">Url</label>
                                  <div class="col-sm-10">
                                      <input type="text" class="form-control" name="video_url" value="{{ $data->video_url }}">
                                      @if ($errors->has('video_url'))
                                        <span class="help-block text-danger">{{ $errors->first('video_url') }}</span>
                                      @endif
                                   </div>
                              </div>
                              <div class="form-group">
                                  <label for="publish" class="col-sm-2 control-label">Publish</label>
                                  <div class="col-sm-4">
                                      <select name="publish" class="form-control select2">
                                        <option value="">Pilih</option>
                                        <option value="1" <?php echo $data->publish == 1? 'selected' : '';?>>Ya</option>
                                        <option value="0" <?php echo $data->publish == 0? 'selected' : '';?>>Tidak</option>
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
                                      <a href="{{ url('admin/video_gallery') }}" class="btn btn-space btn-success">Kembali</a>
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
          <div class="modal fade" id="look-update-video" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h4 class="modal-title">Tinjau Video - {{ $data->video_title }}</h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>
                      <div class="modal-body">
                          <div class="row">
                            @if($data->video_path!='' || $data->video_path!= NULL)
                              <?php 
                                    $pecah = explode('.', $data->video_path);
                                    $ekstensi = $pecah[1];
                              ?>
                              <video width="100%" controls>
                              <source src="{{ url('/storage/video/'.$data->video_path) }}" type="video/<?php echo $ekstensi;?>">
                              </video>
                            @endif
                            @if($data->video_url!='' || $data->video_url!= NULL)
                              <iframe width="100%" src="https://www.youtube.com/embed/<?php echo $data->video_url;?>"></iframe> 
                            @endif
                          </div>

                      </div>
                      <div class="modal-footer">
                          <div class="form-group">
                              <div align="right">
                                  <button class="btn btn-default" data-dismiss="modal">Tutup</button>  
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          @section('myjsfile')
            <script type="text/javascript">
                $(function () {
                    $('.select2').select2();
                });
            </script>
          @endsection
        @stop