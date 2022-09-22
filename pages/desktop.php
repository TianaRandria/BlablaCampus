<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=, initial-scale=1.0" />
		<link rel="preconnect" href="https://fonts.googleapis.com/" />
		<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
		<link
			href="https://fonts.googleapis.com/css2?family=Bungee&family=Merriweather&family=Overpass&family=Epilogue&display=swap"
			rel="stylesheet"
		/>
		<style>
			body {
				background-image: url('../assets/img/background.png');
				background-repeat: no-repeat;
				margin: 0 auto;
			}
			#wrap {
				margin: 60px;
				font-family: 'Epilogue';
			}
			.section1 {
				z-index: 1;
				width: 50%;
				float: left;
			}
			.logo {
				margin: 20px 0;
			}
			.h3 {
				font-family: 'Merriweather', serif;
				font-style: italic;
				font-weight: normal;
				font-size: 35px;
			}
			.h3 em,
			p strong,
			footer,
			footer a,
			footer a:hover,
			footer a:active {
				color: #d41e45;
			}
			.section2 {
				/* z-index: 2; */
				width: 50%;
				float: right;
			}
			p {
				font-family: 'Overpass', sans-serif;
				font-size: 16px;
			}
			.map1::before {
				content: url('../assets/img/maps.png');
				z-index: 1;
			}
			.map2::before {
				content: url('../assets/img/mapspm.png');
				z-index: 1;
			}
			.carte::before {
				content: url('../assets/img/carte.png');
				z-index: 2;
			}
			.mobile::before {
				content: url('../assets/img/mobile.png');
				width: 50%;
			}
			footer {
				bottom: 30px;
			}
			footer a {
				text-decoration: none;
			}
		</style>
	</head>
	<body>
		<div id="wrap">
			<section class="section1">
				<img
					class="logo"
					src="../assets/img/logoBlaBlaFirstPage.png"
					alt="acceuil"
				/>
				<h3 class="h3">
					Trouver <em>facilement</em> un covoiturage pour se rendre en
					<em>formation</em>
				</h3>
				<p>
					Tu es nouveau dans la formation et tu cherches quelqu’un faisant le
					même chemin que toi pour venir en formation.<br />
					Pas de soucis <strong>blabla Campus</strong> est là pour toi.<br />
					Crée toi un compte ou connecte toi pour soit proposer un covoiturage,
					soit pour voir toutes les offes disponibles.<br />
					<strong>blabla Campus</strong> est un service gratuit, il n’est en
					aucun cas question de mettre en place une monétisation des trajets.<br />
					Bon voyage à toutes et à tous!<br />
				</p>
			</section>

			<section class="section2">
				<span class="map1"></span>
				<span class="map2"></span>
				<span class="carte"></span>
				<span class="mobile"></span>
			</section>

			<div style="clear: both"></div>

			<footer>
				<small>
					<a href="#">Mentions légales</a> -
					<a href="#">Politique de confidentialité</a>
				</small>
			</footer>
		</div>
	</body>
</html>




 </body>
 </html>