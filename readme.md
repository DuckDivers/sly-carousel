# sly-carousel

A wordpress plugin to use the Sly Carousel with the SLY jQuery plugin http://darsa.in/sly/

Shortcode usage:
    [sly]
    
## Shortcode Attributes:

#### Wordpress Query Variables:
+ **posts_count** - Number of posts to return | default = 10
+ **post_type** - What type of post (allows for custom post types) | default = 'post
+ **categories** - Custom Categories 

#### Other Shortcode Attributes:
+ **title** - the title for the carousel - Displays as an H2 on the page
+ **frame_height** - The height to specify for the "Frame" | default = 500px
+ **thumb_width** - Width of the featured image | Default =  290px 
+ **thumb_height** - Height of the featured image | Default =  220px 
+ **more_text** - Text for read more button | default = blank - no button 
+ **excerpt_count** - Number of words in the excerpt | default = 15
+ **custom_class** - Adds a custom class to the `<div class="wrap">` | Default = no custom class
