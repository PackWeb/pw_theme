#
# Sass/Compass configuration.
#

require "susy"
require "breakpoint"

# Production/development environment.
environment = :development

# Resource locations.
css_dir = "css"
sass_dir = "sass"
images_dir = "images"
javascripts_dir = "js"

# FireCompass-compatible debug_info.
firecompass = true

# Sass output style.
output_style = (environment == :development) ? :expanded : :compressed

# Relative asset paths.
relative_assets = true

# Sass options.
sass_options = (environment == :development && firecompass == true) ? {:line_comments => true} : {}

