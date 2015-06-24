
# Welome to the Content Blocks Starter

A content strategy for WordPress built with [Timber](https://github.com/jarednova/timber/) and [Advanced Custom Fields](http://advancedcustomfields.com).

## Blocks

Blocks are structured chunks of content that remove the need for messy markup interspersed with your content. They are built using ACF Pro's Flexible Content Field.

### `block_text`

General text block. Can be for large blocks of writing and contains options for headings.

- `block_text` - WYSIWYG, Text Only toolbar

### `block_textimage`

Display text next to an image. Can be a larger image with a caption or inline with the text.

- `textimage_format` - Radio, `caption` or `paragraph`
- `textimage_paragraph` - WYSIWYG, Text Only toolbar
- `textimage_caption` - Textarea (should it be WYSIWYG with Link Only)?
- `textimage_image` - Image

### `block_list`

Block for either a free form list of content with an item description, title, and image OR a list of connected content. The connected content will display its featured image, post title, and excerpt.

- `list_title` - Text
- `list_type` - Radio, `free_form` or `connected_content`
- `list_display` - Radio, `major` or `minor`
- if `free_form`
	- `list_type_freeform` - Repeater
		- `item_title` - Text
		- `item_description` - WYSIWG Link Only
		- `item_image` - Image

### `block_quote`

For blockquotes or testimonials.

- `quote_text` - Textarea
- `quote_source` - Text
- `quote_source_url` - URL

### `block_cta`

Call to action containing a button.

- `cta_text` - Text
- `cta_btn_text` - Text
- `cta_btn_url` - URL

### `block_html`

For standard markup or shortcodes.

- `html` - WYSIWG text only, no formatting.

## Getting Started

Coming soon.

