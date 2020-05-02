<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">

        <div class="section-header d-block justify-content-start align-items-center">

            <a href="<?= base_url('admin/detail/' . $slug) ?>"><i class="fa fa-chevron-left h5"></i>

            </a>
            <h1 class="pt-2 pb-2 mt-0 ml-3"><?= $title ?></h1>
        </div>
        <button class="btn btn-info " data-toggle="modal" data-target="#add" style="position: fixed; bottom: 36px;   right: 20px; padding: 18.5px;z-index: 10;">
            <i class="fa fa-plus"></i>
        </button>


        <div class="section-body">
            <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                No.
                                            </th>
                                            <th>Nama / Jenis</th>
                                            <th>Deskripsi</th>
                                            <th>Status Perolehan</th>
                                            <th>Tanggal Mulai</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th class="text-center">

                                            </th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="modal fade" id="add">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah <?= $title ?></h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
            </div>
            <form id="form-add">
                <div class="modal-body" id="form-data">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <input id="add-produk_id" class="form-control" type="text" name="produk_id" hidden readonly value="1">
                                <label for="add-nama">Jenis Kekayaan Intelektual</label>
                                <select name="jenis" id="add-jenis" class="form-control">
                                    <option value="Paten">Paten</option>
                                    <option value="Merk">Merk</option>
                                    <option value="Hak Cipta">Hak Cipta</option>
                                    <option value="Tata Letak Sirkuit Terpadu">Tata Letak Sirkuit Terpadu</option>
                                    <option value="Rahasia Dagang">Rahasia Dagang</option>
                                    <option value="Desain Industri">Desain Industri</option>
                                    <option value="Indikasi Geografis">Indikasi Geografis</option>
                                    <option value="Perlindungan Varietas tanaman (PVT)">Perlindungan Varietas Tanaman (PVT)</option>
                                </select>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="add-status_perolehan">Status Perolehan</label>
                                <select name="status_perolehan" id="add-status_perolehan" class="form-control">
                                    <option value="Belum Diperoleh">Belum Diperoleh</option>
                                    <option value="Pengajuan Permohonan">Pengajuan Permohonan</option>
                                    <option value="Disetujui">Disetujui</option>
                                </select>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="add-no_pemohon">Nomor Permohonan <span class="badge badge-secondary badge-xs" data-toggle="tooltip" data-placement="right" title="Jika sudah diajukan permohonan, misal: S0020190xxxx, P002019xxxx">!</span></label>
                                <input type="text" id="add-no_pemohon" class="form-control" name="no_pemohon">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="add-file_formulir">File Formulir Permohonan <span class="badge badge-secondary badge-xs" data-toggle="tooltip" data-placement="right" title="File format .pdf maks 10mb">!</span></label>
                                <input name="file_formulir" id="add-file_formulir" class="form-control" type="file"></input>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="add-no_sertifikat">Nomor Sertifikat KI<span class="badge badge-secondary badge-xs" data-toggle="tooltip" data-placement="right" title="Nomor Sertifikat KI (misal: IDP0000xxxxx, IDM0000xxxxxx)">!</span></label>
                                <input name="no_sertifikat" id="add-no_sertifikat" class="form-control" type="text"></input>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="add-file">File Kekayaan Intelektual <span class="badge badge-secondary badge-xs" data-toggle="tooltip" data-placement="right" title="File format .pdf maks 10mb">!</span></label>
                                <input name="file" id="add-file" class="form-control" type="file"></input>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="add-tanggal_mulai">Tanggal Sertifikat Mulai Berlaku</label>
                                <input name="tanggal_mulai" id="add-tanggal_mulai" class="form-control datepicker" type="text"></input>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="add-tanggal_selesai">Tanggal Sertifikat Berakhir</label>
                                <input name="tanggal_selesai" id="add-tanggal_selesai" class="form-control datepicker" type="text">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="add-pemegang">Pemilik Kekayaan Intelektual</label>
                                <input name="pemegang" id="add-pemegang" class="form-control" type="text"></input>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="add-deskripsi">Deskripsi</label>
                                <textarea name="deskripsi" id="add-deskripsi"></textarea>

                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-default" data-dismiss="modal"> Cancel</button>
                    <button type="submit" class="btn btn-info" id="submit">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="view">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah <?= $title ?></h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
            </div>
            <form id="form-view">
                <div class="modal-body" id="form-data">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <input id="view-produk_id" class="form-control" type="text" name="produk_id" hidden readonly value="1">
                                <label for="view-nama">Jenis Kekayaan Intelektual</label>
                                <select name="jenis" id="view-jenis" class="form-control">
                                    <option value="Paten">Paten</option>
                                    <option value="Merk">Merk</option>
                                    <option value="Hak Cipta">Hak Cipta</option>
                                    <option value="Tata Letak Sirkuit Terpadu">Tata Letak Sirkuit Terpadu</option>
                                    <option value="Rahasia Dagang">Rahasia Dagang</option>
                                    <option value="Desain Industri">Desain Industri</option>
                                    <option value="Indikasi Geografis">Indikasi Geografis</option>
                                    <option value="Perlindungan Varietas tanaman (PVT)">Perlindungan Varietas Tanaman (PVT)</option>
                                </select>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="view-status_perolehan">Status Perolehan</label>
                                <select name="status_perolehan" id="view-status_perolehan" class="form-control">
                                    <option value="Belum Diperoleh">Belum Diperoleh</option>
                                    <option value="Pengajuan Permohonan">Pengajuan Permohonan</option>
                                    <option value="Disetujui">Disetujui</option>
                                </select>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="view-no_pemohon">Nomor Permohonan <span class="badge badge-secondary badge-xs" data-toggle="tooltip" data-placement="right" title="Jika sudah diajukan permohonan, misal: S0020190xxxx, P002019xxxx">!</span></label>
                                <input type="text" id="view-no_pemohon" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="view-file_formulir">File Formulir Permohonan <span class="badge badge-secondary badge-xs" data-toggle="tooltip" data-placement="right" title="File format .pdf maks 10mb">!</span></label>
                                <input name="file_formulir" id="view-file_formulir" class="form-control" type="file"></input>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="view-no_sertifikat">Nomor Sertifikat <span class="badge badge-secondary badge-xs" data-toggle="tooltip" data-placement="right" title="Nomor Sertifikat KI (misal: IDP0000xxxxx, IDM0000xxxxxx)">!</span></label>
                                <input name="no_sertifikat" id="view-no_sertifikat" class="form-control" type="text"></input>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="view-file">File Kekayaan Intelektual <span class="badge badge-secondary badge-xs" data-toggle="tooltip" data-placement="right" title="File format .pdf maks 10mb">!</span></label>
                                <input name="file" id="view-file" class="form-control" type="file"></input>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="view-tanggal_mulai">Tanggal Sertifikat Mulai Berlaku</label>
                                <input name="tanggal_mulai" id="view-tanggal_mulai" class="form-control datepicker" type="text"></input>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="view-tanggal_selesai">Tanggal Sertifikat Berakhir</label>
                                <input name="tanggal_selesai" id="view-tanggal_selesai" class="form-control datepicker" type="text">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="view-pemegang">Pemilik Kekayaan Intelektual</label>
                                <input name="pemegang" id="view-pemegang" class="form-control" type="text"></input>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="view-deskripsi">Deskripsi</label>
                                <textarea name="deskripsi" id="view-deskripsi"></textarea>

                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-default" data-dismiss="modal"> Cancel</button>
                    <button type="submit" class="btn btn-info" id="submit">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        triggerEditor('#form-add')
        triggerEditor('#form-view')
        $('#table').DataTable({
            "ajax": api + 'service/kekayaan_intelektual/get',
            "columns": [{
                "render": function(data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                },
                className: "text-center"
            }, {
                "data": "nama"
            }, {
                "data": "deskripsi"
            }, {
                "data": "status_perolehan"
            }, {
                "data": "tanggal_mulai"
            }, {
                "render": function(data, type, JsonResultRow, meta) {
                    return '<button class="btn btn-primary"><i class="fa fa-eye"></i> Detail </button>';
                }
            }]
        });
        var table = $('#table').DataTable()
        $('#table tbody').on('click', 'button', function() {
            var data = table.row($(this).parents('tr')).data()
            $('#view-nama').val(data.nama)
            $('#view-tahun').val(data.tahun)
            $('#view-status').val(data.status)
            $('#view-jenis').val(data.jenis)
            $('#view-lembaga').val(data.lembaga)
            setEditor('view-tujuan', data.tujuan)
            setEditor('view-hasil', data.hasil)
            $('#view').modal('show')
        })

        $('#form-add').validate({
            rules: {
                id: {
                    required: true,
                },
                jenis: {
                    required: true,
                },
                status_perolehan: {
                    required: true
                },
            },
            submitHandler: function(form) {
                var data = $('#form-add').serialize()
                $.ajax({
                    type: "POST",
                    url: api + "service/kekayaan_intelektual/create",
                    data: data,
                    dataType: "json",
                    success: function(response) {
                        $('#table').dataTable().api().ajax.reload()
                        $('#form-add').trigger('reset')
                        response_alert(response)
                    }
                })
            }
        })

        $('#form-view').validate({
            rules: {
                id: {
                    required: true,
                },
                nama: {
                    required: true,
                },
                tahun: {
                    required: true
                },
                status: {
                    required: true
                },
                jenis: {
                    required: true,
                },
                lembaga: {
                    required: true,
                }
            },
            submitHandler: function(form) {
                var data = $('#form-view').serialize()
                $.ajax({
                    type: "POST",
                    url: api + "service/pengujian/update",
                    data: data,
                    dataType: "json",
                    success: function(response) {
                        $('#table').dataTable().api().ajax.reload()
                        response_alert(response)
                    }
                })
            }
        })
    });



    $("#view-logo_produk").change(function() {
        readURL(this)
    })

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader()
            reader.onload = function(e) {
                $('#prev-view-logo_produk').attr('src', e.target.result)
            }
            reader.readAsDataURL(input.files[0])
        }
    }
</script>