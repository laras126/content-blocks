
# Content Blocks FTW

Content Blocks are a content strategy for WordPress built with [Timber](https://github.com/jarednova/timber/) and [Advanced Custom Fields](http://advancedcustomfields.com). No longer shall we create our WordPress sites with HTML in the content editor! Let's fill out nice fields and separate our concerns instead of adding `<br>`s everywhere. C'mon, we all do.

### Naming Conventions

All views prefixed with an `_` are extending something. Views partials, Sass partials, and ACF field names are mapped one to one for the most part.

### Blocks

Blocks are structured chunks of content that remove the need for messy markup interspersed with your content. They are built using ACF Pro's Flexible Content Field.

#### `block_text`

General text block. Can be for large blocks of writing and contains options for headings.

- `block_text` - WYSIWYG, Text Only toolbar

#### `block_textimage`

Display text next to an image. Can be a larger image with a caption or inline with the text.

- `textimage_format` - Radio, `caption` or `paragraph`
- `textimage_paragraph` - WYSIWYG, Text Only toolbar
- `textimage_caption` - Textarea (should it be WYSIWYG with Link Only)?
- `textimage_image` - Image

#### `block_list`

Block for either a free form list of content with an item description, title, and image OR a list of connected content. The connected content will display its featured image, post title, and excerpt.

- `list_title` - Text
- `list_type` - Radio, `free_form` or `connected_content`
- `list_display` - Radio, `major` or `minor`
- if `free_form`
	- `list_type_freeform` - Repeater
		- `item_title` - Text
		- `item_description` - WYSIWG Link Only
		- `item_image` - Image
- if `connected_content`
	- `list_type_connected_content` - Relationship

#### `block_quote`

For blockquotes or testimonials.

- `quote_text` - Textarea
- `quote_source` - Text
- `quote_source_url` - URL

#### `block_cta`

Call to action containing a button.

- `cta_text` - Text
- `cta_btn_text` - Text
- `cta_btn_url` - URL

#### `block_html`

For standard markup or shortcodes.

- `html` - WYSIWG text only, no formatting.

### Base Views

Each directory of views contains a base view that is extended by its variations e.g. `block.twig` is extended by `_block-text.twig`. These are then included in primary templates with context variables. The following notes document the context variables each base template accepts.

(Is this too abstracted? Whatever, it's fun.)

#### `headers/header.twig`
Contains 3 context variables (is that the correct term?):
1. `contain`: Conditionall prints a container within the `<header>` tags. Takes a string for the class name, should be `contain-[size]`.
2. `class`: And class names for the `<header>`. Should be BEMmy (I think), like `header--site`.
3. `role`: An ARIA role if necessary. Just the text for the role, so `banner`, etc.

#### `blocks/block.twig`
...

#### `teases/tease.twig`
...

#### `pages/page.twig`
...

#### `singles/single.twig`
...

#### `footers/footer.twig`
...

## Getting Started

Coming soon.

