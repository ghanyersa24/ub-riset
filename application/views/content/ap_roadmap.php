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
                                            <th>Nama Riset / Pengembangan</th>
                                            <th>Tahun Mulai</th>
                                            <th>Skema</th>
                                            <th>Aktivitas Riset dan Pengembangan</th>
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
                        <div class="col-md-6">
                            <div class="form-group">
                                <input id="add-produk_id" class="form-control" type="text" name="produk_id" hidden readonly value="<?= $id ?>">
                                <label for="add-nama">Nama Riset/Pengembangan</label>
                                <input type="text" id="add-nama" name="nama" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="add-tahun_mulai">Tahun Mulai</label>
                                <input type="number" id="add-tahun_mulai" name="tahun_mulai" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="add-tahun_selesai">Tahun Selesai</label>
                                <input type="number" id="add-tahun_selesai" name="tahun_selesai" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="add-tim_pelaksana">Tim Pelaksana</label>
                                <textarea name="tim_pelaksana" id="add-tim_pelaksana" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="add-skema">Skema</label>
                                <textarea name="skema" id="add-skema" class="form-control"></textarea>
                            </div>
                        </div>



                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="add-aktivitas">Aktivitas Riset dan Pengembangan</label>
                                <textarea name="aktivitas" id="add-aktivitas" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="add-sumber_pendanaan">Sumber Pendanaan</label>
                                <input name="sumber_pendanaan" id="add-sumber_pendanaan" class="form-control" type="text"></input>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="add-nilai_pendanaan">Nilai Pendanaan</label>
                                <input name="nilai_pendanaan" id="add-nilai_pendanaan" class="form-control" type="number"></input>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="add-tujuan">Tujuan</label>
                                <textarea name="tujuan" id="add-tujuan" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="add-hasil">Hasil / Output</label>
                                <textarea name="hasil" id="add-hasil" class="form-control"></textarea>
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
                <h5 class="modal-title" id="exampleModalLabel">Ubah <?= $title ?></h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
            </div>
            <form id="form-view">
                <div class="modal-body" id="form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input id="view-produk_id" class="form-control" type="text" name="produk_id" hidden readonly value="<?= $id ?>">
                                <label for="view-nama">Nama Riset/Pengembangan</label>
                                <input type="text" id="view-nama" name="nama" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="view-tahun_mulai">Tahun Mulai</label>
                                <input type="number" id="view-tahun_mulai" name="tahun_mulai" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="view-tahun_selesai">Tahun Selesai</label>
                                <input type="number" id="view-tahun_selesai" name="tahun_selesai" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="view-tim_pelaksana">Tim Pelaksana</label>
                                <textarea name="tim_pelaksana" id="view-tim_pelaksana" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="view-skema">Skema <span class="badge badge-secondary badge-xs" data-toggle="tooltip" data-placement="right" title="misal: penelitian dasar, penelitian terapan, PKM-K, PMW dsb">!</span></label>
                                <textarea name="skema" id="view-skema" class="form-control"></textarea>
                            </div>
                        </div>



                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="view-aktivitas">Aktivitas Riset dan Pengembangan</label>
                                <textarea name="aktivitas" id="view-aktivitas" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="view-sumber_pendanaan">Sumber Pendanaan <span class="badge badge-secondary badge-xs" data-toggle="tooltip" data-placement="right" title="misal: mandiri, hibah, insentif dsb">!</span></label>
                                <input name="sumber_pendanaan" id="view-sumber_pendanaan" class="form-control" type="text"></input>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="view-nilai_pendanaan">Nilai Pendanaan</label>
                                <input name="nilai_pendanaan" id="view-nilai_pendanaan" class="form-control" type="number"></input>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="view-tujuan">Tujuan</label>
                                <textarea name="tujuan" id="view-tujuan" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="view-hasil">Hasil / Output</label>
                                <textarea name="hasil" id="view-hasil" class="form-control"></textarea>
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
            "ajax": api + 'service/roadmap/get/<?= $id ?>',
            "columns": [{
                    "render": function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    },
                    className: "text-center"
                }, {
                    "data": "nama"
                }, {
                    "data": "tahun_mulai"
                }, {
                    "data": "skema"
                },
                {
                    "data": "aktivitas"
                }, {
                    "render": function(data, type, JsonResultRow, meta) {
                        return '<button class="btn btn-primary"><i class="fa fa-eye"></i> Detail </button>';
                    }
                }
            ]
        });
        var table = $('#table').DataTable()
        $('#table tbody').on('click', 'button', function() {
            var data = table.row($(this).parents('tr')).data()
            $('#view-id').val(data.id)
            $('#view-nama').val(data.nama)
            $('#view-tahun_mulai').val(data.tahun_mulai)
            $('#view-tahun_selesai').val(data.tahun_selesai)
            $('#view-tahun_selesai').val(data.tahun_selesai)
            $('#view-sumber_pendanaan').val(data.sumber_pendanaan)
            $('#view-nilai_pendanaan').val(data.nilai_pendanaan)
            setEditor('view-skema', data.skema)
            setEditor('view-aktivitas', data.aktivitas)
            setEditor('view-tujuan', data.tujuan)
            setEditor('view-hasil', data.hasil)
            $('#view').modal('show')
        })

        $('#form-add').validate({
            rules: {
                id: {
                    required: true,
                },
                nama: {
                    required: true,
                },
                tahun_mulai: {
                    required: true
                },
                tahun_selesai: {
                    required: true
                },
                sumber_pendanaan: {
                    required: true,
                },
                nilai_pendanaan: {
                    required: true,
                },

            },
            submitHandler: function(form) {
                var data = $('#form-add').serialize()
                $.ajax({
                    type: "POST",
                    url: api + "service/roadmap/create",
                    data: data,
                    dataType: "json",
                    success: function(response) {
                        $('#table').dataTable().api().ajax.reload()
                        if (!response.error) {
                            $('#form-add').trigger('reset')
                        }
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
                tahun_mulai: {
                    required: true
                },
                tahun_selesai: {
                    required: true
                },
                sumber_pendanaan: {
                    required: true,
                },
                nilai_pendanaan: {
                    required: true,
                },

            },
            submitHandler: function(form) {
                var data = $('#form-view').serialize()
                $.ajax({
                    type: "POST",
                    url: api + "service/roadmap/update",
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
