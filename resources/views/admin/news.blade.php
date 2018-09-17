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
                  <!-- <h3 class="card-simbol_cabang">Menu</h3> -->
                  <h3>Berita</h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" simbol_cabang="Collapse">
                      <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-widget="remove" data-toggle="tooltip" simbol_cabang="Remove">
                      <i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="card-body">
                          <div class="col-md-12" style="margin-bottom: 7px;">
                              <a href="{{ url('admin/add_news') }}" class="btn btn-success"><i class="fa fa-plus"></i> Berita Baru</a>
                          </div>
                          @if($message = Session::get('message'))
                             <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <i class="icon fa fa-check"></i> {{ $message }}
                              </div> 
                          @endif
                          <!-- Item Listing -->
                          <table class="table table-striped table-hover table-bordered" id="news_table">
                            <thead>
                              <tr>
                                <th style="text-align: center;width: 50px;">No.</th>
                                <th style="text-align: center;">Judul</th>
                                <th style="text-align: center;">Author</th>
                                <th style="text-align: center;width: 50px;">Publish</th>
                                <th style="text-align: center;" width="100px">Kelola</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php $no = 1; ?>
                              @foreach($data as $value)
                                <?php 
                                      $publish = $value->news_publish == 1 ? 'Ya' : 'Tidak'; 
                                ?>
                               <tr>
                                  <td>{{ $no }}.</td>
                                  <td>{{ $value->news_title }}</td>
                                  <td>{{ $value->author }}</td>
                                  <td style="text-align: center;">{{ $publish }}</td>
                                  <td style="text-align: center;"> 
                                      <a href="#" data-balloon="Tinjau Berita" data-balloon-pos="down" data-toggle="modal" data-target="#look-news{{ $no }}"><i class="fa fa-eye"></i></a> &nbsp;
                                      <a href="{{ url('admin/upload_news/'.$value->id) }}" data-balloon="Upload Gambar Berita" data-balloon-pos="down"><i class="fa fa-picture-o"></i></a> &nbsp;
                                      <a href="{{ url('admin/update_news/'.$value->id) }}" data-balloon="Update Berita" data-balloon-pos="down"><i class="fa fa-edit"></i></a> &nbsp;
                                      <a href="#" data-balloon="Hapus Berita" data-balloon-pos="down" data-toggle="modal" data-target="#delete-news{{ $no }}"><i class="fa fa-trash"></i></a>
                                  </td>
                              </tr>
                              <div class="modal fade" id="delete-news{{ $no }}" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h4 class="modal-title">Hapus Berita</h4>
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="{{ url('admin/delete_news/'.$value->id) }}" class="form-horizontal">
                                        {{csrf_field()}}
                                        <input type="hidden" name="_method" value="DELETE">
                                        Anda Yakin akan meghapus data berita ?

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
                              <div class="modal fade" id="look-news{{ $no }}" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h4 class="modal-title">Tinjau Berita - {{ $value->news_title }}</h4>
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                          @if($value->news_image!='' || $value->news_image!= NULL)
                                              <img src="{{ url('/storage/news/'.$value->news_image) }}">
                                          @endif
                                          <?php echo $value->news_content;?>
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
                 $('#news_table').DataTable();
              });
            </script>
          @endsection
        @stop