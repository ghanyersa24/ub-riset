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
                                            <th>Nama</th>
                                            <th>Tahun</th>
                                            <th>Status</th>
                                            <th>Lembaga</th>
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
            <form class="form-add" id="form-add">
                <div class="modal-body" id="form-data">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="form-group">
                                <input id="add-produk_id" class="form-control" type="text" name="produk_id" hidden readonly value="<?= $id ?>">
                                <label for="add-nama">Nama Pengujian</label>
                                <input type="text" id="add-nama" name="nama" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="add-tahun">Tahun Pengujian</label>
                                <input type="number" id="add-tahun" name="tahun" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="add-tahun_selesai">Status Pengujian</label>
                                <select name="status" id="add-status" class="form-control">
                                    <option value="belum dilakukan" selected>Belum dilakukan</option>
                                    <option value="sedang dilakukan">sedang dilakukan</option>
                                    <option value="sudah dilakukan">sudah dilakukan</option>
                                </select>

                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="add-jenis">Jenis Pengujian <span class="badge badge-secondary badge-xs" data-toggle="tooltip" data-placement="right" title="misal: pengujian mandiri, melalui lembaga/ laboratorium terakreditasi dsb">!</span></label>
                                <input name="jenis" id="add-jenis" class="form-control"></input>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="add-lembaga">Lembaga Pengujian</label>
                                <input name="lembaga" id="add-lembaga" class="form-control"></input>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="add-tujuan">Tujuan Pengujian</label>
                                <textarea name="tujuan" id="add-tujuan" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="add-hasil">Hasil Pengujian</label>
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah <?= $title ?></h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
            </div>
            <form class="form-view" id="form-view">
                <div class="modal-body" id="form-data">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="form-group">
                                <input id="view-produk_id" class="form-control" type="text" name="produk_id" hidden readonly value="<?= $id ?>">
                                <label for="view-nama">Nama Pengujian</label>
                                <input type="text" id="view-nama" name="nama" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="view-tahun">Tahun Pengujian</label>
                                <input type="number" id="view-tahun" name="tahun" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="view-tahun_selesai">Status Pengujian</label>
                                <select name="status" id="view-status" class="form-control">
                                    <option value="belum dilakukan" selected>Belum dilakukan</option>
                                    <option value="sedang dilakukan">sedang dilakukan</option>
                                    <option value="sudah dilakukan">sudah dilakukan</option>
                                </select>

                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="view-jenis">Jenis Pengujian <span class="badge badge-secondary badge-xs" data-toggle="tooltip" data-placement="right" title="misal: pengujian mandiri, melalui lembaga/ laboratorium terakreditasi dsb">!</span></label>
                                <input name="jenis" id="view-jenis" class="form-control"></input>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="view-lembaga">Lembaga Pengujian</label>
                                <input name="lembaga" id="view-lembaga" class="form-control"></input>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="view-tujuan">Tujuan Pengujian</label>
                                <textarea name="tujuan" id="view-tujuan" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="view-hasil">Hasil Pengujian</label>
                                <textarea name="hasil" id="view-hasil" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-default" data-dismiss="modal"> Cancel</button>
                    <button type="submit" class="btn btn-info" id="submit">Add</button>
                </div>

        </div>
        </form>
    </div>
</div>
<script>
    $(document).ready(function() {
        triggerEditor('#form-add')
        triggerEditor('#form-view')
        $('#table').DataTable({
            "ajax": api + 'service/pengujian/get/<?= $id ?>',
            "columns": [{
                "render": function(data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                },
                className: "text-center"
            }, {
                "data": "nama"
            }, {
                "data": "tahun"
            }, {
                "data": "status"
            }, {
                "data": "lembaga"
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
                var data = $('#form-add').serialize()
                $.ajax({
                    type: "POST",
                    url: api + "service/pengujian/create",
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