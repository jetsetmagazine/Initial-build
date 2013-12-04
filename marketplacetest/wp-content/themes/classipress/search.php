<?php get_header(); ?>

<?php // appthemes_highlight_search_term(esc_attr(get_search_query())); ?>

<!-- CONTENT -->
  <div class="content">

    <div class="content_botbg">

      <div class="content_res">

      <div id="breadcrumb">

          <?php if ( function_exists('cp_breadcrumb') ) cp_breadcrumb(); ?>

        </div><!-- /breadcrumb -->


        <!-- left block -->
        <div class="content_left">            


			<?php if ( have_posts() ) : ?>

				<div class="shadowblock_out">

					<div class="shadowblock">
						 <script type="text/javascript">			
$(document).ready(function() {
	$(" #search_box select:nth-child(1)").change(function() {
		$("#search_box select:nth-child(1) ~ select").hide();
		});
	$("select").change(function() {
		var selected_value = $(this).attr("value");
		var next_value = $(this).next("select").attr("class").split(' ')[0];
		var new_dropdown = selected_value +"_"+ next_value;
	 $("select[name="+new_dropdown+"]").fadeIn();
	});
	$("select").change(function() {
	var current_height = $("#search_box").outerHeight();
	if (current_height > 267){
		var current_height_add = current_height-267;
		var featured_top = $("div.featured").css("top");
		var new_featured_top = current_height_add + 295;
		var min_height_main = current_height_add + 1040;
		var margin_top_covers = current_height_add +20;
		$("div.featured").animate({top: new_featured_top});
		$("div#main_content.marketplace_home").css("min-height",min_height_main);
		$("div#covers").css("margin-top",margin_top_covers);
		};
	 if (current_height < 267){
		$("div.featured").animate({top: 295});
		$("div#main_content.marketplace_home").css("min-height",1040);
		$("div#covers").css("margin-top",20);
			}
	});
	if ($('div[data-tag="main"]').is(":visible")){
		$("form.category_search_form select:nth-child(1) option:contains('All Categories')").attr('selected', true);
	}
});
</script> 

		<!--begin search boxes-->
			<div id="search_box">

			<!-- Begin Main Category Search -->
			<div data-tag="main" class="article_contain">
                <p><span>Jetset Magazine Marketplace</span></p>
				<form action="" method="" id="" class="category_search_form">
					<select name="cat" id="main-form-select-brand" class="brand selectBox-dropdown">
						<option selected="selected">All Categories</option>
						<option value="59">Private Jets</option>
                        <option value="25">Helicopters</option>
                        <option value="134">Art &amp; Collectibles</option>
                        <option value="12">Automobiles</option>
                        <option value="2736">Lifestyle</option>
                        <option value="22">Motorcycles</option>
						<option value="13">Real Estate</option>
                        <option value="2737">Travel &amp; Excursions</option>
						<option value="17">Watches &amp; Jewelry</option>
                        <option value="18">Yachts</option>
                    </select>
                    
					<input name="s" type="text" id="s" tabindex="1" class="editbox_search ui-autocomplete-input" value="Keyword" onfocus="if (this.value == 'Keyword') {this.value = '';}" autocomplete="off" role="textbox" aria-autocomplete="list" aria-haspopup="true">
					<button type="button" value="Search" class="search_button">Search</button>
                </form>
				<p class="view_all"><a href="http://www.jetsetmag.com/classifieds/">View All Listings</a></p>
                <p class="pop_search"><span>Popular Searches</span> <a href="http://www.jetsetmag.com/classifieds/ad-category/private-jets-for-sale/#nav2" >Private Jets</a> <a href="http://www.jetsetmag.com/classifieds/ad-category/luxury-autos/#nav2" >Luxury Autos</a> <a href="http://www.jetsetmag.com/classifieds/ad-category/yachts/#nav2" >Yachts</a> <a href="http://www.jetsetmag.com/classifieds/ad-category/luxury-real-estate/#nav2" >Real Estate</a> </p>
			</div><!-- End Main Category Search -->

			<!-- Begin Art and Collectables -->
			<div style="display:none;" data-tag="134" class="article_contain">
                <p><span>Art For Sale</span></p>
                <form action="" method="" id="" class="category_search_form">
					<select name="cat" id="main-form-select-brand" class="brand selectBox-dropdown"> 
                        <option value="main">All Categories</option>
                        <option value="59">Private Jets</option>
                        <option value="25">Helicopters</option>
                        <option value="134" selected="selected">Art &amp; Collectibles</option>
                        <option value="12">Automobiles</option>
                        <option value="2736">Lifestyle</option>
                        <option value="22">Motorcycles</option>
						<option value="13">Real Estate</option>
                        <option value="2737">Travel &amp; Excursions</option>
						<option value="17">Watches &amp; Jewelry</option>
                        <option value="18">Yachts</option>
                    </select>
				</form>
                
                <form action="" method="" id="art-search-form" class="search_form">
					<select name="cat" id="art-form-select-brand" class="brand selectBox-dropdown">
                        <option value="134" selected="selected">All Art &amp; Collectibles</option>
                        <!-- <option value="0" selected="selected">All Mediums</option> -->
                        <!-- <option value="2">Fine Art</option>
                        <option value="2">Oil Paintings</option>
                        <option value="45">Sculptures</option>
                        <option value="43">Photo Prints</option>
                        <option value="60">Installations</option>
                        <option value="26">Ceramic</option>
                        <option value="26">Antiquities</option>
                        <option value="29">Glass</option>
                        <option value="29">Investment</option>
                        <option value="29">Famous Artists</option>
                        <option value="6">Artists For Hire</option> -->
                  	</select>
					<input name="s" type="text" id="s" tabindex="1" class="editbox_search ui-autocomplete-input" value="Keyword" onfocus="if (this.value == 'Keyword') {this.value = '';}" autocomplete="off" role="textbox" aria-autocomplete="list" aria-haspopup="true">
					<button type="button" value="Search" class="search_button">Search</button>
                </form>
                <p class="view_all"><a href="hhttp://www.jetsetmag.com/classifieds/ad-category/art-and-collectibles/#nav2">View All Listings</a></p>
                <p class="pop_search"><span>Popular Searches</span> <a href="http://www.jetsetmag.com/classifieds/?s=Botticelli&sa=search&cat=134" >Botticelli</a> <a href="http://www.jetsetmag.com/classifieds/?s=Chihuly+Glass&sa=search&cat=134" >Chihuly Glass</a> <a href="http://www.jetsetmag.com/classifieds/?s=Monet&sa=search&cat=134" >Monet</a> <a href="http://www.jetsetmag.com/classifieds/?s=bronze&sa=search&cat=134" >Bronze Sculptures</a></p>
			</div> <!-- End Art and Collectables -->
            
            <!-- Begin Automobiles -->
			<div style="display:none;" data-tag="12" class="article_contain">
				<p><span>Automobiles For Sale</span></p>
                <form action="" method="" id="" class="category_search_form">
                	<select name="cat" id="main-form-select-brand" class="brand selectBox-dropdown">
						<option value="main">All Categories</option>
                        <option value="59">Private Jets</option>
                        <option value="25">Helicopters</option>
                        <option value="134">Art &amp; Collectibles</option>
                        <option value="12" selected="selected">Automobiles</option>
                        <option value="2736">Lifestyle</option>
                        <option value="22">Motorcycles</option>
						<option value="13">Real Estate</option>
                        <option value="2737">Travel &amp; Excursions</option>
						<option value="17">Watches &amp; Jewelry</option>
                        <option value="18">Yachts</option>
                    </select>
				</form>
                
                <form action="" method="" id="cars-search-form" class="search_form">
					<select name="cat" id="cars-form-select-brand" class="brand selectBox-dropdown">
                        <option selected="selected" value="12">All Makes</option>
                        <option value="1054">Alternative Fuel Vehicles</option>
                        <option value="1055">Armored Vehicles</option>
                        <option value="43">Aston Martin</option>
                        <option value="1071">Audi</option>
                        <option value="45">Bentley</option>
                        <option value="44">BMW</option>
                        <option value="1070">Bugatti</option>
                        <option value="1069">Cadillac</option>
                        <option value="79">Classic Cars</option>
                        <option value="1068">Corvette</option>
                        <option value="37">Ferrari</option>
                        <option value="1067">Fisker</option>
                        <option value="1052">Golf Carts</option>
                        <option value="80">Hot Rods</option>
                        <option value="1066">Hummer</option>
                        <option value="1065">Infiniti</option>
                        <option value="48">Jaguar</option>
                        <option value="46">Lamborghini</option>
                        <option value="42">Land Rover</option>
                        <option value="1064">Lexus</option>
                        <option value="1063">Lincoln</option>
                        <option value="1062">Lotus</option>
                        <option value="38">Maserati</option>
                        <option value="47">Maybach</option>
                        <option value="1061">McLaren</option>
                        <option value="40">Mercedes-Benz</option>
                        <option value="1056">Muscle Cars</option>
                        <option value="50">Other Vehicles</option>
                        <option value="41">Porsche</option>
                        <option value="1053">Racing Vehicles</option>
                        <option value="39">Rolls-Royce</option>
                        <option value="1060">Shelby</option>
                        <option value="1058">Specialty Vehicles</option>
                        <option value="1059">Tesla</option>
                        <option value="1057">Vintage Automobiles</option>
					</select>
                                              
                                    
                    <select name="43_model" id="" class="model selectBox-dropdown" style="display:none;">
                        <option value="43" selected="selected">All Aston Martin Models</option>
                        <option value="DB4">DB4</option>
                        <option value="DB6 Vantage">DB6 Vantage</option>
                        <option value="DB7">DB7</option>
                        <option value="DB7 Vantage">DB7 Vantage</option>
                        <option value="DB9">DB9</option>
                        <option value="DB9 Volante">DB9 Volante</option>
                        <option value="DBS">DBS</option>
                        <option value="Lagonda">Lagonda</option>
                        <option value="One-77">One-77</option>
                        <option value="Other">Other</option>
                        <option value="Rapide">Rapide</option>
                        <option value="V12 Vantage">V12 Vantage</option>
                        <option value="V8 Vantage">V8 Vantage</option>
                        <option value="V8 Vantage Volante">V8 Vantage Volante</option>
                        <option value="Vanquish">Vanquish</option>
                        <option value="Vanquish S">Vanquish S</option>
                        <option value="Vantage">Vantage</option>
                        <option value="Virage">Virage</option>
                        <option value="Virage Volante">Virage Volante</option>
                        <option value="Volante">Volante</option>
                    </select>
                  
                    <select name="1071_model" id="" class="model selectBox-dropdown" style="display:none;">
                        <option value="1071" selected="selected">All Audi Models</option>
                        <option value="A3">A3</option>
                        <option value="A4">A4</option>
                        <option value="A5">A5</option>
                        <option value="A6">A6</option>
                        <option value="A7">A7</option>
                        <option value="A8">A8</option>
                        <option value="Allroad">Allroad</option>
                        <option value="Other">Other</option>
                        <option value="Q5">Q5</option>
                        <option value="Q7">Q7</option>
                        <option value="R8">R8</option>
                        <option value="RS6">RS6</option>
                        <option value="S4">S4</option>
                        <option value="S5">S5</option>
                        <option value="TT">TT</option>
                    </select>

                    <select name="44_model" id="" class="model selectBox-dropdown" style="display:none;">
                        <option value="44" selected="selected">All BMW Models</option>
                        <option value="1 M">1 M</option>
                        <option value="1 Series">1 Series</option>
                        <option value="116">116</option>
                        <option value="118">118</option>
                        <option value="3 Series">3 Series</option>
                        <option value="315">315</option>
                        <option value="316">316</option>
                        <option value="320">320</option>
                        <option value="328">328</option>
                        <option value="5 Series">5 Series</option>
                        <option value="520">520</option>
                        <option value="525">525</option>
                        <option value="530">530</option>
                        <option value="550">550</option>
                        <option value="6 Series">6 Series</option>
                        <option value="650">650</option>
                        <option value="7 Series">7 Series</option>
                        <option value="740">740</option>
                        <option value="750">750</option>
                        <option value="760">760</option>
                        <option value="850">850</option>
                        <option value="2000">2000</option>
                        <option value="M1">M1</option>
                        <option value="M3">M3</option>
                        <option value="M5">M5</option>
                        <option value="M6">M6</option>
                        <option value="Other">Other</option>
                        <option value="X3">X3</option>
                        <option value="X5">X5</option>
                        <option value="X5 M">X5 M</option>
                        <option value="X6">X6</option>
                        <option value="X6 M">X6 M</option>
                        <option value="Z3 M">Z3 M</option>
                        <option value="Z4">Z4</option>
                        <option value="Z4 M">Z4 M</option>
                        <option value="Z8">Z8</option>
                    </select>
                  
                    <select name="45_model" id="" class="model selectBox-dropdown" style="display:none;">
                        <option value="45" selected="selected">All Bentley Models</option>
                        <option value="Arnage">Arnage</option>
                        <option value="Azure">Azure</option>
                        <option value="Brooklands">Brooklands</option>
                        <option value="Continental">Continental</option>
                        <option value="Continental Flying Spur">Continental Flying Spur</option>
                        <option value="Continental Flying Spur Speed">Continental Flying Spur Speed</option>
                        <option value="Continental GT">Continental GT</option>
                        <option value="Continental GT Mulliner">Continental GT Mulliner</option>
                        <option value="Continental GT Speed">Continental GT Speed</option>
                        <option value="Continental GTC">Continental GTC</option>
                        <option value="Continental GTC 80-11 Edition">Continental GTC 80-11 Edition</option>
                        <option value="Continental GTC Mulliner">Continental GTC Mulliner</option>
                        <option value="Continental GTC Speed">Continental GTC Speed</option>
                        <option value="Continental R">Continental R</option>
                        <option value="Continental Supersports">Continental Supersports</option>
                        <option value="Continental T">Continental T</option>
                        <option value="Eight">Eight</option>
                        <option value="Mulsanne">Mulsanne</option>
                        <option value="R Type">R Type</option>
                        <option value="S1">S1</option>
                        <option value="Turbo R">Turbo R</option>
                        <option value="Turbo RT">Turbo RT</option>
					</select>
                  
                    <select name="1070_model" id="" class="model selectBox-dropdown" style="display:none;">
                        <option value="1070" selected="selected">All Bugatti Models</option>
                        <option value="EB 110">EB 110</option>
                        <option value="Type 73">Type 73</option>
                        <option value="Veyron">Veyron</option>
                        <option value="Veyron Grand Sport">Veyron Grand Sport</option>
                        <option value="Veyron Pur Sang">Veyron Pur Sang</option>
                        <option value="Veyron Sang Noir">Veyron Sang Noir</option>
                        <option value="Veyron Super Sport">Veyron Super Sport</option>
					</select>
                  
                    <select name="1069_model" id="" class="model selectBox-dropdown" style="display:none;">
                        <option value="1069" selected="selected">All Cadillac Models</option>
                        <option value="CTS">CTS</option>
                        <option value="Coupe de Ville">Coupe de Ville</option>
                        <option value="Deville">Deville</option>
                        <option value="Eldorado">Eldorado</option>
                        <option value="Escalade">Escalade</option>
                        <option value="Fleetwood">Fleetwood</option>
                        <option value="SRX">SRX</option>
                        <option value="STS">STS</option>
                        <option value="Series 62">Series 62</option>
					</select>
                  
                    <select name="1068_model" id="" class="model selectBox-dropdown" style="display:none;">
                        <option value="1068" selected="selected">All Corvette Models</option>
                        <option value="Series 62">C 1</option>
                        <option value="Series 62">C 2</option>
                        <option value="Series 62">C 3</option>
                        <option value="Series 62">C 6</option>
					</select>
                  
                    <select name="37_model" id="" class="model selectBox-dropdown" style="display:none;">
                        <option value="37" selected="selected">All Ferrari Models</option>
                        <option value="246">246</option>
                        <option value="250">250</option>
                        <option value="250">250</option>
                        <option value="308">308</option>
                        <option value="328">328</option>
                        <option value="348">348</option>
                        <option value="360 Modena">360 Modena</option>
                        <option value="360 Spider">360 Spider</option>
                        <option value="400">400</option>
                        <option value="430 Scuderia">430 Scuderia</option>
                        <option value="456">456</option>
                        <option value="458 Challenge">458 Challenge</option>
                        <option value="458 Italia">458 Italia</option>
                        <option value="458 Spider">458 Spider</option>
                        <option value="512">512</option>
                        <option value="550 Maranello">550 Maranello</option>
                        <option value="575M Maranello">575M Maranello</option>
                        <option value="575M Superamerica">575M Superamerica</option>
                        <option value="599 GTB Fiorano">599 GTB Fiorano</option>
                        <option value="599 GTO">599 GTO</option>
                        <option value="599XX">599XX</option>
                        <option value="612 Scaglietti">612 Scaglietti</option>
                        <option value="Berlinetta Boxer">Berlinetta Boxer</option>
                        <option value="California">California</option>
                        <option value="Enzo">Enzo</option>
                        <option value="F355">F355</option>
                        <option value="F355 Spider">F355 Spider</option>
                        <option value="F40">F40</option>
                        <option value="F430">F430</option>
                        <option value="F430 GTC">F430 GTC</option>
                        <option value="F430 Spider">F430 Spider</option>
                        <option value="F50">F50</option>
                        <option value="F70">F70</option>
                        <option value="FF">FF</option>
                        <option value="FXX">FXX</option>
                        <option value="Mondial">Mondial</option>
                        <option value="Other">Other</option>
                        <option value="Scuderia Spider 16M">Scuderia Spider 16M</option>
                        <option value="Testarossa">Testarossa</option>
					</select>
                  
                    <select name="1067_model" id="" class="model selectBox-dropdown" style="display:none;">
                        <option value="1067" selected="selected">All Fisker Models</option>
                        <option value="Karma" selected="selected">Karma</option>
					</select>
                  
                    <select name="1066_model" id="" class="model selectBox-dropdown" style="display:none;">
                        <option value="1066" selected="selected">All Hummer Models</option>
                        <option value="">All Models</option>
                        <option value="H1">H1</option>
                        <option value="H1 Alpha">H1 Alpha</option>
                        <option value="H2">H2</option>
                        <option value="H3">H3</option>
					</select>
                  
                    <select name="1065_model" id="" class="model selectBox-dropdown" style="display:none;">
                        <option value="1065" selected="selected">All Infiniti Models</option>
                        <option value="EX35">EX35</option>
                        <option value="G37">G37</option>
                        <option value="QX56">QX56</option>                        
                    </select>
                  
                    <select name="48_model" id="" class="model selectBox-dropdown" style="display:none;">
                        <option value="48" selected="selected">All Jaguar Models</option>
                        <option value="Daimler">Daimler</option>
                        <option value="E-Type">E-Type</option>
                        <option value="Mark 2">Mark 2</option>
                        <option value="Mark IX">Mark IX</option>
                        <option value="S-Type">S-Type</option>
                        <option value="XF">XF</option>
                        <option value="XFR">XFR</option>
                        <option value="XJ">XJ</option>
                        <option value="XJ12">XJ12</option>
                        <option value="XJ220">XJ220</option>
                        <option value="XJ6">XJ6</option>
                        <option value="XJ8">XJ8</option>
                        <option value="XJL">XJL</option>
                        <option value="XJR">XJR</option>
                        <option value="XJS">XJS</option>
                        <option value="XK">XK</option>
                        <option value="XK120">XK120</option>
                        <option value="XK150">XK150</option>
                        <option value="XK8">XK8</option>
                        <option value="XKE">XKE</option>
                        <option value="XKR">XKR</option>
					</select>
                  
                    <select name="46_model" id="" class="model selectBox-dropdown" style="display:none;">
                        <option value="46" selected="selected">All Lamborghini Models</option>
                        <option value="Aventador LP 700-4">Aventador LP 700-4</option>
                        <option value="Countach">Countach</option>
                        <option value="Diablo">Diablo</option>
                        <option value="Diablo GT">Diablo GT</option>
                        <option value="Diablo SE30">Diablo SE30</option>
                        <option value="Diablo SV">Diablo SV</option>
                        <option value="Diablo VT">Diablo VT</option>
                        <option value="Diablo VT 6.0 SE">Diablo VT 6.0 SE</option>
                        <option value="Diablo VT Roadster">Diablo VT Roadster</option>
                        <option value="Espada">Espada</option>
                        <option value="Gallardo">Gallardo</option>
                        <option value="Gallardo Bicolore">Gallardo Bicolore</option>
                        <option value="Gallardo LP 550-2 Valentino Balboni">Gallardo LP 550-2 Valentino Balboni</option>
                        <option value="Gallardo LP 560-4">Gallardo LP 560-4</option>
                        <option value="Gallardo LP 560-4 Spyder">Gallardo LP 560-4 Spyder</option>
                        <option value="Gallardo LP 570-4 Spyder Performante">Gallardo LP 570-4 Spyder Performante</option>
                        <option value="Gallardo LP 570-4 Super Trofeo Stradale">Gallardo LP 570-4 Super Trofeo Stradale</option>
                        <option value="Gallardo LP 570-4 Superleggera">Gallardo LP 570-4 Superleggera</option>
                        <option value="Gallardo Spyder">Gallardo Spyder</option>
                        <option value="Islero">Islero</option>
                        <option value="Jalpa">Jalpa</option>
                        <option value="Jarama">Jarama</option>
                        <option value="LM002">LM002</option>
                        <option value="Miura">Miura</option>
                        <option value="Murciélago">Murciélago</option>
                        <option value="Murciélago LP 640">Murciélago LP 640</option>
                        <option value="Murciélago LP 640 Versace">Murciélago LP 640 Versace</option>
                        <option value="Murciélago LP 670-4 SuperVeloce">Murciélago LP 670-4 SuperVeloce</option>
                        <option value="Reventón">Reventón</option>
                        <option value="Reventón Roadster">Reventón Roadster</option>
                        <option value="Urraco">Urraco</option>                        
					</select>
                  
                    <select name="42_model" id="" class="model selectBox-dropdown" style="display:none;">
                        <option value="42" selected="selected">All Land Rover Models</option>
                        <option value="Defender">Defender</option>
                        <option value="Discovery">Discovery</option>
                        <option value="LR3">LR3</option>
                        <option value="Range Rover">Range Rover</option>
                        <option value="Range Rover Evoque">Range Rover Evoque</option>
                        <option value="Range Rover Sport">Range Rover Sport</option>                  
					</select>
                  
                    <select name="1064_model" id="" class="model selectBox-dropdown" style="display:none;">
                        <option value="1064" selected="selected">All Lexus Models</option>
                        <option value="478">GS</option>
                        <option value="7503">GX 470</option>
                        <option value="15943">LFA</option>
                        <option value="8648">LS 460</option>
                        <option value="7502">LX 570</option>
                        <option value="6739">Other</option>
                        <option value="7534">SC 430</option>
					</select>
                  
                    <select name="1063_model" id="" class="model selectBox-dropdown" style="display:none;">
                        <option value="1063" selected="selected">All Lincoln Models</option>
                        <option value="Capri">Capri</option>
                        <option value="Continental">Continental</option>
                        <option value="Mark">Mark</option>
                        <option value="Premiere">Premiere</option>
                        <option value="Zephyr">Zephyr</option>
					</select>
                  
                    <select name="1062_model" id="" class="model selectBox-dropdown" style="display:none;">
                        <option value="1062" selected="selected">All Lotus Models</option>
                        <option value="2-Eleven">2-Eleven</option>
                        <option value="340R">340R</option>
                        <option value="Cortina">Cortina</option>
                        <option value="Elan">Elan</option>
                        <option value="Eleven">Eleven</option>
                        <option value="Elise">Elise</option>
                        <option value="Esprit">Esprit</option>
                        <option value="Europa">Europa</option>
                        <option value="Evora">Evora</option>
                        <option value="Evora S">Evora S</option>
                        <option value="Exige">Exige</option>
                        <option value="Seven">Seven</option>
					</select>
                  
                    <select name="38_model" id="" class="model selectBox-dropdown" style="display:none;">
                        <option value="38" selected="selected">All Maserati Models</option>
                        <option value="3500 GT">3500 GT</option>
                        <option value="Bora">Bora</option>
                        <option value="Coupe">Coupe</option>
                        <option value="GT">GT</option>
                        <option value="GT-S">GT-S</option>
                        <option value="Ghibli">Ghibli</option>
                        <option value="GranCabrio">GranCabrio</option>
                        <option value="GranTurismo">GranTurismo</option>
                        <option value="GranTurismo MC Stradale">GranTurismo MC Stradale</option>
                        <option value="GranTurismo S">GranTurismo S</option>
                        <option value="MC12">MC12</option>
                        <option value="MC12 Corsa">MC12 Corsa</option>
                        <option value="Merak">Merak</option>
                        <option value="Mexico">Mexico</option>
                        <option value="Mistral">Mistral</option>
                        <option value="Quattroporte">Quattroporte</option>
                        <option value="Quattroporte S">Quattroporte S</option>
                        <option value="Quattroporte Sport GT S">Quattroporte Sport GT S</option>                  
                    </select>
                  
                    <select name="47_model" id="" class="model selectBox-dropdown" style="display:none;">
                        <option value="47" selected="selected">All Maybach Models</option>
						<option value="57">57</option>
                        <option value="57S">57S</option>
                        <option value="62">62</option>
                        <option value="62S">62S</option>
                        <option value="62S Landaulet">62S Landaulet</option
                        ><option value="Guard">Guard</option>                  
                    </select>
                  
                    <select name="1061_model" id="" class="model selectBox-dropdown" style="display:none;">
                        <option value="1061" selected="selected">All McLaren Models</option>
						<option value="576">F1</option>
                        <option value="13931">MP4-12C</option>
					</select>
                  
                    <select name="40_model" id="" class="model selectBox-dropdown" style="display:none;">
                        <option value="40" selected="selected">All Mercedes-Benz Models</option>
                        <option value="170">170</option>
                        <option value="190">190</option>
                        <option value="220">220</option>
                        <option value="230">230</option>
                        <option value="240">240</option>
                        <option value="250">250</option>
                        <option value="280">280</option>
                        <option value="300">300</option>
                        <option value="350">350</option>
                        <option value="380">380</option>
                        <option value="450">450</option>
                        <option value="500">500</option>
                        <option value="560">560</option>
                        <option value="600">600</option>
                        <option value="C 350">C 350</option>
                        <option value="C 63 AMG">C 63 AMG</option>
                        <option value="C-Class">C-Class</option>
                        <option value="CL 500">CL 500</option>
                        <option value="CL 63 AMG">CL 63 AMG</option>
                        <option value="CL 65 AMG">CL 65 AMG</option>
                        <option value="CL-Class">CL-Class</option>
                        <option value="CLK 350">CLK 350</option>
                        <option value="CLK 63 AMG">CLK 63 AMG</option>
                        <option value="CLS 63 AMG">CLS 63 AMG</option>
                        <option value="CLS-Class">CLS-Class</option>
                        <option value="E 250">E 250</option>
                        <option value="E 350">E 350</option>
                        <option value="E 500">E 500</option>
                        <option value="E 55">E 55</option>
                        <option value="E-Class">E-Class</option>
                        <option value="G 320">G 320</option>
                        <option value="G 500">G 500</option>
                        <option value="G 55 AMG">G 55 AMG</option>
                        <option value="G 63 AMG">G 63 AMG</option>
                        <option value="G 65 AMG">G 65 AMG</option>
                        <option value="G-Class">G-Class</option>
                        <option value="GL 450">GL 450</option>
                        <option value="GL 500">GL 500</option>
                        <option value="GL-Class">GL-Class</option>
                        <option value="M-Class">M-Class</option>
                        <option value="ML 230">ML 230</option>
                        <option value="ML 350">ML 350</option>
                        <option value="ML 500">ML 500</option>
                        <option value="ML 63 AMG">ML 63 AMG</option>
                        <option value="S 350">S 350</option>
                        <option value="S 450">S 450</option>
                        <option value="S 500">S 500</option>
                        <option value="S 550">S 550</option>
                        <option value="S 600">S 600</option>
                        <option value="S 63 AMG">S 63 AMG</option>
                        <option value="S 65 AMG">S 65 AMG</option>
                        <option value="S-Class">S-Class</option>
                        <option value="SL 280">SL 280</option>
                        <option value="SL 300">SL 300</option>
                        <option value="SL 320">SL 320</option>
                        <option value="SL 380">SL 380</option>
                        <option value="SL 450">SL 450</option>
                        <option value="SL 500">SL 500</option>
                        <option value="SL 55 AMG">SL 55 AMG</option>
                        <option value="SL 550">SL 550</option>
                        <option value="SL 600">SL 600</option>
                        <option value="SL 63 AMG">SL 63 AMG</option>
                        <option value="SL 65 AMG">SL 65 AMG</option>
                        <option value="SL 73 AMG">SL 73 AMG</option>
                        <option value="SL-Class">SL-Class</option>
                        <option value="SLK 200">SLK 200</option>
                        <option value="SLK 350">SLK 350</option>
                        <option value="SLR McLaren">SLR McLaren</option>
                        <option value="SLR McLaren 722 Edition">SLR McLaren 722 Edition</option>
                        <option value="SLR McLaren Roadster">SLR McLaren Roadster</option>
                        <option value="SLR McLaren Roadster 722 S">SLR McLaren Roadster 722 S</option>
                        <option value="SLR McLaren Stirling Moss">SLR McLaren Stirling Moss</option>
                        <option value="SLS AMG">SLS AMG</option>
                        <option value="Sprinter">Sprinter</option>
						<option value="Viano">Viano</option>                        
					</select>
                  
                    <select name="41_model" id="" class="model selectBox-dropdown" style="display:none;">
                        <option value="41" selected="selected">All Porsche Models</option>
                        <option value="356">356</option>
                        <option value="550">550</option>
                        <option value="911">911</option>
                        <option value="911 Carrera">911 Carrera</option>
                        <option value="911 Carrera 2S">911 Carrera 2S</option>
                        <option value="911 Carrera S">911 Carrera S</option>
                        <option value="911 GT2">911 GT2</option>
                        <option value="911 GT2 RS">911 GT2 RS</option>
                        <option value="911 GT3">911 GT3</option>
                        <option value="911 GT3 RS">911 GT3 RS</option>
                        <option value="911 Targa">911 Targa</option>
                        <option value="911 Turbo">911 Turbo</option>
                        <option value="911 Turbo S">911 Turbo S</option>
                        <option value="912">912</option>
                        <option value="914">914</option>
                        <option value="924">924</option>
                        <option value="928">928</option>
                        <option value="930">930</option>
                        <option value="944">944</option>
                        <option value="968">968</option>
                        <option value="Boxster">Boxster</option>
                        <option value="Carrera GT">Carrera GT</option>
                        <option value="Cayenne">Cayenne</option>
                        <option value="Cayman">Cayman</option>
                        <option value="Panamera">Panamera</option>                 
                    </select>
                  
                    <select name="39_model" id="" class="model selectBox-dropdown" style="display:none;">
                        <option value="39" selected="selected">All Rolls Royce Models</option>
                        <option value="25/30">25/30</option>
                        <option value="Corniche">Corniche</option>
                        <option value="Corniche II">Corniche II</option>
                        <option value="Corniche IV">Corniche IV</option>
                        <option value="Ghost">Ghost</option>
                        <option value="Phantom">Phantom</option>
                        <option value="Phantom Coupe">Phantom Coupe</option>
                        <option value="Phantom Drophead Coupe">Phantom Drophead Coupe</option>
                        <option value="Phantom II">Phantom II</option>
                        <option value="Phantom III">Phantom III</option>
                        <option value="Phantom V">Phantom V</option>
                        <option value="Phantom VI">Phantom VI</option>
                        <option value="Silver Cloud">Silver Cloud</option>
                        <option value="Silver Dawn">Silver Dawn</option>
                        <option value="Silver Ghost">Silver Ghost</option>
                        <option value="Silver Seraph">Silver Seraph</option>
                        <option value="Silver Shadow">Silver Shadow</option>
                        <option value="Silver Spirit">Silver Spirit</option>
                        <option value="Silver Spur">Silver Spur</option>
                        <option value="Silver Wraith">Silver Wraith</option>
					</select>
                  
                    <select name="1060_model" id="" class="model selectBox-dropdown" style="display:none;">
                        <option value="1060" selected="selected">All Shelby Models</option>
                        <option value="Cobra">Cobra</option>
                        <option value="GT350">GT350</option>
                        <option value="GT500">GT500</option>
					</select>
                  
                    <select name="1059_model" id="" class="model selectBox-dropdown" style="display:none;">
                        <option value="1059" selected="selected">All Tesla Models</option>
                        <option value="Model S">Model S</option>
                        <option value="Roadster">Roadster</option>
					</select>
                  
                    <select name="1058_model" id="" class="model selectBox-dropdown" style="display:none;">
                        <option value="1058" selected="selected">All Specialty Models</option>
					</select>
                  
                    <select name="1057_model" id="" class="model selectBox-dropdown" style="display:none;">
                        <option value="1057" selected="selected">All Vintage Models</option>
					</select>
                  
                    <select name="79_model" id="" class="model selectBox-dropdown" style="display:none;">
                        <option value="79" selected="selected">All Classic Cars</option>
					</select>
                  
                    <select name="1056_model" id="" class="model selectBox-dropdown" style="display:none;">
                        <option value="1056" selected="selected">All Muscle Cars</option>
					</select>
                  
                    <select name="80_model" id="" class="model selectBox-dropdown" style="display:none;">
                        <option value="80" selected="selected">All Hot Rods Models</option>
					</select>
                  
                    <select name="1055_model" id="" class="model selectBox-dropdown" style="display:none;">
                        <option value="1055" selected="selected">All Armored Vehicles</option>
					</select>
                  
                    <select name="1054_model" id="" class="model selectBox-dropdown" style="display:none;">
                        <option value="1054" selected="selected">All Alternative Fuel Vehicles</option>
					</select>
                    
                    <select name="1053_model" id="" class="model selectBox-dropdown" style="display:none;">
                        <option value="1053" selected="selected">All Racing Cars</option>
					</select>
                  
                    <select name="1052_model" id="" class="model selectBox-dropdown" style="display:none;">
                        <option value="1052" selected="selected">All Golf Carts</option>
					</select>
                  
                    <select name="50_model" id="" class="model selectBox-dropdown" style="display:none;">
                        <option value="50" selected="selected">All Other Vehicles</option>
					</select>
                  
					<input name="s" type="text" id="s" tabindex="1" class="editbox_search ui-autocomplete-input" value="Keyword" onfocus="if (this.value == 'Keyword') {this.value = '';}" autocomplete="off" role="textbox" aria-autocomplete="list" aria-haspopup="true">
					<button type="button" value="Search" class="search_button">Search</button>
                </form>
                <p class="view_all"><a href="http://www.jetsetmag.com/classifieds/ad-category/luxury-autos/#nav2">View All Listings</a></p>
                <p class="pop_search"><span> Popular Searches</span> <a href="http://www.jetsetmag.com/classifieds/?s=What+are+you+looking+for%3F&sa=search&cat=45" >Bentley</a> <a href="http://www.jetsetmag.com/classifieds/?s=What+are+you+looking+for%3F&sa=search&cat=39" >Rolls Royce</a> <a href="http://www.jetsetmag.com/classifieds/?s=What+are+you+looking+for%3F&sa=search&cat=37" >Ferrari</a> <a href="http://www.jetsetmag.com/classifieds/?s=What+are+you+looking+for%3F&sa=search&cat=79" >Classic Cars</a> </p>
			</div><!-- End Automobiles -->

			<!-- Begin Lifestyle -->
			<div style="display:none;" data-tag="2736" class="article_contain">
                <p><span>Luxury Lifestyle Products For Sale</span></p>
				<form action="" method="" id="" class="category_search_form">
                	<select name="cat" id="main-form-select-brand" class="brand selectBox-dropdown">
                        <option value="main">All Categories</option>
                        <option value="59">Private Jets</option>
                        <option value="25">Helicopters</option>
                        <option value="134">Art &amp; Collectibles</option>
                        <option value="12">Automobiles</option>
                        <option value="2736" selected="selected">Lifestyle</option>
                        <option value="22">Motorcycles</option>
						<option value="13">Real Estate</option>
                        <option value="2737">Travel &amp; Excursions</option>
						<option value="17">Watches &amp; Jewelry</option>
                        <option value="18">Yachts</option>
                    </select>
				</form>

                <form action="" method="" id="lifestyle-search-form" class="search_form">
					<select name="cat" id="lifestyle-form-select-brand" class="brand selectBox-dropdown">
                        <option value="2736" selected="selected">All Lifestyle Services</option>
                        <option value="2738">Auctions</option>
                        <option value="2757">Events</option>
                        <option value="2765">Exclusive Products</option>
                        <option value="2766">Exclusive Services</option>
                        <option value="2739">Fashion</option>
                        <option value="2764">Outdoors Products</option>
					</select>
                    
					<select name="2739_model" id="" class="model selectBox-dropdown">
                        <option value="2739" selected="selected">All Fashion Products</option>
                        <option value="Calvin Klein">Calvin Klein</option>
                        <option value="Chanel">Chanel</option>
                        <option value="Dior">Dior</option>
                        <option value="Dolce and Gabbana">Dolce &amp; Gabbana</option>
                        <option value="Giorgio Armani">Giorgio Armani</option>
                        <option value="Gucci">Gucci</option>
                        <option value="Hermes Paris">Hermes Paris</option>
                        <option value="Hugo Boss">Hugo Boss</option> 
                        <option value="Louis Vuitton">Louis Vuitton</option>
                        <option value="Marc Jacobs">Marc Jacobs</option>
                        <option value="Prada">Prada</option>
                        <option value="Ralph Lauren">Ralph Lauren</option>
                        <option value="Steffano Ricci">Steffano Ricci</option>
                        <option value="Tiffany and Co">Tiffany &amp; Co</option>
                        <option value="Thomas Dean">Thomas Dean</option>
                        <option value="Vacheron">Vacheron</option>
                        <option value="Versache">Versache</option>
					</select>
                                     
                  	<input name="s" type="text" id="s" tabindex="1" class="editbox_search ui-autocomplete-input" value="Keyword" onfocus="if (this.value == 'Keyword') {this.value = '';}" autocomplete="off" role="textbox" aria-autocomplete="list" aria-haspopup="true">
                  	<button type="button" value="Search" class="search_button">Search</button>
                </form>
                <p class="view_all"><a href="http://www.jetsetmag.com/classifieds/ad-category/lifestyle-2/#nav2">View All Listings</a></p>
                <p class="pop_search"><span>Popular Searches</span><a href="http://www.jetsetmag.com/classifieds/?s=Outdoors&sa=search&cat=2764" >Outdoors Products</a> <a href="http://www.jetsetmag.com/classifieds/?s=Thomas+Dean&sa=search&cat=2749" >Thomas Dean</a><a href="http://www.jetsetmag.com/classifieds/?s=Fashion&sa=search&cat=2739" >Fashion</a><a href="http://www.jetsetmag.com/classifieds/?s=Exclusive+Products&sa=search&cat=2765" >Exclusive Products</a></p>
			</div><!-- End Lifestyle -->
            
            <!-- Begin Motorcycles --> 
			<div style="display:none;" data-tag="22" class="article_contain">
				<p><span>Motorcycles For Sale</span></p>
                <form action="" method="" id="" class="category_search_form">
                	<select name="cat" id="main-form-select-brand" class="brand selectBox-dropdown">
                        <option value="main">All Categories</option>
                        <option value="59">Private Jets</option>
                        <option value="25">Helicopters</option>
                        <option value="134">Art &amp; Collectibles</option>
                        <option value="12">Automobiles</option>
                        <option value="2736">Lifestyle</option>
                        <option value="22" selected="selected">Motorcycles</option>
						<option value="13">Real Estate</option>
                        <option value="2737">Travel &amp; Excursions</option>
						<option value="17">Watches &amp; Jewelry</option>
                        <option value="18">Yachts</option>
                    </select>
				</form>
                
                <form action="" method="" id="motorcycles-search-form" class="search_form">
			   		<select name="cat" id="motorcycles-form-select-brand" class="brand selectBox-dropdown">
						<option value="22" selected="selected">All Motorcycles</option>
                        <!-- <option value="*" selected="selected">All Makes</option> -->
                        <!-- <option value="Arlen Ness">Arlen Ness</option>
                        <option value="BMW">BMW</option>
                        <option value="BSA">BSA</option>
                        <option value="Benelli">Benelli</option>
                        <option value="Big Dog">Big Dog</option>
                        <option value="Bimota">Bimota</option>
                        <option value="Bourget">Bourget</option>
                        <option value="Can-Am">Can-Am</option>
                        <option value="Custom Built">Custom Built</option>
                        <option value="Ducati">Ducati</option>
                        <option value="GG">GG</option>
                        <option value="Gilera">Gilera</option>
                        <option value="Harley-Davidson">Harley-Davidson</option>
                        <option value="Honda">Honda</option>
                        <option value="Jawa">Jawa</option>
                        <option value="Kreidler">Kreidler</option>
                        <option value="MV Agusta">MV Agusta</option>
                        <option value="Matchless">Matchless</option>
                        <option value="Mondial">Mondial</option>
                        <option value="Moto Morini">Moto Morini</option>
                        <option value="Norton">Norton</option>
                        <option value="Royal Enfield">Royal Enfield</option>
                        <option value="Triumph">Triumph</option>
                        <option value="Victory">Victory</option> -->
					</select>
                    
					<input name="s" type="text" id="s" tabindex="1" class="editbox_search ui-autocomplete-input" value="Keyword" onfocus="if (this.value == 'Keyword') {this.value = '';}" autocomplete="off" role="textbox" aria-autocomplete="list" aria-haspopup="true">
					<button type="button" value="Search" class="search_button">Search</button>
                </form>
                <p class="view_all"><a href="http://www.jetsetmag.com/classifieds/ad-category/motorcycles/#nav2">View All Listings</a></p>
                <p class="pop_search"><span>Popular Searches</span> <a href="http://www.jetsetmag.com/classifieds/ad-category/motorcycles/#nav2" >Motorcycle</a> <a href="http://www.jetsetmag.com/classifieds/ad-category/motorcycles/#nav2" >Luxury Bike</a> <a href="http://www.jetsetmag.com/classifieds/?s=chopper+&sa=search&cat=22" >Chopper</a> <a href="http://www.jetsetmag.com/classifieds/?s=best+bmw&sa=search&cat=22" >Best BMW</a></p>
			</div><!-- End Motorcycles --> 
            
            <!-- Begin Real Estate --> 
			<div style="display:none;" data-tag="13" class="article_contain">
				<p><span>Real Estate For Sale</span></p>
                <form action="" method="" id="" class="category_search_form">
                	<select name="cat" id="main-form-select-brand" class="brand selectBox-dropdown">
						<option value="main">All Categories</option>
                        <option value="59">Private Jets</option>
                        <option value="25">Helicopters</option>
                        <option value="134">Art &amp; Collectibles</option>
                        <option value="12">Automobiles</option>
                        <option value="2736">Lifestyle</option>
                        <option value="22">Motorcycles</option>
						<option value="13" selected="selected">Real Estate</option>
                        <option value="2737">Travel &amp; Excursions</option>
						<option value="17">Watches &amp; Jewelry</option>
                        <option value="18">Yachts</option>
                    </select>
				</form>
                
                <form action="" method="post" id="art-search-form" class="search_form">
					<select name="cat" id="re-form-select-brand" class="brand selectBox-dropdown">
                        <option value="13" selected="selected">All Property Types</option>
                        <option value="1157">Investment Property</option>
                        <option value="1155">Luxury Estates</option>
                        <option value="1148">Ranch Property</option>
                        <option value="1156">Recreational Property</option>
                        <option value="15">Vacation Rentals</option>
					</select>
				</form>
                  
				<form action="" method="" id="" class="search_form">
                	<select name="loc" id="" class="brand selectBox-dropdown">
						<option value="13" selected="selected">All Locations</option>
                        <option value="United States">United States</option>
                        <option value="Alabama">Alabama</option>
                        <option value="Alaska">Alaska</option>
                        <option value="Arizona">Arizona</option>
                        <option value="Arkansas">Arkansas</option>
                        <option value="California">California</option>
                        <option value="Colorado">Colorado</option>
                        <option value="Connecticut">Connecticut</option>
                        <option value="Delaware">Delaware</option>
                        <option value="District of Columbia">District of Columbia</option>
                        <option value="Florida">Florida</option>
                        <option value="Georgia">Georgia</option>
                        <option value="Hawaii">Hawaii</option>
                        <option value="Idaho">Idaho</option>
                        <option value="Illinois">Illinois</option>
                        <option value="Indiana">Indiana</option>
                        <option value="Iowa">Iowa</option>
                        <option value="Kansas">Kansas</option>
                        <option value="Kentucky">Kentucky</option>
                        <option value="Louisiana">Louisiana</option>
                        <option value="Maine">Maine</option>
                        <option value="Maryland">Maryland</option>
                        <option value="Massachusetts">Massachusetts</option>
                        <option value="Michigan">Michigan</option>
                        <option value="Minnesota">Minnesota</option>
                        <option value="Mississippi">Mississippi</option>
                        <option value="Missouri">Missouri</option>
                        <option value="Montana">Montana</option>
                        <option value="Nebraska">Nebraska</option>
                        <option value="Nevada">Nevada</option>
                        <option value="New Hampshire">New Hampshire</option>
                        <option value="New Jersey">New Jersey</option>
                        <option value="New Mexico">New Mexico</option>
                        <option value="New York">New York</option>
                        <option value="North Carolina">North Carolina</option>
                        <option value="North Dakota">North Dakota</option>
                        <option value="Ohio">Ohio</option>
                        <option value="Oklahoma">Oklahoma</option>
                        <option value="Oregon">Oregon</option>
                        <option value="Pennsylvania">Pennsylvania</option>
                        <option value="Rhode Island">Rhode Island</option>
                        <option value="South Carolina">South Carolina</option>
                        <option value="South Dakota">South Dakota</option>
                        <option value="Tennessee">Tennessee</option>
                        <option value="Texas">Texas</option>
                        <option value="Utah">Utah</option>
                        <option value="Vermont">Vermont</option>
                        <option value="Virginia">Virginia</option>
                        <option value="Washington">Washington</option>
                        <option value="West Virginia">West Virginia</option>
                        <option value="Wisconsin">Wisconsin</option>
                        <option value="Wyoming">Wyoming</option>
                        <option value="13">------</option>
                        <option Value="Albania">Albania</option>
                        <option Value="Algeria">Algeria</option>
                        <option Value="American Samoa">American Samoa</option>
                        <option Value="Andorra">Andorra</option>
                        <option Value="Angola">Angola</option>
                        <option Value="Anguilla">Anguilla</option>
                        <option Value="Antarctica">Antarctica</option>
                        <option Value="Antigua And Barbuda">Antigua And Barbuda</option>
                        <option Value="Argentina">Argentina</option>
                        <option Value="Armenia">Armenia</option>
                        <option Value="Aruba">Aruba</option>
                        <option Value="Australia">Australia</option>
                        <option Value="Austria">Austria</option>
                        <option Value="Azerbaijan">Azerbaijan</option>
                        <option Value="Bahamas">Bahamas</option>
                        <option Value="Bahrain">Bahrain</option>
                        <option Value="Bangladesh">Bangladesh</option>
                        <option Value="Barbados">Barbados</option>
                        <option Value="Belarus">Belarus</option>
                        <option Value="Belgium">Belgium</option>
                        <option Value="Belize">Belize</option>
                        <option Value="Benin">Benin</option>
                        <option Value="Bermuda">Bermuda</option>
                        <option Value="Bhutan">Bhutan</option>
                        <option Value="Bolivia">Bolivia</option>
                        <option Value="Botswana">Botswana</option>
                        <option Value="Bouvet Island">Bouvet Island</option>
                        <option Value="Brazil">Brazil</option>
                        <option Value="British Columbia">British Columbia</option>
                        <option Value="Brunei Darussalam">Brunei Darussalam</option>
                        <option Value="Bulgaria">Bulgaria</option>
                        <option Value="Burkina Faso">Burkina Faso</option>
                        <option Value="Burundi">Burundi</option>
                        <option Value="Cambodia">Cambodia</option>
                        <option Value="Cameroon">Cameroon</option>
                        <option Value="Canada">Canada</option>
                        <option Value="Cape Verde">Cape Verde</option>
                        <option Value="Cayman Islands">Cayman Islands</option>
                        <option Value="Chad">Chad</option>
                        <option Value="Chile">Chile</option>
                        <option Value="China">China</option>
                        <option Value="Christmas Island">Christmas Island</option>
                        <option Value="Colombia">Colombia</option>
                        <option Value="Comoros">Comoros</option>
                        <option Value="Congo">Congo</option>
                        <option Value="Cook Islands">Cook Islands</option>
                        <option Value="Costa Rica">Costa Rica</option>
                        <option Value="Cote D'Ivoire">Cote D'Ivoire</option>
                        <option Value="Croatia">Croatia</option>
                        <option Value="Cuba">Cuba</option>
                        <option Value="Cyprus">Cyprus</option>
                        <option Value="Czech Republic">Czech Republic</option>
                        <option Value="Denmark">Denmark</option>
                        <option Value="Djibouti">Djibouti</option>
                        <option Value="Dominica">Dominica</option>
                        <option Value="Dominican Republic">Dominican Republic</option>
                        <option Value="East Timor">East Timor</option>
                        <option Value="Ecuador">Ecuador</option>
                        <option Value="Egypt">Egypt</option>
                        <option Value="El Salvador">El Salvador</option>
                        <option Value="Equatorial Guinea">Equatorial Guinea</option>
                        <option Value="Eritrea">Eritrea</option>
                        <option Value="Estonia">Estonia</option>
                        <option Value="Ethiopia">Ethiopia</option>
                        <option Value="Falkland Islands">Falkland Islands</option>
                        <option Value="Faroe Islands">Faroe Islands</option>
                        <option Value="Fiji">Fiji</option>
                        <option Value="Finland">Finland</option>
                        <option Value="France">France</option>
                        <option Value="French Guiana">French Guiana</option>
                        <option Value="French Polynesia">French Polynesia</option>
                        <option Value="French Southern Territories">French Southern Territories</option>
                        <option Value="Gabon">Gabon</option>
                        <option Value="Gambia">Gambia</option>
                        <option Value="Georgia">Georgia</option>
                        <option Value="Germany">Germany</option>
                        <option Value="Ghana">Ghana</option>
                        <option Value="Gibraltar">Gibraltar</option>
                        <option Value="Greece">Greece</option>
                        <option Value="Greenland">Greenland</option>
                        <option Value="Grenada">Grenada</option>
                        <option Value="Guadeloupe">Guadeloupe</option>
                        <option Value="Guam">Guam</option>
                        <option Value="Guatemala">Guatemala</option>
                        <option Value="Guinea">Guinea</option>
                        <option Value="Guinea-Bissau">Guinea-Bissau</option>
                        <option Value="Guyana">Guyana</option>
                        <option Value="Haiti">Haiti</option>
                        <option Value="Heard And Mc Donald Islands">Heard And Mc Donald Islands</option>
                        <option Value="Honduras">Honduras</option>
                        <option Value="Hong Kong">Hong Kong</option>
                        <option Value="Hungary">Hungary</option>
                        <option Value="Iceland">Iceland</option>
                        <option Value="India">India</option>
                        <option Value="Indonesia">Indonesia</option>
                        <option Value="Ireland">Ireland</option>
                        <option Value="Israel">Israel</option>
                        <option Value="Italy">Italy</option>
                        <option Value="Jamaica">Jamaica</option>
                        <option Value="Japan">Japan</option>
                        <option Value="Jordan">Jordan</option>
                        <option Value="Kazakhstan">Kazakhstan</option>
                        <option Value="Kenya">Kenya</option>
                        <option Value="Kiribati">Kiribati</option>
                        <option Value="Korea">Korea</option>
                        <option Value="Kuwait">Kuwait</option>
                        <option Value="Kyrgyzstan">Kyrgyzstan</option>
                        <option Value="Latvia">Latvia</option>
                        <option Value="Lebanon">Lebanon</option>
                        <option Value="Lesotho">Lesotho</option>
                        <option Value="Liberia">Liberia</option>
                        <option Value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                        <option Value="Liechtenstein">Liechtenstein</option>
                        <option Value="Lithuania">Lithuania</option>
                        <option Value="Luxembourg">Luxembourg</option>
                        <option Value="Macau">Macau</option>
                        <option Value="Macedonia">Macedonia</option>
                        <option Value="Madagascar">Madagascar</option>
                        <option Value="Malawi">Malawi</option>
                        <option Value="Malaysia">Malaysia</option>
                        <option Value="Maldives">Maldives</option>
                        <option Value="Mali">Mali</option>
                        <option Value="Malta">Malta</option>
                        <option Value="Marshall Islands">Marshall Islands</option>
                        <option Value="Martinique">Martinique</option>
                        <option Value="Mauritania">Mauritania</option>
                        <option Value="Mauritius">Mauritius</option>
                        <option Value="Mayotte">Mayotte</option>
                        <option Value="Mexico">Mexico</option>
                        <option Value="Micronesia">Micronesia</option>
                        <option Value="Moldova">Moldova</option>
                        <option Value="Monaco">Monaco</option>
                        <option Value="Mongolia">Mongolia</option>
                        <option Value="Montserrat">Montserrat</option>
                        <option Value="Morocco">Morocco</option>
                        <option Value="Mozambique">Mozambique</option>
                        <option Value="Myanmar">Myanmar</option>
                        <option Value="Namibia">Namibia</option>
                        <option Value="Nauru">Nauru</option>
                        <option Value="Nepal">Nepal</option>
                        <option Value="Netherlands">Netherlands</option>
                        <option Value="Netherlands Ant Illes">Netherlands Ant Illes</option>
                        <option Value="New Caledonia">New Caledonia</option>
                        <option Value="New Zealand">New Zealand</option>
                        <option Value="Nicaragua">Nicaragua</option>
                        <option Value="Niger">Niger</option>
                        <option Value="Nigeria">Nigeria</option>
                        <option Value="Niue">Niue</option>
                        <option Value="Norfolk Island">Norfolk Island</option>
                        <option Value="Northern Mariana Islands">Northern Mariana Islands</option>
                        <option Value="Norway">Norway</option>
                        <option Value="Oman">Oman</option>
                        <option Value="Pakistan">Pakistan</option>
                        <option Value="Palau">Palau</option>
                        <option Value="Panama">Panama</option>
                        <option Value="Papua New Guinea">Papua New Guinea</option>
                        <option Value="Paraguay">Paraguay</option>
                        <option Value="Peru">Peru</option>
                        <option Value="Philippines">Philippines</option>
                        <option Value="Pitcairn">Pitcairn</option>
                        <option Value="Poland">Poland</option>
                        <option Value="Portugal">Portugal</option>
                        <option Value="Puerto Rico">Puerto Rico</option>
                        <option Value="Qatar">Qatar</option>
                        <option Value="Reunion">Reunion</option>
                        <option Value="Romania">Romania</option>
                        <option Value="Russia">Russia</option>
                        <option Value="Rwanda">Rwanda</option>
                        <option Value="Saint K Itts And Nevis">Saint K Itts And Nevis</option>
                        <option Value="Saint Lucia">Saint Lucia</option>
                        <option Value="Saint Vincent">Saint Vincent</option>
                        <option Value="Samoa">Samoa</option>
                        <option Value="San Marino">San Marino</option>
                        <option Value="Sao Tome And Principe">Sao Tome And Principe</option>
                        <option Value="Saudi Arabia">Saudi Arabia</option>
                        <option Value="Senegal">Senegal</option>
                        <option Value="Seychelles">Seychelles</option>
                        <option Value="Sierra Leone">Sierra Leone</option>
                        <option Value="Singapore">Singapore</option>
                        <option Value="Slovakia">Slovakia</option>
                        <option Value="Slovenia">Slovenia</option>
                        <option Value="Solomon Islands">Solomon Islands</option>
                        <option Value="Somalia">Somalia</option>
                        <option Value="South Africa">South Africa</option>
                        <option Value="Spain">Spain</option>
                        <option Value="Sri Lanka">Sri Lanka</option>
                        <option Value="St. Helena">St. Helena</option>
                        <option Value="St. Pierre And Miquelon">St. Pierre And Miquelon</option>
                        <option Value="Sudan">Sudan</option>
                        <option Value="Suriname">Suriname</option>
                        <option Value="Svalbard">Svalbard, Jan Mayen Islands</option>
                        <option Value="Swaziland">Swaziland</option>
                        <option Value="Sweden">Sweden</option>
                        <option Value="Switzerland">Switzerland</option>
                        <option Value="Syria">Syria</option>
                        <option Value="Taiwan">Taiwan</option>
                        <option Value="Tajikistan">Tajikistan</option>
                        <option Value="Tanzania">Tanzania</option>
                        <option Value="Thailand">Thailand</option>
                        <option Value="Togo">Togo</option>
                        <option Value="Tokelau">Tokelau</option>
                        <option Value="Tonga">Tonga</option>
                        <option Value="Trinidad And Tobago">Trinidad And Tobago</option>
                        <option Value="Tunisia">Tunisia</option>
                        <option Value="Turkey">Turkey</option>
                        <option Value="Turkmenistan">Turkmenistan</option>
                        <option Value="Turks And Caicos">Turks And Caicos</option>
                        <option Value="Tuvalu">Tuvalu</option>
                        <option Value="Uganda">Uganda</option>
                        <option Value="Ukraine">Ukraine</option>
                        <option Value="United Arab Emirates">United Arab Emirates</option>
                        <option Value="United Kingdom">United Kingdom</option>
                        <option Value="Uruguay">Uruguay</option>
                        <option Value="Uzbekistan">Uzbekistan</option>
                        <option Value="Vanuatu">Vanuatu</option>
                        <option Value="Vatican City">Vatican City</option>
                        <option Value="Venezuela">Venezuela</option>
                        <option Value="Vietnam">Vietnam</option>
                        <option Value="British Virgin Islands">Virgin Islands - British</option>
                        <option Value="U.S. Virgin Islands">Virgin Islands - U.S.</option>
                        <option Value="Wallis And Futuna Islands">Wallis And Futuna Islands</option>
                        <option Value="Western Sahara">Western Sahara</option>
                        <option Value="Yemen">Yemen</option>
                        <option Value="Zaire">Zaire</option>
                        <option Value="Zambia">Zambia</option>
						<option Value="Zimbabwe">Zimbabwe</option>
                    </select>

					<input name="s" type="text" id="s" tabindex="1" class="editbox_search ui-autocomplete-input" value="Keyword" onfocus="if (this.value == 'Keyword') {this.value = '';}" autocomplete="off" role="textbox" aria-autocomplete="list" aria-haspopup="true">
					<button type="button" value="Search" class="search_button">Search</button>
                </form>
                <p class="view_all"><a href="http://www.jetsetmag.com/classifieds/ad-category/luxury-real-estate/#nav2">View All Listings</a></p>
                <p class="pop_search"><span>Popular Searches</span> <a href="http://www.jetsetmag.com/classifieds/?s=income&sa=search&cat=13" >Income Property</a> <a href="http://www.jetsetmag.com/classifieds/?s=land+investment&sa=search&cat=13" >Land Investments</a> <a href="http://www.jetsetmag.com/classifieds/?s=agricultural&sa=search&cat=13" >Agricultural</a> <a href="http://www.jetsetmag.com/classifieds/?s=What+are+you+looking+for%3F&sa=search&cat=1155" >Luxury Estates</a></p>
			</div><!-- End Real Estate -->
            
            <!-- Begin Travel and Excursions --> 
			<div style="display:none;" data-tag="2737" class="article_contain">
                <p><span>Travel &amp; Excursion Services</span></p>
                <form action="" method="" id="" class="category_search_form">
                	<select name="cat" id="main-form-select-brand" class="brand selectBox-dropdown">       
                        <option value="main">All Categories</option>
                        <option value="59">Private Jets</option>
                        <option value="25">Helicopters</option>
                        <option value="134">Art &amp; Collectibles</option>
                        <option value="12">Automobiles</option>
                        <option value="2736">Lifestyle</option>
                        <option value="22">Motorcycles</option>
						<option value="13">Real Estate</option>
                        <option value="2737" selected="selected">Travel &amp; Excursions</option>
						<option value="17">Watches &amp; Jewelry</option>
                        <option value="18">Yachts</option>
                    </select>
                </form>
                    
                <form action="" method="" id="travel-search-form" class="search_form">
					<select name="cat" id="travel-form-select-brand" class="brand selectBox-dropdown">
                        <option value="2737" selected="selected">All Travel &amp; Excursions</option>
                        <option value="2758">Charters</option>
                        <option value="2769">Destinations</option>
                        <option value="2763">Excursions</option>
                        <option value="2767">Vacation Rentals</option>
					</select>
                    
					<select name="2758_model" id="" class="model selectBox-dropdown">
                        <option value="2758" selected="selected">All Charter Services</option>
                        <option value="Jet Charter">Jet Charter</option>
                        <option value="Helicopter Charter">Helicopter Charter</option>
                        <option value="Limo Service">Limo Services</option>
                        <option value="Other Transportation">Other Transportation</option>
                        <option value="Yacht Charter">Yacht Charter</option>
					</select>
                                     
					<input name="s" type="text" id="s" tabindex="1" class="editbox_search ui-autocomplete-input" value="Keyword" onfocus="if (this.value == 'Keyword') {this.value = '';}" autocomplete="off" role="textbox" aria-autocomplete="list" aria-haspopup="true">
					<button type="button" value="Search" class="search_button">Search</button>
                </form>
                <p class="view_all"><a href="http://www.jetsetmag.com/classifieds/ad-category/travel-2/#nav2">View All Listings</a></p>
                <p class="pop_search"><span>Popular Searches</span><a href="http://www.jetsetmag.com/classifieds/?s=Charters&sa=search&cat=2758">Charters</a><a href="http://www.jetsetmag.com/classifieds/?s=Jet+Charter&sa=search&cat=2758" >Jet Charter</a><a href="http://www.jetsetmag.com/classifieds/?s=Vacation+Rentals&sa=search&cat=2767" >Vacation Rentals</a><a href="http://www.jetsetmag.com/classifieds/?s=Other+Transportation&sa=search&cat=2761" >Other Transportation</a></p>
			</div><!-- End Travel and Excursions -->
            
            <!-- Begin Watches and Jewelry -->  
			<div style="display:none;" data-tag="17" class="article_contain">
                <p><span>Luxury Watches and Jewelry For Sale</span></p>
                <form action="" method="" id="" class="category_search_form">
                	<select name="cat" id="main-form-select-brand" class="brand selectBox-dropdown">
                        <option value="main">All Categories</option>
                        <option value="59">Private Jets</option>
                        <option value="25">Helicopters</option>
                        <option value="134">Art &amp; Collectibles</option>
                        <option value="12">Automobiles</option>
                        <option value="2736">Lifestyle</option>
                        <option value="22">Motorcycles</option>
						<option value="13">Real Estate</option>
                        <option value="2737">Travel &amp; Excursions</option>
						<option value="17" selected="selected">Watches &amp; Jewelry</option>
                        <option value="18">Yachts</option>
                    </select>
				</form>
                
                <form action="" method="" id="watches-search-form" class="search_form">
					<select name="cat" id="watches-form-select-brand" class="brand selectBox-dropdown">
						<option value="17" selected="selected">All Watches &amp; Jewelry</option>
                        <option value="362">Watches</option>
                        <option value="363">Jewelry</option>
                   <!-- <option value="A. Lange and Söhne">A. Lange and Söhne</option>
                        <option value="Abercrombie & Fitch Co.">Abercrombie & Fitch Co.</option>
                        <option value="Aero Watch Neuchatel">Aero Watch Neuchatel</option>
                        <option value="Aerowatch">Aerowatch</option>
                        <option value="Agassiz">Agassiz</option>
                        <option value="Alain Silberstein">Alain Silberstein</option>
                        <option value="Alexander Shorokhoff">Alexander Shorokhoff</option>
                        <option value="Alfred Dunhill">Alfred Dunhill</option>
                        <option value="Alpha">Alpha</option>
                        <option value="Alpina">Alpina</option>
                        <option value="Andersen Genève">Andersen Genève</option>
                        <option value="Angelus">Angelus</option>
                        <option value="Angular Momentum">Angular Momentum</option>
                        <option value="Anker">Anker</option>
                        <option value="Anonimo Firenze">Anonimo Firenze</option>
                        <option value="Appella">Appella</option>
                        <option value="Aquadive">Aquadive</option>
                        <option value="Aquanautic">Aquanautic</option>
                        <option value="Aquastar">Aquastar</option>
                        <option value="Aradam">Aradam</option>
                        <option value="Arctos">Arctos</option>
                        <option value="Armand Nicolet">Armand Nicolet</option>
                        <option value="Armin Strom">Armin Strom</option>
                        <option value="Arnold and Son">Arnold and Son</option>
                        <option value="Ascot">Ascot</option>
                        <option value="Askania">Askania</option>
                        <option value="Atlantic">Atlantic</option>
                        <option value="Audemars Freres">Audemars Freres</option>
                        <option value="Audemars Piguet">Audemars Piguet</option>
                        <option value="Audi Design">Audi Design</option>
                        <option value="Auguste Reymond">Auguste Reymond</option>
                        <option value="Austin">Austin</option>
                        <option value="Auxilia">Auxilia</option>
                        <option value="Aximum">Aximum</option>
                        <option value="Azimuth">Azimuth</option>
                        <option value="B.R.M.">B.R.M.</option>
                        <option value="BWC">BWC</option>
                        <option value="Bailey Banks & Biddle">Bailey Banks & Biddle</option>
                        <option value="Ball">Ball</option>
                        <option value="Barthelay">Barthelay</option>
                        <option value="Basilika">Basilika</option>
                        <option value="Bassel">Bassel</option>
                        <option value="Baume & Mercier">Baume & Mercier</option>
                        <option value="Bedat">Bedat</option>
                        <option value="Beleta">Beleta</option>
                        <option value="Bell and Ross">Bell and Ross</option>
                        <option value="Benytone">Benytone</option>
                        <option value="Bergana">Bergana</option>
                        <option value="Bertolucci">Bertolucci</option>
                        <option value="Birma">Birma</option>
                        <option value="Black Starr & Frost">Black Starr & Frost</option>
                        <option value="Blacksand">Blacksand</option>
                        <option value="Blancpain">Blancpain</option>
                        <option value="Boegli">Boegli</option>
                        <option value="Bombardier">Bombardier</option>
                        <option value="Bonard">Bonard</option>
                        <option value="Borel">Borel</option>
                        <option value="Borgeaud">Borgeaud</option>
                        <option value="Bouchard">Bouchard</option>
                        <option value="Boucheron">Boucheron</option>
                        <option value="Bovet">Bovet</option>
                        <option value="Breguet">Breguet</option>
                        <option value="Breitling">Breitling</option>
                        <option value="Bremont">Bremont</option>
                        <option value="Brevete">Brevete</option>
                        <option value="Brior">Brior</option>
                        <option value="Britix">Britix</option>
                        <option value="Bruno Söhnle">Bruno Söhnle</option>
                        <option value="Buben & Zorweg">Buben & Zorweg</option>
                        <option value="Buccellati">Buccellati</option>
                        <option value="Bucheron">Bucheron</option>
                        <option value="Bueche-Girod">Bueche-Girod</option>
                        <option value="Bulova">Bulova</option>
                        <option value="Bunz">Bunz</option>
                        <option value="Buser Freres">Buser Freres</option>
                        <option value="Butex">Butex</option>
                        <option value="Bvlgari">Bvlgari</option>
                        <option value="CVSTOS">CVSTOS</option>
                        <option value="CWC">CWC</option>
                        <option value="Cadaro">Cadaro</option>
                        <option value="Carl F. Bucherer">Carl F. Bucherer</option>
                        <option value="Carlo Ferrara">Carlo Ferrara</option>
                        <option value="Carrera y Carrera">Carrera y Carrera</option>
                        <option value="Cartier">Cartier</option>
                        <option value="Catorex">Catorex</option>
                        <option value="Cauny">Cauny</option>
                        <option value="Cecil Purnell">Cecil Purnell</option>
                        <option value="Cedric Johner">Cedric Johner</option>
                        <option value="Century">Century</option>
                        <option value="Chanel">Chanel</option>
                        <option value="Chase-Durer">Chase-Durer</option>
                        <option value="Chaumet">Chaumet</option>
                        <option value="Chopard">Chopard</option>
                        <option value="Christiaan van der Klaauw">Christiaan van der Klaauw</option>
                        <option value="Christian Dior">Christian Dior</option>
                        <option value="Chronographe Suisse">Chronographe Suisse</option>
                        <option value="Chronometro Real">Chronometro Real</option>
                        <option value="Chronosport">Chronosport</option>
                        <option value="Chronoswiss">Chronoswiss</option>
                        <option value="Churpfälzische Uhrenmanufaktur">Churpfälzische Uhrenmanufaktur</option>
                        <option value="Claude Meylan">Claude Meylan</option>
                        <option value="Clebar">Clebar</option>
                        <option value="Clerc">Clerc</option>
                        <option value="Codhor">Codhor</option>
                        <option value="Comor">Comor</option>
                        <option value="Concord">Concord</option>
                        <option value="Cornell">Cornell</option>
                        <option value="Corum">Corum</option>
                        <option value="Croton">Croton</option>
                        <option value="Cuervo y Sobrinos">Cuervo y Sobrinos</option>
                        <option value="Cuivre">CuiCyclosvre</option>
                        <option value="Cyclos">Cyclos</option>
                        <option value="D.F. & Co.">D.F. & Co.</option>
                        <option value="Damas">Damas</option>
                        <option value="Damiani">Damiani</option>
                        <option value="Daniel JeanRichard">Daniel JeanRichard</option>
                        <option value="Daniel Roth">Daniel Roth</option>
                        <option value="Dark Rush">Dark Rush</option>
                        <option value="Davidoff">Davidoff</option>
                        <option value="Davosa">Davosa</option>
                        <option value="De Bethune">De Bethune</option>
                        <option value="DeWitt">DeWitt</option>
                        <option value="Delaneau">Delaneau</option>
                        <option value="Desira">Desira</option>
                        <option value="Devon">Devon</option>
                        <option value="Di Lenardo & Co">Di Lenardo & Co</option>
                        <option value="Dianoor">Dianoor</option>
                        <option value="Dimier">Dimier</option>
                        <option value="Dior">Dior</option>
                        <option value="Dodane">Dodane</option>
                        <option value="Doxa">Doxa</option>
                        <option value="Du Bois 1785">Du Bois 1785</option>
                        <option value="Dubey & Schaldenbrand">Dubey & Schaldenbrand</option>
                        <option value="Dubois">Dubois</option>
                        <option value="Ducado">Ducado</option>
                        <option value="Ducati">Ducati</option>
                        <option value="Dulcia">Dulcia</option>
                        <option value="Duward">Duward</option>
                        <option value="Dürrstein">Dürrstein</option>
                        <option value="E. Boselli">E. Boselli</option>
                        <option value="EWC">EWC</option>
                        <option value="Ebel">Ebel</option>
                        <option value="Eberhard">Eberhard</option>
                        <option value="Edmond Mathey">Edmond Mathey</option>
                        <option value="Edo">Edo</option>
                        <option value="Edox">Edox</option>
                        <option value="Election">Election</option>
                        <option value="Elgin">Elgin</option>
                        <option value="Eloga">Eloga</option>
                        <option value="Emidio Tucci">Emidio Tucci</option>
                        <option value="Enicar">Enicar</option>
                        <option value="Enigma">Enigma</option>
                        <option value="Epos">Epos</option>
                        <option value="Eresco">Eresco</option>
                        <option value="Erhard Junghans">Erhard Junghans</option>
                        <option value="Ernst Benz">Ernst Benz</option>
                        <option value="Erwin Sattler">Erwin Sattler</option>
                        <option value="Esef Watch Co.">Esef Watch Co.</option>
                        <option value="Eterna">Eterna</option>
                        <option value="Eterna-Matic">Eterna-Matic</option>
                        <option value="Exactus">Exactus</option>
                        <option value="Excelsior Park">Excelsior Park</option>
                        <option value="F.P. Journe">F.P. Journe</option>
                        <option value="Favre-Leuba">Favre-Leuba</option>
                        <option value="Feldo">Feldo</option>
                        <option value="Ferrari">Ferrari</option>
                        <option value="Formex">Formex</option>
                        <option value="Franc Vila">Franc Vila</option>
                        <option value="Franchi Menotti">Franchi Menotti</option>
                        <option value="Franck Muller">Franck Muller</option>
                        <option value="Frederique Constant">Frederique Constant</option>
                        <option value="G.A. Huguenin">G.A. Huguenin</option>
                        <option value="GALA">GALA</option>
                        <option value="GaGà Milano">GaGà Milano</option>
                        <option value="Gallet">Gallet</option>
                        <option value="Georg Jensen">Georg Jensen</option>
                        <option value="George Edward and Sons">George Edward and Sons</option>
                        <option value="George Rock">George Rock</option>
                        <option value="Gevril">Gevril</option>
                        <option value="Gigandet Wakmann">Gigandet Wakmann</option>
                        <option value="Girard Perregaux">Girard Perregaux</option>
                        <option value="Giuliano Mazzuoli">Giuliano Mazzuoli</option>
                        <option value="Glashütte Original">Glashütte Original</option>
                        <option value="Glycine">Glycine</option>
                        <option value="Goebel">Goebel</option>
                        <option value="Goma">Goma</option>
                        <option value="Graff">Graff</option>
                        <option value="Graham">Graham</option>
                        <option value="Greubel Forsey">Greubel Forsey</option>
                        <option value="Gruen">Gruen</option>
                        <option value="Gubelin">Gubelin</option>
                        <option value="Gucci">Gucci</option>
                        <option value="Guillermin Mollet">Guillermin Mollet</option>
                        <option value="Gustafsson & Sjögren">Gustafsson & Sjögren</option>
                        <option value="Guyellia">Guyellia</option>
                        <option value="Gérald Genta">Gérald Genta</option>
                        <option value="H. Moser & Cie">H. Moser & Cie</option>
                        <option value="H. Stern">H. Stern</option>
                        <option value="Hacher">Hacher</option>
                        <option value="Haimov">Haimov</option>
                        <option value="Hamilton">Hamilton</option>
                        <option value="Handwerk">Handwerk</option>
                        <option value="Hanhart">Hanhart</option>
                        <option value="Harris & Shafer">Harris & Shafer</option>
                        <option value="Harry Winston">Harry Winston</option>
                        <option value="Harvey & Co.">Harvey & Co.</option>
                        <option value="Harwood">Harwood</option>
                        <option value="Hausmann">Hausmann</option>
                        <option value="Hautlence">Hautlence</option>
                        <option value="Hebdomas">Hebdomas</option>
                        <option value="Hebe">Hebe</option>
                        <option value="Helmut Mayr">Helmut Mayr</option>
                        <option value="Helvetica">Helvetica</option>
                        <option value="Hema">Hema</option>
                        <option value="Henri Grandjeanand & Co">Henri Grandjeanand & Co</option>
                        <option value="Henry Dunay">Henry Dunay</option>
                        <option value="Henry Duvoisin">Henry Duvoisin</option>
                        <option value="Hermès">Hermès</option>
                        <option value="Hour Lavigne">Hour Lavigne</option>
                        <option value="Huber">Huber</option>
                        <option value="Hublot">Hublot</option>
                        <option value="IWC">IWC</option>
                        <option value="IceLink">IceLink</option>
                        <option value="Ikepod">Ikepod</option>
                        <option value="Illinois">Illinois</option>
                        <option value="Index-Mobile">Index-Mobile</option>
                        <option value="Invicta">Invicta</option>
                        <option value="J. Assmann">J. Assmann</option>
                        <option value="J. Auricoste">J. Auricoste</option>
                        <option value="J. Trilla">J. Trilla</option>
                        <option value="J. Verhagen">J. Verhagen</option>
                        <option value="J.E. Caldwell & Co.">J.E. Caldwell & Co.</option>
                        <option value="J.J. Badollet">J.J. Badollet</option>
                        <option value="J.R. Losada">J.R. Losada</option>
                        <option value="J.W. Benson">J.W. Benson</option>
                        <option value="JB Gioacchino">JB Gioacchino</option>
                        <option value="Jacob and Co">Jacob and Co</option>
                        <option value="Jacques Etoile">Jacques Etoile</option>
                        <option value="Jacques Lemans">Jacques Lemans</option>
                        <option value="Jaeger-LeCoultre">Jaeger-LeCoultre</option>
                        <option value="Jaermann & Stübi">Jaermann & Stübi</option>
                        <option value="Jang Sin Ku">Jang Sin Ku</option>
                        <option value="Jaquet Droz">Jaquet Droz</option>
                        <option value="Jean Dunand">Jean Dunand</option>
                        <option value="Jean Pierre Stalder">Jean Pierre Stalder</option>
                        <option value="Jorg Hysek">Jorg Hysek</option>
                        <option value="Kelek">Kelek</option>
                        <option value="Kieninger">Kieninger</option>
                        <option value="Kirova">Kirova</option>
                        <option value="Kiva">Kiva</option>
                        <option value="Kobold">Kobold</option>
                        <option value="Kramer">Kramer</option>
                        <option value="Krieger">Krieger</option>
                        <option value="Kudoke">Kudoke</option>
                        <option value="Kurt Schaffo">Kurt Schaffo</option>
                        <option value="Kutchinsky">Kutchinsky</option>
                        <option value="L. Leroy">L. Leroy</option>
                        <option value="Laco">Laco</option>
                        <option value="Lalique">Lalique</option>
                        <option value="Lamperti & Lancini">Lamperti & Lancini</option>
                        <option value="Lancaster">Lancaster</option>
                        <option value="Lanco">Lanco</option>
                        <option value="Lang & Heyne">Lang & Heyne</option>
                        <option value="Lapponia">Lapponia</option>
                        <option value="Lebois & Co">Lebois & Co</option>
                        <option value="Lemania">Lemania</option>
                        <option value="Leonidas">Leonidas</option>
                        <option value="Lepinel a Paris">Lepinel a Paris</option>
                        <option value="Leroy">Leroy</option>
                        <option value="Leverette">Leverette</option>
                        <option value="Lindburgh + Benson">Lindburgh + Benson</option>
                        <option value="Linde Werdelin">Linde Werdelin</option>
                        <option value="Lip">Lip</option>
                        <option value="Longines">Longines</option>
                        <option value="Lotus">Lotus</option>
                        <option value="Louis Erard">Louis Erard</option>
                        <option value="Louis Moinet">Louis Moinet</option>
                        <option value="Louis Vuitton">Louis Vuitton</option>
                        <option value="Lucerne">Lucerne</option>
                        <option value="Lucien Rochat">Lucien Rochat</option>
                        <option value="Ludovic Ballouard">Ludovic Ballouard</option>
                        <option value="MB&F">MB&amp;F</option>
                        <option value="MF">MF</option>
                        <option value="Maboussin">Maboussin</option>
                        <option value="Maitres du Temps">Maitres du Temps</option>
                        <option value="Mars">Mars</option>
                        <option value="Martin Braun">Martin Braun</option>
                        <option value="Marvin">Marvin</option>
                        <option value="Maserati">Maserati</option>
                        <option value="Mathey-Tissot">Mathey-Tissot</option>
                        <option value="Matthew Norman">Matthew Norman</option>
                        <option value="Matthias Naeschke">Matthias Naeschke</option>
                        <option value="Mauboussin">Mauboussin</option>
                        <option value="Maurice Lacroix">Maurice Lacroix</option>
                        <option value="Meccaniche Veloci">Meccaniche Veloci</option>
                        <option value="Meistersinger">Meistersinger</option>
                        <option value="Mercure">Mercure</option>
                        <option value="Meyers">Meyers</option>
                        <option value="Mi Chronometre">Mi Chronometre</option>
                        <option value="Michel Jordi">Michel Jordi</option>
                        <option value="Milex">Milex</option>
                        <option value="Military">Military</option>
                        <option value="Milus">Milus</option>
                        <option value="Minerva">Minerva</option>
                        <option value="Misani">Misani</option>
                        <option value="Momo Design">Momo Design</option>
                        <option value="Monopol">Monopol</option>
                        <option value="Montblanc">Montblanc</option>
                        <option value="Montilier">Montilier</option>
                        <option value="Monvis">Monvis</option>
                        <option value="Movado">Movado</option>
                        <option value="Mulco">Mulco</option>
                        <option value="Mühle Glashütte">Mühle Glashütte</option>
                        <option value="N.B. Yäeger">N.B. Yäeger</option>
                        <option value="N.O.A">N.O.A</option>
                        <option value="Nauticfish">Nauticfish</option>
                        <option value="Nerny">Nerny</option>
                        <option value="Nicolet">Nicolet</option>
                        <option value="Nivrel">Nivrel</option>
                        <option value="Noblex">Noblex</option>
                        <option value="Nomos Glashütte">Nomos Glashütte</option>
                        <option value="Nord Zeitmaschine">Nord Zeitmaschine</option>
                        <option value="Norexa">Norexa</option>
                        <option value="Nouvelle Horlogerie Calabrese">Nouvelle Horlogerie Calabrese</option>
                        <option value="Nuama Jeannin">Nuama Jeannin</option>
                        <option value="Nubeo">Nubeo</option>
                        <option value="Offshore">Offshore</option>
                        <option value="Ollech & Wajs">"Ollech &amp; Wajs</option>
                        <option value="Olympic">Olympic</option>
                        <option value="Omega">Omega</option>
                        <option value="Orafa">Orafa</option>
                        <option value="Orator">Orator</option>
                        <option value="Orbita">Orbita</option>
                        <option value="Oris">Oris</option>
                        <option value="Other">Other</option>
                        <option value="Otium">Otium</option>
                        <option value="PWP">PWP</option>
                        <option value="Panerai">Panerai</option>
                        <option value="Parmigiani Fleurier">Parmigiani Fleurier</option>
                        <option value="Patek Philippe">Patek Philippe</option>
                        <option value="Paul Ditisheim">Paul Ditisheim</option>
                        <option value="Paul Gerber">Paul Gerber</option>
                        <option value="Paul Picot">Paul Picot</option>
                        <option value="Pedre">Pedre</option>
                        <option value="Pedro Izquierdo">Pedro Izquierdo</option>
                        <option value="Pequignet">Pequignet</option>
                        <option value="Perrelet">Perrelet</option>
                        <option value="Peter Wibmer">Peter Wibmer</option>
                        <option value="Philip Watch">Philip Watch</option>
                        <option value="Philippe Charriol">Philippe Charriol</option>
                        <option value="Philippe Wurtz">Philippe Wurtz</option>
                        <option value="Piaget">Piaget</option>
                        <option value="Pierre Cardin">Pierre Cardin</option>
                        <option value="Pierre DeRoche">Pierre DeRoche</option>
                        <option value="Pierre Kunz">Pierre Kunz</option>
                        <option value="Piguet & Cie">Piguet & Cie</option>
                        <option value="Pocket Watch">Pocket Watch</option>
                        <option value="Pomellato">Pomellato</option>
                        <option value="Porsche">Porsche</option>
                        <option value="Porsche Design">Porsche Design</option>
                        <option value="Pryngeps">Pryngeps</option>
                        <option value="Quinting">Quinting</option>
                        <option value="RSW">RSW</option>
                        <option value="Raidillon">Raidillon</option>
                        <option value="Rainer Nienaber">Rainer Nienaber</option>
                        <option value="Raymond Weil">Raymond Weil</option>
                        <option value="Rebellion">Rebellion</option>
                        <option value="Record Geneve">Record Geneve</option>
                        <option value="Recorder">Recorder</option>
                        <option value="Recta">Recta</option>
                        <option value="Rene Kern">Rene Kern</option>
                        <option value="René Hämmerli">Revue Thommen</option>
                        <option value="Revue Thommen">Revue Thommen</option>
                        <option value="Richard Mille">Richard Mille</option>
                        <option value="Roger Dubuis">Roger Dubuis</option>
                        <option value="Rolex">Rolex</option>
                        <option value="Rolland">Rolland</option>
                        <option value="Romain Jerome">Romain Jerome</option>
                        <option value="Romilly">Romilly</option>
                        <option value="Royal">Royal</option>
                        <option value="Ryser Kentfield">Ryser Kentfield</option>
                        <option value="Saga">Saga</option>
                        <option value="Scalfaro">Scalfaro</option>
                        <option value="Schauer">Schauer</option>
                        <option value="Schaumburg">Schaumburg</option>
                        <option value="Schwarz Etienne">Schwarz Etienne</option>
                        <option value="Schwedler">Schwedler</option>
                        <option value="Schweizer">Schweizer</option>
                        <option value="Seeland">Seeland</option>
                        <option value="Seiko">Seiko</option>
                        <option value="Shreve & Co">Shreve & Co</option>
                        <option value="Silvana">Silvana</option>
                        <option value="Sinclair Harding">Sinclair Harding</option>
                        <option value="Sinn">Sinn</option>
                        <option value="Sjöö Sandström">Sjöö Sandström</option>
                        <option value="Snyper">Snyper</option>
                        <option value="Soleil">Soleil</option>
                        <option value="Sothis">Sothis</option>
                        <option value="St. Dupont">St. Dupont</option>
                        <option value="Steffen">Steffen</option>
                        <option value="Stowa">Stowa</option>
                        <option value="Swinden & Sons">Swinden & Sons</option>
                        <option value="Systeme Glashütte">Systeme Glashütte</option>
                        <option value="TB Buti">TB Buti</option>
                        <option value="Tabbah">Tabbah</option>
                        <option value="Tag Heuer">Tag Heuer</option>
                        <option value="Tavannes">Tavannes</option>
                        <option value="Technicum">Technicum</option>
                        <option value="Telda">Telda</option>
                        <option value="Tellus">Tellus</option>
                        <option value="Temption">Temption</option>
                        <option value="Tempvs Compvtare">Tempvs Compvtare</option>
                        <option value="Terra Cielo Mare">Terra Cielo Mare</option>
                        <option value="Thomas Ninchritz">Thomas Ninchritz</option>
                        <option value="Tiffany">Tiffany</option>
                        <option value="Time Force">Time Force</option>
                        <option value="Timecraft">Timecraft</option>
                        <option value="Tissot">Tissot</option>
                        <option value="Tourby">Tourby</option>
                        <option value="Tourneau">Tourneau</option>
                        <option value="Trico">Trico</option>
                        <option value="Tudor">Tudor</option>
                        <option value="U-Boat">U-Boat</option>
                        <option value="U. Joseph Jeannot">U. Joseph Jeannot</option>
                        <option value="UTS München">UTS München</option>
                        <option value="Uhlmann">Uhlmann</option>
                        <option value="Uhr-Kraft">Uhr-Kraft</option>
                        <option value="Ultramar">Ultramar</option>
                        <option value="Ulysse Nardin">Ulysse Nardin</option>
                        <option value="Union Glashütte">Union Glashütte</option>
                        <option value="Universal Genève">Universal Genève</option>
                        <option value="Universal Watch Prima">Universal Watch Prima</option>
                        <option value="Urban Jürgensen">Urban Jürgensen</option>
                        <option value="Urwerk">Urwerk</option>
                        <option value="Vacheron Constantin">Vacheron Constantin</option>
                        <option value="Valbray">Valbray</option>
                        <option value="Valdor">Valdor</option>
                        <option value="Value Swiss">Value Swiss</option>
                        <option value="Van Cleef & Arpels">Van Cleef & Arpels</option>
                        <option value="Van der Bauwede">Van der Bauwede</option>
                        <option value="Ventura">Ventura</option>
                        <option value="Venus">Venus</option>
                        <option value="Versace">Versace</option>
                        <option value="Vertu">Vertu</option>
                        <option value="Vicence">Vicence</option>
                        <option value="Viceroy">Viceroy</option>
                        <option value="Victorinox Swiss Army">Victorinox Swiss Army</option>
                        <option value="Vincent Berard">Vincent Berard</option>
                        <option value="Vintage">Vintage</option>
                        <option value="Vogard">Vogard</option>
                        <option value="Volna">Volna</option>
                        <option value="Voltime">Voltime</option>
                        <option value="Wakmann">Wakmann</option>
                        <option value="Waldan">Waldan</option>
                        <option value="Wempe">Wempe</option>
                        <option value="Wyler Geneve">Wyler Geneve</option>
                        <option value="Wyler Vetta">Wyler Vetta</option>
                        <option value="York">York</option>
                        <option value="Yves Saint Laurent">Yves Saint Laurent</option>
                        <option value="Zannetti">Zannetti</option>
                        <option value="Zenith">Zenith</option>
                        <option value="Zeno-Watch Basel">Zeno-Watch Basel</option>
                        <option value="de Grisogono">de Grisogono</option>
                        <option value="deLaCour">deLaCour</option>
                        <option value="hD3 Complication">hD3 Complication</option>
                        <option value="von Wangenheim">von Wangenheim</option> -->
					</select>
					
                    <input name="s" type="text" id="s" tabindex="1" class="editbox_search ui-autocomplete-input" value="Keyword" onfocus="if (this.value == 'Keyword') {this.value = '';}" autocomplete="off" role="textbox" aria-autocomplete="list" aria-haspopup="true">
					<button type="button" value="Search" class="search_button">Search</button>
                </form>
                <p class="view_all"><a href="http://www.jetsetmag.com/classifieds/ad-category/watches/#nav2">View All Listings</a></p>
                <p class="pop_search"><span>Popular Searches</span> <a href="http://www.jetsetmag.com/classifieds/?s=Tag+Heuer&sa=search&cat=17" >Tagg Heuer</a> <a href="http://www.jetsetmag.com/classifieds/?s=Hublot&sa=search&cat=17" >Hublot</a> <a href="http://www.jetsetmag.com/classifieds/?s=Audemars+Piaget&sa=search&cat=17" >Audemars Piaget</a> <a href="http://www.jetsetmag.com/classifieds/?s=Breguet&sa=search&cat=17" >Breguet</a></p>
			</div><!-- End Watches and Jewelry -->
            
            <!-- Begin Yachts --> 
			<div data-tag="18" class="article_contain" style="display:none;">
                <p><span>Luxury Yachts For Sale</span></p>
                <form action="" method="" id="" class="category_search_form">
					<select name="cat" id="main-form-select-brand" class="brand selectBox-dropdown">
						<option value="main">All Categories</option>
                        <option value="59">Private Jets</option>
                        <option value="25">Helicopters</option>
                        <option value="134">Art &amp; Collectibles</option>
                        <option value="12">Automobiles</option>
                        <option value="2736">Lifestyle</option>
                        <option value="22">Motorcycles</option>
						<option value="13">Real Estate</option>
                        <option value="2737">Travel &amp; Excursions</option>
						<option value="17">Watches &amp; Jewelry</option>
                        <option value="18" selected="selected">Yachts</option>
                    </select>
				</form>

				<form action="" method="post" id="watches-search-form" class="search_form">
					<select name="cat" id="watches-form-select-brand" class="brand selectBox-dropdown">
                        <option value="18" selected="selected">All Types</option>
                        <option value="96">Commercial Yachts</option>
                        <option value="190">Boats</option>
                        <option value="189">House Boats</option>
                        <option value="95">Luxury Yachts</option>
                        <option value="192">Other Yachts/Boats</option>
                        <option value="94">Sailing Yachts</option>
                        <option value="97">Superyachts/Megayachts</option>
                        
					</select>
                                      
					<input name="s" type="text" id="s" tabindex="1" class="editbox_search ui-autocomplete-input" value="Keyword" onfocus="if (this.value == 'Keyword') {this.value = '';}" autocomplete="off" role="textbox" aria-autocomplete="list" aria-haspopup="true">
					<button type="button" value="Search" class="search_button">Search</button>
                </form>
                <p class="view_all"><a href="http://www.jetsetmag.com/classifieds/ad-category/yachts-for-sale/#nav2">View All Listings</a></p>
                <p class="pop_search"><span>Popular Searches</span> <a href="http://www.jetsetmag.com/classifieds/?s=What+are+you+looking+for%3F&=search&cat=94" >Sailing</a><a href="http://www.jetsetmag.com/classifieds/?s=What+are+you+looking+for%3F&=search&cat=97" >Superyachts</a><a href="http://www.jetsetmag.com/classifieds/?s=What+are+you+looking+for%3F&=search&cat=97" >Megayachts</a><a href="http://www.jetsetmag.com/classifieds/?s=What+are+you+looking+for%3F&=search&cat=189" >House Boats</a></p>
			</div><!-- End Yachts --> 
                
			<!-- Begin Private Jets -->
            <div data-tag="59" class="article_contain" style="display:none;">
                <p><span>Private Jets For Sale</span></p>
                <form action="" method="" id="" class="category_search_form">
					<select name="cat" id="main-form-select-brand" class="brand selectBox-dropdown">
                        <option value="main">All Categories</option>
                        <option value="59" selected="selected">Private Jets</option>
                        <option value="25">Helicopters</option>
                        <option value="134">Art &amp; Collectibles</option>
                        <option value="12">Automobiles</option>
                        <option value="2736">Lifestyle</option>
                        <option value="22">Motorcycles</option>
						<option value="13">Real Estate</option>
                        <option value="2737">Travel &amp; Excursions</option>
						<option value="17">Watches &amp; Jewelry</option>
                        <option value="18">Yachts</option>
                    </select>
				</form>
                
                <form action="" method="post" id="jets-search-form" class="search_form">
					<select name="cat" id="jets-form-select-brand" class="brand selectBox-dropdown">
                        <option value="59" selected="selected">All Makes</option>
                        <option value="78">Airbus</option>
                        <option value="63">Beechcraft</option>
                        <option value="61">Bombardier</option>
                        <option value="85">Boeing</option>
                        <option value="60">Cessna</option>
                        <option value="88">Cirrus</option>
                        <option value="62">Dassault</option>
                        <option value="70">Eclipse</option>
                        <option value="68">Embrarer</option>
                        <option value="64">Gulfstream</option>
                        <option value="67">Hawker</option>
                        <option value="77">Honda Jet</option>
                        <option value="93">Israel Aircraft Industries</option>
                        <option value="65">Lear</option>
                        <option value="91">Other Jets</option>
                        <option value="84">Piaggio</option>
                        <option value="66">Piper</option>
                        <option value="69">Pilatus</option>
					</select>
                              
					<select name="78_model" id="" class="model selectBox-dropdown" style="display:none;">
						<option value="78" selected="selected">All Airbus Models</option>
						<option value="4000">4000</option>
                        <option value="ACJ319">ACJ319</option>
					</select>
                  
					<select name="63_model" id="" class="model selectBox-dropdown" style="display:none;">
						<option value="63" selected="selected">All Beechcraft Models</option>
                        <option value="Baron">Baron</option>
                        <option value="Beechjet">Beechjet</option>
                        <option value="Bonanza">Bonanza</option>
                        <option value="King Air 200">King Air 200</option>
                        <option value="King Air 350">King Air 350</option>
                        <option value="King Air B200">King Air B200</option>
                        <option value="King Air C90">King Air C90</option>
                        <option value="King Air C90A">King Air C90A</option>
                        <option value="King Air C90B">King Air C90B</option>
                        <option value="King Air F90">King Air F90</option>
                        <option value="*">Other</option>
					</select>
                
					<select name="61_model" id="" class="model selectBox-dropdown" style="display:none;">
						<option value="61" selected="selected">All Bombardier Models</option>
                        <option value="Challenger 600">Challenger 600</option>
                        <option value="Challenger 604">Challenger 604</option>
                        <option value="Global 7000">Global 7000</option>
                        <option value="Global Express">Global Express</option>
                        <option value="Global Express XRS">Global Express XRS</option>
                        <option value="Learjet 35A">Learjet 35A</option>
                        <option value="Learjet 40">Learjet 40</option>
                        <option value="Learjet 40XR">Learjet 40XR</option>
                        <option value="Learjet 45">Learjet 45</option>
                        <option value="Learjet 45XR">Learjet 45XR</option>
                        <option value="Learjet 60">Learjet 60</option>
					</select>
				
					<select name="85_model" id="" class="model selectBox-dropdown" style="display:none;">
						<option value="85" selected="selected">All Boeing Models</option>
                        <option value="727">727</option>
                        <option value="737">737</option>
                        <option value="BBJ">BBJ</option>
					</select>
                  
					<select name="60_model" id="" class="model selectBox-dropdown" style="display:none;">
                        <option value="60" selected="selected">All Cessna Models</option>
                        <option value="172 Skyhawk">172 Skyhawk</option>
                        <option value="208 Caravan">208 Caravan</option>
                        <option value="421 Golden Eagle">421 Golden Eagle</option>
                        <option value="425 Conquest I">425 Conquest I</option>
                        <option value="500 Citation I">500 Citation I</option>
                        <option value="501 Citation I/SP">501 Citation I/SP</option>
                        <option value="510 Citation Mustang">510 Citation Mustang</option>
                        <option value="525 Citation CJ1">525 Citation CJ1</option>
                        <option value="525 Citation Jet">525 Citation Jet</option>
                        <option value="525A Citation CJ2">525A Citation CJ2</option>
                        <option value="550 Citation II">550 Citation II</option>
                        <option value="550 Citation S/II">550 Citation S/II</option>
                        <option value="551 Citation II/SP">551 Citation II/SP</option>
                        <option value="560 Citation Ultra">560 Citation Ultra</option>
                        <option value="650 Citation VII">650 Citation VII</option>
                        <option value="750 Citation X">750 Citation X</option>
                        <option value="Cessna Model">Cessna Model</option>
                        <option value="*">Other Models</option>
					</select>
                  
					<select name="88_model" id="" class="model selectBox-dropdown" style="display:none;">
                        <option value="88" selected="selected">All Cirrus Models</option>
                        <option value="SR20">SR20</option>
                        <option value="SR22 G3">SR22 G3</option>
					</select>
                  
					<select name="62_model" id="" class="model selectBox-dropdown" style="display:none;">
                        <option value="62" selected="selected">All Dassault Models</option>
                        <option value="Falcon 10">Falcon 10</option>
                        <option value="Falcon 200">Falcon 200</option>
                        <option value="Falcon 2000">Falcon 2000</option>
                        <option value="Falcon 2000EX">Falcon 2000EX</option>
                        <option value="Falcon 2000EX EASy">Falcon 2000EX EASy</option>
                        <option value="Falcon 2000LX">Falcon 2000LX</option>
                        <option value="Falcon 7X">Falcon 7X</option>
                        <option value="Falcon 900B">Falcon 900B</option>
                        <option value="Falcon 900C">Falcon 900C</option>
                        <option value="Falcon 900EX">Falcon 900EX</option>
                        <option value="Falcon 900EX EASy">Falcon 900EX EASy</option>
                        <option value="*">Other Models</option>
					</select>
                  
					<select name="70_model" id="" class="model selectBox-dropdown" style="display:none;">
                    	<option value="70" selected="selected">All Eclipse Models</option>
                    	<option value="500">500</option>
					</select>
                  
					<select name="68_model" id="" class="model selectBox-dropdown" style="display:none;">
                        <option value="68" selected="selected">All Embrarer Models</option>
                        <option value="ERJ 145">ERJ 145</option>
                        <option value="Legacy 600">Legacy 600</option>
                        <option value="Phenom 100">Phenom 100</option>
					</select>
                  
					<select name="64_model" id="" class="model selectBox-dropdown" style="display:none;">
                        <option value="64" selected="selected">All Gulfstream Models</option>
                        <option value="G-II">G-II</option>
                        <option value="G-III">G-III</option>
                        <option value="G-IV">G-IV</option>
                        <option value="G400">G400</option>
                        <option value="G450">G450</option>
                        <option value="G550">G550</option>
					</select>
                  
					<select name="67_model" id="" class="model selectBox-dropdown" style="display:none;">
                        <option value="67" selected="selected">All Hawker Models</option>
                        <option value="400">400</option>
                        <option value="400XP">400XP</option>
                        <option value="700">700</option>
                        <option value="850XP">850XP</option>
                        <option value="900XP">900XP</option>
                        <option value="*">Other</option>
					</select>
                
					<select name="77_model" id="" class="model selectBox-dropdown" style="display:none;">
                    	<option value="77" selected="selected">All Honda Jet Models</option>
                    	<option value="Honda Jet model">Honda Jet model</option>
					</select>
                  
					<select name="93_model" id="" class="model selectBox-dropdown" style="display:none;">
                    	<option value="93" selected="selected">All Israel Aircraft Industries Models</option>
                    	<option value="1124 Westwind I">1124 Westwind I</option>
					</select>

					<select name="65_model" id="" class="model selectBox-dropdown" style="display:none;">
                        <option value="65" selected="selected">All Lear Models</option>
                        <option value="Learjet 23">Learjet 23</option>
                        <option value="Learjet 24">Learjet 24</option>
                        <option value="Learjet 25">Learjet 25</option>
                        <option value="Learjet 28">Learjet 28</option>
                        <option value="Learjet 29">Learjet 29</option>
                        <option value="Learjet 31">Learjet 31</option>
                        <option value="Learjet 35">Learjet 35</option>
                        <option value="Learjet 36">Learjet 36</option>
                        <option value="Learjet 40">Learjet 40</option>
                        <option value="Learjet 45">Learjet 45</option>
                        <option value="Learjet 55">Learjet 55</option>
                        <option value="Learjet 60">Learjet 60</option>
                        <option value="Learjet 85">Learjet 85</option>
					</select>

					<select name="84_model" id="" class="model selectBox-dropdown" style="display:none;">
                        <option value="84" selected="selected">All Piaggio Models</option>
                        <option value="Piaggio P.2">Piaggio P.2</option>
                        <option value="Piaggio P.3">Piaggio P.3</option>
                        <option value="Piaggio P.6">Piaggio P.6</option>
                        <option value="Piaggio P.7">Piaggio P.7</option>
                        <option value="Piaggio P.8">Piaggio P.8</option>
                        <option value="Piaggio P.9">Piaggio P.9</option>
                        <option value="Piaggio P.10">Piaggio P.10</option>
                        <option value="Piaggio P.11">Piaggio P.11</option>
                        <option value="Piaggio P.16">Piaggio P.16</option>
                        <option value="Piaggio P.23">Piaggio P.23</option>
                        <option value="Piaggio P.23R">Piaggio P.23R</option>
                        <option value="Piaggio P.32">Piaggio P.32</option>
                        <option value="Piaggio P.50">Piaggio P.50</option>
                        <option value="Piaggio P.108">Piaggio P.108</option>
                        <option value="Piaggio P.111">Piaggio P.111</option>
                        <option value="Piaggio P.119">Piaggio P.119</option>
                        <option value="Piaggio P.136">Piaggio P.136</option>
                        <option value="Piaggio P.148">Piaggio P.148</option>
                        <option value="Piaggio P.149">Piaggio P.149</option>
                        <option value="Piaggio P.150">Piaggio P.150</option>
                        <option value="Piaggio P.166">Piaggio P.166</option>
                        <option value="Piaggio P.180">Piaggio P.180</option>
                        <option value="Piaggio PD-808">Piaggio PD-808</option>
					</select>
                  
					<select name="66_model" id="" class="model selectBox-dropdown" style="display:none;">
                        <option value="66" selected="selected">All Piper Models</option>
                        <option value="PA-18 Super Cub">PA-18 Super Cub</option>
                        <option value="PA-24 Comanche">PA-24 Comanche</option>
                        <option value="PA-28 Cherokee">PA-28 Cherokee</option>
                        <option value="PA-28 Cherokee Arrow">PA-28 Cherokee Arrow</option>
                        <option value="PA-30 Twin Comanche">PA-30 Twin Comanche</option>
                        <option value="PA-31 Navajo Chieftain">PA-31 Navajo Chieftain</option>
                        <option value="PA-31T Cheyenne">PA-31T Cheyenne</option>
                        <option value=">PA-32 Cherokee Six">PA-32 Cherokee Six</option>
                        <option value="PA-32 Saratoga">PA-32 Saratoga</option>
                        <option value="PA-34 Seneca">PA-34 Seneca</option>
                        <option value="PA-46 JetPROP">PA-46 JetPROP</option>
                        <option value="PA-46 Malibu Mirage">PA-46 Malibu Mirage</option>
					</select>
                  
					<select name="69_model" id="" class="model selectBox-dropdown" style="display:none;">
                    	<option value="69" selected="selected">All Pilatus Models</option>
                    	<option value="PC-12">PC-12</option>
					</select>
                    
                    <select name="91_model" id="" class="model selectBox-dropdown" style="display:none;">
                    	<option value="91" selected="selected">All Other Models</option>
					</select>
                                    
					<input name="s" type="text" id="s" tabindex="1" class="editbox_search ui-autocomplete-input" value="Keyword" onfocus="if (this.value == 'Keyword') {this.value = '';}" autocomplete="off" role="textbox" aria-autocomplete="list" aria-haspopup="true">
					<button type="button" value="Search" class="search_button">Search</button>
                </form>
                <p class="view_all"><a href="http://www.jetsetmag.com/classifieds/ad-category/private-jets-for-sale/#nav2">View All Listings</a></p>
                <p class="pop_search"><span>Popular Searches</span> <a href="http://www.jetsetmag.com/classifieds/?s=hawker+beechcraft&sa=search&cat=0" >Hawker Beechcraft</a> <a href="http://www.jetsetmag.com/classifieds/?s=cessna&sa=search&cat=60" >Cessna</a> <a href="http://www.jetsetmag.com/classifieds/?s=global&sa=search&cat=0" >Global</a> <a href="http://www.jetsetmag.com/classifieds/?s=phenom&sa=search&cat=59" >Phenom</a> </p>
			</div><!-- End Private Jets -->         
            
            <!-- Begin Helicopters -->  
			<div style="display:none;" data-tag="25" class="article_contain">
                <p><span>Helicopters For Sale</span></p>
                <form action="" method="" id="" class="category_search_form">
                	<select name="cat" id="main-form-select-brand" class="brand selectBox-dropdown">
						<option value="main">All Categories</option>
                        <option value="59">Private Jets</option>
                        <option value="25" selected="selected">Helicopters</option>
                        <option value="134">Art &amp; Collectibles</option>
                        <option value="12">Automobiles</option>
                        <option value="2736">Lifestyle</option>
                        <option value="22">Motorcycles</option>
						<option value="13">Real Estate</option>
                        <option value="2737">Travel &amp; Excursions</option>
						<option value="17">Watches &amp; Jewelry</option>
                        <option value="18">Yachts</option>
                    </select>
				</form>
                
                <form action="" method="post" id="jets-search-form" class="search_form">
					<select name="cat" id="helicopters-form-select-brand" class="brand selectBox-dropdown">
                        <option value="25" selected="selected">All Helicopters</option>
                        <option value="51">Agusta</option>
                        <option value="52">Bell</option>
                        <option value="53">Enstrom</option>
                        <option value="54">Eurocopter</option>
                        <option value="55">McDonnell Douglas</option>
                        <option value="117">Other</option>
                        <option value="56">Robinson</option>
                        <option value="57">Schweizer </option>
                        <option value="58">Sikorsky</option>
                        
					</select>
                    
					<input name="s" type="text" id="s" tabindex="1" class="editbox_search ui-autocomplete-input" value="Keyword" onfocus="if (this.value == 'Keyword') {this.value = '';}" autocomplete="off" role="textbox" aria-autocomplete="list" aria-haspopup="true">
					<button type="button" value="Search" class="search_button">Search</button>
                </form>
                <p class="view_all"><a href="http://www.jetsetmag.com/classifieds/ad-category/helicopters-for-sale/#nav2">View All Listings</a></p>
                <p class="pop_search"><span>Popular Searches</span><a href="http://www.jetsetmag.com/classifieds/?s=What+are+you+looking+for%3F&sa=search&cat=54" >Eurocopter</a><a href="http://www.jetsetmag.com/classifieds/?s=black&sa=search&cat=25" >Black</a><a href="http://www.jetsetmag.com/classifieds/?s=mercedes&sa=search&cat=25" >Mercedes Helicopter</a><a href="http://www.jetsetmag.com/classifieds/?s=military&sa=search&cat=25" >Military</a></p>
			</div><!-- End Helicopters -->
            
            <!-- Begin Auctions and Events -->  
			<!-- <div style="display:none;" data-tag="112" class="article_contain">
				<p><span>Auctions And Events</span></p>
                
				<form action="" method="" id="" class="category_search_form">
                	<select name="cat" id="main-form-select-brand" class="brand selectBox-dropdown">
						<option value="main">All Categories</option>
						<option value="59">Private Jets</option>
						<option value="18">Yachts</option>
						<option value="12">Luxury Autos</option>
						<option value="25">Helicopters</option>
						<option value="22">Motorcycles</option>
						<option value="13">Real Estate</option>
						<option value="17">Watches &amp; Jewelry</option>
						<option value="23">Charter Services</option>
						<option value="1158">Fashion &amp; Accessories</option>
						<option value="134">Art &amp; Collectibles</option>
						<option value="127">Exclusive Products &amp; Services</option>
						<option value="112" selected="selected">Auctions &amp; Events</option>
                    </select>
				</form>

                <form action="" method="" id="auctions-search-form" class="search_form">
					<select name="cat" id="auctions-form-select-brand" class="brand selectBox-dropdown">
                        <option value="112" selected="selected">All Auctions &amp; Events</option>
                        <option value="1205">Auctions</option>
                        <option value="112">Events</option>
					</select>
                                     
					<input name="s" type="text" id="s" tabindex="1" class="editbox_search ui-autocomplete-input" value="Keyword" onfocus="if (this.value == 'Keyword') {this.value = '';}" autocomplete="off" role="textbox" aria-autocomplete="list" aria-haspopup="true">
					<button type="button" value="Search" class="search_button">Search</button>
                </form>
                <p class="view_all"><a href="http://www.jetsetmag.com/classifieds/ad-category/events/#nav2">View All Listings</a></p>
                <p class="pop_search"><span> Popular Searches</span> <a href="http://www.jetsetmag.com/classifieds/?s=car&sa=search&cat=112" >Car Auctions</a> <a href="http://www.jetsetmag.com/classifieds/?s=boat+shows&sa=search&cat=112" >Boat Shows</a> <a href="http://www.jetsetmag.com/classifieds/?s=racing&sa=search&cat=112" >Racing</a> <a href="http://www.jetsetmag.com/classifieds/?s=fashion&sa=search&cat=112" >Fashion Shows</a>
