<?php
use angelrove\membrillo\WPage\WPage;
use angelrove\front_components\Console\EchoFlush;

$controlName = 'simple';

// Js ----------------------
CssJsLoad::set_script("
    var console_id  = '#console_out';
    var btn_process = '#bt_start_process';

    var ajax_url = '/index_ajax.php?service=process';

    $(document).ready(function () {

        $('#form_console').on('submit', function (e) {
            e.preventDefault();
            console_launchProcess(console_id, btn_process, ajax_url);
        });
    });
");
?>

<?php WPage::get() ?>

<form id="form_console" method="POST" class="well well-sm form-inline" action="">

  <button id="bt_start_process"
          class="bt_start_process btn btn-primary btn-sm"
          data-loading-text="<i class='fas fa-circle-notch fa-spin'></i> processing...">
    <i class="fas fa-circle-notch"></i> Start process
  </button>
</form>

<!-- Console -->
<?php EchoFlush::getConsole(); ?>

<?php WPage::get_end();
