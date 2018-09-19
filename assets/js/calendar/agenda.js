 jQuery(document).ready(function($) {

    function loadCalendar(events){
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
            select: function(inicio, fim) {
                $('#cadastrar #inicio').val(moment(inicio).format('DD/MM/YYYY'));
                $('#cadastrar #horaInicio').val(moment(inicio).format('HH:mm:ss'));
                $('#cadastrar #fim').val(moment(fim).format('DD/MM/YYYY'));
                $('#cadastrar #horaFim').val(moment(fim).format('HH:mm:ss'));
                $('#cadastrar').modal('show');
            },

            events: events,

            });
        }

        $.ajax({
            url: BASE_URL + "/events",
            data: 'JSON',
            success: (value) => {
                var value = JSON.parse(value);
                loadCalendar(value);
            },
            error: (error) => {

            }
        });

        $('.ocultar-btn').on('click', function(){
            $('.editar').slideToggle();
            $('.visualizar').slideToggle();
        });

        $('.edit-btn').on('click', function(){
            $('.visualizar').slideToggle();
            $('.editar').slideToggle();
        });

        $('.ocultar-btn-delete').on('click', function(){
            $('.excluir').slideToggle();
            $('.visualizar').slideToggle();
        });

        $('.delete-btn').on('click', function(){
            $('.visualizar').slideToggle();
            $('.excluir').slideToggle();
        });


    });
