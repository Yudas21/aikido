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
                      <li class="breadcrumb-item active">Pages</li>
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
                  <h3 class="card-title">Form Update Page</h3>

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
                              <form action="{{ url('admin/pupdate_pages/'.$data->id) }}" method="post" class="form-horizontal">
                                {{csrf_field()}}
                              <input name="_method" type="hidden" value="PATCH">
                              <div class="form-group">
                                  <label for="name" class="col-sm-2 control-label">Nama Page</label>
                                  <div class="col-sm-10">
                                      <input type="text" class="form-control" name="name" value="{{ $data->name }}">
                                      <input type="hidden" class="form-control" name="name_old" value="{{ $data->name }}">
                                      @if ($errors->has('name'))
                                        <span class="help-block text-danger">{{ $errors->first('name') }}</span>
                                      @endif
                                   </div>
                              </div>
                              <div class="form-group">
                                  <label for="page_content" class="col-sm-2 control-label">Konten Page</label>
                                  <div class="col-sm-10">
                                      <textarea class="form-control textarea" name="page_content">{{ $data->page_content }}</textarea>
                                      @if ($errors->has('page_content'))
                                        <span class="help-block text-danger">{{ $errors->first('page_content') }}</span>
                                      @endif
                                   </div>
                              </div>
                             
                              <div class="row xs-pt-15">
                                  <div class="col-xs-6">
                                    
                                  </div>
                                  <div class="col-xs-6">
                                    <p class="text-right">
                                      <button type="submit" class="btn btn-space btn-primary">Simpan</button>
                                      <a href="{{ url('admin/pages') }}" class="btn btn-space btn-success">Kembali</a>
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
                  $('.textarea').wysihtml5({
                    toolbar: { fa: true }
                  });
              });
            </script>
          @endsection
        @stop