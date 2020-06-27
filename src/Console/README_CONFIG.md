
# Es necesario incluirlo en la configuración de nginx

// membrillo ajax (útil para "Console" output) ----
location ~ index_ajax\.php$ {
    fastcgi_pass php-upstream;

    fastcgi_buffers 128 1k; # up to 1k + 128 1k
    fastcgi_buffer_size 1k;
    fastcgi_max_temp_file_size 0;

    gzip off;
    proxy_buffering off;

    fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
    include fastcgi_params;
}
