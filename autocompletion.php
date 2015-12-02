<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/initconfig.php';
include_once 'dal/students.php';
$objStudent = new Students();
$student_data = $objStudent->get_names();
$student_name_col = array();
while ($fetch_data = mysqli_fetch_array($student_data)):
    $student_name_col[] = array('key' => $fetch_data['student_id'], 'value' => $fetch_data['name']);
endwhile;

$student_col_json = json_encode($student_name_col);
?>

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

        <title>Jquery Auto Completion</title>
        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">

        <link rel="stylesheet" href="https://fortawesome.github.io/Font-Awesome/assets/font-awesome/css/font-awesome.css">
    </head>

    <body>

        <div class="container">
            <div class="header clearfix">
                <h3 class="text-muted">Dynamic Auto completion using jQuery</h3>
            </div>

            <div class="jumbotron" style="height: 700px;">
                <div class="col-md-6 col-md-offset-3">
                    <div id="at_textbox">
                        <p class="col-md-12" id="text-1">
                            <label>Auto Completion Student Name</label>
                            <input type="text" class="form-control" name="student_name" id="student_name"/>
                            <input type="hidden" name="student_id" id="student_id"/>
                        </p>
                    </div>

                </div>


            </div>

        </div> <!-- /container -->

        <script>
            $(function () {
                var availableTags = <?= $student_col_json; ?>;
                $("#student_name").autocomplete({
                    source: availableTags,
                    select: function (event, ui) {
                        $("#student_name").val(ui.item.value);
                        $("#student_id").val(ui.item.key);
                        return false;
                    }
                });
            });
        </script>
    </script>
</body>
</html>
