<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Cash Flow</title>
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="<?= BASEURL . "assets/bootstrap/css/style.css" ?>">
</head>

<body>
   <div class="flasher">
      <?php Flasher::flash(); ?>
   </div>
   <div class="container-fluid svh-100">
      <div class="row h-100 justify-content-center align-items-center">
         <div class="col-8 col-md-6 col-lg-4">
            <div class="row g-2 justify-content-center align-items-center">
               <div class="col-12">
                  <div id="pin-view" class="d-flex flex-row mb-3 border border-dark p-4 justify-content-center gap-3 rounded-4">
                     &nbsp;
                     <i id="pin-1" class="bi bi-asterisk pin-ast d-none"></i>
                     <i id="pin-2" class="bi bi-asterisk pin-ast d-none"></i>
                     <i id="pin-3" class="bi bi-asterisk pin-ast d-none"></i>
                     <i id="pin-4" class="bi bi-asterisk pin-ast d-none"></i>
                     <i id="pin-5" class="bi bi-asterisk pin-ast d-none"></i>
                     <span id="pin-logging" class="text-muted fs-6 fw-medium d-none">Logging in...</span>
                  </div>
               </div>
               <div class="col-4">
                  <button class="btn btn-dark fs-3 w-100 p-4 fw-bold rounded-4 pin-element" data-value="1">1</button>
               </div>
               <div class="col-4">
                  <button class="btn btn-dark fs-3 w-100 p-4 fw-bold rounded-4 pin-element" data-value="2">2</button>
               </div>
               <div class="col-4">
                  <button class="btn btn-dark fs-3 w-100 p-4 fw-bold rounded-4 pin-element" data-value="3">3</button>
               </div>
               <div class="col-4">
                  <button class="btn btn-dark fs-3 w-100 p-4 fw-bold rounded-4 pin-element" data-value="4">4</button>
               </div>
               <div class="col-4">
                  <button class="btn btn-dark fs-3 w-100 p-4 fw-bold rounded-4 pin-element" data-value="5">5</button>
               </div>
               <div class="col-4">
                  <button class="btn btn-dark fs-3 w-100 p-4 fw-bold rounded-4 pin-element" data-value="6">6</button>
               </div>
               <div class="col-4">
                  <button class="btn btn-dark fs-3 w-100 p-4 fw-bold rounded-4 pin-element" data-value="7">7</button>
               </div>
               <div class="col-4">
                  <button class="btn btn-dark fs-3 w-100 p-4 fw-bold rounded-4 pin-element" data-value="8">8</button>
               </div>
               <div class="col-4">
                  <button class="btn btn-dark fs-3 w-100 p-4 fw-bold rounded-4 pin-element" data-value="9">9</button>
               </div>
               <div class="col-4">
                  <button class="btn btn-warning fs-3 w-100 p-4 fw-bold rounded-4 pin-backspace" data-value="0"><i class="bi bi-backspace-fill"></i></button>
               </div>
               <div class="col-4">
                  <button class="btn btn-dark fs-3 w-100 p-4 fw-bold rounded-4 pin-element" data-value="0">0</button>
               </div>
               <div class="col-4">
                  <button class="btn btn-danger fs-3 w-100 p-4 fw-bold rounded-4 pin-delete" data-value="0"><i class="bi bi-eraser-fill"></i></button>
               </div>
            </div>
         </div>
      </div>
   </div>

   <script src="<?= BASEURL . "assets/js/jquery.min.js" ?>"></script>
   <script src="<?= BASEURL . "assets/bootstrap/js/bootstrap.bundle.min.js" ?>"></script>
   <script src="<?= BASEURL . "assets/js/flasher.js" ?>"></script>
   <script>
      $(document).ready(function() {
         let pin = "";
         $(".pin-element").click(function() {
            pin += $(this).data("value");
            $('#pin-' + pin.length).removeClass('d-none');
            if (pin.length >= 6) {
               // $("#pin-view").html("<span class=\"text-muted fs-6 fw-medium\">Logging in...</span>");
               $('.pin-ast').addClass('d-none');
               $('#pin-logging').removeClass('d-none');
               $.ajax({
                  type: "post",
                  url: "<?= BASEURL ?>login/dologin",
                  data: {
                     pin: pin
                  },
                  dataType: "json",
                  success: function(response) {
                     if (response == 1) {
                        window.location.href = "<?= BASEURL ?>dashboard";
                     } else {
                        setFlash("Incorrect PIN", "danger");
                     }
                     pin = "";
                     $('.pin-ast').addClass('d-none');
                     $('#pin-logging').addClass('d-none');
                  }
               });
            }
         });
         $('.pin-backspace').click(function() {
            $('#pin-' + pin.length).addClass('d-none');
            pin = pin.slice(0, -1);
         });
         $('.pin-delete').click(function() {
            $('.pin-ast').addClass('d-none');
            pin = "";
         });
      });
   </script>
</body>

</html>