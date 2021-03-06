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
                  <!-- <h3 class="card-simbol_cabang">Menu</h3> -->
                  <h3>Foto</h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" simbol_cabang="Collapse">
                      <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-widget="remove" data-toggle="tooltip" simbol_cabang="Remove">
                      <i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="card-body">
                          <div class="col-md-12" style="margin-bottom: 7px;">
                              <a href="{{ url('admin/add_image_gallery') }}" class="btn btn-success"><i class="fa fa-plus"></i> Foto Baru</a>
                          </div>
                          @if($message = Session::get('message'))
                             <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <i class="icon fa fa-check"></i> {{ $message }}
                              </div> 
                          @endif
                          <!-- Item Listing -->
                          <table class="table table-striped table-hover table-bordered" id="foto_table">
                            <thead>
                              <tr>
                                <th style="text-align: center;width: 50px;">No.</th>
                                <th style="text-align: center;">Judul</th>
                                <th style="text-align: center;">Foto</th>
                                <th style="text-align: center;width: 50px;">Publish</th>
                                <th style="text-align: center;" width="100px">Kelola</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php $no = 1; ?>
                              @foreach($data as $value)
                                <?php 
                                      $publish = $value->publish == 1 ? 'Ya' : 'Tidak'; 
                                ?>
                               <tr>
                                  <td>{{ $no }}.</td>
                                  <td>{{ $value->image_title }}</td>
                                  <td><a href="#" data-toggle="modal" data-target="#look-image{{ $no }}">{{ $value->image_path }}</a></td>
                                  <td style="text-align: center;">{{ $publish }}</td>
                                  <td style="text-align: center;"> 
                                      <a href="{{ url('admin/update_image_gallery/'.$value->id) }}" data-balloon="Update Foto" data-balloon-pos="down"><i class="fa fa-edit"></i></a> &nbsp;
                                      <a href="#" data-balloon="Hapus Foto" data-balloon-pos="down" data-toggle="modal" data-target="#delete-image{{ $no }}"><i class="fa fa-trash"></i></a>
                                  </td>
                              </tr>
                              <div class="modal fade" id="delete-image{{ $no }}" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h4 class="modal-title">Hapus Foto</h4>
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="{{ url('admin/delete_image_gallery/'.$value->id) }}" class="form-horizontal">
                                        {{csrf_field()}}
                                        <input type="hidden" name="_method" value="DELETE">
                                        Anda Yakin akan meghapus foto ?

                                    </div>
                                    <div class="modal-footer">
                                        <div class="form-group">
                                          <div align="right">
                                              <button type="submit" class="btn btn-success">Ya</button>
                                              <button class="btn btn-default" data-dismiss="modal">Tidak</button>  
                                            </div>
                                        </div>

                                        </form>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="modal fade" id="look-image{{ $no }}" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h4 class="modal-title">Tinjau Foto</h4>
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                          @if($value->image_path!='' || $value->image_path!= NULL)
                                              <img src="{{ url('/storage/foto/'.$value->image_path) }}" class="img-fluid">
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
                              <?php $no++;?>
                              @endforeach
                            </tbody>
                          </table>
                          
                </div>
              </div>
            </section>
          </div>
          @section('myjsfile')
            <script type="text/javascript">
              $(function () {
                 $('#foto_table').DataTable();
              });
            </script>
          @endsection
        @stop