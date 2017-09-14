<div class="row">
	<div class="col-md-12">
		<div class="grid no-border">
			
			<div class="grid-body">


			<div>

			<?php
				mysql_connect("localhost","root","")or die("error");
				mysql_select_db("bogorvalleyapartement")or die("database tidak tersedia");
				$query=mysql_query("select * from tabel_jadwal");
				$data=mysql_fetch_array($query);
			?>
				<?php echo"<img src=../".$data['nama_file']." width='100%' style='margin:-7px;' >"; ?>
			</div>
			
			
		</div>
		</div>
	</div>
</div>	