<a href="http://www.jetsetmag.com/classifieds/?s=wine&sa=search&cat=112" >Wine Tasting </a> </p>
			</div> --> <!-- End Auctions and Events -->
            
            <!-- Begin Fashion -->
	   <!-- <div style="display:none;" data-tag="1158" class="article_contain">
				<p><span>Fashion</span></p>
				<form action="" method="" id="" class="category_search_form">
					<select name="cat" id="main-form-select-brand" class="brand selectBox-dropdown">
						<option value="main">All Categories</option>
						<option value="59">Private Jets</option>
						<option value="18">Yachts</option>
						<option value="12">Luxury Autos</option>
						<option value="25">Helicopters</option>
						<option value="22">Motorcycles</option>
						<option value="13">Real Estate</option>
						<option value="17" >Watches &amp; Jewelry</option>
						<option value="23">Charter Services</option>
						<option value="1158" selected="selected">Fashion &amp; Accessories</option>
						<option value="134">Art &amp; Collectibles</option>
						<option value="127">Exclusive Products &amp; Services</option>
						<option value="112">Auctions &amp; Events</option>
                    </select>
				</form>

				<form action="" method="" id="vacation-search-form" class="search_form"> -->
			   <!-- <select name="cat" id="fashion-form-select-brand" class="brand selectBox-dropdown">
						<option value="1158" selected="selected">All Brands</option>
                        <option value="4" selected="selected">Gucci</option>
                        <option value="4" selected="selected">Prada</option>
                        <option value="4" selected="selected">Marc Jacobs</option>
                        <option value="4" selected="selected">Steffano Ricci</option>
                        <option value="4" selected="selected">Louis Vuitton</option>
                        <option value="4" selected="selected">Chanel</option>
                        <option value="4" selected="selected">Versache</option>
                        <option value="4" selected="selected">Vacheron</option>
                        <option value="4" selected="selected">Giorgio Armani</option>
                        <option value="4" selected="selected">Thomas Dean</option>
                        <option value="4" selected="selected">Dior</option>
                        <option value="4" selected="selected">Dolce &amp; Gabbana</option>
                        <option value="4" selected="selected">Hermes Paris</option>
                        <option value="4" selected="selected">Hugo Boss</option>
                        <option value="4" selected="selected">Calvin Klein</option>
                        <option value="4" selected="selected">Tiffany &amp; Co.</option>
                        <option value="4" selected="selected">Ralph Lauren</option>
                        <option value="4" selected="selected">All Fashion Items</option>
                        <option value="4" selected="selected">Men's Clothing</option>
                        <option value="4" selected="selected">Women's Clothing</option>
                        <option value="4" selected="selected">Sunglasses</option>
                        <option value="4" selected="selected">Shoes</option>
                        <option value="4" selected="selected">Handbags</option>
                        <option value="4" selected="selected">Suits</option>
                        <option value="4" selected="selected">Coats</option>
                        <option value="4" selected="selected">Gloves</option>
                        <option value="4" selected="selected">Belts</option>
                        <option value="4" selected="selected">Hats</option>
                        <option value="4" selected="selected">Ties</option>
                        <option value="4" selected="selected">Accessories</option>
                        <option value="4" selected="selected">Other</option>
                        <option value="4" selected="selected">iPhone/iPad Cases</option>
					</select> -->
                    
			   <!-- <input name="s" type="text" id="s" tabindex="1" class="editbox_search ui-autocomplete-input" value="Keyword" onfocus="if (this.value == 'Keyword') {this.value = '';}" autocomplete="off" role="textbox" aria-autocomplete="list" aria-haspopup="true">
					<button type="button" value="Search" class="search_button">Search</button>
				</form>
                <p class="view_all"><a href="http://www.jetsetmag.com/classifieds/ad-category/fashion/#nav2">View All Listings</a></p>
                <p class="pop_search"><span>Popular Searches</span><a href="http://www.jetsetmag.com/classifieds/?s=hawker+beechcraft&sa=search&cat=0" >Thomas Dean</a><a href="http://www.jetsetmag.com/classifieds/?s=Sport+Coat&sa=search&cat=1158" >Sport Coat</a><a href="http://www.jetsetmag.com/classifieds/?s=Sport+Shirt&sa=search&cat=1158" >Sport Shirt</a><a href="http://www.jetsetmag.com/classifieds/?s=Ties&sa=search&cat=1158" >Ties</a></p>
			</div> --> <!-- End Fashion -->
            
            </div>
            
