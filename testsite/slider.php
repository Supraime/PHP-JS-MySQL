<!DOCTYPE html>

<div class="slider">
  	<div class="item">
        <img src="images/hotslider.jpg" alt="Горячие блюда">
        <div class="slideText">Горячие блюда</div>
    </div>

    <div class="item">
        <img src="images/coldslider.jpg" alt="Холодные блюда">
        <div class="slideText">Холодные блюда</div>
    </div>

    <div class="item">
        <img src="images/desertslider.jpg" alt="Десерты">
        <div class="slideText">Десерты</div>
    </div>

  	<a class="prev" onclick="minusSlide()">&#10094;</a>
  	<a class="next" onclick="plusSlide()">&#10095;</a>
</div>
<br>

<div class="slider-dots">
	<span class="slider-dots_item" onclick="currentSlide(1)"></span> 
  	<span class="slider-dots_item" onclick="currentSlide(2)"></span> 
  	<span class="slider-dots_item" onclick="currentSlide(3)"></span> 
</div>
<script src="script.js"></script>