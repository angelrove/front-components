<?
Vendor::conf('codemirror', '//cdnjs.cloudflare.com/ajax/libs/codemirror/codemirror-5.23.0/', array(
   'doc/docs.css',
   'lib/codemirror.css',
   'lib/codemirror.js',

   'addon/selection/active-line.js',
   'addon/edit/matchbrackets.js',

   // 'keymap/sublime.js',

   'addon/hint/show-hint.css',
   'addon/hint/show-hint.js',
   'addon/hint/css-hint.js',
   'theme/'.$theme.'.css',
   'mode/'.$type.'/'.$type.'.js',
));

