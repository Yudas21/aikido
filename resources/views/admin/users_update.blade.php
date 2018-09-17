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
                      <li class="breadcrumb-item active">Users</li>
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
                  <h3 class="card-title">Form Update User</h3>

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
                              <form action="{{ url('admin/pupdate_users/'.$data->id) }}" method="post" class="form-horizontal">
                              {{csrf_field()}}
                              <input type="hidden" name="_method" value="PATCH">
                              <div class="form-group">
                                  <label for="name" class="col-sm-2 control-label">Nama</label>
                                  <div class="col-sm-10">
                                      <input type="text" class="form-control" name="name" value="{{ $data->name }}">
                                      @if ($errors->has('name'))
                                        <span class="help-block text-danger">{{ $errors->first('name') }}</span>
                                      @endif
                                   </div>
                              </div>
                              <div class="form-group">
                                  <label for="email" class="col-sm-2 control-label">Email</label>
                                  <div class="col-sm-10">
                                      <input type="text" class="form-control" name="email" value="{{ $data->email }}">
                                      <input type="hidden" class="form-control" name="email_old" value="{{ $data->email }}">
                                      @if ($errors->has('email'))
                                        <span class="help-block text-danger">{{ $errors->first('email') }}</span>
                                      @endif
                                   </div>
                              </div>
                              <div class="form-group">
                                  <label for="level" class="col-sm-2 control-label">Level</label>
                                  <div class="col-sm-4">
                                     <select class="form-control" name="level">
                                        <option value="">Pilih</option>
                                        @foreach ($level as $d_level) 
                                          <option value="{{ $d_level->id }}" <?php echo $d_level->id == $data->level ? 'selected' : '';?>>{{ $d_level->name }}</option>
                                        @endforeach
                                     </select>
                                     @if ($errors->has('level'))
                                        <span class="help-block text-danger">{{ $errors->first('level') }}</span>
                                      @endif
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label for="status" class="col-sm-2 control-label">Status</label>
                                  <div class="col-sm-4">
                                     <select class="form-control" name="status">
                                        <option value="">Pilih</option>
                                        <option value="1" <?php echo $data->status == 1 ? 'selected' : '';?>>Aktif</option>
                                        <option value="0" <?php echo $data->status == 0 ? 'selected' : '';?>>Tidak Aktif</option>
                                     </select>
                                     @if ($errors->has('status'))
                                        <span class="help-block text-danger">{{ $errors->first('status') }}</span>
                                      @endif
                                  </div>
                              </div>
                              <div class="row xs-pt-15">
                                  <div class="col-xs-6">
                                    
                                  </div>
                                  <div class="col-xs-6">
                                    <p class="text-right">
                                      <button type="submit" class="btn btn-space btn-primary">Simpan</button>
                                      <a href="{{ url('admin/users') }}" class="btn btn-space btn-success">Kembali</a>
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