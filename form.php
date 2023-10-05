<?php include "./layout.php" ?>

<?php define("PAGE_TITLE", "form"); ?>
<?php template_header() ?>


<body>
    <form action="process_form.php" method="post">
        <label for="">Tháng</label>
        <select name="months" class="form-select">
            <option value="Jan">Jan</option>
            <option value="Feb">Feb</option>
            <option value="Mar">Mar</option>
            <option value="Apr">Apr</option>
            <option value="May">May</option>
            <option value="Jun">Jun</option>
            <option value="Jul">Jul</option>
            <option value="Aug">Aug</option>
            <option value="Sep">Sep</option>
            <option value="Oct">Oct</option>
            <option value="Nov">Nov</option>
            <option value="Dec">Dec</option>
        </select>
        <br>
        <label for="">Thống kê doanh thu</label>
        <select name="thongKe" id="thongKe" class="form-select">
            <option value="doanhThuMax">Doanh thu cao nhất</option>
            <option value="doanhThuMin">Doanh thu thấp nhất</option>
        </select>
        <br>
        <label for="">Quý</label>
        <select name="quy" id="" class="form-select">
            <option value="quy1">Quý 1</option>
            <option value="quy2">Quý 2</option>
            <option value="quy3">Quý 3</option>
            <option value="quy4">Quý 4</option>

        </select>
        <button type="submit">Submit</button>
    </form>


</body>



<?php template_header() ?>