<script type="text/javascript">	
// <![CDATA[ 
$("form.category_search_form select:nth-child(1)").change(function(){
var catBox = $(this).val();
var catBoxText = $(this).find("option:selected").text();
	$('#search_box').find('div').fadeOut("fast");
	$("form.category_search_form select:nth-child(1) option").attr('selected', false)
	$("form.category_search_form select:nth-child(1) option:contains('"+catBoxText+"')").attr('selected', true);
	$("form.search_form select option:nth-child(1)").attr('selected', true);
	$('#search_box input').val("Keyword");
	$('div[data-tag="'+catBox+'"]').fadeIn("slow");
});
	// ]]>
</script> 
 <script type="text/javascript">
// <![CDATA[ 
function beginSearch() {
	var keyword = $("input[name='s']:visible").val().replace("Keyword","");
	var keyword_serial = keyword.replace(" ","+");
	if (keyword_serial.substring(keyword_serial.length - 1, keyword_serial.length) == "+"){
		var keyword_serial = keyword_serial.substring(0, keyword_serial.length - 1);}
	var cat = $('select[name="cat"]:visible:last').val();
	var form_str = $("form.search_form select:visible:gt(0)");
	var field_keys= [];
	 $(form_str).find("option:selected").each(function() { field_keys.push($(this).val().toLowerCase()) });
	var field_keys_serial= field_keys.join("+");
	var field_keys_serial = field_keys_serial.replace(" ","+");
	var query= "http://www.jetsetmag.com/classifieds/?s="+keyword_serial+"+"+field_keys_serial+"&sa=search&cat="+cat;
	if (query.indexOf('*') >= 0) {
	var query = query.replace("*","What+are+you+looking+for%3F");}
	if (query.indexOf('?s=&') >= 0) {
	var query = query.replace("?s=&","?s=What+are+you+looking+for%3F&");}
	if (query.indexOf('?s=+What+are+you+looking+for%3F&sa') >= 0) {	
	var query = query.replace("?s=+What+are+you+looking+for%3F&sa","?s=What+are+you+looking+for%3F&");	}
	if (query.indexOf('?s=+&sa') >= 0) {
	var query = query.replace("?s=+&sa","?s=What+are+you+looking+for%3F&");}
	if (query.indexOf('+&sa=search') >= 0) {
	var query = query.replace("+&sa=search","&=search");}
	if (query.indexOf('All Categories') >= 0) {
	var query = query.replace("All Categories","0");}
	if (query.indexOf('?s=+') >= 0) {
	var query = query.replace("?s=+","?s=");}
	location.href = query;}
    $(".search_button").click(beginSearch);
