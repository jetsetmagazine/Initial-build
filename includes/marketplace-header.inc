<div class="container-16" id="slider1_container" style="">
<div class="grid-16" style="margin-bottom:7px;" id="headerHeight">


  <div class="headerBar">
    <div class="topLogo"></div>
    

  </div>

<?php include 'marketplace-topbanner.inc'; ?>
<script type="text/javascript" src="http://www.dev.jetsetmag.com/js/global.js"></script>

<style type="text/css">
.catContain{width: 125px;}
</style>

<!-- Navigation -->

<div class="mainNav">

<ul>
<li><a href="#">Home</a></li>
<li><a href="#">About</a></li>
<li><a href="http://www.dev.jetsetmag.com/rdw-index.html#categories">Categories</a></li>
<li><a href="#">Marketplace</a></li>
<li><a href="#">Newsroom</a></li>
<li><a href="#">Top5</a></li>
<li><a href="#">Jetset TV</a></li>
<li><a href="#">Events</a></li>
<li><a href="#">Subscribe</a></li>
<li><a href="#">Advertise</a></li>
<li><a href="#">Contact</a></li>
</ul>

</div><!-- mainNav-->

<div class="marketplaceNav">
<div class="marketplaceNavFade">

      <ul id="sdt_menu" class="sdt_menu">

       <li>
          <div class="mktCatContain">
            <a href="#" id="aviation">
              <div class="mktImg"><img src="http://www.dev.jetsetmag.com/images/marketplace/airplane.png" alt=""/><br/><span>Aviation</span></div>
            </a>
          </div>
        </li>

        <li>
          <div class="mktCatContain" id="heli">
            <a href="javascript:void(0);" onClick="return false;">
              <div class="mktImg"><img src="http://www.dev.jetsetmag.com/images/marketplace/heli.png" alt=""/><br/><span>Helicopters</span></div>
            </a>
          </div>
        </li>

        <li>
          <div class="mktCatContain" id="autos">
            <a href="javascript:void(0);" onClick="return false;">
              <div class="mktImg"><img src="http://www.dev.jetsetmag.com/images/marketplace/autos.png" alt=""/><br/><span>Autos</span></div>
            </a>
          </div>
        </li>

        <li>
          <div class="mktCatContain" id="realestate">
            <a href="javascript:void(0);" onClick="return false;">
              <div class="mktImg"><img src="http://www.dev.jetsetmag.com/images/marketplace/realestate.png" alt=""/><br/><span>Real Estate</span></div>
            </a>
          </div>
        </li>

        <li>
          <div class="mktCatContain" id="yachts">
            <a href="javascript:void(0);" onClick="return false;">
              <div class="mktImg"><img src="http://www.dev.jetsetmag.com/images/marketplace/yachts.png" alt=""/><br/><span>Yachts</span></div>
            </a>
          </div>
        </li>

        <li>
          <div class="mktCatContain" id="watches">
            <a href="javascript:void(0);" onClick="return false;">
              <div class="mktImg"><img src="http://www.dev.jetsetmag.com/images/marketplace/watches.png" alt=""/><br/><span>Watches &amp; Jewelry</span></div>
            </a>
          </div>
        </li>

        <li>
          <div class="mktCatContain" id="motorcycles">
            <a href="javascript:void(0);" onClick="return false;">
              <div class="mktImg"><img src="http://www.dev.jetsetmag.com/images/marketplace/motorcycles.png" alt=""/><br/><span>Motorcycles</span></div>
            </a>
          </div>
        </li>

        <li>
          <div class="mktCatContain" id="travel">
            <a href="javascript:void(0);" onClick="return false;">
              <div class="mktImg"><img src="http://www.dev.jetsetmag.com/images/marketplace/travel.png" alt=""/><br/><span>Travel</span></div>
            </a>
          </div>
        </li>

        <li>
          <div class="mktCatContain" id="art">
            <a href="javascript:void(0);" onClick="return false;">
              <div class="mktImg"><img src="http://www.dev.jetsetmag.com/images/marketplace/art.png" alt=""/><br/><span>Art</span></div>
            </a>
          </div>
        </li>

      </ul>


</div> <!--CatNavFade-->
</div><!--catNav-->

<div class="mktSearchContain" id="aviationsrc" style=""><div class="searchClose"></div>
<div class="mktSearchLeft"><strong>Aviation</strong><br/><br/><?php include 'http://www.dev.jetsetmag.com/marketplace/mktaviationsearch.inc'; ?></div>
<div class="mktSearchRight"><?php include 'http://www.dev.jetsetmag.com/marketplace/mktfeataviation.inc'; ?></div>
</div>

<div class="mktSearchContain" id="helisrc"><div class="searchClose"></div>
<div class="mktSearchLeft">Helicopters Search Function</div>
<div class="mktSearchRight">Helicopters Featured</div>
</div>

<div class="mktSearchContain" id="autossrc"><div class="searchClose"></div>
<div class="mktSearchLeft">autos Search Function</div>
<div class="mktSearchRight">autos Featured</div>
</div>

<div class="mktSearchContain" id="realsrc"><div class="searchClose"></div>
<div class="mktSearchLeft">real estate Search Function</div>
<div class="mktSearchRight">real estate Featured</div>
</div>

<div class="mktSearchContain" id="yachtssrc"><div class="searchClose"></div>
<div class="mktSearchLeft">yachts Search Function</div>
<div class="mktSearchRight">yachts Featured</div>
</div>

<div class="mktSearchContain" id="watchessrc"><div class="searchClose"></div>
<div class="mktSearchLeft">watches Search Function</div>
<div class="mktSearchRight">watches Featured</div>
</div>

<div class="mktSearchContain" id="motorcyclessrc"><div class="searchClose"></div>
<div class="mktSearchLeft">motorcycles Search Function</div>
<div class="mktSearchRight">motorcycles Featured</div>
</div>

<div class="mktSearchContain" id="travelsrc"><div class="searchClose"></div>
<div class="mktSearchLeft">travel Search Function</div>
<div class="mktSearchRight">travel Featured</div>
</div>

<div class="mktSearchContain" id="artsrc"><div class="searchClose"></div>
<div class="mktSearchLeft">art Search Function</div>
<div class="mktSearchRight">art Featured</div>
</div>


<!-- END Navigation -->

</div><!-- end container 16-->
</div><!-- end container 16-->

<script type="text/javascript">

var aviation = document.getElementById('aviation');
aviation.onclick = function() {
    var div = document.getElementById('aviationsrc');
    if (div.style.display !== 'none') {div.style.display = 'none';}
    else {div.style.display = 'block';} };

var heli = document.getElementById('heli');
heli.onclick = function() {
    var div = document.getElementById('helisrc');
    if (div.style.display !== 'none') {div.style.display = 'none';}
    else {div.style.display = 'block';} };

</script>





