@extends('admin.layouts')
@section('title')
    Data Surat Jalan
@endsection

@section('modal')
    <!-- Modal Add Surat Jalan -->
    <div class="modal fade" id="addSuratJalanModal" tabindex="-1" aria-labelledby="addSuratJalanModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <form id="form_add_surat_jalan" method="POST" action="{{ route('surat-jalan.store') }}"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="modal-header">
                        <h5 class="modal-title" id="addSuratJalanModalLabel">Tambah Surat Jalan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Penerima</label>
                            <input type="text" id="penerima" name="penerima" class="form-control" required>
                        </div>

                        <div class="form-row">
                            <div class="form-group col">
                                <label>Alamat Penerima</label>
                                <input type="text" id="alamat_penerima" name="alamat_penerima" class="form-control"
                                    required>
                            </div>
                            <div class="form-group col">
                                <label>Kabupaten, Provinsi Penerima</label>
                                <input type="text" id="kab_prov_penerima" name="kab_prov_penerima" class="form-control"
                                    required>
                            </div>
                            <div class="form-group col">
                                <label>PIC Penerima</label>
                                <input type="text" id="pic_penerima" name="pic_penerima" class="form-control" required>
                            </div>
                        </div>


                        <div class="form-group">
                            <label>No. Referensi</label>
                            <input type="text" id="no_referensi" name="no_referensi" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Tanggal</label>
                            <input type="date" id="tanggal" name="tanggal" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Pesan</label>
                            <input type="text" id="pesan" name="pesan" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Disiapkan Oleh</label>
                            <input type="text" id="disiapkan" name="disiapkan" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Dikirim Oleh</label>
                            <input type="text" id="dikirim" name="dikirim" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Diterima Oleh</label>
                            <input type="text" id="diterima" name="diterima" class="form-control" required>
                        </div>
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="barang">Barang</label>
                                <b class="text-danger">* Wajib Diisi</b>
                                <select class="form-control dropdownDataBarang" id="barang_1" name="barang_1" required>
                                    <option selected>Pilih Barang</option>
                                </select>
                            </div>
                            <div class="form-group col">
                                <label for="jml_brg_1">Jumlah</label>
                                {{-- <button type="button" id="addBarangForm" class="btn btn-warning float-right"><i
                                        class="fas fa-plus"></i></button> --}}
                                <input type="number" class="form-control" id="jml_brg_1" name="jml_brg_1" required>
                            </div>
                            <div class="form-group col">
                                <label for="jml_brg_1">Lama Sewa</label>
                                <button type="button" id="addBarangForm" class="btn btn-warning float-right"><i
                                        class="fas fa-plus"></i></button>
                                <input type="text" class="form-control" id="lama_sewa_1" name="lama_sewa_1" required>
                            </div>

                        </div>
                        <input type="hidden" name="jml_barang" id="jml_barang_input">
                        <div class="input-barang-container"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Detail -->
    <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Data Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p><strong>Disiapkan:</strong> <text id="disiapkan_detail"></text></p>
                    <p><strong>Dikirim:</strong> <text id="dikirim_detail"></text></p>
                    <p><strong>Diterima:</strong> <text id="diterima_detail"></text></p>
                    <p><strong>Pesan:</strong> <text id="pesan_detail"></text></p>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Produk</th>
                                <th>Deskripsi</th>
                                <th>Kuantitas</th>
                            </tr>
                        </thead>
                        <tbody id="data-barang">

                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit Surat Jalan -->
    <div class="modal fade" id="editBarangModal" tabindex="-1" aria-labelledby="editBarangModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editBarangModalLabel">Edit Surat Jalan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h1>Coming Soon After Fix No Revision</h1>
                </div>
 
            </div>
        </div>
    </div>
@endsection

