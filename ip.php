<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Example Website</title>
        <link rel="icon" href="https://via.placeholder.com/50" type="image/png">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
		<link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ==" crossorigin="" />
        <link rel="stylesheet" href="./style.css">
    </head>
    <body>
        <div class="wrapper">
            <header class="header">
                <div class="logo"><i class="fas fa-globe"></i> Example Website</div>
                <div class="menu">
                    <a href="#"><i class="fas fa-home"></i> Home</a>
                    <a href="#"><i class="fas fa-info-circle"></i> About</a>
                </div>
                <div class="avatar">
                    <div class="dropdown">
                        <div class="dropdown-button" id="dropdownMenuButton">
                            <img src="https://via.placeholder.com/50" alt="Avatar">
                            <div>
                                <div class="username">Ramin</div>
                            </div>
                        </div>
                        <div class="dropdown-content">
                            <a href="#">Profile</a>
                            <a href="#">Settings</a>
                            <a href="#">Logout</a>
                        </div>
                    </div>
                </div>
            </header>
			 <?php
				// Get user IP address
				$ip = $_SERVER['REMOTE_ADDR'];

				if (isset($_POST['ip'])) {
					$ip = htmlspecialchars($_POST['ip']);
				}
			?>
            <div class="search-section">
                <h2><i class="fas fa-search box-icon"></i> What is your IP address?</h2>
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <input type="text" name="ip" value="<?php echo $ip; ?>" class="form-control" id="ip-lookup" placeholder="0.0.0.0" autofocus>
                    <button type="submit"><i class="fas fa-search"></i> IP Lookup</button>
                </form>
            </div>
            <div class="section-space"></div>
            <div class="body">
			
			<div class="map-box">
			  <div class="map-header">
				<h2><i class="fas fa-map-marker-alt box-icon"></i> Map</h2>
				<span class="map-ip"><?php echo $ip; ?></span>
				
			  </div>
			  <div class="map-wrapper">
				<div id="map"></div>
			  </div>
			</div>

				<?php
					// Use an IP lookup service or API to get information about the IP address
					$url = 'http://ip-api.com/json/'.$ip;
					$data = file_get_contents($url);
					$details = json_decode($data);
				 ?>
                <div class="info-box">
                    <h2><i class="fas fa-info-circle box-icon"></i> IP Information</h2>
                    <table class="table bg-transparent text-black table-sm my-3">
				  <tr>
					<th>City:</th>
					<td>
					  <code><?php echo $details->city; ?></code>
					</td>
				  </tr>
				  <tr>
					<th>Country:</th>
					<td>
					  <code><?php echo $details->country; ?></code>
					</td>
				  </tr>
				  <tr>
					<th>County Code:</th>
					<td>
					  <code><?php echo $details->countryCode; ?></code>
					</td>
				  </tr>
				  <tr>
					<th>Latitude:</th>
					<td class="latitude">
					  <code><?php echo $details->lat; ?></code>
					</td>
				  </tr>
				  <tr>
					<th>Longitude:</th>
					<td class="longitude">
					  <code><?php echo $details->lon; ?></code>
					</td>
				  </tr>
				  <tr>
					<th>Timezone:</th>
					<td>
					  <code><?php echo $details->timezone; ?></code>
					</td>
				  </tr>
				  <tr>
					<th>Organization:</th>
					<td>
					  <code><?php echo $details->org; ?></code>
					</td>
				  </tr>
				  <tr>
					<th>ASN:</th>
					<td>
					  <code><?php echo $details->as; ?></code>
					</td>
				  </tr>
				  <tr>
					<th>ISP Name:</th>
					<td>
					  <code><?php echo $details->isp; ?></code>
					</td>
				  </tr>
            </table>
                </div>
                <div class="news-section">
                    <h2><i class="far fa-newspaper box-icon"></i> News</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ut odio euismod, pretium nulla quis, egestas est. Nullam tincidunt augue ac nunc aliquet finibus. Sed a turpis vel arcu volutpat feugiat quis eu massa.</p>
                </div>
            </div>
            <footer class="footer">
                <div class="menu-space">
                    <div class="menu-item">
                        <a href="#"><i class="fas fa-home"></i> Home</a>
                    </div>
                    <div class="menu-item">
                        <a href="#"><i class="fas fa-info-circle"></i> About</a>
                    </div>
                    <div class="menu-item">
                        <a href="#"><i class="fas fa-envelope"></i> Contact Us</a>
                    </div>
                    <div class="menu-item">
                        <a href="#"><i class="fas fa-newspaper"></i> News</a>
                    </div>
                    <div class="menu-item">
                        <a href="#"><i class="fas fa-users"></i> Team</a>
                    </div>
                    <div class="menu-item">
                        <a href="#"><i class="fas fa-search"></i> Search</a>
                    </div>
                </div>
                <hr class="footer-line">
                <div class="footer-left-menu" style="padding-top: 20px;">
                    <a href="#"><i class="fab fa-facebook"></i> Facebook</a>
                    <a href="#"><i class="fab fa-twitter"></i> Twitter</a>
                </div>
                <div class="footer-right-menu" style="padding-top: 20px;">
                    © 2023 Example Website
                </div>
            </footer>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.0.slim.min.js" integrity="sha256-ZaXnYkHGqIhqTbJ6MB4l9Frs/r7U4jlx7ir8PJYBqbI=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.3/umd/popper.min.js"></script>
        <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        
        <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js" integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ==" crossorigin=""></script>
        <script defer>
          // initialize Leaflet
          var map = L.map('map').setView({
            lon: <?php echo $details->lon; ?>,
            lat: <?php echo $details->lat; ?>
          }, 6);
          map.attributionControl.setPrefix(false);
          // add the OpenStreetMap tiles
          L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 12,
            attribution: '&copy;  < a href = "https://openstreetmap.org/copyright" > OpenStreetMap contributors < /a>'
          }).addTo(map);
          // show the scale bar on the lower left corner
          L.control.scale({
            imperial: true,
            metric: true
          }).addTo(map);
          // show a marker on the map
          L.marker({
            lon: <?php echo $details->lon; ?>,
            lat: <?php echo $details->lat; ?>
          }).addTo(map);
          console.log(L);
        </script>
        <script>
            $(document).ready(function () {
                $('.dropdown-toggle').dropdown();
            });
        </script>
		<script type="text/javascript" defer>
		  $(function() {
			$("form").on("submit", function() {
			  $(this).find('button, input[type="submit"]').attr("disabled", true);
			});
		  });
		</script>
    </body>
</html>