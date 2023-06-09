<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schüler bearbeiten | FST</title>
    <style>
        .add-row {
            display: none;
        }
    </style>
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
                <!-- Add a hidden row for adding a new student -->
                <tr class="add-row ">
                    <td>x</td>
                    <td class="editable-cell"><input type="text" class="form-control form-control-sm" name="sname" placeholder="Name"></td>
                    <td class="editable-cell"><input type="text" class="form-control form-control-sm" name="svname" placeholder="Vorname"></td>
                    <td class="editable-cell"><input type="text" class="form-control form-control-sm" name="gebd" placeholder="Geburtsdatum"></td>
                    <td class="editable-cell"><input type="text" class="form-control form-control-sm" name="str" placeholder="Straße"></td>
                    <td class="editable-cell"><input type="text" class="form-control form-control-sm" name="plz" placeholder="PLZ"></td>
                    <td class="editable-cell"><input type="text" class="form-control form-control-sm" name="ort" placeholder="Ort"></td>
                    <td>
                        <button class="btn btn-success btn-sm save-button" type="button">Speichern</button>
                        <button class="btn btn-secondary btn-sm cancel-button" type="button">Abbrechen</button>
                    </td>
                </tr>
                <?php
                foreach ($stmt as $result) {
                    echo " <tr>
                        <td class ='snr-cell'>" . $result['Snr']     . "</td>      
                        <td class ='editable-cell' name='sname'>" . $result['Sname']   . "</td>      
                        <td class ='editable-cell' name='svname'>" . $result['Svname']  . "</td>      
                        <td class ='editable-cell' name='gebd'>" . $result['gebd']    . "</td>      
                        <td class ='editable-cell' name='str'>" . $result['Str']     . "</td>      
                        <td class ='editable-cell' name='plz'>" . $result['PLZ']     . "</td>      
                        <td class ='editable-cell' name='ort'>" . $result['Ort']     . "</td>   
                        <td>
                            <button class='btn btn-warning btn-sm edit-button' type='button'>Bearbeiten</button>
                            <button class='btn btn-danger btn-sm del-button' type='button' data-snr='" . $result['Snr'] . "' >Löschen</button> 
                        </td>   
                    </tr>";
                } ?>
            </tbody>

            <button class="btn btn-success addButton" type="button" style="margin-bottom: 1em; margin-right: 1em;">Hinzufügen</button>
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
                    var fieldName = $(this).attr('name');
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
                //change discard to del
                row.find('.discard-button').removeClass('btn-secondary discard-button').addClass('btn-danger del-button').text('Löschen');

                // AJAX request to update the database
                $.ajax({
                    type: 'POST',
                    url: './ajax/updateSchulData.php',
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
                originalValues = {};
                // Enter edit mode
                row.find('.editable-cell').each(function() {
                    var cellValue = $(this).text();
                    var fieldName = $(this).attr('name');
                    originalValues[fieldName] = $(this).text();

                    // Replace cell contents with input fields
                    $(this).html('<input type="text" class="form-control form-control-sm"  value="' + cellValue + '"style="width:10em;">');


                });

                // Add editing class
                $(this).addClass('editing');
                // Change button text
                $(this).removeClass('btn-warning').addClass('btn-success').text('Speichern');

                //change del to discard
                row.find('.del-button').removeClass('btn-danger del-button').addClass('btn-secondary discard-button').text('Verwerfen');
            }

        });
        //Discard button click event listener
        $('.del-button').click(function() {
            if ($(this).hasClass('discard-button')) {
                var row = $(this).closest('tr');
                //Exit edit mode
                row.find('.editable-cell').each(function() {
                    var fieldName = $(this).attr('name');
                    $(this).html(originalValues[fieldName]);
                });
                // Remove editing class
                row.find('.edit-button').removeClass('editing').removeClass('btn-success').addClass('btn-warning');
                // Change button text
                row.find('.edit-button').text('Bearbeiten');
                //change discard to del
                $(this).removeClass('btn-secondary discard-button').addClass('btn-danger del-button').text('Löschen');
            } else {
                var snr = $(this).data('snr');

                // Confirm the deletion with the user
                if (confirm('Sind Sie sich sicher das Sie den Schüler Löschen möchten?')) {
                    $.ajax({
                        type: 'POST',
                        url: './ajax/removeSchulData.php',
                        data: {
                            snr: snr
                        },
                        success: function(response) {
                            // Handle success if necessary
                            // Refresh the table or update it with the updated data
                            location.reload();
                        },
                        error: function(xhr, status, error) {
                            console.log(xhr.responseText);
                            // Handle error if necessary
                        }
                    });
                }

            }
        });     


        // Add click event listener to the Add button
        $('.addButton').click(function() {
            // Hide the Add button
            $(this).hide();
            // Show the hidden add-row
            $('.add-row').show();
        });

        // Add click event listener to the Cancel button in the add-row
        $('.cancel-button').click(function() {
            // Show the Add button
            $('.addButton').show();
            // Hide the add-row
            $('.add-row').hide();
        });

        // Add click event listener to the Save button in the add-row
        $('.save-button').click(function() {
            // Retrieve the input values from the add-row
            var sname = $('.add-row input[name="sname"]').val();
            var svname = $('.add-row input[name="svname"]').val();
            var gebd = $('.add-row input[name="gebd"]').val();
            var str = $('.add-row input[name="str"]').val();
            var plz = $('.add-row input[name="plz"]').val();
            var ort = $('.add-row input[name="ort"]').val();



            // Create an AJAX request to save the new student

            if (sname !== '') {
                $.ajax({
                    type: 'POST',
                    url: './ajax/addSchulData.php',
                    data: {
                        sname: sname,
                        svname: svname,
                        gebd: gebd,
                        str: str,
                        plz: plz,
                        ort: ort
                    },
                    success: function(response) {
                        // Handle success if necessary
                        // Refresh the table or update it with the new student data
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr.responseText);
                        // Handle error if necessary
                    }
                });
            } else {
                alert('Bitte geben Sie den Namen des Schülers ein.');
            }

            // Reset the input values in the add-row
            $('.add-row input').val('');

            // Show the Add button
            $('.addButton').show();
            // Hide the add-row
            $('.add-row').hide();
            location.reload();
        });
    });
</script>

</html>