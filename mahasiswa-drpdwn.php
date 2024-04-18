<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--=============== REMIXICONS ===============-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css">

    <!--=============== SWIPER CSS ===============-->
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">

    <!--=============== Bootstrap ===============-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="assets/css/styles.css">


    <title>APT - Project</title>
</head>

<body>
    <!--==================== HEADER ====================-->
    <header class="header" id="header">
        <nav class="nav container">
            <a href="" class="nav__logo">
                APT-Apps
            </a>

            <div class="nav__menu">
                <ul class="nav__list">
                    <li class="nav__item">
                        <a href="index.html" class="nav__link">
                            <i class="ri-home-line"></i>
                            <span>Beranda</span>
                        </a>
                    </li>
                    <li class="nav__item">
                        <a href="#" class="nav__link">
                            <i class="ri-graduation-cap-line"></i>
                            <span>Mahasiswa</span>
                            <ul class="nav__drop">
                                <li><a href="" class="nav__down">Calon Mahasiswa</a></li>
                                <li><a href="" class="nav__down">Mahasiswa Baru</a></li>
                                <li><a href="" class="nav__down">Mahasiswa Aktif</a></li>
                             </ul>
                        </a>
                    </li>
                    <li class="nav__item">
                        <a href="esdm.html" class="nav__link">
                            <i class="ri-group-line"></i>
                            <span>SDM</span>
                            <ul class="nav__drop">
                                <li><a href="" class="nav__down">Calon Mahasiswa</a></li>
                                <li><a href="" class="nav__down">Mahasiswa Baru</a></li>
                                <li><a href="" class="nav__down">Mahasiswa Aktif</a></li>
                             </ul>
                        </a>
                    </li>
                    <li class="nav__item">
                        <a href="" class="nav__link">
                            <i class="ri-bar-chart-line"></i>
                            <span>Akreditasi</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="nav__actions">
                <!-- Login -->
                <i class="ri-login-box-line" id="login-btn"></i>
            </div>
        </nav>
    </header>

    <!--==================== LOGIN ====================-->
    <div class="login grid" id="login-content">
        <form action="" class="login__form grid">
            <h3 class="login__title">Log In</h3>

            <div class="login__group grid">
                <div>
                    <label for="login-email" class="login__label">Email</label>
                    <input type="email" placeholder="Tulis Email Anda" id="login-email" class="login__input">
                </div>
                <div>
                    <label for="login-pass" class="login__label">Password</label>
                    <input type="password" placeholder="Tulis Password Anda" id="login-pass" class="login__input">
                </div>

                <button type="submit" class="login__button button">Log In</button>
            </div>
        </form>
        <i class="ri-close-line login__close" id="login-close"></i>
    </div>

    <!--==================== MAIN ====================-->
    <main class="main">
        <!--==================== MAHASISWA ====================-->
        <!-- <section class="home section" id="mahasiswa">
            <div class="mahasiswa__container container grid">
                <div class="mahasiswa__data">
                    <h1 class="mahasiswa__title">
                        Data Mahasiswa
                    </h1>
                    <p class="mahasiswa__desc">
                        oke siap oke siap oke siap oke siap oke siap oke siap oke siap oke siap oke siap oke siap oke
                        siap oke siap oke siap oke siap oke siap oke siap oke siap
                    </p>
                </div>
                <div class="mahasiswa__images">
                    <img src="assets/img/gambar5.jpg" alt="imege">
                </div>
            </div>
        </section> -->

        <!--==================== PENTING ====================-->
        <section class="penting section">
            <div class="penting__container container grid">
                <h1 class="penting__title">
                     Data Mahasiswa
                </h1>
                <p class="penting__desc">
                    Data - data dari mahasiswa di Universitas kami ada dibawah ini :
                </p>
                <div class="penting__wrap">
                    <article class="penting__card">
                        <table class="table table-striped rounded shadow">
                            <thead>
                                <tr>
                                    <th scope="col">Tahun</th>
                                    <th scope="col">Daya Tampung</th>
                                    <th scope="col">Pendaftar</th>
                                    <th scope="col">Lulus Seleksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td scope="row">TS-4 (2018)</td>
                                    <td>5.650</td>
                                    <td>66.364</td>
                                    <td>5.615</td>
                                </tr>
                                <tr>
                                    <td scope="row">TS-3 (2019)</td>
                                    <td>4.800</td>
                                    <td>67.902</td>
                                    <td>4.779</td>
                                </tr>
                                <tr>
                                    <td scope="row">TS-2 (2020)</td>
                                    <td>3.850</td>
                                    <td>61.643</td>
                                    <td>3.835</td>
                                </tr>
                                <tr>
                                    <td scope="row">TS-1 (2021)</td>
                                    <td>4.600</td>
                                    <td>49.481</td>
                                    <td>4.563</td>
                                </tr>
                                <tr>
                                    <td scope="row">TS (2022)</td>
                                    <td>4.200</td>
                                    <td>32.683</td>
                                    <td>4.124</td>
                                </tr>
                            </tbody>
                        </table>
                    </article>
                    <article class="penting__card">
                        <div class="chart">
                            <canvas id="chartbatang" width="300" height="300"></canvas>
                        </div>
                    </article>
                </div>
            </div>
        </section>

        <!--==================== FEATURED ====================-->
        <!-- <section class="featured section" id="featured">

      </section> -->

        <!--==================== JURUSAN ====================-->
        <!-- <section class="jurusan section" id="jurusan">
         <h2 class="section__title">
            Jurusan Terbaik
         </h2>

         <div class="jurusan__container container">
            <div class="jurusan__swiper swiper">
               <div class="swiper-wrapper">
                  <article class="jurusan__card swiper-slide">
                     <img src="assets/img/gambar4.jpg" alt="" class="jurusan__img">
                     <h2 class="jurusan__title">Teknik Informatika</h2>
                     <p class="jurusan__desc">
                        Jurusan terbaik tahun 2026 dengan akreditasi A,
                        dan banyak diminati oleh Mahasiswa Baru
                     </p>
                     <div class="jurusan__stars">
                        <i class="ri-award-fill"></i>
                        <i class="ri-award-fill"></i>
                        <i class="ri-award-fill"></i>
                        <i class="ri-award-fill"></i>
                     </div>
                  </article>
                  <article class="jurusan__card swiper-slide">
                     <img src="assets/img/gambar4.jpg" alt="" class="jurusan__img">
                     <h2 class="jurusan__title">Teknik Informatika</h2>
                     <p class="jurusan__desc">
                        Jurusan terbaik tahun 2026 dengan akreditasi A,
                        dan banyak diminati oleh Mahasiswa Baru
                     </p>
                     <div class="jurusan__stars">
                        <i class="ri-award-fill"></i>
                        <i class="ri-award-fill"></i>
                        <i class="ri-award-fill"></i>
                        <i class="ri-award-fill"></i>
                     </div>
                  </article>
                  <article class="jurusan__card swiper-slide">
                     <img src="assets/img/gambar4.jpg" alt="" class="jurusan__img">
                     <h2 class="jurusan__title">Teknik Informatika</h2>
                     <p class="jurusan__desc">
                        Jurusan terbaik tahun 2026 dengan akreditasi A,
                        dan banyak diminati oleh Mahasiswa Baru
                     </p>
                     <div class="jurusan__stars">
                        <i class="ri-award-fill"></i>
                        <i class="ri-award-fill"></i>
                        <i class="ri-award-fill"></i>
                        <i class="ri-award-fill"></i>
                     </div>
                  </article>
                  <article class="jurusan__card swiper-slide">
                     <img src="assets/img/gambar4.jpg" alt="" class="jurusan__img">
                     <h2 class="jurusan__title">Teknik Informatika</h2>
                     <p class="jurusan__desc">
                        Jurusan terbaik tahun 2026 dengan akreditasi A,
                        dan banyak diminati oleh Mahasiswa Baru
                     </p>
                     <div class="jurusan__stars">
                        <i class="ri-award-fill"></i>
                        <i class="ri-award-fill"></i>
                        <i class="ri-award-fill"></i>
                        <i class="ri-award-fill"></i>
                     </div>
                  </article>
               </div>
            </div>
         </div>
      </section> -->

        <!--==================== DISCOUNT ====================-->
        <!-- <section class="discount section" id="discount">

      </section> -->

        <!--==================== NEW BOOKS ====================-->
        <!-- <section class="new section" id="new">

      </section> -->

        <!--==================== JOIN ====================-->
        <!-- <section class="join section">
         <div class="join__container">
            <img src="assets/img/gambar3.jpg" alt="imege" class="join__bg">

            <div class="join__data container grid">
               <h2 class="join__title section__title">
                  Kontak Lebih Lanjut <br>
                  Hubungi Kami
               </h2>

               <form action="" class="join__form">
                  <input type="text" placeholder="Kirim Masukan Anda" class="join__input">
                  <button type="submit" class="join__button button">Kirim</button>
               </form>
            </div>
         </div>
      </section> -->

    </main>

    <!--==================== FOOTER ====================-->
    <footer class="footer">
        <div class="footer__container container grid">
            <!-- <div>
            <a href="" class="footer__logo">
               APT-Apps
            </a>
            <p class="footer__desc">
               Find and explore the best <br>
               eBooks from all your <br>
               favorite writers.
            </p>
         </div>

         <div class="footer__data grid">
            <div>
               <h3 class="footer__title">About</h3>
               <ul class="footer__links">
                  <li>
                     <a href="" class="footer__link">Awards</a>
                  </li>
                  <li>
                     <a href="" class="footer__link">Awards</a>
                  </li>
                  <li>
                     <a href="" class="footer__link">Awards</a>
                  </li>
                  <li>
                     <a href="" class="footer__link">Awards</a>
                  </li>
               </ul>
            </div>
            <div>
               <h3 class="footer__title">About</h3>
               <ul class="footer__links">
                  <li>
                     <a href="" class="footer__link">Awards</a>
                  </li>
                  <li>
                     <a href="" class="footer__link">Awards</a>
                  </li>
                  <li>
                     <a href="" class="footer__link">Awards</a>
                  </li>
                  <li>
                     <a href="" class="footer__link">Awards</a>
                  </li>
               </ul>
            </div>
            <div>
               <h3 class="footer__title">About</h3>
               <ul class="footer__links">
                  <li>
                     <a href="" class="footer__link">Awards</a>
                  </li>
                  <li>
                     <a href="" class="footer__link">Awards</a>
                  </li>
                  <li>
                     <a href="" class="footer__link">Awards</a>
                  </li>
                  <li>
                     <a href="" class="footer__link">Terms Of Service</a>
                  </li>
               </ul>
            </div>
            <div>
               <h3 class="footer__title">About</h3>
               <ul class="footer__links">
                  <li>
                     <a href="" class="footer__link">Awards</a>
                  </li>
                  <li>
                     <a href="" class="footer__link">Awards</a>
                  </li>
                  <li>
                     <a href="" class="footer__link">Awards</a>
                  </li>
                  <li>
                     <a href="" class="footer__link">Awards</a>
                  </li>
               </ul>
            </div>
         </div> -->
        </div>

        <span class="footer__copy">
            &#169; UIN Maulana Malik Ibrahim Malang
        </span>
    </footer>

    <!--========== SCROLL UP ==========-->
    <a href="#" class="scrollup" id="scroll-up">
        <i class="ri-arrow-up-line"></i>
    </a>

    <!--=============== CHART ===============-->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="assets/js/chart1.js"></script>
    <script src="assets/js/chart2.js"></script>

    <!--=============== SCROLLREVEAL ===============-->
    <script src="assets/js/scrollreveal.min.js"></script>

    <!--=============== SWIPER JS ===============-->
    <script src="assets/js/swiper-bundle.min.js"></script>

    <!--=============== MAIN JS ===============-->
    <script src="assets/js/main.js"></script>
</body>

</html>