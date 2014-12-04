  
  //https://developers.google.com/google-apps/calendar/v3/reference/events

  function init(e){
  
   
    //take href attribute of an a tag
   var link = e.href;
//      alert(link);
      
    //object to hold details for google calendar 

      var calendarDetails = {
        booked: "",
        time: "",
        dates: ""
    };
      
    //find index of '?' (start of the url's parameters part)
    var index = link.indexOf('?');
  
    //extract part with parameters (after ? character)
    var param = link.substring(index + 1);
   
    //get individual parameter'key => value' pair as an element of array(split on '&' character)
    var subs = param.split('&');
    
      
      var trainerId = subs[0].substring(1 + subs[0].indexOf('='));
      var time = subs[1].substring(1 + subs[1].indexOf('='));
      var dates = subs[2].substring(1 + subs[2].indexOf('='));
      
    //link.booked = subs[0].substring(1 + subs[0].indexOf('='));
    //link.time = subs[1].substring(1 + subs[1].indexOf('='));
    //link.dates = subs[2].substring(1 + subs[2].indexOf('='));
    

  //at this point we can call calendar method and pass the object
       makeInsertApiCall(trainerId,time,dates);
    //alert("working");
} 
  
  
     // Enter a client ID for a web application from the Google Developer Console.
      // The provided clientId will only work if the sample is run directly from
      // https://google-api-javascript-client.googlecode.com/hg/samples/authSample.html
      // In your Developer Console project, add a JavaScript origin that corresponds to the domain
      // where you will be running the script.
      var clientId = '600202899759-tmhae26vcdud36bedbd35dr17nu8vr52.apps.googleusercontent.com';

      // Enter the API key from the Google Developer Console - to handle any unauthenticated
      // requests in the code.
      // The provided key works for this sample only when run from
      // https://google-api-javascript-client.googlecode.com/hg/samples/authSample.html
      // To use in your own application, replace this API key with your own.
      var apiKey = 'AIzaSyAuvW7q2HpS6oFo_9Yq6aWj2e1RIuIOwEA';

      // To enter one or more authentication scopes, refer to the documentation for the API.
      var scopes = 'https://www.googleapis.com/auth/calendar';
    
      // Use a button to handle authentication the first time.
      function handleClientLoad() {
        gapi.client.setApiKey(apiKey);
        window.setTimeout(checkAuth,1);
      }

      function checkAuth() {
        gapi.auth.authorize({client_id: clientId, scope: scopes, immediate: true}, handleAuthResult);
      }


      function handleAuthResult(authResult) {
        var authorizeButton = document.getElementById('authorize-button');
        var insertButton = document.getElementById('insertButton');

        if (authResult && !authResult.error) {

          authorizeButton.style.visibility = 'hidden';
          makeApiCall();
          insertButton.style.visibility = '';
          insertButton.onclick = handleInsertClick;
        } else {
          authorizeButton.style.visibility = '';
        
          insertButton.style.visibility = 'hidden';
        
          authorizeButton.onclick = handleAuthClick;
        }
      }

      function handleAuthClick(event) {

        gapi.auth.authorize({client_id: clientId, scope: scopes, immediate: false}, handleAuthResult);
        return false;
      }
    
      function handleInsertClick(event) {
    
       makeInsertApiCall();
      }

      function makeApiCall() {

       
          gapi.client.load('calendar', 'v3', function() {
         var request = gapi.client.calendar.events.list({
           'calendarId': 'primary'
         });
              
         request.execute(function(resp) {
           for (var i = 0; i < resp.items.length; i++) {
             var li = document.createElement('li');
                li.appendChild(document.createTextNode(resp.items[i].summary  + resp.items[i].description  + resp.items[i].location +  resp.items[i].start.dateTime) );
             document.getElementById('events').appendChild(li);
           }
         });
       });
     }

      function makeInsertApiCall(trainerId,time,dates) {
          
            alert('Added to Caldenar');         
          
      gapi.client.load('calendar', 'v3', function() {
          var request = gapi.client.calendar.events.insert({
              "calendarId": "primary",
              resource:{
                  "summary": "CIT GYM Training with " + trainerId,
                  "location": "Rossa Ave, Co. Cork",
                  "start": {
                      "dateTime": dates + "T" + time + ":00:00.000-07:00"
                      },
                  "end": {
                      "dateTime": dates  + "T" + time + ":55:00.000-07:00"
                      }
                  }
              });
          request.execute(function(resp) {
              for (var i = 0; i < resp.items.length; i++) {
                  console.dir(resp);
                  }
              });
          });
        }























