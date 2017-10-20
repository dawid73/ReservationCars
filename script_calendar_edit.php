<script>

    $(document).ready(function () {
      function fmt(date) {
        return date.format("YYYY-MM-DD HH:mm");

      }

      var date = new Date();
      var d = date.getDate();
      var m = date.getMonth();
      var y = date.getFullYear();

      var calendar = $('#calendar').fullCalendar({
        defaultView: 'agendaWeek', 
        editable: true,
        header: {
          left: 'prev,next today',
          center: 'title',
          right: 'agendaWeek,month,agendaDay'
        },

        events: "db_class/events.php",

        // Convert the allDay from string to boolean
        eventRender: function (event, element, view) {
          if (event.allDay === 'true') {
            event.allDay = true;
          } else {
            event.allDay = false;
          }
        },
        selectable: true,
        selectHelper: false,
        select: function (start, end, allDay) {
          var title = prompt('Event Title:');
          if (title) {
            var start = fmt(start);
            var end = fmt(end);
            $.ajax({
              url: 'db_class/add_events.php',
              data: 'title=' + title + '&start=' + start + '&end=' + end,
              type: "POST",
              success: function (json) {
                //alert('Added Successfully');
              }
            });
            calendar.fullCalendar('renderEvent',
                {
                  title: title,
                  start: start,
                  end: end,
                  allDay: allDay
                },
                true // make the event "stick"
            );
          }
          calendar.fullCalendar('unselect');

        },

        editable: true,
        eventDrop: function (event, delta) {
          var start = fmt(event.start);
          var end = fmt(event.end);
          $.ajax({
            url: 'db_class/update_events.php',
            data: 'title=' + event.title + '&start=' + start + '&end=' + end + '&id=' + event.id,
            type: "POST",
            success: function (json) {
              //alert("Updated Successfully");
            }
          });
        },
        


          
        eventResize: function (event) {
          var start = fmt(event.start);
          var end = fmt(event.end);
          $.ajax({
            url: 'db_class/update_events.php',
            data: 'title=' + event.title + '&start=' + start + '&end=' + end + '&id=' + event.id,
            type: "POST",
            success: function (json) {
              //alert("Updated Successfully");
            }
          });

        }

      });

    });

  </script>