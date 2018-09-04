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

                $('#visualizar #id').text(event.id);
                $('#visualizar #title').text(event.title);
                $('#visualizar #start').text(event.start.format('DD/MM/YYYY'));
                $('#visualizar #startHour').text(event.start.format('HH:mm:ss'));
                $('#visualizar #end').text(event.end.format('DD/MM/YYYY'));
                $('#visualizar #endHour').text(event.end.format('HH:mm:ss'));

                $('#visualizar #id').val(event.id);
                $('#visualizar #title').val(event.title);
                $('#visualizar #start').val(event.start.format('DD/MM/YYYY'));
                $('#visualizar #startHour').val(event.start.format('HH:mm:ss'));
                $('#visualizar #end').val(event.end.format('DD/MM/YYYY'));
                $('#visualizar #endHour').val(event.end.format('HH:mm:ss'));
                $('#visualizar #color').val(event.color);

                $('#visualizar').modal('show');
                return false;
            },
            selectable: true,
            selectHelper: true, // DESTACA A HORA SELECIONADA.
            select: function(start, end) {
                $('#cadastrar #start').val(moment(start).format('DD/MM/YYYY'));
                $('#cadastrar #startHour').val(moment(start).format('HH:mm:ss'));
                $('#cadastrar #end').val(moment(end).format('DD/MM/YYYY'));
                $('#cadastrar #endHour').val(moment(end).format('HH:mm:ss'));
                $('#cadastrar').modal('show');
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

<style media="screen">
    .visualizar{
        display: block;
    }

    .form{
        display: none;
    }
</style>

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

<!-- MODAL DE VISUALIZAR EVENTOS-->

<div class="modal fade" id="visualizar" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Dados do evento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="visualizar">
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-12">
                            <div class="col-2">
                                <label><strong>Titulo: </strong></label>
                            </div>
                            <label id="title"></label>
                        </div>
                        <div class="form-group col-12">
                            <div class="col-2">
                                <label><strong>Inicio: </strong></label>
                            </div>
                            <label id="start"></label>
                            <label class="ml-2 mr-2"><strong>às:</strong></label>
                            <label id="startHour"></label>
                        </div>
                        <div class="form-group col-12">
                            <div class="col-2">
                                <label><strong>Fim: </strong></label>
                            </div>
                            <label id="end"></label>
                            <label class="ml-2 mr-2"><strong>às:</strong></label>
                            <label id="endHour"></label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        Cancelar
                    </button>
                    <button type="button" class="btn btn-primary ocultar-btn">
                        Editar
                    </button>
                </div>
            </div>
            <div class="form">
                <form action="<?php echo base_url('agenda/editar'); ?>" method="POST">
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="form-group col-12">
                                <label class="col-2 control-label float-left">Titulo</label>
                                <div class="col-10">
                                    <input id="title" type="text" name="titulo" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group col-12">
                                <label class="col-2 control-label float-left">Cor</label>
                                <div class="col-10">
                                    <select id="color" name="cor" class=" form-control" required>
                                        <option value="">Selecione</option>
                                        <option style="color:#FFD700;" value="#FFD700">Amarelo</option>
                                        <option style="color:#0071c5;" value="#0071c5">Azul Turquesa</option>
                                        <option style="color:#FF4500;" value="#FF4500">Laranja</option>
                                        <option style="color:#8B4513;" value="#8B4513">Marrom</option>
                                        <option style="color:#A020F0;" value="#A020F0">Roxo</option>
                                        <option style="color:#40E0D0;" value="#40E0D0">Turquesa</option>
                                        <option style="color:#228B22;" value="#228B22">Verde</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-12">
                                <label class="col-2 control-label float-left">Inicio</label>
                                <div class="col-6">
                                    <input id="start" name="inicio" type="text" class="form-control data" required>
                                </div>
                                <div class="col-4">
                                    <input id="startHour" name="horaInicio" type="time" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group col-12">
                                <label class="col-2 control-label float-left">Fim</label>
                                <div class="col-6">
                                    <input id="end" name="fim" type="text" class="form-control data" required>
                                </div>
                                <div class="col-4">
                                    <input id="endHour" name="horaFim" type="time" class="form-control" required>
                                </div>
                            </div>
                            <input id="id" name="id" type="hidden" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" name="button" class="btn btn-danger edit-btn">
                            Cancelar
                        </button>
                        <button type="submit" class="btn btn-primary">
                            Salver alterações
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<!-- MODAL DE CADASTRAR EVENTOS -->

<div class="modal fade" id="cadastrar" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Cadastrar Evento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url('agenda/cadastrar'); ?>" method="POST">
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-12">
                            <label class="col-2 control-label float-left">Titulo</label>
                            <div class="col-10">
                                <input type="text" name="titulo" class="form-control" placeholder="Titulo do evento" required>
                            </div>
                        </div>
                        <div class="form-group col-12">
                            <label class="col-2 control-label float-left">Cor</label>
                            <div class="col-10">
                                <select name="cor" class=" form-control" id="color" required>
                                    <option value="">Selecione</option>
                                    <option style="color:#FFD700;" value="#FFD700">Amarelo</option>
                                    <option style="color:#0071c5;" value="#0071c5">Azul Turquesa</option>
                                    <option style="color:#FF4500;" value="#FF4500">Laranja</option>
                                    <option style="color:#8B4513;" value="#8B4513">Marrom</option>
                                    <option style="color:#A020F0;" value="#A020F0">Roxo</option>
                                    <option style="color:#40E0D0;" value="#40E0D0">Turquesa</option>
                                    <option style="color:#228B22;" value="#228B22">Verde</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-12">
                            <label class="col-2 control-label float-left">Inicio</label>
                            <div class="col-6">
                                <input id="start" name="inicio" type="text" class="form-control data" required>
                            </div>
                            <div class="col-4">
                                <input id="startHour" name="horaInicio" type="time" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group col-12">
                            <label class="col-2 control-label float-left">Fim</label>
                            <div class="col-6">
                                <input id="end" name="fim" type="text" class="form-control data" required>
                            </div>
                            <div class="col-4">
                                <input id="endHour" name="horaFim" type="time" class="form-control" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        Cancelar
                    </button>
                    <button type="submit" class="btn btn-primary">
                        Cadastrar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $('.ocultar-btn').on('click', function(){
        $('.form').slideToggle();
        $('.visualizar').slideToggle();
    });

    $('.edit-btn').on('click', function(){
        $('.visualizar').slideToggle();
        $('.form').slideToggle();
    });
</script>
