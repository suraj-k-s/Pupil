<?php
include("../Assets/Connection/Connection.php");
$heading = "Report";
$L =0;
$P=0;
$H=0;
$A=0;

if (isset($_POST['btn_search'])) {
    $selectedSemester = $_POST['sel_semester'];
    $selectedMonth = $_POST['txt_month'];

    // Check if both semester and month are selected
    if (!empty($selectedSemester) && !empty($selectedMonth)) {
        // Get the number of days in the selected month
        $startDate = new DateTime($selectedMonth);
        $endDate = clone $startDate;
        $endDate->modify('last day of this month');
        $interval = new DateInterval('P1D');
        $dateRange = new DatePeriod($startDate, $interval, $endDate);

        $heading = "Report for " . $startDate->format('F Y');
    } else {
        // Handle the case where either semester or month is not selected
        echo 'Please select both semester and month.';
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Report</title>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css'>
    <link rel='stylesheet' href='https://cdn.datatables.net/buttons/1.2.2/css/buttons.bootstrap.min.css'>
    <style>
        body {
            margin: 2em;
        }
    </style>
</head>

<body>
    <h1 align="center" id="heading">
        <?php echo $heading; ?>
    </h1>
    <br><br>
    <form method="post" align="center">
        Semester<select name="sel_semester">
            <option value="">-----Select-----</option>
            <?php
            $selQry = "select * from tbl_semester ";
            $result = $con->query($selQry);
            while ($data = $result->fetch_assoc()) {
                echo '<option value="' . $data['semester_id'] . '">' . $data['semester_name'] . '</option>';
            }
            ?>
        </select>
        Month <input type="month" name="txt_month">
        <input type="submit" name="btn_search" value="Check">
        <br><br><br>
    </form>
    <?php
    if (isset($_POST['btn_search'])) {
        
       if( $selectedSemester=="" || $selectedMonth=="")
       {
            ?>
                <script>
                    alert("Select Required Fileds");
                    window.location="ReportList.php";
                </script>
            <?php
       }
       else{
        echo '<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%"><thead>';
        echo '<tr><th style="text-align:center">*</th>';
        $dateColumnIsL = array();

        foreach ($dateRange as $date) {
            $formattedDate = $date->format('Y-m-d');
            $dateColumnIsL[$formattedDate] = true;

            $selQ = "SELECT * FROM tbl_attendance WHERE attendance_date = '$formattedDate'";
            $resultQ = $con->query($selQ);

            if ($resultQ->num_rows > 0) {
                $dateColumnIsL[$formattedDate] = false;
            }

            echo '<th style="text-align:center">' . $date->format('d') . '</th>';
        }
        echo '<th style="text-align:center">%</th>';
        echo '</tr></thead><tbody>';

        $studentNames = array();
        $selQry = "SELECT * FROM tbl_student WHERE semester_id = $selectedSemester and student_vstatus = 1";
        $result = $con->query($selQry);

        while ($data = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td style='text-align:center'>" . $data["student_name"] . "</td>";

            foreach ($dateRange as $date) {
                $formattedDate = $date->format('Y-m-d');
                if ($dateColumnIsL[$formattedDate]) {
                    echo "<td style='text-align:center'>L</td>";
                    $L++;
                } else {
                    $selQ = "SELECT * FROM tbl_attendance WHERE attendance_date = '$formattedDate' AND student_id = '" . $data["student_id"] . "'";
                    $resultQ = $con->query($selQ);

                    if ($resultQ->num_rows == 6) {
                        echo "<td style='text-align:center'>P</td>";
                        $P++;
                    } elseif ($resultQ->num_rows == 5) {
                        echo "<td style='text-align:center'>H</td>";
                        $H++;
                    } else {
                        echo "<td style='text-align:center'>A</td>";
                        $A++;
                    }
                }
            }
            $Data = $H/2;
            $attandance = (($P+$Data)/($P+$A+$H))*100;  
            echo "<td style='text-align:center'>".$attandance."</td>";
            echo "</tr>";
            $L =0;
            $P=0;
            $H=0;
            $A=0;
           
        }
        echo "</tbody></table>";
       }
    }
    ?>
</body>

</html>

    <!-- partial -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
    <script src='https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js'></script>
    <script src='https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js'></script>
    <script src='https://cdn.datatables.net/buttons/1.2.2/js/buttons.colVis.min.js'></script>
    <script src='https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js'></script>
    <script src='https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js'></script>
    <script src='https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js'></script>
    <script src='https://cdn.datatables.net/buttons/1.2.2/js/buttons.bootstrap.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.18/pdfmake.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.18/vfs_fonts.js'></script>
    <script>
        document.body.style.zoom = "80%";
            $(document).ready(function() {
                // Function to convert an img URL to data URL
                function getBase64FromImageUrl(url) {
                    var img = new Image();
                    img.crossOrigin = "anonymous";
                    img.onload = function() {
                        var canvas = document.createElement("canvas");
                        canvas.width = this.width;
                        canvas.height = this.height;
                        var ctx = canvas.getContext("2d");
                        ctx.drawImage(this, 0, 0);
                        var dataURL = canvas.toDataURL("image/png");
                        return dataURL.replace(/^data:image\/(png|jpg);base64,/, "");
                    };
                    img.src = url;
                }
                // DataTable initialisation
                $('#example').DataTable(
                        {
                            "dom": '<"dt-buttons"Bf><"clear">lirtp',
                            "paging": true,
                            "autoWidth": true,
                            "buttons": [
                                {
                                    text: 'Custom PDF',
                                    extend: 'pdfHtml5',
                                    filename: 'pdf',
                                    orientation: 'portrait', //portrait or landscape
                                    pageSize: 'A4', //A3 , A4 , A5 , A6 , legal , letter
                                    exportOptions: {
                                        columns: ':visible',
                                        search: 'applied',
                                        order: 'applied'
                                    },
                                    customize: function(doc) {
                                        //Remove the title created by datatTables
                                        doc.content.splice(0, 1);
                                        //Create a date string that we use in the footer. Format is dd-mm-yyyy
                                        var now = new Date();
                                        var heading = document.getElementById("heading").innerHTML;
                                        var jsDate = now.getDate() + '-' + (now.getMonth() + 1) + '-' + now.getFullYear();
                                        var logo = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAb0AAABVCAYAAADdTjofAAAACXBIWXMAAAsTAAALEwEAmpwYAAAGc2lUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNi4wLWMwMDYgNzkuMTY0NzUzLCAyMDIxLzAyLzE1LTExOjUyOjEzICAgICAgICAiPiA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPiA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtbG5zOnN0RXZ0PSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VFdmVudCMiIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIgeG1sbnM6ZGM9Imh0dHA6Ly9wdXJsLm9yZy9kYy9lbGVtZW50cy8xLjEvIiB4bWxuczpwaG90b3Nob3A9Imh0dHA6Ly9ucy5hZG9iZS5jb20vcGhvdG9zaG9wLzEuMC8iIHhtcE1NOk9yaWdpbmFsRG9jdW1lbnRJRD0ieG1wLmRpZDpFRTNDOTY2MDM0MEVFRDExOTMyNUFEMjE3RTdCQTJGMiIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDo1MzM1NzhFNDEwQUIxMUVEOTJGMkYwRENFMUE1RTI4RCIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDpiNjdiZDYwOC01ZmM3LTYwNDMtYjg4MC1hMGY4MmFhNGNkYzciIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNiAoV2luZG93cykiIHhtcDpDcmVhdGVEYXRlPSIyMDIzLTA1LTA1VDEzOjI1OjEyKzA1OjMwIiB4bXA6TW9kaWZ5RGF0ZT0iMjAyMy0wNS0wNlQxMDoyNTowNiswNTozMCIgeG1wOk1ldGFkYXRhRGF0ZT0iMjAyMy0wNS0wNlQxMDoyNTowNiswNTozMCIgZGM6Zm9ybWF0PSJpbWFnZS9wbmciIHBob3Rvc2hvcDpDb2xvck1vZGU9IjMiIHBob3Rvc2hvcDpJQ0NQcm9maWxlPSJzUkdCIElFQzYxOTY2LTIuMSI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOjZEQzUyRjgzQTkxMEVEMTE5RTRCRjFFN0ZCNjBGMDY2IiBzdFJlZjpkb2N1bWVudElEPSJ4bXAuZGlkOkVFM0M5NjYwMzQwRUVEMTE5MzI1QUQyMTdFN0JBMkYyIi8+IDx4bXBNTTpIaXN0b3J5PiA8cmRmOlNlcT4gPHJkZjpsaSBzdEV2dDphY3Rpb249InNhdmVkIiBzdEV2dDppbnN0YW5jZUlEPSJ4bXAuaWlkOmI2N2JkNjA4LTVmYzctNjA0My1iODgwLWEwZjgyYWE0Y2RjNyIgc3RFdnQ6d2hlbj0iMjAyMy0wNS0wNlQxMDoyNTowNiswNTozMCIgc3RFdnQ6c29mdHdhcmVBZ2VudD0iQWRvYmUgUGhvdG9zaG9wIDIyLjMgKFdpbmRvd3MpIiBzdEV2dDpjaGFuZ2VkPSIvIi8+IDwvcmRmOlNlcT4gPC94bXBNTTpIaXN0b3J5PiA8cGhvdG9zaG9wOkRvY3VtZW50QW5jZXN0b3JzPiA8cmRmOkJhZz4gPHJkZjpsaT54bXAuZGlkOjUzMzU3OEU0MTBBQjExRUQ5MkYyRjBEQ0UxQTVFMjhEPC9yZGY6bGk+IDwvcmRmOkJhZz4gPC9waG90b3Nob3A6RG9jdW1lbnRBbmNlc3RvcnM+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+cvsLgAAAPAlJREFUeJztnXd4VMXawH+72d30ysKGEiAJNUsVEMQGCtgVr4LKVbAilqvip2KPuV67V7x2sSM2ULGAoICiIk1Dj9SEkASSkE0C6cludr8/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';
                                        // A documentation reference can be found at
                                        // https://github.com/bpampuch/pdfmake#getting-started
                                        // Set page margins [left,top,right,bottom] or [horizontal,vertical]
                                        // or one number for equal spread
                                        // It's important to create enough space at the top for a header !!!
                                        doc.pageMargins = [20, 60, 20, 30];
                                        // Set the font size fot the entire document
                                        doc.defaultStyle.fontSize = 7;
                                        // Set the fontsize for the table header
                                        doc.styles.tableHeader.fontSize = 7;
                                        // Create a header object with 3 columns
                                        // Left side: Logo
                                        // Middle: brandname
                                        // Right side: A document title
                                        doc['header'] = (function() {
                                            return {
                                                columns: [
                                                   {
                                                       image: logo,
                                                       width: 100
                                                   },
                                                    {
                                                        alignment: 'center',
                                                        italics: true,
                                                        text: heading,
                                                        fontSize: 18,
                                                        margin: [10, 0]
                                                    }
                                                   ,
                                                   {
                                                       alignment: 'right',
                                                       fontSize: 14,
                                                       text: 'Attandance Report'
                                                   }
                                                ],
                                                margin: 20
                                            }
                                        });
                                        // Create a footer object with 2 columns
                                        // Left side: report creation date
                                        // Right side: current page and total pages
                                        doc['footer'] = (function(page, pages) {
                                            return {
                                                columns: [
                                                    {
                                                        alignment: 'left',
                                                        text: ['Created on: ', {text: jsDate.toString()}]
                                                    },
                                                    {
                                                        alignment: 'right',
                                                        text: ['page ', {text: page.toString()}, ' of ', {text: pages.toString()}]
                                                    }
                                                ],
                                                margin: 20
                                            }
                                        });
                                        // Change dataTable layout (Table styling)
                                        // To use predefined layouts uncomment the line below and comment the custom lines below
                                        // doc.content[0].layout = 'lightHorizontalLines'; // noBorders , headerLineOnly
                                        var objLayout = {};
                                        objLayout['hLineWidth'] = function(i) {
                                            return .5;
                                        };
                                        objLayout['vLineWidth'] = function(i) {
                                            return .5;
                                        };
                                        objLayout['hLineColor'] = function(i) {
                                            return '#aaa';
                                        };
                                        objLayout['vLineColor'] = function(i) {
                                            return '#aaa';
                                        };
                                        objLayout['paddingLeft'] = function(i) {
                                            return 4;
                                        };
                                        objLayout['paddingRight'] = function(i) {
                                            return 4;
                                        };
                                        doc.content[0].layout = objLayout;
                                    }
                                }]
                        });
            });
        </script>
       