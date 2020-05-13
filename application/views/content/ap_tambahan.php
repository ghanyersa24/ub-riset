<div class="main-content">
    <section class="section">
        <div class="section-header d-block justify-content-start align-items-center">
            <a href="<?= base_url('admin/detail/' . $slug) ?>"><i class="fa fa-chevron-left h5"></i>
            </a>
            <h1 class="pt-2 pb-2 mt-0 ml-3"><?= $title ?></h1>
        </div>

        <div class="section-body">
            <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">

                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-4">
                                    <ul class="nav nav-pills flex-column" id="myTab4" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="home-tab4" data-toggle="tab" href="#home4" role="tab" aria-controls="home" aria-selected="true">Prestasi</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="profile-tab4" data-toggle="tab" href="#profile4" role="tab" aria-controls="profile" aria-selected="false">Kerjasama</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="contact-tab4" data-toggle="tab" href="#contact4" role="tab" aria-controls="contact" aria-selected="false">Informasi Terbaru</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-12 col-sm-12 col-md-8">
                                    <div class="tab-content no-padding" id="myTab2Content">
                                        <div class="tab-pane fade show active" id="home4" role="tabpanel" aria-labelledby="home-tab4">
                                            <form id="form-prestasi">
                                                <div class="table-responsive">
                                                    <table class="table table-striped" id="table">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-center">
                                                                    No.
                                                                </th>
                                                                <th>Nama Acara</th>
                                                                <th>Penyelenggara</th>
                                                                <th>Tahun</th>
                                                                <th>Tingkat</th>
                                                                <th>Pencapaian</th>
                                                                <th>Action</th>
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
                                                                <th></th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="add-acara">Nama Acara</label>
                                                            <input type="text" id="add-acara" name="acara" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="add-penyelenggara">Penyelenggara</label>
                                                            <input type="text" id="add-penyelenggara" name="penyelenggara" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="add-tahun">Tahun</label>
                                                            <input type="number" id="add-tahun" name="tahun" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="add-tingkat">Tingkat</label>
                                                            <input type="text" id="add-tingkat" name="tingkat" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="add-pencapaian">Pencapaian</label>
                                                            <input type="text" id="add-pencapaian" name="pencapaian" class="form-control" placeholder="Contoh: Juara 4">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="h-100 align-items-center d-flex">
                                                            <button class="btn btn-primary btn-icon icon-left ml-auto mr-0 d-block" type="submit"><i class="fa fa-plus"></i> Tambah Prestasi</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="tab-pane fade" id="profile4" role="tabpanel" aria-labelledby="profile-tab4">
                                            <form id="form-kerjasama">
                                                <div class="form-group">
                                                    <label for="add-kerjasama">Kerjasama Yang Diharapkan</label>
                                                    <textarea name="kerjasama" id="add-kerjasama" class="form-control"></textarea>
                                                </div>
                                                <button class="btn btn-primary btn-icon icon-left ml-auto mr-0 d-block" type="submit"><i class="fa fa-save"></i> Simpan Kerjasama</button>
                                            </form>
                                        </div>
                                        <div class="tab-pane fade" id="contact4" role="tabpanel" aria-labelledby="contact-tab4">
                                            <form id="form-informasi">
                                                <div class="form-group">
                                                    <label for="add-informasi">Informasi Terbaru Produk</label>
                                                    <textarea name="informasi" id="add-informasi" class="form-control"></textarea>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="add-tanggal">Tanggal</label>
                                                            <input type="date" id="add-tanggal" name="tanggal" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="h-100 align-items-center d-flex">
                                                            <button class="btn btn-primary btn-icon icon-left ml-auto mr-0 d-block" type="submit"><i class="fa fa-save"></i> Simpan Informasi</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    $(document).ready(function() {
        triggerEditor('#form-kerjasama')
        triggerEditor('#form-informasi')
    })
</script>