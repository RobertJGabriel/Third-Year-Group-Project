$( "#date" ).datepicker({
			  onSelect: function(dateText) {
				var date = $(this).datepicker('getDate');
				var day = document.getElementById("day");
				var dateBox = document.getElementById("dateBox");
                  var trainer = document.getElementById('idtrainer');
				dateBox.value = $.datepicker.formatDate('yy-mm-dd', date);
				day.innerHTML = $.datepicker.formatDate('DD dd', date);




                  $("#day_calendar").fadeIn("slow");
                  $.ajax({url: "index.php?date=" + dateBox.value + '&' + 'id=' +trainer.value }).done(function( html ) {
                      $( "#day_calendar" ).empty();
                      $("#day_calendar").append(html);
                  });
              }

			});


