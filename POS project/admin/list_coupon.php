<?php include("header.php"); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <h1>Coupon</h1>
    </div>
</section>
<!-- Main content -->
<section class="content">
    <div class="card card-orange">
        <div class="card-header ">
            <h3 class="card-title" style="color:aliceblue;">Random Coupon</h3>
            <div align="right">

            </div>
        </div>
        <br>
        <div class="card-body">
            <div class="row">
                <hr style="border-top:1px dotted #ccc;" />
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#form_coupon"><span class="glyphicon glyphicon-plus"></span> Create Coupon</button>
                <br />
            </div>
            <div class="modal fade" id="form_coupon" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <form action="save_coupon.php" method="POST">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Coupon code</label>
                                        <input type="text" class="form-control" name="coupon" id="coupon"  required="required" />
                                        <br />
                                        <button id="generate" class="btn btn-success" type="button"><span class="glyphicon glyphicon-random"></span> Create coupon</button>
                                    </div>
                                    <div class="form-group">
                                        <label>Discount</label>
                                        <input type="number" class="form-control" name="discount" min="10" required="required" />
                                    </div>
                                </div>
                            </div>
                            <div style="clear:both;"></div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>Close</button>
                                <button name="save" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span>Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    <div class="card-footer">

    </div>

    </div>
<script src="../assets/jquery-3.2.1.min.js"></script>
<script src="../assets/bootstrap.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#generate').on('click', function() {
            $.get("get_coupon.php", function(data) {
                $('#coupon').val(data);
            });
        });
    });
</script>



</section>
<!-- /.content -->

<?php include('footer.php'); ?>
</body>

</html>