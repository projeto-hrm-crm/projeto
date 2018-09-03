<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset='utf-8' />

        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/calendar/fullcalendar.min.css">
        <link rel="stylesheet" media='print' href="<?php echo base_url();?>assets/css/calendar/fullcalendar.print.min.css">
        <script src="<?php echo base_url();?>assets/js/calendar/moment.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/lib/jquery/jquery.js"></script>
        <script src="<?php echo base_url();?>assets/js/calendar/bootstrap.min.js"></script>
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
                    defaultDate: '2018-09-03',
                    navLinks: true,
                    editable: true,
                    eventLimit: true,
                    eventClick: function(event) {

                        $('#visualizar #title').text(event.title);
                        $('#visualizar #start').text(event.start.format('DD/MM/YYYY HH:mm:ss'));
                        $('#visualizar #end').text(event.end.format('DD/MM/YYYY HH:mm:ss'));

                        $('#visualizar').modal('show');
                        return false;
                    },
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
                <div class="modal fade" id="visualizar" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Dados do evento</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-row">
                                    <div class="form-group col-12">
                                        <label><strong>Titulo: </strong></label>
                                        <label id="title"></label>
                                    </div>
                                    <div class="form-group col-12">
                                        <label><strong>Inicio: </strong></label>
                                        <label id="start"></label>
                                    </div>
                                    <div class="form-group col-12">
                                        <label><strong>Término: </strong></label>
                                        <label id="end"></label>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">
                                    Cancelar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>
