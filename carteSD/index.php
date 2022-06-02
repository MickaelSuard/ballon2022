<!DOCTYPE html>
<html>
    <head>
        <title>Fichier csv carte SD/ Base de données</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>    
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="upload.js" type="text/javascript"></script>
        <link rel="icon" href="favicon.ico"/>
    </head>
    <body>
        <div class="container">
            <br />
            <h3 align="center">Fichier csv carte SD/ Base de données</h3>
            <br />
            <form id="upload_csv" method="post" enctype="multipart/form-data">
                <div class="col-md-3">
                    <br />
                    <label>Choisir votre fichier </label>
                </div>  
                <div class="col-md-4">  
                    <input type="file" name="csv_file" id="csv_file" accept=".csv" style="margin-top:15px;" />
                </div>  
                <div class="col-md-5">  
                    <input type="submit" name="upload" id="upload" value="Upload" style="margin-top:10px;" class="btn btn-info" />
                </div>  
                <div style="clear:both"></div>
            </form>
            <br />
            <br />
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="data-table">
                    <thead>
                        <tr>
                            <th>Horodatage</th>
                            <th>Altitude</th>
                            <th>Longitude</th>
                            <th>Latitude</th>
                            <th>Radiation</th>
                            <th>Pression</th>
                            <th>Temperature</th>
                            <th>Humidite</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </body>
</html>