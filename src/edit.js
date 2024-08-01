/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-i18n/
 */
import { __ } from "@wordpress/i18n";

/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */
import { useBlockProps } from "@wordpress/block-editor";

/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * Those files can contain any CSS code that gets applied to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */
import "./editor.scss";

/**
 * The edit function describes the structure of your block in the context of the
 * editor. This represents what the editor will render when the block is used.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#edit
 *
 * @return {Element} Element to render.
 */
export default function Edit() {
	return (
		<div {...useBlockProps()}>
			<div className="form-row">
				<label for="name">Full Name:</label>
				<input
					className="form-input"
					type="text"
					id="name"
					name="name"
					required
				/>
			</div>
			<div className="form-row">
				<label for="email">Email Address:</label>
				<input
					className="form-input"
					type="email"
					id="email"
					name="email"
					required
				/>
			</div>
			<div className="form-row">
				<label for="phone">Phone Number:</label>
				<input
					className="form-input"
					type="text"
					id="phone"
					name="phone"
					required
				/>
			</div>
			<div className="form-row">
				<label for="message">Message:</label>
				<textarea
					className="form-input"
					id="message"
					name="message"
					required
				></textarea>
			</div>
			<input
				className="wp-block-button__link wp-element-button"
				type="submit"
				id="form-submit"
				name="form-submit"
				value="Submit"
			/>
		</div>
	);
}
