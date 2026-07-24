    </div>
    <!-- End Content -->

    <!-- Footer -->
    <footer class="bg-white border-top shadow-sm mt-4 py-3">
        <div class="container-fluid px-4">

            <div class="row align-items-center">

                <!-- Kiri -->
                <div class="col-md-6 text-center text-md-start mb-2 mb-md-0">

                    <strong class="text-primary">
                        <i class="fas fa-graduation-cap me-1"></i>
                        Sistem Pengelolaan Beasiswa
                    </strong>

                    <br>

                    <small class="text-muted">
                        © <?= date('Y'); ?> Universitas PGRI Sumatera Barat
                    </small>

                </div>

                <!-- Kanan -->
                <div class="col-md-6 d-flex justify-content-center justify-content-md-end">

                    <small class="text-muted me-md-3">
                        Version 1.0 |
                        Dibuat dengan
                        <i class="bi bi-heart-fill text-danger"></i>
                        Bootstrap 5
                    </small>

                </div>

            </div>

        </div>
    </footer>

    <!-- Tombol Kembali ke Atas -->
    <button
        type="button"
        class="btn btn-primary rounded-circle shadow"
        id="btnTop"
        style="
            display:none;
            position:fixed;
            right:25px;
            bottom:25px;
            width:50px;
            height:50px;
            z-index:9999;
        ">
        <i class="fas fa-arrow-up"></i>
    </button>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>

    const btnTop = document.getElementById("btnTop");

    window.addEventListener("scroll", function () {

        if (window.scrollY > 150) {
            btnTop.style.display = "block";
        } else {
            btnTop.style.display = "none";
        }

    });

    btnTop.addEventListener("click", function () {

        window.scrollTo({
            top: 0,
            behavior: "smooth"
        });

    });

    </script>

</body>
</html>