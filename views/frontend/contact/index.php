	<!-- Content -->
	<div class="content clearfix reveal-side-navigation">

		<!-- Parallax Section -->
		<div class="section-block featured-media">
			<div class="parallax fixed-height" data-src="<?Php echo $vParamsViewFrontEndLayout['root_frontend_img']; ?>slider/slide-5-fs.jpg" data-retina  alt="Background Contact Ideas-Envision">
				<div class="tmp-content">
					<div class="tmp-content-inner left v-align-bottom">
						<div class="row">
							<div class="column width-5 horizon">
								<h1 class="color-white">Adquiere un Proyecto Web Ahora!</h1>
								<p class="font-alt-2 color-white hide-on-mobile">Construidos exclusivamente en nuestro IdEn Framework, modulariza todos tus contenidos, desarrollamos solo lo que necesitas, sin límite de codificación, nuestras actualizaciones son totalmente gratuitas.</p>
								<a href="#content-works" class="btn_down">DESLIZATE HACIA ABAJO</a>
							</div>
							<div class="column width-5 horizon">
								<div class="fb-like" data-href="https://www.facebook.com/Ideas-Envision-133261716780332" data-layout="box_count" data-action="like" data-show-faces="false" data-share="true"></div>
							</div>							
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Parallax Section End -->

		<!--Contact Form -->
		<section id="content-works" class="section-block replicable-content contact-2">
			<div class="row">
				<div class="column width-4">
					<h6 class="color-gray no-margin-top">Si estas en Bolivia, visítanos!</h6>
					<p class="lead">Av. Arce esq. Pinilla Edif. Arcadia #2588 mezzanine oficina 106 La Paz, Bolivia.</p>
					<p>Si te encuentras en cualquier otro país por favor no dudes en realizar una consulta por medio de nuestro formulario web, responderemos lo más antes posible a tú consulta.</p>
					<p><strong>Email:</strong> <a href="mailto:informaciones@ideas-envision.com">informaciones@ideas-envision.com</a><br>
					<strong>Teléfono Móvil:</strong> +591 787-95415<br>
					<strong>Teléfono Oficina:</strong> +591 2-243-0880<br>
					<strong>Teléfono Fax:</strong> +591 2-243-0880<br>
				</div>
				<div class="column width-8">
					<div class="contact-form-container">
						<form id="form-contact-info" class="contact-form" method="post" novalidate>
							<div class="row">
								<div class="column width-6">
									<input type="text" name="fname" class="form-fname form-element large" placeholder="Nombres*" tabindex="1" required>
								</div>
								<div class="column width-6">
									<input type="text" name="lname" class="form-lname form-element large" placeholder="Apellidos" tabindex="2">
								</div>
								<div class="column width-6">
									<input type="email" name="email" class="form-email form-element large" placeholder="Correo Electrónico*" tabindex="3" required>
								</div>
								<div class="column width-6">
									<input type="text" name="website" class="form-website form-element large" placeholder="Dirección Web" tabindex="4">
								</div>
							</div>
							<div class="row">
								<div class="column width-12">
									<textarea name="message" class="form-message form-element medium" placeholder="Mensaje*" tabindex="5" required></textarea>
									<input type="submit" value="Enviar" class="form-submit medium button bkg-charcoal bkg-hover-charcoal color-white color-hover-white">
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</section>
		<!--Contact Form End -->

		<!-- Map Section -->
		<div class="section-block map-wrapper">
			<div class="row collapse full-width">
				<div class="column width-12">
					<div class="map-container">
						<div id="map-canvas"></div>
					</div>
				</div>
			</div>
		</div>
		<!-- Map Section End -->

	</div>
	<!-- Content End -->

	<!-- Footer 1-->
	<footer class="footer-1 footer reveal-side-navigation">
		<div class="footer-top center">
			<div class="row">
				<div class="column width-12">
					<div class="footer-logo">
						<a href="<?Php echo BASE_VIEW_URL; ?>"><img src="<?Php echo $vParamsViewFrontEndLayout['root_frontend_img']; ?>logos/logo-footer.png" alt="Ideas-Envision Footer Logotype" /></a>
					</div>
				</div>
				<div class="column width-6 push-3">
					<div class="footer-top-inner">
						<p><strong>Ideas-Envision</strong> <i>Servicios Integrales</i>, es una empresa solida latinoamericana, su principal actividad es ofrecer a empresas internacionales servicios de consultoria en desarrollo web, ofreciendo proyectos a medida, desde simples sitios web hasta complejos y bien estructurados sistemas que comuniquen e interactuen diferentes secciones o ambitos dentro de cualquier empresa, además de realizar servicios de diseño gráfico, social media y posicionamiento web entre otros.</p>
					</div>
				</div>
			</div>
		</div>
		<div class="footer-bottom center">
			<div class="row">
				<div class="column width-12">
					<div class="footer-bottom-inner">
						<p class="copyright no-margin-bottom">&copy; 2016 Ideas-Envision. Todos los Derechos Reservados.</p>
						<ul class="social-list list-horizontal">
                            <li><a href="https://www.facebook.com/ideas.envision.si/">Facebook</a>/</li>
                            <li><a href="https://twitter.com/ideasenvision">Twitter</a>/</li>
                            <li><a href="https://plus.google.com/105131319645846689531">Google+</a></li>
						</ul>
					</div>
				</div>
			</div> 
		</div>
	</footer>
	<!-- Footer 1 End -->

</div>
</div>

<!-- Js -->
<script src="<?Php echo $vParamsViewFrontEndLayout['root_frontend_js']; ?>jquery-1.11.2.min.js"></script>
<script src="http://maps.googleapis.com/maps/api/js?v=3"></script>
<script src="<?Php echo $vParamsViewFrontEndLayout['root_frontend_js']; ?>timber.master.min.js"></script>
<script src="<?Php echo $vParamsViewFrontEndLayout['root_frontend_js']; ?>template-functions.js"></script>
</body>
</html>