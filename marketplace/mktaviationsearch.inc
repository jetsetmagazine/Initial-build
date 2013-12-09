<script type="text/javascript">     
$(document).ready(function() {

if ($("#jets-search-form").val() == "78") {
   $('#airbus').show();
} else {
   $('#airbus').show();
}

});
</script>

<style type="text/css">
a.selectBox.model.selectBox-dropdown{display: none!important;}
</style>

<div class="formContain">

<form action="" method="post" id="jets-search-form" name="jets-search-form" class="">
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
                              
					<select name="78_model" id="" class="model" style="display:none;">
						<option value="78" selected="selected">All Airbus Models</option>
						<option value="4000">4000</option>
                                    <option value="ACJ319">ACJ319</option>
					</select>
                  
					<select name="63_model" id="" class="model" style="display: none;">
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
                
					<select name="61_model" id="" class="model" style="display: none;">
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
				
					<select name="85_model" id="" class="model" style="display: none;">
						<option value="85" selected="selected">All Boeing Models</option>
                                    <option value="727">727</option>
                                    <option value="737">737</option>
                                    <option value="BBJ">BBJ</option>
					</select>
                  
					<select name="60_model" id="" class="model" style="display: none;">
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
                  
					<select name="88_model" id="" class="model selectBox-dropdown" style="display: none;">
                                    <option value="88" selected="selected">All Cirrus Models</option>
                                    <option value="SR20">SR20</option>
                                    <option value="SR22 G3">SR22 G3</option>
					</select>
                  
					<select name="62_model" id="" class="model selectBox-dropdown" style="display: none;">
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
                  
					<select name="70_model" id="" class="model selectBox-dropdown" style="display: none;">
                                	<option value="70" selected="selected">All Eclipse Models</option>
                                	<option value="500">500</option>
					</select>
                  
					<select name="68_model" id="" class="model selectBox-dropdown" style="display: none;">
                                    <option value="68" selected="selected">All Embrarer Models</option>
                                    <option value="ERJ 145">ERJ 145</option>
                                    <option value="Legacy 600">Legacy 600</option>
                                    <option value="Phenom 100">Phenom 100</option>
					</select>
                  
					<select name="64_model" id="" class="model selectBox-dropdown" style="display: none;">
                                    <option value="64" selected="selected">All Gulfstream Models</option>
                                    <option value="G-II">G-II</option>
                                    <option value="G-III">G-III</option>
                                    <option value="G-IV">G-IV</option>
                                    <option value="G400">G400</option>
                                    <option value="G450">G450</option>
                                    <option value="G550">G550</option>
					</select>
                  
					<select name="67_model" id="" class="model selectBox-dropdown" style="display: none;">
                                    <option value="67" selected="selected">All Hawker Models</option>
                                    <option value="400">400</option>
                                    <option value="400XP">400XP</option>
                                    <option value="700">700</option>
                                    <option value="850XP">850XP</option>
                                    <option value="900XP">900XP</option>
                                    <option value="*">Other</option>
					</select>
                
					<select name="77_model" id="" class="model selectBox-dropdown" style="display: none;">
                                	<option value="77" selected="selected">All Honda Jet Models</option>
                                	<option value="Honda Jet model">Honda Jet model</option>
					</select>
                  
					<select name="93_model" id="" class="model selectBox-dropdown" style="display: none;">
                                	<option value="93" selected="selected">All Israel Aircraft Industries Models</option>
                                	<option value="1124 Westwind I">1124 Westwind I</option>
					</select>

					<select name="65_model" id="" class="model selectBox-dropdown" style="display: none;">
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

					<select name="84_model" id="" class="model selectBox-dropdown" style="display: none;">
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
                  
					<select name="66_model" id="" class="model selectBox-dropdown" style="display: none;">
                                    <option value="66" selected="selected">All Piper Models</option>
                                    <option value="PA-18 Super Cub">PA-18 Super Cub</option>
                                    <option value="PA-24 Comanche">PA-24 Comanche</option>
                                    <option value="PA-28 Cherokee">PA-28 Cherokee</option>
                                    <option value="PA-28 Cherokee Arrow">PA-28 Cherokee Arrow</option>
                                    <option value="PA-30 Twin Comanche">PA-30 Twin Comanche</option>
                                    <option value="PA-31 Navajo Chieftain">PA-31 Navajo Chieftain</option>
                                    <option value="PA-31T Cheyenne">PA-31T Cheyenne</option>
                                    <option value="&gt;PA-32 Cherokee Six">PA-32 Cherokee Six</option>
                                    <option value="PA-32 Saratoga">PA-32 Saratoga</option>
                                    <option value="PA-34 Seneca">PA-34 Seneca</option>
                                    <option value="PA-46 JetPROP">PA-46 JetPROP</option>
                                    <option value="PA-46 Malibu Mirage">PA-46 Malibu Mirage</option>
					</select>
                  
					<select name="69_model" id="" class="model selectBox-dropdown" style="display: none;">
                                	<option value="69" selected="selected">All Pilatus Models</option>
                                	<option value="PC-12">PC-12</option>
					</select>
                    
                    <select name="91_model" id="" class="model selectBox-dropdown" style="display: none;">
                                	<option value="91" selected="selected">All Other Models</option>
					</select>
                              <br /><br />
					<input name="s" type="text" id="s" tabindex="1" class="editbox_search ui-autocomplete-input" value="Keyword" onfocus="if (this.value == 'Keyword') {this.value = '';}" autocomplete="off" role="textbox" aria-autocomplete="list" aria-haspopup="true">
					<button type="button" value="Search" class="search_button">Search</button>
                </form>

</div>