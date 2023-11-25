@extends('admin.layouts')
@section('title')
    Data Barang
@endsection

@section('modal')
    <!-- Modal Add Data Barang -->
    <div class="modal fade" id="addBarangModal" tabindex="-1" aria-labelledby="addBarangModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form id="form_add_Barang" method="POST" action="{{ route('barang.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="modal-header">
                        <h5 class="modal-title" id="addBarangModalLabel">Tambah Data Barang</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama Mesin</label>
                            <input type="text" id="nama_mesin" name="nama_mesin" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Lokasi Mesin</label>
                            <input type="text" id="lokasi_mesin" name="lokasi_mesin" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Kondisi Mesin</label>
                            <input type="text" id="kondisi_mesin" name="kondisi_mesin" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Spesifikasi Mesin</label>
                            <textarea id="spesifikasi_mesin" class="form-control" name="spesifikasi_mesin"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Edit Data Barang -->
    <div class="modal fade" id="editBarangModal" tabindex="-1" aria-labelledby="editBarangModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form id="form_edit_Barang" method="POST" action="" enctype="multipart/form-data">
                    @csrf

                    <div class="modal-header">
                        <h5 class="modal-title" id="editBarangModalLabel">Edit Data Barang</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama Mesin</label>
                            <input type="text" id="nama_mesin_edit" name="nama_mesin_edit" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Lokasi Mesin</label>
                            <input type="text" id="lokasi_mesin_edit" name="lokasi_mesin_edit" class="form-control"
                                required>
                        </div>

                        <div class="form-group">
                            <label>Kondisi Mesin</label>
                            <input type="text" id="kondisi_mesin_edit" name="kondisi_mesin_edit" class="form-control"
                                required>
                        </div>

                        <div class="form-group">
                            <label>Spesifikasi Mesin</label>
                            <textarea id="spesifikasi_mesin_edit" class="form-control" name="spesifikasi_mesin_edit" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <section class="section">
        <div class="section-header ">
            <h1>Data Barang </h1>
        </div>
        <div class="card card-danger ">
            <div class="card-header">
                <a href="#addBarang" data-toggle="modal" data-target="#addBarangModal"
                    class="btn btn-icon icon-left btn-primary"><i class="fas fa-pen-alt"></i> Add Data</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="table-1">
                        <thead class="">
                            <tr>
                                <th class="text-center">
                                    #
                                </th>
                                {{-- <th>Order ID</th> --}}
                                <th>Nama Mesin</th>
                                <th>Lokasi Mesin</th>
                                <th>Kondisi Mesin</th>
                                <th>Spesifikasi Mesin</th>
                                <th>Cetak Qr Code</th>
                                {{-- <th>Cetak Surat Jalan</th> --}}
                                <th>Aksi</th>

                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer"></div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            const dataColumns = [{
                    data: 'id'
                },
                {
                    data: 'nama_mesin'
                },
                {
                    data: 'lokasi_mesin'
                },
                {
                    data: 'kondisi_mesin'
                },
                {
                    data: 'spesifikasi_mesin'
                },
                {
                    data: 'id'
                },
                {
                    data: 'id'
                },

            ];
            var arrayParams = {
                idTable: '#table-1',
                urlAjax: "{{ route('get.barang') }}",
                columns: dataColumns,
                defColumn: [
                {
                    targets: [5],
                    data: 'id',
                    render: function(data, type, full, meta) {
                        return `<a href="/qr-barang/${data}" target="_blank" class="btn btn-primary">Cetak QR</a>`
                    },
                },    
                {
                    targets: [6],
                    data: 'id',
                    render: function(data, type, full, meta) {
                        return `<div class="row w-100">
                           <div class="col-12 d-flex justify-content-between">
                              <a class="btn btn-warning btn-sm text-white w-50 mr-1"
                                 href="#editData" data-toggle="modal" data-target="#editBarangModal" data-id=${data}
                                 data-nama_mesin="${full.nama_mesin}" data-lokasi_mesin="${full.lokasi_mesin}" data-kondisi_mesin="${full.kondisi_mesin}" data-spec_mesin="${full.spesifikasi_mesin}"
                                 title="Edit"><i class="fas fa-edit"></i></a>
                              <a class="btn btn-danger btn-sm text-white w-50 ml-1"
                                 href="#deleteData" data-delete-url="/barang/${data}" 
                                 onclick="return deleteConfirm(this,'delete')"
                                 title="Delete"><i class="fas fa-trash"></i></a>
                           </div>
                     </div>`
                    },
                }]
            }
            loadAjaxDataTables(arrayParams);
            table.on('xhr', function() {
                jsonTables = table.ajax.json();
                // console.log( jsonTables.data[350]["id"] +' row(s) were loaded' );
            });

            $('#form_add_Barang').submit(function(e) {
                e.preventDefault();
                let form = $(this);
                var arr_params = {
                    url: form.attr('action'),
                    method: 'POST',
                    input: form.serialize(),
                    forms: form[0].reset(),
                    modal: $('#addBarangModal').modal('hide'),
                    reload: false
                }
                ajaxSaveDatas(arr_params)
            });

            $('#editBarangModal').on('show.bs.modal', function(e) {
                const button = $(e.relatedTarget);
                // console.log(button.data('id'));
                $('#nama_mesin_edit').val(button.data('nama_mesin'))
                $('#lokasi_mesin_edit').val(button.data('lokasi_mesin'))
                $('#kondisi_mesin_edit').val(button.data('kondisi_mesin'))
                $('#spesifikasi_mesin_edit').val(button.data('spesifikasi_mesin'))
                $('#form_edit_Barang').attr('action', '/barang/' + button.data('id'))
            });

            $('#form_edit_Barang').submit(function(e) {
                e.preventDefault();
                let form = $(this);
                var arr_params = {
                    url: form.attr('action'),
                    method: 'PUT',
                    input: form.serialize(),
                    forms: form[0].reset(),
                    modal: $('#editBarangModal').modal('hide'),
                    reload: false
                }
                ajaxSaveDatas(arr_params)
            });
        })
    </script>
@endsection
