<div class="row2">
    <div class="row2 font_title">
        <h1>THỐNG KÊ SẢN PHẨM TRONG DANH MỤC</h1>
    </div>
    <div class="row2 form_content ">
        <form action="#" method="POST">
            <div class="row2 mb10 formds_loai">
                <table>
                    <tr>

                        <th>MÃ LOẠI</th>
                        <th>TÊN LOẠI</th>
                        <th>SỐ LƯỢNG</th>
                        <th>GIÁ NHỎ NHẤT</th>
                        <th>GIÁ LỚN NHẤT</th>
                        <th>GIÁ TRUNG BÌNH</th>

                    </tr>

                    <?php
                    foreach ($listthongke as $thongke) {
                        extract($thongke);
                    ?>
                        <tr>
                            <td><?php echo $id ?></td>
                            <td><?php echo $name ?></td>
                            <td><?php echo $soluong ?></td>
                            <td><?php echo $gia_min ?> VND</td>
                            <td><?php echo $gia_max ?> VND</td>
                            <td><?php echo number_format($gia_avg, 2) ?> VND</td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
            <div class="row mb10 ">
                <a href="index.php?act=bieudo"> <input class="mr20" type="button" value="XEM BIỂU ĐỒ"></a>
            </div>
        </form>
    </div>
</div>