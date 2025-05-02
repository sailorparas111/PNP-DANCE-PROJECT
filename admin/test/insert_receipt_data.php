<!DOCTYPE html>
<html lang="en">

<?php
include_once("connect.php");

if (isset($_GET['receipt_no'])) {
    $receipt_no = $_GET['receipt_no'];

    $sql = "SELECT * FROM receipt_table WHERE receipt_no = '$receipt_no'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {

        $row = mysqli_fetch_assoc($result);

        ?>

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
            <link rel="stylesheet" href="css/r_view0.css">
            <title>Receipt No.:
                <?php echo $row['receipt_no'] ?> & Date :
                <?php echo $row['cdate'] ?>
            </title>
        </head>

        <body>

            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <img src="imgs/letterhead-02.jpg" alt="">
                        <div class="receipt_title">
                            <h2>FEES RECEIPT CUM INVOICE</h2>
                        </div>
                    </div>
                </div>


                <section>
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>
                                            <h3>Member Details</h3>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th class="member">Name: <strong>
                                                <?php echo $row['sname'] ?>
                                            </strong></th>
                                    <tr>
                                        <th class="member">Contact: <strong>
                                                <?php echo $row['contact1'] ?> ,
                                                <?php echo $row['contact2'] ?>
                                            </strong> </th>
                                    </tr>
                                    <tr>
                                        <th class="member">Address: <strong>
                                                <?php echo $row["addr"] ?>
                                            </strong></th>
                                    </tr>
                                </thead>
                            </table>
                        </div>

                        <div class="col-md-6">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="member">Sr no. <strong>
                                                <?php echo $row['receipt_no'] ?>
                                            </strong></th>
                                    </tr>
                                    <tr>
                                        <th class="member">Date: <strong>
                                                <?php echo date('d-m-Y', strtotime($row['cdate'])); ?>
                                            </strong></th>
                                    </tr>
                                    <tr>
                                        <th class="member">Mode Of Payment:    
                                            <strong><?php echo strtoupper($row['payment_mode']) ?></strong>
</th>
                                    </tr>
                                    <tr>
                                        <th class="member">Details</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>

                        <div class="col-md-12">
                            <table class="table table-bordered table-left-bordered">
                                <thead class="text-center">
                                    <tr>
                                        <th class="col-1">No.</th>
                                        <th class="col-6">Description</th>
                                        <th class="col-1">Qty</th>
                                        <th class="col-2">Rate</th>
                                        <th class="col-2">Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>01.</td>
                                        <td>
    <strong><?php echo strtoupper($row["activity"]) ?></strong>
</td>

                                        <td>
                                            <?php echo $row["course"] ?>
                                        </td>
                                        <td></td>
                                        <td>
                                            <?php echo $row["pay_amount"] ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td></td>
                                        <td>From
                                            <?php echo date('d-m-Y', strtotime($row["s_date"])) ?> to
                                            <?php echo date('d-m-Y', strtotime($row["e_date"])) ?>
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>


                                    <tr>
                                        <td colspan="4" class="text-end"><strong>Total</strong></td>
                                        <td>
                                        <strong><?php echo $row["total"] ?> /- </strong>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="5">Total in words:
                                            <strong><?php echo $row["total_word"] ?></strong>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="col-md-12 declare">
                                <h3>DECLARATION:</h3>
                                <p>01 . Fees once paid will not refunded or transferred in any case / any head.</p>
                                <p>02. Entry will not be allowed without ID card / Receipt in any activity.</p>
                                <p>03. Cheque / DD is subject to realization.</p>
                                <p>04. Under unavoidable circumstances, the management will have absolute power to close the
                                    institute /
                                    activity.</p>
                                <p>05. The management will have absolute right to change or to add any rules & regulation and
                                    will be abiding
                                    to trainee.</p>

                            </div>

                            <div class="row declare">
                                <div class="col-md-8">
                                    <p></p>
                                </div>
                                <div class="col-md-4">
                                    <h5>Receiver's Sign</h5>
                                </div>
                            </div>


                        </div>
                </section>
                <div class="row">
                    <div class="col-md-12">
                        <img src="imgs/letterhead-03.jpg" alt="">
                    </div>
                </div>

            </div>


            <?php

    } else {
        echo "Receipt not found";
    }
} else {
    echo "No receipt number provided";
}

mysqli_close($conn);
?>

    <body>

    </body>

</html>