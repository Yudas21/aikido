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
                      <li class="breadcrumb-item"><a href="#">User Management</a></li>
                      <li class="breadcrumb-item active">Menu</li>
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
                  <h3 class="card-title">Form Update Menu</h3>

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
                              <form action="{{ url('admin/pupdate_menu/'.$menu->id) }}" method="post" class="form-horizontal">
                                {{csrf_field()}}
                              <input name="_method" type="hidden" value="PATCH">
                              <div class="form-group">
                                  <label for="name" class="col-sm-2 control-label">Nama Menu</label>
                                  <div class="col-sm-10">
                                      <input type="text" class="form-control" name="name" value="{{ $menu->name }}">
                                      @if ($errors->has('name'))
                                        <span class="help-block text-danger">{{ $errors->first('name') }}</span>
                                      @endif
                                   </div>
                              </div>
                              <div class="form-group">
                                  <label for="icon" class="col-sm-2 control-label">Icon</label>
                                  <div class="col-sm-10">
                                    <input type="text" class="form-control" name="icon" value="{{ $menu->icon }}">
                                    @if ($errors->has('icon'))
                                        <span class="help-block">{{ $errors->first('icon') }}</span>
                                    @endif
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label for="url" class="col-sm-2 control-label">Url</label>
                                  <div class="col-sm-10">
                                    <input type="text" class="form-control" name="url" value="{{ $menu->url }}">
                                    @if ($errors->has('url'))
                                       <span class="help-block">{{ $errors->first('url') }}</span>
                                    @endif
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label for="name" class="col-sm-2 control-label">Parent</label>
                                  <div class="col-sm-4">
                                     <select class="form-control" name="parent">
                                        <option value="0">as Parent</option>
                                        @foreach ($data as $d_menu) 
                                          <option value="{{ $d_menu->id }}" <?php echo $d_menu->id == $menu->parent ? 'selected' : '' ;?>>{{ $d_menu->name }}</option>
                                        @endforeach
                                     </select>
                                  </div>
                              </div>
                              <div class="row xs-pt-15">
                                  <div class="col-xs-6">
                                    
                                  </div>
                                  <div class="col-xs-6">
                                    <p class="text-right">
                                      <button type="submit" class="btn btn-space btn-primary">Simpan</button>
                                      <a href="{{ url('admin/menu') }}" class="btn btn-space btn-success">Kembali</a>
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