@extends('admin.layouts')
@section('title')
    Edit Surat Jalan
@endsection

@section('content')
    <section class="section">
        <div class="section-header ">
            <h1>Edit Surat Jalan </h1>
        </div>
        <div class="card card-danger ">
            <form id="formEditSJ" action="{{ route('surat-jalan.update', ['surat_jalan' => $data->surat_id]) }}"
                enctype="multipart/form-data" method="POST">
                @csrf
                {{ method_field('PUT') }}
                <div class="card-body">
                    <div class="form-group">
                        <label>Penerima</label>
                        <input type="text" id="penerima_edit" name="penerima" class="form-control" required
                            value="{{ $data->suratJalan->penerima }}">
                    </div>

                    <div class="form-row">
                        <div class="form-group col">
                            <label>Alamat Penerima</label>
                            <input type="text" id="alamat_penerima_edit" name="alamat_penerima" class="form-control"
                                required value="{{ $data->suratJalan->alamat_penerima }}">
                        </div>
                        <div class="form-group col">
                            <label>Kabupaten, Provinsi Penerima</label>
                            <input type="text" id="kab_prov_penerima_edit" name="kab_prov_penerima" class="form-control"
                                required value="{{ $data->suratJalan->kab_prov_penerima }}">
                        </div>
                        <div class="form-group col">
                            <label>PIC Penerima</label>
                            <input type="text" id="pic_penerima_edit" name="pic_penerima" class="form-control" required
                                value="{{ $data->suratJalan->pic_penerima }}">
                        </div>
                    </div>


                    <div class="form-group">
                        <label>No. Referensi</label>
                        <input type="text" id="no_referensi_edit" name="no_referensi" class="form-control" required
                            value="{{ $data->suratJalan->no_referensi }}">
                    </div>

                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="date" id="tanggal_edit" name="tanggal" class="form-control" required
                            value="{{ $data->suratJalan->tanggal }}">
                    </div>

                    <div class="form-group">
                        <label>Pesan</label>
                        <input type="text" id="pesan_edit" name="pesan" class="form-control" required
                            value="{{ $data->suratJalan->pesan }}">
                    </div>

                    <div class="form-group">
                        <label>Disiapkan Oleh</label>
                        <input type="text" id="disiapkan_edit" name="disiapkan" class="form-control" required
                            value="{{ $data->suratJalan->disiapkan }}">
                    </div>

                    <div class="form-group">
                        <label>Dikirim Oleh</label>
                        <input type="text" id="dikirim_edit" name="dikirim" class="form-control" required
                            value="{{ $data->suratJalan->dikirim }}">
                    </div>

                    <div class="form-group">
                        <label>Diterima Oleh</label>
                        <input type="text" id="diterima_edit" name="diterima" class="form-control" required
                            value="{{ $data->suratJalan->diterima }}">
                    </div>
                    <div id="input-barang">
                        @foreach ($barangInSurat as $key => $value)
                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="barang">Barang</label>
                                    <b class="text-danger">* Wajib Diisi</b>
                                    <select class="form-control dropdownDataBarang" id="barang_{{ $key + 1 }}"
                                        name="barang_{{ $key + 1 }}" required>
                                        @foreach ($barang as $brg)
                                            <option value="{{ $brg->id }}"
                                                {{ $brg->id == $value->barang->id ? 'selected' : '' }}>
                                                {{ $brg->nama_mesin }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col">
                                    <label for="jml_brg_1">Jumlah</label>
                                    <input type="number" class="form-control" id="jml_brg_{{ $key + 1 }}"
                                        name="jml_brg_{{ $key + 1 }}" required value="{{ $value->jumlah_barang }}">
                                </div>
                                <div class="form-group col">
                                    <label for="jml_brg_1">Lama Sewa {{ $key }} </label>
                                    @if ($key == 0)
                                        <button type="button" class="btn btn-warning float-right addBarangInForm"><i
                                                class="fas fa-plus"></i></button>
                                    @else
                                        <button class="removeBarangForm btn btn-danger float-right" type="button"
                                            data-delete-url="/delete-brg-in-surat/{{ $data->surat_id }}/{{ $value->barang->id }}"><i
                                                class="fas fa-minus"></i></button>
                                    @endif
                                    <input type="text" class="form-control" id="lama_sewa_{{ $key + 1 }}"
                                        name="lama_sewa_{{ $key + 1 }}" required value="{{ $value->lama_sewa }}">
                                </div>

                            </div>
                        @endforeach
                    </div>
                    <input type="hidden" name="jml_barang" id="jml_barang_input">
                    <div class="input-barang-container"></div>
                    <button type="submit" class="btn btn-primary btn-lg">Simpan Update </button>
                </div>

            </form>
            <div class="card-footer"></div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            var idInputBarang = {{ $barangInSurat->count() }}
            var dataBarang = {!! json_encode($barang) !!};
            // console.log({!! json_encode($barang) !!})
            console.log(idInputBarang)
            // Function to remove a row
            $(".card-body").on("click", ".removeBarangForm", function() {
                deleteConfirm(this, 'delete', false)
            });
            $(".card-body").on("click", ".removeBarangTemp", function() {
                 $(this).closest(".form-row").remove();
                idInputBarang -= 1
                console.log("jml input brg after minus : ", idInputBarang)
            });

            $('.addBarangInForm').click(function() {
                // alert(idInputBarang)
                idInputBarang++;
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
    <button class="removeBarangTemp btn btn-danger float-right" type="button"><i class="fas fa-minus"></i></button>
    <input type="text" class="form-control" id="lama_sewa_${idInputBarang}" name="lama_sewa_${idInputBarang}" required>
</div>

</div>


`);

                console.log("jml input brg after plus : ", idInputBarang)
                var newDropdown = $(`#barang_${idInputBarang}`);
                $.each(dataBarang, function(index, value) {
                    newDropdown.append(`
                        <option value=${value.id}>${value.nama_mesin}</option>
                        `)
                })
                // idInputBarang++;

            });

            $('#formEditSJ').submit(function() {
                $('#jml_barang_input').val(idInputBarang)
            })
        });
    </script>
@endsection
