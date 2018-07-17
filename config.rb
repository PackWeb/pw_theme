# Sass/Compass configuration.

require "breakpoint"

environment = :production
relative_assets = true
firecompass = true

css_dir = "css"
sass_dir = "sass"

output_style = (environment == :development) ? :expanded : :compressed
sass_options = (environment == :development && firecompass == true) ? {:line_numbers => true} : {}

