<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    
    
    <link href="https://free.suhani.site/assets/css/natacode.css" rel="stylesheet" type="text/css" />
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</head>
<style>
        body{
            background-image: url("https://darkespyt.in/uploads/images/bgjp.webp");
            font-family: 'Poppins', sans-serif !important;
            background-size: auto;
        }
        .container {
        background:
        url('https://c.wallhere.com/photos/60/db/trees-104758.jpg!d'),
        url('https://c.wallhere.com/photos/09/d9/Dominic_van_Velsen_CGI_Halloween_people_roots_lantern_dark_pumpkin-2283928.jpg!d'),
        url('https://c.wallhere.com/images/90/6d/34f325bc203db117d0d55a588353-1275971.jpg!d'),
        url('https://wallpapercave.com/wp/wp1927251.jpg');
       
    background-position: center center;
    background-repeat: repeat;
    background-size: cover;
    padding: 12px;
    border-radius: 10px;
    opacity: 0; /* Start hidden */
    animation: fadeIn 1s forwards; /* Fade-in effect */
    z-index: 99;
}

.navbar-expand-md .navbar-nav .dropdown-menu{
 z-index: 9999 !important;
 
}

@keyframes fadeIn {
    0% {
        opacity: 0;
    }
    100% {
        opacity: 1;
    }
}


        /* Door styles */
        .door {
            position: fixed;
            top: 0;
            height: 100vh;
            background-color: #000;
            z-index: 1000;
            transition: all 1s ease;
        }

        .left-door {
            left: 0;
            width: 50%;
            transform-origin: left; /* Origin for left door */
        }

        .right-door {
            right: 0;
            width: 50%;
            transform-origin: right; /* Origin for right door */
        }

        background-size: auto;
        }
        .hacks {
          position: relative;
          display: inline-block;
          width: 80%;
          height: 20px;
          float: left;
          margin: 5%;
        }
        .switch {
          position: relative;
          display: inline-block;
          width: 40px;
          height: 20px;
          float: right-end;
          align-items: flex-end;
          margin: 5px 5px 5px 5px;
        }
        
        /* Hide default HTML checkbox */
        .switch input {
          opacity: 0;
          width: 0;
          height: 0;
        }
        
        /* The slider */
        .slider {
          position: absolute;
          cursor: pointer;
          top: 0;
          left: 0;
          right: 0;
          bottom: 0;
          background-color: #ccc;
          -webkit-transition: .4s;
          transition: .4s;
        }
        
        .slider:before {
          position: absolute;
          content: "";
          height: 12px;
          width: 12px;
          left: 4px;
          bottom: 4px;
          background-color: white;
          -webkit-transition: .4s;
          transition: .4s;
        }
        
        input:checked + .slider {
          background-color: #2196F3;
        }
        
        input:focus + .slider {
          box-shadow: 0 0 1px #2196F3;
        }
        
        input:checked + .slider:before {
          -webkit-transform: translateX(20px);
          -ms-transform: translateX(20px);
          transform: translateX(20px);
        }
        
        /* Rounded sliders */
        .slider.round {
          border-radius: 34px;
        }
        
        .slider.round:before {
          border-radius: 50%;
        }
    </style>
</head>


    <!-- Start menu -->
    <?= $this->include('Layout/Header') ?>
    
    <!-- Start menu -->
    

    <div class="door left-door" style="display: none;"></div> <!-- Left door -->
    <div class="door right-door" style="display: none;"></div> <!-- Right door -->

    <main>
        <div class="container p-6 py-4 mb-2">
            <!-- Start content -->
            <?= $this->renderSection('content') ?>

            <!-- End of content -->
        </div>
    </main>
    <footer class=" bg-body border-top py-3 text-muted">
        <div class="container">
            <small class="text-warning">&copy; <?= date('Y') ?> - <?= BASE_NAME ?></small>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.0/sweetalert2.all.min.js" integrity="sha512-0UUEaq/z58JSHpPgPv8bvdhHFRswZzxJUT9y+Kld5janc9EWgGEVGfWV1hXvIvAJ8MmsR5d4XV9lsuA90xXqUQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <?= script_tag('assets/js/natacode.js') ?>

    <?= $this->renderSection('js') ?>

</body>

</html>