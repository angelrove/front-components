/**
 * Console output
 *
 * reference: http://stratosprovatopoulos.com/web-development/php/ajax-progress-php-script-without-polling/
 *
 */
//--------------------------------------------------------
function console_launchProcess(console_id, btn_process, ajax_url)
{
    $(console_id).text('');

    try {
        //-------
        $(btn_process).button('loading');

        //-------
        var xhr = new XMLHttpRequest();
        xhr.previous_text = '';

        //----------------
        xhr.onerror = function () {
            alert("[XHR] Fatal Error.");
        };
        //----------------
        xhr.onreadystatechange = function () {
            try {
                //-----------------
                var new_response = xhr.responseText.substring(xhr.previous_text.length);
                xhr.previous_text = xhr.responseText;

                // Out
                $(console_id).append(new_response);

                //-----------------
                if (xhr.readyState == 4) {
                    $(btn_process).button('reset');

                    // Reload page ---
                    // var r = confirm("Fin del proceso! \n¿Quieres recargar la página para ver los cambios?");
                    // if (r == true) {
                    //     location.reload();
                    // }
                }
            }
            catch (e) {
                alert("[XHR STATECHANGE] Exception: " + e);
            }
        };
        //-----------------

        // Calling ajax ---
        xhr.open("GET", ajax_url, true);
        xhr.send();
    }
    catch (e) {
        $(btn_process).button('reset');
        alert("[XHR REQUEST] Exception: " + e);
    }

}
//--------------------------------------------------------

