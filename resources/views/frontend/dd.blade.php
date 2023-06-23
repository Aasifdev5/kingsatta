<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta content="width=device-width, initial-scale=1.0" name="viewport">
   <title>King Satta - Index</title>
   <meta content="" name="descriptison">
   <meta content="" name="keywords">

   <!-- Favicons -->
   <link href="assets1/img/favicon.png" rel="icon">
   <link href="assets1/img/apple-touch-icon.png" rel="apple-touch-icon">

   <!-- Google Fonts -->
   <link
      href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i&display=swap"
      rel="stylesheet">

   <!-- Vendor CSS Files -->
   <link href="assets1/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
   <link href="assets1/vendor/animate.css/animate.min.css" rel="stylesheet">
   <link href="assets1/vendor/icofont/icofont.min.css" rel="stylesheet">
   <link href="assets1/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
   <link href="assets1/vendor/venobox/venobox.css" rel="stylesheet">
   <link href="assets1/vendor/owl.carousel/assets1/owl.carousel.min.css" rel="stylesheet">
   <link href="assets1/vendor/aos/aos.css" rel="stylesheet">

   <!-- Template Main CSS File -->
   <link href="assets1/css/style.css" rel="stylesheet">

   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
   <!-- ======= Hero Section ======= -->
   <section id="hero" class="d-flex justify-cntent-center align-items-center">

      <!-- Slide 1 -->
      <a style="position:fixed; bottom:20px;right:8px;">&nbsp;<input
            style="border:#e7aa26 1px solid; background:#FBC503; color:Red; height:auto; padding:8px; font-weight:bold;"
            id="Refresh" name="Refresh" value="Refresh" type="submit" onclick="window.location.reload()">&nbsp;</a>

      <div class="header">
         <img src="A King logo.png" height="150px">
         <h2 class="animated fadeInDown">Welcome to <span>A King Satta</span></h2>
         <h3 style="color:black;">Today Super Fast Live Satta Results And Chart of June 2023 for
            <?php
            $company = DB::table('category')->get();

            $company = json_decode(json_encode($company), 'true');

            ?>
            @foreach ($company as $row)
            <?php
            //   print_r($row);
            ?>

            {{ strtoupper($row['name']) }},




            @endforeach
            Company etc.
         </h3><br>

         @foreach($datas as $u)
         <p class="animated fadeInUp para">{{ $u->description }} <a href="#" style="color: red;" data-toggle="modal"
               data-target="#myModal">Read More</a></p>
         <a href="https://docs.google.com/forms/d/e/1FAIpQLSerMVgTlndjNA84-zL7HYOno2mtbN0yjc_Ab-DK2oOloPpWUQ/viewform?pli=1"
            class="btn-get-started animated fadeInUp">फॉर्म लिंक.</a>

      </div>
      @endforeach


      @foreach($popups as $u)
      <!-- The Modal -->
      <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Read More</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
                  <p style="color: black;font-size: 18px;">{{ $u->description }}</p>

               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               </div>
            </div>
         </div>
      </div>

      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

      @endforeach

   </section><!-- End Hero -->
   <main id="main">


      <!-- End Why Us Section -->

      <!-- ======= Features Section ======= -->

      <!-- < second section table open > -->

      <section class="why-us section-bg">
         <div class="container">
            <div class="row">
               <div class="container">

                  <div class="table-h1" style="text-align: center;background-color:#FBC503;">
                     @if ($catId && isset($catIdToName[$catId]))
                     {{ $catIdToName[$catId] }} Result of {{ \Carbon\Carbon::now()->subDays(1)->format('F d, Y') }} &
                     {{ \Carbon\Carbon::now()->format('F d, Y') }}
                     @else
                     <?php

                     $data = DB::select("SELECT * FROM `category` where  id='" . $categoryId . "'");
                     $data = array_column($data, 'name', '0');
                     ?>
                     {{$data['0']}} -- Result of
                     {{ \Carbon\Carbon::now()->subDays(1)->format('F d, Y') }} &
                     {{ \Carbon\Carbon::now()->format('F d, Y') }}
                     @endif
                  </div>

                  <table class="table table-hover" id="table-first">
                     <thead>
                        <tr>
                           <th style="font-size: 20px;">Games List</th>
                           <th style="font-size: 20px;">{{ \Carbon\Carbon::now()->subDay()->format('D dS') }}</th>
                           <th style="font-size: 20px;">{{ \Carbon\Carbon::now()->format('D dS') }}</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach($subcategories as $index => $subcategory)
                        <tr>
                           <td>
                              {{ $subcategory->category_name }} <br>
                              <div class="table-link">at {{ date("h:i:s A", strtotime($subcategory->time)) }}<a href="">
                                    Record chat</a>
                              </div>
                           </td>

                           <td><?php
                                 if (isset($tomorrowRecords[$index]->number) && !empty($tomorrowRecords[$index]->number)) {

                                    echo  $tomorrowRecords[$index]->number;
                                 } else {
                                    echo "XX";
                                 }
                                 ?></td>
                           <td><?php
                                 if (isset($todayRecords[$index]->number) && !empty($todayRecords[$index]->number)) {

                                    echo  $todayRecords[$index]->number;
                                 } else {
                                    echo "XX";
                                 }
                                 ?></td>

                        </tr>
                        @endforeach
                     </tbody>
                  </table>
                  <div class="table-h5" style="text-align: center;"><a href="#table-first">Click here for more games
                        results</a></div>
               </div>
            </div>
         </div>
      </section>

      <!-- <second section closed table > -->
      <section class="why-us section-bg">
         <div class="container mt-3">
            @php
            $currentMonth = \Carbon\Carbon::now()->format('m');
            $currentYear = \Carbon\Carbon::now()->format('Y');
            $daysInMonth = \Carbon\Carbon::now()->daysInMonth;
            $numbers = [];

            // Fetch the numbers from the database based on the date
            foreach ($sub as $u) {
            $numbers[$u->date][$u->category_name] = $u->number;
            }

            // Get the latest four names
            $latestNames = array_slice(array_unique(array_column($sub->toArray(), 'category_name')), -4);
            @endphp
            <div class="table-h1" style="text-align: center;background-color:#33CC99;">Monthly Satta King Chart of
               {{ \Carbon\Carbon::now()->format('F Y') }} for All Satta Companies
               @foreach ($latestNames as $index => $name)

               @endforeach
            </div>
            <style>
            .table-hover tbody tr:hover td,
            .table-hover tbody tr:hover th {
               color: red;
            }
            </style>
            <div class="table-responsive">
               <table class="table table-striped table-bordered text-center table-hover nowrap dataTable" style="
                      
                     ">
                  <thead style="font-size: 18px;background-color:#FBC503;">
                     <tr>
                        <th width="260px">DATE</th>
                        <?php
                        $catId = DB::table('category')->get();

                        $catId = json_decode(json_encode($catId), 'true');

                        ?>
                        @foreach ($catId as $row)
                        <?php
                        //   print_r($row);
                        ?>

                        <th width="200px">{{ strtoupper($row['name']) }}</th>



                        <?php
                        continue;
                        ?>
                        @endforeach
                     </tr>
                  </thead>
                  <tbody>
                     @for ($day = 1; $day <= $daysInMonth; $day++) @php $date=\Carbon\Carbon::create($currentYear,
                        $currentMonth, $day); $formattedDate=$date->format('Y-m-d');
                        @endphp
                        <tr>
                           <?php

                           $d = strtotime("tomorrow");

                           $date = date("d", $d);
                           if ($day == $date && empty($_GET['month']) && empty($_GET['year'])) {
                              break;
                           }
                           ?>
                           <td>{{ $day }}</td>
                           <?php

                           $catId = DB::table('category')->get();
                           $catId = json_decode(json_encode($catId), 'true');
                           $catId = array_column($catId, 'id', '0');
                           $catId = implode(",", $catId);
                           $number = $numbers[$formattedDate][$name] ?? '--';

                           if (isset($_GET['month']) && isset($_GET['year'])) {
                              $date = $_GET['year'] . '-0' . $_GET['month'] . '-' . $day;
                           } else if (!empty($_GET['date']) || isset($_GET['date'])) {
                              $previous_month = $_GET['date'];
                              $_GET['month'] = $previous_month;
                              $date = date('Y-' . $previous_month . '-' . $day);
                           } else {
                              $date = date('Y-m-' . $day);
                           }

                           $sql = "SELECT * FROM `subcategory` where cat_id in (" . $catId . ") and date ='" . $date . "'";
                           $data = DB::select($sql);
                           // $date = array_column($data, 'date', '0');
                           // echo $date['0'];
                           $data = json_decode(json_encode($data), true);

                           foreach ($data as $row) {
                              //      echo "<pre>";
                              // print_r($row['number']);
                              // echo "</pre>";
                              // if($row['cat_id']==$categoryId){
                              if ($row['number'] == "") {

                           ?>
                           <td>XX</td>
                           <?php
                              } else {
                              ?>
                           <td>{{ $row['number'] }}</td>
                           <?php
                                 //  }
                              }
                           }

                           ?>

                        </tr>
                        @endfor

                        <tr class="option">
                           <td class="e-link bg-info" title="March-2023 Satta Result Chart With Record" colspan="5">
                              <a
                                 href="/page/{{$categoryId}}<?php echo '?date=' . date('m', strtotime('last month')); ?>">
                                 <h1 class="aero">{{ \Carbon\Carbon::now()->subMonth()->format('M Y') }}</h1>
                              </a>
                           </td>
                           <td class="s-link" colspan="1"></td>
                           <td class="e-link bg-info" title="May-2023 Satta Result Chart With Record" colspan="5">
                              <a href="/page/{{$categoryId}}">
                                 <h1 class="aero">{{ \Carbon\Carbon::now()->addMonth()->format('M Y') }}</h1>
                              </a>
                           </td>
                        </tr>
                  </tbody>
               </table>
            </div>
         </div>
      </section>
      <section class="why-us section-bg">
         <div class="container mt-3" style="background-color:#FBC503;">
            <p style="text-align: center; font-size: 18px; margin-top: 10px;">
               Yahan Aap Month Aur Year Select Karke All Satta Companies Ka Combined Chart Dekh
               Sakte Hai.. </p>
            <form action="" method="get">
               <div class="row d-flex justify-content-between">
                  <div class="col-lg-4">
                     <select id="monthSelect" name="month" class="form-select form-select-lg"
                        style="height: 50px; font-size: 20px;">
                        <option value="">Please Choose Month</option>
                        <option value="1" <?php
                                          if (isset($_GET['month']) && $_GET['month'] == "1") {
                                             echo "selected";
                                          }
                                          ?>>January</option>
                        <option value="2" <?php
                                          if (isset($_GET['month']) && $_GET['month'] == "2") {
                                             echo "selected";
                                          }
                                          ?>>February</option>
                        <option value="3" <?php
                                          if (isset($_GET['month']) && $_GET['month'] == "3") {
                                             echo "selected";
                                          }
                                          ?>>March</option>
                        <option value="4" <?php
                                          if (isset($_GET['month']) && $_GET['month'] == "4") {
                                             echo "selected";
                                          }
                                          ?>>April</option>
                        <option value="5" <?php
                                          if (isset($_GET['month']) && $_GET['month'] == "5") {
                                             echo "selected";
                                          }
                                          ?>>May</option>
                        <option value="6" <?php
                                          if (isset($_GET['month']) && $_GET['month'] == "6") {
                                             echo "selected";
                                          }
                                          ?>>June</option>
                        <option value="7" <?php
                                          if (isset($_GET['month']) && $_GET['month'] == "7") {
                                             echo "selected";
                                          }
                                          ?>>July</option>
                        <option value="8" <?php
                                          if (isset($_GET['month']) && $_GET['month'] == "8") {
                                             echo "selected";
                                          }
                                          ?>>August</option>
                        <option value="9" <?php
                                          if (isset($_GET['month']) && $_GET['month'] == "9") {
                                             echo "selected";
                                          }
                                          ?>>September</option>
                        <option value="10" <?php
                                             if (isset($_GET['month']) && $_GET['month'] == "10") {
                                                echo "selected";
                                             }
                                             ?>>October</option>
                        <option value="11" <?php
                                             if (isset($_GET['month']) && $_GET['month'] == "11") {
                                                echo "selected";
                                             }
                                             ?>>November</option>
                        <option value="12" <?php
                                             if (isset($_GET['month']) && $_GET['month'] == "12") {
                                                echo "selected";
                                             }
                                             ?>>December</option>
                     </select>
                  </div>
                  <div class="col-lg-4 mb-5">
                     <select id="yearSelect" name="year" class="form-select form-select-lg"
                        style="height: 50px; font-size: 20px;">
                        <option value="">Please Choose Year</option>
                        <option value="2015" <?php
                                             if (isset($_GET['year']) && $_GET['year'] == "2015") {
                                                echo "selected";
                                             }
                                             ?>>2015</option>
                        <option value="2016" <?php
                                             if (isset($_GET['year']) && $_GET['year'] == "2016") {
                                                echo "selected";
                                             }
                                             ?>>2016</option>
                        <option value="2017" <?php
                                             if (isset($_GET['year']) && $_GET['year'] == "2017") {
                                                echo "selected";
                                             }
                                             ?>>2017</option>
                        <option value="2018" <?php
                                             if (isset($_GET['year']) && $_GET['year'] == "2018") {
                                                echo "selected";
                                             }
                                             ?>>2018</option>
                        <option value="2019" <?php
                                             if (isset($_GET['year']) && $_GET['year'] == "2019") {
                                                echo "selected";
                                             }
                                             ?>>2019</option>
                        <option value="2020" <?php
                                             if (isset($_GET['year']) && $_GET['year'] == "2020") {
                                                echo "selected";
                                             }
                                             ?>>2020</option>
                        <option value="2021" <?php
                                             if (isset($_GET['year']) && $_GET['year'] == "2021") {
                                                echo "selected";
                                             }
                                             ?>>2021</option>
                        <option value="2022" <?php
                                             if (isset($_GET['year']) && $_GET['year'] == "2022") {
                                                echo "selected";
                                             }
                                             ?>>2022</option>
                        <option value="2023" <?php
                                             if (isset($_GET['year']) && $_GET['year'] == "2023") {
                                                echo "selected";
                                             }
                                             ?>>2023</option>
                     </select>
                  </div>
                  <div class="col-lg-4">
                     <button id="goButton" type="submit" class="btn btn-danger btn-lg btn-block"
                        style="height: 50px; font-size: 20px;">GO</button>
                  </div>
               </div>
            </form>
         </div>
      </section>

      <!-- <last section open> -->


      <!-- <last section close>    -->
   </main>

   <!-- End #main -->

   <!-- Vendor JS Files -->
   <script src="assets1/vendor/jquery/jquery.min.js"></script>
   <script src="assets1/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
   <script src="assets1/vendor/jquery.easing/jquery.easing.min.js"></script>
   <script src="assets1/vendor/php-email-form/validate.js"></script>
   <script src="assets1/vendor/venobox/venobox.min.js"></script>
   <script src="assets1/vendor/waypoints/jquery.waypoints.min.js"></script>
   <script src="assets1/vendor/counterup/counterup.min.js"></script>
   <script src="assets1/vendor/owl.carousel/owl.carousel.min.js"></script>
   <script src="assets1/vendor/isotope-layout/isotope.pkgd.min.js"></script>
   <script src="assets1/vendor/aos/aos.js"></script>

   <!-- Template Main JS File -->
   <script src="assets1/js/main.js"></script>

</body>

</html>