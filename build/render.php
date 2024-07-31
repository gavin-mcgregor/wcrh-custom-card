<?php

/**
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 */
?>
<div <?php echo get_block_wrapper_attributes(); ?>>
	<form action="/contact-form-submission/" method="post">
		<div class="form-row">
			<label for="name">Full Name:</label>
			<input class="form-input" type="text" id="name" name="name" required>
		</div>
		<div class="form-row">
			<label for="email">Email Address:</label>
			<input class="form-input" type="email" id="email" name="email" required>
		</div>
		<div class="form-row">
			<label for="phone">Phone Number:</label>
			<input class="form-input" type="phone" id="phone" name="phone" required>
		</div>
		<div class="form-row">
			<label for="message">Message:</label>
			<textarea class="form-input" id="message" name="message" required></textarea>
		</div>
		<div class="form-row">
			<input class="wp-block-button__link wp-element-button" type="submit" id="form-submit" name="form-submit" value="Submit">
		</div>
	</form>
</div>