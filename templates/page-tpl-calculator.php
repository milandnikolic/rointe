<?php /* Template Name: Calculator for requirements */ get_header(); ?>
<?php 
	//vars
	$attach_pdf = get_field('attach_pdf');
	$text_for_pdf = get_field('text_for_pdf');
?>

<div class="container">
	<h1 class="text-center green calculator-title">Radiators recommended by square meter & climatic zone </h1>

	<div class="row">
		<div class="col-md-6">
			<img src="<?php echo get_template_directory_uri(); ?>/img/map-uk.jpg" class="user-img">
		</div>
		<div class="col-md-6">
			<div class="text-right">
				<button class="go-back" onclick="window.history.go(-1); return false;"><i class="fa fa-undo"></i>&nbsp; Go Back</button>
			</div>
			<div class="calculate-fields">
				<form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST" id="filter" class="calculator-wrapper">
	

				<div class="select-area row">
					<div class="col-md-6 text-right">
					<label for="uk-area">Your location</label>
					</div>

					<div class="col-md-6">
					<select class="js-example-basic-single" name="uk_area">
						  <option></option>
						  <option value="0.85">ABERDEEN</option>
						  <option value="0.80">ST.ALBANS</option>
						  <option value="0.80">BIRMINGHAM</option>
						  <option value="0.75">BATH</option>
						  <option value="0.80">BLACKBURN</option>
						  <option value="0.80">BRADFORD</option>
						  <option value="0.75">BOURNEMOUTH</option>
						  <option value="0.75">BRIGHTON</option>
						  <option value="0.75">BROMLEY</option>
						  <option value="0.75">BRISTOL</option>
						  <option value="0.80">BELFAST</option>
						  <option value="0.80">ANTRIM</option>
						  <option value="0.75">ARMAGH</option>
						  <option value="0.75">DOWN</option>
						  <option value="0.75">FERMANAGH</option>
						  <option value="0.75">LONDONDERRY</option>
						  <option value="0.80">TYRONE</option>
						  <option value="0.80">CARLISLE</option>
						  <option value="0.75">CAMBRIDGE</option>
						  <option value="0.75">CARDIFF</option>
						  <option value="0.80">CHESTER</option>
						  <option value="0.75">CHELMSFORD</option>
						  <option value="0.80">COLCHESTER</option>
						  <option value="0.75">CROYDON</option>
						  <option value="0.75">CANTERBURY</option>
						  <option value="0.80">COVENTRY</option>
						  <option value="0.80">CREWE</option>
						  <option value="0.75">DARTFORD</option>
						  <option value="0.85">DUNDEE</option>
						  <option value="0.80">DERBY</option>
						  <option value="0.85">DUMFRIES</option>
						  <option value="0.80">DURHAM</option>
						  <option value="0.80">DARLINGTON</option>
						  <option value="0.80">DONCASTER</option>
						  <option value="0.75">DORCHESTER</option>
						  <option value="0.80">DUDLEY</option>
						  <option value="0.75">LONDON </option>
						  <option value="0.85">EDIMBURGH</option>
						  <option value="0.75">ENFIELD</option>
						  <option value="0.75">EXETER</option>
						  <option value="0.85">FALKIRK</option>
						  <option value="0.75">BLACKPOOL</option>
						  <option value="0.85">GLASGOW</option>
						  <option value="0.75">GLOUCESTER</option>
						  <option value="0.75">GUILDFORD</option>
						  <option value="0.75">ISLE OF GUERNSEY</option>
						  <option value="0.75">HARROW</option>
						  <option value="0.85">HUDDERSFIELD</option>
						  <option value="0.85">HARRAGOTE</option>
						  <option value="0.80">HEMEL HEMPSTEAD</option>
						  <option value="0.75">HEREFORD</option>
						  <option value="0.85">STORNOWAY</option>
						  <option value="0.75">HULL</option>
						  <option value="0.85">HALIFAX</option>
						  <option value="0.75">ILFORD</option>
						  <option value="0.75">ISLE OF MAN</option>
						  <option value="0.80">IPSWICH</option>
						  <option value="0.85">INVERNESS</option>
						  <option value="0.75">ISLE OF JERSEY</option>
						  <option value="0.85">KILMARNOCK</option>
						  <option value="0.75">KINGSTON UPON THAMES</option>
						  <option value="0.90">KIRKWALL</option>
						  <option value="0.85">KIRKALDY</option>
						  <option value="0.75">LIVERPOOL</option>
						  <option value="0.75">LANCASTER</option>
						  <option value="0.85">LLANDRINDOD</option>
						  <option value="0.80">LEICESTER</option>
						  <option value="0.75">LLANDUDNO</option>
						  <option value="0.80">LINCOLN</option>
						  <option value="0.85">LEEDS</option>
						  <option value="0.75">LUTON</option>
						  <option value="0.75">MANCHESTER</option>
						  <option value="0.75">MEDWAY</option>
						  <option value="0.80">MILTON KEYNES</option>
						  <option value="0.90">MOTHERWELL</option>
						  <option value="0.80">NEWCASTLE</option>
						  <option value="0.75">NOTTINGHAM</option>
						  <option value="0.80">NORTHAMPTON</option>
						  <option value="0.80">NEWPORT</option>
						  <option value="0.80">NORWICH</option>
						  <option value="0.75">OLDHAM</option>
						  <option value="0.75">OXFORD</option>
						  <option value="0.90">PAISLEY</option>
						  <option value="0.80">PETERBOROUGH</option>
						  <option value="0.85">PERTH</option>
						  <option value="0.75">PLYMOUTH</option>
						  <option value="0.75">PORTSMOUTH</option>
						  <option value="0.75">ISLE OF WIGHT</option>
						  <option value="0.80">PRESTON</option>
						  <option value="0.75">READING</option>
						  <option value="0.75">REDHILL</option>
						  <option value="0.75">ROMFORD</option>
						  <option value="0.80">SHEFFIELD</option>
						  <option value="0.75">SWANSEA</option>
						  <option value="0.80">STEVENAGE</option>
						  <option value="0.80">STOCKPORT</option>
						  <option value="0.75">SLOUGH</option>
						  <option value="0.75">SUTTON</option>
						  <option value="0.75">SWINDON</option>
						  <option value="0.75">SUOTHAMPTON</option>
						  <option value="0.75">SALISBURY</option>
						  <option value="0.85">SUNDERLAND</option>
						  <option value="0.75">SOUTHEND ON SEA</option>
						  <option value="0.80">STOKE ON TRENT</option>
						  <option value="0.75">TAUNTON</option>
						  <option value="0.90">GALASHIELDS</option>
						  <option value="0.80">TELFORD</option>
						  <option value="0.75">TONBRIDGE</option>
						  <option value="0.75">TORQUAY</option>
						  <option value="0.75">TRURO</option>
						  <option value="0.85">CLEVELAND</option>
						  <option value="0.75">TWICKENHAM</option>
						  <option value="0.75">SOUTHALL</option>
						  <option value="0.75">WARRINGTON</option>
						  <option value="0.75">WATFORD</option>
						  <option value="0.80">WAKEFIELD</option>
						  <option value="0.75">WIGAN</option>
						  <option value="0.75">WORCESTER</option>
						  <option value="0.80">WALSALL</option>
						  <option value="0.80">WOLVERHAMPTON</option>
						  <option value="0.80">YORK</option>
						  <option value="0.90">LERWICK</option>
						  <option value="0.80">CARLOW</option>
						  <option value="0.85">CAVAN</option>
						  <option value="0.80">CLARE</option>
						  <option value="0.80">CORK</option>
						  <option value="0.85">DONEGAL</option>
						  <option value="0.75">DUBLIN</option>
						  <option value="0.80">GALWAY</option>
						  <option value="0.75">KERRY</option>
						  <option value="0.80">KILDARE</option>
						  <option value="0.80">KILKENNY</option>
						  <option value="0.80">LAOIS</option>
						  <option value="0.85">LEITRIM</option>
						  <option value="0.85">LIMERICK</option>
						  <option value="0.85">LONGFORD</option>
						  <option value="0.85">LOUTH</option>
						  <option value="0.80">LONGFORD</option>
						  <option value="0.85">MAYO</option>
						  <option value="0.85">MONAGHAN</option>
						  <option value="0.85">OFFALY</option>
						  <option value="0.85">ROSCOMMON</option>
						  <option value="0.80">SLIGO</option>
						  <option value="0.85">TIPPERARY</option>
						  <option value="0.85">WESTMEATH</option>
						  <option value="0.75">WEXFORD</option>
						   <option value="0.80">WICKLOW</option>
					</select>
					</div>
				</div>
				<div class="width-wrap row">
					<div class="col-md-6 text-right">
						<label for="area-width">Room width (m)</label>
					</div>
					<div class="col-md-6">
			    		<input type="text" class="area-width" name="area_width" >
			    	</div>
				</div>

				<div class="length-wrap row">
					<div class="col-md-6 text-right">
						<label for="area-length">Room length (m)</label>
					</div>
					<div class="col-md-6">
						<input type="text" class="area-length" name="area_length" >
					</div>
				</div>

				<div class="length-wrap row">
					<div class="col-md-6 text-right">
						<label for="area-length">Room height (m)</label>
					</div>
					<div class="col-md-6">
						<input type="text" class="area-height" name="area_height" >
					</div>
				</div>

				<div class="length-wrap row">
					<div class="col-md-6 text-right">
						<label for="area-length">Collection of radiators </label>
					</div>
					<div class="col-md-6">
						<select name="categoryradiator"  class="category-radiators">
							<option></option>
							<option value="51">D Series</option>
							<option value="52">Kyros</option>
						</select>
					</div>
				</div>

<button class="applyfilter"></button>
	<input type="hidden" name="action" value="myfilter">
		<img src="<?php echo get_template_directory_uri(); ?>/img/eclipse.svg" class="loader-gif vertical-align-center">
			<div class="text-center">
				<button type="submit" class="calculate" name="calculate-submit">Calculate your requirements</button>
			</div>
	</form>
	<h3 class="recommended-radiator">
		Radiator recommended x <span class="counter-recommend">1</span>
	</h3>	
	<div id="response">	</div>		
			</div>
		</div>
	</div>


	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
		<div class="content-wrapper orange-bg">
			<?php if( get_field('attach_pdf') ): ?>
			<div class="attached-pdf">				
				<a href="<?php the_field('attach_pdf'); ?>" target="_blank" ><i class="fa fa-file"></i> <?php echo $text_for_pdf; ?></a>					
			</div>
			<?php endif; ?>
			<?php the_content(); ?>
		</div>
			
		<?php endwhile; ?>	
	<?php endif; ?>	



</div><!--  /container -->


<?php get_footer(); ?>