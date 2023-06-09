<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schüler bearbeiten | FST</title>
</head>

<body style="background-color:#1E90FF">
    <?php
    require __DIR__ . "/global/navBar.html";
    require_once "../mysql.inc.php";
    $stmt = $pdo->prepare('SELECT * FROM schueler');
    $stmt->execute();
    ?>
    <div style="margin :25px;">
        <table class="table table-striped table-dark table-hover table-sm rounded">
            <thead>
                <tr>
                    <th>Snr.</th>
                    <th>Name</th>
                    <th>Vorname</th>
                    <th>Geburtsdatum</th>
                    <th>Straße</th>
                    <th>PLZ</th>
                    <th>Ort</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($stmt as $result) {
                    echo " <tr>
                        <td class ='snr-cell'>" . $result['Snr']     . "</td>      
                        <td class ='editable-cell'>" . $result['Sname']   . "</td>      
                        <td class ='editable-cell'>" . $result['Svname']  . "</td>      
                        <td class ='editable-cell'>" . $result['gebd']    . "</td>      
                        <td class ='editable-cell'>" . $result['Str']     . "</td>      
                        <td class ='editable-cell'>" . $result['PLZ']     . "</td>      
                        <td class ='editable-cell'>" . $result['Ort']     . "</td>   
                        <td>
                            <button class='btn btn-warning btn-sm edit-button' type='button'  ' >Bearbeiten</button>
                            <button class='btn btn-danger btn-sm' type='button'  >Löschen</button> 
                        </td>   
                    </tr>";
                } ?>
            </tbody>
            <button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#addSchueler" style="margin-bottom: 1em; margin-right: 1em;">Hinzufügen</button>
        </table>
    </div>
</body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Add click event listeners to the edit buttons
        $('.edit-button').click(function() {
            var row = $(this).closest('tr');

            // Toggle between view and edit modes
            if ($(this).hasClass('editing')) {
                // Save the changes
                var snr = row.find('.snr-cell').text();
                //Create an object to store the updated data
                var data = {
                    snr: snr
                };

                // Iterate over the editable cells and retrieve their values
                row.find('.editable-cell').each(function() {
                    var fieldName = $(this).data('field');
                    var fieldValue = $(this).find('input').val();

                    // Add the field and value to the data object
                    data[fieldName] = fieldValue;

                    // Update the cell with the new value
                    $(this).text(fieldValue);
                });
                // Remove editing class
                $(this).removeClass('editing').removeClass('btn-success').addClass('btn-warning');
                // Change button text
                $(this).text('Bearbeiten');

                // AJAX request to update the database
                $.ajax({
                    type: 'POST',
                    url: 'update.php', // Replace with the URL that handles the database update
                    data: data,
                    success: function(response) {
                        // Handle success if necessary
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr.responseText);
                        // Handle error if necessary
                    }
                });

            } else {
                // Enter edit mode
                row.find('.editable-cell').each(function() {
                    var cellValue = $(this).text();
                    var fieldName = $(this).data('field');

                    // Replace cell contents with input fields
                    $(this).html('<input type="text" class="form-control form-control-sm custom-input"  value="' + cellValue + '"style="width:11em;">');

                    // Add data-field attribute to the input field
                    $(this).find('input').attr('data-field', fieldName);
                });

                // Add editing class
                $(this).addClass('editing');
                // Change button text
                $(this).removeClass('btn-warning').addClass('btn-success').text('Speichern');
            }
        });
    });
</script>

</html>