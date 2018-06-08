$( document ).ready(function() {
    cargarEquipos();
  });

function cargarEquipos()
{
    $('.js-preloader').show()
    $.ajax({
        url: "../LaLigaApi/web/getAllTeams",
        type:  'post',
        error: function () {
            alert("Error");
            $('.js-preloader').hide()
        },
        success:  function (equipos) {
            var html=""
            
            for(i in equipos)
            {
                html+='<tr class="equipos" id="equipo'+equipos[i].id+'"><td>'+equipos[i].nombre+'</td>'
                html+='<td><button class="btn btn-info" onclick="verJugadores('+equipos[i].id+')">Gestionar Jugadores</td></tr>'
            }
            $('#tableBody').html(html);
            $('.js-preloader').hide()
        }
    });       
}

var equipoSeleccionado=null;
function verJugadores(idEquipo)
{
    $('.equipos').removeClass('info')
    $('#equipo'+idEquipo).addClass('info')
    $('#detalleJugadores').html('')
    $('.js-preloader').show()
    $.ajax({
        url: "../LaLigaApi/web/getPlayersByClub/"+idEquipo,
        type:  'post',
        error: function () {
            alert("Error");
            $('.js-preloader').hide()
            equipoSeleccionado=null
        },
        success:  function (jugadores) {
            equipoSeleccionado=idEquipo
            var html=""
            for(i in jugadores)
            {
                html+='<tr><td>'+jugadores[i].apellido+'</td><td>'+jugadores[i].nombre+'</td></tr>'
            }
            $('#detalleJugadores').html(html);
            $('.js-preloader').hide()
        }
    });  
}

function agregarJugador()
{
    if(equipoSeleccionado==null) return;
    $('.form-control').val('')
    $('#myModal').modal('show');
}

$("#formulario").submit(function( event ) {
    
    event.preventDefault();
    $('#btnSuccess').attr("disabled","disabled");
    $('.js-preloader').show()
    $.ajax({
        url: "../LaLigaApi/web/newPlayerToTeam/"+equipoSeleccionado,
        type:  'post',
        data:$( this ).serialize(),
        error: function () {
            alert("Error");
            $('.js-preloader').hide()
            $('#btnSuccess').removeAttr("disabled")
        },
        success:  function (jugadores) {
            $('.js-preloader').hide()
            $('#myModal').modal('hide');
            verJugadores(equipoSeleccionado)
            $('#btnSuccess').removeAttr("disabled")
        }
    }); 
  });