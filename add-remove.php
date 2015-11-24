
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../favicon.ico">

        <title>Jquery DOM Controller</title>
        <!-- Bootstrap core CSS -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <link rel="stylesheet" href="https://fortawesome.github.io/Font-Awesome/assets/font-awesome/css/font-awesome.css">
    </head>

    <body>

        <div class="container">
            <div class="header clearfix">
                <h3 class="text-muted">Add/Remove Element TO DOM using jQuery</h3>
            </div>

            <div class="jumbotron" style="height: 700px;">
                <div class="col-md-6 col-md-offset-3">
                    <div id="at_textbox">
                        <p class="col-md-12" id="text-1">
                            <label>Text Box 1 <a class="btn btn-danger remove-text-box"><i class="fa fa-trash"></i></a></label>
                            <input type="text" class="form-control" name="at_text[]"/>
                        </p>
                    </div>
                    <p>
                        <a class="btn btn-default add-text-box">Add Text Box</a>
                    </p>
                </div>


            </div>

        </div> <!-- /container -->
        <input type="hidden" id="text-box-counter" value="1"/>
        <script>
            $('.add-text-box').click(function () {
                var text_box_counter = $("#text-box-counter").val();
                text_box_counter = parseInt(text_box_counter) + 1
                $("#at_textbox").append('<p class="col-md-12"><label>Text Box ' + text_box_counter + ' <a class="btn btn-danger remove-text-box"><i class="fa fa-trash"></i></a></label><input type="text" class="form-control" name="at_text[]"/></p>');
                $("#text-box-counter").val(text_box_counter);
            })
            $('body').on('click', 'a.remove-text-box', function () {
//                $(this).parent();
                $(this).parents('p:first').remove();

            });

        </script>
    </body>
</html>
