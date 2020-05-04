<div class="main-content">
    <section class="section">
        <div class="section-header d-block justify-content-start align-items-center">

            <a href="<?= base_url('admin/detail/' . $slug) ?>"><i class="fa fa-chevron-left h5"></i>

            </a>
            <h1 class="pt-2 pb-2 mt-0 ml-3"><?= $title ?></h1>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <div class="container">
                        <p>Nama Inventor Yang Terdaftar</p>
                        <ul>
                            <li>Fawwaz Daffa Muhammad (175150400111035)</li>
                        </ul>

                        <form id="form-inventor">
                            <div class="form-group">
                                <label for="add-inventor">Tambah Nama Inventor</label>
                                <select name="inventor[]" id="add-inventor" multiple="multiple" class="select2 form-control p-2" data-placeholder="inventor">

                                </select>
                            </div>
                            <button class="btn btn-icon icon-left btn-primary d-block mr-md-0 ml-md-auto">
                                <i class="fa fa-save"></i>
                                Simpan Perubahan</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    $(document).ready(function() {
        let inventorList = [{
                id: 1,
                text: 'Fawwaz Daffa Muhammad (175150400111035)',

            },
            {
                id: 2,
                text: '1751504001110354 (Reyhan Ivandi)',

            },
            {
                id: 3,
                text: '175150400111033 (Ghany Abdillah Ersa)',

            },
            {
                id: 4,
                text: '196347829108 (Prof Bagus Fahmi)',

            }
        ]
        inventorList.forEach(element => {
            $('#add-inventor').append('<option value="' + element.id + '">' + element.text + '</option>')
        });

        $('#add-inventor').select2({
            data: inventorList,
            tags: true,
            "language": {
                "noResults": function() {
                    return '<button id="no-results-btn" onclick="alert()">No Result Found</a>';
                }
            },
            escapeMarkup: function(markup) {
                return markup;
            }
        })
        $('#add-inventor').val(inventorList)
    })
</script>