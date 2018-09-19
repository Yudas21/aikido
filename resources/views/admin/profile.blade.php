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
                      <li class="breadcrumb-item active">Profil</li>
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
                  <!-- <h3 class="card-title">Profile</h3> -->
                  <h3>Profil</h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                      <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                      <i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="card-body">
                    <div class="row">
                      <div class="col-md-12">
                        @if($message = Session::get('message'))
                             <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <i class="icon fa fa-check"></i> {{ $message }}
                              </div> 
                          @endif
                          @if($error = Session::get('error'))
                             <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <i class="icon fa fa-warning"></i> {{ $error }}
                              </div> 
                          @endif
                        <div class="card">
                          <div class="card-header p-2">
                            <ul class="nav nav-pills">
                              <li class="nav-item"><a class="nav-link active" href="#account" data-toggle="tab">Update Profil</a></li>
                  
                              <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Ubah Password</a></li>
                            </ul>
                          </div><!-- /.card-header -->
                          
                          <div class="card-body">
                            <div class="tab-content">
                              <div class="active tab-pane" id="account">
                                <form class="form-horizontal" action="{{ url('admin/update_profile/'.$data->id) }}" method="post">
                                  {{csrf_field()}}
                                  <input name="_method" type="hidden" value="PATCH">
                                  <div class="form-group row">
                                    <label for="name" class="col-md-3 control-label">Nama</label>

                                    <div class="col-md-9">
                                      <input type="text" name="name" value="{{ $data->name }}" class="form-control" placeholder="Nama">
                                    </div>
                                  </div>
                            
                                  <div class="form-group row">
                                    <label for="email" class="col-md-3 control-label">Email</label>

                                    <div class="col-md-9">
                                      <input type="text" name="email" class="form-control" placeholder="Email" value="{{ $data->email }}">
                                      @if ($errors->has('email'))
                                          <span class="help-block text-danger">{{ $errors->first('email') }}</span>
                                      @endif
                                    </div>
                                  </div>
                                  
                                  <div class="form-group row">
                                    <div class="col-sm-offset-2 col-md-9">
                                      <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                  </div>
                                </form>
                              </div>
                              <!-- /.tab-pane -->

                              <div class="tab-pane" id="settings">
                                <form class="form-horizontal" action="{{ url('admin/update_password/'.$data->id) }}" method="post">
                                  {{csrf_field()}}
                                  <input name="_method" type="hidden" value="PATCH">
                                  <div class="form-group row">
                                    <label for="current_password" class="col-md-3 control-label">Password Sekarang</label>

                                    <div class="col-md-9">
                                      <input type="password" name="current_password" class="form-control" placeholder="Password Sekarang">
                                      @if ($errors->has('current_password'))
                                          <span class="help-block text-danger">{{ $errors->first('current_password') }}</span>
                                      @endif
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="password" class="col-md-3 control-label">Password Baru</label>

                                    <div class="col-md-9">
                                      <input type="password" name="password" class="form-control" placeholder="Password Baru">
                                      @if ($errors->has('password'))
                                          <span class="help-block text-danger">{{ $errors->first('password') }}</span>
                                      @endif
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="confirm_password" class="col-md-3 control-label">Konfirmasi Password baru</label>
                                    <div class="col-md-9">
                                      <input type="password" name="confirm_password" class="form-control" placeholder="Konfirmasi Password baru">
                                      @if ($errors->has('confirm_password'))
                                          <span class="help-block text-danger">{{ $errors->first('confirm_password') }}</span>
                                      @endif
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <div class="col-sm-offset-2 col-md-9">
                                      <button type="submit" class="btn btn-primary" id="update_password">Simpan</button>
                                    </div>
                                  </div>
                                </form>
                              </div>
                              <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                          </div><!-- /.card-body -->
                        </div>
                        <!-- /.nav-tabs-custom -->
                      </div>
                </div>
              </div>
            </section>
          </div>
          @section('myjsfile')
          
          @endsection
        @stop