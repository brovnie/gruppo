let body = document.querySelector("body");
if(body.classList.contains('gruppo-app')) {
  Pusher.logToConsole = true;

  var pusher = new Pusher('7425af5f37982727957e', {
    cluster: 'eu'
  });
}
