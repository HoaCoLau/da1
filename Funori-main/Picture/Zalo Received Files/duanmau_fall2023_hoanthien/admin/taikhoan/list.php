<div class="row2">
  <div class="row2 font_title">
    <h1>DANH SÁCH TÀI KHOẢN</h1>
  </div>
  <div class="row2 form_content">
    <form action="#" method="POST">
      <div class="row2 mb10 formds_loai">
        <table>
          <tr>
            <th></th>
            <th>MÃ TK</th>
            <th>TÊN ĐĂNG NHẬP</th>
            <th>MẬT KHẨU</th>
            <th>EMAIL</th>
            <th>ĐỊA CHỈ</th>
            <th>SĐT</th>
            <th>VAI TRÒ</th>
          </tr>
          <?php
            foreach($listtaikhoan as $taikhoan){
              extract($taikhoan);
              $suatk="index.php?act=sua_tk&id=".$id;
              $xoatk="index.php?act=xoa_tk&id=".$id;
              if($role==1){
                $r = 'admin';
              }
              if($role==0){
                $r = 'user';
              }
              echo '<tr>
                <td><input type="checkbox" name="" id="" /></td>
                    <td>'.$id.'</td>
                    <td>'.$user.'</td>
                    <td>'.$pass.'</td>
                    <td>'.$email.'</td>
                    <td>'.$address.'</td>
                    <td>'.$tel.'</td>
                    <td>'.$r.'</td>
                <td>                    
                </td>
            </tr>';
            }
          ?>
        </table>
      </div>
      <div class="row mb10">
        <input class="mr20" type="button" value="CHỌN TẤT CẢ" />
        <input class="mr20" type="button" value="BỎ CHỌN TẤT CẢ" />
      </div>
    </form>
  </div>
</div>