<style type="text/css">
.linkon { height: auto; }
.linkon, .linkon tr td { color: #444; margin: 0; padding: 0; border-spacing: 0; }
.linkon tr td { border: 1px solid #EFEFEF; margin: 0; padding: 5px; }
</style><div class="container">
<div class="flexigrid crud-form" style="width: 100%; padding-left: 25px;" data-unique-hash="7a45cae1c8ba828e30dc4536895a73ba">
	<div class="mDiv">
		<div class="ftitle">
			<div class="ftitle-left" style="font-size: 22px; margin-top: 10px;">
				Links on this Rotator			</div>
			<div class="clear"></div>
		</div>
		<div title="Minimize/Maximize" class="ptogtitle">
			<span></span>
		</div>
	</div>
<div id="main-table-box">

	<div class="form-div">
		<?php
			echo "<table class='linkon' ><tr><td>URL</td><td>Weight</td></tr>";
					foreach ($links as $slinks) 
					{
						echo "<tr><td>".$slinks['url']."</td><td>".$slinks['weight']."</td></tr>";

					}
					echo "</table>";
	
	?>
		
				<div class="clear"></div>
			</div>
							
	</div>

</div>
</div></div>