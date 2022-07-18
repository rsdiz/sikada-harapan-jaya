<div class="container-fluid">
    <div class="card card-info mt-3">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-black">Proses Perhitungan Enkripsi</h6>
            </div>
            <div class="card-body">
                <button onclick='history.back()' type='submit' class='btn btn-info'><i class="fa-solid fa-angles-left"></i></i>Back</button><br><br>
                <?php
                foreach ($proses as $data) {
                    echo $data;
                }

                ?>
            </div>

        </div>
    </div>
</div>