<?php
include_once("server.php");
$result = mysqli_query($conn, "SELECT * FROM tb_promote ORDER BY id DESC");
?>

<?php while ($row = mysqli_fetch_array($result)) {
    if ($row["pro_status"] == 1) { ?>

        <div class="header-slider-item border">
            <img style="width: 100%;height: 350px;" src="backend/img_promote/<?php echo $row["pro_image"];  ?>" alt="Slider Image" />
        </div>

    <?php } ?>
<?php } ?>