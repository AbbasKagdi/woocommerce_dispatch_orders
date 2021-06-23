<!DOCTYPE html>
<html lang="en">

<?php 
require_once "conn.php"; 
include_once "html_headers.php"; 
insert_header("View Orders");
?>

<body>
    <center>
    <?php
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $per_page = isset($_GET['per_page']) ? $_GET['per_page'] : 10;
        $status = isset($_GET['status']) ? $_GET['status'] : "all";

        $orders = file_get_contents("http://localhost/api/order_json.php?page=$page&per_page=$per_page&status=$status");
		$orders = json_decode($orders, true);
        $total = $orders['meta'];
        $orders = $orders['data'];
    ?>
	<div class="container my-5">
	    <h3>Woocommerce Orders Data</h3>
	</div>
    <div class="container my-5">
        <form class="form">
            <div class="input-group">
                <input type="text" id="srch" class="form-control" />
            </div>
        </form>
    </div>
	<div class="container">
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>SNo</th>
						<th>Order</th>
						<th>Order Number</th>
						<th>Date</th>
						<th>Status</th>
						<th>Total</th>
					</tr>
				</thead>
				<tbody>
					<?php $i = 1; ?>
					<?php foreach($orders as $row): ?>
					<tr class="order_row type">
						<td><?= $total - (($page-1)*$per_page) + 1 - $i; ?></td>
						<td><?= $row['number']; ?></td>
						<td>
							<?= $row['billing']['first_name']; ?> 
							<?= $row['billing']['last_name']; ?>	
						</td>
						<td><?= $row['date_created']; ?></td>
						<td id="status"><?= $row['status']; ?></td>
						<td><?= $row['total']; ?></td>
					</tr>
					<?php $i++; ?>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
    <div class="container my-5">
        <form class="form">
            <div class="form-inline">
            <?php
                $total_pages = ($total/$per_page) +1;
                for($i=1; $i<=$total_pages; $i++){
                    echo "<a href='http://localhost/api/order.php?page=$i&per_page=10&status=$status' class='btn btn-dark mx-1'>$i</a>";
                }
            ?>
            </div>
        </form>
    </div>
    </center>
    <script>
        $(document).ready(function(){
            // search
            $("#srch").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $(".order_row").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>