// ]]>
</script>           
					<!--end search boxes-->
					</div><!-- /shadowblock -->

				</div><!-- /shadowblock_out -->
<div class="shadowblock_out">

				<div class="shadowblock">

					<h1 class="single dotted">
						<?php 
							$searchTxt = trim( strip_tags( esc_attr( get_search_query() ) ) );
							if ( $searchTxt ==  __('What are you looking for?','appthemes') ) $searchTxt = '*';
							printf( __("Search for '%s' returned %s results",'appthemes'), $searchTxt, $wp_query->found_posts ); 
						?>
                        </h1>
                        </div></div>

                <?php get_template_part( 'loop', 'ad_listing' ); ?>
				

			<?php else: ?>


				<div class="shadowblock_out">

					<div class="shadowblock">

						<h1 class="single dotted"><?php printf( __("Search for '%s' returned %s results",'appthemes'), trim( strip_tags( esc_attr( get_search_query() ) ) ), $wp_query->found_posts ); ?></h1>

						<p><?php _e('Sorry, no listings were found.','appthemes')?></p>
						<p class="suggest"><?php // appthemes_search_suggest(); // deprecated by Yahoo ?></p>

					</div><!-- /shadowblock -->

				</div><!-- /shadowblock_out -->


			<?php endif; ?>


            <div class="pad5"></div>

            <div class="clr"></div>


            <?php
            // show the ad block if it's been activated
            if ( get_option('cp_adcode_336x280_enable') == 'yes' ) :

                if ( function_exists('appthemes_single_ad_336x280') ) { ?>

                <div class="shadowblock_out">

                    <div class="shadowblock">

                      <h2 class="dotted"><?php _e('Sponsored Links','appthemes') ?></h2>

                      <?php appthemes_single_ad_336x280(); ?>

                    </div><!-- /shadowblock -->

                </div><!-- /shadowblock_out -->

            <?php
                }

            endif;
            ?>

            <div class="clr"></div>

        </div><!-- /content_left -->

        <?php get_sidebar(); ?>

        <div class="clr"></div>

      </div><!-- /content_res -->

    </div><!-- /content_botbg -->

  </div><!-- /content -->



<?php get_footer(); ?>
