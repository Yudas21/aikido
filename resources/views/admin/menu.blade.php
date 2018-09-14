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
                      <li class="breadcrumb-item"><a href="#">Admin</a></li>
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
                  <!-- <h3 class="card-simbol_cabang">Menu</h3> -->
                  <h3>Menu</h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" simbol_cabang="Collapse">
                      <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-widget="remove" data-toggle="tooltip" simbol_cabang="Remove">
                      <i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="card-body">
                          <div class="col-md-12" style="margin-bottom: 7px;">
                              <a href="{{ url('admin/add_menu') }}" class="btn btn-success"><i class="fa fa-plus"></i> Menu Baru</a>
                          </div>
                          @if($message = Session::get('message'))
                             <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <i class="icon fa fa-check"></i> {{ $message }}
                              </div> 
                          @endif
                          <!-- Item Listing -->
                          <table class="table table-striped table-hover table-bordered" id="menu_table">
                            <thead>
                              <tr>
                                <th style="text-align: center;width: 50px;">No.</th>
                                <th style="text-align: center;">Nama Menu</th>
                                <th style="text-align: center;">Parent</th>
                                <!-- <th style="text-align: center;">Icon</th> -->
                                <th style="text-align: center;">Url</th>
                                <th style="text-align: center;" width="80px">Kelola</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php $no = 1; ?>
                              @foreach($data as $value)
                              <?php
                                   $nama_parent = (($value->parent == 0) ? 'sebagai parent' : Indras::get_menu_name($value->parent)); 
                              ?>
                               <tr>
                                  <td>{{ $no }}.</td>
                                  <td>{{ $value->name }}</td>
                                  <td>{{ $nama_parent }}</td>
                                  <!-- <td><i class="@{{ item.icon }}"></i> @{{ item.icon }}</td> -->
                                  <td>{{ $value->url }}</td>
                                  <td style="text-align: center;">  
                                      <a href="{{ url('admin/update_menu/'.$value->id) }}" data-balloon="Update Menu" data-balloon-pos="down"><i class="fa fa-edit"></i></a>
                                      <a href="{{ url('admin/delete_menu/'.$value->id) }}" data-balloon="Hapus Menu" data-balloon-pos="down"><i class="fa fa-trash"></i></a>
                                  </td>
                              </tr>
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
                 $('#menu_table').DataTable();
              });
            </script>
          @endsection
        @stop