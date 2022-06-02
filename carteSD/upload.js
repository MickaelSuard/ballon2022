

function uploadCsv() {
    $('#upload_csv').on('submit', function (event) {
        event.preventDefault();
        $.ajax({
            url: "import.php",
            method: "POST",
            data: new FormData(this), // représente les data du formulaire
            dataType: 'json',
            contentType: false,
            cache: false,
            processData: false,
            success: function (jsonData)
            {
                $('#data-table').DataTable().destroy();
                $('#data-table').DataTable({
                    data: jsonData,
                    columns: [
                        {data: "horodatage"},
                        {data: "altitude"},
                        {data: "longitude"},
                        {data: "latitude"},
                        {data: "radiations"},
                        {data: "temperature"},
                        {data: "pression"},
                        {data: "humidite"}
                    ]
                });
            }
        });
    }
    );
}
;

$(document).ready(function () {
  if ($("#csv_file").click()){
        uploadCsv();
         $("#csv_file").val('');
  };


});