@section('content')
    <section class="section">
        <div class="section-header ">
            <h1>Surat Jalan </h1>
        </div>
        <div class="card card-danger ">
            <div class="card-header">
                <a href="#addBarang" data-toggle="modal" data-target="#addSuratJalanModal"
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
                                <th>Penerima</th>
                                <th>Alamat Penerima</th>
                                <th>No. Referensi</th>
                                <th>Tanggal</th>
                                <th>Detail</th>
                                <th>Cetak Surat Jalan</th>
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
            var idInputBarang = 2
            var dataBarang = []


            $.ajax({
                url: '{{ route('get.barang') }}',
                method: 'GET',
                async: true,
                error: function(xhr) {
                    console.log(xhr.responseText)
                },
                success: function(data) {
                    dataBarang = data.data
                    console.log(dataBarang)

                    $.each(dataBarang, function(index, value) {
                        $('.dropdownDataBarang').append(`
                        <option value=${value.id}>${value.nama_mesin}</option>
                        `)
                    })
                }
            });

            $('#detailModal').on('show.bs.modal', function(e) {
                const button = $(e.relatedTarget);
                console.log(button.data('disiapkan'))

                $('#disiapkan_detail').text(button.data('disiapkan'))
                $('#dikirim_detail').text(button.data('dikirim'))
                $('#diterima_detail').text(button.data('diterima'))
                $('#pesan_detail').text(button.data('pesan'))

                $.ajax({
                    url: 'barang-by-id-surat/' + button.data('idSurat'),
                    method: 'GET',
                    async: true,
                    error: function(xhr) {
                        console.log(xhr.responseText)
                    },
                    success: function(data) {
                        console.log(data.data)

                        $.each(data.data, function(index, value) {
                            $('#data-barang').append(`
<tr>
<td>${value.barang.nama_mesin}</td>
<td>${value.barang.spesifikasi_mesin}</td>
<td>${value.jumlah_barang}</td>
</tr>
`)

                            // $("#myModal").modal("show"); 
                        })
                    }
                });
            })

            $('#addBarangForm').click(function() {

                $('.input-barang-container').append(`
                <div class="form-row">
                <div class="form-group col">
                    <label for="barang">Barang</label>
                    <select class="form-control dropdownDataBarang" id="barang_${idInputBarang}" name="barang_${idInputBarang}">
                        
                    </select>
                </div>
                <div class="form-group col">
                    <label for="jml_brg_1">Jumlah</label>
                    
                    <input type="number" class="form-control" id="jml_brg_${idInputBarang}" name="jml_brg_${idInputBarang}" required>
                </div>
                <div class="form-group col">
                    <label for="jml_brg_1">Lama Sewa</label>
                    <button class="removeBarangForm btn btn-danger float-right" type="button"><i class="fas fa-minus"></i></button>
                    <input type="text" class="form-control" id="lama_sewa_${idInputBarang}" name="lama_sewa_${idInputBarang}" required>
                </div>
              
            </div>


                `);

                var newDropdown = $(`#barang_${idInputBarang}`);
                $.each(dataBarang, function(index, value) {
                    newDropdown.append(`
                        <option value=${value.id}>${value.nama_mesin}</option>
                        `)
                })

                idInputBarang++;

            });

            // Function to remove a row
            $(".modal-body").on("click", ".removeBarangForm", function() {
                $(this).closest(".form-row").remove();
                idInputBarang -= 1
                console.log(idInputBarang)
            });

            const dataColumns = [{
                    data: 'id'
                },
                {
                    data: 'penerima'
                },
                {
                    data: 'alamat_penerima'
                },
                {
                    data: 'no_referensi'
                },
                {
                    data: 'tanggal'
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
                urlAjax: "{{ route('get.surat-jalan') }}",
                columns: dataColumns,
                defColumn: [{
                        targets: [2],
                        data: 'alamat_penerima',
                        render: function(data, type, full, meta) {
                            return `${data}, ${full.kab_prov_penerima}, Up: ${full.pic_penerima}`
                        },
                    },
                    {
                        targets: [5],
                        data: 'id',
                        render: function(data, type, full, meta) {
                            return `<a href="#detailData" data-toggle="modal" data-target="#detailModal" data-id-surat="${data}" data-disiapkan="${full.disiapkan}" data-dikirim="${full.dikirim}" data-diterima="${full.diterima}" data-pesan="${full.pesan}" class="btn btn-primary"><i class="fas fa-eye"></i></a>`
                        },
                    },
                    {
                        targets: [6],
                        data: 'id',
                        render: function(data, type, full, meta) {
                            return `
                            <a class="btn-lg btn-primary"
                                 href="/preview-surat-jalan/${data}"
                                 title="Preview"><i class="fas fa-print"></i></a>`
                        },
                    },
                    {
                        targets: [7],
                        data: 'id',
                        render: function(data, type, full, meta) {
                            return `<div class="row w-100">
                           <div class="col-12 d-flex justify-content-between">
                              <a class="btn btn-warning btn-sm text-white w-50 mr-1"
                                 href="#editData" data-toggle="modal" data-target="#editBarangModal" data-id=${data}
                                 data-nama_mesin="${full.nama_mesin}" data-lokasi_mesin="${full.lokasi_mesin}" data-kondisi_mesin="${full.kondisi_mesin}" data-spec_mesin="${full.spesifikasi_mesin}"
                                 title="Edit"><i class="fas fa-edit"></i></a>
                              <a class="btn btn-danger btn-sm text-white w-50 ml-1"
                                 href="#deleteData" data-delete-url="/surat-jalan/${data}" 
                                 onclick="return deleteConfirm(this,'delete')"
                                 title="Delete"><i class="fas fa-trash"></i></a>
                           </div>
                     </div>`
                        },
                    }
                ]
            }
            loadAjaxDataTables(arrayParams);
            table.on('xhr', function() {
                jsonTables = table.ajax.json();
                // console.log( jsonTables.data[350]["id"] +' row(s) were loaded' );
            });

            $('#form_add_surat_jalan').submit(function(e) {
                $('#jml_barang_input').val(idInputBarang)
                e.preventDefault();
                let form = $(this);
                var arr_params = {
                    url: form.attr('action'),
                    method: 'POST',
                    input: form.serialize(),
                    forms: form[0].reset(),
                    modal: $('#addSuratJalanModal').modal('hide'),
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
