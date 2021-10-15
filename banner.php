<style type="text/css">
  #div_banner {
    width: 100%;
    height: 450px;
    /*background: blue;*/
    float: left;
  }

  * {
    box-sizing: border-box
  }

  .slideshow-container {
    /*max-width: 750px;*/
    position: relative;
    margin: 0 auto;
  }

  /* Ẩn các slider */
  .mySlides {
    display: none;
  }

  /* định dạng các chấm chuyển đổi các slide */
  .dot {
    cursor: pointer;
    height: 10px;
    width: 10px;
    margin: 0 1px;
    background-color: #bbb;
    border-radius: 50%;
    display: inline-block;
    transition: background-color 0.6s ease;
  }

  /* khi được hover, active đổi màu nền */
  .active,
  .dot:hover {
    background-color: #717171;
  }

  /* Thêm hiệu ứng khi chuyển đổi các slide */
  .fade {
    -webkit-animation-name: fade;
    -webkit-animation-duration: 1s;
    animation-name: fade;
    animation-duration: 1s;
  }

  @-webkit-keyframes fade {
    from {
      opacity: .4
    }

    to {
      opacity: 1
    }
  }

  @keyframes fade {
    from {
      opacity: .4
    }

    to {
      opacity: 1
    }
  }
</style>
<div id="div_banner">
  <div class="slideshow-container">
    <div class="mySlides fade">
      <img src="anh\banner_1.jpg" style="width:100%">
      <div class="text"></div>
    </div>

    <div class="mySlides fade">
      <img src="anh\banner_2.jpg" style="width:100%">
      <div class="text"></div>
    </div>

    <div class="mySlides fade">
      <img src="anh\banner_3.jpg" style="width:100%">
      <div class="text"></div>
    </div>
  </div>
  <div style="text-align:center">
    <span class="dot" onclick="currentSlide(0)"></span>
    <span class="dot" onclick="currentSlide(1)"></span>
    <span class="dot" onclick="currentSlide(2)"></span>
  </div>
  <script>
    var slideIndex;

    function showSlides() {
      var i;
      var slides = document.getElementsByClassName("mySlides");
      var dots = document.getElementsByClassName("dot");
      for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
      }
      for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
      }

      slides[slideIndex].style.display = "block";
      dots[slideIndex].className += " active";
      //chuyển đến slide tiếp theo
      slideIndex++;
      //nếu đang ở slide cuối cùng thì chuyển về slide đầu
      if (slideIndex > slides.length - 1) {
        slideIndex = 0
      }
      //tự động chuyển đổi slide sau 2s
      setTimeout(showSlides, 2000);
    }
    //mặc định hiển thị slide đầu tiên 
    showSlides(slideIndex = 0);


    function currentSlide(n) {
      showSlides(slideIndex = n);
    }
  </script>
</div>