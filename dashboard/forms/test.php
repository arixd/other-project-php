
					<div class="form-group">
						<label class="col-sm-2 control-label">Nip</label>
						<div class="col-md-4">
							<input type="text"  class="form-control" name="nip_menganti" id="nip_pengganti" onkeyup="isi_otomatis()">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Name</label>
						<div class="col-md-4">
							<input type="text" readonly="readonly" class="form-control" name="name"  id="name_pengganti">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">Divisi</label>
						<div class="col-md-4">
							<input type="text" readonly="readonly" class="form-control" name="divisi" id="divisi_pengganti">
						</div>
					</div>
				


<script src="../assets/plugins/jquery-2.1.0.min.js"></script>
<script type="text/javascript">
            function isi_otomatis(){
            	var nip = $("#nip_pengganti").val();
            	$.ajax({
                    url: 'proses-ajax-tukarjaga.php',
                    data:"nip="+nip ,
                }).success(function (data) {
                    var json = data,
                    obj = JSON.parse(json);
                    $("#nip_pengganti").val(obj.nip_meminta);
                    $('#name_pengganti').val(obj.name);
                    $('#divisi_pengganti').val(obj.divisi);
                });
            }
</script>

