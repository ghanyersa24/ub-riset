      <!-- Main Content -->

      <div class="main-content">
      	<section class="section">
      		<div class="section-header">
      			<h1><?= $title ?></h1>
      		</div>
      		<button class="btn btn-info " data-toggle="modal" data-target="#add" style="position: fixed; bottom: 36px;   right: 20px; padding: 18.5px;z-index: 10;">
      			<i class="fa fa-plus"></i>
      		</button>
      		<div class="section-body">
      			<div class="row">
      				<div class="col-12">
      					<div class="card">
      						<div class="card-body">
      							<div class="table-responsive">
      								<table class="table table-striped" id="table">
      									<thead>
      										<tr>
      											<th class="text-center">
      												#
      											</th>
      											<th>Name</th>
      											<th>Address</th>
      											<th>Member</th>
      											<th>Action</th>
      										</tr>
      									</thead>
      									<tfoot>
      										<tr>
      											<th class="text-center">
      												#
      											</th>
      											<th class="table_search"></th>
      											<th class="table_search"></th>
      											<th class="table_search"></th>
      											<th>#</th>
      										</tr>
      									</tfoot>
      								</table>
      							</div>
      						</div>
      					</div>
      				</div>
      			</div>
      		</div>
      	</section>
      </div>
      <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin="" />
      <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js" integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og==" crossorigin=""></script>

      <div class="modal fade" id="add">
      	<div class="modal-dialog modal-xl" role="document">
      		<div class="modal-content">
      			<div class="modal-header">
      				<h5 class="modal-title" id="exampleModalLabel">Detail <?= $title ?></h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
      			</div>
      			<div class="modal-body row" id="form-data">

      				<div class="col-sm-4" style=" border-right: 5px solid;">
      					<div class="row">
      						<div class="form-group col-sm-12"> <label for="name">Name</label>
      							<input type="text" class="form-control" id="name" name="name">
      						</div>
      						<div class="form-group col-sm-6">
      							<label for="nama">Username</label>
      							<input type="text" class="form-control" id="username" name="username">
      						</div>
      						<div class="form-group col-sm-6">
      							<label for="password">Password</label>
      							<input type="password" class="form-control" id="password" name="password">
      						</div>

      						<div class="form-group col-sm-6"> <label for="telp">Telp</label>
      							<input type="text" class="form-control" id="telp" name="telp">
      						</div>
      						<div class="form-group col-sm-6"> <label for="email">E-mail</label>
      							<input type="text" class="form-control" id="email" name="email">
      						</div>
      						<div class="form-group col-12">
      							<label for="role">Role</label>
      							<select class="custom-select col" id="add-role">
      								<option value="admin">admin</option>
      								<option value="agent">agent</option>
      							</select>
      						</div>
      					</div>

      					<!-- <img src="#" alt="Foto <?= $title ?>" id="edit-foto" class="img-fluid"> -->
      				</div>
      				<div class="col-sm-8">
      					<div class="row">
      						<div class="col-sm-8">
      							<div class="input-group mb-3">
      								<input type="text" name="addr" id="addr" class="form-control" placeholder="search location" aria-label="search location" aria-describedby="button-addon2">
      								<div class="input-group-append">
      									<button class="btn btn-outline-info" type="button" id="button-addon2" onclick="addr_search();">Cari</button>
      								</div>
      							</div>
      							<div class="form-group">
      								<div id="map" class="rounded" style="width:100%;height: 360px;padding:0;margin:0;"></div>
      							</div>
      						</div>
      						<div class="col-sm-4">
      							<div class="form-group">
      								<label for="address">list</label>
      								<ol id="results"></ol>
      							</div>

      							<div class="row">
      								<div class="col-sm-12">
      									<label for="add-address" class="control-label">Address</label>
      									<div class="form-group">
      										<input type="text" name="address" value="" class="form-control" id="add-address" />
      									</div>
      								</div>
      								<div class="col-sm-6">
      									<label for="add-lat" class="control-label">Lat</label>
      									<div class="form-group">
      										<input type="number" name="lat" value="" class="form-control" id="add-lat" />
      									</div>
      								</div>
      								<div class="col-sm-6">
      									<label for="add-lon" class="control-label">Long</label>
      									<div class="form-group">
      										<input type="number" name="lon" value="" class="form-control" id="add-lon" />
      									</div>
      								</div>
      							</div>
      						</div>
      					</div>
      				</div>
      			</div>
      			<div class="modal-footer">
      				<button type="button" class="btn btn-outline-default" data-dismiss="modal">Close</button>
      				<button type="button" class="btn btn-info" onclick="add()">Save</button>
      			</div>
      		</div>
      	</div>
      </div>

      <div class="modal fade" id="view">
      	<div class="modal-dialog modal-xl" role="document">
      		<div class="modal-content">
      			<div class="modal-header">
      				<h5 class="modal-title" id="exampleModalLabel">Detail <?= $title ?></h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
      			</div>
      			<div class="modal-body row" id="form-data">
      				<input type="text" class="form-control" id="id" name="id" readonly hidden>
      				<input type="text" class="form-control" id="edit-password" name="password" readonly hidden>

      				<div class="col-sm-4" style=" border-right: 5px solid;">
      					<div class="row">
      						<div class="form-group col-sm-12"> <label for="view-name">Name</label>
      							<input type="text" class="form-control" id="view-name" name="name">
      						</div>
      						<div class="form-group col-sm-12">
      							<label for="view-username">Username</label>
      							<input type="text" class="form-control" id="view-username" name="username" readonly>
      						</div>

      						<div class="form-group col-sm-6"> <label for="view-telp">Telp</label>
      							<input type="text" class="form-control" id="view-telp" name="telp">
      						</div>
      						<div class="form-group col-sm-6"> <label for="view-email">E-mail</label>
      							<input type="text" class="form-control" id="view-email" name="email">
      						</div>
      						<div class="form-group col-12">
      							<label for="role">Role</label>
      							<select class="custom-select col" id="view-role">
      								<option value="admin">admin</option>
      								<option value="agent">agent</option>
      							</select>
      						</div>
      					</div>
      				</div>
      				<div class="col-sm-8">
      					<div class="row">
      						<div class="col-sm-8">
      							<div class="input-group mb-3">
      								<input type="text" name="addr" id="view-addr" class="form-control" placeholder="search location" aria-label="search location" aria-describedby="button-addon2">
      								<div class="input-group-append">
      									<button class="btn btn-outline-info" type="button" id="button-addon2" onclick="view_addr_search();">Cari</button>
      								</div>
      							</div>
      							<div class="form-group" id="div-view-map">
      							</div>
      						</div>
      						<div class="col-sm-4">
      							<div class="form-group">
      								<label for="view-result">list</label>
      								<ol id="view-results"></ol>
      							</div>

      							<div class="row">
      								<div class="col-sm-12">
      									<label for="view-address" class="control-label">Address</label>
      									<div class="form-group">
      										<input type="text" name="address" value="" class="form-control" id="view-address" />
      									</div>
      								</div>
      								<div class="col-sm-6">
      									<label for="view-lat" class="control-label">Lat</label>
      									<div class="form-group">
      										<input type="number" name="lat" value="" class="form-control" id="view-lat" />
      									</div>
      								</div>
      								<div class="col-sm-6">
      									<label for="view-lon" class="control-label">Long</label>
      									<div class="form-group">
      										<input type="number" name="lon" value="" class="form-control" id="view-lon" />
      									</div>
      								</div>
      							</div>
      						</div>
      					</div>
      				</div>
      			</div>
      			<div class="modal-footer">
      				<button type="button" class="btn btn-outline-default" onclick="del()"> Delete</button>
      				<button type="button" class="btn btn-info" onclick="save()">Save</button>
      			</div>
      		</div>
      	</div>
      </div>

      <script>
      	var number = 0,
      		is_update;
      	$(document).ready(function() {
      		$('#table').DataTable({
      			"ajax": api + 'actor/zero/get',
      			'dom': '<"c8tableTools01"Bf><"c8tableBody"t><"c8tableTools02"lipr>',
      			"columns": [{
      				"render": function() {
      					return get_index();
      				},
      				className: "text-center"
      			}, {
      				"data": "name"
      			}, {
      				"data": "address"
      			}, {
      				"data": "role"
      			}, {
      				"render": function(data, type, JsonResultRow, meta) {
      					return '<button class="btn btn-primary"><i class="fa fa-eye"></i> Detail </button>';
      				}
      			}]
      		});

      		$('#table tbody').on('click', 'button', function() {
      			var data = table.row($(this).parents('tr')).data();
      			$('#id').val(data.id);
      			$('#view-username').val(data.username);
      			$('#view-password').val(data.password);
      			$('#view-role').val(data.role);
      			$('#view-name').val(data.name);
      			$('#view-address').val(data.address);
      			$('#view-lat').val(data.latitude);
      			$('#view-lon').val(data.longitude);
      			view_map(data.latitude, data.longitude);
      			$('#view-telp').val(data.telp);
      			$('#view-email').val(data.email);
      			$('#view').modal('show');
      		});
      		var table = $('#table').DataTable();
      		table.columns().every(function() {
      			var that = this;
      			$('input', this.footer()).on('keyup change clear', function() {
      				if (that.search() !== this.value) {
      					that
      						.search(this.value)
      						.draw();
      				}
      			});
      		});
      	});

      	function get_index() {
      		if (is_update) {
      			number = 1;
      			is_update = false;
      		} else {
      			number++;
      		}
      		return number;
      	}

      	function add() {
      		$.ajax({
      			url: api + 'account/register/zero',
      			type: 'POST',
      			data: {
      				username: $("#username").val(),
      				password: $("#password").val(),
      				name: $("#name").val(),
      				role: $("#add-role").val(),
      				address: $("#add-address").val(),
      				latitude: $("#add-lat").val(),
      				longitude: $("#add-lon").val(),
      				telp: $("#telp").val(),
      				email: $("#email").val(),
      			},
      			success: function(r) {
      				if (!r.error) {
      					is_update = true;
      					$('#add').modal('hide');
      					$('#table').dataTable().api().ajax.reload();
      					swal('Success !', r.message, 'success');
      				} else {
      					swal('Error !', r.message, 'error');
      				}
      			},
      			statusCode: {
      				500: function() {
      					swal({
      						icon: "error",
      						title: "Error !",
      						text: "Something is error."
      					})
      				}
      			}
      		})
      	}

      	function del() {
      		$("#edit-name, #edit-address, #edit-telp, #edit-email").attr("readonly", true);
      		$("#edit-role").attr("disabled", true);
      		swal("Apakah kamu yakin menghapus data ?", {
      			icon: "info",
      			buttons: {
      				cancel: "Batal",
      				Yakin: true
      			},
      		}).then((value) => {
      			if (value == 'Yakin') {
      				$.ajax({
      					url: api + 'actor/zero/delete',
      					type: 'POST',
      					dataType: 'json',
      					data: {
      						id: $('#id').val()
      					},
      					success: function(r) {
      						if (!r.error) {
      							is_update = true;
      							$('#view').modal('hide');
      							$('#table').dataTable().api().ajax.reload();
      							swal('Success !', r.message, 'success');
      						} else {
      							swal('Error !', r.error, 'error');
      						}
      					}
      				});
      			}
      		});
      	}

      	function save() {
      		$.ajax({
      			url: api + 'account/update/zero',
      			type: 'POST',
      			data: {
      				id: $("#id").val(),
      				username: $("#view-username").val(),
      				password: $("#view-password").val(),
      				name: $("#view-name").val(),
      				role: $("#view-role").val(),
      				address: $("#view-address").val(),
      				latitude: $("#view-lat").val(),
      				longitude: $("#view-lon").val(),
      				telp: $("#view-telp").val(),
      				email: $("#view-email").val(),
      			},
      			success: function(r) {
      				if (!r.error) {
      					is_update = true;
      					$('#view').modal('hide');
      					swal('Success !', r.message, 'success');
      					$('#table').dataTable().api().ajax.reload();
      				} else {
      					swal('Error !', r.message, 'error');
      				}
      			}
      		})
      	}
      </script>
      <script>
      	var startlon = 112.6034231;
      	var startlat = -7.9568197;

      	var options = {
      		center: [startlat, startlon],
      		zoom: 12
      	}
      	$('#add-lat').val(startlat);
      	$('#add-lon').val(startlon);

      	function render_map(lat, lon) {
      		if (lat != "" && lon != "") {
      			console.log('render map');
      			var newLatLng = new L.LatLng(lat, lon);
      			// map.panTo(new L.LatLng(lat, lon));
      			myMarker.setLatLng(newLatLng);
      			map.setView(myMarker.getLatLng(), 13);
      			$('#add-lat').val(lat);
      			$('#add-lon').val(lon);
      		}

      		// map.invalidateSize();
      	}

      	var map = L.map('map').setView([startlat, startlon], 13);
      	var nzoom = 12;

      	L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
      		maxZoom: 18,
      		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
      			'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
      			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
      		id: 'mapbox.streets'
      	}).addTo(map);

      	var myMarker = L.marker([startlat, startlon], {
      		title: "Coordinates",
      		alt: "Coordinates",
      		draggable: true
      	}).addTo(map).on('dragend', function() {
      		var lat = myMarker.getLatLng().lat.toFixed(8);
      		var lon = myMarker.getLatLng().lng.toFixed(8);
      		var czoom = map.getZoom();
      		if (czoom < 18) {
      			nzoom = czoom + 2;
      		}
      		if (nzoom > 18) {
      			nzoom = 18;
      		}
      		if (czoom != 18) {
      			map.setView([lat, lon], nzoom);
      		} else {
      			map.setView([lat, lon]);
      		}
      		document.getElementById('lat').value = lat;
      		document.getElementById('lon').value = lon;
      		myMarker.bindPopup("Lat " + lat + "<br />Lon " + lon).openPopup();
      	});

      	function chooseAddr(lat1, lng1, display_name) {
      		myMarker.closePopup();
      		map.setView([lat1, lng1], 18);
      		myMarker.setLatLng([lat1, lng1]);
      		lat = lat1.toFixed(8);
      		lon = lng1.toFixed(8);
      		$('#add-address').val(`${display_name}`);
      		document.getElementById('add-lat').value = lat;
      		document.getElementById('add-lon').value = lon;
      		myMarker.bindPopup(display_name + "<br /> Lat " + lat + " & Lon " + lon).openPopup();
      	}

      	function myFunction(arr) {
      		var out = "<br />";
      		var i;

      		if (arr.length > 0) {
      			for (i = 0; i < arr.length; i++) {
      				out += "<li class='address text-yellow' title='Show Location and Coordinates' onclick='chooseAddr(" + arr[i].lat + ", " + arr[i].lon + ", `" + arr[i].display_name + "`);return false;'>" + arr[i].display_name + "</li>";
      			}
      			document.getElementById('results').innerHTML = out;
      		} else {
      			document.getElementById('results').innerHTML = "Sorry, no results...";
      		}

      	}

      	function addr_search() {
      		var inp = document.getElementById("addr");
      		var xmlhttp = new XMLHttpRequest();
      		var url = "https://nominatim.openstreetmap.org/search?format=json&limit=3&q=" + inp.value;
      		xmlhttp.onreadystatechange = function() {
      			if (this.readyState == 4 && this.status == 200) {
      				var myArr = JSON.parse(this.responseText);
      				myFunction(myArr);
      			}
      		};
      		xmlhttp.open("GET", url, true);
      		xmlhttp.send();
      	}
      </script>
      <script>
      	function view_map(viewlat, viewlon) {
      		$('#div-view-map').html('<div id="view-map" class="rounded" style="width:100%;height: 360px;padding:0;margin:0;"></div>');
      		var options = {
      			center: [viewlat, viewlon],
      			zoom: 12
      		}
      		$('#view-lat').val(viewlat);
      		$('#view-lon').val(viewlon);
      		var map = L.map('view-map').setView([viewlat, viewlon], 13);
      		var nzoom = 12;

      		L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
      			maxZoom: 18,
      			attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
      				'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
      				'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
      			id: 'mapbox.streets'
      		}).addTo(map);

      		var myMarker = L.marker([viewlat, viewlon], {
      			title: "Coordinates",
      			alt: "Coordinates",
      			draggable: true
      		}).addTo(map).on('dragend', function() {
      			var lat = myMarker.getLatLng().lat.toFixed(8);
      			var lon = myMarker.getLatLng().lng.toFixed(8);
      			var czoom = map.getZoom();
      			if (czoom < 18) {
      				nzoom = czoom + 2;
      			}
      			if (nzoom > 18) {
      				nzoom = 18;
      			}
      			if (czoom != 18) {
      				map.setView([lat, lon], nzoom);
      			} else {
      				map.setView([lat, lon]);
      			}
      			document.getElementById('view-lat').value = lat;
      			document.getElementById('view-lon').value = lon;
      			myMarker.bindPopup("Lat " + lat + "<br />Lon " + lon).openPopup();
      		});
      	}

      	function view_chooseAddr(lat1, lng1, display_name) {
      		myMarker.closePopup();
      		map.setView([lat1, lng1], 18);
      		myMarker.setLatLng([lat1, lng1]);
      		lat = lat1.toFixed(8);
      		lon = lng1.toFixed(8);
      		$('#view-address').val(`${display_name}`);
      		document.getElementById('view-lat').value = lat;
      		document.getElementById('view-lon').value = lon;
      		myMarker.bindPopup(display_name + "<br /> Lat " + lat + " & Lon " + lon).openPopup();
      	}

      	function view_myFunction(arr) {
      		var out = "<br />";
      		var i;

      		if (arr.length > 0) {
      			for (i = 0; i < arr.length; i++) {
      				out += "<li class='address text-yellow' title='Show Location and Coordinates' onclick='view_chooseAddr(" + arr[i].lat + ", " + arr[i].lon + ", `" + arr[i].display_name + "`);return false;'>" + arr[i].display_name + "</li>";
      			}
      			document.getElementById('view-results').innerHTML = out;
      		} else {
      			document.getElementById('view-results').innerHTML = "Sorry, no results...";
      		}

      	}

      	function view_addr_search() {
      		var inp = document.getElementById("view-addr");
      		var xmlhttp = new XMLHttpRequest();
      		var url = "https://nominatim.openstreetmap.org/search?format=json&limit=3&q=" + inp.value;
      		xmlhttp.onreadystatechange = function() {
      			if (this.readyState == 4 && this.status == 200) {
      				var myArr = JSON.parse(this.responseText);
      				view_myFunction(myArr);
      			}
      		};
      		xmlhttp.open("GET", url, true);
      		xmlhttp.send();
      	}
      </script>
