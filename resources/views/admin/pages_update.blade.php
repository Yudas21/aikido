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
                                      <textarea class="form-control" id="froala-editor" name="page_content">{{ $data->page_content }}</textarea>
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
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js') }}"></script>
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.js') }}"></script>
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/mode/xml/xml.min.js') }}"></script>

            <script type="text/javascript" src="{{ asset('admin/plugins/froala_editor/js/froala_editor.min.js') }}" ></script>
            <script type="text/javascript" src="{{ asset('admin/plugins/froala_editor/js/plugins/align.min.js') }}"></script>
            <script type="text/javascript" src="{{ asset('admin/plugins/froala_editor/js/plugins/char_counter.min.js') }}"></script>
            <script type="text/javascript" src="{{ asset('admin/plugins/froala_editor/js/plugins/code_beautifier.min.js') }}"></script>
            <script type="text/javascript" src="{{ asset('admin/plugins/froala_editor/js/plugins/code_view.min.js') }}"></script>
            <script type="text/javascript" src="{{ asset('admin/plugins/froala_editor/js/plugins/colors.min.js') }}"></script>
            <script type="text/javascript" src="{{ asset('admin/plugins/froala_editor/js/plugins/draggable.min.js') }}"></script>
            <script type="text/javascript" src="{{ asset('admin/plugins/froala_editor/js/plugins/emoticons.min.js') }}"></script>
            <script type="text/javascript" src="{{ asset('admin/plugins/froala_editor/js/plugins/entities.min.js') }}"></script>
            <script type="text/javascript" src="{{ asset('admin/plugins/froala_editor/js/plugins/file.min.js') }}"></script>
            <script type="text/javascript" src="{{ asset('admin/plugins/froala_editor/js/plugins/font_size.min.js') }}"></script>
            <script type="text/javascript" src="{{ asset('admin/plugins/froala_editor/js/plugins/font_family.min.js') }}"></script>
            <script type="text/javascript" src="{{ asset('admin/plugins/froala_editor/js/plugins/fullscreen.min.js') }}"></script>
            <script type="text/javascript" src="{{ asset('admin/plugins/froala_editor/js/plugins/image.min.js') }}"></script>
            <script type="text/javascript" src="{{ asset('admin/plugins/froala_editor/js/plugins/image_manager.min.js') }}"></script>
            <script type="text/javascript" src="{{ asset('admin/plugins/froala_editor/js/plugins/line_breaker.min.js') }}"></script>
            <script type="text/javascript" src="{{ asset('admin/plugins/froala_editor/js/plugins/inline_style.min.js') }}"></script>
            <script type="text/javascript" src="{{ asset('admin/plugins/froala_editor/js/plugins/link.min.js') }}"></script>
            <script type="text/javascript" src="{{ asset('admin/plugins/froala_editor/js/plugins/lists.min.js') }}"></script>
            <script type="text/javascript" src="{{ asset('admin/plugins/froala_editor/js/plugins/paragraph_format.min.js') }}"></script>
            <script type="text/javascript" src="{{ asset('admin/plugins/froala_editor/js/plugins/paragraph_style.min.js') }}"></script>
            <script type="text/javascript" src="{{ asset('admin/plugins/froala_editor/js/plugins/quick_insert.min.js') }}"></script>
            <script type="text/javascript" src="{{ asset('admin/plugins/froala_editor/js/plugins/quote.min.js') }}"></script>
            <script type="text/javascript" src="{{ asset('admin/plugins/froala_editor/js/plugins/table.min.js') }}"></script>
            <script type="text/javascript" src="{{ asset('admin/plugins/froala_editor/js/plugins/save.min.js') }}"></script>
            <script type="text/javascript" src="{{ asset('admin/plugins/froala_editor/js/plugins/url.min.js') }}"></script>
            <script type="text/javascript" src="{{ asset('admin/plugins/froala_editor/js/plugins/video.min.js') }}"></script>
            <script type="text/javascript" src="{{ asset('admin/plugins/froala_editor/js/plugins/help.min.js') }}"></script>
            <script type="text/javascript" src="{{ asset('admin/plugins/froala_editor/js/plugins/print.min.js') }}"></script>
            <script type="text/javascript" src="{{ asset('admin/plugins/froala_editor/js/third_party/spell_checker.min.js') }}"></script>
            <script type="text/javascript" src="{{ asset('admin/plugins/froala_editor/js/plugins/special_characters.min.js') }}"></script>
            <script type="text/javascript" src="{{ asset('admin/plugins/froala_editor/js/plugins/word_paste.min.js') }}"></script>
            <script type="text/javascript">
              $(function () {
                  $('.select2').select2();
                  $('textarea#froala-editor').froalaEditor();
              });
            </script>
          @endsection
        @stop