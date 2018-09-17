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
                  <h3 class="card-title">Form Upload Gambar Berita</h3>

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
                              <form action="{{ url('admin/pupload_news/'.$data->id) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                                {{csrf_field()}}
                              <input name="_method" type="hidden" value="PATCH">
                              <div class="form-group">
                                <div class="col-sm-4">
                                  @if($data->news_image!='' || $data->news_image!= NULL)
                                      <img src="{{ url('/storage/news/'.$data->news_image) }}">
                                  @endif
                                </div>
                              </div>
                              <div class="form-group">
                                  <label for="page_image" class="col-sm-2 control-label">Gambar</label>
                                  <div class="col-sm-10">
                                      <input type="file" class="form-control" name="news_image">
                                      <input type="hidden" class="form-control" name="news_image_old" value="{{ $data->news_image }}">
                                      @if ($errors->has('news_image'))
                                        <span class="help-block text-danger">{{ $errors->first('news_image') }}</span>
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
        @stop