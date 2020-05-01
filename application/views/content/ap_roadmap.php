<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $title ?></h1>
        </div>

        <div class="section-body">
            <div class="card">
                <p>Halo bosku</p>
            </div>
            <button></button>
        </div>
    </section>
</div>

<div id="add" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Daftarkan !!!</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
            </div>
            <div class="modal-body">
                <form id="form-view" name="form-view" method="post">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input id="view-produk_id" class="form-control" type="text" name="produk_id" hidden readonly>
                                    <label for="add-nama" class="">Nama Produk <span class="badge badge-secondary badge-xs" data-toggle="tooltip" data-placement="right" title="Tooltip on right">!</span></label>
                                    <input id="add-nama" class="form-control" type="text" name="nama">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">

                                    <label for="add-tahun_mulai" class="">Tahun Mulai <span class="badge badge-secondary badge-xs" data-toggle="tooltip" data-placement="right" title="Tooltip on right">!</span></label>
                                    <input id="add-tahun_mulai" class="form-control" type="number" name="tahun_mulai">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">

                                    <label for="add-tahun_selesai" class="">Tahun Selesai <span class="badge badge-secondary badge-xs" data-toggle="tooltip" data-placement="right" title="Tooltip on right">!</span></label>
                                    <input id="add-tahun_selesai" class="form-control" type="number" name="tahun_selesai">
                                </div>
                            </div>


                            <div class="card-footer text-right d-block mr-0 ml-auto">
                                <button class="btn btn-primary" id="btn-save" type="submit">Simpan Perubahan</button>
                            </div>

                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-default" data-dismiss="modal">Batal</button>
                <button class="btn btn-primary" id="btn-save">Tambah</button>
            </div>
        </div>
    </div>
</div>