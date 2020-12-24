<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
        <title>Request a callback</title>
        <script src="//js.pusher.com/2.2/pusher.min.js"></script>
        <script src="https://code.jquery.com/jquery-1.11.2.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
        <script src="http://crypto-js.googlecode.com/svn/tags/3.1.2/build/rollups/md5.js"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                var pusher = new Pusher('pusher-key-goes-here');

                var channel = pusher.subscribe('callback.requests');

                channel.bind_all(function (event_name, event_data) {
                    switch (event_name) {
                        case 'new.request':
                            var number_hash = CryptoJS.MD5(event_data.number);

                            $('#requests').append(
        "<li id='" + number_hash + "' class='request' data-number='" + event_data.number + "'>" + event_data.name + " has requested a callback to discuss " + event_data.reason + " </li>"
                            );

                            break;
                    }
                });

                $('#requests').on('click', 'li', function () {
                    var clicked = $(this);

                    $.ajax({
                        url: '/callback-connect-call.php',
                        type: 'post',
                        data: {'operative': $('input[name="number"]').val(), 'requester': $(this).data('number')},
                        success: function (data) {
                            $(clicked).remove();
                            console.log(data);
                            // TODO: remove call request for other instances of this page which might be open
                        }
                    });
                });
            });

        </script>
    </head>
    <body>
        <div class="container">
            <h4>Callback requests</h4>

            <ul id="requests">

            </ul>

            <form class="form-horizontal">

                <div class="form-group">
                    <label for="number" class="col-sm-2">
                        Number
                    </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="number" value="+44" />
                    </div>
                </div>

            </form>
        </div>
    </body>
</html>
