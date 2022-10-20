<!doctype html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Register</title>

      <!-- Favicon -->
      <link rel="shortcut icon" href="/template/assets/images/favicon.ico" />

      <!-- Library / Plugin Css Build -->
      <link rel="stylesheet" href="/template/assets/css/core/libs.min.css" />


      <!-- Hope Ui Design System Css -->
      <link rel="stylesheet" href="/template/assets/css/hope-ui.min.css?v=1.2.0" />

      <!-- Custom Css -->
      <link rel="stylesheet" href="/template/assets/css/custom.min.css?v=1.2.0" />

      <!-- Dark Css -->
      <link rel="stylesheet" href="/template/assets/css/dark.min.css"/>

      <!-- Customizer Css -->
      <link rel="stylesheet" href="/template/assets/css/customizer.min.css" />

      <!-- RTL Css -->
      <link rel="stylesheet" href="/template/assets/css/rtl.min.css"/>

  </head>
  <body class=" " data-bs-spy="scroll" data-bs-target="#elements-section" data-bs-offset="0" tabindex="0">
    <!-- loader Start -->
    <div id="loading">
      <div class="loader simple-loader">
          <div class="loader-body"></div>
      </div>    </div>
    <!-- loader END -->

      <div class="wrapper">
      <section class="login-content">
         <div class="row m-0 align-items-center bg-white vh-100">
               <div class="col-md-6 d-md-block d-none bg-primary p-0 mt-n1 vh-100 overflow-hidden">
               <img src="/template/assets/images/auth/05.png" class="img-fluid gradient-main animated-scaleX" alt="images">
            </div>
            <div class="col-md-6">
               <div class="row justify-content-center">
                  <div class="col-md-10">
                     <div class="card card-transparent auth-card shadow-none d-flex justify-content-center mb-0">
                        <div class="card-body">
                           <a href="/template/dashboard/index.html" class="navbar-brand d-flex align-items-center mb-3">
                              <!--Logo start-->
                              <svg width="30" class="" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <rect x="-0.757324" y="19.2427" width="28" height="4" rx="2" transform="rotate(-45 -0.757324 19.2427)" fill="currentColor"/>
                                  <rect x="7.72803" y="27.728" width="28" height="4" rx="2" transform="rotate(-45 7.72803 27.728)" fill="currentColor"/>
                                  <rect x="10.5366" y="16.3945" width="16" height="4" rx="2" transform="rotate(45 10.5366 16.3945)" fill="currentColor"/>
                                  <rect x="10.5562" y="-0.556152" width="28" height="4" rx="2" transform="rotate(45 10.5562 -0.556152)" fill="currentColor"/>
                              </svg>
                              <!--logo End-->                              <h4 class="logo-title ms-3">PT. Tempu Rejo</h4>
                           </a>
                           <h2 class="mb-2 text-center">Sign Up</h2>
                           <p class="text-center">Create your account.</p>
                           <form method="POST" action="{{route('user.register')}}">
                            @csrf

                              <div class="row">
                                 <div class="col-lg-6">
                                    <div class="form-group">
                                       <label for="nama" class="form-label">Nama</label>
                                       <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                 </div>
                                 <div class="col-lg-6">
                                    <div class="form-group">
                                       <label for="kontak" class="form-label">Kontak</label>
                                       <input type="text" class="form-control" id="kontak"  name="kontak" placeholder=" ">
                                    </div>
                                 </div>
                                 <div class="col-lg-6">
                                    <div class="form-group">
                                       <label for="email" class="form-label">Email</label>
                                       <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                 </div>
                                 <div class="col-lg-6">
                                    <div class="form-group">
                                       <label for="alamat" class="form-label">Alamat</label>
                                       <input type="text" class="form-control" id="alamat"  name="alamat" placeholder=" ">
                                    </div>
                                 </div>
                                 <div class="col-lg-6">
                                    <div class="form-group">
                                       <label for="password" class="form-label">Password</label>
                                       <input id="password" type="password" class="form-control " name="password" required autocomplete="new-password">

                                    </div>
                                    <!-- <input id="password-confirm" type="hidden" class="form-control" value="{{request('password')}}" name="password_confirmation"  required autocomplete="new-password"> -->
                                 </div>
                                 <div class="form-group">
                              <label class="form-label"><b>Jabatan</b></label>
                                 <select class="form-select mb-3 shadow-none"  id="id_jabatan" name="id_jabatan">
                                    <option selected="">Pilih Jabatan...</option>
                                    <?php
                                    $jab = DB::table('jabatan')->get();
                                    ?>
                                    @foreach ($jab as $j)
                                    <option value="{{ $j->id }}">{{ $j->nama_jabatan }}</option>
                                    @endforeach
                                 </select>
                                 <!-- <div class="col-lg-12 d-flex justify-content-center">
                                    <div class="form-check mb-3">
                                       <input type="checkbox" class="form-check-input" id="customCheck1">
                                       <label class="form-check-label" for="customCheck1">I agree with the terms of use</label>
                                    </div>
                                 </div> -->
                              </div>
                              <div class="d-flex justify-content-center">
                                 <button type="submit" class="btn btn-primary">Sign Up</button>
                              </div>
                              </form>
                              <!-- <p class="text-center my-3">or sign in with other accounts?</p>
                              <div class="d-flex justify-content-center">
                                 <ul class="list-group list-group-horizontal list-group-flush">
                                    <li class="list-group-item border-0 pb-0">
                                       <a href="#"><img src="/template/assets/images/brands/fb.svg" alt="fb"></a>
                                    </li>
                                    <li class="list-group-item border-0 pb-0">
                                       <a href="#"><img src="/template/assets/images/brands/gm.svg" alt="gm"></a>
                                    </li>
                                    <li class="list-group-item border-0 pb-0">
                                       <a href="#"><img src="/template/assets/images/brands/im.svg" alt="im"></a>
                                    </li>
                                    <li class="list-group-item border-0 pb-0">
                                       <a href="#"><img src="/template/assets/images/brands/li.svg" alt="li"></a>
                                    </li>
                                 </ul>
                              </div> -->
                              <p class="mt-3 text-center">
                                 Already have an Account <a href="{{ route('login') }}" class="text-underline">Sign In</a>
                              </p>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="sign-bg sign-bg-right">
                  <svg width="280" height="230" viewBox="0 0 421 359" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <g opacity="0.05">
                        <rect x="-15.0845" y="154.773" width="543" height="77.5714" rx="38.7857" transform="rotate(-45 -15.0845 154.773)" fill="#3A57E8"/>
                        <rect x="149.47" y="319.328" width="543" height="77.5714" rx="38.7857" transform="rotate(-45 149.47 319.328)" fill="#3A57E8"/>
                        <rect x="203.936" y="99.543" width="310.286" height="77.5714" rx="38.7857" transform="rotate(45 203.936 99.543)" fill="#3A57E8"/>
                        <rect x="204.316" y="-229.172" width="543" height="77.5714" rx="38.7857" transform="rotate(45 204.316 -229.172)" fill="#3A57E8"/>
                     </g>
                  </svg>
               </div>
            </div>
         </div>
      </section>
      </div>

      <!-- <script type="text/javascript">
          $(document).ready(function(){

              var password = $('#password').val();
              var password_confirm = $('#password-confirm').val();
              if(password_confirm == null || password_confirm == ""){
                document.getElementById("password-confirm").value = password;
              }

              console.log(password)
          }) -->
      <!-- </script> -->
    <!-- Library Bundle Script -->
    <script src="/template/assets/js/core/libs.min.js"></script>

    <!-- External Library Bundle Script -->
    <script src="/template/assets/js/core/external.min.js"></script>

    <!-- Widgetchart Script -->
    <script src="/template/assets/js/charts/widgetcharts.js"></script>

    <!-- mapchart Script -->
    <script src="/template/assets/js/charts/vectore-chart.js"></script>
    <script src="/template/assets/js/charts/dashboard.js" ></script>

    <!-- fslightbox Script -->
    <script src="/template/assets/js/plugins/fslightbox.js"></script>

    <!-- Settings Script -->
    <script src="/template/assets/js/plugins/setting.js"></script>

    <!-- Slider-tab Script -->
    <script src="/template/assets/js/plugins/slider-tabs.js"></script>

    <!-- Form Wizard Script -->
    <script src="/template/assets/js/plugins/form-wizard.js"></script>

    <!-- AOS Animation Plugin-->

    <!-- App Script -->
    <script src="/template/assets/js/hope-ui.js" defer></script>
  </body>
</html>
