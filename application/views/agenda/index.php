<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset='utf-8' />
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/calendar/fullcalendar.min.css">
        <link rel="stylesheet" media='print' href="<?php echo base_url();?>assets/css/calendar/fullcalendar.print.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/calendar/style.css">
        <script src="<?php echo base_url();?>assets/js/calendar/moment.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/lib/jquery/jquery.js"></script>
        <script src="<?php echo base_url();?>assets/js/calendar/fullcalendar.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/calendar/pt-br.js"></script>

        <script>
            $(document).ready(function() {

                $('#calendar').fullCalendar({
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month,agendaWeek,agendaDay, listWeek'
                    },
                    defaultDate: Date(),
                    navLinks: true,
                    editable: true,
                    eventLimit: true,
                    events:
                    [
                        <?php if(isset($eventos)): ?>
                            <?php foreach ($eventos as $evento): ?>
                                {
                                    id:     '<?= $evento->id; ?>',
                                    title:  '<?= $evento->titulo; ?>',
                                    start:  '<?= $evento->inicio; ?>',
                                    end:    '<?= $evento->fim; ?>',
                                    color:  '<?= $evento->cor; ?>',
                                },
                            <?php endforeach; ?>
                        <?php endif; ?>
                    ]
                });
            });
        </script>
    </head>
    <body style="background-color:white">
        <?php if($this->session->flashdata('success')): ?>
            <div class="sufee-alert alert with-close alert-success alert-dismissible fade show mt-2">
                    <?php echo $this->session->flashdata('success'); ?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>
        <?php if($this->session->flashdata('danger')): ?>
            <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show mt-2">
                    <?php echo $this->session->flashdata('danger'); ?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>

        <div class="row justify-content-center align-items-center">
            <div class="col-12">
                <div id='calendar'></div>
            </div>
        </div>

    </body>
</html>
