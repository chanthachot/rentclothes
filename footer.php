 <!-- Footer Bottom Start -->
 <!-- <div class="footer-bottom">
     <div class="container">
         <div class="row">
             <div class="col-md-6 copyright">
                 <p>Copyright &copy; <a href="">R Clothes Rental</a>. Khon Kaen</p>
             </div>
         </div>
     </div>
 </div> -->
 <!-- Footer Bottom End -->

 <!-- Back to Top -->
 <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

 <!-- JavaScript Libraries -->
 <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
 <script src="lib/easing/easing.min.js"></script>
 <script src="lib/slick/slick.min.js"></script>


 <!-- Template Javascript -->
 <script src="js/main.js"></script>
 <script>
     let today = new Date().toISOString().substr(0, 10);
     document.querySelector("#today").value = today;
     document.querySelector("#today2").value = today;
  
     document.getElementsByName("dateGive")[0].setAttribute('min', today);
     document.getElementsByName("dateReturn")[0].setAttribute('min', today);
 </script>