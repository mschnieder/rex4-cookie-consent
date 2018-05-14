
<div class="rex-addon-output">
	<h2 class="rex-hl2">Cookieconsent Einstellungen</h2>

	<div id="rex-addon-editmode" class="rex-form">
		<form action="" method="post">

			<fieldset class="rex-form-col-1">

				<div class="rex-form-wrapper">
					<div class="rex-form-row">
						<h2>Farben</h2>
						<p class="rex-form-col-a rex-form-select">
							<label for="fromname">Hintergrundfarbe</label>
							<input type="text" name="bg" value="<?php echo $cfg['bg'] ?>" style="width: 120px;" />
						</p>

						<p class="rex-form-col-a rex-form-select">
							<label for="from">Schriftfarbe des Hinweis</label>
							<input type="text" name="fontcolor" value="<?php echo $cfg['fontcolor'] ?>" style="width: 120px;" />
						</p>

						<p class="rex-form-col-a rex-form-select">
							<label for="mailer">Schriftfarbe im Button</label>
							<input type="text" name="btn_fontcolor" value="<?php echo $btn['fontcolor'] ?>" style="width: 120px;" />
						</p>

						<p class="rex-form-col-a rex-form-select">
							<label for="host">Hintergrundfarbe Button</label>
							<input type="text" name="btn_bg" value="<?php echo $btn['bg'] ?>" style="width: 120px;" />
						</p>
					</div>
				</div>
				<div class="rex-form-wrapper">
					<div class="rex-form-row">
						<h2>Texte</h2>
						<p class="rex-form-col-a rex-form-select">
							<label for="adminbcc">Button</label>
							<input type="text" name="buttontxt" value="<?php echo $cfg['buttontxt'] ?>" style="width: 150px;" />
						</p>

						<p class="rex-form-col-a rex-form-text">
							<label for="confirmto">Hinweis</label>
							<textarea name="hinweistext"><?php echo $cfg['hinweistext']; ?></textarea>
						</p>
					</div>
				</div>
				<div class="rex-form-wrapper">
					<div class="rex-form-row">
						<h2>Link & Position</h2>
						<p class="rex-form-col-a rex-form-select">
							<label for="port" style="width: 240px">Position des Hinweis</label>
                            <?php
							$position->show();
                            ?>
						</p>

						<p class="rex-form-col-a rex-form-select">
							<label for="charset" style="width: 240px">Text für den Datenschutzbestimmungs-Link</label>
							<input type="text" name="moreinfo" value="<?php echo $cfg['moreinfo'] ?>" style="width: calc(100% - 260px);" />
						</p>

						<p class="rex-form-col-a rex-form-select">
							<label for="wordwrap" style="width: 240px;">Link zum Datenschutz</label>
                            <?php
							echo $datenschutz->getHtml();
                            ?>
						</p>

						<p class="rex-form-col-a rex-form-submit">
							<input class="rex-form-submit" type="submit" name="btn_save" value="speichern" />
						</p>
					</div>

				</div>

			</fieldset>
		</form>
	</div>

</div>