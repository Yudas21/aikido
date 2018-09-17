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
                  <h3 class="card-title">Form Tambah User</h3>

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
                              <form action="{{ url('admin/padd_users') }}" method="post" class="form-horizontal">
                              {{csrf_field()}}
                              <div class="form-group">
                                  <label for="name" class="col-sm-2 control-label">Nama</label>
                                  <div class="col-sm-10">
                                      <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                      @if ($errors->has('name'))
                                        <span class="help-block text-danger">{{ $errors->first('name') }}</span>
                                      @endif
                                   </div>
                              </div>
                              <div class="form-group">
                                  <label for="email" class="col-sm-2 control-label">Email</label>
                                  <div class="col-sm-10">
                                      <input type="text" class="form-control" name="email" value="{{ old('email') }}">
                                      @if ($errors->has('email'))
                                        <span class="help-block text-danger">{{ $errors->first('email') }}</span>
                                      @endif
                                   </div>
                              </div>
                              <div class="form-group">
                                  <label for="password" class="col-sm-2 control-label">Password</label>
                                  <div class="col-sm-10">
                                      <input type="password" class="form-control" name="password" value="{{ old('password') }}">
                                      @if ($errors->has('password'))
                                        <span class="help-block text-danger">{{ $errors->first('password') }}</span>
                                      @endif
                                   </div>
                              </div>
                              <div class="form-group">
                                  <label for="password_confirm" class="col-sm-2 control-label">Konfirmasi Password</label>
                                  <div class="col-sm-10">
                                      <input type="password" class="form-control" name="password_confirm" value="{{ old('password_confirm') }}">
                                      @if ($errors->has('password_confirm'))
                                        <span class="help-block text-danger">{{ $errors->first('password_confirm') }}</span>
                                      @endif
                                   </div>
                              </div>
                              <div class="form-group">
                                  <label for="level" class="col-sm-2 control-label">Level</label>
                                  <div class="col-sm-4">
                                     <select class="form-control" name="level">
                                        <option value="">Pilih</option>
                                        @foreach ($level as $d_level) 
                                          <option value="{{ $d_level->id }}">{{ $d_level->name }}</option>
                                        @endforeach
                                     </select>
                                     @if ($errors->has('level'))
                                        <span class="help-block text-danger">{{ $errors->first('level') }}</span>
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